<?php 

function connexionbdd(){        // Fonction qui permet la connexion à la bdd
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
    }
    catch (Exception $e)
    {
        die('Erreur :' . $e->getMessage());
    }
    
    return $bdd;
}


function recup_id($mail){      // Fonction qui récupère l'ID du client 
    $bdd=connexionbdd();
    
    $req = $bdd ->prepare('SELECT * FROM utilisateur WHERE mail = :mail ');
    $req->execute(array(':mail' => $mail));
    $id = $req->fetch()[0];
    
    return $id;
    
}

function recup_mdp($id){
    $bdd=connexionbdd();
    
    $req = $bdd ->prepare('SELECT * FROM utilisateur WHERE IDutilisateur = :id ');
    $req->execute(array(':id' => $mail));
    $mdp = $req->fetch()[4];
    
    return $mdp;
}

function verif_mdp($mdp,$id){       // Fonction qui vérifie si le mdp tapé est le meme que le mdp de la bdd
   
    $mdp_clt= recup_mdp($id);
    
    if (md5($mdp)===$mdp_clt){
        $valid==TRUE;
    }
    else {
        $valid==FALSE;
    }
    
    return $valid;
}
?>