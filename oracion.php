<? 
include("conexion.php"); 
session_start(); 
$blockOff = 1;

if($_GET['act']==1) { 

if (($_POST['quien']==NULL) or ($_POST['email']==NULL) or ($_POST['peticion']==NULL)) { $aviso=1; $mensaje=1; }

else {

$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "info@articuloscristianos.com";
$asunto = "Petición de Oración por ".$_POST['quien']." desde ArticulosCristianos.com";
						
$msg.= "- QUIEN ENVIA:  ".$_POST['quien']."\n";
$msg.= "- E-MAIL:  ".$_POST['email']."\n";
$msg.= "- LUGAR:  ".$_POST['lugar']."\n";
$msg.= "- PETICION:  ".$_POST['peticion']."\n";

$encabezado = "From: ".$_POST['email']."\r\n";
$encabezado.= "Bcc: articuloscristianos@gmail.com,\r\n"; //mayeladecastillo@gmail.com

mail($to, $asunto, $msg, $encabezado);			
										
$aviso=1; $mensaje=2;

  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Oraci&oacute;n - Articulos Cristianos</title>
<meta name="Keywords" content="orar, oracion, oración, solicitar orar, solicitar oración, pedir unos por los otros" />
<meta name="Description" content="Solicitud de oración y peticiones por sanidad, economía y finanzas, protección y cualquier área que desee que Dios intervenga para buenas obras" />
<? include ('includes/head-code.php') ?>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#oracionForm").validate();
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
	'href'				: 'gracias-msjs.php?msj=oracion'+<? echo $mensaje ?>
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
    <td valign="top" class="contentPages">
	<h1>Solicitud <span style="text-transform:lowercase">de</span> Oraci&oacute;n</h1>
    <div style="float:right; width:350px;text-align:right; line-height:16px; font-size:11px;" class="txt-white">
    <em>&quot;...y oren unos por otros, para que sean sanados.<br />
      La oraci&oacute;n del justo es poderosa y eficaz.&quot;</em><br />
      <strong>Santiago 5:16</strong>
    </div>
	<p>En esta secci&oacute;n podr&aacute; enviarnos  las peticiones de oraci&oacute;n que ud. desee.  
	  <br />
	  No importa el &aacute;rea de su vida que necesite oraci&oacute;n ni tampoco el tipo de petici&oacute;n que este solicitando.  
	  Para nosotros siempre es un gusto poder <br />
	  orar por todos nuestros hermanos.</p><br />
      
      <div style="float:right; width:250px;text-align:right;">
<a href="recomiendanos.php" title="" class="txt-yellow-bold fancyframe">Enviar este sitio a un herman@</a> <span class="txt-white-bold-2">+</span><br />
    <a href="contacto.php"class="txt-yellow-bold">Cont&aacute;ctenos</a> <span class="txt-white-bold-2">+</span></div>
    <form action="?act=1" method="post" name="oracionForm" id="oracionForm">    
<table width="550" border="0" align="left" cellpadding="2" cellspacing="0">
  <tr>
    <td width="180" align="right" valign="top"><span class="txt-white-bold-2">*</span> Quien env&iacute;a:</td>
    <td width="362" align="left" valign="top" class="txt-error-msg"><input name="quien" type="text" class="fields-txt2 required" id="quien" value="<? if($_SESSION['emp']==1) { echo $_SESSION['nom']; } else { echo $_SESSION['nom'].' '; echo $_SESSION['ape']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txt-white-bold-2">*</span> Su Email:</td>
    <td align="left" valign="top" class="txt-error-msg"><input name="email" type="text" class="fields-txt2 required email" id="email" value="<? if($_SESSION['shalom']!="") { echo $_SESSION['email']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">Desde donde nos escribe:</td>
    <td align="left" valign="top" class="txt-error-msg"><input name="lugar" type="text" class="fields-txt2" id="lugar" value="<? if($_SESSION['shalom']!="") { echo $_SESSION['pais'].' / '; echo $_SESSION['ciud']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txt-white-bold-2">*</span> Orar por:</td>
    <td align="left" valign="top" class="txt-error-msg"><textarea name="peticion" rows="10" wrap="virtual" class="fields-txt2 required" id="peticion"></textarea></td>
  </tr>
  <tr>
    <td align="right"></td>
    <td align="left" valign="bottom"><input name="Submit" type="submit" class="but-form" value="Enviar" /></td>
  </tr>
</table>
	</form>
	</td>
  </tr>
  <tr>
	<td align="left" style="padding-left:35px;"><? include ('includes/social-add.php') ?></td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
