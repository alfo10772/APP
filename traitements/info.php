<?php

require_once '../modele/config_init.php'; //Conexion à la bdd

$req = $bdd ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = ? ');
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);
$typ=$info[1];

if($typ==0){
    $type="Utilisateur principal";
}
else{
    $type="Utilisateur secondaire";
}
$nom = $info[3];
$_tel = $info[6];

$mail = $_SESSION['mail'];

if($_tel == "0") {
    $_tel = "Aucun";
}

?>
