<?php

namespace App\Http\Controllers\acces_partenaire;

use App\Http\Controllers\Controller;
use App\Models\actualite;
use App\Models\historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class actualitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function actualites() {
        if(isset($_GET['q'])){
            $actualites = actualite::where('titre','LIKE','%'.$_GET['q'].'%')->paginate(30);
        }
        else $actualites = actualite::paginate(30);
        return view('acces_partenaire.actualites', compact('actualites'));
    }

    public function store(){
        $data = \request()->validate([
            'titre' => 'required',
            'date' => ['required', 'date','date_format:Y-m-d'],
            'resume' => ['required', 'string', 'min:130'],
            'importance' => ['required', 'digits_between:1,5'],
            'type' => ['required', 'in:evenement,actualite'],
            'img' => ['required', 'image']
        ]);
        $imagePath = 'storage/'.\request('img')->store('uploads', 'public');
        $image = Image::make(public_path($imagePath))->fit(1280,720);
        $image->save();
        $data['titre'] = ucfirst($data['titre']);
        $data['resume'] = ucfirst($data['resume']);
        $actualite = actualite::create([
            'titre' => $data['titre'],
            'date' => $data['date'],
            'resume' => $data['resume'],
            'importance' => $data['importance'],
            'type' => $data['type'],
            'img' => $imagePath
        ]);
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Create a new actuality with the ID : ' . $actualite->id
        ]);
        return redirect()->route('accesPartnersActualites.show')->with('success', 'The actuality with the ID ' .  $actualite->id . ' has been added successfully');
    }

    public function update(actualite $actualite){
        $data = \request()->validate([
            'titre' => 'required',
            'date' => ['required', 'date','date_format:Y-m-d'],
            'resume' => 'required',
            'importance' => ['required', 'digits_between:1,5'],
            'type' => ['required', 'in:evenement,actualite'],
            'img' => 'image'
        ]);
        $data['titre'] = ucfirst($data['titre']);
        $data['resume'] = ucfirst($data['resume']);
        if(\request('img')) {
            $imagePath = 'storage/' . \request('img')->store('uploads', 'public');
            $image = Image::make(public_path($imagePath))->fit(1280, 720);
            $image->save();
            $Image = ['img' => $imagePath];
        }
        $actualite->update(array_merge([
                'titre' => $data['titre'],
                'date' => $data['date'],
                'resume' => $data['resume'],
                'importance' => $data['importance'],
                'type' => $data['type']
            ],
            $Image ?? []
        ));
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Update the actuality with the ID : ' . $actualite->id
        ]);
        return redirect()->route('accesPartnersActualites.show')->with('success', 'The actuality with the ID ' .  $actualite->id . ' has been updated successfully');
    }

    public function destroy(actualite $actualite){
        $actualite->delete();
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete the actuality with the ID : ' . $actualite->id
        ]);
        return redirect()->route('accesPartnersActualites.show')->with('success', 'The actuality with the ID ' .  $actualite->id . ' has been deleted successfully');
    }
}
