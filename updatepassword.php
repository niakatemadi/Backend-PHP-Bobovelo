<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');

$postdata =file_get_contents('php://input');

if( isset($postdata) and !empty($postdata))
{
    $request =json_decode($postdata);

    $mynewpassword = $request -> mynewpassword;
    $my_id = $request -> my_id;
    //print_r($mynewpassword);
    //print_r($my_id);

    $newpassword = $bdd -> prepare('UPDATE utilisateur SET password = ? WHERE id_utilisateur =?');

    $newpassword -> execute(array($mynewpassword,$my_id));
}

?>