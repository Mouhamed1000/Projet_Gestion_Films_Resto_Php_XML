<?php
    include ('Nav.php');
    include ('functionsResto.php');

    $n = (int) $_GET['id'];
?>
<link href="../Assets/CSS/afficherFilms.css" rel="stylesheet"/>
<div class="boxdetail">

        <div class="box1detail">
            <section class="section2"></section>
        </div> 

        <div class="box2detail">
            <p class="texte"> <?php

            AfficherRestos($n); ?>
        </div>
</div>