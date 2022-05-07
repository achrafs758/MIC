<?php

namespace App\Http\Controllers;


use App\Models\production;

class productionController extends Controller
{
    public function getProductions(){
        if(isset($_GET['q'])){
            $search_text = $_GET['q'];
            $productions = production::where('resume', 'LIKE', '%'.$search_text.'%')->paginate(10);
        }
        else{
            $search_text = '';
            $productions = production::orderBy('id', 'DESC')->paginate(10);
        }
        $recentProduction = production::orderBy('id', 'DESC')->limit(5)->get();
        return view('productions', compact('productions', 'recentProduction', 'search_text'));
    }

    public function getProduction(production $production){
        return view('productions.production', compact('production'));
    }

}
