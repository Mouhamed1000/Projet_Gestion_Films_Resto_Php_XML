<?php
    include ('Nav.php');
?>
<link href="../Assets/CSS/afficherFilms.css" rel="stylesheet"/>

<?php
    
    $xml = simplexml_load_file('../XML/prog_restaurant.xml');

    // Compter le nombre de films
    $nombreRestos = count($xml->fiche_restaurant);
?>

<div class="boxes">
    <?php for ($i=0; $i<$nombreRestos; $i++) { ?> 
        <div class="box1">

                <section class="section2"></section>
                <p class="texte"> <?php

                $nom =  $xml->fiche_restaurant[$i]->coordonnees->nom;
                echo $nom; ?> </p>
                <a href="detailResto.php?id=<?= $i ?>" class="detail2">Voir Restaurant</a>
        </div> 
    <?php } ?>

</div>
