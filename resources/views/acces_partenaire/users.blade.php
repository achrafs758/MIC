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
                @error('first_name')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('last_name')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('email')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('password')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                @error('institut')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
                <div class="justify-content-center row">
                    <div class="card card-body col-sm-12 col-md-10 bg-light  align-self-center">
                        <h1 class="m-md-5 p-5" style="font-size: 40px;">Utilisateurs</h1>
                        <div class="row pb-5">
                            <div class="pb-3 align-self-center col-sm-12 col-md-8 offset-md-1">
                                <form action="/acces_partenaire/users" method="get">
                                    <input class="form-control" type="text" name="q" placeholder="Rechercher un utilisateur">
                                </form>
                            </div>
                            <div class="pb-3 col-sm-12 col-md-2 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#add_user">
                                    Ajouter un utilisateur
                                </button>
                            </div>

                        </div>

                        <!-- New user Modal -->
                        <div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="add_user_label" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 650px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="add_user_label"><b>Ajouter un nouveau utilisaeur</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-outline" method="post" action="/acces_partenaire/users/create">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Nom</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="first_name" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Prénom</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="last_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">E-mail</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row align-middle">
                                                <label class="col-sm-2 col-form-label">Mot de passe</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row align-middle">
                                                <label class="col-sm-2 col-form-label">Institut</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="institut">
                                                        <option value="cnrst">Centre National pour la Recherche Scientifique et Technique</option>
                                                        <option value="ensias">École nationale supérieure d'informatique et d'analyse des systèmes</option>
                                                        <option value="ensmr">Ecole Nationale Superieure Des Mines De Rabat</option>
                                                        <option value="managem">Managem</option>
                                                        <option value="mascir">MAScIR</option>
                                                        <option value="uca">Université Cadi Ayyad</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ajouter l'utilisaeur</button>
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- update user Modal -->
                        <div class="modal fade" id="update_user" tabindex="-1" aria-labelledby="update_user_label" aria-hidden="true" >
                            <div class="modal-dialog" style="max-width: 650px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="update_user_label"><b>Modifier un utilisateur</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="update_form" class="form-outline" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Id</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="id" name="id" class="form-control-plaintext">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Nom</label>
                                                <div class="col-sm-4">
                                                    <input type="text" id="first_name" name="first_name" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Prénom</label>
                                                <div class="col-sm-4">
                                                    <input type="text" id="last_name" name="last_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">E-mail</label>
                                                <div class="col-sm-10">
                                                    <input type="email" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row align-middle">
                                                <label class="col-sm-2 col-form-label">Mot de passe</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row align-middle">
                                                <label class="col-sm-2 col-form-label">Institut</label>
                                                <div class="col-sm-10">
                                                    <select id="institut" class="form-select" name="institut">
                                                        <option value="cnrst">Centre National pour la Recherche Scientifique et Technique</option>
                                                        <option value="ensias">École nationale supérieure d'informatique et d'analyse des systèmes</option>
                                                        <option value="ensmr">Ecole Nationale Superieure Des Mines De Rabat</option>
                                                        <option value="managem">Managem</option>
                                                        <option value="mascir">MAScIR</option>
                                                        <option value="uca">Université Cadi Ayyad</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Modifier l'utilisaeur</button>
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- delete user confirmation Modal -->
                        <div class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="delete_user_label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="delete_user_label"><b>Supprimer un utilisaeur</b></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ml-5">
                                        <div class="row">
                                            <span>Êtes vous sûr que vous vouliez suprrimer l'utilisaeur</span><span>"<b id="user_name"></b>" ?</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a id="delete_user_button" role="button" class="btn btn-primary">Suprimmer l'utilisaeur</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!$users->count())
                            <div class='row align-self-center m-5'>
                                <div class="p-5 border-5">
                                    <h1>Aucun utilisateur à afficher</h1>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-12 col-md-12 p-1">
                                <table class="col-sm-12 col-md-12 table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Institut</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->institut}}</td>
                                            <td class="w-25">
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_user"
                                                   onclick="getUpdatingUser({{$user->id}},'{{$user->first_name}}','{{$user->last_name}}', '{{$user->email}}','{{$user->institut}}')">
                                                    Modifier
                                                </a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_user"
                                                   onclick="getDeletingUser({{$user->id}},'{{$user->first_name}}','{{$user->last_name}}')">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($users->hasPages())
                                <div class="blog-pagination">
                                    <ul class="pagination justify-content-center">
                                        @if ($users->onFirstPage())
                                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span aria-hidden="true">
                                    <i class="icofont-rounded-left"></i>
                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $users->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                                    <i class="icofont-rounded-left"></i>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="active">
                                            <a>
                                                {{ $users->currentPage() }}
                                            </a>
                                        </li>
                                        @if ($users->hasMorePages())
                                            <li>
                                                <a href="{{ $users->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
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
