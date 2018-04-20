<style>
p {
    float:left;
    }
</style>
    <table style="width:100%">
<tr>
    <td style="width: 80%">
    
    <p>
		<img src="../images/LogoHabilisPetit.png" alt="Logo Habilis">
		<br/>
		Un produit de Domisep
	</p>
    </td>
    <td style="width: 10%">
    <a href="redirection.php">
    <h2>Se déconnecter</h2>
    </a>
    </td>
    <td>
    <?php
    echo $_SESSION[’nom’];
    ?>
    </td>
  </tr>
  </table>