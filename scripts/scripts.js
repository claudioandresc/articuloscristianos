//-------------------- PALABRITAS ----------------------------

var deposito, quoteNum, numQuote;
numQuote = 41;
deposito = new Array();

function frases() {
deposito[0] = "Porque han visto mis ojos tu salvaci�n<br /><span style=color:#846800>Lc 2:30</style>";
deposito[1] = "Lo que el justo desea, eso recibe<br /><span style=color:#846800>Pr 10:24</style>";
deposito[2] = "La oraci�n del justo, tiene poder<br /><span style=color:#846800>Stg 5:16</style>";
deposito[3] = "El Se�or hace todo lo que quiere<br /><span style=color:#846800>Sal 135:6</style>";
deposito[4] = "Y todo mortal ver� la salvaci�n de Dios<br /><span style=color:#846800>Lc 3:6</style>";
deposito[5] = "Si fu�ramos infieles, �l permanece fiel<br /><span style=color:#846800>2Ti 2:13</style>";
deposito[6] = "El que me halle, hallar� la vida<br /><span style=color:#846800>Pr 8:35</style>";
deposito[7] = "El que conf�a en el Se�or, prospera<br /><span style=color:#846800>Pr 28:25</style>";
deposito[8] = "El que guarda mi palabra, no morir�<br /><span style=color:#846800>Jn 8:51</style>";
deposito[9] = "Muertos con �l, viviremos con �l<br /><span style=color:#846800>2Ti 2:11</style>";
deposito[10] = "Deja al Se�or tu carga y te sostendr�<br /><span style=color:#846800>Sal 55:22</style>";
deposito[11] = "Yo te dar� consejos y velar� por ti<br /><span style=color:#846800>Sal 32:8</style>";
deposito[12] = "Clama a mi y yo te responder�<br /><span style=color:#846800>Jer 33:3</style>";
deposito[13] = "El que en mi cree, no volver� a tener sed<br /><span style=color:#846800>Jn 6:35</style>";
deposito[14] = "Si el hijo os libert�res, ser�is libres<br /><span style=color:#846800>Jn 8:36</style>";
deposito[15] = "Cuida tu coraz�n porque es fuente de vida<br /><span style=color:#846800>Pr 4:23</style>";
deposito[16] = "Has el bien, y vivir�s para siempre<br /><span style=color:#846800>Sal 37:27</style>";
deposito[17] = "Mi Dios suplir� todo lo que os falta<br /><span style=color:#846800>Flp 4:19</style>";
deposito[18] = "Ninguna arma contra ti, prosperar�<br /><span style=color:#846800>Is 54:17</style>";
deposito[19] = "El hombre propone y Dios dispone<br /><span style=color:#846800>Pr 16:1</style>";
deposito[20] = "Feliz el hombre que conf�a en el Se�or<br /><span style=color:#846800>Sal 40:4</style>";
deposito[21] = "El pobre suplica, el rico insulta<br /><span style=color:#846800>Pr 18:23</style>";
deposito[22] = "M�s el justo vivir� por f�<br /><span style=color:#846800>Heb 10:38</style>";
deposito[23] = "Si le negamos, �l nos negar�<br /><span style=color:#846800>2Ti 2:12</style>";
deposito[24] = "El que perdona la ofensa cultiva el amor<br /><span style=color:#846800>Pr 17:9</style>";
deposito[25] = "Ninguna dificultad nos alejar� de Cristo<br /><span style=color:#846800>Ro 8:39</style>";
deposito[26] = "La mujer bondadosa se gana el respeto<br /><span style=color:#846800>Pr 11:16</style>";
deposito[27] = "Dar� a cada uno, seg�n lo que haya hecho<br /><span style=color:#846800>Ap 22:12</style>";
deposito[28] = "El malvado ser� castigado<br /><span style=color:#846800>Pr 11:21</style>";
deposito[29] = "El que cree en el hijo, tiene vida eterna<br /><span style=color:#846800>Jn 3:36</style>";
deposito[30] = "El que me sigue no andar� en tinieblas<br /><span style=color:#846800>Jn 8:12</style>";
deposito[31] = "El Se�or instruir� a todos tus hijos<br /><span style=color:#846800>Is 54:13</style>";
deposito[32] = "Mi siervo triunfar� y ser� puesto en alto<br /><span style=color:#846800>Is 52:13</style>";
deposito[33] = "No paguen a nadie mal por mal<br /><span style=color:#846800>Ro 12:17</style>";
deposito[34] = "Vu�lvanse de todo coraz�n al Se�or<br /><span style=color:#846800>Jos 24:23</style>";
deposito[35] = "Den gracias al Se�or porque �l es bueno<br /><span style=color:#846800>Sal 106:1</style>";
deposito[36] = "La oraci�n de fe sanar� al enfermo<br /><span style=color:#846800>Stg 5:15</style>";
deposito[37] = "Tu nombre, Se�or, es eterno<br /><span style=color:#846800>Sal 135:13</style>";
deposito[38] = "Mi familia y yo serviremos al Se�or<br /><span style=color:#846800>Jos 24:15</style>";
deposito[39] = "Y Dios cre� al ser humano a su imagen<br /><span style=color:#846800>Gen 1:27</style>";
deposito[40] = "No te hagas ning�n �dolo<br /><span style=color:#846800>Ex 20:4</style>";

quoteNum = Math.floor(Math.random() * numQuote);
document.write (deposito[quoteNum]);
}


// --------------------------------- Show/Hide Boxes ------------------------------------

function showBox(id) {
document.getElementById(id).style.visibility='visible';
}

function hideBox(id) {
document.getElementById(id).style.visibility='hidden';
}

// -------------------------------------------------------------------------------------

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_openBrWindow(theURL,winName,w,h) { //v2.0
var winl = (screen.width-w)/2;
var wint = (screen.height-h)/2;
features = 'height='+h+',width='+w+',top='+wint+',left='+winl+',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no';
window.open(theURL,winName,features);
//if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
}

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

/* function checklength() {
var max = 90;
var txt;
txt = document.getElementById('sumario');
var n = txt.value.length;
if (n>max) { //i is the maxlength of textarea which we have set to 80
txt.value = txt.value.substring(0, max); 
return false; }
} */

//-------------------- Agregar a Favoritos ----------------------------

function agregar() {
if (window.sidebar&&window.sidebar.addPanel)
{window.sidebar.addPanel("Articulos Cristianos - Mayor y Detal","http://www.articuloscristianos.com","");}
else {
if ((navigator.appName == "Netscape") || (navigator.appName == "Safari")) {
alert ("Presione Crtl+D para agregar este sitio en sus Favoritos"); }
else {
window.external.AddFavorite("http://www.articuloscristianos.com","Articulos Cristianos - Mayor y Detal") }
  }
}


//-------------------- Pagina de Inicio ----------------------------

function paginaInicio() {
if (window.sidebar&&window.sidebar.addPanel) {
	window.sidebar.addPanel("Articulos Cristianos - Mayor y Detal","http://www.articuloscristianos.com",""); }
else {
if ((navigator.appName == "Netscape") || (navigator.appName == "Safari")) {
	alert ("Presione Crtl+D para agregar este sitio en sus Favoritos"); }
	}
}
