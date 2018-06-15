
<!DOCTYPE html>
<html>
<head>
	<title>Statistiques</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
			<?php
                require("en_tete_connexion.php");
	       ?>
</header>
<article>
	 <div >
	 	
		<form method="post" action="">
		<article class="forme_stats">
		<div class="selection_stats">
			<p>  
			    <h1>
			    	<abbr title="Les valeurs moyennes de temp&eacute;rature pour des pi&egrave;ces comme le salon, la cuisine, le bureau, etc.. 
doivent tourner autour des 19 degr&eacute;s C.Pour la salle de bain, la temp&eacute;rature doit &ecirc;tre d'environ 20 degr&eacute;s C.
Enfin les chambres doivent &ecirc;tre &agrave; une temp&eacute;rature de 16 degr&eacute;s durant la nuit car un espace frais peut favoriser 
un sommeil r&eacute;parateur. 
Pour les b&eacute;b&eacute;s, 3 degr&eacute;s C de plus sont n&eacute;cessaires du fait de leur fragilit&eacute;.">
			    		Temp&eacute;rature
			    	</abbr>
			    </h1>
			
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select classe="réponse1" name="piece_t">
					
					<?php
					include('../modele/config_init.php');
					$id=$_SESSION['ID']; // on récupère l'id de l'utilisateur connecté
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE  maison.selection = 1 AND maison.IDutilisateur= "'.$id.'"');
					// permet de sélectionner les pièces de la maison sélectionnée uniquement (et de l'utilisateur connecté)
					while ($donnees = $reponse->fetch())
					{
	    			?>
	    			<option >
	    			<?php echo $donnees['nom']; ?>
	    			</option>
					<?php
					}
				
					$reponse->closeCursor(); 
				
					?>
					
			</section> 
					</option> 
				</select>
			</div>
			
			<div class="selection_stats">

			    <h1>
			    	<abbr title="Le taux d'humidit&eacute; relative tol&eacute;r&eacute;e est situ&eacute; entre 40 et 60% d'humidit&eacute. 
Un air trop humide peut provoquer des d&eacute;g&acirc;ts dans la maison et entra&icirc;ner 
des probl&egrave;mes de sant&eacute;. 
Un air trop sec peut favoriser la pr&eacue;sence de poussi&egrave;re et cr&eacute;er un 
ass&egrave;chement des muqueuses.">
					Humidit&eacute;
			    	</abbr>
			    </h1>
			
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select class="réponse1" name="piece_h">
					
					<?php
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" ');
					// permet de sélectionner les pièces de la maison sélectionnée uniquement (et de l'utilisateur connecté)
					while ($donnees = $reponse->fetch())
					{
	    			?>
	    			<option >
	    			<?php echo $donnees['nom']; ?>
	    			</option>
					<?php
					}
				
					$reponse->closeCursor(); 
				
					?>
					
				</select>
				</div>
				<div class="selection_stats">
 							<input type="submit" id="stats" value="Consulter" />
 				</div>
		</article>
		</form>
	</div>
	<div>
		<?php 
			
			if(!empty($_POST['piece_t']))
			{
				$temp = $_POST['piece_t'];
			}
			if(!empty($_POST['piece_h']))
			{
				$humid = $_POST['piece_h'];
			}
		?>
		<?php
