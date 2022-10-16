<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/styles.css">
        <title>navbar</title>
    </head>
     <body> 
        <header>
            <?php
            if (!empty($_SESSION['id_u'])){?>
            <h6 class="logo"><i>Share my house</i></h6>
            <nav>
                <ul class="nav__links">
                    <li> <a href="http://localhost/sharemyhouse/index.php"> Accueil</a></li>
                    <li> <a href="http://localhost/sharemyhouse/add.php"> Déposer une annonce</a></li>
                    <li> <a href="http://localhost/sharemyhouse/appartperso.php"> Mes annonces</a></li>
                    <li> <a href="http://localhost/sharemyhouse/appart_reserver.php">Reserves</a></li>
                    <li> <a href="http://localhost/sharemyhouse/messagerie.php">Messagerie</a></li>
                </ul>
            </nav>
                
                
                <div class="bt">
                    <a  class="cta"  href="http://localhost/sharemyhouse/profile.php"><img src=<?php echo $_SESSION['image_profile'] ?> alt="Avatar" class="avatar"></a>
                    <a class="cta" href="http://localhost/sharemyhouse/deconnexion.php"><button><?php echo "Déconnexion"; ?></button></a>
                    </div>
            <?php 
            }
            else{
            ?>
                <h5 class="logo"><i>Share my house</i></h5>
            <nav>
                <ul class="nav__links">
                    <li> <a href="http://localhost/sharemyhouse/index.php"> Accueil</a></li>
                    <li> <a href="http://localhost/sharemyhouse/inscription.php">Inscription</a></li>
                </ul>
            </nav>
                    <a class="cta" href="http://localhost/sharemyhouse/connexion.php"><button><?php echo "Compte"; ?></button></a>
            <?php 
                }
            ?>
        </header>
        <style>
            .avatar {
                vertical-align: middle;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
        </style>
    </body>
</html>
