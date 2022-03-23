<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');
$postdata=file_get_contents('php://input');

if(isset($postdata) and !empty($postdata))
{
    $request= json_decode($postdata);

    $id_utilisateur = $request -> id_utilisateur;

    $messervices = $bdd -> prepare('SELECT * FROM service WHERE id_utilisateur=:id_utilisateur');

    $messervices -> execute(array(
        'id_utilisateur' => $id_utilisateur
    ));

    $displaydemande = $messervices -> fetchAll();

    echo json_encode($displaydemande);

    $messervices -> closeCursor();
}

?>