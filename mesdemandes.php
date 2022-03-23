<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require('backend.php');
$postdata=file_get_contents("php://input");

if(isset($postdata) and !empty($postdata))
{
     
        $request = json_decode($postdata);
        $id_utilisateur = $request -> id_utilisateur;

        if($bdd)
        {
        $req = "call updateDemande()";
        $proc_stocker = $bdd -> prepare($req);
        $proc_stocker -> execute();

        $mesdemandes = $bdd -> prepare("SELECT * FROM demande WHERE id_utilisateur = :id_utilisateur ORDER BY etat asc");

        $mesdemandes -> execute(array(
            'id_utilisateur' => $id_utilisateur
        ));
    
      

        while($affiche = $mesdemandes -> fetchAll())
        {
            echo json_encode($affiche);
        };
        
        $mesdemandes -> closecursor();
        }

      

};

?>