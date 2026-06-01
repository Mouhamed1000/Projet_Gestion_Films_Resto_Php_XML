<?php
    function nav () { ?>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Libre+Franklin&family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Proza+Libre&display=swap" rel="stylesheet">  
    <link href="../Assets/CSS/dashAdmin.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/b31216a86e.js" crossorigin="anonymous"></script>
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