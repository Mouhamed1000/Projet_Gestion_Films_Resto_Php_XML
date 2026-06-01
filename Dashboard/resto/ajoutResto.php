<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Ajouter un Restaurant </title>
        <link href="../../Assets/CSS/ajoutRestos.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/b31216a86e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <form action="ajoutResto.php" method="POST">
            <h2> Ajout Restaurant </h2>
            <!-- <div class="div1">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="nom" placeholder="Nom du restaurant"/>
            </div> -->

            <!-- Fiche restaurant -->
            <!-- <div class="fiche-restaurant"> -->
                <!-- Coordonnées -->
            <div class="div2">
                <div class="div1">
                    <label for="nom">Nom restaurant </label>
                    <input type="text" id="nom" name="nom" required><br>
                </div>
                <div class="div1">
                    <label for="adresse">Adresse </label>
                    <input type="text" id="adresse" name="adresse" required><br>
                </div>
                <div class="div1">
                    <label for="nom_restaurateur">Nom restaurateur </label>
                    <input type="text" id="nom_restaurateur" name="nom_restaurateur" required><br>
                </div>
            </div>
            <div class="div2">
                <!-- Description -->
                <div class="div1">
                    <label>Description </label>
                    <textarea id="description" name="description" rows="2" cols="50"></textarea><br>
                </div>
                <!-- Liste d'images -->
                <div class="div1">
                    <label>Liste images (image1, image2, ...) </label>
                    <input type="text" id="liste_images" name="liste_images"><br>
                </div>
            </div>

            <!-- Carte -->
            <!-- <div class="div2"> -->
                <h3>Plats à la carte</h3>
                <div class="div2">
                    <!-- Exemple de plat -->
                    <div class="div1">
                        <label for="plat1_nom">Nom plat </label>
                        <input type="text" id="plat1_nom" name="plat1_nom" required><br>
                    </div>
                    <div class="div1">
                        <label for="plat1_partie_repas">Partie repas </label>
                        <input type="text" id="plat1_partie_repas" name="plat1_partie_repas" required><br>
                    </div>
                    <div class="div1">
                        <label for="plat1_prix">Prix </label>
                        <input type="text" id="plat1_prix" name="plat1_prix" required><br>
                    </div>
                </div>
                   
                <div class="div1">
                    <label for="plat1_description">Description du plat</label>
                    <textarea id="plat1_description" name="plat1_description" rows="2" cols="50"></textarea><br>
                </div>
            <!-- </div> -->

            <!-- Menus -->
            <!-- <div class="div2"> -->

                <h3>Menus</h3>
                <div class="div2">
                    <!-- Exemple de menu -->
                    <div class="div1">
                        <label for="menu1_titre">Titre menu </label>
                        <input type="text" id="menu1_titre" name="menu1_titre" required><br>
                    </div>
                    <div class="div1">
                        <label for="menu1_prix">Prix menu </label>
                        <input type="text" id="menu1_prix" name="menu1_prix" required><br>
                    </div>
                    <div class="div1">
                        <label for="menu1_description">Description menu </label>
                        <textarea id="menu1_description" name="menu1_description" rows="2" cols="50"></textarea><br>
                    </div>
                </div>


                <!-- <div class="div2"> -->
                    <!-- Éléments du menu -->
                    <h3>Éléments menu </h3>
                    <div class="div2">
                        <div class="div1">
                        <!-- Exemple d'élément de menu -->
                              <label for="menu1_plat1">Nom du plat </label>
                              <input type="text" id="menu1_plat1" name="menu1_plat1" required><br>
                        </div>
                        <!-- Service à la carte -->
                        <div class="div1">
                              <label>Description service à la carte</label>
                              <input type="text" id="service_a_la_carte_description" name="service_a_la_carte_description"><br>
                        </div>
                    </div>
            <!-- </div> -->

            <div class="bouton"> 
                <input type="submit" value="Valider" class="valider">
            </div>
        </form>
    </body>
</html>

<?php 
   include 'functionsResto.php';

   if (isset($_POST['nom'], $_POST['adresse'], $_POST['nom_restaurateur'], $_POST['description'], $_POST['plat1_nom'], $_POST['plat1_partie_repas'], $_POST['plat1_prix'], $_POST['plat1_description'], $_POST['menu1_titre'], $_POST['menu1_prix'], $_POST['menu1_plat1'])) {     
        
        AjoutResto($_POST['nom'], $_POST['adresse'], $_POST['nom_restaurateur'], $_POST['description'], $_POST['liste_images'], $_POST['plat1_nom'], $_POST['plat1_partie_repas'], $_POST['plat1_prix'], $_POST['plat1_description'], $_POST['menu1_titre'], $_POST['menu1_prix'], $_POST['menu1_description'], $_POST['menu1_plat1'], $_POST['service_a_la_carte_description']);
     
        ?>

    <script> alert ("Restaurant ajoute avec succes") </script> 

    <?php
        header("Location : dashbordAdmin.php");

   }

?>
