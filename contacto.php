<? 
include("conexion.php");
session_start();
$blockOff = 1;

if($_GET['act']==1) { 

if (($_POST['Nombre']==NULL) or ($_POST['Email']==NULL) or ($_POST['Comentarios']==NULL)) { $aviso=1; $mensaje=1; }

else {

$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "articulos.cristianos@yahoo.com";
$asunto = "Consulta ".$_POST['Nombre']." desde ArticulosCristianos.com";
						
$msg.= "- NOMBRE:  ".$_POST['Nombre']."\n";
$msg.= "- E-MAIL:  ".$_POST['Email']."\n";
$msg.= "- TELEFONO:  ".$_POST['Telefono']."\n";
$msg.= "- PAIS:  ".$_POST['Pais']."\n";
$msg.= "- COMENTARIOS:  ".$_POST['Comentarios']."\n";

$encabezado = "From: ".$_POST['Email']."\r\n";
$encabezado.= "Bcc: articuloscristianos@gmail.com\r\n";

mail($to, $asunto, $msg, $encabezado);			
										
$aviso=1; $mensaje=2;

  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contacto - Articulos Cristianos</title>
<meta name="Keywords" content="contacto articulos cristianos, informacion articulos cristianos, compra venta articulos y productos cristianos, comentarios preguntas articulos cristianos" />
<meta name="Description" content="Información de contacto para compra y venta de productos y Articulos Cristianos" />
<? include ('includes/head-code.php') ?>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#contactForm").validate();
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
	'href'				: 'gracias-msjs.php?msj=contacto'+<? echo $mensaje ?>
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
	<h1>Contacto  &raquo;</h1>
	
	<div style="display:table; width:385px; float:right; text-align:right; border-left:dotted 1px #020200">
	<form action="?act=1" method="post" name="contactForm" id="contactForm">
    
<table width="350" border="0" align="right" cellpadding="2" cellspacing="0">
  <tr>
    <td height="30" colspan="2" align="center" valign="top" class="txt-white-bold-2">ENVIENOS SUS COMENTARIOS Y/O PREGUNTAS</td>
    </tr>
  <tr>
    <td width="110" align="right" valign="top"><span class="txt-white-bold-2">*</span> Nombre:</td>
    <td width="232" align="left" valign="top" class="txt-error-msg"><input name="Nombre" type="text" class="fields-txt required" id="Nombre" value="<? if($_SESSION['emp']==1) { echo $_SESSION['nom']; } else { echo $_SESSION['nom'].' '; echo $_SESSION['ape']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txt-white-bold-2">*</span> Email:</td>
    <td align="left" valign="top" class="txt-error-msg"><input name="Email" type="text" class="fields-txt required email" id="Email" value="<? if($_SESSION['shalom']!="") { echo $_SESSION['email']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">Tel&eacute;fono:</td>
    <td align="left" valign="top" class="txt-error-msg"><input name="Telefono" type="text" class="fields-txt digits" id="Telefono" value="<? if($_SESSION['shalom']!="") { echo $_SESSION['telf']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">Pa&iacute;s/Ciudad:</td>
    <td align="left" valign="top" class="txt-error-msg"><input name="Pais" type="text" class="fields-txt" id="Pais" value="<? if($_SESSION['shalom']!="") { echo $_SESSION['pais'].' / '; echo $_SESSION['ciud']; } ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txt-white-bold-2">*</span> Comentarios:</td>
    <td align="left" valign="top" class="txt-error-msg"><textarea name="Comentarios" rows="7" wrap="virtual" class="fields-txt required" id="Comentarios"></textarea></td>
  </tr>
  <tr>
    <td align="right"></td>
    <td align="right" valign="bottom"><input name="Submit" type="submit" class="but-form" value="Enviar" /></td>
  </tr>
  <tr>
    <td height="85" colspan="2" align="right" valign="bottom"><a href="oracion.php"class="txt-yellow-bold">Solicitud de Oraci&oacute;n</a> <span class="txt-white-bold-2">+</span><br /><a href="recomiendanos.php" title="" class="txt-yellow-bold fancyframe">Enviar este sitio a un herman@</a> <span class="txt-white-bold-2">+</span>
    </td>
    </tr>
  <tr>
    <td height="105" colspan="2" align="right" valign="bottom"><a href="http://twitter.com/#!/@artcristianos" target="_blank" class="txt-white" style="font-size:9px;color:#84e6e6">@artcristianos <img src="images/tw-icon.gif" alt="ArticulosCristianos.com - Twitter" vspace="5" border="0" align="absmiddle" title="ArticulosCristianos.com - Twitter" /></a><br />
<a href="http://www.facebook.com/productoscristianos" target="_blank" class="txt-white" style="font-size:9px;color: #336699">facebook.com/productoscristianos/ <img src="images/fb-icon.gif" alt="ArticulosCristianos.com - Facebook" title="ArticulosCristianos.com - Facebook" border="0" align="absmiddle" /></a></td>
  </tr>
</table>
	</form>
	</div>
	
	<p><span class="txt-white-bold-2">&middot; ESCRIBANOS</span><br />
    Si desea m&aacute;s  informaci&oacute;n comun&iacute;quese con nosotros.
	  <br />
	  <strong>Informaci&oacute;n General:</strong> <a href="mailto:articulos.cristianos@yahoo.com" class="txt-white">articulos.cristianos@yahoo.com</a><br />
      <strong>Compras y Pedidos:</strong> <a href="mailto:articuloscristianos@gmail.com" class="txt-white">articuloscristianos@gmail.com</a><br />
      <strong>Ventas y Publicaci&oacute;n:</strong> <a href="mailto:articuloscristianos@hotmail.com" class="txt-white">articuloscristianos@hotmail.com</a></p>
      
      <p><span class="txt-white-bold-2">&middot; COMPRAS AL DETAL</span><br />
    <b>Si desea comprar al detal</b>, escr&iacute;banos &oacute; env&iacute;enos su lista 
    de <br />
    productos al email: <a href="mailto:articuloscristianos@gmail.com" class="txt-white">articuloscristianos@gmail.com</a>. 
A la brevedad<br />
le enviaremos el costo por unidad y el total de su pedido.<br />
Tambi&eacute;n puede ponerse en contacto con alguno de nuestros<br />
Representantes de Ventas.</p>
	  
	 <p style="margin-top:22px;"><span class="txt-white-bold-2">&middot; REPRESENTANTES DE VENTAS</span><br />
	   <strong>&iquest;Desea ser atendido personalmente para realizar su compra?</strong><br />
	   Comun&iacute;quese con nuestros representantes de ventas 
	   por el <br />
	   tel&eacute;fono: 04129966033 <!-- &nbsp;/&nbsp; 04127369008 --></p>
	  
	<p style="margin-top:22px;"><span class="txt-white-bold-2">&middot; VENTAS Y PUBLICACION DE PRODUCTOS</span><br />
        <strong>&iquest;Desea vender sus productos con   nosotros?</strong><br />
	    Comun&iacute;quese por el 04129966033.  <!-- los tel&eacute;fonos: <br />
	  04129966033 &nbsp;/&nbsp;04127369008. --><br />
	  Caracas - Venezuela.<br />
	  Email: <a href="mailto:articuloscristianos@hotmail.com" class="txt-white">articuloscristianos@hotmail.com</a></p>
	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>
