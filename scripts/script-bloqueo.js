// ------------------- BLOQUEO -------------------------------

document.onbeforecopy = function() {return false};
document.ondragstart = function() {return false};
document.onselectstart = function() {return false};
document.oncontextmenu = function() {return false};
//document.onmousedown = function() {return false};
document.onkeydown = function() {return false};