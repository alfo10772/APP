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

$reponse = $bdd->query('SELECT * FROM typecomposant WHERE type = 0');
$idtyp = array();
$i = 0;
while ($donnees = $reponse->fetch())
			{
				$idtyp[$i] =  $donnees['IDtypeComposant'];
				$i++;
            }
            
//'SELECT * FROM composant WHERE typec == $idty

$id = $_SESSION['ID'];
$maison_principale = $_POST['nom_maison'];

$req = 'UPDATE maison SET selectionauto = :selection WHERE IDutilisateur= "'.$id.'"';
$result = $bdd ->prepare($req);
$result = $result->execute(array(':selection' => $maison_principale));

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

