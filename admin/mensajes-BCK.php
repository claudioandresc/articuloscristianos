<? include("../conexion.php");
   include("../includes/funciones.php"); 

if($_GET['act']==1){
if(($_POST['fecha']==NULL) or ($_POST['asunto']==NULL) or ($_POST['destinatarios']==NULL) or ($_POST['mensaje']==NULL)) { $aviso=1; $mensaje=1; }
else {
  $insertQuery=mysql_query("INSERT INTO mensajes (fecha,asunto,mensaje) VALUES ('$_POST[fecha]','$_POST[asunto]','$_POST[mensaje]')");

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "info@articuloscristianos.com";
$asunto = $_POST['asunto'];

$msg.= "<html><head><title>ArticulosCristianos.com</title></head><body>";
$msg.= "<table width='700' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;color:#4d3f10;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#f0e38d'><a href='http://www.articuloscristianos.com' target='_blank'>";
$msg.= "<img src='http://www.articuloscristianos.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#f0e38d' style='padding:0px 40px;padding-bottom:30px;'>";
$msg.= "".$_POST['mensaje']."</td></tr>";
$msg.= "<tr><td align='center' bgcolor='#f0e38d' style='padding-bottom:12px;'><img src='http://www.articuloscristianos.com/images/emails/separator.jpg' />";
$msg.= "</td></tr><tr><td align='center' bgcolor='#f0e38d' style='font-size:10px;'>";
$msg.= "<a href='http://www.articuloscristianos.com' target='_blank' style='text-decoration:none,color:#342b0a;'>Inicio</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/catalogo.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Cat&aacute;logo</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/lecturas.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Lecturas</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/oracion.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Oraci&oacute;n</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/contacto.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Contacto</a>";
$msg.= "</td></tr><tr><td valign='top'><img src='http://www.articuloscristianos.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</body></html>";

$encabezado = "From: ArticulosCristianos.com <info@articuloscristianos.com> \r\n";
$encabezado.= "Bcc:".$_POST['destinatarios']."\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO
  
$aviso=1; $mensaje=2;

  }
}

/*
if($_GET['act']==2){
  $edit=mysql_query("UPDATE mensajes SET fecha='$_POST[fecha]',asunto='$_POST[asunto]',mensaje='$_POST[mensaje]' WHERE idMsj='$_GET[id]'");
}
*/

if($_GET['act']==3){
  if($result=mysql_query("DELETE FROM mensajes WHERE idMsj='$_GET[id]'")){ $aviso=1; $mensaje=3; }
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM mensajes WHERE idMsj='$_GET[id]'");
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
<link href="../css/fancybox.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../css/dhtmlgoodies_calendar.css?random=20051112" media="screen" />
<script type="text/javascript" src="../scripts/dhtmlgoodies_calendar.js?random=20060118"></script>
<script type="text/javascript" src="../scripts/fancybox.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#formMsj").validate();
  });
  
</script>

<? if ($aviso==1) { ?> 
<script type='text/javascript'>
$(document).ready(function() {
$.fancybox({
	'width'				: 460,
	'height'			: 200,
	'autoScale'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'type'				: 'iframe',
	'href'				: 'gracias-msjs.php?msj=emsj'+<? echo $mensaje ?>
	}).trigger('click');
});
</script>
<? } ?>

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
	<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="formMsj" id="formMsj">
	  <table width="650" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span class="titles-admin" style="width:650px">Enviar Mensajes</span></td>
          </tr>
        <tr>
          <td align="right">Fecha<span class="txt-white-bold" style="font-weight:normal"></span>:</td>
          <td class="txt-error-msg"><input readonly name="fecha" type="text" class="txt-fields2-admin required dateISO" id="fecha" value="<?=$d['fecha']?>" /> <a href="javascript:;" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)"><img src="../images/calendar-images/calendar-icon.gif" alt="Calendario" border="0" align="absbottom" /></a></td>
        </tr>
        <tr>
          <td width="120" align="right">Asunto:</td>
          <td width="528" class="txt-error-msg"><input name="asunto" type="text" class="txt-fields-admin required" id="asunto" value="<?=$d['asunto']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Destinatarios:</td>
          <td class="txt-error-msg">
          <textarea name="destinatarios" rows="5" wrap="virtual" class="txt-fields-admin required" id="destinatarios" style="width:450px;"><? $buscar=mysql_query("SELECT email FROM usuarios");
while($datos=mysql_fetch_array($buscar)){?><?=$datos['email']?>,<? } ?></textarea>
			</td>
        </tr>
        <tr>
          <td align="right" valign="top">Mensaje (HTML):</td>
          <td class="txt-error-msg"><textarea name="mensaje" rows="15" wrap="virtual" class="txt-fields-admin required" id="mensaje" style="width:450px;"><?=$d['mensaje']?></textarea></td>
        </tr>
        <tr>
          <td height="32" colspan="2" align="center"><input name="Submit" type="submit" class="but-admin" value="Enviar" <? if($_GET['e']==1){ echo 'disabled'; } ?> /> &nbsp;
		    <input type="button" name="Submit3" value="Cancelar" class="but-admin" onClick="window.location='mensajes.php'" /></td>
          </tr>
		</table>
	  </form>
        <table width="650" border="0" align="center" cellpadding="3" cellspacing="0" style="margin-top:70px;">
        <tr>
          <td align="center" class="txt-white-bold-2" style="text-transform:uppercase;border-bottom:solid 1px #4E4011;border-top:solid 1px #4E4011">Mensajes Enviados</td>
        </tr>
        <tr>
          <td height="50" align="center" class="links-catalogo">&#8212;- <span style="color:#DDDDDD">N° de Mensajes:</span> <strong><? echo cuantos_items('mensajes'); ?></strong> -&#8212;</td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM mensajes ORDER BY fecha ASC");
		   while($datos=mysql_fetch_array($buscar)){?>
        <tr>
          <td style="padding-left:10px;border-bottom:solid 1px #2B2309;"><a href="?act=3&id=<?=$datos['idMsj']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idMsj']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="links-catalogo"><span style="color:#FFF"><?=$datos['fecha']?></span> &nbsp;&#8211;&nbsp; </span><span class="txt-yellow-bold"><?=$datos['asunto']?></span></td><!-- border-bottom:solid 1px #2B2309 -->
          </tr>
		<? } ?>
      </table>
    </td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>