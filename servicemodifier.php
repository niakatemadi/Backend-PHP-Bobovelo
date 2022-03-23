<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');

$postdata=file_get_contents('php://input');

if( isset($postdata) and !empty($postdata))
{
    $request = json_decode($postdata);

    $ville = $request -> ville;
    $description = $request -> description;
    $tarif = $request -> tarif;
    $titre = $request -> titre;
    $id = $request -> id_serviceamodifier;


    $updateservice = $bdd -> prepare('UPDATE service SET ville=:ville, titre=:titre, description=:description, tarif=:tarif WHERE id_service=:id');
    
    $updateservice -> execute(array(
        'ville' => $ville,
        'titre' => $titre,
        'description' => $description,
        'tarif' => $tarif,
        'id' => $id
    ));

    $display_serviceupdated = $updateservice -> fetch();
    


    echo json_encode($display_serviceupdated);
}
?>