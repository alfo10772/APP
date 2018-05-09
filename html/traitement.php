<?php

if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données

    $req = $pdo ->prepare('SELECT IDutilisateur,motdepasse FROM utilisateur WHERE mail = ?');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch();  // on r�cup�re le premier element dans req
    print_r($user);
      
   if (!empty($user)){
       $req = $pdo ->prepare('SELECT motdepasse FROM utilisateur WHERE mail =?');
       $req ->execute([$_POST['mail']]);
       $pass =$req->fetch();
       echo var_dump (password_verify($_POST['password'],  '$pass'));
       if (password_verify($_POST['password'],  '$pass' )){
         echo 'ok';
    	session_start();
    	$_SESSION['mail']= $_POST['mail'];
    	//header('location: tableau_de_bord.php');
        }
        /*else{
            echo 'false';
            //header('location: page_de_connexion.php');
        }*/
    }
   
}
 ?>