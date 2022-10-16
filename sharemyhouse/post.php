<?php
session_start();
include_once 'config1.php';

if(isset($_SESSION['pseudo'])){
    $text = $_POST['text'];

    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);

    $user1 = $_SESSION['id_u'];
    $room = $_SESSION['room'];



    $bdd->query("INSERT INTO `message`(`id_user`, `id_room`, `content`) VALUES ('$user1','$room', '$text')");
}
?>
