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