<?php

require_once '../modele/config_init.php'; //Connexion et chargement de la bdd

$reponse = $bdd->query('SELECT * FROM typecomposant');      //Suppression de tous les types de composants existants
$donnees = $reponse->fetch();

$id = $_POST['id'];


$req = $bdd ->prepare('DELETE FROM typecomposant WHERE IDtypeComposant = :id');         //Suppression du type de composant sélectionné

$req-> execute(array(':id' => $id));

header('location: ../html/modif_article.php');

?>