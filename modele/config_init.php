<?php
$servername= "localhost";
$username="root";
$password="";
try
{
    $bdd = new PDO("mysql:host=$servername;dbname=bdd_a;charset=utf8",$username,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}
?>
