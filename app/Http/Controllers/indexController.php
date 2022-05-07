<?php

namespace App\Http\Controllers;

use App\Models\actualite;
use App\Models\production;
use Carbon\Carbon;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $date_end = Carbon::now()->year."-".Carbon::now()->month."-".Carbon::now()->day;
        $date_start = Carbon::now()->subDay(15)->year."-".Carbon::now()->subDay(15)->month."-".Carbon::now()->subDay(15)->day;
        $recentActualites = actualite::where('importance','>=' ,'3')->whereBetween('date', [$date_start, $date_end])->orderBy('importance', 'DESC')->limit(5)->get();
        $recentProduction = production::orderBy('id', 'DESC')->limit(5)->get();
        return view('index', compact('recentActualites', 'recentProduction'));
    }
}
