<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *"); 
require("backend.php");

$postdata=file_get_contents("php://input");

if(isset($postdata) & !empty($postdata))
{
    $request=json_decode($postdata);

    print_r($request); 

    $titre = $request -> titre;
    $description = $request -> description;
    $tarif = $request -> tarif;
    $rayon_intervention = $request -> rayon_intervention;
    $ville = $request -> ville;
    $categorie = $request -> categorie;
    $id_utilisateur = $request -> id_utilisateur;
    print_r($titre);
    print_r($description);
    print_r($tarif);
    print_r($rayon_intervention);
    print_r($ville);
    print_r($categorie);

    $insertionbdd = $bdd -> prepare('INSERT INTO service(titre, description, tarif, rayon_intervention, ville, categorie,id_utilisateur) VALUES(:titre,:description,:tarif,:rayon_intervention,:ville,:categorie,:id_utilisateur) ');
 
    $insertionbdd -> execute(array(
        'titre' => $titre,
        'description' => $description,
        'tarif' => $tarif,
        'rayon_intervention' => $rayon_intervention,
        'ville' => $ville,
        'categorie' => $categorie,
        'id_utilisateur' => $id_utilisateur

    ));
}


?>