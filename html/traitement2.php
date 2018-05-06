<?php 
if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données
    
    
    $req = $pdo ->prepare('INSERT INTO utilisateur(nom,mail,motdepasse,numerodetelephone) VALUES (?,?,?,?)');
    $pass = $_POST['password'];
    $hash = password_hash($pass,PASSWORD_BCRYPT);
    $req->execute(array($_POST['username'],$_POST['mail'],$hash,$_POST['numero_de_tel'])); 
    }
    header('location: page_de_connexion.php');
  
?>