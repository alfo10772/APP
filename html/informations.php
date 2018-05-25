<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Mes informations</title>
	</head>
	
	<body>

		<header>
			<?php
                require("en_tete_connexion.php");
	       ?>
		</header>

		<article>
		
			<h1>Mes informations</h1>
			
			<div style="float:left">
				<a href="tableau_de_bord.php">		
					<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
				</a>
			</div> 
			
			<br />
			<br />
			<br />
			<br />
			
			<div id="conteneurinfo">
				<?php 
				    require('../traitements/traitementinfo.php')
				?>
				
				<table id="modif" >
       		     	<tr>
       		       		<th id="modif">Nom</th>
       		       		<td id="modif"><?php echo $nom; ?></td>
       		       		<input type="hidden" name="id" value=<?php echo $nom ?>></input>
       		       		<td id="modif"><input type="submit" onclick="toggle_div(this,'modif_nom');" id="modif" name=<?php echo $nom ;?> value="Modifier" /></td>
       		        </tr>
       		     
       		     </table>
       		     
       		     <hr width="100%">
       		     
       		     <div id="modif_nom" style="display:none;">
       		     		<p>Entrer le nouveau nom d'utilisateur</p>
       		     		<div id="conteneur2">
       		     			<form action="" method="post">
       		      				<input type="text" name="username"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		      		<hr width="100%">
       		      </div>
       		       
       		    <table id="modif" >      		        
       		    	<tr>
       		        	<th id="modif">Type de l'utilisateur</th>
       		        	<td id="modif"><?php echo $type; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $type ?>></input>
       		        	<td id="modif"><input type="submit" onclick="toggle_div(this,'modif_type');" id="modif" name=<?php echo $type ;?> value="Modifier" /></td>
       		        </tr>
       		    </table>
       		     
       		    <hr width="100%">
       		     
   				<div id="modif_type" style="display:none;">
   						<p>S&eacute;l&eacute;ctionner le type de l'utilisateur</p>
       		        	<div id="conteneur2">
       		     			<form action="" method="post">
       		     				<select name="type" id="type">
       		     					<option value="principal">Utilisateur principal</option>
       		     					<option value="secondaire">Utilisateur secondaire</option>
       		     				</select>
       		     				<input type="submit" value="Valider" />
       		     			</form>
       		     			<br />
       		     		</div>
       		        	<hr width="100%">
       		    </div>
       		       
       		        
       		    <table id="modif" >          		        
       		        <tr>
       		        	<th id="modif">Adresse mail</th>
       		        	<td id="modif"><?php echo $mail; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $mail ?>></input>
       		        	<td id="modif"><input type="submit" onclick="toggle_div(this,'modif_mail');" id="modif" name=<?php echo $mail ;?> value="Modifier" /></td>
       		        </tr>
       		    </table>
       		     
       		    <hr width="100%">
       		     
       		    <div id="modif_mail" style="display:none;">
       		     		<p>Entrer votre nouvelle adresse mail</p>
       		     		<div id="conteneurmodif">
       		     				
       		     			<form action="" method="post">
       		      				<input type="text" name="mail"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		      		<hr width="100%">
       		     </div>
       		     
       		    <table id="modif" >       		        
       		        <tr>
       		        	<th id="modif">Num&eacute;ro de t&eacute;l&eacute;phone</th>
       		        	<td id="modif"><?php echo $_tel; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $_tel ?>></input>
       		        	<td id="modif"><input type="submit" onclick="toggle_div(this,'modif_tel');" id="modif" name=<?php echo $_tel ;?> value="Modifier" /></td>
					</tr>
				</table>
		
				<div id="modif_tel" style="display:none;">
       		     		<hr width="100%">
       		     		<p>Entrer votre nouveau num&eacute;ro de t&eacute;l&eacute;phone</p>
       		     		<div id="conteneur2">
       		     				
       		     			<form action="" method="post">
       		      				<input type="text" name="tel"  />
       		      				<input type="submit" value="Valider" />	
       		      			</form>
       		      			<br />
       		      		</div>
       		     </div>
			
			</div>
			
			<script type="text/javascript">
				function toggle_div(bouton, id) { 
  					var div = document.getElementById(id); // on recup�re le div grace � son id 
 					if(div.style.display=="none") {  // s'il est cach�, on l'affiche
   						div.style.display = "block"; 
  					} 
 					else { 
 					    div.style.display = "none"; 
 					}
				}
			</script>
			
		</article>

		<footer>						<!--  d&eacute;but du bas de la page -->
			<?php
                require("footer.php");
            ?>
		</footer>
	</body>
</html>