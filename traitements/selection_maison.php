<?php
session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$reponse = $bdd->query('SELECT * FROM maison');     // Selection de toutes les maisons 
$donnees = $reponse->fetch();

$_SESSION['maisonselect']= $_POST['id'];
$selection=0;
$selected=1;
$id=$_SESSION['ID'];


$req = 'UPDATE maison SET selection = :selection WHERE IDutilisateur= "'.$id.'"';       //Mettre tous les compteurs de selection de l'utilisateur à 0
$result = $bdd ->prepare($req);
$result = $result->execute(array(':selection' => $selection));

$req2 = 'UPDATE maison SET selection = :selection WHERE IDmaison= "'.$_SESSION['maisonselect'].'" AND IDutilisateur= "'.$id.'"';        //Mettre le compteur de la maison selectionnée à 1
$resultat = $bdd ->prepare($req2);
$resultat = $resultat->execute(array(':selection' => $selected));

header('location: ../vues/maison.php');

?>