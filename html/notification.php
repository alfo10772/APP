<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page des notifications</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>

	<article>
		
		<h1>Notifications</h1>
		
		<?php 
       		include('../modele/config_init.php');
       	
       		$not = $bdd->query('SELECT * FROM notification');
       		?>
       		  
       		    <table id="notification">
       		     	<tr>
       		       		<th id="not">Notifications</th>
       		        	<th id="date">date</th>
      	    		</tr>
       		        
       		      <?php 
       		        foreach ($not->fetchAll() as $donnees) {
       		           
       		       ?> 
  					<tr>
     					<td id="not2"><?php echo $donnees['texte'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     				</tr>
  					<?php
                        }
                    ?>
  				</table>

       	
    </article>
	
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>