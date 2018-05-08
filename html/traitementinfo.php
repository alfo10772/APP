<?php

$nom = $_SESSION['nom'];
$type = $_SESSION['type'];
$mail = $_SESSION['mail'];
$tel = $_SESSION['numerodetelephone'];

if($nom = "")
    $nom = 'Nom';

if($type = "")
    $type = 'Type';

if($tel = "")
    $tel = 'Numéro de téléphone';

?>
