<?php

session_start();

require_once '../modele/config_init.php'; //Connexion à la bdd

$_SESSION['idpiece'] = $_POST['id'];    //Récupération de l'ID de la pièce sélectionnée dans une variable session

$reponse = $bdd->query('SELECT nom FROM piece WHERE IDpiece = "'.$_SESSION['idpiece'].'"');
$donnees = $reponse->fetch()[0];
//retrouve le nom de la pièce sélectionnée avec l'ID

$_SESSION['nompiece'] = $donnees;


header('location: ../html/exemplepiece.php');   //Redirection sur le page exemplepiece

?>