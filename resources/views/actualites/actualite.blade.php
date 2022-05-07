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
    <section class="pt-5 breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Actualités</h2>
          <ol>
            <li><a href="/">Accueil</a></li>
            <li><a  href="/actualites">Actualités</a></li>
            <li>{{ $actualite->titre }}</li>
          </ol>
        </div>

      </div>
    </section>

      <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
          <div class="container col-sm-12 col-md-10">
              <div class="row">
                  <div class="info-box pt-0">
                      <div class="section-title pt-5">
                          <h1><B><span style="color: #566885;" class="px-1">{{ $actualite->titre }}</span></B></h1>
                      </div>
                      <div class="entry-img">
                          <img src="<?php echo url('/'); ?>/{{ $actualite->img  }}" alt="" class="img-fluid w-50">
                      </div>
                      <div class="px-lg-5 mx-lg-5">
                          <h2 class="pt-5 px-5 text-start">Date : {{$actualite->date}}</h2>
                      </div>
                      <div class="mx-lg-5">
                        <h3 class="p-5 text-start">{{$actualite->resume}}</h3>
                      </div>
                  </div>
              </div>
          </div>
      </section>

  </main><!-- End #main -->

    @include('components.footer')

</body>

</html>
