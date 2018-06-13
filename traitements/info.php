<?php

require_once '../modele/config_init.php'; //Connexion � la bdd

$req = $bdd ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = ? ');   
$req->execute([$_SESSION['ID']]);
$info = $req->fetch(PDO::FETCH_NUM);
// R�cup�re les donn�es de l'utilisateur connect�
$typ=$info[1];

if($typ==0){    //Test pour savoir s'il s'agit d'un utilisateur principal
    $type="Utilisateur principal";
}
else{
    $type="Utilisateur secondaire";
}
$nom = $info[3];    //R�cup�ration du nom de l'utilisateur connect�
$_tel = $info[6];   //R�cup�ration du num�ro de t�l�phone de l'utilisateur connect�
$mail = $info[4];   //R�cup�ration de l'adresse mail de l'utilisateur connect�

if($_tel == "0") {
    $_tel = "Aucun";
}
//S'il n'ya pas de num�ro de t�l�phone dans la BDD, on affiche un message
?>
