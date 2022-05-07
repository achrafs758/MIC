<?php

namespace App\Http\Controllers\acces_partenaire;

use App\Http\Controllers\Controller;
use App\Models\historique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users() {

        $this->authorize("viewAny", \request()->user());

        if(isset($_GET['q'])){
            $users = User::where('first_name','LIKE','%'.$_GET['q'].'%')->orWhere('last_name','LIKE','%'.$_GET['q'].'%')->paginate(30);
        }
        else $users = User::paginate(30);
        return view('acces_partenaire.users', compact('users'));
    }

    public function store(){

        $this->authorize("create", \request()->user());

        $data = \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Users'],
            'password' => ['required', 'string', 'min:8'],
            'institut' => ['required', 'in:cnrst,ensias,ensmr,managem,mascir,uca']
        ]);
        $data['first_name'] = ucfirst($data['first_name']);
        $data['last_name'] = ucfirst($data['last_name']);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'institut' => $data['institut'],
            'type_profile' => 'user'
        ]);
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Create a new user with the ID : ' . $user->id
        ]);
        return redirect()->route('accesPartnersUsers.show')->with('success', 'The user with the ID ' . $user->id . ' has been added successfully');
    }

    public function update($user){

        $this->authorize("update", \request()->user());

        if(\request('password')) {
            $data = \request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email'],
                'password' => 'min:8',
                'institut' => ['required', 'in:cnrst,ensias,ensmr,managem,mascir,uca']
            ]);
            $password = ['password' => Hash::make($data['password'])];
        }
        else $data = \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'institut' => ['required', 'in:cnrst,ensias,ensmr,managem,mascir,uca']
        ]);
        $data['first_name'] = ucfirst($data['first_name']);
        $data['last_name'] = ucfirst($data['last_name']);

        User::findOrFail($user)->update(array_merge([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'institut' => $data['institut'],
            ],
            $password ?? []
        ));
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Update user with the ID : ' . $user
        ]);
        return redirect()->route('accesPartnersUsers.show')->with('success', 'The user with the ID ' .  $user . ' has been updated successfully');
    }

    public function destroy($user){
        $this->authorize("delete", \request()->user());
        User::findOrFail($user)->delete();
        historique::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete the user with the ID : ' . $user
        ]);
        return redirect()->route('accesPartnersUsers.show')->with('success', 'The user with the ID ' .  $user . ' has been deleted successfully');
    }
}
