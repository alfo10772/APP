<?php

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$code = $_POST['code'];
$mail = $_POST['mail'];

$rep = $bdd->prepare ('SELECT * FROM utilisateur WHERE mail = :mail');
$rep->execute(array(':mail' => $mail));

$don = $rep -> fetch();

if ($don['reinitialisation'] == $code) {
    header('location: ../html/entrer_new_mdp.php');
}
else {
    header('location: ../html/entrer_code_mdp.php');
}