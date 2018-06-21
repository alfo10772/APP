<?php //Traitement connexion

//session_start();

if (!empty($_POST)) {   // les donnÃ©es du formulaires ont Ã©tÃ© complÃ©tÃ©es, on est dans la phase de traitement
    require_once '../modele/config_init.php'; // on charge la base de donnÃ©es

    $req = $bdd ->prepare('SELECT IDutilisateur,motdepasse, type, IDprincipal FROM utilisateur WHERE mail =? ');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch(PDO::FETCH_NUM);  // on rï¿½cupï¿½re le premier element dans req
    
   if (!empty($user)){
       if(password_verify(htmlspecialchars($_POST['password']),$user[1])){      //On vérifie que le mdp correspond à celui de la bdd
        	session_start();
        	$_SESSION['mail']= htmlspecialchars($_POST['mail']);           //On crée toutes les sessions
        	$_SESSION['ID']= $user[0];
        	$_SESSION['utilisateur']=$user[2];
    	    $_SESSION['principal']=$user[3];
    	    
    	    $id = $_SESSION['ID'];
    	    $auto = 0;
    	    $default = 1;
    	    
    	    $req1 = 'UPDATE maison SET selection = :nul WHERE IDutilisateur = :id';        //On met toutes les selections maison à 0
    	    $result = $bdd ->prepare($req1);
    	    $result = $result->execute(array(':nul' => $auto, ':id'=>$id ));
    	    
    	    $req2 = 'UPDATE maison SET selection = :auto WHERE selectionauto = 1 AND IDutilisateur = :id';     //On met la selection de la maison selectionnée par defaut à 1
    	    $result2 = $bdd -> prepare($req2);
    	    $result2 = $result2 -> execute(array(':auto' => $default, ':id'=>$id));
    	    
    	
    	    if($user[2]==0){                   //Redirection en fonction du type de l'utilisateur
    	        header('location: ../vues/tableau_de_bord.php');
    	    }
    	    if($user[2]==1){
    	        header('location: ../vues/tableau_de_bord.php');
    	    }
    	    if($user[2]==2){
    	        header('location: ../vues/administration.php');
    	    }
    	    
    	    
        }
        else{       //Si le mdp ne correspond pas, retour à la page de connexion
            header('location: ../vues/page_de_connexionbis.php');
        }
   }
    else{
        header('location: ../vues/page_de_connexionbis.php');
    }
}

 ?>