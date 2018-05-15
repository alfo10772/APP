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

$id= $_SESSION['ID'];

$req = $pdo ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = $id ');
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);

$nom = $info[2];
$tel = $info[5];
$mdp = $info[4];
$mail = $_SESSION['mail'];


if (isset($_POST['username'])) {
    $nom = $_POST['username'];
}

if (isset($_POST['password'])) {
    $mdp = $_POST['password'];
}

if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
}

if (isset($_POST['numero_de_tel'])) {
    $tel = $_POST['numero_de_tel'];
}




$req = "UPDATE utilisateur SET nom = :nom, motdepasse = :mdp, mail= :mail, numerodetelephone = :tel' WHERE IDutilisateur = $id"; 
$result = $bdd ->prepare($req);
$result = $req->execute(array(':nom' => $nom,':mdp' => $mdp, ':mail' => $mail,':tel' => $tel));

?>


