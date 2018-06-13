<?php 
require_once '../modele/config_init.php'; //Connexion à la bdd

$question = htmlspecialchars($_POST['question']);
$reponse = htmlspecialchars($_POST['reponse']);

$req = $bdd->prepare('INSERT INTO reponse(reponse, question) 
VALUES(:reponse, :question)');
$req->execute(array(
		
		'reponse' => $reponse,
		'question' => $question,
));

header('location: ../html/vu_faq.php');
?>