<?php

use Illuminate\Support\Facades\Route;


Route::get('/', '\App\Http\Controllers\indexController@index')->name('index.show');

Route::get('/partenaires', function () {
    return view('partenaires');
});

Route::get('/partenaires/managem', function () {
    return view('partenaires.managem');
});

Route::get('/partenaires/mascir', function () {
    return view('partenaires.mascir');
});

Route::get('/partenaires/cnrst', function () {
    return view('partenaires.cnrst');
});

Route::get('/partenaires/uca', function () {
    return view('partenaires.uca');
});

Route::get('/partenaires/ensmr', function () {
    return view('partenaires.ensmr');
});

Route::get('/partenaires/ensias', function () {
    return view('partenaires.ensias');
});

Route::get('/recherche', function () {
    return view('recherche');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/realisations', function () {
    return view('realisations');
});

Route::get('/realisations/1', function () {
    return view('realisations.realisation1');
});
Route::get('/realisations/2', function () {
    return view('realisations.realisation2');
});
Route::get('/realisations/3', function () {
    return view('realisations.realisation3');
});
Route::get('/realisations/4', function () {
    return view('realisations.realisation4');
});
Route::get('/realisations/5', function () {
    return view('realisations.realisation5');
});
Route::get('/realisations/6', function () {
    return view('realisations.realisation6');
});
Route::get('/realisations/7', function () {
    return view('realisations.realisation7');
});

Route::get('/recherche','\App\Http\Controllers\rechercheController@recherche');

Route::get('/actualites','\App\Http\Controllers\actualiteController@getActualites')->name('actualites.show');

Route::get('/actualites/{actualite}','\App\Http\Controllers\actualiteController@getActualite')->name('actualite.show');

Route::get('/productions','\App\Http\Controllers\productionController@getProductions')->name('productions.show');

Route::get('/productions/{production}','\App\Http\Controllers\productionController@getProduction')->name('production.show');

Route::get('/acces_partenaire/users', '\App\Http\Controllers\acces_partenaire\usersController@users')->name('accesPartnersUsers.show');

Route::post('/acces_partenaire/users/create', '\App\Http\Controllers\acces_partenaire\usersController@store');

Route::get('/acces_partenaire/users/{users}/destroy', '\App\Http\Controllers\acces_partenaire\usersController@destroy');

Route::patch('/acces_partenaire/users/{users}/update', '\App\Http\Controllers\acces_partenaire\usersController@update');

Route::get('/acces_partenaire/actualites', '\App\Http\Controllers\acces_partenaire\actualitesController@actualites')->name('accesPartnersActualites.show');

Route::post('/acces_partenaire/actualites/create', '\App\Http\Controllers\acces_partenaire\actualitesController@store');

Route::get('/acces_partenaire/actualites/{actualite}/destroy', '\App\Http\Controllers\acces_partenaire\actualitesController@destroy');

Route::patch('/acces_partenaire/actualites/{actualite}/update', '\App\Http\Controllers\acces_partenaire\actualitesController@update');

Route::get('/acces_partenaire/productions', '\App\Http\Controllers\acces_partenaire\productionsController@productions')->name('accesPartnersProductions.show');

Route::post('/acces_partenaire/productions/create', '\App\Http\Controllers\acces_partenaire\productionsController@store');

Route::get('/acces_partenaire/productions/{production}/destroy', '\App\Http\Controllers\acces_partenaire\productionsController@destroy');

Route::patch('/acces_partenaire/productions/{production}/update', '\App\Http\Controllers\acces_partenaire\productionsController@update');

Route::get('/acces_partenaire/historiques', '\App\Http\Controllers\acces_partenaire\historiquesController@historiques')->name('accesPartnersHistoriques.show');

Route::get('/profile', '\App\Http\Controllers\acces_partenaire\profileController@profile');

Route::patch('/profile/edit', '\App\Http\Controllers\acces_partenaire\profileController@edit');

Route::get('/home', '\App\Http\Controllers\indexController@home');

Auth::routes([
    'register' => false,
    'home' => false
]);
