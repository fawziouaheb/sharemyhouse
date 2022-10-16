<?php
require_once ('config.php');

require_once('header.php'); 
require_once('mail.php'); 





 if(isset($_SESSION["id_u"])){
    
$sql = $bdd->prepare(" INSERT INTO appart(id_a,logement,prixavant,prixapres,periode,debutdispo,findispo,image1,image2,description,id_b,adresse) VALUES(:id_a, :logement, :prixavant, :prixapres, :periode, :debutdispo, :findispo, :image1, :image2, :description, :id_b, :adresse)");
$sql->execute(array(
    'id_a'=>$_POST['id_a'],
    'logement'=>$_POST['logement'],
    'prixavant'=>$_POST['prixavant'],
    'prixapres'=>$_POST['prixapres'],
    'periode'=>$_POST['periode'],
    'debutdispo'=>$_POST['debutdispo'],
    'findispo'=>$_POST['findispo'],
    'image1'=>$_POST['image1'],
    'image2'=>$_POST['image2'],
    'description'=>$_POST['description'],
    'id_b'=>$_POST['id_b'],
    'adresse'=>$_POST['adresse']
));
              




$id=$_SESSION['id_a'];
     $idl=$_SESSION['id_u'];
     $id_b=$_SESSION['id_ba'];
     $sql= $bdd->query("SELECT* FROM appart WHERE  `appart`.`id_a` = $id;");
     $info=$sql->fetch();
    

    $sql= $bdd->query("SELECT* FROM user WHERE `id_u` = $idl;");
     $infolo=$sql->fetch();

     $sql= $bdd->query("SELECT* FROM user WHERE  `id_u` = $id_b;");
     $infoba=$sql->fetch();
    
     email2($infoba['email'],$infoba['nom'],$info['logement'],$info['prixapres'],$info['periode'],$info['debutdispo'],$info['findispo'],$infolo['pseudo'],$infolo['email'],$infolo['numero_tel']);
     email3($infolo['email'],$infolo['nom'],$info['logement'],$info['prixapres'],$info['periode'],$info['debutdispo'],$info['findispo'],$infoba['pseudo'],$infoba['email'],$infoba['numero_tel']);


















$id=$_POST["id_a"];
$supprime = $bdd->prepare("DELETE FROM `appart_non_dispo` WHERE `id_a` = $id;");
$supprime->execute();
header('Location:index.php'); // On redirige
    die();





 }














?>