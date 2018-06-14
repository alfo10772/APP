<?php                     //Fichier gerant la deconnexion
session_start();
?>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header('location: page_de_connexion.php');
?>