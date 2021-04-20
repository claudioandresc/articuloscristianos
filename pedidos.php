<? 
include("conexion.php");
session_start();
$blockOff = 1;

if($_GET['act']==1){

if(($_POST['nombre']==NULL) or ($_POST['cedula']==NULL) or ($_POST['telefono']==NULL) or ($_POST['email']==NULL) or ($_POST['pais']==NULL) or ($_POST['direccion']==NULL)) { $aviso=1; $mensaje=1; }  //  or ($_POST['granTotal']==NULL) or ($_POST['granTotal']==0.00)
else {

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $_POST['email'];
$asunto = "PEDIDO de ".$_POST['nombre']." - ArticulosCristianos.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#fff7cc'><tr><td align='center'>";
$msg.= "<table width='700' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:Verdana;font-size:11px;color:#4d3f10;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#f0e38d'><a href='http://www.articuloscristianos.com' target='_blank'>";
$msg.= "<img src='http://www.articuloscristianos.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#f0e38d' style='padding:0px 40px;padding-bottom:15px;line-height:18px;' align='left'>";
$msg.= "<p style='font-size:14px;margin-top:0px;'><b>Nota de Pedido / Solicitud de Cotizaci&oacute;n</b> - ";
$msg.= "<span style='font-size:10px;'>".date('Y-m-d')."</span></p>\n\n";

$msg.= "<b>Nombre: &nbsp;</b>".$_POST['nombre']."<br />\n";
$msg.= "<b>C&eacute;dula / RIF: &nbsp;</b>".$_POST['cedula']."<br />\n";
$msg.= "<b>Tel&eacute;fono: &nbsp;</b>".$_POST['telefono']."<br />\n";
$msg.= "<b>Email: &nbsp;</b>".$_POST['email']."<br />\n";
$msg.= "<b>Pa&iacute;s / Ciudad: &nbsp;</b>".$_POST['pais']."<br />\n";
$msg.= "<b>Direcci&oacute;n: &nbsp;</b>".$_POST['direccion']."<br /><br />\n\n";

$msg.= "<table width='620' border='0' cellpadding='3' cellspacing='0' align='center' style='font-family:Verdana;font-size:11px;color:#4d3f10;'>";
$msg.= "<tr bgcolor='#f0df71'><td align='left' height='20'><b> &nbsp; Productos</b></td><td align='center'><b>Cant.</b></td>";
$msg.= "<td align='right'><b>Precio (Bs.F)</b></td><td align='right'><b>Total (Bs.F)&nbsp;</b></td></tr>";

$buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY nombre ASC");
while($datos=mysql_fetch_array($buscar)){
if ($_POST[$datos['idProd']]==1){
$msg.= "<tr>";
$msg.= "<td align='left' width=''><span style='color:#8f7728;'>Ref. ".$datos['ref']."</span>&nbsp; - &nbsp;".$datos['nombre']."</td>";
$msg.= "<td align='center' width=''>".$_POST['cant'.$datos['idProd']]."</td>";
$msg.= "<td align='right' width=''>".$datos['precioM']."</td>";
$msg.= "<td align='right' width=''><b>".$_POST['ptotal'.$datos['idProd']]."</b></td>";
$msg.= "</tr>";
	}
}
$msg.= "<tr bgcolor='#f0df71'><td height='20'></td><td></td><td align='right' style='font-size:12px;'><b>TOTAL Bs.F</b></td>";
$msg.= "<td align='right' style='font-size:12px;color:#990000;'><b>".$_POST['granTotal']."</b></td></tr>";
$msg.= "</table>";

$msg.= "</td></tr><tr><td align='center' bgcolor='#f0e38d' style='padding-bottom:12px;'><img src='http://www.articuloscristianos.com/images/emails/separator.jpg' />";
$msg.= "</td></tr><tr><td align='center' bgcolor='#f0e38d' style='font-size:10px;'>";
$msg.= "<a href='http://www.articuloscristianos.com' target='_blank' style='text-decoration:none,color:#342b0a;'>Inicio</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/catalogo.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Cat&aacute;logo</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/lecturas.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Lecturas</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/oracion.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Oraci&oacute;n</a> &nbsp; | &nbsp; ";
$msg.= "<a href='http://www.articuloscristianos.com/contacto.php' target='_blank' style='text-decoration:none,color:#342b0a;'>Contacto</a>";
$msg.= "</td></tr><tr><td valign='top'><img src='http://www.articuloscristianos.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: ArticulosCristianos.com\r\n";
$encabezado.= "Bcc: articuloscristianos@gmail.com,info@articuloscristianos.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8';

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO
  
$aviso=1; $mensaje=2;

  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pedidos - Articulos Cristianos</title>
<meta name="keywords" content="pedidos de articulos cristianos, compra de articulos cristianos, cotizacion de articulos cristianos, lista de productos cristianos" />
<meta name="Description" content="Pedidos, Cotizacion y Compra de Articulos Cristianos" />
<? include ('includes/head-code.php') ?>
<script type="text/javascript" src="scripts/jquery.calculation.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript" src="scripts/pedido.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#pedidosForm").validate();
  });
