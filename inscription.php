 <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="ProjetWeb"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
            <?php require_once('header.php'); ?>
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
                            case 'numero_tel':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong>votre numero n'est pas valide
                                    </div>
                                <?php 
                                case 'pseudo':
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong>Erreur</strong> veuillez remplir tout les champs!
                                        </div>
                                    <?php
                                    break;

                        }
                    }
                    ?>
                    
                    <h1>Bonjour .</h1>
                <form action="inscription_traitement1.php" method="post"  enctype="multipart/form-data">
                    <h2 class="text-center">Inscription</h2>       
                    <div class="form-group">
                        <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="numero_tel" class="form-control" placeholder="Numero_tel" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="file" name="imagepro" accept="image/png"   size="50">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                    </div>   
                    <div class="form-group">
                       <p class="text-center"><a href="http://localhost/sharemyhouse/connexion.php">Connexion</a></p>
                    </div>
                </form>
            </div>
            <style>
                .login-form {
                    width: 340px;
                    margin: 50px auto;
                }
                .login-form form {
                    margin-bottom: 15px;
                    background:#f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .login-form h2 {
                    margin: 0 0 15px;
                }
                .form-control, .btn {
                    min-height: 38px;
                    border-radius: 2px;
                }
                .btn {        
                    font-size: 15px;
                    font-weight: bold;
                }
            </style>
        </body>
</html>