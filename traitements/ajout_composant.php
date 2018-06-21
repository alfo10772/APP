<?php
session_start();
include('../modele/config_init.php');   //Connexion � la bdd

$piece=$_SESSION['nompiece'];   //R�cup�ration du nom de la piece

$id=$_SESSION['ID'];    //R�cup�ration de l'ID de l'utilisateur connect�
$type = $_POST['type'];     //R�cup�ration du nom du type du comopsant

$reqid1 = $bdd->query('SELECT type FROM typecomposant WHERE nom= "'. $type .'" ');    
$idtype=$reqid1->fetch();   
$idtype= $idtype['type'];
//R�cup�ration du type en fonction du nom du type (0 si c'est un capteur et 1 si c'est un actionneur)

$nom = htmlspecialchars($_POST['nom']);    //R�cup�ration du nom du composant entr� par l'utilisateur 

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur= "'.$id .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];
//R�cup�re l'ID de la maison s�lection�ne par d�faut

$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $maison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
//R�cup�ration de l'ID de la pi�ce

if($idtype==0)  //Test le type pour savoir s'il s'agit d'un capteur
{
    $req = $bdd->prepare('INSERT INTO capteur(nom, IDpiece, nomtype, IDutilisateur, IDmaison) VALUES(:nom,:piece,:type, :id, :idmaison)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type, ':id' => $id, ':idmaison' => $maison));
}
// Ajout du nouveau capteur
else //Test le type pour savoir s'il s'agit d'un actionneur
{
    $req = $bdd->prepare('INSERT INTO actionneur(nom, IDpiece, nomtype, IDutilisateur, IDmaison) VALUES(:nom,:piece, :type, :id, :idmaison)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type, ':id' => $id, ':idmaison' => $maison));
}
// Ajout du nouveau actionneur

$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
//Ajout du texte de confirmation dans les notifications

header('location: ../vues/page_des_composants.php');    //Redirection sur la page des composants

?>
