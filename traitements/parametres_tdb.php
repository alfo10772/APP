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
    echo "La checkbox $valeur a �t� coch�e<br>";
}
