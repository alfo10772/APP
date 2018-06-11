<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$question = $_POST['question'];
$reponse = $_POST['reponse'];

$req = $bdd->prepare('INSERT INTO reponse(reponse, question) 
VALUES(:reponse, :question)');
$req->execute(array(
		
		'reponse' => $reponse,
		'question' => $question,
));

header('location: ../html/vu_faq.php');
?>