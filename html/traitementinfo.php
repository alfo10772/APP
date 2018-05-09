<?php

require_once 'db.php';

$req = $pdo ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur ');
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);
$type=$info[1];
$nom = $info[2];
$_tel = $info[5];
//$type = $_SESSION['type'];
$mail = $_SESSION['mail'];
/*$tel = $_SESSION['numerodetelephone'];

if($nom = "")
    $nom = 'Nom';

if($type = "")
    $type = 'Type';

if($tel = "")
    $tel = 'Numéro de téléphone';*/

?>
