<?php

    include('../modele/config_init.php');

    $reponse = $bdd->query('SELECT * FROM reponse');
    $donnees = $reponse->fetch();
    
    $id_question = $_POST['idquestion'];
    
    $req = $bdd ->prepare('DELETE FROM reponse WHERE ID = :id');
    
    $req-> execute(array(':id' => $id_question));
    
    header('location: ../html/vu_faq.php');
?>