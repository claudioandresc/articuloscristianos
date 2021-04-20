<?php 
include("conexion.php"); 
include("includes/funciones.php");
session_start();
$blockOff = 1;

//$aviso = $HTTP_GET_VARS['adv'];

// REGISTRO DE USUARIOS

if($_GET['act']==1){

$Nombre = mysql_real_escape_string($_POST['nombre']);
$Apellidos = mysql_real_escape_string($_POST['apellidos']);
$Cedula = mysql_real_escape_string($_POST['cedula']);
$FechaNac = mysql_real_escape_string($_POST['fechaNac']);
$Email = mysql_real_escape_string($_POST['email']);
$Telefono = mysql_real_escape_string($_POST['telefono']);
$Telefono2 = mysql_real_escape_string($_POST['telefono2']);
$Pais = mysql_real_escape_string($_POST['pais']);
$Ciudad = mysql_real_escape_string($_POST['ciudad']);
$Direccion = mysql_real_escape_string($_POST['direccion']);
$Clave = mysql_real_escape_string($_POST['clave']);

if(($Nombre==NULL) or ($Apellidos==NULL) or ($Cedula==NULL) or ($FechaNac==NULL) or ($Email==NULL) or ($Telefono==NULL) or ($Pais==NULL) or ($Ciudad==NULL) or ($Direccion==NULL) or ($Clave==NULL)) { $aviso=1; $mensaje=1; }
elseif (existe_email($Email)==1) { $aviso=1; $mensaje=2; }
else {
$insertQuery=mysql_query("INSERT INTO usuarios (nombre,apellidos,cedula,fechanac,email,telefono,telefono2,pais,ciudad,direccion,clave,empresa) VALUES ('$Nombre','$Apellidos','$Cedula','$FechaNac','$Email','$Telefono','$Telefono2','$Pais','$Ciudad','$Direccion','$Clave','$_POST[empresa]')");

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $Email;
$asunto = "Su REGISTRO en ArticulosCristianos.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#fff7cc'><tr><td align='center'>";
$msg.= "<table width='700' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#f0e38d'><a href='http://www.articuloscristianos.com' target='_blank'>";
$msg.= "<img src='http://www.articuloscristianos.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#f0e38d' style='padding:0px 40px'><b>&iexcl;Hola ".$Nombre."!</b><br />";
$msg.= "Bienvenid@ a <b>ArticulosCristianos.com</b><br /><br />";
$msg.= "Gracias por registrarte con nosotros.<br />";
$msg.= "Ahora podr&aacute;s disfrutar de todos nuestros beneficios y estar&aacute;s al tanto de todas nuestras ofertas y promociones.";
$msg.= "<p>Te recordamos tus datos de acceso:<br />";
$msg.= "<b>- EMAIL:</b>  ".$Email."<br />";
$msg.= "<b>- CLAVE:</b>  ".$Clave."</p>";
$msg.= "<p>Te recomendamos tenerlos a la mano para cuando nos visites.<br />Muchas Bendiciones.<br /><br />";
$msg.= "<a href='http://www.articuloscristianos.com' target='_blank' style='text-decoration:none;'><b>ArticulosCristianos.com</b></a></p></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.articuloscristianos.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: ArticulosCristianos.com\r\n";
// $encabezado.= "Bcc: info@articuloscristianos.com,articuloscristianos@gmail.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO
  
$aviso=1; $mensaje=3;

  }
}


// ACTUALIZACION DE DATOS DE USUARIO

