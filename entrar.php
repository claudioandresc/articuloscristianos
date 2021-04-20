<?php 
include("conexion.php");
session_start();

if($_GET['act']==1){

$emailin = mysql_real_escape_string($_POST["email"]);
$clavein = mysql_real_escape_string($_POST["pass"]);

if (($emailin==NULL) or ($clavein==NULL)) {
echo '<script type="text/javascript">window.location="gracias-msjs.php?msj=entrar1"</script>';
}
else {
$buscar = mysql_query("SELECT * FROM usuarios WHERE email='$emailin' AND clave='$clavein'");
$datos = mysql_fetch_array($buscar);
if(($datos['clave']) != $clavein) {
mysql_free_result($buscar);
echo '<script type="text/javascript">window.location="gracias-msjs.php?msj=entrar2"</script>';
} 
else {
$buscar = mysql_query("SELECT * FROM usuarios WHERE email='$emailin' AND clave='$clavein'");
$datos = mysql_fetch_array($buscar);
$_SESSION['shalom'] = $datos['nombre'];
$_SESSION['idU'] = $datos['idUser'];
$_SESSION['emp'] = $datos['empresa'];
$_SESSION['nom'] = $datos['nombre'];
$_SESSION['ape'] = $datos['apellidos'];
$_SESSION['email'] = $datos['email'];
$_SESSION['pais'] = $datos['pais'];
$_SESSION['ciud'] = $datos['ciudad'];
$_SESSION['telf'] = $datos['telefono'];
$_SESSION['ced'] = $datos['cedula'];
$_SESSION['dir'] = $datos['direccion'];
echo '<script type="text/javascript">window.parent.location="index.php"</script>';
	}
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingresar a su Cuenta - Articulos Cristianos</title>
<link href="css/estilos-popup.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ingresarForm").validate();
  });
</script>
</head>

<body>
<form action="?act=1" method="post" name="ingresarForm" id="ingresarForm">
  <table width="460" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td height="30" colspan="2" align="center" bgcolor="#c9a421"><strong class="txt-color" style="font-size:14px">:: Art&iacute;culos Cristianos :: </strong></td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="center"><strong>&#8212;- Ingresar a su Cuenta de Usuario -&#8212;</strong></td>
    </tr>
    <tr>
      <td height="5" colspan="2"></td>
    </tr>
    <tr>
      <td width="120" align="right">Email:</td>
      <td width="332" class="txt-error-msg"><input name="email" type="text" class="fields-txt required email" id="email" /></td>
    </tr>
    <tr>
      <td width="120" align="right">Clave:</td>
      <td class="txt-error-msg"><input name="pass" type="password" class="fields-txt required" id="pass" maxlength="8" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="Submit" type="submit" class="but-form" value="  Entrar  " style="margin-left:" /></td>
    </tr>
    <tr>
      <td height="20" colspan="2" align="center" valign="bottom"><a href="olvido-datos.php" style="text-decoration:none; font-size:10px; color:#990000; font-weight:bold;">&iquest;Olvid&oacute; sus datos?</a></td>
    </tr>
  </table>
</form>
</body>
</html>
