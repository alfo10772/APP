<?php //Traitement connexion

//session_start();

if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once '../modele/config_init.php'; // on charge la base de données

    $req = $bdd ->prepare('SELECT IDutilisateur,motdepasse, type, IDprincipal FROM utilisateur WHERE mail =? ');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch(PDO::FETCH_NUM);  // on r�cup�re le premier element dans req
    
   if (!empty($user)){
        if(password_verify($_POST['password'],$user[1])){
        	session_start();
        	$_SESSION['mail']= $_POST['mail'];
        	$_SESSION['ID']= $user[0];
        	$_SESSION['utilisateur']=$user[2];
    	    $_SESSION['principal']=$user[3];
    	    
    	    $id = $_SESSION['ID'];
    	    $auto = 0;
    	    $default = 1;
    	    
    	    $req1 = 'UPDATE maison SET selection = :nul WHERE IDutilisateur = :id';
    	    $result = $bdd ->prepare($req1);
    	    $result = $result->execute(array(':nul' => $auto, ':id'=>$id ));
    	    
    	    $req2 = 'UPDATE maison SET selection = :auto WHERE selectionauto = 1 AND IDutilisateur = :id';
    	    $result2 = $bdd -> prepare($req2);
    	    $result2 = $result2 -> execute(array(':auto' => $default, ':id'=>$id));
    	    
    	
    	    if($user[2]==0){
    	        header('location: ../html/tableau_de_bord.php');
    	    }
    	    if($user[2]==1){
    	        header('location: ../html/tableau_de_bord.php');
    	    }
    	    if($user[2]==2){
    	        header('location: ../html/client.php');
    	    }
    	    
    	    
        }
        else{
            header('location: ../html/page_de_connexionbis.php');
        }
   }
    else{
        header('location: ../html/page_de_connexionbis.php');
    }
}

 ?>