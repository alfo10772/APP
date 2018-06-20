<?php

require_once '../modele/config_init.php'; //Connexion à la bdd

$id = $_POST['id'];     //Récupère la valeur de l'input dont le "name" vaut "id" ce qui correspond à l'ID de l'actionneur
$source = $_POST['source'];     //Récupère la valeur de l'input dont le "name" vaut "source" : ce qui correspond au numéro source de la page 

$req = $bdd ->prepare('UPDATE actionneur SET etat=1 WHERE IDactionneur = :id');     //Change l'état de l'actionneur dans la BDD
$req-> execute(array(':id' => $id));

//Redirection selon le numéro source de la page
if($source == 1){
    //include '../html/trame.php';
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=007A&TRAME=1007A2301002a000a44");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        echo "Raw Data:<br />";
        echo("$data");
    header('location: ../html/page_des_composants.php');
    
}

if($source == 2){
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=007A&TRAME=1007A2301002a000b44");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        echo "Raw Data:<br />";
        echo("$data");
    header('location: ../html/exemplepiece.php');
}

if($source == 3){
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=007A&TRAME=1007A2301002a000b44");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        echo "Raw Data:<br />";
        echo("$data");
   header('location: ../html/tableau_de_bord.php');
}
?>