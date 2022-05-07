<?php

namespace App\Http\Controllers;


use App\Models\actualite;
use Carbon\Carbon;

class actualiteController extends Controller
{
    public function getActualites(){
        if(isset($_GET['q'])){
            $search_text = $_GET['q'];
            if(isset($_GET['filter'])){
                if($_GET['filter'] == 'Type'){
                    $actualites = actualite::where('titre','LIKE','%'.$search_text.'%')->orderBy('type')->paginate(10);
                }
                elseif($_GET['filter'] == 'Date'){
                    $actualites = actualite::where('titre','LIKE','%'.$search_text.'%')->orderBy('date', 'DESC')->paginate(10);
                }
            }
            else{
                $actualites = actualite::where('titre','LIKE','%'.$search_text.'%')->orderBy('date', 'DESC')->paginate(10);
            }
        }
        else{
            $search_text = '';
            if(isset($_GET['filter'])){
                if($_GET['filter'] == 'Type'){
                    $actualites = actualite::orderBy('type')->paginate(10);
                }
                elseif($_GET['filter'] == 'Date'){
                    $actualites = actualite::orderBy('date', 'DESC')->paginate(10);
                }
            }
            else{
                $actualites = actualite::orderBy('date', 'DESC')->paginate(10);
            }
        }
        $date_end = Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day;
        $date_start = Carbon::now()->subDay(15)->year."-".Carbon::now()->subDay(15)->month."-".Carbon::now()->subDay(15)->day;
        $recentActualites = actualite::where('importance','>=' ,'3')->whereBetween('date', [$date_start, $date_end])->orderBy('importance', 'DESC')->limit(5)->get();
        return view('actualites', compact('actualites', 'recentActualites', 'search_text'));
    }

    public function getActualite(actualite $actualite) {
        return view('actualites.actualite', compact('actualite'));
    }
}
