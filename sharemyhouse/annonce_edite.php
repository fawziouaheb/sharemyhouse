<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="ProjetWeb"/>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link type="text/css" rel="stylesheet" href="css/annonce_edite.css"/>

        <title>announce</title>
    </head>
    <body>


<?php
require_once ('config.php');
require_once('header.php'); 
if(isset($_SESSION["id_u"])){
$idl=$_POST['id_a'];
$_SESSION["id_appartement"]=$_POST["id_a"];
$sql= $bdd->query("SELECT* FROM appart WHERE `id_a` = $idl;");
$infolo=$sql->fetch();

}
?>
<?php 
  if(isset($_GET['reg_err']))
  {
      $err = htmlspecialchars($_GET['reg_err']);

      switch($err)
      {
          case 'success':
          ?>
              <div class="alert alert-success">
                  <strong>Succès</strong> inscription réussie !
              </div>
          <?php
          break;

          case 'password':
          ?>
              <div class="alert alert-danger">
                  <strong>Erreur</strong> mot de passe différent
              </div>
          <?php
          break;

          case 'email':
          ?>
              <div class="alert alert-danger">
                  <strong>Erreur</strong> email non valide
              </div>
          <?php
          break;
          case 'password_actuel':
              ?>
                  <div class="alert alert-danger">
                      <strong>Erreur</strong> mot passe actuel non valide
                  </div>
              <?php
              break;

              case 'password_nouveau':
                  ?>
                      <div class="alert alert-danger">
                          <strong>Erreur</strong> Tapez un mot pass differents que celui d'avant
                      </div>
                  <?php
                  break;
          
          case 'email_length':
          ?>
              <div class="alert alert-danger">
                  <strong>Erreur</strong> email trop long
              </div>
          <?php 
          break;

          case 'pseudo_length':
          ?>
              <div class="alert alert-danger">
                  <strong>Erreur</strong> pseudo trop long
              </div>
          <?php 
          case 'already':
          ?>
              <div class="alert alert-danger">
                  <strong>Erreur</strong> compte deja existant
              </div>
          <?php 

      }
  }
  ?>




<form action="annonce_edite_traitement.php" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">     <img  class="frame" src=<?php echo  $infolo['image2'] ?> ><span class="font-weight-bold"><?php echo $infolo['logement']?></span>  <span> </span>
    
        </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">announce setting</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Prix avant</label><input type="text" name="prixavant" class="form-control" placeholder=<?php echo $infolo['prixavant'] ?> value=""></div>
                    <div class="col-md-6"><label class="labels">Prix apres</label><input type="text"  name="prixapres" class="form-control" value="" placeholder=<?php echo $infolo['prixapres'] ?>></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">date debut disponibilé :</label> <?php echo $infolo['debutdispo'] ?> <br> <input type="date"  name="debutdispo"></div>
                    <div class="col-md-12"><label class="labels">date fin disponibilie :</label> <?php echo $infolo['findispo'] ?> <br><input type="date" name="findispo"></div>
           
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">description</label><input type="text" name='description' class="form-control" placeholder=<?php echo $infolo['description'] ?> value=""></div>
                   
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save announce</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <img  class="frame" src=<?php echo  $infolo['image1'] ?>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>  
        </form>
    </body>
</html>