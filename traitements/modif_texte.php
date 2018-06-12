<?php 
require_once '../modele/config_init.php'; // Connexion à la bdd

$pres = $_POST['presentation'];
$cgu = $_POST['cgu'];


if(!empty($pres) && !empty($cgu)){
    $req = 'UPDATE texte SET presentation = :pres, cgu=:cgu WHERE IDtexte = 1';
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':pres' => $pres, ':cgu'=>$cgu));
    
}

elseif (!empty($pres) && empty($cgu)) {
    $req = 'UPDATE texte SET presentation = :pres WHERE IDtexte = 1';
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':pres' => $pres));
    
}

elseif (empty($pres) && !empty($cgu)) {
    $req = 'UPDATE texte SET cgu=:cgu WHERE IDtexte = 1';
    $result = $bdd ->prepare($req);
    $result = $result->execute(array(':cgu'=>$cgu));
    
}


header('location: ../html/modif_texte.php');
?>
