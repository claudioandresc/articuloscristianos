<? include("../conexion.php");
   include("../includes/funciones.php");

if($_GET['ord']){
$ordenar = $_GET['ord'];}
else {$ordenar = 'categoria';}

/*
if (empty($HTTP_GET_VARS['o'])) {header('Location: productos.php?o=categoria');}
$ordenar = $HTTP_GET_VARS['o'];
*/


$folder="images/productos";

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO productos (nombre,ref,sumario,descripcion,precioM,precioD,precioDol,cant,categoria,status) VALUES ('$_POST[nombre]','$_POST[ref]','$_POST[sumario]','$_POST[descripcion]','$_POST[precioM]','$_POST[precioD]','$_POST[precioDol]','$_POST[cant]','$_POST[categoria]','$_POST[status]')");
  $idn=mysql_insert_id();
  if($_FILES['pic1']['tmp_name']!="") $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"imgM_".$idn);
  if($_FILES['pic2']['tmp_name']!="") $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"imgG_".$idn);
   $imagenes=mysql_query("UPDATE productos SET fotoM='$foto1',fotoG='$foto2' WHERE idProd='$idn'");
  }

if($_GET['act']==2){
if($_FILES['pic1']['tmp_name']!=""){
     @borrar_imagen($_POST['fot1'],$folder);
	 $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"imgM_".$_GET['id']);}
  else $foto1=$_POST['fot1'];  
  if($_FILES['pic2']['tmp_name']!=""){
     @borrar_imagen($_POST['fot2'],$folder);
	 $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"imgG_".$_GET['id']);}
  else $foto2=$_POST['fot2'];
  $edit = mysql_query("UPDATE productos SET nombre='$_POST[nombre]',ref='$_POST[ref]',sumario='$_POST[sumario]',fotoM='$foto1',fotoG='$foto2',descripcion='$_POST[descripcion]',precioM='$_POST[precioM]',precioD='$_POST[precioD]',precioDol='$_POST[precioDol]',cant='$_POST[cant]',categoria='$_POST[categoria]',status='$_POST[status]' WHERE idProd='$_GET[id]'");
  }

