<?php
//session_start();
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="ProjetWeb"/>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/slider.css">
        <link type="text/css" rel="stylesheet" href="css/reserve.css"/>
        
        <title>Reserver</title>
    </head>
  <body>
    <?php require_once('header.php'); 
      $_SESSION['id_ba']=$_POST['id_b'];
      $_SESSION['id_a']=$_POST['id_a'];
      $_SESSION['logement']=$_POST['logement'];
      $_SESSION['periode']=$_POST['periode'];
      $_SESSION['debutdispo']=$_POST['debutdispo'];
      $_SESSION['findispo']=$_POST['findispo'];
      $_SESSION['adresse']=$_POST['adresse'];
      $_SESSION['description']=$_POST['description'];
      $_SESSION['prixavant']=$_POST['prixavant'];
      $_SESSION['prixapres']=$_POST['prixapres'];
      $_SESSION['image2']=$_POST['image2'];
      $_SESSION['image1']=$_POST['image1'];
      if(!isset($_SESSION['id_u'])){
        header('Location: connexion.php');
        die();
      }
    ?>
    <div class="login-form">
      <div id="slider" class="image">
          <img src=<?php echo $_POST['image1']; ?> alt="" id="slide">
          <div id="precedent" onclick="ChangeSlide(-1)"><</div>
          <div id="suivant" onclick="ChangeSlide(1)">></div>
      </div> 
    
    <div class="row mt-2">
        <div class="col-md-12">  <span class="font-weight-bold">Type de logement :  <?php echo $_POST['logement']; ?></span></div><br>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">  <span class="font-weight-bold">Adresse :  <?php echo $_POST['adresse']; ?></span></div><br>
    </div>
    
    <div class="row mt-2">
         <div class="col-md-12">  <span class="font-weight-bold">Description :  <?php echo $_POST['description']; ?></span></div><br>
    </div>
      
    <div class="row mt-2">
         <div class="col-md-12">  <span class="font-weight-bold">Début disponibilité : <?php echo $_POST['debutdispo']; ?></span></div>            <br>
    </div>
      
    <div class="row mt-2">
         <div class="col-md-12">  <span class="font-weight-bold">Fin disponibilité : <?php echo $_POST['findispo']; ?></span></div><br>
    </div>

    <div class="row mt-2">
      <div class="col-md-12">  <span class="font-weight-bold">Prix avant :  <?php echo $_POST['prixavant'];?>$</span></div><br>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">  <span class="font-weight-bold">Prix apres : <?php echo $_POST['prixapres'];?>$</span></div><br>
    </div>

    <div class="row mt-2">
       <div class="col-md-12">  <span class="font-weight-bold">Profile du proprietaire : <a href="profile_prop.php" class="links">clickez ici pour plus d'info</a></span></div><br>
    </div>
      
    <br>
    <form action="confirmer.php" method="post">
           <button type="submit" class="btn btn-primary btn-block">Reserver</button>
    </form>
    
    </div>
  </body>
</html>
      
<script>
var slide = new Array("<?php echo $_POST['image1']; ?>","<?php echo $_POST['image2'];?>");
var numero = 0;

function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
}
setInterval("ChangeSlide(1)", 2000);
</script>

<style>

.login-form {
  width: 600px;
  height: 700px;
  margin: 50px auto;
  background:#f7f7f7;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 30px;
}

  </style>
