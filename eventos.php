<? 
include("conexion.php");
session_start();

include("includes/funciones.php"); 

$fechaHoy = date('Y-m-d');
$folder="images/eventos";

if($fechaHoy!=''){
$result = mysql_query("SELECT * FROM eventos WHERE fecha<'$fechaHoy'");
$d=mysql_fetch_array($result);
mysql_query("DELETE FROM eventos WHERE fecha<'$fechaHoy'"); 
@borrar_imagen($d['foto'],$folder);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Eventos - Articulos Cristianos</title>
<meta name="Keywords" content="eventos cristianos, conciertos cristianos, conferencias cristianas" />
<meta name="Description" content="Información sobre conciertos y todo tipo de eventos cristianos" />
<? include ('includes/head-code.php') ?>
</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" class="contentPages">
	<h1>Eventos Cristianos  &raquo;</h1>
	<? $buscar=mysql_query("SELECT * FROM eventos ORDER BY fecha ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<div class="eventos-box">
	<div style="width:60px;float:left;margin-right:12px;display:block;text-align:center">
	<a href="images/eventos/<?=$datos['foto']?>" class="links-catalogo fancy" title="<b><?=$datos['titulo']?></b>"><img src="images/eventos/<?=$datos['foto']?>" border="0" alt="<?=$datos['titulo']?>" title="<?=$datos['titulo']?>" />[ Ampliar ]</a></div>
	<span class="eventos-tit"><?=$datos['titulo']?></span>
	<?=$datos['contenido']?>
	</div>
	<? } ?>
	</td>
  </tr>
  <tr>
	<td align="left" style="padding-left:35px;"><? include ('includes/social-add.php') ?></td>
  </tr>
<? include ('includes/footer.php') ?>
</table>

<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=7608471; 
var sc_invisible=1; 
var sc_security="2c8190a2"; 
</script>

<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript><div class="statcounter"><a title="godaddy
statistics"
href="http://statcounter.com/godaddy_website_tonight/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/7608471/0/2c8190a2/1/"
alt="godaddy statistics"></a></div></noscript>
<!-- End of StatCounter Code -->

</body>
</html>
