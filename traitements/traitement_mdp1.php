<?php
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$mail = $_POST['mail'];



//$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
//$reponse->execute(array(':mail' => $mail));
if ()
$code = rand(10000000, 99999999);
$req = 'UPDATE utilisateur SET reinitialisation = :code WHERE mail =:mail' ; 
$result = $bdd ->prepare($req);
$result = $result->execute(array(':code' => $code,':mail' => $mail));

header('location: ../html/entrer_code_mdp.php');


?>