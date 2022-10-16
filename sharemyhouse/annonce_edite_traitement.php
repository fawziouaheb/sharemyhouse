<?php

require_once ('config.php');
require_once('header.php');


if(!empty($_POST['prixavant']) || !empty($_POST['prixapres'])  || !empty($_POST['debutdispo']) || !empty($_POST['findispo']) || !empty($_POST['description']) )
    {
        

        $prixavant= htmlspecialchars($_POST['prixavant']);
        $prixapres= htmlspecialchars($_POST['prixapres']);
        $debutdispo = htmlspecialchars($_POST['debutdispo']);
        $findispo = htmlspecialchars($_POST['findispo']);
        $description = htmlspecialchars($_POST['description']);
       
                        // On hash le mot de passe avec Bcrypt, via un coût de 12
      
                        
                        $idl=$_SESSION['id_appartement'];
  
                   
                        
                          if(!empty($_POST['prixavant'])){

                            $check=$bdd->query("UPDATE appart SET prixavant='$prixavant'
                            WHERE  id_a='$idl'");
                            $check->execute();
                         
                            }
                            if(!empty($_POST['debutdispo'])){

                          
                         
                                $check=$bdd->query("UPDATE appart SET debutdispo='$debutdispo'
                                WHERE  id_a='$idl'");
                                $check->execute();
                             
                                }
                                if(!empty($_POST['findispo'])){

                          
                         
                                    $check=$bdd->query("UPDATE appart SET findispo='$findispo'
                                    WHERE  id_a='$idl'");
                                    $check->execute();
                                 
                                    }


                           if(!empty($_POST['prixapres'])){
                            
                      
                            $chec=$bdd->query("UPDATE appart SET prixapres='$prixapres'
                            WHERE  id_a='$idl'");
                            $chec->execute();
                            
                            }
                            if(!empty($_POST['description'])){
                            
                      
                            $chec=$bdd->query("UPDATE appart SET description='$description'
                            WHERE  id_a='$idl'");
                            $chec->execute();
                            
                            }


                            
                        header('Location: appartperso.php?reg_err=sucess'); die();

                        
                   

}









































?>