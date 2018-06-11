<?php

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}


$nom = $_POST['username'];
$mdp = $_POST['password'];
$mail = $_POST['mail'];
$tel= $_POST['numero_de_tel'];

$req = $bdd ->prepare('SELECT mail FROM utilisateur WHERE mail =? ');
$req->execute(array($mail));
$user = $req->fetch();

if (empty($user)){
    
    $hash = password_hash($mdp, PASSWORD_BCRYPT);
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, motdepasse, mail, numerodetelephone) VALUES(:nom,:mdp,:mail,:tel)');

    $result = $req->execute(array(':nom' => $nom,':mdp' => $hash, ':mail' => $mail,':tel' => $tel));
    
    header('location: page_de_connexion.php');
}
else {
   header("location: page_d'inscriptionbis.php");
    
}


?>