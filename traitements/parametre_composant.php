<?php

session_start();

include('../modele/config_init.php');   //Connexion � la BDD

$_SESSION['piececomposant'] = $_POST['piece'];  //On met le nom de la pi�ce s�lectionn�e dans une variable Session

header('location: ../html/parametre_composant1.php');   //Redirection vers le second formulaire pour choisir le composant � param�trer

?>