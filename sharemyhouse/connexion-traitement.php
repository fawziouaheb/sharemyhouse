<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; // On inclut la connexion à la base de données
    require_once('header.php');
    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        


        $verifier = $bdd->prepare('SELECT id_u, pseudo, nom, email, password, ip, date_inscription, numero_tel, image_profile FROM user WHERE email = ?');
        $verifier->execute(array($email));
        $donnee = $verifier->fetch();
        $ro = $verifier->rowCount();


      
         
         if($ro > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $donnee['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['pseudo'] = $donnee['pseudo'];
                    $_SESSION['email']=$donnee['email'];
                    $_SESSION['id_u']=$donnee['id_u'];
                    $_SESSION['date_inscription']=$donnee['date_inscription'];
                    $_SESSION['nom']=$donnee['nom'];
                    $_SESSION['image_profile']=$donnee['image_profile'];
                       header('Location: index.php');
                    die();
                }else{ header('Location: connexion.php?login_err=password'); die(); }
            }else{ header('Location: connexion.php?login_err=email'); die(); }
        }else{ header('Location: connexion.php?login_err=already'); die(); }
        
    }else{ header('Location: connexion.php'); die();} // si le formulaire est envoyé sans aucune données