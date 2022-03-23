<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');
$postdatas=file_get_contents("php://input");

if(isset($postdatas) & !empty($postdatas))
{
    $request=json_decode($postdatas);
    $mailing = $request -> mailing;
    $motdepasse = $request -> motdepasse;
    //print_r($mailing);
    //print_r($motdepasse);

    $seek = $bdd -> prepare('SELECT * FROM utilisateur WHERE email =?');
    $seek->execute(array($mailing));
    //print_r($seek);
    $resultat = $seek->fetch();
    //print_r($resultat);

    if($resultat['password']==$motdepasse)
    {
        $session['email']= $resultat['email'];
        $session['password']= $resultat['password'];
        $session['prenom'] = $resultat['prenom'];
        $session['nom']= $resultat['nom'];
        $session['telephone']= $resultat['telephone'];
        $session['adresse']= $resultat['adresse'];
        $session['id_utilisateur']= $resultat['id_utilisateur'];
        echo json_encode($session, JSON_PRETTY_PRINT);
    }
    
    
   
}

?>