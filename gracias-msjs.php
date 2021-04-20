<?php $texto = $_GET['msj']; ?>
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
    <?php if ($texto=='olvido1') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>Debe introducir su Email.</strong><br />
	  Intente nuevamente.<p><a href="olvido-datos.php" class="link-mas">[Continuar]</a></p>
      </td>
    </tr>
    <?php } if ($texto=='olvido2') { ?>
    <tr>
      <td height="145" align="center">  
	  Su email <strong>No est&aacute; registrado</strong> en nuestro sistema.<br />
	  Intente nuevamente &oacute; <a href="registro.php" target="_parent" class="link-mas" style="font-size:11px; font-weight:bold;">Reg&iacute;strese Aqu&iacute;</a>.
	  <p><a href="olvido-datos.php" class="link-mas">[Continuar]</a></p>
      </td>
    </tr>
    <?php } if ($texto=='olvido3') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>Sus datos se enviaron satisfactoriamente</strong><br />
	  a su cuenta de correo electr&oacute;nico.
	  <p><a href="index.php" target="_parent" class="link-mas">[Cerrar]</a></p>
      </td>
    </tr>
    <?php } if ($texto=='entrar1') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>(x) Error de Ingreso.</strong><br />Introduzca sus datos correctamente.<p><a href="entrar.php" class="link-mas">[Continuar]</a></p>
      </td>
    </tr>
    <?php } if ($texto=='entrar2') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>Sus datos de acceso no coinciden.</strong><br />Intente nuevamente.<p class="link-mas"><a href="entrar.php" class="link-mas">Continuar</a> &nbsp;|&nbsp; <a href="olvido-datos.php" class="link-mas">&iquest;Olvid&oacute; sus datos?</a></p>
      </td>
    </tr>
    <?php } if ($texto=='recomienda') { ?>
    <tr>
      <td height="145" align="center">  
	  Su recomendación ha sido enviada Exitosamente.<br /><b>&iexcl;Muchas Gracias!</b>
	  </td>
    </tr>
    <?php } if ($texto=='reg1') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>(x) Registro Fallido.</b><br />Debe llenar correctamente <u>todos</u> los campos obligatorios.<p>Intente nuevamente.</p>
	  </td>
    </tr>
    <?php } if ($texto=='reg2') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>(x) Registro Fallido.</b><br />Su <span style="color: #993300">email ya esta registrado</span> en nuestro sistema.<p><a href="olvido-datos.php" class="link-mas" style="font-weight:bold">&iquest;Olvid&oacute; sus datos?</a></p> 
	  </td>
    </tr>
    <?php } if ($texto=='reg3') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>&iexcl;Registro Exitoso!</b><br />
	  Ahora podr&aacute; disfrutar de todos nuestros beneficios y<br />
	  estar al tanto de nuestras ofertas.<br /><p><strong>&iexcl;Muchas Gracias!</strong>
	    <p class="link-mas"><a href="entrar.php" class="link-mas" style="color:#006600"><strong>Entrar ahora</strong></a> &nbsp;|&nbsp; <a href="index.php" target="_parent" class="link-mas">Salir</a></p> 
	  </td>
    </tr>
    <?php } if ($texto=='reg4') { ?>
    <tr>
      <td height="145" align="center">  
	  <b>Datos Actualizados.</b><br />
	  Sus datos se han actualizado exitosamente.<br />
	    <p><a href="index.php" target="_parent" class="link-mas">[Continuar]</a></p> 
	  </td>
    </tr>
    <?php } if ($texto=='contacto1') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>(x) Error de Env&iacute;o.</strong><br />
	  Introduzca sus datos correctamente.<p><a href="contacto.php" target="_parent" class="link-mas">[Continuar]</a></p>
	  </td>
    </tr>
    <?php } if ($texto=='contacto2') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>Gracias por comunicarse con nosotros.</strong><br />
	  A la brevedad nos pondremos en contacto con ud.</span><p class="link-mas"><a href="index.php" target="_parent" class="link-mas">Ir al Inicio</a> &nbsp;|&nbsp; <a href="contacto.php" target="_parent" class="link-mas">Continuar</a></p>
	  </td>
    </tr>
    <?php } if ($texto=='oracion1') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>(x) Error de Env&iacute;o.</strong><br />
	  Introduzca sus datos correctamente.<p><a href="oracion.php" target="_parent" class="link-mas">[Continuar]</a></p>
	  </td>
    </tr>
    <?php } if ($texto=='oracion2') { ?>
    <tr>
      <td height="145" align="center">  
	  <strong>Hemos recibido su Solicitud.</strong><br />
	  Estaremos orando gustosamente por sus peticiones.</span><p class="link-mas"><span style="color:#000; font-style:italic">"El Señor mismo marchará al frente de ti y estará contigo;<br />nunca te dejará ni te abandonará. No temas ni te desanimes"</span><br />Deuteronomio 31:8</p>
	  </td>
    </tr>
    <?php } if ($texto=='proreg') { ?>
    <tr>
      <td height="145" align="center"><strong>Para	ver los precios de los productos<br />debe estar registrado.</strong>
        <p style="line-height:20px;"><a href="entrar.php" class="link-mas" style="color:#006600"><strong>[+] Ya estoy registrado, quiero ingresar</strong></a>.<br />
          <a href="registro.php" target="_parent" class="style1">[x] No estoy registrado, quiero hacerlo</a>.&nbsp;</p></td>
    </tr>
    <?php } if ($texto=='pedido') { ?>
    <tr>
      <td height="145" align="center">
      <strong>Para enviar su Pedido debe estar registrado.</strong>
      <p style="line-height:20px;"><a href="entrar.php" class="link-mas" style="color:#006600"><strong>[+] Ya estoy registrado, quiero ingresar</strong></a>.<br />
      <a href="registro.php" target="_parent" class="style1">[x] No estoy registrado, quiero hacerlo</a>.&nbsp;</p></td>
    </tr>
    <?php } if ($texto=='pedido1') { ?>
    <tr>
      <td height="145" align="center">
      <strong>(x) Error de Env&iacute;o.</strong><br />
      Debe llenar sus datos correctamente y<br />
	Seleccionar los Productos a Comprar.
      </td>
    </tr>
    <?php } if ($texto=='pedido2') { ?>
    <tr>
      <td height="145" align="center">
      <strong>Hemos recibido su Pedido.</strong><br />
      Una copia ha sido enviada a su email.<br />
      Espere nuestra confirmaci&oacute;n para proceder con el pago.
	   <p><strong>Muchas Gracias.</strong></p>      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
