<? $texto = $HTTP_GET_VARS['msj']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Articulos Cristianos</title>
<style type="text/css">
body { 
	margin:0px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	background-color:#dcb82c;
	color:#2d2609;
}
.txt-color {
	color:#FFFFFF;
}
.link-mas {
	color:#993300;
	font-size:10px;
	text-decoration:none;
}
.style1 {color: #993300; font-size: 10px; text-decoration: none; font-weight: bold; }
</style>
</head>

<body>
  <table width="460" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="442" height="30" align="center" bgcolor="#c9a421"><strong class="txt-color" style="font-size:14px">:: Art&iacute;culos Cristianos :: </strong></td>
    </tr>
    <? if ($texto=='reg1') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Datos Actualizados.</b><br />
	  Los datos se han actualizado exitosamente. 
	  </td>
    </tr>
    <? } if ($texto=='reg2') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Usuario Eliminado.</b><br />
	  Se ha eliminado un Usuario de la base de datos. 
	  </td>
    </tr>
    <? } if ($texto=='emsj1') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Error de env&iacute;o.</b><br />
	  Debe llenar todos los campos. 
	  </td>
    </tr>
    <? } if ($texto=='emsj2') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Mensaje Enviado.</b><br />
	  Su mensaje se envi&oacute; satisfactoriamente. 
	  </td>
    </tr>
    <? } if ($texto=='emsj3') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Mensaje Eliminado.</b><br />
	  El mensaje ha sido borrado de la base de datos. 
	  </td>
    </tr>
    <? } ?>
  </table>
</body>
</html>
