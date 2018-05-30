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


$mail = $_POST['mail'];
$mdp = $_POST['password'];
$hash = password_hash($mdp, PASSWORD_BCRYPT);
$req = $bdd->prepare('UPDATE utilisateur SET reinitialisation = :code, motdepasse = :mdp WHERE mail =:mail');
$req->execute(array(':code' => 0, ':mdp' => $hash, ':mail' => $mail));

header('location: ../html/page_de_connexion.php');