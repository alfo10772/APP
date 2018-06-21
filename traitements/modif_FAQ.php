<?php 
require_once '../modele/config_init.php'; //Connexion à la bdd

$question = htmlspecialchars($_POST['question']);       //On recupere la nouvelle question
$reponse = htmlspecialchars($_POST['reponse']);         //On recupere la nouvelle reponse

$req = $bdd->prepare('INSERT INTO reponse(reponse, question)        
VALUES(:reponse, :question)');                  //On ajoute les deux à la bdd
$req->execute(array(
		
		'reponse' => $reponse,
		'question' => $question,
));

header('location: ../vues/vu_faq.php');
?>