<?php

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}

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