<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Tableau de bord</title>
</head>
<body>
	<header>
	<?php
        require("en_tete_connexion.php");
	?>
	
	</header>
	
	<article>
	
	<h1>Tableau de bord</h1>
	
	<div id="bandeau">
		
		
	<div id="conteneurcercle1">
			<div>
			    <a href="maison.php">
					<div>	
						Maisons
					</div>
				</a>
		</div> 
			<div>
			<a href="piece.php">
				<div>		
					Pi&egrave;ces
				</div>
			</a>
		</div>
			
			<div>
			<a href="page_des_composants.php">	
				<div>	
					Composants
				</div>
			</a>
		</div>
		
    </div>
		
	
	
	</article>
	<section>
	
	</section>	
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>
