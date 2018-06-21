<?php

    include('../modele/config_init.php');       //Connexion à la bdd
    
    $id_question = $_POST['idquestion'];
    
    $req = $bdd ->prepare('DELETE FROM reponse WHERE ID = :id');    //Suppression de la question en fonction de l'id
    
    $req-> execute(array(':id' => $id_question));
    
    header('location: ../vues/vu_faq.php');
?>