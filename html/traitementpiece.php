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
$maison = $_POST['maison'];


$req = $bdd->prepare('INSERT INTO piece(nom, IDmaison) VALUES(:nom,:maison)');

$result = $req->execute(array(':nom' => $nom,':maison' => $maison));
    
header('location: piece.php');
?>