<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Acces Patenaire - MIC</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="keywords">
        @include('components.css')
    </head>
    <body>
        @include('components.nav')
        <main id="main">
            <div class="text-center container p-5">
                @if(session('success'))
                    <div class="alert alert-success text-start" role="alert"><strong>{{ session('success') }}</strong></div>
                @endif
                @error('titre')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('resume')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('date')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('importance')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('type')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('img')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                <div class="justify-content-center row">
                    <div class="card card-body col-sm-12 col-md-10 bg-light align-self-center">
                        <h1 class="m-md-5 p-5" style="font-size: 40px;">Actualités</h1>
                        <div class="row pb-5">
                            <div class="pb-3 align-self-center col-sm-12 col-md-8 offset-md-1">
                                <form action="/acces_partenaire/actualites" method="get">
                                    <input class="form-control" type="text" name="q" placeholder="Rechercher une actualité">
                                </form>
                            </div>
                            <div class="pb-3 col-sm-12 col-md-2 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#add_actualite">
                                    Ajouter une actualité
                                </button>
                            </div>
                        </div>

                        <!-- New actualite Modal -->
                        <div class="modal fade" id="add_actualite" tabindex="-1" aria-labelledby="add_actualite_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="add_actualite_label"><b>Ajouter une nouvelle actualite</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-outline" method="post" action="/acces_partenaire/actualites/create" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Titre</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="titre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Resumé</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="resume" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="date" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Importance</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" name="importance">
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="3">4</option>
                                                        <option value="3">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Type</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" value="actualite">
                                                        <label class="form-check-label">Actualité</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" value="evenement">
                                                        <label class="form-check-label">Événement</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="file" name="img">
                                                    <small style="font-size: 10px;">Veulliez utiliser des photos de dimention 1028px*720px</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ajouter la actualite</button>
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- update actualite Modal -->
                        <div class="modal fade" id="update_actualite" tabindex="-1" aria-labelledby="update_actualite_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="update_actualite_label"><b>Modifier une actualite</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="update_form" class="form-outline" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Id</label>
                                                <div class="col-sm-8">
                                                    <input id="id" type="number" name="id" class="form-control-plaintext">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Titre</label>
                                                <div class="col-sm-8">
                                                    <input id="titre" type="text" name="titre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Resumé</label>
                                                <div class="col-sm-8">
                                                    <input id="resume" type="text" name="resume" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Date</label>
                                                <div class="col-sm-8">
                                                    <input id="date" type="date" name="date" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Importance</label>
                                                <div class="col-sm-8">
                                                    <select id="importance" class="form-select" name="importance">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="3">4</option>
                                                        <option value="3">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Type</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input id="actualite" class="form-check-input" type="radio" name="type" value="actualite">
                                                        <label class="form-check-label">Actualité</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="evenement"  class="form-check-input" type="radio" name="type" value="evenement">
                                                        <label class="form-check-label">Événement</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Image <small style="font-size: 10px;">(optionnelle)</small></label>
                                                <div class="col-sm-8">
                                                    <input id="img" class="form-control" type="file" name="img">
                                                    <small style="font-size: 10px;">Veulliez utiliser des photos de dimention 1028px*720px</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Modifier la actualite</button>
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- delete actualite confirmation Modal -->
                        <div class="modal fade" id="delete_actualite" tabindex="-1" aria-labelledby="delete_actualite_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="delete_actualite_label"><b>Supprimer Actualite</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ml-5">
                                        <div class="row">
                                            <span>Êtes vous sûr que vous vouliez suprrimer l'actualité</span><span>"<b id="actualite_title"></b>" ?</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a id="delete_actualite_button" role="button" class="btn btn-primary">Suprimmer la actualite</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @if(!$actualites->count())
                            <div class='row align-self-center m-5'>
                                <div class="p-5 border-5">
                                    <h1>Aucune actualité à afficher</h1>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-12 col-md-12 p-1">
                                <table class="col-sm-12 col-md-12 table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Resume</th>
                                        <th scope="col">Importance</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($actualites as $actualite)
                                        <tr class="align-middle">
                                            <th scope="row">{{$actualite->id}}</th>
                                            <td><img src="<?php echo url('/'); ?>/{{$actualite->img}}" style="width: 100px; height: 100px;"></td>
                                            <td>{{$actualite->titre}}</td>
                                            <td>{{$actualite->date}}</td>
                                            <td class="w-25 text-start">{{substr($actualite->resume,0,strpos($actualite->resume, ' ', 130))}}...</td>
                                            <td>{{$actualite->importance}}</td>
                                            <td>{{$actualite->type == 'evenement' ? 'Événement' : 'Actualité'}}</td>
                                            <td class="w-25">
                                                <a class="btn btn-success" href="/actualites/{{$actualite->id}}">Afficher</a>
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_actualite" onclick="getUpdatingActualite({{$actualite->id}},'{{$actualite->titre}}','{{$actualite->date}}','{{$actualite->resume}}', {{$actualite->importance}},'{{$actualite->type}}')">Modifier</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_actualite" onclick="getDeletingActualite({{$actualite->id}},'{{$actualite->titre}}')">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($actualites->hasPages())
                                <div class="blog-pagination">
                                    <ul class="pagination justify-content-center">
                                        @if ($actualites->onFirstPage())
                                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                <span aria-hidden="true">
                                                    <i class="icofont-rounded-left"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $actualites->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                                    <i class="icofont-rounded-left"></i>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="active">
                                            <a>
                                                {{ $actualites->currentPage() }}
                                            </a>
                                        </li>
                                        @if ($actualites->hasMorePages())
                                            <li>
                                                <a href="{{ $actualites->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                                    <i class="icofont-rounded-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                <span aria-hidden="true">
                                                    <i class="icofont-rounded-right"></i>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </main>
        @include('components.js')
    </body>
</html>
