<?php

function AfficherCinemas($val) 
{
    // Chemin vers le fichier XML
    $xmlFile = '../XML/prog_cinema.xml';
    
    // Charger le fichier XML
    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);

        $film = $xml->film[$val]; // Récupère le premier film dans la liste
        // Afficher les détails des films
            echo "Titre: " . $film->titre . "<br>";
            echo "Durée: " . $film->duree . "<br>";
            echo "Genre: " . $film->genre . "<br>";
            echo "Réalisateur: " . $film->realisateur . "<br>";

            echo "Acteurs: ";
            $acteurs = [];
            foreach ($film->acteurs->acteur as $acteur) {
                $acteurs[] = (string) $acteur;
            }
            echo implode(', ', $acteurs) . "<br>";

            echo "Année: " . $film->annee . "<br>";
            echo "Langue: " . $film->langue . "<br>";
            echo "Synopsis: " . $film->synopsis . "<br>";

            echo "Horaires:<br>";
            foreach ($film->horaires->jour as $jour) {
                $monJour = (string) $jour['name'];
                echo $monJour . ": ";
                foreach ($jour->horaire as $horaire) {
                    echo $horaire . " ";
                }
                echo "<br>";
            }

            echo "<br>";
    } else {
        die('Erreur: Le fichier XML n\'existe pas.');
    }
}

?>

<?php

function ajouterFilm($xmlFile, $titre, $duree, $genre, $realisateur, $acteurs, $annee, $langue, $synopsis, $presse, $spectateurs, $horaires) {
    // Charger le fichier XML avec SimpleXML
    $films = simplexml_load_file($xmlFile);

    // Créer un nouvel élément film
    $nouveauFilm = $films->addChild('film');
    $nouveauFilm->addAttribute('presse', $presse); // Assurez-vous que $presse est une valeur valide comme "3/5"
    $nouveauFilm->addAttribute('spectateurs', $spectateurs); // Assurez-vous que $spectateurs est une valeur valide comme "4/5"

    // Ajouter les éléments enfants au film
    $nouveauFilm->addChild('titre', $titre);
    $nouveauFilm->addChild('duree', $duree);
    $nouveauFilm->addChild('genre', $genre);
    $nouveauFilm->addChild('realisateur', $realisateur);

    // Acteurs est un élément avec plusieurs sous-éléments acteur
    $acteursElement = $nouveauFilm->addChild('acteurs');
    $acteursArray = explode(',', $acteurs); // Convertir la chaîne d'acteurs en tableau

    foreach ($acteursArray as $acteur) {
        $acteursElement->addChild('acteur', trim($acteur)); // Ajouter chaque acteur comme un élément acteur
    }

    $nouveauFilm->addChild('annee', $annee);
    $nouveauFilm->addChild('langue', $langue);
    $nouveauFilm->addChild('synopsis', $synopsis);

    // Ajouter les horaires de projection
    $horairesElement = $nouveauFilm->addChild('horaires');
    foreach ($horaires as $jour => $seances) {
        $jourElement = $horairesElement->addChild('jour');
        $jourElement->addAttribute('name', $jour);
        foreach ($seances as $horaire) {
            $jourElement->addChild('horaire', $horaire);
        }
    }

    // Sauvegarder les modifications dans le fichier XML
    $films->asXML($xmlFile);
}


?>

