<?php 
if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données
    
    /*if($_POST['password']===$_POST['confirmed_password']){*/
    $req = $pdo ->prepare('INSERT INTO utilisateur(mail) VALUES (?)');
    /*$req->execute([$_POST['username']]);*/
    $req->execute([$_POST['mail']]);
    /*$req->execute([$_POST['password']]);
    $req->execute([$_POST['numero_de_tel']]);  */
    }
  /*  else(){
        
    }*/
  

?>