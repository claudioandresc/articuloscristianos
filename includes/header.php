<table width="919" border="0" cellspacing="0" cellpadding="0">
<? if ($_SESSION['shalom']!="") { ?>
      <tr>
        <td height="40" colspan="2" align="center" valign="top">
          <table border="0" cellpadding="0" cellspacing="0" class="log-box">
          <tr>
            <td align="center" valign="top"><img src="images/top-log-r.jpg" border="0" align="right" /><img src="images/top-log-l.jpg" border="0" align="left" /> &nbsp;&nbsp;Bendiciones&nbsp;<span class="log-name"><?php echo $_SESSION['shalom']; ?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<? if($_SESSION['emp']==1) { echo 'registro-empresa.php?e=1&id='.$_SESSION['idU']; } else { echo 'registro.php?e=1&id='.$_SESSION['idU']; } ?>">Sus&nbsp;Datos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index.php?logout=1">Salir&nbsp;(x)</a>&nbsp;&nbsp;</td>
          </tr>
        </table>
      </td>
  </tr>
<? } else { ?>
	<tr>
        <td height="40" colspan="2" align="left" valign="top"><a href="registro.php"><img src="images/top-but-reg.jpg" border="0" alt="Reg&iacute;strese" title="Reg&iacute;strese" /></a>&nbsp;<a href="entrar.php" class="fancyframe"><img src="images/top-but-entrar.jpg" alt="Ingrese a su cuenta" title="Ingrese a su cuenta" border="0" /></a>
        </td>
	</tr>
<? } ?>
      <tr>
        <td width="619" height="120" valign="top"><img src="images/logo_01.jpg" alt="Articulos Cristianos" title="Articulos Cristianos" width="298" height="104" /><img src="images/logo_02.jpg" alt="Articulos Cristianos" title="Articulos Cristianos" width="321" height="104" /></td>
        <td width="300" height="120" align="left" valign="top" background="images/logo_03.jpg" style="background-repeat:no-repeat; background-position:top"><div id="palabritas"><script language="javascript" type="text/javascript">frases();</script></div></td>
      </tr>
      <tr>
        <td height="19" colspan="2" align="center" valign="top" class="txt-white-bold"><a href="/" class="menu-items">Inicio</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="javascript:;" class="menu-items" id="itemsCat">Catalogo</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="comprar.php" class="menu-items">Como Comprar</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="lecturas.php" class="menu-items">Lecturas</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="eventos.php" class="menu-items">Eventos</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="oracion.php" class="menu-items">Oracion</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="contacto.php" class="menu-items">Contacto</a></td>
  </tr>
      <tr>
        <td height="1" colspan="2" align="left" valign="top">
		<div id="menu">
		<? $buscar=mysql_query("SELECT * FROM categorias WHERE status='A' ORDER BY nombre ASC LIMIT 12"); //  
		   while($datos=mysql_fetch_array($buscar)){?>
		<a href="productos.php?idg=<?=$datos['nombre']?>"><?=$datos['nombre']?></a>
		<? } ?>
		<a href="catalogo.php" style="border-bottom:none;background-color:#E6BB26;color:#000;">Ver mas &raquo;</a>
		</div>
		</td>
      </tr>
    </table>