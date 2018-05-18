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

$reponse = $bdd->query('SELECT * FROM typecomposant');
$donnees = $reponse->fetch();

$id = $_POST['id'];


$req = $bdd ->prepare('DELETE FROM typecomposant WHERE IDtypeComposant = :id');

$req-> execute(array(':id' => $id));

header('location: ../html/modif_article.php');

?>