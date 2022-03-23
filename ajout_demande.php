<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *"); 
require("backend.php");

$postdata=file_get_contents("php://input");

if(isset($postdata) & !empty($postdata))
{
    $request=json_decode($postdata);

    $sujet = $request -> sujet;
    $description = $request -> description;
    $adresse = $request -> adresse;
    $ville = $request -> ville;
    $categorie = $request -> categorie;
    $id_service = $request -> id_service;
    $id_utilisateur = $request -> id_utilisateur;
    $date_intervention = $request -> date_intervention;
    $etat = 'ENVOYEE';
    
    if( isset($ville) and isset($categorie))
    {
        echo 'yes';
    };

    $insertionbdd = $bdd -> prepare('INSERT INTO demande(sujet_demande,etat,adresse,date_intervention, ville, categorie, description,id_service, id_utilisateur) VALUES(:sujet_demande,:etat,:adresse,:date_intervention,:ville,:categorie,:description,:id_service, :id_utilisateur) ');
 
    $insertionbdd -> execute(array(
        'sujet_demande' => $sujet,
        'etat' => $etat,
        'adresse' => $adresse,
        'date_intervention' => $date_intervention,
        'ville' => $ville,
        'categorie' => $categorie,
        'description' => $description,
        'id_service' => $id_service,
        'id_utilisateur' => $id_utilisateur


    ));
}


?>