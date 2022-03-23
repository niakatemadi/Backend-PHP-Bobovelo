<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require("backend.php");

$donneebdd = $bdd -> query('SELECT titre, description, tarif, rayon_intervention FROM service ');
                    
        while($affichepseudomsg = $donneebdd -> fetch())
        {
            echo '<p>'.htmlspecialchars($affichepseudomsg['titre']).': '.htmlspecialchars($affichepseudomsg['description']).'</p>';
                   
        }

        $donneebdd -> closecursor();
?>