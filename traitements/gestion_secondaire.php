<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$id = $_POST['id'];     //ID de l'utilisateur secondaire qui est sélectionné par l'utilisateur principal
$type = $_POST['type'];     //Type de l'utilisateur secondaire qui est sélectionné par l'utilisateur principal

if($type==0)
{ 
    $req = $bdd ->prepare('UPDATE utilisateur SET type=1 WHERE IDutilisateur = :id');
    $req-> execute(array(':id' => $id));
}
//Si l'utilisateur est principal, il devient secondaire
elseif($type==1)
{
    $req = $bdd ->prepare('UPDATE utilisateur SET type=0 WHERE IDutilisateur = :id');
    $req-> execute(array(':id' => $id));
}
//Si l'utilisateur est secondaire, il devient principal

header('location: ../html/gestion_secondaire.php');     //Redirection vers la page de gestion des utilisateurs secondaires

?>