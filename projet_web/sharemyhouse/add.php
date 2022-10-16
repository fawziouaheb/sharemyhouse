<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link type="text/css" rel="stylesheet" href="css/reserve.css"/>
            <title>Ajouter une Annonce</title>
        </head>
        <body>
        <?php require_once('header.php');
        if(!isset($_SESSION["id_u"])){
            header('Location:connexion.php');
            die();
        }
         ?>   
        <div class="login-form">    
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'pseudo':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Veuillez remplir tout les champs!
                                </div>
                            <?php
                            break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email non valide
                            </div>
                        <?php
                        break;


                        case 'forme_d':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Le champ de description n'est pas valide
                                </div>
                            <?php
                            break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email trop long
                            </div>
                        <?php 
                        break;

                        case 'forme_a':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Le champs adresse doit etre de cette forme "chaine XXXX chaine"
                                </div>
                            <?php 
                            break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            <form action="add_traitement.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Ajouter une Annonce</h2>
                <div class="form-group">
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label><b>Veuillez choisir le type de logement:</b>
                <br>
                Studio <input type="radio" name="logement" id="contact_email" value="Studio" />
                Chambre <input type="radio" name="logement" id="contact_email" value="Chambre" />
                Apparetement <input type="radio" name="logement" id="contact_email" value="apparetement" />
                
                
                <div>
                <div class="form-group">
                <input type="hidden" name="prixavant" value='0'>
                </div>
                <div class="form-group">
                    <input type="number" min="0" step="1.0"  name="prixapres" class="form-control" placeholder="Prix " required="required" autocomplete="off" >
                </div>
                <div class="form-group">
                <label><b>par </b>
                <select name="periode">
                    <option value="mois">mois</option>
                    <option value="semaine">semaine</option>
                    <option value="jour">jour</option>
                </select>
            </label>
            </div>
            <div class="form-group">
                <label >  <b>Date début disponibilité : </b> <input type="date" name="debutdispo"></label>
            
            </div>
            <div class="form-group">
                <label >  <b>Date fin  disponibilité : </b> <input type="date" name="findispo"></label>
            
            </div>
            <div class="form-group">
                <h5>Image: </h5><input type="file" name="image1" accept="image/png"   size="50">
                <input type="file" name="image2" accept="image/png"   size="50">
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Description" required="required"  width="60" autocomplete="off">
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                </div>   
        
            </form>
            
        </div>
        </body>
</html>