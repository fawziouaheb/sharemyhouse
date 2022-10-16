<?php

require_once('config1.php');
$id=$_POST['id_a'];
$supprime = $bdd->prepare("DELETE FROM `appart` WHERE `appart`.`id_a` = $id;");
$supprime->execute();
header('Location:appartperso.php'); // On redirige
    die();
?>