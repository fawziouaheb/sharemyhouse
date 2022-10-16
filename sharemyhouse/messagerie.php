<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProjetWeb"/>

    <title>Messagerie</title>
    <link type="text/css" rel="stylesheet" href="css/messagerie.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/messagerie.css"/>
</head>
<body>
  <?php require_once('header.php'); ?>
<br>
  <h1 class="titre">Messagerie</h1>
<br>
 <div class="card">
    <div class="card-header">
        Conversations r&eacute;centes
    </div>
    <ul class="list-group list-group-flush">
        <?php
        require_once 'config.php';
        if (!isset($_SESSION['id_u'])) {
            header('Location: connexion.php');
            exit();
        } else {
            $user = $_SESSION['id_u'];
            $rooms = $bdd->query("SELECT * FROM room WHERE user1=$user OR user2=$user");
            while($row = $rooms->fetch()) {
                if ((int)$row['user1'] == $user)
                    $dest = (int)$row['user2'];
                else
                    $dest = (int)$row['user1'];
                $name = $bdd->query("SELECT * FROM user WHERE id_u=$dest");
                $name = $name->fetch()['pseudo'];
                echo '<li class="list-group-item"><a href="chat.php?idba='.$dest.'">'.$name.'</a></li>';
            }
        }
        ?>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
