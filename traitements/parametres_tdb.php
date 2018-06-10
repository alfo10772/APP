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
$selection = 0;


if(!empty($_POST['nommaison'])){
    $req1 = 'UPDATE maison SET selectionauto = 1 WHERE nom =:nom AND IDutilisateur = :id';
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':nom' => $_POST['nommaison'], ':id'=>$id ));
}

$requete1 = 'UPDATE capteur SET selectiontdb = :selectiontdb WHERE IDutilisateur= "'.$id.'"';
$result1 = $bdd ->prepare($requete1);
$result1 = $result1->execute(array(':selectiontdb' => $selection));

$requete2 = 'UPDATE actionneur SET selectiontdb = :selectiontdb WHERE IDutilisateur= "'.$id.'"';
$result2 = $bdd ->prepare($requete2);
$result2 = $result2->execute(array(':selectiontdb' => $selection));

if(!empty($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $valeur)
    {
        $req = 'UPDATE capteur SET selectiontdb = 1 WHERE IDcapteur = :id';
        $rep = $bdd ->prepare($req);
        $rep = $rep->execute(array(':id'=>$valeur));
    }
}

if(!empty($_POST['checkbox2'])){
    foreach($_POST['checkbox2'] as $valeur2)
    {
        $req2 = 'UPDATE actionneur SET selectiontdb = 1 WHERE IDactionneur = :id';
        $rep2 = $bdd ->prepare($req2);
        $rep2 = $rep2->execute(array(':id'=>$valeur2));
    }
}


header('location: ../html/tableau_de_bord.php');