<? include("../conexion.php");
   include("../includes/funciones.php");

$folder="images/eventos";

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO eventos (fecha,titulo,sumario,contenido) VALUES ('$_POST[fecha]','$_POST[titulo]','$_POST[sumario]','$_POST[descripcion]')");
  $idn=mysql_insert_id();
  if($_FILES['pic1']['tmp_name']!="") $foto=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"img_".$idn);
   $imagenes=mysql_query("UPDATE eventos SET foto='$foto' WHERE idEvent='$idn'");
  }


if($_GET['act']==2){
if($_FILES['pic1']['tmp_name']!=""){
     @borrar_imagen($_POST['fot1'],$folder);
	 $foto=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"img_".$_GET['id']);}
  else $foto=$_POST['fot1'];
  $edit = mysql_query("UPDATE eventos SET fecha='$_POST[fecha]',titulo='$_POST[titulo]',sumario='$_POST[sumario]',contenido='$_POST[descripcion]',foto='$foto' WHERE idEvent='$_GET[id]'");
  }

if($_GET['act']==3){
  $result = mysql_query("SELECT * FROM eventos WHERE idEvent='$_GET[id]'");
  $d=mysql_fetch_array($result); 
  @borrar_imagen($d['foto'],$folder);
  if($result=mysql_query("DELETE FROM eventos WHERE idEvent='$_GET[id]'")){
    $mensaje='<center><b style="font-size:11px;color:#665416;">Evento Eliminada</b></center><br />';
    echo "<script language=\"javascript\">setTimeout(\"window.location='eventos.php'\",10)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM eventos WHERE idEvent='$_GET[id]'");
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
<link type="text/css" rel="stylesheet" href="../css/dhtmlgoodies_calendar.css?random=20051112" media="screen" />
<script type="text/javascript" src="../scripts/dhtmlgoodies_calendar.js?random=20060118"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#formEvents").validate();
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
	<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="formEvents" id="formEvents">
	<input type="hidden" name="fot1" value="<?=$d['foto']?>">
	  <table width="540" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span class="titles-admin">Eventos</span><?=$mensaje?></td>
          </tr>
        <tr>
          <td align="right">Fecha:</td>
          <td class="txt-error-msg"><input readonly name="fecha" type="text" class="txt-fields2-admin required dateISO" id="fecha" value="<?=$d['fecha']?>" />
           <a href="javascript:;" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)"><img src="../images/calendar-images/calendar-icon.gif" alt="Calendario" border="0" align="absbottom" /></a></td>
        </tr>
        <tr>
          <td width="120" align="right">T&iacute;tulo:</td>
          <td width="408" class="txt-error-msg"><input name="titulo" type="text" class="txt-fields-admin required" id="titulo" style="width:300px;" value="<?=$d['titulo']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Sumario:</td>
          <td class="txt-error-msg"><textarea name="sumario" rows="4" wrap="virtual" class="txt-fields-admin required" id="sumario" style="width:300px;" onkeypress="return ismaxlength(this)"><?=$d['sumario']?></textarea></td>
        </tr>
        <tr>
          <td align="right" valign="top">Contenido:</td>
          <td class="txt-error-msg"><textarea name="descripcion" rows="10" wrap="virtual" class="txt-fields-admin" id="descripcion" style="width:400px;"><? if ($d['contenido']) { echo $d['contenido']; } else {echo '<strong>Fecha</strong>: <br><strong>Lugar</strong>: <br>'; } ?></textarea>
<script type="text/javascript">
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
</script>
		  </td>
        </tr>
        <tr>
          <td align="right">Foto: </td>
          <td class="txt-error-msg"><input name="pic1" type="file" class="txt-fields-admin" id="pic1" /></td>
        </tr>
        <tr>
          <td height="30"></td>
          <td height="30" align="center" valign="bottom"><input name="Submit" type="submit" class="but-admin" value="Guardar" /> 
		  <input type="button" name="Submit3" value="Cancelar" class="but-admin" onClick="window.location='eventos.php'" />		  </td>
        </tr>
        </table>
	  </form>
		<table width="540" border="0" align="center" cellpadding="3" cellspacing="0" style="margin-top:50px;">
        <tr>
          <td align="center" class="txt-white-bold-2" style="text-transform:uppercase;border-bottom:solid 1px #4E4011;border-top:solid 1px #4E4011">Listado de Eventos</td>
        </tr>
        <tr>
          <td height="50" align="center" class="links-catalogo">&#8212;- <span style="color:#DDDDDD">N° de Eventos:</span> <strong><? echo cuantos_items('eventos'); ?></strong> -&#8212;</td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM eventos ORDER BY fecha DESC");
		   while($datos=mysql_fetch_array($buscar)){?>
        <tr>
          <td style="padding-left:10px;border-bottom:solid 1px #2B2309"><a href="?act=3&id=<?=$datos['idEvent']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idEvent']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="links-catalogo">(<?=$datos['fecha']?>) - </span><span class="txt-yellow-bold"><?=$datos['titulo']?></span></td>
          </tr>
		 <? } ?>
      </table>
    </td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
