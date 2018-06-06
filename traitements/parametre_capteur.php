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
$piece= $_SESSION['piececomposant'];
$reqidp = $bdd->query('SELECT IDpiece FROM piece WHERE nom= "'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'" ');
$piece=$reqidp->fetch();
$piece= $piece['IDpiece'];
$idcompo= $_POST['id'];

$valeurmin=$_POST['valeurmin'];
$valeurmax=$_POST['valeurmax'];

$req = $bdd ->prepare('UPDATE capteur SET valeurmin=:valeurmin, valeurmax=:valeurmax WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDcapteur =:idcompo)');
$req-> execute(array(':valeurmin' => $valeurmin, ':valeurmax' => $valeurmax, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));

header('location: ../html/page_des_composants.php');

?>