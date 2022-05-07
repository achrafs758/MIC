<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Actualités - Projet MIC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    @include('components.css')

</head>

<body>

    @include('components.nav')

  <main class="pt-5" id="main">

    <!-- ======= Blog Section ======= -->
    <section class="pt-5 breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Actualités</h2>

          <ol>
            <li><a href="/">Accueil</a></li>
            <li>Actualités</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-sm-12 col-lg-8 entries">
              @if(isset($actualites))
                  @if($actualites->count() == 0)
                      <div class="row">
                          <div class="card card-body" style="font-size: 24px">
                              <div class="text-center m-5">
                                  Aucune actualité n'est trouvée
                              </div>
                          </div>
                      </div>
                  @else
                      <div class="filters-area pb-3">
                          <h3 class="border-bottom">
                              <a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                                  <i class="icofont-settings"></i>
                                  Tri
                              </a>
                          </h3>
                          <div class="collapse" id="filters">
                              <form class="row" method="get" action="\actualites">
                                  <div class="col-2">
                                      <input class="form-control btn-lg" name="filter" value="Date" type="submit">
                                  </div>
                                  <div class="col-2">
                                      <input class="form-control btn-lg" name="filter" value="Type" type="submit">
                                  </div>
                                  @if($search_text != '')
                                      <div class="col-2 d-none">
                                          <input type="text" class="form-control-lg" name="q" value="{{$search_text}}">
                                      </div>
                                  @endif
                              </form>
                          </div>
                      </div>
                      @foreach($actualites as $actualite)
                          @php(Carbon\Carbon::setLocale('fr'))
                          <article class="entry">
                              <div class="row">
                                  <img src="<?php echo url('/'); ?>/{{ $actualite->img  }}" alt="" class=" entry-img col-sm-10 col-md-5 h-auto img-fluid pb-0">
                                  <div class="col-sm-10 col-md-7">
                                      <h2 class="entry-title px-4 pb-0 mb-0">
                                          <a href="\actualites\{{$actualite->id}}">{{$actualite->titre}}</a>
                                      </h2>
                                      <p class="fs-6 px-4 pt-0 mt-0" style="color: #bbbbbb">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $actualite->created_at)->diffForHumans()}}</p>
                                      <div class="entry-content">
                                          <h4>
                                              {{substr($actualite->resume,0,strpos($actualite->resume, ' ', 100))}}...
                                          </h4>
                                          <div class="entry-meta text-start pt-3">
                                              <ul class="row">
                                                  <li class="d-flex align-items-center col-6"><i class="icofont-notepad"></i>{{$actualite->type == 'evenement' ? 'Événement' : 'Actualité'}}</li>
                                                  <li class="d-flex align-items-center col-6"><i class="icofont-wall-clock"></i><time datetime="{{$actualite->date}}">{{$actualite->date}}</time></li>
                                              </ul>
                                          </div>
                                          <div class="read-more">
                                              <a href="\actualites\{{$actualite->id}}">Lire la suite...</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      @endforeach
                  @endif
              @endif
          </div>
            <div class="col-sm-12 col-md-4">
                <div class="sidebar mt-5">
                    <h3 class="sidebar-title">Rechercher</h3>
                    <div class="sidebar-item search-form">
                        <form action="\actualites" method="get">
                            <input type="text" name="q" placeholder="Rechercher une actualité" value="{{$search_text}}">
                            <button type="submit"><i class="icofont-search"></i></button>
                        </form>
                    </div>
                    <h3 class="sidebar-title">Actualités récents</h3>
                    @if($recentActualites->count() == 0)
                        <p class="text-center">
                            Aucune récente actualité
                        </p>
                    @else
                        <div style="margin-left: 10px;">
                            <div class="splide__track sidebar-item recent-posts">
                                <ul class="splide__list">
                                    @foreach($recentActualites as $actualite)
                                        <div class="splide__slide p-2">
                                            <div class="post-item clearfix">
                                                <img src="<?php echo url('/'); ?>/{{ $actualite->img  }}" alt="" class="img-fluid pb-0 h-auto">
                                                <h4><a href="/evenements/{{$actualite->id}}">{{$actualite->titre}}</a></h4>
                                                <time datetime="{{$actualite->date}}">{{$actualite->date}}</time>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
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
      </div>
    </section>

  </main>

    @include('components.footer')

</body>

</html>
