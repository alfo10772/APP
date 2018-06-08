<?php

session_start();

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}

$id= $_SESSION['ID'];


if(!empty($_POST['nommaison'])){
    $req1 = 'UPDATE maison SET selectionauto = :auto WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':auto' => $_POST['nommaison'], ':id'=>$id ));
}

foreach($_POST['checkbox'] as $valeur)
{
    $req = 'UPDATE capteur SET selectiontdb = 1 WHERE IDcapteur = :id';
    $rep = $bdd ->prepare($req);
    $rep = $rep->execute(array(':id'=>$valeur));
}

foreach($_POST['checkbox2'] as $valeur2)
{
    $req2 = 'UPDATE actionneur SET selectiontdb = 1 WHERE IDactionneur = :id';
    $rep2 = $bdd ->prepare($req2);
    $rep2 = $rep2->execute(array(':id'=>$valeur2));
}
header('location: ../html/tableau_de_bord.php');