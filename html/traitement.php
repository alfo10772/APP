<?php


if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données

    $req = $pdo ->prepare('SELECT IDutilisateur,motdepasse FROM utilisateur WHERE mail =? AND motdepasse =?');
    $req->execute(array($_POST['mail'],$_POST['password']));
    $user = $req->fetch(PDO::FETCH_NUM);  // on r�cup�re le premier element dans req
    print_r($user);
 
    
      
   if (!empty($user)){
    	session_start();
    	$_SESSION['mail']= $_POST['mail'];
    	$_SESSION['ID']= $user[0];
        header('location: tableau_de_bord.php');
   }
   else{
       header('location: page_de_connexion.php');
   }
   
}

 ?>