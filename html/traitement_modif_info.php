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


$nom = $_POST['username'];
$mdp = $_POST['password'];
$mail = $_POST['mail'];
$tel= $_POST['numero_de_tel'];

$req = "UPDATE utilisateur SET nom = :nom, motdepasse = :mdp, mail= :mail, numerodetelephone = :tel' WHERE IDutilisateur = $_SESSION['ID']"; 
$result = $bdd ->prepare($req);
$result = $req->execute(array(':nom' => $nom,':mdp' => $mdp, ':mail' => $mail,':tel' => $tel));
?>







?>