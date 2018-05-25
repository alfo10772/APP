<?php

require_once 'db.php';

$req = $pdo ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = ? ');
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);
$typ=$info[1];

if($typ==0){
    $type="Utilisateur principal";
}
else{
    $type="Utilisateur secondaire";
}
$nom = $info[2];
$_tel = $info[5];
$mail = $_SESSION['mail'];

if($_tel == "0") {
    $_tel = "Aucun";
}

?>
