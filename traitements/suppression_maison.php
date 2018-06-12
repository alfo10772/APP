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

$idmaison = $_POST['nom_maison'];

$requete = $bdd -> query('SELECT nom FROM maison WHERE IDmaison = "'. $idmaison .'"');
$nom=$requete->fetch()[0];
var_dump($nom);
$notif=$nom.' a bien &eacute;t&eacute; supprim&eacute;e';
$id=$_SESSION['ID'];



$req = $bdd ->prepare('DELETE FROM maison WHERE IDmaison = :idmaison ');
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$req-> execute(array(':idmaison' => $idmaison));
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/maison.php');

?>