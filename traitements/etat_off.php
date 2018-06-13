<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$id = $_POST['id'];     //Récupère la valeur de l'input dont le "name" vaut "id" ce qui correspond à l'ID de l'actionneur
$source = $_POST['source'];     //Récupère la valeur de l'input dont le "name" vaut "source" : ce qui correspond au numéro source de la page 

$req = $bdd ->prepare('UPDATE actionneur SET etat=0 WHERE IDactionneur = :id');     //Change l'état de l'actionneur dans la BDD
$req-> execute(array(':id' => $id));


//Redirection selon le numéro source de la page
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