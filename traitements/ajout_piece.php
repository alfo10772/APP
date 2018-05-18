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

$nom = $_POST['nom'];


$req = $bdd->prepare('INSERT INTO piece(nom) VALUES(:nom)');

$result = $req->execute(array(':nom' => $nom));
    
header('location: ../html/piece.php');
?>