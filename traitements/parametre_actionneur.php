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

$heuredebut=$_POST['heuredebut'];
$heurefin=$_POST['heurefin'];

$req = $bdd ->prepare('UPDATE actionneur SET heuredebut=:heuredebut, heurefin=:heurefin WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDactionneur =:idcompo)');
$req-> execute(array(':heuredebut' => $heuredebut, ':heurefin' => $heurefin, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));

header('location: ../html/page_des_composants.php');

?>