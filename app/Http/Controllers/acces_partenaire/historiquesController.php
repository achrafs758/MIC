<?php

namespace App\Http\Controllers\acces_partenaire;

use App\Http\Controllers\Controller;
use App\Models\historique;
use Illuminate\Http\Request;

class historiquesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function historiques(){
        if(isset($_GET['q'])){
            $historiques = historique::where('action','LIKE','%'.$_GET['q'].'%')->orderByDesc('id')->paginate(30);
        }
        else $historiques = historique::orderByDesc('id')->paginate(50);
        return view('acces_partenaire.historiques', compact('historiques'));
    }
}
