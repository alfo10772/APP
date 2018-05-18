<?php

if (!empty($_POST)) { 
    include('../modele/config_init.php');
    
    $req = $pdo ->prepare('SELECT * FROM utilisateur WHERE mail =? ');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch(PDO::FETCH_NUM)
    $mdp= $user[4];
    $id = $user[0];
    
    if (!empty($user)){
        include_once('../modele/fonctions_principales.php');
        if (verif_mdp($mdp,$id)==TRUE){
            $_SESSION['mail']= $_POST['mail'];
            $_SESSION['ID']= $user[0];
            header('location: ../html/tableau_de_bord.php');
        }
        else {
            header('location: ../html/page_de_connexion.php');
        }
    }
}

?>
