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

    <title>Inscription</title>
</head>
<body>

<?php
require_once ('config.php');

require_once('header.php');
if(isset($_SESSION["id_u"])){
    $idl=$_SESSION['id_ba'];
    $sql= $bdd->query("SELECT* FROM user WHERE `id_u` = $idl;");
    $infolo=$sql->fetch();


    $sql1= $bdd->query("SELECT id_a FROM appart WHERE `id_b` = $idl");
    $na= $sql1->rowCount();

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
$idv=$_SESSION['id_ba'];
$moyenne = $bdd->query("SELECT AVG(note) FROM commentaires where id_v='$idv'")->fetch();
?>

<div class="container rounded bg-white mt-5 mb-5 shadow">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img   class="ava" src=<?php echo $infolo['image_profile']?>><span class="font-weight-bold"><?php echo $infolo['nom']?></span><span class="text-black-50"><?php echo $infolo["email"] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><span class="font-weight-bold">Nom :  <?php echo $infolo['nom'] ?></span></div><br>


                </div>
                <div class="row mt-2">
                    <div class="col-md-12"> <span class="font-weight-bold">Email : <?php echo $infolo['email'] ?></span></div><br>
                </div>

                <div class="row mt-2">

                    <div class="col-md-12">  <span class="font-weight-bold">Numero de Tel :   <?php echo $infolo['numero_tel'] ?></span></div><br>

                </div>
                <div class="row mt-2">
                    <div class="col-md-12"> <span class="font-weight-bold">Date d'inscription : <?php echo $infolo['date_inscription'] ?></span></div><br>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"> <span class="font-weight-bold">Nombre d'announce  : <?php echo $na ?></span></div><br>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"> <span class="font-weight-bold">Note moyenne  : <?php echo (float)$moyenne['AVG(note)'];  ?></span></div><br>
                </div>
                <form action="chat.php">
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Contacter</button></div>
                </form>
                <form action="review.php">
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Evaluer</button></div>
                </form>
                <?php
                    $idu = $_SESSION['id_u'];
                    if(isset($_POST['delete'])){
                        $bdd->query("DELETE FROM commentaires WHERE id_u='$idu'");
                    }
                    if($bdd->query("SELECT * FROM commentaires WHERE id_u='$idu'")->fetch()){
                        echo '<form action="profile_prop.php" method="post">
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="delete" type="submit">Supprimer &eacutevaluation</button></div>
                              </form>';
                    }

                ?>
            </div>
        </div>
    </div>
</div>
  
<div class="shadow reviewBox">
    <?php
    $comments = $bdd->query("SELECT * FROM commentaires WHERE id_v='$idl'");
    while($row = $comments->fetch()){
        $id = $row["id_u"];
        $pseudo = $bdd->query("SELECT * FROM user WHERE id_u='$id'")->fetch();
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Note: '.$row["note"].'/5</h5>';
        echo '<h5 class="card-title">'.$pseudo["pseudo"].': '.$row["titre"].'</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">'.$row["date"].'</h6>';
        echo '<p class="card-text">'.$row["commentaire"].'</p>';
        echo '</div>';
    }
    ?>

</div>
</body>
</html>