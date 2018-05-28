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

$reponse = $bdd->query('SELECT * FROM typecomposant WHERE type1 = 0');
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
for ($i = 0; $i<(count($_POST))-1; $i++) {
    try {
    $affich = $_POST[++$incr];

    $req = 'UPDATE typecomposantuser SET affichage = :affichage WHERE (IDtypeComposant = :idt AND userID = :id)' ; 
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':affichage' => $affich, ':idt'=>$idtyp[$i] , ':id' => $id));
    }
    catch (Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
echo count($idtyp);
}

