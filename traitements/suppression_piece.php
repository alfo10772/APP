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
$idmaison = $_SESSION['maisonselect'];
$nom = $_POST['nom_piece'];
$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $nom .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
$notif=$nom.' a bien &eacute;t&eacute; supprim&eacute;e';

$req = $bdd ->prepare('DELETE FROM piece WHERE (nom = :nom  AND IDutilisateur = :id AND IDmaison = :idmaison)');
$req3 = $bdd ->prepare('DELETE FROM capteur WHERE IDpiece = :piece');
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$req3-> execute(array(':piece' => $piece));
$req-> execute(array(':nom' => $nom, ':id' => $id, ':idmaison' => $idmaison));
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/piece.php');

?>
