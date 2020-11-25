//-------------------------------------------------------------
// Функция для определения координат указателя мыши
function defPosition(event) {
      var x = y = 0;
      if (document.attachEvent != null) { // Internet Explorer & Opera
            x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
            y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
			if (window.event.clientY + 72 > document.body.clientHeight) { y-=68 } else { y-=2 }
      } else if (!document.attachEvent && document.addEventListener) { // Gecko
            x = event.clientX + window.scrollX;
            y = event.clientY + window.scrollY;
			if (event.clientY + 72 > document.body.clientHeight) { y-=68 } else { y-=2 }
      } else {
            // Do nothing
      }
      return {x:x, y:y};
}

var flagpop=0;




function ClipBoard(text)
{
	holdtext.innerText = text;
	var Copied = holdtext.createTextRange();
	Copied.execCommand("RemoveFormat");
	Copied.execCommand("Copy");

}



function OpenMenu(evt,level){
    evt = evt || window.event;
    evt.cancelBubble = true;
    // Показываем собственное контекстное меню
    var menu = document.getElementById("oMenu");
    var html = "";
	login=(evt.target || evt.srcElement).innerHTML;
	
//	clip.setText(login);
	window.event.returnValue=false;
	var i1, i2;
	if ((i1 = login.indexOf('['))>=0 && (i2 = login.indexOf(']'))>0) login=login.substring(i1+1, i2);

	var login2 = login;
	login2 = login2.replace('%', '%25');
	while (login2.indexOf('+')>=0) login2 = login2.replace('+', '%2B');
	while (login2.indexOf('#')>=0) login2 = login2.replace('#', '%23');
	while (login2.indexOf('?')>=0) login2 = login2.replace('?', '%3F');
	
	html  = '<a href="javascript:void(0)" class="menuItem" onclick="top.AddTo(\''+login+'\');cMenu()">Для</a>'+
	'<a href="javascript:void(0)" class="menuItem" onclick="top.AddToPrivate(\''+login+'\');cMenu()">В приват</a>'+
	'<a href="javascript:void(0)" class="menuItem" onclick="window.open(\'inf.php?login='+login2+'\')"; cMenu();">Информация</a>'+
	'<TEXTAREA ID="holdtext" STYLE="display:none;"></TEXTAREA><A class=menuItem HREF="javascript:ClipBoard(\''+login+'\');cMenu()">Скопировать</A>'+
	'<a href="javascript:void(0)" class="menuItem" onclick="window.open(\'inf.php?login='+login2+'\')"; cMenu();">Подарок другу</a>';
 
 // Если есть что показать - показываем
    if (html){
        menu.innerHTML = html;
        menu.style.top = defPosition(evt).y + "px";
        menu.style.left = defPosition(evt).x + "px";
        menu.style.display = "";
    }

    // Блокируем всплывание стандартного браузерного меню
    return false;
}



function addHandler(object, event, handler, useCapture){
    if (object.addEventListener){
        object.addEventListener(event, handler, useCapture ? useCapture : false);
    } else if (object.attachEvent){
        object.attachEvent('on' + event, handler);
    } else alert("Add handler is not supported");
}

addHandler(document, "contextmenu", function(){
    document.getElementById("oMenu").style.display = "none";
});

addHandler(document, "click", function(){
//	clip.hide();
    document.getElementById("oMenu").style.display = "none";
});



function closeMenu(event) {
  if (window.event && window.event.toElement) {
    var cls = window.event.toElement.className;
    if (cls=='menuItem' || cls=='menu') return;
  }
  document.getElementById("oMenu").style.display = "none";
  return false;
}

function cMenu() {
  /*document.all("oMenu").style.visibility = "hidden";
  document.all("oMenu").style.top="0px";*/
  document.getElementById("oMenu").style.display = "none";
  top.frames['bottom'].window.document.F1.text.focus();
}


//-------------------------------------------------------------------------