<?php
    function nav () { ?>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Libre+Franklin&family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Proza+Libre&display=swap" rel="stylesheet">  
    <link href="../Assets/CSS/dashAdmin.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/b31216a86e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <nav>
            <div>
                <img src= "../Assets/Images/logo.png" width = "50px"/>
                <p class="txt1"> Interfaces <br/> Administration </p>
            </div>
            <ul>
                <li>
                    <a href="dashbordAdmin.php" class="element">
                        <i class="fa-solid fa-house"></i>
                        <span> Accueil </span>
                    </a>
                </li>
                <li>
                    <a href="#film" class="element">
                        <i class="fa-solid fa-clapperboard"></i>
                        <span > Films <i class="fa-solid fa-angle-down"></i> </span>
                    </a>
                    <ul class="sous-menu" id="film">
                        <li class="element"> <a href="film/ajoutFilm.php"> Ajouter Film </a> </li>
                        <li class="element"> <a href="#"> Modifier Film </a> </li>
                        <li class="element"> <a href="#"> Supprimer Film </a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#resto" class="element">
                        <i class="fa-solid fa-utensils"></i>
                        <span > Restaurant <i class="fa-solid fa-angle-down"></i> </span>
                    </a>
                    <ul class="sous-menu" id="resto">
                        <li class="element"> <a href="resto/ajoutResto.php"> Ajouter Resto </a> </li>
                        <li class="element"> <a href="#"> Modifier Resto </a> </li>
                        <li class="element"> <a href="#"> Supprimer Resto </a> </li>
                    </ul>
                </li> <li>
                    <a href="../index.php" class="element">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span > Deconnexion </span>
                    </a>
                </li>
              
                
            </ul>
        </nav>

<?php } 

nav()
?>


<section class="sectAdmin">

    <section  class="sect1">

        <div class="box1">

            <div>

                <i class="fa-solid fa-clapperboard"></i>
                <h4> Nombre Films </h4>
                <?php
                    $xml = simplexml_load_file("../XML/prog_cinema.xml");
                    $nombreFilms = count($xml->film);
                ?>

            </div>
            <span> <?=$nombreFilms?> </span>
        </div>

        <div class="box2">

            <div>

                <i class="fa-solid fa-utensils"></i>            
                <h4> Nombre restaurants </h4>
                <?php
                    $xml = simplexml_load_file("../XML/prog_restaurant.xml");
                    $nombreRestos = count($xml->fiche_restaurant);
                ?>

            </div>
            <span> <?=$nombreRestos?> </span>
        </div>
        
    </section>

    <section class="sect2">

        <div class="sect2Content">
        
            <?php

            $mois = [
                "Jan", "Fév", "Mar", "Avr", "Mai", "Juin",
                "Juil", "Aoû", "Sep", "Oct", "Nov", "Déc"
            ];

            $visiteurs = [];

            $base = 5000;

            for ($i = 0; $i < 12; $i++) {

                // légère croissance + variation aléatoire
                $base += rand(-300, 800);

                if ($base < 1000) {
                    $base = 1000;
                }

                $visiteurs[] = $base;
            }

            ?>

            <canvas id="courbe"></canvas>

            <script>
                const ctx = document.getElementById('courbe');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?= json_encode($mois) ?>,
                        datasets: [{
                            label: 'Simulation du nombre de Visiteurs au cours de l\'an',
                            data: <?= json_encode($visiteurs) ?>,
                            borderColor: '#268bc9',
                            backgroundColor: 'rgba(0, 0, 255, 0.1)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: false
                            }
                        }
                    }
                });
            </script>

        </div>


    </section>

</section>
        