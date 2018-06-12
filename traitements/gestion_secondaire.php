<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$reponse = $bdd->query('SELECT * FROM utilisateur');
$donnees = $reponse->fetch();

$id = $_POST['id'];
$type = $_POST['type'];

if($type==0)
{ 
    $req = $bdd ->prepare('UPDATE utilisateur SET type=1 WHERE IDutilisateur = :id');
    $req-> execute(array(':id' => $id));
}
elseif($type==1)
{
    $req = $bdd ->prepare('UPDATE utilisateur SET type=0 WHERE IDutilisateur = :id');
    $req-> execute(array(':id' => $id));
}

header('location: ../html/gestion_secondaire.php');

?>