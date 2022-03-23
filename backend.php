<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site_velo','root','');
    }
    catch(exception $e)
    {
        die ('erreur :'. $e -> getMessage());
    } 

?>