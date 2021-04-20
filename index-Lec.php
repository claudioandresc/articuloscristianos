<?php
include("conexion.php"); 
session_start(); 

if($_GET['logout']==1) {
  session_unset();
  session_destroy();
  header("location: index.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Inicio - Articulos Cristianos - Ventas al mayor y al detal de art&iacute;culos y productos cristianos</title>
<meta name="keywords" content="articulos cristianos, artículos cristianos, productos cristianos, mercancia cristiana, mercancía cristiana, catalogo cristiano, catálogo cristiano, detalles cristianos, productos evangelicos, productos evangélicos, bisuteria, bisutería, bisutería cristiana, pulsera, pulseras, pulsera cristiana, pulseras cristianas, brazalete, brazaletes, brazalete cristiano, brazaletes cristianos, collar, collares, collar cristiano, collares cristianos, anillo, anillos, anillo cristiano, anillos cristianos, llavero, llaveros, llavero cristiano, llaveros cristianos, chapa, chapas, chapa cristiana, chapas cristianas, monedero, monederos, monedero cristiano, monederos cristianos, billetera, billeteras, billetera cristiana, billeteras cristianas, tobillera, tobilleras, tobillera cristiana, tobilleras cristianas, franela, franelas, franela cristiana, franelas cristianas, ropa, ropa cristiana, gorra, gorras, gorra cristiana, gorras cristianas, chachucha, cachuchas, cachucha cristiana, cachucas cristianas, prendedor, prendedores, prendedor cristiano, prendedores cristianos, emblema, emblemas, emblemas cristianos, emblema cristiano, emblema pez jesus, emblema pez cristo, pez jesus, pez cristo, jesus fish, eventos cristianos, literatura cristiana, biblias, libros, libros cristianos, libro cristiano, articuloscristianos.net, articuloscristianos.com.ve, articuloscristianos.com" />
<meta name="Description" content="Ventas al mayor y al detal de artículos y productos cristianos. Ayudando a llevar el evangelio y la palabra de Dios a las naciones." />
<? include ('includes/head-code.php') ?>
<link href="css/nivo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'random', // sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse, random
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 5000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        directionNavHide: true, // Only show on hover
        controlNav: false, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        controlNavThumbsFromRel: false, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav: true, // Use left & right arrows
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        captionOpacity: 0.8, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>
</head>

<body onload="hideBox('loadingBox')">
<table width="919" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include ('includes/header.php') ?></td>
  </tr>
  <tr>
    <td valign="top" style="padding-bottom:6px;">
    <div id="loadingBox" class="loading-box"><img src="images/loading.gif" vspace="145" border="0" /></div>
	<div id="slider" class="nivoSlider theme-default">
		<img src="home-slider/img_flash1.jpg" alt="Franela Unisex Estampada" title="#cap1" />
		<img src="home-slider/img_flash2.jpg" alt="Cartuchera Jean Media Luna" title="#cap2" />
		<img src="home-slider/img_flash3.jpg" alt="Llavero Monedero Redondo" title="#cap3" />
		<img src="home-slider/img_flash4.jpg" alt="Pantalón Deportivo Dama" title="#cap4"  />
		<img src="home-slider/img_flash5.jpg" alt="Collar Placa Cobrizada" title="#cap5" />
	</div>
<div id="cap1" class="nivo-html-caption">Hoja de Calcoman&iacute;as PQS &nbsp;&#8250;&nbsp; <a href="productos.php?idg=Libreria">Ver M&aacute;s...</a></div>
<div id="cap2" class="nivo-html-caption">Pulsera Artesanal Tubo &nbsp;&#8250;&nbsp; <a href="productos.php?idg=Pulseras">Ver M&aacute;s...</a></div>
<div id="cap3" class="nivo-html-caption">Llavero Sandalia &nbsp;&#8250;&nbsp; <a href="productos.php?idg=Llaveros">Ver M&aacute;s...</a></div>
<div id="cap4" class="nivo-html-caption">Collar Placa Grande &nbsp;&#8250;&nbsp; <a href="productos.php?idg=Collares">Ver M&aacute;s...</a></div>
<div id="cap5" class="nivo-html-caption">Vestido Estampado &nbsp;&#8250;&nbsp; <a href="productos.php?idg=Franelas">Ver M&aacute;s...</a></div>


	<div id="homeBox1" class="homeBox">
	  <span class="tit-boxes">Lecturas</span>
	  <? $buscar=mysql_query("SELECT * FROM lecturas ORDER BY fecha DESC LIMIT 1");
		 $datos=mysql_fetch_array($buscar)?>
	  <strong style="color:#DDDDDD"><?=$datos['titulo']?></strong><br />
		<?=$datos['sumario']?>&#8230; 
	  <p align="right"><a href="lecturas.php?idg=<?=$datos['idLec']?>" class="link-mas">Ver mas&#8230;</a></p>
	  <? ?>
	</div>
	<div id="homeBox2" class="homeBox" style="margin-left:10px">
	 <span class="tit-boxes">Compras Al Detal</span>
	  TODOS los precios publicados en nuestro sitio web SON PRECIOS DE MAYOR.<br /> 
      Si desea comprar <b>AL DETAL</b>, escr&iacute;banos &oacute; env&iacute;enos su lista de productos al email: <br /><br />
<a href="mailto:articuloscristianos@gmail.com" style="color:#EEEEEE;text-decoration:none;">articuloscristianos@gmail.com</a>
	  <p align="right"><a href="contacto.php" class="link-mas">Ver mas&#8230;</a></p> 
	</div>
	<div id="homeBox3" class="homeBox" style="margin-left:10px">
	<span class="tit-boxes">Ventas</span>
	  <strong style="color:#DDDDDD">&iquest;Desea  vender sus productos con nosotros?</strong><br />
Comuniquese por los tel&eacute;fonos: <br />
04127369008 / 04129966033.<br />
Caracas/Venezuela.<br /><br />
Email: <a href="mailto:articulos.cristianos@yahoo.com" style="color:#EEEEEE;text-decoration:none;">articulos.cristianos@yahoo.com</a>
	  <p align="right"><a href="contacto.php" class="link-mas">Ver mas&#8230;</a></p>  
	</div>
	</td>
  </tr>
<? include ('includes/footer.php') ?>
</table>

<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=5652787; 
var sc_invisible=1; 
var sc_partition=60; 
var sc_click_stat=1; 
var sc_security="b6ae878f"; 
</script>

<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script><noscript><div
class="statcounter"><a title="blogspot counter"
href="http://www.statcounter.com/blogger/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/5652787/0/b6ae878f/1/"
alt="blogspot counter" ></a></div></noscript>
<!-- End of StatCounter Code -->

</body>
</html>
