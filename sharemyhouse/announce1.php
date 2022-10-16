<?php

function recu(){     
require_once('config1.php');
    $sql= $bdd->query("SELECT* FROM appart");
    if($sql->rowCount()>0){
        return $sql;
    }
}

?>