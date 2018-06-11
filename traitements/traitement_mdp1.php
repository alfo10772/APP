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