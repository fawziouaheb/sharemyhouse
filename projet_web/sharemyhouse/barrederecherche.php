<?php

require_once('annonce1.php');
require_once('component.php');

if(isset($_POST["reserve"])){
    echo $_POST['id_a'];
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="ProjetWeb"/>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <title>Sharemyhouse</title>
      <!-- --boostrap CDN-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    
    <?php
 try
 {
  $bdd = new PDO("mysql:host=localhost;dbname=house", "root", "");
  $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(Exception $e)
 {
   die("Une érreur a été trouvé : " . $e->getMessage());
 }
 $bdd->query("SET NAMES UTF8");
      if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
      {
        $_GET["terme"] = htmlspecialchars($_GET["terme"]); 
        $terme = $_GET["terme"];
        $terme = trim($terme); 
        $terme = strip_tags($terme);
      }
      if (isset($terme))
      {
        $terme = strtolower($terme);
        $select_terme = $bdd->prepare("SELECT * FROM appart WHERE prixapres  LIKE ? OR logement LIKE ? OR periode LIKE ? OR debutdispo LIKE ? OR adresse LIKE ? OR description LIKE ? " );
        $select_terme->execute(array("%".$terme."%","%".$terme."%","%".$terme."%","%".$terme."%","%".$terme."%","%".$terme."%"));
      }

    ?>

    <?php  
      require_once('header.php');?>
      <br>
      <center><h1>Share My House</h1></center>
     <div class="container">
  <div class="row text-center py-5">
        <div class="row text-center py-5">

        <form action = "barrederecherche.php" method = "get">
<input type = "search" name = "terme">
<input type = "submit" name = "s" value = "Rechercher">
</form> 
<div align="right">
<form action = "PrixSup.php" method = "get">
<div align="right">
<input type = "number" name = "terme"  placeholder = "min" >
</div>
<input type = "number" name = "terme2" placeholder = "max">
<div align="right">
<input type = "submit" name = "s" value = "Rechercher">
</div>
</form>  
</div>
    
</div>
    <?php
        $result=recu();
        if(isset($_SESSION["id_u"])){   
           while($row=$select_terme->fetch()){
            if($_SESSION['id_u']!=$row["id_b"]){
             component($row['logement'],$row['description'],$row['prixavant'],$row['prixapres'],$row['image1'],$row['image2'],$row['periode'],$row['id_a'],$row['id_b'],$row['debutdispo'],$row['findispo'],$row['adresse']);
            }}}else{
            while($row=$select_terme->fetch()){       
            component($row['logement'],$row['description'],$row['prixavant'],$row['prixapres'],$row['image1'],$row['image2'],$row['periode'],$row['id_a'],$row['id_b'],$row['debutdispo'],$row['findispo'],$row['adresse']);
        
        }}
      ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>