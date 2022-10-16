<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['nom'])  && isset($_FILES['imagepro']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['numero_tel']) )
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $numero_tel = htmlspecialchars($_POST['numero_tel']);
        $image_profile ="./image/".$_FILES['imagepro']['name'];
        
        $description = htmlspecialchars($_POST['description']);
        $name=$_FILES["imagepro"]["name"];
        
        $resultat=move_uploaded_file($_FILES["imagepro"]["tmp_name"],"./image/".$name); //deplacer l'image vers le dossier courant
        
        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        $patterne='/^[0]{1}[0-9]{9}$/';
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(preg_match($patterne,$numero_tel)){
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($nom) <= 100){ // On verifie que la longueur du pseudo <= 100
                  if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                     if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 

                            // On insère dans la base de données
                            $insert = $bdd->prepare("INSERT INTO user(pseudo, nom, email, password, ip, numero_tel ,image_profile) VALUES(:pseudo, :nom, :email, :password, :ip, :numero_tel, :image_profile)");
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'nom' => $nom,
                                'email' => $email,
                                'password' => $password,
                                'ip' =>  substr(bin2hex(tatata), 0,strlen(bin2hex(tatata)/2)),
                                'numero_tel' => $numero_tel,
                                'image_profile' =>$image_profile
                            ));
                            // On redirige avec le message de succès
                            header('Location:connexion.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}

    }else{header('Location: inscription.php?reg_err=numero_tel'); die();}
    }else{ header('Location: inscription.php?reg_err=already'); die();}
}
else{header('Location: inscription.php?reg_err=pseudo'); die();}