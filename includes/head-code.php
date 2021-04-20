<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" / -->
<link type="image/x-icon" href="fish.ico" rel="shortcut icon" />
<!-- link href='http://fonts.googleapis.com/css?family=Della+Respira' rel='stylesheet' type='text/css' -->
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/fancybox.css" rel="stylesheet" type="text/css" />
<? if ($blockOff != 1) { ?>
<script type="text/javascript" src="scripts/script-bloqueo.js"></script>
<? } ?>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/fancybox.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("a.fancy").fancybox();

	$("a.fancyframe").fancybox({
	'width'				: 460,
	'height'			: 200,
	'autoScale'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'type'				: 'iframe'
	});
});
</script>
