<?php

session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];

$idmaison = $_SESSION['maisonselect'];

$_SESSION['piececomposant'] = $_POST['piece'];  //Recuperation de la piece s�l�ctionn�e

header('location: ../vues/suppression_composant.php');

?>