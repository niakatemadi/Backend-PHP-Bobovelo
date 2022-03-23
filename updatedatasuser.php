<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');

$postdata=file_get_contents("php://input");
if(isset($postdata) & !empty($postdata))
{

    $request = json_decode($postdata);
    print_r($request);

    $prenom = $request -> prenom;
    print_r($prenom);
    $nom = $request -> nom;
    print_r($nom);
    $email = $request -> email;
    print_r($email);
    $telephone = $request -> telephone;
    print_r($telephone);
    $adresse = $request -> adresse;
    print_r($adresse);
    $password = $request -> motdepasse;
    print_r($password);

    $update = $bdd -> prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone, adresse=:adresse WHERE password=:motdepasse');


    $update -> execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'telephone' => $telephone,
        'adresse' => $adresse,
        'motdepasse' => $password
    ));

    if($update){
        
    }
    
    print_r($update);



}




?>