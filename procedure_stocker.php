<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) and !empty($postdata))
{
    $request = json_decode($postdata);

    $lancement = $request -> automatique ;

    print_r($lancement);

    $proc_stocker= $bdd -> prepare("call updateDemande()");
    try {
        $proc_stocker -> execute();
    }catch(\Exception $e){

    }
}
?>