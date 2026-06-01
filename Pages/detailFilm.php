<?php
    include ('Nav.php');
    include ('functions.php');

    $n = (int) $_GET['id'];
?>
<link href="../Assets/CSS/afficherFilms.css" rel="stylesheet"/>
<div class="boxdetail">

        <div class="box1detail">
            <section class="section1"></section>
        </div> 

        <div class="box2detail">
            <p class="texte"> <?php


            AfficherCinemas($n); ?>
        </div>
</div>