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

$reponse = $bdd->query('SELECT * FROM maison');
$donnees = $reponse->fetch();

$_SESSION['maisonselect']= $_POST['id'];
$selection=0;
$selected=1;
$id=$_SESSION['ID'];


$req = 'UPDATE maison SET selection = :selection WHERE IDutilisateur= "'.$id.'"';
$result = $bdd ->prepare($req);
$result = $result->execute(array(':selection' => $selection));

$req2 = 'UPDATE maison SET selection = :selection WHERE IDmaison= "'.$_SESSION['maisonselect'].'" AND IDutilisateur= "'.$id.'"';
$resultat = $bdd ->prepare($req2);
$resultat = $resultat->execute(array(':selection' => $selected));

header('location: ../html/maison.php');

?>