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
                <div class="justify-content-center row">
                    <div class="card card-body col-sm-12 col-md-10 bg-light align-self-center">
                        <h1 class="m-md-5 p-5" style="font-size: 40px;">Historiques</h1>
                        <div class="row pb-5">
                            <div class="align-self-center col-sm-11 col-md-8 offset-md-2">
                                <form action="/acces_partenaire/historiques" method="get">
                                    <input class="form-control" type="text" name="q" placeholder="Rechercher un historique">
                                </form>
                            </div>
                            @if(!$historiques->count())
                                <div class='row align-self-center m-5'>
                                    <div class="p-5 border-5">
                                        <h1>Aucun historique à afficher</h1>
                                    </div>
                                </div>
                            @else
                                <div class=" col-12 p-1">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Utilisateur</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($historiques as $historique)
                                            <tr class="align-middle">
                                                <th scope="row">{{$historique->id}}</th>
                                                <td><a href="/acces_partenaire/users/?q={{$historique->user->first_name}}">{{$historique->user->first_name}} {{$historique->user->last_name}}</a></td>
                                                <td>{{$historique->created_at}}</td>
                                                <td>{{$historique->action}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if ($historiques->hasPages())
                                    <div class="blog-pagination">
                                        <ul class="pagination justify-content-center">
                                            @if ($historiques->onFirstPage())
                                                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span aria-hidden="true">
                                                <i class="icofont-rounded-left"></i>
                                            </span>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $historiques->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                                        <i class="icofont-rounded-left"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            <li class="active">
                                                <a>
                                                    {{ $historiques->currentPage() }}
                                                </a>
                                            </li>
                                            @if ($historiques->hasMorePages())
                                                <li>
                                                    <a href="{{ $historiques->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
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
            </div>
        </main>
        @include('components.js')
    </body>
</html>
