<?php 
require_once '../modele/config_init.php'; //Connexion et chargement bdd


$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL,
"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=007A&TRAME=1007A1301002B012544");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");


$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
$size=count($data_tab);
for($i=0, $size; $i<$size; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
}

$trame = $data_tab[$size-2];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

$table = array($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec);

/*$req=$pdo->prepare('INSERT INTO donnees(IDcomposant,donnees) VALUES(:id, :donnees)');
$donnees= hexdec($table[5]);
$result = $req->execute(array(':id'=>intval($table[3]), ':donnees'=>$donnees)); */
?>