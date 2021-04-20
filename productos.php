<? 
include("conexion.php"); 
session_start();

if($_GET['idg']==''){
echo '<script language="javascript">window.location="index.php"</script>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lista de Productos - Articulos Cristianos</title>
<meta name="keywords" content="articulos cristianos, catalogo de productos cristianos, productos cristianos, lista de productos cristianos, articulos para evangelizar, productos para evangelizar" />
<meta name="Description" content="Lista y Catálogo de Produtcos y Articulos Cristianos" />
<? include ('includes/head-code.php') ?>

<? if ($_SESSION['shalom']=="") { ?> 
<script type='text/javascript'>
$(document).ready(function() {
$.fancybox({
	'width'				: 460,
	'height'			: 200,
	'autoScale'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'type'				: 'iframe',
	'href'				: 'gracias-msjs.php?msj=proreg'
	}).trigger('click');
});
</script>
<? } ?>
</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" class="contentPages" style="padding-right:0px;">
	<h1 style="text-transform:uppercase"><? if ($_GET[idg]) {echo $_GET[idg];} else {echo 'Catalogo';} ?> &raquo; </h1>
	
	<?	if ($_GET[idg]) {
		$buscar=mysql_query("SELECT * FROM productos WHERE categoria='$_GET[idg]' AND status='A' ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<div class="catalogo-box">
	  <span class="txt-ref">Ref. <?=$datos['ref']?></span>
	  <a href="images/productos/<?=$datos['fotoG']?>" class="fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>"><img src="images/productos/<?=$datos['fotoM']?>" border="0" alt="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" title="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" /></a>
	  <span class="tit-producto"><?=$datos['nombre']?></span>
	  <?=$datos['sumario']?>...<br />
	  <span class="txt-white">Cantidad m&iacute;nima de compra: </span><span class="txt-white-bold-2"><?=$datos['cant']?></span><br />
	<span class="links-catalogo" style="line-height:20px;">
	<? if ($_SESSION['shalom']!="") { echo '<span class="txt-precio">Bs.F '.$datos['precioM'].'</span>'; } ?>
   <a href="images/productos/<?=$datos['fotoG']?>" class="links-catalogo fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>">+ Ampliar</a> &nbsp;|&nbsp; <a href="catalogo.php" class="links-catalogo">Categor&iacute;as</a><? if ($_SESSION['shalom']!="") { echo ' &nbsp;|&nbsp; <a href="pedidos.php" class="links-catalogo">Comprar</a>'; } ?>
   </span>
	</div>
	
	<? } } if ($_GET[idg]=='Todos') { 
	$buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<div class="catalogo-box">
	  <span class="txt-ref">Ref. <?=$datos['ref']?></span>
	  <a href="images/productos/<?=$datos['fotoG']?>" class="fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>"><img src="images/productos/<?=$datos['fotoM']?>" border="0" alt="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" title="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" /></a>
	  <span class="tit-producto"><?=$datos['nombre']?></span>
	  <?=$datos['sumario']?>...<br />
	  <span class="txt-white">Cantidad m&iacute;nima de compra: </span><span class="txt-white-bold-2"><?=$datos['cant']?></span><br />
	<span class="links-catalogo" style="line-height:20px;">
	<? if ($_SESSION['shalom']!="") { echo '<span class="txt-precio">Bs.F '.$datos['precioM'].'</span>'; } ?>
   <a href="images/productos/<?=$datos['fotoG']?>" class="links-catalogo fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>">+ Ampliar</a> &nbsp;|&nbsp; <a href="catalogo.php" class="links-catalogo">Categor&iacute;as</a><? //if ($_SESSION['shalom']!="") { echo ' &nbsp;|&nbsp; <a href="pedidos.php" class="links-catalogo">Comprar</a>'; } ?>
   </span>
	</div>
	
	<? } } if ($_GET[idg]=='Dolar') { 
	$buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<div class="catalogo-box">
	  <span class="txt-ref">Ref. <?=$datos['ref']?></span>
	  <a href="images/productos/<?=$datos['fotoG']?>" class="fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>"><img src="images/productos/<?=$datos['fotoM']?>" border="0" alt="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" title="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" /></a>
	  <span class="tit-producto"><?=$datos['nombre']?></span>
	  <?=$datos['sumario']?>...<br />
	  <span class="txt-white">Cantidad m&iacute;nima de compra: </span><span class="txt-white-bold-2"><?=$datos['cant']?></span><br />
	<span class="links-catalogo" style="line-height:20px;">
	<? if ($_SESSION['shalom']!="") { echo '<span class="txt-precio">US$ '.$datos['precioDol'].'</span>'; } ?>
   <a href="images/productos/<?=$datos['fotoG']?>" class="links-catalogo fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>">+ Ampliar</a> &nbsp;|&nbsp; <a href="catalogo.php" class="links-catalogo">Categor&iacute;as</a><? //if ($_SESSION['shalom']!="") { echo ' &nbsp;|&nbsp; <a href="pedidos.php" class="links-catalogo">Comprar</a>'; } ?>
   </span>
	</div>
	<? } } ?>
    
	</td>
  </tr>
  <tr>
	<td align="left" style="padding-left:35px;"><? include ('includes/social-add.php') ?></td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
<script type="text/javascript">
/*
$(document).ready(function() {
	$(".links-catalogo a").removeAttr("title");
}); 
*/
</script>
</body>
</html>