<?php 
session_start();
require_once '../modele/config_init.php'; //Connexion à la bdd

$id= $_SESSION['ID'];


if(!empty($_POST['name'])){
    $req1 = 'UPDATE utilisateur SET nom = :nom WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':nom' => $_POST['name'], ':id'=>$id ));
}


if(!empty($_POST['type'])){
    $req2 = 'UPDATE utilisateur SET type = :type WHERE IDutilisateur = :id';
    if($_POST['type']=='principal'){
        $type=0;
    }
    else {
        $type=1;
    }
    $result = $bdd ->prepare($req2);
    $result = $result->execute(array(':type' => $type, ':id'=>$id ));
}

if(!empty($_POST['mail'])){
    $req3 = 'UPDATE utilisateur SET mail = :mail WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req3);
    $result = $result->execute(array(':mail' => $_POST['mail'], ':id'=>$id ));
}

if(!empty($_POST['tel'])){
    $req4 = 'UPDATE utilisateur SET numerodetelephone = :tel WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req4);
    $result = $result->execute(array(':tel' => $_POST['tel'], ':id'=>$id ));
}

if(!empty($_POST['password']) && !empty($_POST['mdp'])){
    $mdp = $_POST['password'];
    $mdp2 = $_POST['mdp'];
    if($mdp == $mdp2){
        $hash1 = password_hash($mdp, PASSWORD_BCRYPT);
        $req5 = 'UPDATE utilisateur SET motdepasse = :mdp WHERE IDutilisateur = :id';
        $result = $bdd -> prepare($req5);
        $result = $result->execute(array(':mdp' => $hash1, ':id'=>$id ));
    }
    
    
}
    
header("location: ../html/informations.php");
?>


