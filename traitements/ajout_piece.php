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

$nom = $_POST['nom'];
$iduser=$_SESSION['ID'];
$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];

$req = $bdd->prepare('INSERT INTO piece(nom, IDmaison, IDutilisateur) VALUES(:nom, :id, :iduser)');
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :iduser)');
$result = $req->execute(array(':nom' => $nom, ':id' => $maison, ':iduser' => $iduser));
$result2 = $req2->execute(array(':notif' => $notif, ':iduser' => $iduser));
    
header('location: ../html/piece.php');
?>