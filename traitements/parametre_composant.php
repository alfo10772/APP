<?php

session_start();

include('../modele/config_init.php');

$id=$_SESSION['ID'];

$_SESSION['piececomposant'] = $_POST['piece'];

header('location: ../html/parametre_composant1.php');

?>