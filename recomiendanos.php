<? 
if($_GET['act']==1){

$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "$_POST[Email]";
$asunto = "Hola ".$_POST[Nombre].", alguien te ha sugerido visitar un sitio web";
						
$msg.= "Hola ".$_POST[Nombre].",\n";
$msg.= "alguien que te conoce ha considerado sugerirte que visites nuestro sitio web\n";
$msg.= "Articulos Cristianos - www.articuloscristianos.com\n\n";
$msg.= "Tu conocido te ha dejado el siguiente mensaje:\n - ".$_POST[Mensaje]." - \n\n";
$msg.= "Muchas Gracias por tu atencion.\n";
$msg.= "Dios Te Bendiga Abundantemente.\n";

$encabezado = "From: articuloscristianos@gmail.com\r\n";
$encabezado.= "Bcc: articuloscristianos@hotmail.com\r\n";

mail($to, $asunto, $msg, $encabezado);			
										
echo '<script language="javascript">window.location="gracias-msjs.php?msj=recomienda"</script>'; 

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recomiende este Sitio - Articulos Cristianos</title>
<link href="css/estilos-popup.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#recomForm").validate();
  });
</script>
</head>

<body>
<form action="?act=1" method="post" name="recomForm" id="recomForm">
  <table width="460" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td height="30" colspan="2" align="center" bgcolor="#c9a421"><strong class="txt-color" style="font-size:14px">:: Art&iacute;culos Cristianos :: </strong></td>
    </tr>
    <tr>
      <td height="25" colspan="2" align="center"><strong>&#8212;- Recomiende este Sitio Web -&#8212;</strong></td>
    </tr>
    <tr>
      <td width="135" align="right"><span class="txt-color">*</span> Para:</td>
      <td width="317" class="txt-error-msg"><input name="Nombre" type="text" class="fields-txt required" id="Nombre" /></td>
    </tr>
    <tr>
      <td width="135" align="right"><span class="txt-color">*</span> Email:</td>
      <td class="txt-error-msg"><input name="Email" type="text" class="fields-txt required email" id="Email" /></td>
    </tr>
    <tr>
      <td width="135" align="right" valign="top">Mensaje<!-- span style="font-size:10px;color:#660;">(Opcional)</span -->:</td>
      <td class="txt-error-msg"><textarea name="Mensaje" rows="3" class="fields-txt" id="Mensaje"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="Submit" type="submit" class="but-form" value="  Enviar  " style="margin-left:" /></td>
    </tr>
  </table>
</form>
</body>
</html>
