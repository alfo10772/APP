<?php /*
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->
        <title>Messages</title>
    </head>

    <body>
    <?php 
       		include('config_init.php');
       	?>
    <div id="article2">
	
	<?php 
	   require("menu_admin.php");
	?>
    

     <div class="imagemessage">
    <a href="messages_recus.php">
    <img src="../images/message.png" alt="Logo message" width="200">
    <div class="conteneurcercle1">
    <?php
            $umess = array();
            $i = 0;
            $reponse = $bdd->query('SELECT * FROM utilisateur');
            while ($donnees = $reponse->fetch()){
            $umess[$i] = $donnees['nom'];
            $i++;
            }
            echo count($umess);
            ?>
            </div>
    </a>
   
    </div>
    </div>
   
    
   


    </body>

<html>

*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page des contacts</title>
</head>
<body>


<div id='article2'>
<?php 
       require("menu_admin.php");
       include('../modele/config_init.php');
	?>
    <div class='contenu'>
<form method="post" action="traitement.php">

<table>
<tr>
	<label for="nom" style="float:left;">
	<th>Boite de réception:</th>
	</label>
    <th>
    <label for="nom" style="float:left">
	Vos contacts:
	</label>
    </th>
	</br>
	

</tr>
<tr>
<th>
    <select classe="réponse1" size='30'>
	<option value="valeur1">Message de Bogdan Flair</option> 
    <option value="valeur2">Message de Aristide Bambi</option>
    <option value="valeur3">Message de Gigi Building</option>
    <option value="valeur4">Message de Finlay Scarmouche</option> 
    <option value="valeur5">Message de Miroslav Clutch</option>
    <option value="valeur6">Message de Pénélope Launchpad</option>
    <option value="valeur7"selected>Message de Youssef Carrouf</option>
	</select>
    </th>
	</br>
    <th>
	<select classe="réponse1" size='30'>
    <?php 
        $message = "message000";
        $reponse = $bdd->query('SELECT * FROM utilisateur WHERE type != 2');
           
       	foreach ($reponse->fetchAll() as $donnees) {

    ?>	
    
	<option value=<?php echo ++$message; ?>><?php echo $donnees['mail']; ?></option> 
    
	
    <?php
    }
    ?>
    </select>
    </th>
</tr>


</form>
</div>
</div>
</body>
</html>