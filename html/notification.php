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
       	
       		$not = $bdd->query('SELECT * FROM notification ORDER BY date DESC');
       		?>
       		  
       		    <table id="notification">
       		     	<tr>
       		       		<th id="not">Notifications</th>
       		        	<th id="date">Date</th>
       		       		<th id="vu"></th>
      	    		</tr>
       		        
       		      <?php 
       		        foreach ($not->fetchAll() as $donnees) {
       		           
       		       ?>
       		       <form action="../traitements/traitement_vu.php" method="post">
  					<tr>
     					<td id="not2"><?php echo $donnees['texte'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     					<input type="hidden" name="ID" value=<?php echo $donnees['IDnotification'] ?>></input>
     					<td id="not2">       		        	
       		        	<?php
       		        	if($donnees['etat'])
       		        	{
       		            ?>
       		            <input type="submit" id="vu" value="Vu">
     					<?php
       		        	}
     					else
     					{
     					?>
     					<?php
       		        	}
       		        	?>
     					</td>
     				</tr>
     				</form>
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