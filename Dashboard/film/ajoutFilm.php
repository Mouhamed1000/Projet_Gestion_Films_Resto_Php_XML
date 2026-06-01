<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Ajout Film </title>
        <link href="../../Assets/CSS/ajout.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/b31216a86e.js" crossorigin="anonymous"></script>
    </head>

    <body>
      
    <form action="ajoutFilm.php" method="post">

        <h2>Ajouter un film</h2>

            <div class="div2">
                <div class="div1">
                    <i class="fa-solid fa-clapperboard"></i>
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>
                </div>
                <div class="div1">
                    <i class="fa-solid fa-clock"></i>
                    <label for="duree">Duree :</label><br>
                    <input type="text" id="duree" name="duree" required><br><br>
                </div>

            </div>

            <div class="div2">
                <div class = "div1">
                    <i class="fa-sharp-duotone fa-solid fa-film"></i>
                    <label for="genre">Genre :</label><br>
                    <input type="text" id="genre" name="genre" required><br><br>
                </div>
                <div class = "div1">
                    <i class="fa-solid fa-user"></i>
                    <label for="realisateur">Réalisateur :</label><br>
                    <input type="text" id="realisateur" name="realisateur" required><br><br>
                </div>   
            </div>

            <div class="div1 div3">
                <i class="fa-solid fa-user"></i>
                <label for="acteurs">Acteurs (séparés par des virgules) :</label><br>
                <input type="text" id="acteurs" name="acteurs" required><br><br>
            </div>

            <div class="div2">
                <div class="div1">
                    <i class="fa-solid fa-calendar-days"></i>
                    <label for="annee">Année :</label><br>
                    <input type="text" id="annee" name="annee" required><br><br>
                </div>
                <div class="div1">
                    <i class="fa-solid fa-language"></i>
                    <label for="langue">Langue :</label><br>
                    <input type="text" id="langue" name="langue" required><br><br>
                </div>
            </div>

            <div class="div1">
            <i class="fa-solid fa-user"></i>
                <label for="synopsis">Synopsis :</label><br>
                <textarea id="synopsis" name="synopsis" rows="4" required></textarea><br><br>
            </div>

            <div class="div2">
                <div class="div1">
                    <i class="fa-solid fa-user"></i>
                    <label for="presse">Presse (facultatif) :</label><br>
                    <input type="text" id="presse" name="presse"><br><br>
                </div>
                <div class="div1">
                    <i class="fa-solid fa-user"></i>
                    <label for="spectateurs">Spectateurs (facultatif) :</label><br>
                    <input type="text" id="spectateurs" name="spectateurs"><br><br>
                </div>
            </div>

            <h3>Horaires de projection :</h3>

            <div class="div2">
                <div class="div1">
                    <i class="fa-solid fa-calendar-day"></i>
                    <label for="jour1">Jour :</label>
                    <input type="text" id="jour1" name="jours[]" placeholder="Ex: Lundi"><br>
                </div>
                <div class="div1">
                    <i class="fa-solid fa-calendar-day"></i>
                    <label for="seances1">Horaires (séparées par des virgules) :</label>
                    <input type="text" id="seances1" name="horaire[]" placeholder="Ex: 14:00,16:30"><br><br>
                </div>
        </div>

        <div class="bouton">
            <input type="submit" value="Valider" class="valider"/>
        </div>

    </form>

</body>

<?php 

include 'functions.php';

// Vérification de l'existence des données POST
if (isset($_POST['titre'], $_POST['duree'], $_POST['genre'], $_POST['realisateur'],
    $_POST['acteurs'], $_POST['annee'], $_POST['langue'], $_POST['synopsis'],
    $_POST['presse'], $_POST['spectateurs'], $_POST['jours'], $_POST['horaire'])) {

    $xmlFile = 'prog_cinema.xml';

    // Convertir les horaires en tableau associatif jour => horaires
    $horaires = [];
    for ($i = 0; $i < count($_POST['jours']); $i++) {
        $jour = $_POST['jours'][$i];
        $horaires[$jour] = explode(',', $_POST['horaire'][$i]);
    }

    // Appeler la fonction ajouterFilm avec les données récupérées
    ajouterFilm($xmlFile, $_POST['titre'], $_POST['duree'], $_POST['genre'],
        $_POST['realisateur'], $_POST['acteurs'], $_POST['annee'], $_POST['langue'],
        $_POST['synopsis'], $_POST['presse'], $_POST['spectateurs'], $horaires);

        ?> <script> alert('Film ajoute avec succes !') </script>
    <?php
    header("Location : dashbordAdmin.php");

// } else {
//     if (empty($_POST['titre']) || empty($_POST['duree']) || empty($_POST['genre']) || empty($_POST['realisateur']) || empty($_POST['acteurs']) || empty($_POST['annee']) || empty($_POST['langue']) || empty($_POST['synopsis']) || empty($_POST['presse']) ||
//     empty($_POST['spectateurs']) || empty($_POST['jours']) || empty($_POST['horaire']))
    ?> <!-- <script> alert('Erreur : Tous les champs requis ne sont pas renseignés.') </script> -->
    <?php
}



?>