<?php

namespace App\Http\Controllers\acces_partenaire;

use App\Http\Controllers\Controller;
use App\Models\historique;
use App\Models\production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function productions() {
        if(isset($_GET['q'])){
            $productions = production::where('titre','LIKE','%'.$_GET['q'].'%')->paginate(30);
        }
        else $productions = production::orderByDesc('id')->paginate(30);
        return view('acces_partenaire.productions', compact('productions'));
    }

    public function store(){
        $data = \request()->validate([
            'titre' => 'required',
            'resume' => ['required', 'string', 'min:130'],
            'lien' => ['required', 'url'],
        ]);
        $data['titre'] = ucfirst($data['titre']);
        $data['resume'] = ucfirst($data['resume']);
        $production = production::create($data);
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Create a new production with the ID : ' . $production->id
        ]);
        return redirect()->route('accesPartnersProductions.show')->with('success', 'The production with the ID ' .  $production->id . ' has been added successfully');
    }

    public function update(production $production){
        $data = \request()->validate([
            'titre' => 'required',
            'resume' => 'required',
            'lien' => ['required', 'url'],
        ]);
        $data['titre'] = ucfirst($data['titre']);
        $data['resume'] = ucfirst($data['resume']);
        $production->update($data);
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Update the production with the ID : ' . $production->id
        ]);
        return redirect()->route('accesPartnersProductions.show')->with('success', 'The production with the ID ' .  $production->id . ' has been updated successfully');
    }

    public function destroy(production $production){
        $production->delete();
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete the production with the ID : ' . $production->id
        ]);
        return redirect()->route('accesPartnersProductions.show')->with('success', 'The production with the ID ' .  $production->id . ' has been deleted successfully');
    }
}
