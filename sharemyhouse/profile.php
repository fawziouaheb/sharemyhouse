<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="ProjetWeb"/>

      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      <link type="text/css" rel="stylesheet" href="css/profile_prop.css"/>
      <title>Page Profil</title>
  </head>
  <body>
    <?php
      require_once ('config.php');
      
      require_once('header.php'); 
      if(isset($_SESSION["id_u"])){
          $idl=$_SESSION['id_u'];
          $sql= $bdd->query("SELECT* FROM user WHERE `id_u` = $idl;");
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
            <strong>Succès</strong> Inscription réussie !
          </div>
      <?php
            break;
          case 'password':
      ?>
          <div class="alert alert-danger">
              <strong>Erreur</strong> Mot de passe différent
          </div>
      <?php
          break;
        case 'email':
      ?>
          <div class="alert alert-danger">
              <strong>Erreur</strong> Email non valide
          </div>
      <?php
          break;
        case 'password_actuel':
      ?>
          <div class="alert alert-danger">
            <strong>Erreur</strong> Mot passe actuel non correcte
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
            <strong>Erreur</strong> Email trop long
          </div>
      <?php 
          break;
        case 'pseudo_length':
      ?>
          <div class="alert alert-danger">
            <strong>Erreur</strong> Pseudo trop long
          </div>
      <?php 
        case 'already':
      ?>
          <div class="alert alert-danger">
            <strong>Erreur</strong> Compte deja existant
          </div>
    <?php 
          }
      }
    ?>
    
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <form action="profile_image.php" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img   class="ava" src=<?php echo $infolo['image_profile']?>><span class="font-weight-bold"><?php echo $infolo["pseudo"] ?></span><span class="text-black-50"><?php echo $infolo["email"] ?> </span><span> </span></div>
   
            <h5> Modifier la photo de votre profile</h5><br><input type="file" name="psps" accept="image/png"   size="50">
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
          </form>
        </div>

        <div class="col-md-5 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
            </div>
            <form action="profile_edit.php" method="post" enctype="multipart/form-data">
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control"  name="nom" placeholder=<?php echo  $infolo["nom"] ?>></div>
                <div class="col-md-6"><label class="labels">Pseudo</label><input type="text" class="form-control" name="pseudo"   placeholder=<?php echo  $infolo["pseudo"] ?>></div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12"><label class="labels">numero de telephone</label><input type="text" name="numero_tel" class="form-control" placeholder=<?php echo  $infolo["numero_tel"] ?> value=""></div>
              
                <div class="col-md-12"><label class="labels">Email ID</label><input type="text"  name="email" class="form-control" placeholder=<?php echo  $infolo["email"] ?> ></div>
                <div class="col-md-12"><label class="labels">Mots de passe actuel</label><input type="password" class="form-control" name='password_actuel' placeholder="Tapez votre mot de passe actuel" ></div>
                <div class="col-md-12"><label class="labels">new password</label><input type="password" class="form-control" name='password' placeholder="Tapez le nouveau mot de passe" ></div>
                <div class="col-md-12"><label class="labels">retay-new-password</label><input type="password" class="form-control" name='password_retype' placeholder="Retapez le nouveau mot de passe" ></div>
              </div>
  
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </form>
          </div>
        </div>  
      </div>
    </div>
  </body>
</html>