try
{
	$conexion = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
		<?php 
		$room_t = $bdd->query('SELECT piece.IDpiece FROM piece 
JOIN maison ON (piece.IDmaison = maison.IDmaison) 
WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" AND piece.nom = "'.$temp.'" ');

		$heat = $bdd->query('SELECT IDcapteur FROM capteur
WHERE IDpiece= "'.$room_t.'" AND nomtype = Capteur de température ');
		
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sqlQuery = 'SELECT month(dates) AS mois, avg(donnees) AS moyennetemp FROM donnees 
WHERE IDcapteur = "'.$heat.'"
GROUP BY mois ORDER BY mois asC';
$sth = $conexion->prepare($sqlQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':year' => 2018));

$moisFr=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre');
$resultat=array();
$i=0;
foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
{
    //Mettre la ligne dans le tableau
    $resultat[$row->mois]=$row->moyennetemp;
    //Prendre la température moyenne comme minimum et maximum
    if($i==0)
		{
			$min=$row->moyennetemp;
			$max=$row->moyennetemp;
		}
    //Tester si la température moyenne est inférieure au minimum et le prendre si il l'est
    if($row->moyennetemp < $min)
		{
			$min=$row->moyennetemp;
		}
    //Tester si la température moyenne est inférieure au maximum et le prendre si il l'est
    else
		{
			if($row->moyennetemp > $max)
			 {
			 	$max=$row->moyennetemp;
			}
		}
    $i++;
}
	?>
	<?php 
	
	//Type mime de l'image
header('Content-type: image/png');
//Chemin vers le police à utiliser
$font_file = './arial.ttf';
//Adapter la largeur de l'image avec le nombre de donnée
$largeur=$i*50+90;
$hauteur=400;
//Hauteur de l'abscisse par rapport au bas de l'image
$absis=80;
//Création de l'image
$courbe=imagecreatetruecolor($largeur, $hauteur);
//Allouer les couleurs à utiliser
$bleu=imagecolorallocate($courbe, 0, 0, 255);
$ligne=imagecolorallocate($courbe, 220, 220, 220);
$fond=imagecolorallocate($courbe, 250, 250, 250);
$noir=imagecolorallocate($courbe, 0, 0, 0);
$rouge=imagecolorallocate($courbe, 255, 0, 0);
//Colorier le fond
imagefilledrectangle($courbe,0 , 0, $largeur, $hauteur, $fond);
//Tracer l'axe des abscisses
imageline($courbe, 50, $hauteur-$absis, $largeur-10,$hauteur-$absis, $noir);
//Tracer l'axe des ordonnées
imageline($courbe, 50,$hauteur-$absis,50,20, $noir);
//Decaler 10px vers le haut le si le minimum est différent de 0
if($min!=0)
{
    $absis+=10;
    $a=10;
}
//Nombres des grides verticales
$nbOrdonne=10;
//Calcul de l'echelle des abscisses
$echelleX=($largeur-100)/$i;
//Calcul de l'echelle des ordonnees
$echelleY=($hauteur-$absis-20)/$nbOrdonne;
$i=$min;
//Calcul des ordonnees des grides
$py=($max-$min)/$nbOrdonne;
$pasY=$absis;
while($pasY<($hauteur-19))
{
    //Affiche la valeur de l'ordonnee
    imagestring($courbe, 2,10 , $hauteur-$pasY-6, round($i), $noir);
    //Trace la gride
    imageline($courbe, 50, $hauteur-$pasY, $largeur-20,$hauteur-$pasY, $ligne);
    //Decaller vers le haut pour la prochaine gride
    $pasY+=$echelleY;
    //Valeur de l'ordonnee suivante
    $i+=$py;
}


$j=-1;
 //Position de la première mois de vente
 $pasX=90;
 //Parcourir le tableau pour le traçage de la diagramme
 foreach ($resultat as $mois => $donnees) {
   //calculer la hateur du point par rapport à sa valeur
   $y=($hauteur) -(($donnees -$min) * ($echelleY/$py))-$absis;
   //dessiner le point
   imagefilledellipse($courbe, $pasX, $y, 6, 6, $rouge);
   //Afficher le mois en français avec une inclinaison de 315°
   imagefttext($courbe, 10, 315, $pasX, $hauteur-$absis+20, $noir, $font_file, $moisFr[$mois-1]);
   //Tacer une ligne veticale de l'axe de l'abscisse vers le point
   imageline($courbe, $pasX, $hauteur-$absis+$a, $pasX,$y, $noir);
   if($j!==-1)
    {
      //liée le point actuel avec la précédente
      imageline($courbe,($pasX-$echelleX),$yprev,$pasX,$y,$noir);
    }
    //Afficher la valeur au dessus du point
   imagestring($courbe, 2, $pasX-15,$y-14 , $donnees, $bleu);
   $j=$donnees;
   //enregister la hauteur du point actuel pour la liaison avec la suivante
   $yprev=$y;
   //Decaller l'abscisse suivante par rapport à son echelle
   $pasX+=$echelleX;
}
//Envoyer le flux de l'image
imagepng($courbe);
//Desallouer le memoire utiliser par l'image
imagedestroy($courbe);
	?>

	<?php 
	$room_h = $bdd->query('SELECT piece.IDpiece FROM piece
JOIN maison ON (piece.IDmaison = maison.IDmaison)
WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" AND piece.nom = "'.$humid.'" ');
	
	$water = $bdd->query('SELECT IDcapteur FROM capteur
WHERE IDpiece= "'.$room_h.'" AND nomtype = Capteur de humidité ');
	
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlQuery = 'SELECT month(dates) AS mois, avg(donnees) AS moyennehumid FROM donnees
WHERE IDcapteur = "'.$water.'"
GROUP BY mois ORDER BY mois asC';
	
	$sth = $conexion->prepare($sqlQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute(array(':year' => 2018,));
	
	$moisFr=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre');
	$resultat=array();
	$i=0;
	foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
	{
		//Mettre la ligne dans le tableau
		$resultat[$row->mois]=$row->moyennehumid;
		//Prendre la température moyenne comme minimum et maximum
		if($i==0)
		{
			$min=$row->moyennehumid;
			$max=$row->moyennehumid;
		}
		//Tester si la température moyenne est inférieure au minimum et le prendre si il l'est
		if($row->moyennehumid < $min)
		{
			$min=$row->moyennehumid;
		}
		//Tester si la température moyenne est inférieure au maximum et le prendre si il l'est
		else
		{
			if($row->moyennehumid > $max)
			{
				$max=$row->moyennehumid;
			}
		}
		$i++;
	}
	?>
	<?php 
	//Type mime de l'image
header('Content-type: image/png');
//Chemin vers le police à utiliser
$font_file = './arial.ttf';
//Adapter la largeur de l'image avec le nombre de donnée
$largeur=$i*50+90;
$hauteur=400;
//Hauteur de l'abscisse par rapport au bas de l'image
$absis=80;
//Création de l'image
$courbe=imagecreatetruecolor($largeur, $hauteur);
//Allouer les couleurs à utiliser
$bleu=imagecolorallocate($courbe, 0, 0, 255);
$ligne=imagecolorallocate($courbe, 220, 220, 220);
$fond=imagecolorallocate($courbe, 250, 250, 250);
$noir=imagecolorallocate($courbe, 0, 0, 0);
$rouge=imagecolorallocate($courbe, 255, 0, 0);
//Colorier le fond
imagefilledrectangle($courbe,0 , 0, $largeur, $hauteur, $fond);
//Tracer l'axe des abscisses
imageline($courbe, 50, $hauteur-$absis, $largeur-10,$hauteur-$absis, $noir);
//Tracer l'axe des ordonnées
imageline($courbe, 50,$hauteur-$absis,50,20, $noir);
//Decaler 10px vers le haut le si le minimum est différent de 0
if($min!=0)
{
    $absis+=10;
    $a=10;
}
//Nombres des grides verticales
$nbOrdonne=10;
//Calcul de l'echelle des abscisses
$echelleX=($largeur-100)/$i;
//Calcul de l'echelle des ordonnees
$echelleY=($hauteur-$absis-20)/$nbOrdonne;
$i=$min;
//Calcul des ordonnees des grides
$py=($max-$min)/$nbOrdonne;
$pasY=$absis;
while($pasY<($hauteur-19))
{
    //Affiche la valeur de l'ordonnee
    imagestring($courbe, 2,10 , $hauteur-$pasY-6, round($i), $noir);
    //Trace la gride
    imageline($courbe, 50, $hauteur-$pasY, $largeur-20,$hauteur-$pasY, $ligne);
    //Decaller vers le haut pour la prochaine gride
    $pasY+=$echelleY;
    //Valeur de l'ordonnee suivante
    $i+=$py;
}


$j=-1;
 //Position de la première mois de vente
 $pasX=90;
 //Parcourir le tableau pour le traçage de la diagramme
 foreach ($resultat as $mois => $donnees) {
   //calculer la hateur du point par rapport à sa valeur
   $y=($hauteur) -(($donnees -$min) * ($echelleY/$py))-$absis;
   //dessiner le point
   imagefilledellipse($courbe, $pasX, $y, 6, 6, $rouge);
   //Afficher le mois en français avec une inclinaison de 315°
   imagefttext($courbe, 10, 315, $pasX, $hauteur-$absis+20, $noir, $font_file, $moisFr[$mois-1]);
   //Tracer une ligne verticale de l'axe de l'abscisse vers le point
   imageline($courbe, $pasX, $hauteur-$absis+$a, $pasX,$y, $noir);
   if($j!==-1)
    {
      //lier le point actuel avec la précédente
      imageline($courbe,($pasX-$echelleX),$yprev,$pasX,$y,$noir);
    }
    //Afficher la valeur au dessus du point
   imagestring($courbe, 2, $pasX-15,$y-14 , $donnees, $bleu);
   $j=$donnees;
   //enregister la hauteur du point actuel pour la liaison avec la suivante
   $yprev=$y;
   //Decaller l'abscisse suivante par rapport à son echelle
   $pasX+=$echelleX;
}
//Envoyer le flux de l'image
imagepng($courbe);
//Desallouer le memoire utiliser par l'image
imagedestroy($courbe);

	?>



	</div>
</article>
<footer>						<!--  d&eacute;but du bas de la page -->
			<?php
                require("footer.php");
            ?>
</footer>
</body>
</html>