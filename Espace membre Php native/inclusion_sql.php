<?php
    try
    {
        $bdd=new PDO('mysql:host=localhost;dbname=cocohub','root', '');
    }
catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }