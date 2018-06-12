<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$id = $_POST['id'];
$source = $_POST['source'];
var_dump($source);

$req = $bdd ->prepare('UPDATE actionneur SET etat=1 WHERE IDactionneur = :id');
$req-> execute(array(':id' => $id));

if($source == 1){
    header('location: ../html/page_des_composants.php');
}

if($source == 2){
    header('location: ../html/exemplepiece.php');
}

if($source == 3){
   header('location: ../html/tableau_de_bord.php');
}
?>