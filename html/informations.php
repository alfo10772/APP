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
				    require('traitementinfo.php')
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
       		     		Entrer le nouveau nom d'utilisateur
       		      		<input type="text" name="username" id="nom_d'utilisateur" />
       		      		<hr width="100%">
       		      </div>
       		       
       		     <table id="modif" >      		        
       		        <tr>
       		        	<th id="modif">Type de l'utilisateur</th>
       		        	<td id="modif"><?php echo $type; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $type ?>></input>
       		        	<td id="modif"><input type="submit" onclick="toggle_div(this,'modif_type');"id="modif" name=<?php echo $type ;?> value="Modifier" /></td>
       		        </tr>
       		     </table>
       		     
       		     <hr width="100%">
       		     
   				<div id="modif_type" style="display:none;">
       		        	
       		        	<hr width="100%">
       		    </div>
       		       
       		        
       		     <table id="modif" >          		        
       		        <tr>
       		        	<th id="modif">Adresse mail</th>
       		        	<td id="modif"><?php echo $mail; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $mail ?>></input>
       		        	<td id="modif"><input type="submit" id="modif" name=<?php echo $mail ;?> value="Modifier" /></td>
       		        </tr>
       		     </table>
       		     
       		     <hr width="100%">
       		     
       		    <table id="modif" >       		        
       		        <tr>
       		        	<th id="modif">Num&eacute;ro de t&eacute;l&eacute;phone</th>
       		        	<td id="modif"><?php echo $_tel; ?></td>
       		        	<input type="hidden" name="id" value=<?php echo $_tel ?>></input>
       		        	<td id="modif"><input type="submit" id="modif" name=<?php echo $_tel ;?> value="Modifier" /></td>
					</tr>
				</table>
		
			
			</div>
			
			<script type="text/javascript">
				function toggle_div(bouton, id) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
  					var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
 					if(div.style.display=="none") { // Si le div est masqué...
   						div.style.display = "block"; // ... on l'affiche...
   						bouton.innerHTML = "-"; // ... et on change le contenu du bouton.
  					} 
 					else { // S'il est visible...
 					    div.style.display = "none"; // ... on le masque...
 					    bouton.innerHTML = "+"; // ... et on change le contenu du bouton.
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