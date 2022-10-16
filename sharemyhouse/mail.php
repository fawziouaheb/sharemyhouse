<?php

function email($destinataire,$nom,$logement,$prixapres,$periode,$debutdispo,$findispo,$nom_b,$email_b,$tele_b){

// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
  
$subject="Confirmation de reservation d'un logement sur SHAREMYHOUSE";
$message="Bonjour $nom,
Je vous confirme la reservation du $logement pour la periode allant de $debutdispo au $findispo avec un prix de $prixapres$.
Les infotmations de votre bailleur:
	Nom:$nom_b.
	email: $email_b.
	N° telephone:$tele_b
Veuillez recevoir, Madame, Monsieur, l'expression de mes salutations distinguées.";
$headers ="Content-Type: text/plain; charset=utf-8\r\n)";
$headers = "From: fawziouaheb@gmail.com\r\n";
if (mail($destinataire, $subject, $message, $headers)) // Envoi du message
{
    echo 'Votre message a bien été envoyé ';
}
else // ,$nom,$logement,$prixapres,$periode,$debutdispo,$findispoNon envoyé
{
    echo "Votre message n'a pas pu être envoyé";
}
}
 function email1($destinataire,$nom,$logement,$prixapres,$periode,$debutdispo,$findispo,$nom_l,$email_l,$tele_l){

    $subject="Nouvelle notification   SHAREMYHOUSE";
    $message="Bonjour $nom,
    Je vous confirme que votre $logement a été reservé par $nom_l pour la periode allant de $debutdispo au $findispo avec un prix de $prixapres$.
    Les infotmations de votre locataire:
    	Nom:$nom_l.
    	email: $email_l.
    	N° telephone:$tele_l
    Veuillez recevoir, Madame, Monsieur, l'expression de mes salutations distinguées.";
    $headers ="Content-Type: text/plain; charset=utf-8\r\n)";
    $headers = "From: fawziouaheb@gmail.com\r\n";
    if (mail($destinataire, $subject, $message, $headers)) // Envoi du message
    {
        header('Location:index.php?ressiut');
    }
    else // ,$nom,$logement,$prixapres,$periode,$debutdispo,$findispoNon envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }





 }



 function email2($destinataire,$nom,$logement,$prixapres,$periode,$debutdispo,$findispo,$nom_l,$email_l,$tele_l){

    $subject="Nouvelle notification SHAREMYHOUSE";
    $message="Bonjour $nom,
    Je vous informe que votre locataire $nom_l vient d'annuler sa reservation
    Les information du locataire:
    	Nom:$nom_l.
    	email: $email_l.
    	N° telephone:$tele_l
    Veuillez recevoir, Madame, Monsieur, l'expression de mes salutations distinguées.";
    $headers ="Content-Type: text/plain; charset=utf-8\r\n)";
    $headers = "From: fawziouaheb@gmail.com\r\n";
    if (mail($destinataire, $subject, $message, $headers)) // Envoi du message
    {
        header('Location:index.php?ressiut');
    }
    else // ,$nom,$logement,$prixapres,$periode,$debutdispo,$findispoNon envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }





 }





 function email3($destinataire,$nom,$logement,$prixapres,$periode,$debutdispo,$findispo,$nom_b,$email_b,$tele_b){

    // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
      
    $subject="Confirmation de reservation d'un logement SHAREMYHOUSE";
    $message="Bonjour $nom,
    Je vous informe que votre reservation du $logement pour la periode allant de $debutdispo au $findispo avec un prix de $prixapres$ vient d'etre annuler
    les infotmations du bailleur:
    	Nom:$nom_b.
    	email: $email_b.
    	N° telephone:$tele_b
    Veuillez recevoir, Madame, Monsieur, l'expression de mes salutations distinguées.";
    $headers ="Content-Type: text/plain; charset=utf-8\r\n)";
    $headers = "From: fawziouaheb@gmail.com\r\n";
    if (mail($destinataire, $subject, $message, $headers)) // Envoi du message
    {
        echo 'Votre message a bien été envoyé ';
    }
    else // ,$nom,$logement,$prixapres,$periode,$debutdispo,$findispoNon envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }
    }







?>