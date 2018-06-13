<?php 
session_start();
require_once '../modele/config_init.php'; //Connexion à la bdd

$id= $_SESSION['ID'];


if(!empty($_POST['name'])){     //Si un nouveau nom est entré
    $req1 = 'UPDATE utilisateur SET nom = :nom WHERE IDutilisateur = :id';      //On le modifie à la bdd
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':nom' => htmlspecialchars($_POST['name']), ':id'=>$id ));
}


if(!empty($_POST['type'])){         //Si un nouveau type est selectionné
    $req2 = 'UPDATE utilisateur SET type = :type WHERE IDutilisateur = :id';        //On le modifie dans la bdd
    if($_POST['type']=='principal'){
        $type=0;
    }
    else {
        $type=1;
    }
    $result = $bdd ->prepare($req2);
    $result = $result->execute(array(':type' => $type, ':id'=>$id ));
}

if(!empty($_POST['mail'])){     //Si un nouveau mail est entré
    $req3 = 'UPDATE utilisateur SET mail = :mail WHERE IDutilisateur = :id';            //On le modifie dans la bdd
    $result = $bdd ->prepare($req3);
    $result = $result->execute(array(':mail' => htmlspecialchars($_POST['mail']), ':id'=>$id ));
}

if(!empty($_POST['tel'])){      //Si un nouveau numero est entré
    $req4 = 'UPDATE utilisateur SET numerodetelephone = :tel WHERE IDutilisateur = :id';        //On le modifie dans la bdd
    $result = $bdd ->prepare($req4);
    $result = $result->execute(array(':tel' => htmlspecialchars($_POST['tel']), ':id'=>$id ));
}

if(!empty($_POST['password']) && !empty($_POST['mdp'])){        //Si un nouveau mdp est entré
    $mdp = htmlspecialchars($_POST['password']);
    $mdp2 = htmlspecialchars($_POST['mdp']);
    if($mdp == $mdp2){                              //On vérifie que les deux sont identiques
        $hash1 = password_hash($mdp, PASSWORD_BCRYPT);
        $req5 = 'UPDATE utilisateur SET motdepasse = :mdp WHERE IDutilisateur = :id';       //On modifie le mdp dans la bdd
        $result = $bdd -> prepare($req5);
        $result = $result->execute(array(':mdp' => $hash1, ':id'=>$id ));
    }
    
    
}
    
header("location: ../html/informations.php");
?>


