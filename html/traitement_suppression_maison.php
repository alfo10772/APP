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

$nom = $_POST['nom_maison'];

$req = $bdd ->prepare('DELETE FROM maison WHERE nom = :nom ');

$req-> execute(array(':nom' => $nom));

header('location: maison.php');

?>