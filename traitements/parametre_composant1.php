<?php

session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];

$idmaison = $_SESSION['maisonselect'];

$_SESSION['composant'] = $_POST['composant'];



header('location: ../html/parametre_composant2.php');

?>