
<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) and !empty($postdata))
{

    $request = json_decode($postdata);

    $id_service = $request -> servicechoisis;


    $demandespourceservice = $bdd -> prepare('SELECT * FROM demande WHERE id_service = :id_service');

    $demandespourceservice -> execute(array(
        'id_service' => $id_service
    ));

    $affichedemandepourservice = $demandespourceservice -> fetchAll();

    echo json_encode($affichedemandepourservice);
}
?>