<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProjetWeb"/>
    <title>Formulaire d'Evaluation</title>
    <link type="text/css" rel="stylesheet" href="css/review.css"/>
</head>

<body>

<?php
require_once 'config.php';
require_once 'header.php';

if (isset($_POST["submit"])){
    $title = $_POST["title"];
    $comment = $_POST["comment"];
    $note = (int)$_POST["note"];
    $idu = $_SESSION['id_u'];
    $idv = $_SESSION['id_ba'];
    $review = $bdd->query("SELECT * FROM commentaires WHERE id_u='$idu' AND id_v='$idv'");
    $review = $review->fetch();
    if($review){
        $bdd->query("UPDATE `commentaires` SET `id_u`='$idu',`id_v`='$idv',`note`='$note',`titre`='$title',`commentaire`='$comment',`date`=CURRENT_TIMESTAMP WHERE id_u=$idu AND id_v=$idv");
    }else{
        $bdd->query("INSERT INTO `commentaires`(`id_u`, `id_v`, `note`, `titre`, `commentaire`, `date`) VALUES ('$idu','$idv','$note','$title','$comment',CURRENT_TIMESTAMP )");
    }
    header('Location: profile_prop.php');
    exit();
}

?>

<form action="#" method="POST">
    <h3 class="text">Formulaire d'Evaluation</h3>
    <div><input class="textfield" type="text" name="title" placeholder="Titre"><br><br></div>
    <div><input class="textfield" type="text" name="comment" placeholder="Commentaire"><br><br></div>
    <label>
        <input type="radio" name="note" value="1" required>1
    </label>
    <label>
        <input type="radio" name="note" value="2">2
    </label>
    <label>
        <input type="radio" name="note" value="3">3
    </label>
    <label>
        <input type="radio" name="note" value="4">4
    </label>
    <label>
        <input type="radio" name="note" value="5">5
    </label>
    <br><br><div class="submit"><input class='envoyer' name="submit" type="submit"></div>
</form>

</body>
</html>