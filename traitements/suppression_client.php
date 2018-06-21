<?php

require_once '../modele/config_init.php'; //Connexion et chargement de la bdd

$id = $_POST['id'];


$req = $bdd ->prepare('DELETE FROM utilisateur WHERE IDutilisateur = :id');     //Suppression de l'utilisateur en fonction de l'id

$req-> execute(array(':id' => $id));

header('location: ../vues/client.php');

?>