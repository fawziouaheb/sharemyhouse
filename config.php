<?php 
try{
    $bdd =new PDO('mysql:host=localhost;
     dbname=upjv; charset=utf8', 'root', '');
    // Activation des erreurs PDO
     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
     $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 