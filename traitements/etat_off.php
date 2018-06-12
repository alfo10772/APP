<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$id = $_POST['id'];
$etat = $_POST['etat'];
$source = $_POST['source'];

$req = $bdd ->prepare('UPDATE actionneur SET etat=0 WHERE IDactionneur = :id');
$req-> execute(array(':id' => $id));

if($source==1)
{
    header('location: ../html/page_des_composants.php');
}
elseif($source==2)
{
    header('location: ../html/exemplepiece.php');
}
elseif($source==3)
{
    header('location: ../html/tableau_de_bord.php');
}



?>