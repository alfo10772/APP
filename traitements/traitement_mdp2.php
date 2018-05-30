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


$code = $_POST['code'];
$mail = $_POST['mail'];

$rep = $bdd->prepare ('SELECT * FROM utilisateur WHERE mail = :mail');
$rep->execute(array(':mail' => $mail));

$don = $rep -> fetch();

if ($don['reinitialisation'] == $code && $code > 9999999) {
    header('location: ../html/entrer_new_mdp.php');
}
else {
    header('location: ../html/entrer_code_mdp.php');
}