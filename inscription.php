<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *"); 
require("backend.php");

$postdata=file_get_contents("php://input");

if(isset($postdata) & !empty($postdata))
{
    $request=json_decode($postdata);
    
    print_r($request); 

    $firstname = $request -> firstName;
    $lastname = $request -> lastName;
    $telephone = $request -> telephone;
    $email = $request -> email;
    $adresse = $request -> adresse;
    $password = $request -> password;
    print_r($firstname);
    print_r($lastname);
    print_r($telephone);
    print_r($email);
    print_r($adresse);
    print_r($password);

    $insertionbdd = $bdd -> prepare('INSERT INTO utilisateur(nom,prenom,email,password,telephone,adresse) VALUES(:lastname,:firstname,:email,:password, :telephone,:adresse) ');
 
    $insertionbdd -> execute(array(
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => $password,
        'telephone' => $telephone,
        'adresse' => $adresse
    ));
}


?>