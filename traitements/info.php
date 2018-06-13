<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$req = $bdd ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = ? ');   
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);
// Récupère les données de l'utilisateur connecté
$typ=$info[1];

if($typ==0){    //Test pour savoir s'il s'agit d'un utilisateur principal
    $type="Utilisateur principal";
}
else{
    $type="Utilisateur secondaire";
}
$nom = $info[3];    //Récupération du nom de l'utilisateur connecté
$_tel = $info[6];   //Récupération du numéro de téléphone de l'utilisateur connecté
$mail = $info[4];   //Récupération de l'adresse mail de l'utilisateur connecté

if($_tel == "0") {
    $_tel = "Aucun";
}
//S'il n'ya pas de numéro de téléphone dans la BDD, on affiche un message
?>
