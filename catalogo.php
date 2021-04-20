<? 
include("conexion.php"); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cat&aacute;logo - Articulos Cristianos</title>
<meta name="keywords" content="articulos cristianos, categorias de productos cristianos, catalogo de productos cristianos, productos cristianos, lista de productos cristianos" />
<meta name="Description" content="Lista de Categorías de productos y Articulos Cristianos" />
<? include ('includes/head-code.php') ?>
<script type="text/javascript" src="scripts/vwd_curvycorners.js"></script>
<script type="text/javascript">
<!--
gCurvyCorners[0]="@but-cat-box,5,5,5,5,1,1";
//-->
</script>
</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" class="contentPages" style="padding-right:0px;">
	<h1>Cat&aacute;logo &raquo;</h1>
	<? $buscar=mysql_query("SELECT * FROM categorias WHERE status='A' ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<div class="but-cat-margins"><div class="but-cat-box"><a href="productos.php?idg=<?=$datos['nombre']?>" class="but-categorias"><?=$datos['nombre']?></a></div></div>
	<? } ?>
<!-- div class="but-cat-margins"><div class="but-cat-box"><a href="productos.php" class="but-categorias">Todos...</a></div></div -->
	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
