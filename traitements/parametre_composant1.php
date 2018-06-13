<?php

session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$_SESSION['composant'] = $_POST['composant'];   //On met le nom du composant sélectionné dans une variable Session

header('location: ../html/parametre_composant2.php');   //Redirection vers le dernier formulaire de paramétrage des composants

?>