<?php

require_once '../modele/config_init.php'; //Connexion et chargement de la bdd

$reponse = $bdd->query('SELECT * FROM utilisateur');
$donnees = $reponse->fetch();

$id = $_POST['id'];


$req = $bdd ->prepare('DELETE FROM utilisateur WHERE IDutilisateur = :id');

$req-> execute(array(':id' => $id));

header('location: ../html/client.php');

?>