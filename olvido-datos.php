<?php

include("conexion.php");
include ('includes/funciones.php'); 

if($_GET['act']==1){
$Email = mysql_real_escape_string($_POST['email']);

if($Email=='') { 
echo '<script type="text/javascript">window.location="gracias-msjs.php?msj=olvido1"</script>';
}
else {
if(existe_email($Email)==0) {
echo '<script type="text/javascript">window.location="gracias-msjs.php?msj=olvido2"</script>';
}
else {
$buscar=mysql_query("SELECT * FROM usuarios WHERE email='$Email'");
while($d = mysql_fetch_array($buscar)) {


// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $d['email'];
$asunto = "Recordatorio de Clave - ArticulosCristianos.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#fff7cc'><tr><td align='center'>";
$msg.= "<table width='700' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#f0e38d'><a href='http://www.articuloscristianos.com' target='_blank'>";
$msg.= "<img src='http://www.articuloscristianos.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#f0e38d' style='padding:0px 40px'><b>&iexcl;Hola ".$d['nombre']."!</b><br />";
$msg.= "Has solicitado recordar los datos de acceso a tu cuenta en <b>ArticulosCristianos.com</b>:<br /><br />";
$msg.= "<b>- EMAIL:</b>  ".$d['email']."<br />";
$msg.= "<b>- CLAVE:</b>  ".$d['clave']."<br /><br />";
$msg.= "Te recomendamos tenerlos a la mano para cuando nos visites.<br />Muchas Bendiciones.<br /><br />";
$msg.= "<a href='http://www.articuloscristianos.com' target='_blank' style='text-decoration:none;'><b>ArticulosCristianos.com</b></a></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.articuloscristianos.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: ArticulosCristianos.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO

echo '<script type="text/javascript">window.location="gracias-msjs.php?msj=olvido3"</script>';
	  }
	}
  }
}


if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM usuarios WHERE idUser='mysql_real_escape_string($_GET[id])'");
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&iquest;Olvido sus Datos? - Articulos Cristianos</title>
<link href="css/estilos-popup.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#olvidoForm").validate();
  });
</script>
</head>

<body>
<form action="?act=1" method="post" name="olvidoForm" id="olvidoForm">
  <table width="460" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td height="30" colspan="2" align="center" bgcolor="#c9a421"><strong class="txt-color" style="font-size:14px">:: Art&iacute;culos Cristianos :: </strong></td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="center"><strong>&#8212;- &iquest;Olvid&oacute; sus datos de Acceso? -&#8212;</strong></td>
    </tr>
    <tr>
      <td height="45" colspan="2" align="center" style="font-size:10px">Si olvido  los datos para ingresar a su cuenta, introduzca a continuaci&oacute;n<br />
      su email  y le haremos llegar  su información.</td>
    </tr>
    <tr>
      <td width="120" align="right">Email:</td>
      <td width="332" class="txt-error-msg"><input name="email" type="text" class="fields-txt required email" id="email" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="Submit" type="submit" class="but-form" value="  Enviar  " /></td>
    </tr>
  </table>
</form>
</body>
</html>
