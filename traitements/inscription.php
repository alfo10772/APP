<?php


    include('../modele/config_init.php');
    
    $nom = $_POST['username'];
    $mdp = $_POST['password'];
    $mail = $_POST['mail'];
    $tel= $_POST['numero_de_tel'];
    
    $mdp_crypt = md5($mdp);
    
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, motdepasse, mail, numerodetelephone) VALUES(:nom,:mdp,:mail,:tel)');
    
   
    $result = $req->execute(array(':nom' => $nom,':mdp' => $mdp_crypt, ':mail' => $mail,':tel' => $tel));

    header('location: ../html/page_de_connexion.php');

?>
