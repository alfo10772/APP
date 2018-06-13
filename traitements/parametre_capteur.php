<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];    //ID de l'utilisateur connecté

$requetemaison= $bdd->query('SELECT IDmaison FROM maison WHERE maison.IDutilisateur= "'. $id .'" AND maison.selection = 1');
$idmaison=$requetemaison->fetch();
$idmaison= $idmaison['IDmaison'];
// On récupère l'ID de la maison sélectionnée par défaut

$piece= $_SESSION['piececomposant'];    //Nom de la pièce sélectionnée lors du premier formulaire de paramétrage
$reqidp = $bdd->query('SELECT piece.IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE piece.nom= "'. $piece .'" AND piece.IDutilisateur= "'. $id .'" AND maison.selection = 1');
$piece=$reqidp->fetch();
$piece= $piece['IDpiece'];
//Récupération de l'ID de la pièce

$idcompo= $_POST['id']; //ID du capteur

$valeurmin=htmlspecialchars($_POST['valeurmin']);   //Valeur min entrée par l'utilisateur
$valeurmax=htmlspecialchars($_POST['valeurmax']);   //Valeur max entrée par l'utilisateur

$req = $bdd ->prepare('UPDATE capteur SET valeurmin=:valeurmin, valeurmax=:valeurmax WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDcapteur =:idcompo)');
$req-> execute(array(':valeurmin' => $valeurmin, ':valeurmax' => $valeurmax, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));
//Modification des valeur des valeurs dans la BDD

header('location: ../html/page_des_composants.php');    //Redirection sur la page des composants

?>