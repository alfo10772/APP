<?php
session_start();
$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}


print_r($_POST);
print_r($_SESSION);

$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE mail =:mail');
$reponse->execute(array(':mail' => $_SESSION['envoi']));
$IDclient = $reponse->fetch();

$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet) VALUES(:id,:admin,:message,:objet)');
$req->execute(array(':id' => $IDclient['IDutilisateur'], ':admin' => $_SESSION['mail'],':message' => $_POST['message'], ':objet' => $_POST['objet']));

header('location: ../html/admin_message.php');
