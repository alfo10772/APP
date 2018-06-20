<?php
require_once '../modele/config_init.php'; //Connexion � la bdd

$nom = htmlspecialchars($_POST['nom']);     //R�cup�ration du nom du comopsant
$type = htmlspecialchars($_POST['type']);      //R�cup�ration du type de composant
$unite = htmlspecialchars($_POST['unite']);     //R�cup�ration de l'unit� utilis�e pour le composant


if($type=='capteur'){
    $id=0;
}
else{
    $id=1;
}

if($type=='capteur'){           //Si on a un capteur, on tient compte de l'unite
    $req = $bdd->prepare('INSERT INTO typecomposant(nom, type, unite) VALUES(:nom, :type, :unite)');    //Ajout du nouveau composant dans la table typecomposant

    $result = $req->execute(array(':nom' => $nom, ':type' => $id, ':unite' => $unite));
}

else{           //Si on a un actionneur, on ne tient pas compte de l'unite
    $req = $bdd->prepare('INSERT INTO typecomposant(nom, type) VALUES(:nom, :type)');    //Ajout du nouveau composant dans la table typecomposant
    
    $result = $req->execute(array(':nom' => $nom, ':type' => $id));
}

header('location: ../html/modif_article.php');  //Redirection sur la page modif_article
?>