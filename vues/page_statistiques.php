
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
			
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select classe="r�ponse1" name="piece_t">
					
					<?php
					include('../modele/config_init.php');
					$id=$_SESSION['ID']; // on r�cup�re l'id de l'utilisateur connect�
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE  maison.selection = 1 AND maison.IDutilisateur= "'.$id.'"');
					// permet de s�lectionner les pi�ces de la maison s�lectionn�e uniquement (et de l'utilisateur connect�)
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
			
		?>
		<?php 
		$room_t = $bdd->query('SELECT piece.IDpiece FROM piece
JOIN maison ON (piece.IDmaison = maison.IDmaison)
WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" AND piece.nom = "'.$temp.'" ');
		
		$nom_capteur = $bdd->query('SELECT capteur.nom FROM capteur
JOIN maison ON (piece.IDmaison = maison.IDmaison)
WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" AND piece.nom = "'.$temp.'" ');
		
		?>
		<select classe="r�ponse1" name="nom_capteur">
			<option >
		    			<?php echo $nom_capteur ; ?>
		    </option>
		</select>
		<?php 
		if(!empty($_POST['nom_capteur']))
		{
			$name = $_POST['nom_capteur'];
		}
		?>
		<?php
		$ID_capteur = $bdd->query$bdd->query('SELECT IDcapteur FROM capteur
JOIN maison ON (piece.IDmaison = maison.IDmaison)
WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" 
AND piece.nom = "'.$temp.'"
AND capteur.nom = "'.$name.'" ');
		
		
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
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sqlQuery = 'SELECT month(dates) AS mois, avg(donnees) AS moyennetemp FROM donnees 
WHERE IDcapteur = "'.$ID_capteur.'"
GROUP BY mois ORDER BY mois asC';
// selection des donn�es
$sth = $conexion->prepare($sqlQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':year' => 2018));

$moisFr=array('Janvier','F�vrier','Mars','Avril','Mai','Juin','Juillet','Ao�t','Septembre','Octobre','Novembre','Decembre');
$resultat=array();
$i=0;
foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
{
    //Mettre la ligne dans le tableau
    $resultat[$row->mois]=$row->moyennetemp;
    //Prendre la temp�rature moyenne comme minimum et maximum
    if($i==0)
		{
			$min=$row->moyennetemp;
			$max=$row->moyennetemp;
		}
    //Tester si la temp�rature moyenne est inf�rieure au minimum et le prendre si il l'est
    if($row->moyennetemp < $min)
		{
			$min=$row->moyennetemp;
		}
    //Tester si la temp�rature moyenne est inf�rieure au maximum et le prendre si il l'est
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
//Chemin vers le police � utiliser
$font_file = './arial.ttf';
//Adapter la largeur de l'image avec le nombre de donn�e
$largeur=$i*50+90;
$hauteur=400;
//Hauteur de l'abscisse par rapport au bas de l'image
$absis=80;
//Cr�ation de l'image
$courbe=imagecreatetruecolor($largeur, $hauteur);
//Allouer les couleurs � utiliser
$bleu=imagecolorallocate($courbe, 0, 0, 255);
$ligne=imagecolorallocate($courbe, 220, 220, 220);
$fond=imagecolorallocate($courbe, 250, 250, 250);
$noir=imagecolorallocate($courbe, 0, 0, 0);
$rouge=imagecolorallocate($courbe, 255, 0, 0);
//Colorier le fond
imagefilledrectangle($courbe,0 , 0, $largeur, $hauteur, $fond);
//Tracer l'axe des abscisses
imageline($courbe, 50, $hauteur-$absis, $largeur-10,$hauteur-$absis, $noir);
//Tracer l'axe des ordonn�es
imageline($courbe, 50,$hauteur-$absis,50,20, $noir);
//Decaler 10px vers le haut le si le minimum est diff�rent de 0
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
 //Position de la premi�re mois de vente
 $pasX=90;
 //Parcourir le tableau pour le tra�age de la diagramme
 foreach ($resultat as $mois => $donnees) {
   //calculer la hateur du point par rapport � sa valeur
   $y=($hauteur) -(($donnees -$min) * ($echelleY/$py))-$absis;
   //dessiner le point
   imagefilledellipse($courbe, $pasX, $y, 6, 6, $rouge);
   //Afficher le mois en fran�ais avec une inclinaison de 315�
   imagefttext($courbe, 10, 315, $pasX, $hauteur-$absis+20, $noir, $font_file, $moisFr[$mois-1]);
   //Tacer une ligne veticale de l'axe de l'abscisse vers le point
   imageline($courbe, $pasX, $hauteur-$absis+$a, $pasX,$y, $noir);
   if($j!==-1)
    {
      //li�e le point actuel avec la pr�c�dente
      imageline($courbe,($pasX-$echelleX),$yprev,$pasX,$y,$noir);
    }
    //Afficher la valeur au dessus du point
   imagestring($courbe, 2, $pasX-15,$y-14 , $donnees, $bleu);
   $j=$donnees;
   //enregister la hauteur du point actuel pour la liaison avec la suivante
   $yprev=$y;
   //Decaller l'abscisse suivante par rapport � son echelle
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