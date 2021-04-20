<? 
include("conexion.php"); 
session_start();

if(isset($_GET['idg'])) $idg=$_GET['idg'];
else{
   $buscar=mysql_query("SELECT * FROM lecturas ORDER BY fecha DESC");
   $datos=mysql_fetch_array($buscar);
   $idg=$datos['idLec'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lecturas - Articulos Cristianos</title>
<meta name="Keywords" content="lecturas biblicas, la palabra de Dios, estudios biblicos, la biblia" />
<meta name="Description" content="Lecturas y estudios sobre la palabra de Dios" />
<? include ('includes/head-code.php') ?>
<style type="text/css">
.img-border {
	border:solid 1px #FDE688;
}
</style>
</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" class="contentPages">
	<h1>Lecturas  &raquo;</h1>
	<? $buscar=mysql_query("SELECT * FROM lecturas WHERE idLec='$idg'");
		$datos=mysql_fetch_array($buscar)?>   
	<h2><?=$datos['titulo']?></h2>
	<img src="images/lecturas/<?=$datos['foto1']?>" style="margin-left:15px;float:right" alt="<?=$datos['titulo']?>" title="<?=$datos['titulo']?>" class="img-border" />
	<?=$datos['contenido']?>
	<img src="images/lecturas/<?=$datos['foto2']?>" style="float:right; margin-bottom:15px;" alt="<?=$datos['titulo']?> - Imagen 2" title="<?=$datos['titulo']?> - Imagen 2" />
	<p class="txt-white"><em><?=$datos['firma']?></em></p><br />
    
	<p><a href="mailto:articulos.cristianos@yahoo.com" class="links-catalogo"><span class="txt-yellow-bold">Env&iacute;enos</span>  su lectura b&iacute;blica: articulos.cristianos@yahoo.com</a></p>
    
    <? include ('includes/social-add.php') ?>
    
	<hr align="center" width="100%" size="1" />	
	<p align="center" class="txt-white-bold-2" style="text-transform:uppercase">Lecturas Anteriores</p>
	<? $buscar=mysql_query("SELECT * FROM lecturas ORDER BY fecha DESC");
		   while($datos=mysql_fetch_array($buscar)){?>
	<span class="txt-white" style="margin-left:50px;">&raquo; <a href="lecturas.php?idg=<?=$datos['idLec']?>" class="txt-yellow-bold"><?=$datos['titulo']?></a></span><br />
	<? } ?>
	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
