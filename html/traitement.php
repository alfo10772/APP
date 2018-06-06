<?php

session_start();

if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données

    $req = $pdo ->prepare('SELECT IDutilisateur,motdepasse, type FROM utilisateur WHERE mail =? ');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch(PDO::FETCH_NUM);  // on r�cup�re le premier element dans req
   // print_r($user);
   /* print_r($_POST);
    var_dump (password_verify($_POST['password'],$user[1]));*/
      
   
   if (!empty($user)){
        if(password_verify($_POST['password'],$user[1])){
        	session_start();
        	$_SESSION['mail']= $_POST['mail'];
        	$_SESSION['ID']= $user[0];
        	$_SESSION['utilisateur']=$user[2];
    	    $_SESSION['principal']=$user[3];
    	
    	    if($user[2]==0){
    	        header('location: tableau_de_bord.php');
    	    }
    	    if($user[2]==1){
    	        header('location: tableau_de_bord.php');
    	    }
    	    if($user[2]==2){
    	        header('location: client.php');
    	    }
    	    
    	    
        }
        else{
            header('location: page_de_connexion.php');
        }
   }
}

 ?>