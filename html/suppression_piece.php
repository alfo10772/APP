<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->




<title>Suppression d'une pi&egrave;ce</title>
</head>
	<body>
	
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>	
		</header>
		
	<article>
	
    
	<h1>Suppression d'une piece
	<br/>
	</h1>
	<div style="float:left;width:250px;height:10px;">
			<a href="piece.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	
	<div id="conteneur2">
	<br/>
	<br/>
	
	<div id="Nom de la maison"  style="width:350px;height:50px;"  >
			        Nom de la maison:
			        <br />
			        <select>
			        
                    <option value ="Maison 1">Maison 1</option>
                    <option value ="Maison 2">Maison 2</option>
                    <option value ="Maison 3">Maison 3</option>
                    <option value ="Maison 4">Maison 4</option>
                    <option value ="Maison 5">Maison 5</option>
                    <option value ="Maison 6">Maison 6</option>
                    
                    </select>
                    
                   
                    </div> 
                    <br/>
                    
                    <div id="Piece"  style="width:350px;height:50px;"  >
			        Piece :
			        <br />
			        <select>
			        
                    <option value ="Piece 1">Piece 1</option>
                    <option value ="Piece 2">Piece 2</option>
                    <option value ="Piece 3">Piece 3</option>
                    <option value ="Piece 4">Piece 4</option>
                    <option value ="Piece 5">Piece 5</option>
                    <option value ="Piece 6">Piece 6</option>
                
                    </select>
                    
                    </div> 
                    </div>
                    <br/>
                    <br/>
                    <br/>
                   
                   
                    <script type="text/javascript">
                    function del(){
                    	if(!confirm("Etes-vous sur de vouloir supprimer cette piece?")){
                    		window.event.returnValue=false;	
                    	}
                    }
                    
                    </script>
                    <div id="button1" text-align="center">
                    <button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:500px"><a href="" onclick="javascript:return del();">Supprimer</a></button>
                    <button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:50px">Annuler</button>
                    
	
    </div>
    
   
    <br/>
    
     
    
	
	</article>
	<footer>						<!--  début du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions légales -->
				Mentions légales
			</a>
		</p>

		 <div>
			Date et heure								<!--  affichage de la date et l'heure -->
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
	
	
	</footer>
	</body>
	</html>