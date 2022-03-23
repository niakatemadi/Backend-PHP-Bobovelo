<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');
$postdata = file_get_contents('php://input');

if ( isset($postdata) and !empty($postdata))
{
    $request = json_decode($postdata);
    $id_serviceadeleted = $request -> id_servicedeleted;
    print_r($id_serviceadeleted);

    $servicesupprimer = $bdd -> prepare('DELETE  FROM service WHERE id_service=?');


    $servicesupprimer -> execute(array($id_serviceadeleted));

        print_r($servicesupprimer);

    echo 'service supprimer';
}
?>