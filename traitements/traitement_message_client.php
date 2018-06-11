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

session_start();


$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet) VALUES(:id,:client,:message,:objet)');
$req->execute(array(':id' => $_SESSION['ID'], ':client' => $_SESSION['mail'],':message' => $_POST['message'], ':objet' => $_POST['objet']));

header('location: ../html/message_client.php');
