<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');
$postdata = file_get_contents('php://input');

if(isset($postdata) and !empty($postdata))
{
    $request = json_decode($postdata);

    $id_demandeservice = $request -> id_refusservice;
    
    $updatedemande = $bdd -> prepare("UPDATE demande SET etat='Commande refuser' WHERE id_demande =:id_demande ");
    $updatedemande -> execute(array(
        'id_demande' => $id_demandeservice
    ));

    


}

?>