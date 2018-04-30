<?php 
if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données
    
    $req = $pdo ->prepare('INSERT INTO utilisateur(mot de passe) VALUES (:password)');
    $req->bindParam(':password',$password);
    $password = '[$_POST['password']]';
    $req->execute([$_POST['password']]);
   
?>