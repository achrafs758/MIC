<?php

namespace App\Http\Controllers;

use App\Models\actualite;
use App\Models\production;
use Illuminate\Http\Request;

class rechercheController extends Controller{

    public function recherche(){
        if (isset($_GET['q'])) {
                $searched_text = $_GET['q'];
                $actualites = actualite::where('titre', 'LIKE', '%' . $searched_text . '%')->orwhere('resume', 'LIKE', '%' . $searched_text . '%')->orderByDesc('date')->get();
                $productions = production::where('titre', 'LIKE', '%' . $searched_text . '%')->orwhere('resume', 'LIKE', '%' . $searched_text . '%')->orderByDesc('id')->get();
                return view('recherche', compact('searched_text', 'actualites', 'productions'));
        }
        else return redirect()->route('index.show');
    }
}
