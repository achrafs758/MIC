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
                @error('lien')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                <div class="justify-content-center row">
                    <div class="card card-body col-sm-12 col-md-10 bg-light align-self-center">
                        <h1 class="m-md-5 p-5" style="font-size: 40px;">Productions scientifiques</h1>
                        <div class="row pb-5">
                            <div class="pb-3 align-self-center col-sm-12 col-md-8 offset-md-1">
                                <form action="/acces_partenaire/productions" method="get">
                                    <input class="form-control" type="text" name="q" placeholder="Rechercher une production">
                                </form>
                            </div>
                            <div class="pb-3 col-sm-12 col-md-2 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#add_production">
                                    Ajouter une production
                                </button>
                            </div>
                        </div>

                        <!-- New production Modal -->
                        <div class="modal fade" id="add_production" tabindex="-1" aria-labelledby="add_production_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="add_production_label"><b>Ajouter une nouvelle production</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-outline" method="post" action="/acces_partenaire/productions/create" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Titre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="titre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Resumé</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="resume" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Lien</label>
                                                <div class="col-sm-10">
                                                    <input type="url" name="lien" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ajouter la production</button>
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- update production Modal -->
                        <div class="modal fade" id="update_production" tabindex="-1" aria-labelledby="update_production_label" aria-hidden="true" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="update_production_label"><b>Modifier une production</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="update_form" class="form-outline" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Id</label>
                                                <div class="col-sm-10">
                                                    <input id="id" type="text" name="number" class="form-control-plaintext">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Titre</label>
                                                <div class="col-sm-10">
                                                    <input id="titre" type="text" name="titre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Resumé</label>
                                                <div class="col-sm-10">
                                                    <input id="resume" type="text" name="resume" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Lien</label>
                                                <div class="col-sm-10">
                                                    <input id="lien" type="url" name="lien" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Modifier la production</button>
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- delete production confirmation Modal -->
                        <div class="modal fade" id="delete_production" tabindex="-1" aria-labelledby="delete_production_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="delete_production_label"><b>Supprimer Production</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body ml-5">
                                            <div class="row">
                                                <span>Êtes vous sûr que vous vouliez suprrimer la production</span><span>"<b id="production_title"></b>" ?</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a id="delete_production_button" role="button" class="btn btn-primary">Suprimmer la production</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                </div>
                            </div>
                        </div>

                        @if(!$productions->count())
                            <div class='row align-self-center m-5'>
                                <div class="p-5 border-5">
                                    <h1>Aucune production à afficher</h1>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-12 col-md-12 p-1">
                                <table class="col-sm-12 col-md-12 table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Resumé</th>
                                        <th scope="col">Lien</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productions as $production)
                                        <tr class="align-middle">
                                            <th scope="row">{{$production->id}}</th>
                                            <td id="titre{{$production->id}}">{{$production->titre}}</td>
                                            <td class="w-25 text-start">{{substr($production->resume,0,strpos($production->resume, ' ', 130))}}...</td>
                                            <td><a href="{{$production->lien}}">{{substr($production->lien,0,20)}}...</a></td>
                                            <td class="w-25">
                                                <a class="btn btn-success" href="/productions/{{$production->id}}">Afficher</a>
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_production" onclick="getUpdatingProduction({{$production->id}},'{{$production->titre}}','{{$production->resume}}', '{{$production->lien}}')">Modifier</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_production" onclick="getDeletingProduction({{$production->id}},'{{$production->titre}}')">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($productions->hasPages())
                                <div class="blog-pagination">
                                    <ul class="pagination justify-content-center">
                                        @if ($productions->onFirstPage())
                                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span aria-hidden="true">
                                    <i class="icofont-rounded-left"></i>
                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $productions->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                                    <i class="icofont-rounded-left"></i>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="active">
                                            <a>
                                                {{ $productions->currentPage() }}
                                            </a>
                                        </li>
                                        @if ($productions->hasMorePages())
                                            <li>
                                                <a href="{{ $productions->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
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
