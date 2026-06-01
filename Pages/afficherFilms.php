<?php
    include ('Nav.php');
?>

<link href="../Assets/CSS/afficherFilms.css" rel="stylesheet"/>

<?php
    
    $xml = simplexml_load_file('../XML/prog_cinema.xml');

    // Compter le nombre de films
    $nombreFilms = count($xml->film);
?>

<div class="boxes">
    <?php for ($i=0; $i<$nombreFilms; $i++) { ?> 
        <div class="box1">
                <section class="section1"></section>
                <p class="texte"> <?php


                $titre =  $xml->film[$i]->titre;
                echo $titre; ?> </p>
                <a href="detailFilm.php?id=<?= $i ?>" class="detail">Voir Film</a>
        </div> 
    <?php } ?>

</div>
