<? include("../conexion.php");
   include("../includes/funciones.php");

$folder="images/lecturas";

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO lecturas (fecha,titulo,sumario,contenido,firma) VALUES ('$_POST[fecha]','$_POST[titulo]','$_POST[sumario]','$_POST[contenido]','$_POST[firma]')");
  $idn=mysql_insert_id();
  if($_FILES['pic1']['tmp_name']!="") $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"img1_".$idn);
  if($_FILES['pic2']['tmp_name']!="") $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"img2_".$idn);
   $imagenes=mysql_query("UPDATE lecturas SET foto1='$foto1',foto2='$foto2' WHERE idLec='$idn'");
   /*if($insertQuery){
   $mensaje='<center><b style="font-size:11px;color:#665416;">Lectura incluida</b></center><br>';
   echo "<script language=\"javascript\">setTimeout(\"window.location='lecturas.php'\",1000)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';*/
  }

if($_GET['act']==2){
if($_FILES['pic1']['tmp_name']!=""){
     @borrar_imagen($_POST['fot1'],$folder);
	 $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"img1_".$_GET['id']);}
  else $foto1=$_POST['fot1'];  
  if($_FILES['pic2']['tmp_name']!=""){
     @borrar_imagen($_POST['fot2'],$folder);
	 $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"img2_".$_GET['id']);}
  else $foto2=$_POST['fot2'];
  $edit = mysql_query("UPDATE lecturas SET fecha='$_POST[fecha]',titulo='$_POST[titulo]',sumario='$_POST[sumario]',contenido='$_POST[contenido]',foto1='$foto1',foto2='$foto2',firma='$_POST[firma]' WHERE idLec='$_GET[id]'");
  /*if($edit){
   $mensaje='<center><b style="font-size:11px;color:#665416;">Lectura modificada</b></center><br>';
   echo "<script language=\"javascript\">setTimeout(\"window.location='lecturas.php'\",1000)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';*/
  }

if($_GET['act']==3){
  $result = mysql_query("SELECT * FROM lecturas WHERE idLec='$_GET[id]'");
  $d=mysql_fetch_array($result); 
  @borrar_imagen($d['foto1'],$folder);
  @borrar_imagen($d['foto2'],$folder);
  if($result=mysql_query("DELETE FROM lecturas WHERE idLec='$_GET[id]'")){
    $mensaje='<center><b style="font-size:11px;color:#665416;">Lectura Eliminada</b></center><br />';
    echo "<script language=\"javascript\">setTimeout(\"window.location='lecturas.php'\",10)</script>";}
  else $mensaje='<center>Error, Intente de Nuevo</center>';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM lecturas WHERE idLec='$_GET[id]'");
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
    $("#formLec").validate();
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
	<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="formLec" id="formLec">
          <input type="hidden" name="fot1" value="<?=$d['foto1']?>">
          <input type="hidden" name="fot2" value="<?=$d['foto2']?>">
	  <table width="600" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span class="titles-admin">Lecturas</span><?=$mensaje?></td>
          </tr>
        <tr>
          <td align="right">Fecha:</td>
          <td class="txt-error-msg"><input readonly name="fecha" type="text" class="txt-fields2-admin required dateISO" id="fecha" value="<?=$d['fecha']?>" /> <a href="javascript:;" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)"><img src="../images/calendar-images/calendar-icon.gif" alt="Calendario" border="0" align="absbottom" /></a></td>
        </tr>
        <tr>
          <td width="100" align="right">T&iacute;tulo:</td>
          <td width="488" class="txt-error-msg"><input name="titulo" type="text" class="txt-fields-admin required" id="titulo" value="<?=$d['titulo']?>" style="text-transform:uppercase; width:320px;" /></td>
        </tr>
		<tr>
          <td align="right" valign="top">Sumario:</td>
          <td class="txt-error-msg"><textarea name="sumario" rows="4" wrap="virtual" class="txt-fields-admin required" id="sumario" onkeypress="return ismaxlength(this)" style=" width:320px;"><?=$d['sumario']?></textarea></td>
        </tr>
        <tr>
          <td align="right" valign="top">Contenido:</td>
          <td class="txt-error-msg"><textarea name="contenido" rows="20" wrap="virtual" class="txt-fields-admin required" id="contenido" style="width:480px;"><?=$d['contenido']?></textarea>
<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.

CKEDITOR.replace( 'contenido',
	{
		skin : 'v2'
	});
			//]]>
</script>
		</td>
        </tr>
        <tr>
          <td align="right">Foto 1: </td>
          <td><input name="pic1" type="file" class="txt-fields-admin" id="pic1" /></td>
        </tr>
        <tr>
          <td align="right">Foto 2: </td>
          <td><input name="pic2" type="file" class="txt-fields-admin" id="pic2" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Firma: </td>
          <td class="txt-error-msg"><textarea name="firma" rows="5" wrap="virtual" class="txt-fields-admin required" id="firma" onkeypress="return ismaxlength(this)" style="width:320px;"><?=$d['firma']?></textarea>
<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.

CKEDITOR.replace( 'firma',
	{
		skin : 'v2',
		toolbar : 'Basic',
	});
			//]]>
</script>
          </td>
        </tr>
        <tr>
          <td height="30"></td>
          <td height="30" align="center" valign="bottom"><input name="Submit" type="submit" class="but-admin" value="Guardar" /> 
            <input type="button" name="Submit3" value="Cancelar" class="but-admin" onClick="window.location='lecturas.php'" /></td>
        </tr>
        </table>
	  </form>
		<table width="600" border="0" align="center" cellpadding="3" cellspacing="0" style="margin-top:50px;">
        <tr>
          <td align="center" class="txt-white-bold-2" style="text-transform:uppercase;border-bottom:solid 1px #4E4011;border-top:solid 1px #4E4011">Listado de Lecturas</td>
        </tr>
        <tr>
          <td height="50" align="center" class="links-catalogo">&#8212;- <span style="color:#DDDDDD">N° de Lecturas:</span> <strong><? echo cuantos_items('lecturas'); ?></strong> -&#8212;</td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM lecturas ORDER BY fecha DESC");
		   while($datos=mysql_fetch_array($buscar)){?>
        <tr>
          <td valign="top" style="padding-left:10px;border-bottom:solid 1px #2B2309"><a href="?act=3&id=<?=$datos['idLec']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idLec']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="txt-yellow-bold"><?=$datos['titulo']?></span> <span class="links-catalogo">- (<?=$datos['fecha']?>)</span></td>
          </tr>
		  <? } ?>
      </table>
    </td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
