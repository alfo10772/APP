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
$id=$_SESSION['ID'];
$nom = $_POST['name'];
$mail = $_POST['mail'];
$type=1;
$IDprincipal=$_SESSION['ID'];
$mdp='utilisateur';
$hash = password_hash($mdp, PASSWORD_BCRYPT);
$notif="L'utilisateur secondaire " .$nom. " a &eacute;t&eacute; ajout&eacute;" ;

$req = $bdd->prepare('INSERT INTO utilisateur(nom, type, IDprincipal, mail, motdepasse) VALUES(:nom, :type, :id, :mail, :mdp)');
$result = $req->execute(array(':nom' => $nom, ':type' => $type, ':id' => $IDprincipal, ':mail' => $mail, ':mdp' => $hash));
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/tableau_de_bord.php');

?>