</script>

<? if (($_SESSION['shalom']=="") or ($aviso==1)) { ?> 
<script type='text/javascript'>
$(document).ready(function() {
$.fancybox({
	'width'				: 460,
	'height'			: 200,
	'autoScale'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'type'				: 'iframe',
	'href'				: 'gracias-msjs.php?msj=pedido'<? if ($aviso==1) { echo '+'.$mensaje; } ?>
	}).trigger('click');
});
</script>
<? } ?>

<style type="text/css">
body{
	-moz-user-select: none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	user-select: none;
}
</style>

</head>

<body>
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" class="contentPages" style="padding-right:0px;">
	<h1>Pedidos &raquo; </h1>
    <? if ($_SESSION['shalom']!="") { ?>
	<form id="pedidosForm" name="pedidosForm" method="post" action="?act=1">
    <table width="845" border="0" cellspacing="0" cellpadding="2" style="margin-bottom:25px;">
  <tr>
    <td width="140" align="right" valign="top"><strong>Nombre:</strong></td>
    <td width="383" align="left" class="txt-error-msg"><input name="nombre" type="text" class="fields-txt2 required" id="nombre" value="<? if($_SESSION['emp']==1) { echo $_SESSION['nom']; } else { echo $_SESSION['nom'].' '; echo $_SESSION['ape']; } ?>" /></td>
    <td width="310" align="center" bgcolor="#A48721" style="border:dashed 1px #fae679; filter:DropShadow(Color=#746019,OffX=2,OffY=2,Positive=2); text-shadow: #746019 2px 2px 2px;"><strong style="color:#FFFF00;font-size:14px;">&#8212; TIPS &#8212;</strong></td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>C&eacute;dula o RIF:</strong></td>
    <td align="left" class="txt-error-msg"><input name="cedula" type="text" class="fields-txt2 required" id="cedula" value="<? echo $_SESSION['ced']; ?>" /></td>
    <td align="left" valign="top" class="txt-white-bold-2" style="font-size:11px"><img src="images/icon-check.png" hspace="2" />Espere nuestra confirmaci&oacute;n antes de pagar</td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>Tel&eacute;fono:</strong></td>
    <td align="left" class="txt-error-msg"><input name="telefono" type="text" class="fields-txt2 required digits" id="telefono" value="<? echo $_SESSION['telf']; ?>" /></td>
    <td align="left" valign="top" class="txt-white-bold-2"><img src="images/icon-check.png" hspace="2" /><a href="<? if($_SESSION['emp']==1) { echo 'registro-empresa.php?e=1&id='.$_SESSION['idU']; } else { echo 'registro.php?e=1&id='.$_SESSION['idU']; } ?>" class="txt-white-bold-2" style="font-size:11px">Puede actualizar sus datos de registro <span style="color:#FFFF66">aquí</span> </a></td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>Email:</strong></td>
    <td align="left" class="txt-error-msg"><input name="email" type="text" class="fields-txt2 required email" id="email" value="<? echo $_SESSION['email']; ?>" /></td>
    <td align="left" valign="top" class="txt-white-bold-2" style="font-size:11px"><img src="images/icon-check.png" hspace="2" />Recuerde seleccionar la casilla &quot;Comprar&quot;</td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>Pa&iacute;s/Ciudad:</strong></td>
    <td align="left" class="txt-error-msg"><input name="pais" type="text" class="fields-txt2 required" id="pais" value="<? echo $_SESSION['pais'].' / '; echo $_SESSION['ciud']; ?>" /></td>
    <td align="left" valign="top" class="txt-white-bold-2" style="font-size:11px"><img src="images/icon-check.png" hspace="2" />El campo &quot;Cantidad&quot; muestra la cant. m&iacute;n.</td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>Direcci&oacute;n de Env&iacute;o:</strong><br />
    <span class="txt-mini" style="line-height:14px">(Incluya punto de referencia)</span></td>
    <td align="left" class="txt-error-msg"><textarea name="direccion" rows="7" class="fields-txt2 required" id="direccion"><? echo $_SESSION['dir']; ?></textarea></td>
    <td align="left" valign="top" class="txt-white-bold-2" style="font-size:11px;padding-left:20px;">de compra. <em style="font-weight:normal">(Ingrese la deseada por ud.)</em></td>
  </tr>
  <tr>
    <td colspan="3" height="10"></td>
  </tr>
  <tr>
    <td height="50" colspan="3" align="center" bgcolor="#fbe389" style="font-size:11px;color:#000000; line-height:16px; border:dashed 2px #CC6600">A continuaci&oacute;n, seleccione los art&iacute;culos que desea <strong style="color:#CC0000;">comprar</strong> e indique la <strong style="color:#CC0000;">cantidad</strong> o unidades por cada producto.<br />
      Luego haga click en &quot;<strong style="color:#CC0000;">Enviar Pedido</strong>&quot; al final de esta p&aacute;gina y espere nuestra confirmaci&oacute;n.</td>
    </tr>
</table>
    
	  <table width="845" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td width="450" align="center" bgcolor="#997F20" class="txt-white-bold-2">Productos</td>
          <td width="79" align="center" bgcolor="#997F20" class="txt-white-bold-2">Comprar</td>
          <td width="80" align="center" bgcolor="#997F20" class="txt-white-bold-2">Cantidad</td>
          <td width="100" align="center" bgcolor="#997F20" class="txt-white-bold-2">Precio (Bs.F)</td>
          <td width="100" align="center" bgcolor="#997F20" class="txt-white-bold-2">Total (Bs.F)</td>
        </tr>
		<? $buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY nombre ASC");
		   while($datos=mysql_fetch_array($buscar)){ ?>
        <tr>
          <td bgcolor="#50430F" style="padding:6px;">
	  &nbsp; <a href="images/productos/<?=$datos['fotoG']?>" class="links-catalogo fancy" title="<b><?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)</b><br /><?=$datos['descripcion']?>"><img src="images/zoom_icon.png" border="0" alt="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" title="<?=$datos['nombre']?> - (Ref. <?=$datos['ref']?>)" /></a>&nbsp;<span class="txt-white-bold" style="text-transform:uppercase">&nbsp; <?=$datos['nombre']?></span><span class="txt-white-bold" style="font-weight:normal"> <span style="color:#fbe389">- (Ref. <?=$datos['ref']?>)</span></span></td>
          <td align="center" bgcolor="#3F330D"><input type="checkbox" name="<?=$datos['idProd']?>" id="<?=$datos['idProd']?>" value="1" class="comprarChk" onclick="recalc(id);" /></td>
          <td align="center" bgcolor="#3F330D"><input id="cant<?=$datos['idProd']?>" name="cant<?=$datos['idProd']?>" type="text" class="field-cant" value="<?=$datos['cant']?>" maxlength="4" onblur="if(this.value < <?=$datos['cant']?>) {this.value = <?=$datos['cant']?>}; recalc(<?=$datos['idProd']?>)" /></td>
          <td align="center" bgcolor="#3F330D"><input id="precio<?=$datos['idProd']?>" name="precio<?=$datos['idProd']?>" type="text" class="field-pedidos" readonly="readonly" value="<?=$datos['precioM']?>" style="width:85px;" /></td>
          <td align="right" bgcolor="#3F330D" class="txt-yellow-bold" style="padding-right:10px;"><input id="ptotal<?=$datos['idProd']?>" name="ptotal<?=$datos['idProd']?>" type="text" class="field-pedidos-total" readonly="readonly" style="width:85px;" /></td>
        </tr>
		<? } ?>
        <tr>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td align="center" bgcolor="#f1c83a" style="font-size:12px; color:#000; font-weight:bold">TOTAL:</td>
          <td align="right" bgcolor="#f1c83a" style="padding-right:10px;"><input id="granTotal" name="granTotal" type="text" class="field-monto-total" readonly="readonly" style="width:85px;" /></td>
        </tr>
      </table>
      <p align="center">
        <input name="button" type="submit" class="but-form3" id="button" value=" Enviar Pedido " /><!-- br /><br />
		<span style="font-size:10px;color:#f1c83a">(Espere nuestra confirmación antes de realizar su pago).</span -->
      </p><br />
      <p align="center" style="font-size:14px;color:#fff"><strong><span style="color:#FFCC00">&raquo;</span>&nbsp; El flete o costo por env&iacute;o de la mercanc&iacute;a esta a cargo del comprador &nbsp;<span style="color:#FFCC00">&laquo;</span></strong></p>
	  </form>
<? } ?>
	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
</body>
</html>