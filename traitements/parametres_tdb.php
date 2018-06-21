<?php

session_start();

require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id= $_SESSION['ID'];   //ID de l'utilisateur connecté
$selection = 0;


if(!empty($_POST['nommaison'])){
    $req1 = 'UPDATE maison SET selectionauto = 1 WHERE nom =:nom AND IDutilisateur = :id';
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':nom' => $_POST['nommaison'], ':id'=>$id ));
}
//Si une maison est sélectionnée, on change sa sélection auto à 1

$requete1 = 'UPDATE capteur SET selectiontdb = :selectiontdb WHERE IDutilisateur= "'.$id.'"';
$result1 = $bdd ->prepare($requete1);
$result1 = $result1->execute(array(':selectiontdb' => $selection));
// On met la selection (pour le tableau de bord) à 0 pour tous les capteurs

$requete2 = 'UPDATE actionneur SET selectiontdb = :selectiontdb WHERE IDutilisateur= "'.$id.'"';
$result2 = $bdd ->prepare($requete2);
$result2 = $result2->execute(array(':selectiontdb' => $selection));
// On met la selection (pour le tableau de bord) à 0 pour tous les actionneurs

if(!empty($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $valeur)
    {
        $req = 'UPDATE capteur SET selectiontdb = 1 WHERE IDcapteur = :id';
        $rep = $bdd ->prepare($req);
        $rep = $rep->execute(array(':id'=>$valeur));
    }
}
//Si des capteurs sont sélectionnés, on change leur sélection pour le tdb à 1

if(!empty($_POST['checkbox2'])){
    foreach($_POST['checkbox2'] as $valeur2)
    {
        $req2 = 'UPDATE actionneur SET selectiontdb = 1 WHERE IDactionneur = :id';
        $rep2 = $bdd ->prepare($req2);
        $rep2 = $rep2->execute(array(':id'=>$valeur2));
    }
}
//Si des actionneurs sont sélectionnés, on change leur sélection pour le tdb à 1


header('location: ../vues/tableau_de_bord.php');    //Redirection vers le tableau de bord