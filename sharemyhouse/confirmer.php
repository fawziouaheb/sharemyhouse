<?php

  require_once ('config.php');

 require_once('header.php'); 
 require_once('mail.php'); 
if(isset($_SESSION["id_u"])){
$insert = $bdd->prepare(" INSERT INTO reserver(id_l,id_a,id_b) VALUES(:id_l, :id_a, :id_b)");
$insert->execute(array(
    'id_l'=>$_SESSION['id_u'],
    'id_a'=>$_SESSION['id_a'],
     'id_b'=>$_SESSION['id_ba'] ));

$insert = $bdd->prepare(" INSERT INTO appart_non_dispo(id_a,logement,periode,debutdispo,findispo,adresse,description,id_l,image1,image2,prixavant,prixapres,id_b)  VALUES(:id_a, :logement, :periode, :debutdispo, :findispo, :adresse, :description, :id_l, :image1, :image2, :prixavant, :prixapres, :id_b)");
$insert->execute(array(
'id_a'=>$_SESSION['id_a'],
'logement'=>$_SESSION['logement'],
'periode'=>$_SESSION['periode'],
'debutdispo'=>$_SESSION['debutdispo'],
'findispo'=>$_SESSION['findispo'],
'adresse'=>$_SESSION['adresse'],
'description'=>$_SESSION['description'],
'id_l'=>$_SESSION['id_u'],
'image1'=>$_SESSION['image1'],
'image2'=>$_SESSION['image2'],
'prixavant'=>$_SESSION['prixavant'],
'prixapres'=>$_SESSION['prixapres'],
'id_b'=>$_SESSION['id_ba']
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
    
     email1($infoba['email'],$infoba['nom'],$info['logement'],$info['prixapres'],$info['periode'],$info['debutdispo'],$info['findispo'],$infolo['pseudo'],$infolo['email'],$infolo['numero_tel']);
     email($infolo['email'],$infolo['nom'],$info['logement'],$info['prixapres'],$info['periode'],$info['debutdispo'],$info['findispo'],$infoba['pseudo'],$infoba['email'],$infoba['numero_tel']);
     $supprime = $bdd->prepare("DELETE FROM `appart` WHERE `appart`.`id_a` = $id;");
     $supprime->execute();
     header('Location:index.php'); // On redirige
         die();
         
     
 }

?>



