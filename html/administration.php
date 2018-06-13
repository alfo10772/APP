<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Administration</title>
	</head>
	
	<body>
	
		<div id="article2">
	
			<?php 
	          require("menu_admin.php");       //Ajout du menu vertical
	        
	          include('../modele/config_init.php');        //Connexion à la bdd
	          
	          require('../traitements/info.php');          //Récupération des données du traitement
	        ?>
			
			<div class="contenu">
				<h1>Informations du compte</h1>
				<br />
				<br />
				<br />
				
				<div id="conteneurinfo2">
				
				<table id="modif2">			
					<tr>
						<th id="modif2">Nom</th>
						<td id="modif2"><?php echo $nom; ?></td>
						<input type="hidden" name="id" value=<?php echo $nom ?>></input>
       		       		<td id="modif2"><input type="submit" onclick="toggle_div(this,'modif_nom');" id="modif2" name=<?php echo $nom ;?> value="Modifier" /></td>
					</tr>
				</table>
				
				<hr color="blue" width="100%">
				
				<div id="modif_nom" style="display:none;"> 		<!--  Div caché qui s'affiche si l'utilisateur clique sur modifier -->
       		     		<p>Entrer le nouveau nom d'utilisateur</p>
       		     		<div id="conteneur2">
       		     			<form action="../traitements/modif_info.php" method="post">
       		      				<input type="text" name="name"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		      		<hr color="blue" width="100%">
       		    </div>
				
				<table id="modif2">
					<tr>
						<th id="modif2">Mail</th>
						<td id="modif2"><?php echo $mail; ?></td>
						<input type="hidden" name="id" value=<?php echo $mail ?>></input>
       		        	<td id="modif2"><input type="submit" onclick="toggle_div(this,'modif_mail');" id="modif2" name=<?php echo $mail ;?> value="Modifier" /></td>
					</tr>
				</table>
				
				<hr color="blue" width="100%">
				
				<div id="modif_mail" style="display:none;">			<!--  Div caché qui s'affiche si l'utilisateur clique sur modifier -->
       		    		<p>Entrer votre nouvelle adresse mail</p>
       		     		<div id="conteneurmodif">
       		     				
       		     			<form action="../traitements/modif_info.php" method="post">
       		      				<input type="text" name="mail"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		      		<hr color="blue" width="100%">
       		     </div>
				
				<table id="modif2" >          		        
       		        <tr>
       		        	<th id="modif2">Mot de passe</th>
       		        	<td id="modif2" type="password">*******</td>
       		        	<td id="modif2"><input type="submit" onclick="toggle_div(this,'modif_mdp');" id="modif2" name=<?php echo $mail ;?> value="Modifier" /></td>
       		        </tr>
       		    </table>
       		    
       		    <hr color="blue" width="100%">
       		    
       		    <div id="modif_mdp" style="display:none;">				<!--  Div caché qui s'affiche si l'utilisateur clique sur modifier -->
       		    		<p>Entrer votre nouveau mot de passe</p>
       		     		<div id="conteneurmodif">
       		     				
       		     			<form name="myForm" action="../traitements/modif_info.php" method="post" onsubmit="return validateForm()">
       		      				<span id='result'> </span>
       		      				<input type="password" name="password" placeholder="Mot de passe" id="password" required />
       		      				<span id='result'> </span>
       		      				<input type="password" name="mdp" placeholder="Confirmation du mot de passe" id="confirmed_password" required />
       		      				
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		      		<hr color="blue" width="100%">
       		     </div>
       		    
				<table id="modif2" >       		        
       		        <tr>
       		        	<th id="modif2">Num&eacute;ro de t&eacute;l&eacute;phone</th>
       		        	<td id="modif2"><?php echo $_tel; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $_tel ?>></input>
       		        	<td id="modif2"><input type="submit" onclick="toggle_div(this,'modif_tel');" id="modif2" name=<?php echo $_tel ;?> value="Modifier" /></td>
					</tr>
				</table>
				
				<div id="modif_tel" style="display:none;">				<!--  Div caché qui s'affiche si l'utilisateur clique sur modifier -->
       		     		<hr color="blue" width="100%">
       		     		<p>Entrer votre nouveau num&eacute;ro de t&eacute;l&eacute;phone</p>
       		     		<div id="conteneur2">
       		     				
       		     			<form action="../traitements/modif_info.php" method="post">
       		      				<input type="text" name="tel"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		     </div>
				</div>
		</div>
		
		<script type="text/javascript" src="../javascript/affichage_bloc.js">		<!--  Connexion avec le fichier JS -->
		</script>
	</body>
</html>
