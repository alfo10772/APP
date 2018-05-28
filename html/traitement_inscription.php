<?php

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}


$nom = $_POST['username'];
$mdp = $_POST['password'];
$mail = $_POST['mail'];
$tel= $_POST['numero_de_tel'];

$req = $bdd ->prepare('SELECT mail FROM utilisateur WHERE mail =? ');
$req->execute(array($mail));
$user = $req->fetch();

if (empty($user)){
    
    $hash = password_hash($mdp, PASSWORD_BCRYPT);
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, motdepasse, mail, numerodetelephone) VALUES(:nom,:mdp,:mail,:tel)');

    $result = $req->execute(array(':nom' => $nom,':mdp' => $hash, ':mail' => $mail,':tel' => $tel));
    
    
      /*$to = $mail;
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: rik.chi@hotmail.fr";
    
    mail($to,$subject,$txt,$headers);*/
       header('location: page_de_connexion.php');
}
else {
    echo "Mail d&eacute;j&agrave; existant";
   header("location: page_d'inscription.php");
    
}
$req = $bdd ->prepare('SELECT * FROM typecomposant ');
$req->execute();
$info = $req->fetchAll();
$req = $bdd ->prepare('SELECT IDutilisateur,motdepasse FROM utilisateur WHERE mail =? ');
$req->execute([$_POST['mail']]);
$user = $req->fetch(PDO::FETCH_NUM); 
$id = $user[0];
$r = count($info[0]);
print_r($r);
for ($i=0 ; $i<$r; $i++ ){
    $req = $bdd->prepare('INSERT INTO typecomposantuser(IDtypecomposant,nom,type1,userID) VALUES(:ID,:nom,:type,:userID)');
    $result = $req->execute(array(':ID'=>$info[$i][0], ':nom'=>$info[$i][1], ':type'=>$info[$i][2], ':userID'=>$id));    
}

?>