<?php
require_once('config.php');

session_start();

if(!empty($_POST['logement']) && !empty($_POST['adresse'])   && !empty($_POST['prixapres']) && !empty($_POST['periode']) && !empty($_POST['debutdispo']) && !empty($_POST['findispo'])  && isset($_FILES['image1']) && isset($_FILES['image2'])   && isset($_FILES['image2'])  && !empty($_POST['description'])) {
    $logement= htmlspecialchars($_POST['logement']);
    $adresse= htmlspecialchars($_POST['adresse']);
    $prixavant = htmlspecialchars($_POST['prixavant']);
    $prixapres = htmlspecialchars($_POST['prixapres']);
    $debutdispo = htmlspecialchars($_POST['debutdispo']);
    $findispo = htmlspecialchars($_POST['findispo']);
    $periode = htmlspecialchars($_POST['periode']);
    $image1 = "./image/".$_FILES["image1"]["name"];
    $image2 = "./image/".$_FILES['image2']["name"];
    $description = htmlspecialchars($_POST['description']);
    $name=$_FILES["image1"]["name"];
    $name2=$_FILES["image2"]["name"];
    $resultat=move_uploaded_file($_FILES["image1"]["tmp_name"],"./image/".$name);
    $resultat=move_uploaded_file($_FILES["image2"]["tmp_name"],"./image/".$name2);
    $id_b=$_SESSION['id_u'];


   $patterne='/[a-z]+.*[1-9]+./';
   $patterne1='/.*[a-z]+.*/';
   if(strlen($adresse) <= 100){
     if(preg_match($patterne,$adresse)){
        if(preg_match($patterne1,$description)){
         $insert = $bdd->prepare("INSERT INTO appart(logement, prixavant, prixapres, periode, debutdispo, findispo, image1, image2, description, adresse, id_b) VALUES(:logement, :prixavant, :prixapres, :periode, :debutdispo, :findispo, :image1, :image2, :description, :adresse, $id_b)");
         $insert->execute(array(
        'logement' => $logement,
        'prixavant' => $prixavant,
        'prixapres' => $prixapres,
        'periode' => $periode,
        'debutdispo' => $debutdispo,
        'findispo' => $findispo,
        'image1' => $image1,
        'image2' => $image2,
        'description' => $description,
        'adresse' => $adresse

    ));
    
    header('Location:appartperso.php?reg_err=success');

       }else{header('Location: add.php?reg_err=forme_d'); die();}
      }else{header('Location: add.php?reg_err=forme_a'); die();}
}else{header('Location: add.php?reg_err=pseudo_length'); die();}









    
    }else{header('Location: add.php?reg_err=pseudo'); die();}

?>