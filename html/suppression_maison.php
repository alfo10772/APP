<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->




<title>suppression d'une maiso_1</title>
</head>
	<body>
	
		<header>
			<p>
					<img  src="../images/LogoHabilis.png" alt="Logo Habilis"  width="200">		<!--logoha   -->
				<br/>
				Un produit de Domisep	
		 </p>
			
				<div id="conteneur3">
				<br />
				<br />
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				<br />
				<a href="page_de_connexion.php">			
					Se déconnecter
				</a>
			
			</div>
		<div id="profil">
			<img src="../images/photo.png" alt="Photo profil" width="125">
	   			<p>
	   			&nbsp;Nom d'utilisateur
	   			</p>	
		</div>
	</header>
	<article>
	
    
	<h1>suppression maison</h1>
	<br/>
	<br/>
	<br/>
	<div style="float:left;width:250px;height:10px;">
			<a href="supprimer_maison1.html">		
				<input type="submit" id="supprimer" value="Retour à la page d'accueil" />
			</a>
		</div>
	<div style="float:right;width:250px;height:10px;">
			<a href="suppression_piece.html">		
				<input type="submit" id="supprimer" value="Retour à la suppression d'une piece" />
			</a>
	</div>
	<br/> 
	<br/>
	<br/>
	
	
	<div id="conteneur2">
	<div id="Nom de la maison"  style="text-align:left;width:350px;height:50px;" >
			        Nom:
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
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    </div>
              
                    <script type="text/javascript">
                    function del(){
                    	if(!confirm("Etes-vous sur de vouloir supprimer cette maison?")){
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