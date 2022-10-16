<?php

require_once ('config.php');
require_once('header.php');

//var_dump(var_dump($_FILES["psps"]["name"]));
if(!empty($_POST['pseudo']) || !empty($_POST['nom']) ||   !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['password_retype']) || !empty($_POST['numero_tel']) )
    {
        

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $password_actuel = htmlspecialchars($_POST['password_actuel']);
        $numero_tel = htmlspecialchars($_POST['numero_tel']);
        

        if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
            if(strlen($nom) <=100){ // On verifie que la longueur du pseudo <= 100
              if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if($password === $password_retype){ // si les deux mdp saisis sont bon

                        // On hash le mot de passe avec Bcrypt, via un coût de 12
      
                        
                        $idl=$_SESSION['id_u'];
                        
                        if(!empty($_POST['nom'])){

                          
                            var_dump($nom);
                            $check=$bdd->query("UPDATE user SET user.nom='$nom'
                            WHERE  id_u='$idl'");
                            $check->execute();
                         
                            }


                        if(!empty($_POST['pseudo'])){
                            
                      
                            $chec=$bdd->query("UPDATE user SET pseudo='$pseudo'
                            WHERE  id_u='$idl'");
                            $chec->execute();
                            
                            }
                            if(!empty($_POST['pseudo'])){
                            
                      
                            $chec=$bdd->query("UPDATE user SET pseudo='$pseudo'
                            WHERE  id_u='$idl'");
                            $chec->execute();
                            
                            }


                            if(!empty($_POST['numero_tel'])){
                            
                      
                                $chec=$bdd->query("UPDATE user SET numero_tel='$numero_tel'
                                WHERE  id_u='$idl'");
                                $chec->execute();
                                
                                }
  


                            if(!empty($_POST['email'])){

                                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                                $che=$bdd->query("UPDATE user SET email='$email'
                                WHERE  id_u='$idl'");
                                $che->execute();
                            }else{ header('Location: profile.php?reg_err=email'); die();}
                          
                            
                                }



                                if(!empty($_POST['password'])){
                                    $sql= $bdd->query("SELECT*  FROM  user where id_u='$idl'");
                                    $donnee = $sql->fetch();
                                     if(password_verify($password_actuel,$donnee['password'])){
                                            if(password_verify($password,$donnee['password'])){
    
                                              header('Location: profile.php?reg_err=password_nouveau'); die();
          
                                             }else{
                                        
                                             $cost = ['cost' => 12];
                                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                                            $che=$bdd->query("UPDATE user SET password='$password'
                                            WHERE  id_u='$idl'");
                                            $che->execute();} 
                                        
                                             }else{header('Location: profile.php?reg_err=password_actuel'); die();}
                                    
                                    }
                        header('Location: profile.php?reg_err=sucess'); die();

                    }else{ header('Location: profile.php?reg_err=password'); die();}
                }else{ header('Location: profile.php?reg_err=email_length'); die();}
            }else{ header('Location: profile.php?reg_err=nom_length'); die();}
        }else{ header('Location: profile.php?reg_err=pseudo_length'); die();}
    }

?>