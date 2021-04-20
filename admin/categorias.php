<? include("../conexion.php");
   include("../includes/funciones.php"); 

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO categorias (nombre,descripcion,status) VALUES ('$_POST[nombre]','$_POST[descripcion]','$_POST[status]')");
  }


if($_GET['act']==2){
  $edit=mysql_query("UPDATE categorias SET nombre='$_POST[nombre]',descripcion='$_POST[descripcion]',status='$_POST[status]' WHERE idCat='$_GET[id]'");
  }

if($_GET['act']==3){
  if($result=mysql_query("DELETE FROM categorias WHERE idCat='$_GET[id]'")){
    $mensaje='<center><b style="font-size:11px;color:#665416;">Categoria Eliminada</b></center><br />';
    echo "<script language=\"javascript\">setTimeout(\"window.location='categorias.php'\",10)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM categorias WHERE idCat='$_GET[id]'");
  $d=mysql_fetch_array($result);
  $action="act=2&id=".$_GET['id'];
}  
else{
  $action="act=1";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Articulos Cristianos - Admin</title>
<? include ('includes/head-code.php') ?>

<script type="text/javascript">

  $(document).ready(function(){
    $("#formCat").validate();
  });
  
</script>

</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<? include ('includes/header.php') ?>
	</td>
  </tr>
  <tr>
    <td valign="top" class="contentPages" style="padding-bottom:30px;">
	<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="formCat" id="formCat">
	  <table width="540" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span class="titles-admin">Categorias</span><?=$mensaje?></td>
          </tr>
        <tr>
          <td width="185" align="right">Nombre de la Categor&iacute;a:</td>
          <td width="343" class="txt-error-msg"><input name="nombre" type="text" class="txt-fields-admin required" id="nombre" value="<?=$d['nombre']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Descripci&oacute;n:</td>
          <td><textarea name="descripcion" rows="5" wrap="virtual" class="txt-fields-admin" id="descripcion"><?=$d['descripcion']?></textarea></td>
        </tr>
        <tr>
          <td align="right">Status:</td>
          <td class="txt-white" style="font-size:11px">
          	<input name="status" type="radio" value="A" checked="checked" <? if($d['status']==A) echo "checked";?> />Activado 
             &nbsp; &nbsp; 
            <input name="status" type="radio" value="D" <? if($d['status']==D) echo "checked";?> />Desactivado
           </td>
        </tr>
        <tr>
          <td height="32"></td>
          <td height="32" valign="bottom"><input name="Submit" type="submit" class="but-admin" value="Guardar" /> 
		  <input type="button" name="Submit3" value="Cancelar" class="but-admin" onClick="window.location='categorias.php'" /></td>
        </tr>
		</table>
	  </form>
        <table width="540" border="0" align="center" cellpadding="3" cellspacing="0" style="margin-top:70px;">
        <tr>
          <td align="center" class="txt-white-bold-2" style="text-transform:uppercase;border-bottom:solid 1px #4E4011;border-top:solid 1px #4E4011">Listado de Categorias</td>
        </tr>
        <tr>
          <td height="50" align="center" class="links-catalogo">&#8212;- <span style="color:#DDDDDD">N° de Categor&iacute;as:</span> <strong><? echo cuantos_items('categorias'); ?></strong> -&#8212;</td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM categorias ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
        <tr>
          <td style="padding-left:10px;border-bottom:solid 1px #2B2309; <? if ($datos['status']==D) { echo 'filter:Alpha(Opacity=45);-moz-opacity:.45;opacity:.45;'; } ?>"><a href="?act=3&id=<?=$datos['idCat']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idCat']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="links-catalogo"><span style="color:#FFF"><?=$datos['status']?></span> - </span><span class="txt-yellow-bold"><?=$datos['nombre']?></span></td><!-- border-bottom:solid 1px #2B2309 -->
          </tr>
		<? } ?>
      </table>
    </td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
