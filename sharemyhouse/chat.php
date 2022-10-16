<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProjetWeb"/>
    <title>Chat - Customer Module</title>
    <link type="text/css" rel="stylesheet" href="css/chat.css"/>
    <link type="text/css" rel="stylesheet" href="css/messagerie.css"/>
  </head>

  <body>
    <?php
        require_once('header.php');
        require_once 'config.php';
    ?>
    <br>
    <?php
        if(isset($_GET['idba']))
            $_SESSION['id_ba'] = $_GET['idba'];
        if (!isset($_SESSION['id_u'])) {
            header('Location: connexion.php');
            exit();
        } else {
    ?>
    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['pseudo']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            <div style="clear:both"></div>
        </div>
        <div id="chatbox">
            <?php
                $user1 = (int)$_SESSION['id_u'];
                $user2 = (int)$_SESSION['id_ba'];
                if($user1 == $user2) die();
                $room_query = $bdd->query("SELECT id_r FROM room WHERE (user1=$user1 OR user1=$user2) AND (user2=$user1 OR user2=$user2) limit 1");
                $room = $room_query->fetch();
                if(! $room) {
                    $bdd->query("INSERT INTO `room`(`user1`, `user2`) VALUES ('$user1','$user2')");
                    $room_query = $bdd->query("SELECT id_r FROM room WHERE (user1=$user1 OR user1=$user2) AND (user2=$user1 OR user2=$user2) limit 1");
                    $room = $room_query->fetch();
                }
                $room = (int)$room['id_r'];
                $_SESSION['room'] = $room;

                $messages_query = $bdd->query("SELECT * FROM message WHERE id_room=$room ORDER BY date");
                while ($row = $messages_query->fetch()) {
                    $UserId = $row['id_user'];
                    $username = $bdd->query("SELECT u.pseudo FROM user u, message m WHERE m.id_user = u.id_u AND u.id_u=$UserId");
                    echo "<div class='msgln'>  (" . $row['date'] . ")  <b>" . $username->fetch()['pseudo'] . "</b>: " . $row['content'] . "<br></div>";
                }
            ?>
        </div>
        <form method="POST" name="message" action="#">
            <input name="usermsg" type="text" id="usermsg" size="63"/>
            <input name="submitmsg" type="submit" id="submitmsg" value="Send"/>
        </form>
    </div>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <?php
        }
    ?>
  
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function () {
    
            //If user wants to end session
            $("#exit").click(function () {
                var exit = confirm("Voulez-vous vraiment mettre fin à la session ?");
                if (exit === true) {
                    header("Location: index.php"); //Redirect the user
                }
            });
        });
    
        //If user submits the form
        $("#submitmsg").click(function () {
          var clientmsg = $("#usermsg").val();
          $.post("post.php", {text: clientmsg});
          $("#usermsg").attr("value", "");
          return false;
        });
    
    </script>
  </body>
</html>