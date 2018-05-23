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
$reponse = $bdd->query('SELECT * FROM notification');
$donnees = $reponse->fetch();

$id = $_POST['ID'];

$req = $bdd ->prepare('UPDATE notification SET etat=0 WHERE IDnotification = :ID');

$req-> execute(array(':ID' => $id));

header('location: ../html/notification.php');

?>