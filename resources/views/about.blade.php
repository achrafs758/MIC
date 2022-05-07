<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>À propos - MIC</title>
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
                        <h2>Présentation</h2>
                        <ol>
                            <li><a href="/">Accueil</a></li>
                            <li>À propos</li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="about" data-aos="fade-up">
                <div class="container col-sm-12 col-md-10">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo url('/'); ?>/img/about/about.jpg" class="img-fluid" alt="">
                            <img src="<?php echo url('/'); ?>/img/about/partnership.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <h1 class="pb-2">Vers une Mine Intelligente Connectée</h1>
                            <h2 class="font-italic pb-3">Description du Projet</h2>
                            <p>
                              L’industrie minière est caractérisée par un environnement économique en permanence sous pression et très contraignant (évolution imprévisible des prix des
                              matières premières, épuisement des réserves minières, … etc.). Afin d’atténuer en partie cette volatilité de l’écosystème, l’industrie minière est face à
                              l’innovation. La technologie évolue rapidement. L'intelligence artificielle, la réalité virtuelle et augmentée, l'Internet des objets (IoT), le Big Data,
                              l'analyse avancée, ...etc. ouvrent la voie à une évolution technologique plus poussée. Ces technologies nouvelles et émergentes représentent une très large
                              gamme d'équipements et de logiciels qui, une fois connectés, peuvent amener un système à un tout autre niveau d'automatisation et d'intelligence, l’usage de
                              ces technologies pratiquement dans l'industrie a donné naissance à l’industrie 4.0.<br><br>
                              La transformation digitale de l’industrie (industrie 4.0) est basée sur l’usage de technologies digitales pour l’élaboration de solutions innovantes pour
                              le pilotage et la supervision des unités de production notamment dans l’industrie minière.<br><br>
                              Dans ce sens, Managem, MASciR et les partenaires académiques : l’Ecole Nationale Supérieure des Mines de Rabat, l’ENSIAS (UniversitéM5 Rabat) et l’Université
                              Cadi Ayyad de Marrakech lancent un projet de recherche intitulé « Mine Intelligente et Connectée », dans le cadre de l’appel à projet Al Khawarizmi de la CNRST.
                              Ce projet va donner lieu à des travaux de recherche grâce à 7 réalisations innovantes basées sur l’intelligence artificielleau profit de l'industrie minière .
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="facts section-bg" data-aos="fade-up">
                <div class="row counters">
                    <div class="col-6 text-center">
                        <span data-toggle="counter-up">7</span>
                        <p>Réalisations</p>
                    </div>

                    <div class="col-6 text-center">
                        <span data-toggle="counter-up">6</span>
                        <p>Partenaires</p>
                    </div>
                </div>
                <div class="row counters pt-5">
                    <div class="col-sm-12 col-md-12 text-center">
                        <span class="row">
                            <div class="col-3">
                                <span id="day" data-toggle="counter-up"></span>
                                <p>Jours</p>
                            </div>
                            <div class="col-1">:</div>
                            <div class="col-2">
                                <span id="hour" data-toggle="counter-up"></span>
                                <p>Heures</p>
                            </div>
                            <div class="col-1">:</div>
                            <div class="col-2">
                                <span id="minute" data-toggle="counter-up"></span>
                                <p>Minutes</p>
                            </div>
                            <div class="col-1">:</div>
                            <div class="col-2">
                                <span id="second" data-toggle="counter-up"></span>
                                <p>Secondes</p>
                            </div>
                            <h1>Depuis le commencement du projet</h1>
                        </span>
                    </div>
                </div>
            </section>
        </main>
        @include('components.footer')
        <script lang="javascript">
            function started_at(){
                const date_start = new Date('2021-02-15');
                var date_now = new Date();
                var diffTime = Math.abs(date_now - date_start);
                var diffDays = Math.floor(diffTime / 86400000);
                var diffHours = Math.floor((diffTime % 86400000) / 3600000);
                var diffMinutes = Math.floor((diffTime % 3600000) / 60000);
                var diffSeconds = Math.floor((diffTime % 60000) / 1000);
                document.getElementById('day').innerHTML = diffDays;
                document.getElementById('hour').innerHTML = diffHours;
                document.getElementById('minute').innerHTML = diffMinutes;
                document.getElementById('second').innerHTML = diffSeconds;
            }
            window.onload = function (){
                'use strict';
                setInterval(started_at, 1000);
            }
        </script>
    </body>

</html>
