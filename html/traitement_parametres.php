<?php

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}

$maison_principale = $_POST['nom_maison'];

$incr = "affichage0";
for ($i = 1; $i<(count($_POST)); $i++) {
    $id = $i;
    $affich = $_POST[++$incr];
    echo $id;
    $req = 'UPDATE type_capteur SET vu = :vu WHERE id = :id';
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':vu' => $affich, ':id'=>$id ));

}
//echo $_POST['affichage1'];
//echo count($_POST);

