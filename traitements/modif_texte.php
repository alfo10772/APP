<?php 
require_once '../modele/config_init.php'; // Connexion à la bdd

$pres = htmlspecialchars($_POST['presentation']);       //recuperation des textes entré par l'admin
$cgu = htmlspecialchars($_POST['cgu']);


if(!empty($pres) && !empty($cgu)){      // Si les deux champs sont remplis, 
    $req = 'UPDATE texte SET presentation = :pres, cgu=:cgu WHERE IDtexte = 1';     //On modifie les deux dans la bdd
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':pres' => $pres, ':cgu'=>$cgu));
    
}

elseif (!empty($pres) && empty($cgu)) {     //Si le texte de presentation est renseigné
    $req = 'UPDATE texte SET presentation = :pres WHERE IDtexte = 1';       //On le modifie dans la bdd
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':pres' => $pres));
    
}

elseif (empty($pres) && !empty($cgu)) {     //Si le CGU sont renseignées
    $req = 'UPDATE texte SET cgu=:cgu WHERE IDtexte = 1';       //On les modifie dans la bdd 
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':cgu'=>$cgu));
    
}


header('location: ../vues/modif_texte.php');
?>
