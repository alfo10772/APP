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

$id= $_SESSION['ID'];

if(!empty($_POST['name'])){
    $req1 = 'UPDATE utilisateur SET nom = :nom WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req1);
    $result = $result->execute(array(':nom' => $_POST['name'], ':id'=>$id ));
}


if(!empty($_POST['type'])){
    $req2 = 'UPDATE utilisateur SET type = :type WHERE IDutilisateur = :id';
    if($_POST['type']=='principal'){
        $type=0;
    }
    else {
        $type=1;
    }
    var_dump($type);
    $result = $bdd ->prepare($req2);
    $result = $result->execute(array(':type' => $type, ':id'=>$id ));
}

if(!empty($_POST['mail'])){
    $req3 = 'UPDATE utilisateur SET mail = :mail WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req3);
    $result = $result->execute(array(':mail' => $_POST['mail'], ':id'=>$id ));
}

if(!empty($_POST['tel'])){
    $req4 = 'UPDATE utilisateur SET numerodetelephone = :tel WHERE IDutilisateur = :id';
    $result = $bdd ->prepare($req4);
    $result = $result->execute(array(':tel' => $_POST['tel'], ':id'=>$id ));
}

header("location: ../html/informations.php");
?>


