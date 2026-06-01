<?php

function AfficherRestos ($val2)
{
    // Charger le fichier XML
    $xmlFile2 = simplexml_load_file('../XML/prog_restaurant.xml');
    if ($xmlFile2 === false) {
        die('Erreur lors du chargement du fichier XML');
    }

    $xml = $xmlFile2->fiche_restaurant[$val2]; // Récupère le premier film dans la liste


    // Afficher les informations du restaurant
    echo '<h1>' . $xml->coordonnees->nom . '</h1>';
    echo '<p>Propriétaire: ' . $xml->coordonnees->nom_restaurateur . '</p>';
    echo '<h2>Coordonnées</h2>';
    echo '<p>Nom: ' . $xml->coordonnees->nom . '</p>';
    echo '<p>Adresse: ' . $xml->coordonnees->adresse . '</p>';

    echo '<h2>Description</h2>';
    if (isset($xml->description->paragraphe)) {
        foreach ($xml->description->paragraphe as $paragraphe) {
            echo '<p>' . $paragraphe . '</p>';
        }
    }

    echo '<h3>Liste des points forts</h3>';
    if (isset($xml->description->liste->item)) {
        echo '<ul>';
        foreach ($xml->description->liste->item as $item) {
            echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
    }

    echo '<h3>Image</h3>';
    if (isset($xml->description->image)) {
        $image = $xml->description->image;
        echo '<img src="' . $image['url'] . '" alt="Image du restaurant" style="max-width: 400px;">';
    }

    echo '<h2>Carte</h2>';
    if (isset($xml->carte->plat)) {
        foreach ($xml->carte->plat as $plat) {
            echo '<h3>' . $plat->partie . '</h3>';
            echo '<p>' . $plat->description . ' - ' . $plat->prix . ' EUR</p>';
        }
    }

    echo '<h2>Menus</h2>';
    if (isset($xml->menus->menu)) {
        foreach ($xml->menus->menu as $menu) {
            echo '<h3>' . $menu->titre . '</h3>';
            echo '<p>' . $menu->description . ' - ' . $menu->prix . ' EUR</p>';
            if (isset($menu->elements->platref)) {
                echo '<h4>Éléments du menu</h4>';
                echo '<ul>';
                foreach ($menu->elements->platref as $platref) {
                    // Ici, vous pourriez récupérer les détails des plats référencés par leur IDREF
                    // Dans cet exemple, nous n'avons pas de détails supplémentaires pour les plats.
                    echo '<li>' . $platref['idref'] . '</li>';
                }
                echo '</ul>';
            }
        }
    }

}

function AjoutResto($nom_restaurant, $adresse, $nom_restaurateur, $description, $liste_images, $plat1_nom, $plat1_partie_repas, $plat1_prix, $plat1_description, $menu1_titre, $menu1_prix, $menu1_description, $menu1_plat1, $service_a_la_carte_description) {
    $xmlFile = '../XML/prog_restaurant.xml'; 

    // Vérifier si le fichier XML existe
    if (!file_exists($xmlFile)) {
        // Créer un nouvel élément racine restaurants si le fichier n'existe pas encore
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><restaurants></restaurants>');
    } else {
        // Charger le fichier XML existant
        $xml = simplexml_load_file($xmlFile);
    }

    // Création de l'élément fiche_restaurant
    $fiche_restaurant = $xml->addChild('fiche_restaurant');

    // Création de l'élément coordonnees
    $coordonnees = $fiche_restaurant->addChild('coordonnees');
    $coordonnees->addChild('nom', htmlspecialchars($nom_restaurant));
    $coordonnees->addChild('adresse', htmlspecialchars($adresse));
    $coordonnees->addChild('nom_restaurateur', htmlspecialchars($nom_restaurateur));

    // Création de l'élément description
    $description_element = $fiche_restaurant->addChild('description');
    $paragraphes = explode("\n", htmlspecialchars($description));
    foreach ($paragraphes as $paragraphe_text) {
        $description_element->addChild('paragraphe', $paragraphe_text);
    }

    // Élément liste_images
    if (!empty($liste_images)) {
        $liste_images_element = $description_element->addChild('liste_images');
        $images = explode(",", $liste_images);
        foreach ($images as $image_url) {
            $image = $liste_images_element->addChild('image');
            $image->addAttribute('url', trim($image_url));
        }
    }

    // Élément carte
    $carte_element = $fiche_restaurant->addChild('carte');
    $plat_element = $carte_element->addChild('plat');
    $plat_element->addChild('partie_repas', htmlspecialchars($plat1_partie_repas));
    $plat_element->addChild('prix', htmlspecialchars($plat1_prix));
    $plat_element->addChild('description_plat', htmlspecialchars($plat1_description));

    // Élément service_a_la_carte
    $service_a_la_carte_element = $fiche_restaurant->addChild('service_a_la_carte');
    $service_a_la_carte_element->addAttribute('description', htmlspecialchars($service_a_la_carte_description));

    // Sauvegarde du fichier XML
    $xml->asXML($xmlFile);

}


?>
