<?php
require_once '../modele/config_init.php';         //Connexion et chargement de la bdd

//On recupere les donnees du formulaire
$nom = htmlspecialchars($_POST['username']);
$mdp = htmlspecialchars($_POST['password']);
$mail = htmlspecialchars($_POST['mail']);
$tel= htmlspecialchars($_POST['numero_de_tel']);

//On verifie que l'adresse mail est disponible
$req = $bdd ->prepare('SELECT mail FROM utilisateur WHERE mail =? ');
$req->execute(array($mail));
$user = $req->fetch();

if (empty($user)){
    
    $hash = password_hash($mdp, PASSWORD_BCRYPT);                        //Cryptage du mot de passe
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, motdepasse, mail, numerodetelephone) VALUES(:nom,:mdp,:mail,:tel)');

    $result = $req->execute(array(':nom' => $nom,':mdp' => $hash, ':mail' => $mail,':tel' => $tel));
    
    header('location: page_de_connexion.php');                   //Redirectio vers la page de connexion
}
else {
   header("location: page_d'inscriptionbis.php");        //Si l'email existe, on redirige vers la page d'inscription (avec un commentaire)
    
}


?>