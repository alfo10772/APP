<?php


if (!empty($_POST)) {   // les données du formulaires ont été complétées, on est dans la phase de traitement
    require_once 'db.php'; // on charge la base de données

    $req = $pdo ->prepare('SELECT IDutilisateur FROM utilisateurs WHERE nom = ?');
    $req->execute([$_POST['nom']]);
    $user = $req->fetch(); // on r�cup�re le premier element dans req

    if (!empty($user)){
    	$req = $pdo ->prepare('SELECT * FROM utilisateurs WHERE nom = ?');
   		$req->execute([$_POST['nom']]);
    	$hash = $req->fetch(); // on récupère le premier element dans req

    	if (password_verify($_POST['password'], $hash -> password)) {
    		session_start();
    		$_SESSION['nom'] = $_POST['nom'];
    		$_SESSION['password'] = $_POST['password'];
    		header('location: tableau_de_bord.php');

        	}

    }
}


?>