if($_GET['act']==2){

$Nombre = mysql_real_escape_string($_POST['nombre']);
$Apellidos = mysql_real_escape_string($_POST['apellidos']);
$Cedula = mysql_real_escape_string($_POST['cedula']);
$FechaNac = mysql_real_escape_string($_POST['fechaNac']);
$Email = mysql_real_escape_string($_POST['email']);
$Telefono = mysql_real_escape_string($_POST['telefono']);
$Telefono2 = mysql_real_escape_string($_POST['telefono2']);
$Pais = mysql_real_escape_string($_POST['pais']);
$Ciudad = mysql_real_escape_string($_POST['ciudad']);
$Direccion = mysql_real_escape_string($_POST['direccion']);
$Clave = mysql_real_escape_string($_POST['clave']);

if(($Nombre==NULL) or ($Apellidos==NULL) or ($Cedula==NULL) or ($FechaNac==NULL) or ($Email==NULL) or ($Telefono==NULL) or ($Pais==NULL) or ($Ciudad==NULL) or ($Direccion==NULL) or ($Clave==NULL)) { $aviso=1; $mensaje=1; }
else {
$edit=mysql_query("UPDATE usuarios SET nombre='$Nombre',apellidos='$Apellidos',cedula='$Cedula',fechanac='$FechaNac',email='$Email',telefono='$Telefono',telefono2='$Telefono2',pais='$Pais',ciudad='$Ciudad',direccion='$Direccion',clave='$Clave',empresa='$_POST[empresa]' WHERE idUser='$_GET[id]'");

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $Email;
$asunto = "Datos actualizados en ArticulosCristianos.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#fff7cc'><tr><td align='center'>";
$msg.= "<table width='700' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#f0e38d'><a href='http://www.articuloscristianos.com' target='_blank'>";
$msg.= "<img src='http://www.articuloscristianos.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#f0e38d' style='padding:0px 40px'><b>&iexcl;Hola ".$Nombre."!</b><br /><br />";
$msg.= "Tu informaci&oacute;n de registro en <b>ArticulosCristianos.com</b> se actualiz&oacute; exitosamente.<br />";
$msg.= "Para acceder a tu cuenta, recuerda tus datos:<br /><br />";
$msg.= "<b>- EMAIL:</b>  ".$Email."<br />";
$msg.= "<b>- CLAVE:</b>  ".$Clave."<br /><br />";
$msg.= "Te recomendamos tenerlos a la mano para cuando nos visites.<br />Muchas Bendiciones.<br /><br />";
$msg.= "<a href='http://www.articuloscristianos.com' target='_blank' style='text-decoration:none;'><b>ArticulosCristianos.com</b></a></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.articuloscristianos.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: ArticulosCristianos.com\r\n";
//$encabezado.= "Bcc: info@articuloscristianos.com,articuloscristianos@gmail.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO

$aviso=1; $mensaje=4;

  }
}

    
if(($_GET['e']==1) and ($_SESSION['shalom']!="") and ($_SESSION['idU']==$_GET['id'])){
  $result = mysql_query("SELECT * FROM usuarios WHERE idUser='$_GET[id]'");
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
<title>Registro de Usuarios - Articulos Cristianos</title>
<meta name="Keywords" content="datos, registro, usuarios, login" />
<meta name="Description" content="solicitud de datos para registro en articuloscristianos.com" />
<link type="text/css" rel="stylesheet" href="css/dhtmlgoodies_calendar.css?random=20051112" media="screen" />
<? include ('includes/head-code.php') ?>
<script type="text/javascript" src="scripts/dhtmlgoodies_calendar.js?random=20060118"></script>
<script type="text/javascript" src="scripts/jquery.alphanumeric.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#registroForm").validate({
      rules: {
            clave1: 'required',
            clave: {
                  required: true,
                  equalTo: '#clave1'
            }
      }});
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
	'href'				: 'gracias-msjs.php?msj=reg'+<? echo $mensaje ?>
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
	<h1>Datos <span style="text-transform:lowercase">de</span> Registro &raquo;</h1>
	<form id="registroForm" name="registroForm" method="post" action="?<?=$action?>" enctype="multipart/form-data">
      <input name="empresa" type="hidden" id="empresa" value="0" />
	  <table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
	    <? if ($_SESSION['shalom']=="") { ?>
        <tr>
          <td colspan="2" align="center" valign="middle" class="txt-reg" style="padding-bottom:15px;"><div class="reg-box">Para registrar una <strong>Empresa</strong> &oacute; <strong>Persona Jur&iacute;dica</strong>, haga <a href="registro-empresa.php" style="font-weight:bold; color:#CC0000;">click aqu&iacute;</a></div></td>
	    </tr>
        <? } ?>
        <tr>
          <td width="255" align="right"><span class="txt-white-bold-2">*</span> Nombre:</td>
          <td width="429" valign="top" class="txt-error-msg"><input name="nombre" type="text" class="fields-txt2 required" id="nombre" value="<?=$d['nombre']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Apellidos:</td>
          <td valign="top" class="txt-error-msg"><input name="apellidos" type="text" class="fields-txt2 required" id="apellidos" value="<?=$d['apellidos']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> C&eacute;dula, ID o Pasaporte:</td>
          <td valign="top" class="txt-error-msg"><input name="cedula" type="text" class="fields-txt2 required" id="cedula" value="<?=$d['cedula']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Fecha de Nacimiento:</td>
          <td valign="middle" class="txt-error-msg">
          <input readonly name="fechaNac" type="text" class="fields-txt2 required dateISO" id="fechaNac" style="width:100px;" value="<?=$d['fechanac']?>" />
           <a href="javascript:;" onclick="displayCalendar(document.forms[0].fechaNac,'yyyy-mm-dd',this)"><img src="images/calendar-images/calendar-icon.gif" alt="Calendario" border="0" align="absbottom" /></a></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Email:</td>
          <td valign="top" class="txt-error-msg"><input name="email" type="text" class="fields-txt2 required email" id="email" value="<?=$d['email']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Tel&eacute;fono:</td>
          <td valign="top" class="txt-error-msg"><input name="telefono" type="text" class="fields-txt2 required digits" id="telefono" value="<?=$d['telefono']?>" /></td>
        </tr>
        <tr>
          <td align="right"> Otro Tel&eacute;fono:</td>
          <td valign="top" class="txt-error-msg"><input name="telefono2" type="text" class="fields-txt2 digits" id="telefono2" value="<?=$d['telefono2']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Pa&iacute;s de Residencia:</td>
          <td valign="top" class="txt-error-msg"><select name="pais" class="fields-txt2 required">
              <? if ($d['pais']=='') { ?>
              <option value="" selected="selected">--- Seleccione --&raquo;</option>
              <? } else { ?>
              <optgroup label="Su ubicaci&oacute;n actual es:">
              <option value="<?=$d['pais']?>" selected="selected"><?=$d['pais']?></option>
              </optgroup>
              <? } ?>
              <option value="Afganist&aacute;n">Afganist&aacute;n</option>
              <option value="Albania">Albania</option>
              <option value="Alemania">Alemania</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Anguilla">Anguilla</option>
              <option value="Ant&aacute;rtida">Ant&aacute;rtida</option>
              <option value="Antigua y Barbuda">Antigua y Barbuda</option>
              <option value="Antillas Holandesas">Antillas Holandesas</option>
              <option value="Arabia Saud&iacute;">Arabia Saud&iacute;</option>
              <option value="Argelia">Argelia</option>
              <option value="Argentina">Argentina</option>
              <option value="Armenia">Armenia</option>
              <option value="Aruba">Aruba</option>
              <option value="Australia">Australia</option>
              <option value="Austria">Austria</option>
              <option value="Azerbaiy&aacute;n">Azerbaiy&aacute;n</option>
              <option value="Bahamas">Bahamas</option>
              <option value="Bahrein">Bahrein</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Barbados">Barbados</option>
              <option value="B&eacute;lgica">B&eacute;lgica</option>
              <option value="Belice">Belice</option>
              <option value="Benin">Benin</option>
              <option value="Bermudas">Bermudas</option>
              <option value="Bielorrusia">Bielorrusia</option>
              <option value="Birmania">Birmania</option>
              <option value="Bolivia">Bolivia</option>
              <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
              <option value="Botswana">Botswana</option>
              <option value="Brasil">Brasil</option>
              <option value="Brunei">Brunei</option>
              <option value="Bulgaria">Bulgaria</option>
              <option value="Burkina Faso">Burkina Faso</option>
              <option value="Burundi">Burundi</option>
              <option value="But&aacute;n">But&aacute;n</option>
              <option value="Cabo Verde">Cabo Verde</option>
              <option value="Camboya">Camboya</option>
              <option value="Camer&uacute;n">Camer&uacute;n</option>
              <option value="Canad&aacute;">Canad&aacute;</option>
              <option value="Chad">Chad</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Chipre">Chipre</option>
              <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
              <option value="Colombia">Colombia</option>
              <option value="Comores">Comores</option>
              <option value="Congo">Congo</option>
              <option value="Congo, Rep&uacute;blica Democr&aacute;tica del">Congo, Rep&uacute;blica Democr&aacute;tica del</option>
              <option value="Corea">Corea</option>
              <option value="Corea del Norte">Corea del Norte</option>
              <option value="Costa de Marf&iacute;l">Costa de Marf&iacute;l</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Croacia (Hrvatska)">Croacia (Hrvatska)</option>
              <option value="Cuba">Cuba</option>
              <option value="Dinamarca">Dinamarca</option>
              <option value="Djibouti">Djibouti</option>
              <option value="Dominica">Dominica</option>
              <option value="Ecuador">Ecuador</option>
              <option value="Egipto">Egipto</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Emiratos &Aacute;rabes Unidos">Emiratos &Aacute;rabes Unidos</option>
              <option value="Eritrea">Eritrea</option>
              <option value="Eslovenia">Eslovenia</option>
              <option value="Espa&ntilde;a">Espa&ntilde;a</option>
              <option value="Estados Unidos">Estados Unidos</option>
              <option value="Estonia">Estonia</option>
              <option value="Etiop&iacute;a">Etiop&iacute;a</option>
              <option value="Fiji">Fiji</option>
              <option value="Filipinas">Filipinas</option>
              <option value="Finlandia">Finlandia</option>
              <option value="Francia">Francia</option>
              <option value="Gab&oacute;n">Gab&oacute;n</option>
              <option value="Gambia">Gambia</option>
              <option value="Georgia">Georgia</option>
              <option value="Ghana">Ghana</option>
              <option value="Gibraltar">Gibraltar</option>
              <option value="Granada">Granada</option>
              <option value="Grecia">Grecia</option>
              <option value="Groenlandia">Groenlandia</option>
              <option value="Guadalupe">Guadalupe</option>
              <option value="Guam">Guam</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Guayana">Guayana</option>
              <option value="Guayana Francesa">Guayana Francesa</option>
              <option value="Guinea">Guinea</option>
              <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
              <option value="Guinea-Bissau">Guinea-Bissau</option>
              <option value="Hait&iacute;">Hait&iacute;</option>
              <option value="Honduras">Honduras</option>
              <option value="Hungr&iacute;a">Hungr&iacute;a</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Irak">Irak</option>
              <option value="Ir&aacute;n">Ir&aacute;n</option>
              <option value="Irlanda">Irlanda</option>
              <option value="Isla Bouvet">Isla Bouvet</option>
              <option value="Isla de Christmas">Isla de Christmas</option>
              <option value="Islandia">Islandia</option>
              <option value="Islas Caim&aacute;n">Islas Caim&aacute;n</option>
              <option value="Islas Cook">Islas Cook</option>
              <option value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>
              <option value="Islas Faroe">Islas Faroe</option>
              <option value="Islas Heard y McDonald">Islas Heard y McDonald</option>
              <option value="Islas Malvinas">Islas Malvinas</option>
              <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
              <option value="Islas Marshall">Islas Marshall</option>
              <option value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>
              <option value="Islas Palau">Islas Palau</option>
              <option value="Islas Salom&oacute;n">Islas Salom&oacute;n</option>
              <option value="Islas Svalbard y Jan Mayen">Islas Svalbard y Jan Mayen</option>
              <option value="Islas Tokelau">Islas Tokelau</option>
              <option value="Islas Turks y Caicos">Islas Turks y Caicos</option>
              <option value="Islas V&iacute;rgenes (EE.UU.)">Islas V&iacute;rgenes (EE.UU.)</option>
              <option value="Islas V&iacute;rgenes (Reino Unido)">Islas V&iacute;rgenes (Reino Unido)</option>
              <option value="Islas Wallis y Futuna">Islas Wallis y Futuna</option>
              <option value="Israel">Israel</option>
              <option value="Italia">Italia</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Jap&oacute;n">Jap&oacute;n</option>
              <option value="Jordania">Jordania</option>
              <option value="Kazajist&aacute;n">Kazajist&aacute;n</option>
              <option value="Kenia">Kenia</option>
              <option value="Kirguizist&aacute;n">Kirguizist&aacute;n</option>
              <option value="Kiribati">Kiribati</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Kuwait">Laos</option>
              <option value="Lesotho">Lesotho</option>
              <option value="Letonia">Letonia</option>
              <option value="L&iacute;bano">L&iacute;bano</option>
              <option value="Liberia">Liberia</option>
              <option value="Libia">Libia</option>
              <option value="Liechtenstein">Liechtenstein</option>
              <option value="Lituania">Lituania</option>
              <option value="Luxemburgo">Luxemburgo</option>
              <option value="Macedonia, Ex-Rep&uacute;blica Yugoslava de">Macedonia, Ex-Rep&uacute;blica Yugoslava de</option>
              <option value="Madagascar">Madagascar</option>
              <option value="Malasia">Malasia</option>
              <option value="Malawi">Malawi</option>
              <option value="Maldivas">Maldivas</option>
              <option value="Mal&iacute;">Mal&iacute;</option>
              <option value="Malta">Malta</option>
              <option value="Marruecos">Marruecos</option>
              <option value="Martinica">Martinica</option>
              <option value="Mauricio">Mauricio</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mayotte">Mayotte</option>
              <option value="M&eacute;xico">M&eacute;xico</option>
              <option value="Micronesia">Micronesia</option>
              <option value="Moldavia">Moldavia</option>
              <option value="M&oacute;naco">M&oacute;naco</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Montserrat">Montserrat</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Namibia">Namibia</option>
              <option value="Nauru">Nauru</option>
              <option value="Nepal">Nepal</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="N&iacute;ger">N&iacute;ger</option>
              <option value="Nigeria">Nigeria</option>
              <option value="Niue">Niue</option>
              <option value="Norfolk">Norfolk</option>
              <option value="Noruega">Noruega</option>
              <option value="Nueva Caledonia">Nueva Caledonia</option>
              <option value="Nueva Zelanda">Nueva Zelanda</option>
              <option value="Om&aacute;n">Om&aacute;n</option>
              <option value="Pa&iacute;ses Bajos">Pa&iacute;ses Bajos</option>
              <option value="Panam&aacute;">Panam&aacute;</option>
              <option value="Pap&uacute;a Nueva Guinea">Pap&uacute;a Nueva Guinea</option>
              <option value="Paquist&aacute;n">Paquist&aacute;n</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Per&uacute;">Per&uacute;</option>
              <option value="Pitcairn">Pitcairn</option>
              <option value="Polinesia Francesa">Polinesia Francesa</option>
              <option value="Polonia">Polonia</option>
              <option value="Portugal">Portugal</option>
              <option value="Puerto Rico">Puerto Rico</option>
              <option value="Qatar">Qatar</option>
              <option value="Reino Unido">Reino Unido</option>
              <option value="Rep&uacute;blica Centroafricana">Rep&uacute;blica Centroafricana</option>
              <option value="Rep&uacute;blica Checa">Rep&uacute;blica Checa</option>
              <option value="Rep&uacute;blica de Sud&aacute;frica">Rep&uacute;blica de Sud&aacute;frica</option>
              <option value="Rep&uacute;blica Dominicana">Rep&uacute;blica Dominicana</option>
              <option value="Rep&uacute;blica Eslovaca">Rep&uacute;blica Eslovaca</option>
              <option value="Reuni&oacute;n">Reuni&oacute;n</option>
              <option value="Ruanda">Ruanda</option>
              <option value="Rumania">Rumania</option>
              <option value="Rusia">Rusia</option>
              <option value="Sahara Occidental">Sahara Occidental</option>
              <option value="Saint Kitts y Nevis">Saint Kitts y Nevis</option>
              <option value="Samoa">Samoa</option>
              <option value="Samoa Americana">Samoa Americana</option>
              <option value="San Marino">San Marino</option>
              <option value="San Vicente y Granadinas">San Vicente y Granadinas</option>
              <option value="Santa Helena">Santa Helena</option>
              <option value="Santa Luc&iacute;a">Santa Luc&iacute;a</option>
              <option value="Santo Tom&eacute; y Pr&iacute;ncipe">Santo Tom&eacute; y Pr&iacute;ncipe</option>
              <option value="Senegal">Senegal</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra Leona">Sierra Leona</option>
              <option value="Singapur">Singapur</option>
              <option value="Siria">Siria</option>
              <option value="Somalia">Somalia</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="St. Pierre y Miquelon">St. Pierre y Miquelon</option>
              <option value="Suazilandia">Suazilandia</option>
              <option value="Sud&aacute;n">Sud&aacute;n</option>
              <option value="Suecia">Suecia</option>
              <option value="Suiza">Suiza</option>
              <option value="Surinam">Surinam</option>
              <option value="Tailandia">Tailandia</option>
              <option value="Taiw&aacute;n">Taiw&aacute;n</option>
              <option value="Tanzania">Tanzania</option>
              <option value="Tayikist&aacute;n">Tayikist&aacute;n</option>
              <option value="Territorios franceses del Sur">Territorios franceses del Sur</option>
              <option value="Timor Oriental">Timor Oriental</option>
              <option value="Togo">Togo</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad y Tobago">Trinidad y Tobago</option>
              <option value="T&uacute;nez">T&uacute;nez</option>
              <option value="Turkmenist&aacute;n">Turkmenist&aacute;n</option>
              <option value="Turqu&iacute;a">Turqu&iacute;a</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Ucrania">Ucrania</option>
              <option value="Uganda">Uganda</option>
              <option value="Uruguay">Uruguay</option>
              <option value="Uzbekist&aacute;n">Uzbekist&aacute;n</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Vietnam</option>
              <option value="Yemen">Yemen</option>
              <option value="Yugoslavia">Yugoslavia</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabue">Zimbabue</option>
            </select>          </td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Ciudad:</td>
          <td valign="top" class="txt-error-msg"><input name="ciudad" type="text" class="fields-txt2 required" style="text-transform:capitalize" id="ciudad" value="<?=$d['ciudad']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top" style="line-height:14px;"><span class="txt-white-bold-2">*</span> Direcci&oacute;n de env&iacute;o:<br />
              <span class="txt-mini">(Incluya punto de referencia)</span></td>
          <td valign="top" class="txt-error-msg"><textarea name="direccion" rows="7" wrap="virtual" class="fields-txt2 required" id="direccion"><?=$d['direccion']?></textarea></td>
        </tr>
        <tr>
          <td align="right" style="line-height:14px;"><span class="txt-white-bold-2">*</span> Clave de ingreso:<br />
              <span class="txt-mini">(m&aacute;x. 8 caract&eacute;res)</span></td>
          <td class="txt-error-msg"><input name="clave1" type="password" class="fields-txt2 required" id="clave1" maxlength="8" value="<?=$d['clave']?>" /></td>
        </tr>
        <tr>
          <td align="right"><span class="txt-white-bold-2">*</span> Repita su clave:</td>
          <td valign="top" class="txt-error-msg"><input name="clave" type="password" class="fields-txt2 required" id="clave" maxlength="8" value="<?=$d['clave']?>" /></td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="center" valign="middle" class="txt-mini txt-white">Los campos con asterisco (*) son obligatorios.</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td valign="top"><input name="button" type="submit" class="but-form2" id="button" value="Registrar" <? if ($_SESSION['idU']!=$_GET['id']) { echo 'disabled="disabled"'; } ?> /></td>
        </tr>
      </table>
	</form>	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>
<script type="text/javascript">
$('#cedula').alphanumeric();
$('#telefono').numeric();
$('#telefono2').numeric();
</script>
</body>
</html>
