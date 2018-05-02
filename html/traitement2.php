<?php 
if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données
    
    /*if($_POST['password']===$_POST['confirmed_password']){*/
    $req = $pdo ->prepare('INSERT INTO utilisateur(nom,mail,motdepasse,numerodetelephone) VALUES (?,?,?,?)');
    $req->execute(array($_POST['username'],$_POST['mail'],$_POST['password'],$_POST['numero_de_tel']));
    /*$req->execute([$_POST['mail']]);
    /*$req->execute([$_POST['password']]);
    $req->execute([$_POST['numero_de_tel']]);  */
    }
  /*  else(){
        
    }*/
  

?>