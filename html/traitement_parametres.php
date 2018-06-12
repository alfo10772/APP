<?php
session_start();
require_once '../modele/config_init.php';

$reponse = $bdd->query('SELECT * FROM typecomposant WHERE type = 0');
$idtyp = array();
$rim = 'typ00';
$i = 0;
while ($donnees = $reponse->fetch())
			{
				$idtyp[$i] =  $donnees['IDtypeComposant'];
				$i++;
            }
            
//'SELECT * FROM composant WHERE typec == $idty

$id = $_SESSION['ID'];
$maison_principale = $_POST['nom_maison'];
$rim = 'type00';
$incr = "affichage0";
echo count($idtyp);
for ($i = 0; $i<count($idtyp); $i++) {
    if (isset($_POST[++$incr])) {
       
        $affich = $_POST[$incr];
        if ($affich[0]=='NULL') {
            $aff = NULL;
        }
        else {
            $aff = implode(',',$affich);
            echo $aff;
        }

        $req = 'UPDATE typecomposantuser SET affichage = :affichage WHERE (IDtypeComposant = :idt AND userID = :id)' ; 
        $result = $bdd ->prepare($req);
        $result = $result->execute(array(':affichage' => $aff, ':idt'=>$idtyp[$i] , ':id' => $id));
    }
    

}
header('location: tableau_de_bord.php');