if($_GET['act']==3){
  $result = mysql_query("SELECT * FROM productos WHERE idProd='$_GET[id]'");
  $d=mysql_fetch_array($result); 
  @borrar_imagen($d['fotoM'],$folder);
  @borrar_imagen($d['fotoG'],$folder);
  if($result=mysql_query("DELETE FROM productos WHERE idProd='$_GET[id]'")){
    $mensaje='<center><b style="font-size:11px;color:#665416;">Producto Eliminado</b></center><br />';
    echo "<script language=\"javascript\">setTimeout(\"window.location='productos.php'\",10)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM productos WHERE idProd='$_GET[id]'");
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
<script type="text/javascript" src="../scripts/autoNumeric.js"></script>

<script type="text/javascript">

function calculateDolar(rnum, rlength) {
dolar = (rnum / 12.5);
var newnumber = Math.round(dolar*Math.pow(10,rlength))/Math.pow(10,rlength);
document.formProducts.precioDol.value = parseFloat(newnumber); // Output the result to the form field (change for your purposes)
}

/*
function autoPrecioD() {
document.formProducts.precioD.value = parseFloat(document.formProducts.precioM.value)+parseFloat(document.formProducts.precioM.value)/2;;
}
*/

  $(document).ready(function(){
    $("#formProducts").validate();
  });

  
  jQuery(function($) {
	$('input.auto').autoNumeric();
	// please see the following pages:
	// (http://www.decorplanit.com/plugin/autoLoaderFunction.htm) information on the starting autoNumeric() and loading values
	// (http://www.decorplanit.com/plugin/specialCharacters.htm) information id's with special characters
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
	<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="formProducts" id="formProducts">
		<input type="hidden" name="fot1" value="<?=$d['fotoM']?>">
		<input type="hidden" name="fot2" value="<?=$d['fotoG']?>">
	  <table width="540" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span class="titles-admin">Productos</span><?=$mensaje?></td>
          </tr>
        <tr>
          <td align="right">Categor&iacute;a:</td>
          <td class="txt-error-msg"><select name="categoria" class="txt-fields-admin required" id="categoria">
            <option value="" style="color:#FFFFCC">Seleccione la Categor&iacute;a del producto &raquo;</option>
			  <? $buscar=mysql_query("SELECT * FROM categorias ORDER BY nombre ASC");
			     while($datos=mysql_fetch_array($buscar)){?>
				<option value="<?=$datos['nombre']?>"  <? if($datos['nombre']==$d['categoria']) echo "selected";?> style="font-size:12px"><?=$datos['nombre']?></option> 	
			   <? } ?>
           </select>
          </td>
        </tr>
        <tr>
          <td width="150" align="right">Nombre del Art&iacute;culo:</td>
          <td width="378" class="txt-error-msg"><input name="nombre" type="text" class="txt-fields-admin required" id="nombre" value="<?=$d['nombre']?>" /></td>
        </tr>
        <tr>
          <td align="right">Ref.</td>
          <td class="txt-error-msg"><input name="ref" type="text" class="txt-fields2-admin required" id="ref" value="<?=$d['ref']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Sumario:</td>
          <td valign="top" class="txt-error-msg"><textarea name="sumario" rows="3" wrap="virtual" class="txt-fields-admin required" id="sumario" maxlength="90" onkeypress="return ismaxlength(this)"><?=$d['sumario']?></textarea></td>
        </tr>
        <tr>
          <td align="right" valign="top">Descripci&oacute;n:</td>
          <td class="txt-error-msg"><textarea name="descripcion" rows="7" wrap="virtual" class="txt-fields-admin required" id="descripcion" style="width:370px;"><?=$d['descripcion']?></textarea>
<!-- script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.

CKEDITOR.replace( 'descripcion',
	{
		skin : 'v2',
		toolbar : 'Basic',
	});
			//]]>
</script -->	
		  </td>
        </tr>
        <tr>
          <td align="right">Precio al Mayor: </td>
          <td class="txt-error-msg"><input name="precioM" type="text" class="txt-fields2-admin required auto" id="precioM" value="<?=$d['precioM']?>" onblur="calculateDolar(precioM.value, 2);" /></td>
        </tr>
        <tr>
          <td align="right">Precio al Detal: </td>
          <td><input name="precioD" type="text" class="txt-fields2-admin auto" id="precioD" value="<?=$d['precioD']?>" /></td>
        </tr>
        <tr>
          <td align="right">Precio en D&oacute;lares ($): </td>
          <td><input name="precioDol" type="text" class="txt-fields2-admin auto" id="precioDol" value="<?=$d['precioDol']?>" /></td>
        </tr>
        <tr>
          <td align="right">Cant. M&iacute;n. de Compra: </td>
          <td class="txt-error-msg"><input name="cant" type="text" class="txt-fields2-admin required digits" id="cant" maxlength="4" value="<?=$d['cant']?>" /></td>
        </tr>
        <tr>
          <td align="right">Foto mini: </td>
          <td><input name="pic1" type="file" class="txt-fields-admin" id="pic1" /></td>
        </tr>
        <tr>
          <td align="right">Foto grande: </td>
          <td><input name="pic2" type="file" class="txt-fields-admin" id="pic2" /></td>
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
		  <input type="button" name="Submit3" value="Cancelar" class="but-admin" onClick="window.location='productos.php'" /></td>
        </tr>
        </table>
	  </form>
		<table width="540" border="0" align="center" cellpadding="3" cellspacing="0" style="margin-top:50px;">
        <tr>
          <td colspan="2" align="center" class="txt-white-bold-2" style="text-transform:uppercase;border-bottom:solid 1px #4E4011;border-top:solid 1px #4E4011"><a name="lista" id="lista"></a> Listado de Productos</td>
        </tr>
        <tr>
          <td width="200" height="50" align="center" class="links-catalogo">&#8212;- <span style="color:#DDDDDD">N° de Productos:</span> <strong><? echo cuantos_items('productos'); ?></strong> -&#8212;</td>
          <td width="328" height="50" align="center" class="links-catalogo">Ordenar por: &nbsp; <a href="?ord=nombre#lista" class="txt-white">Nombre</a> &nbsp;|&nbsp; <a href="?ord=categoria#lista" class="txt-white">Categor&iacute;a</a> &nbsp;|&nbsp; <a href="?ord=ref#lista" class="txt-white">Ref.</a> &nbsp;|&nbsp; <a href="?ord=status#lista" class="txt-white">Status</a></td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM productos ORDER BY $ordenar ASC, ref ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
        <tr>
          <td colspan="2" style="padding-left:10px;border-bottom:solid 1px #2B2309; <? if ($datos['status']==D) { echo 'filter:Alpha(Opacity=45);-moz-opacity:.45;opacity:.45;'; } ?>"><a href="?act=3&id=<?=$datos['idProd']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idProd']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="links-catalogo"><span style="color:#FFF"><?=$datos['status']?></span> - <span style="color:#ffeaa2">[<?=$datos['categoria']?>]</span> - </span><span class="txt-yellow-bold"><?=$datos['nombre']?></span> <span class="links-catalogo">- (<?=$datos['ref']?>) &nbsp;<span style="color:#ffeaa2">&#8211; &nbsp;<?=$datos['precioM']?></span></span></td>
          </tr>
		<? } ?>
      </table>
    </td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
