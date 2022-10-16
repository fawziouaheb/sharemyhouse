<?php
  require_once ('config.php');
  require_once('header.php');
  if(!empty($_FILES['psps'])){
      $idl=$_SESSION['id_u'];
      $image_profile ="./image/".$_FILES['psps']['name'];
      $name=$_FILES["psps"]["name"];
          
      $resultat=move_uploaded_file($_FILES["psps"]["tmp_name"],"./image/".$name);
                          
      $ch=$bdd->query("UPDATE user SET image_profile='$image_profile'
          WHERE  id_u='$idl'");
          $ch->execute();
                          
  }

?>