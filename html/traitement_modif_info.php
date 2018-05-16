<?php 
session_start();
$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}

$id= $_SESSION['ID'];

$nom = $_POST['username'];
$mdp = $_POST['password'];
$mail = $_POST['mail'];




$req = 'UPDATE utilisateur SET nom = :nom, mail=:mail WHERE IDutilisateur = :id'; 
$result = $bdd ->prepare($req);
$result = $result->execute(array(':nom' => $nom, ':mail'=>$mail, ':id'=>$id ));

?>


