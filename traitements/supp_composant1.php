<?php

session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];

$idmaison = $_SESSION['maisonselect'];

$_SESSION['piececomposant'] = $_POST['piece'];  //Recuperation de la piece séléctionnée

header('location: ../vues/suppression_composant.php');

?>