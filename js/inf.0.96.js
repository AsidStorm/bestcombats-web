function NewErrorTrap() { return true; }
function errtrap(nick)
{
	var OldErrorTrap = window.onerror;
	window.onerror = NewErrorTrap;
	if (window.opener) { // && window.opener.top.delay) {
		document.write('<IMG SRC=../i/lock3.gif WIDTH=20 HEIGHT=15 ALT="Приватное сообщение" onclick="window.opener.top.AddToPrivate(\''+nick+'\', true)" style="cursor:hand">');
	}
	if (document.log != null) { window.top.location="/index.htm"; }
	window.onerror = OldErrorTrap;
}

function fastshow (content) {
	var el = document.getElementById("mmoves");
	var o = window.event.srcElement;
	if (content!='' && el.style.visibility != "visible") {el.innerHTML = '<small>'+content+'</small>';}
	var x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft + 3;
	var y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop+5;
	el.style.left = x + "px";
	el.style.top  = y + "px";
	if (el.style.visibility != "visible") {
		el.style.visibility = "visible";
	}
}

var gift = new Array('','',''); // gift_from_before, gift_from_after, gift_from_anonym;

function quoteString(str){
  str = str.replace(/\\/g,'\\\\');
  str = str.replace(/\'/g,'\\\'');
  str = str.replace(/\"/g,'\\"');
  str = str.replace(/\n/g,'\\n');    
  return "'" + str + "'";
}

function DrawGift(name, flag, title, text, from, uid, width, height){
  var s = ('<IMG SRC="../i/items/'+name+'.gif" WIDTH='+width+' HEIGHT='+height+' style="cursor: hand;" ALT="');
  if (text)s+=text+"\n";
  s += (from?(gift[0] + from + gift[1]):gift[2]) + '"' +
  	' onclick="HideGift();ShowGift('+ quoteString(title)+ ', ' + quoteString(name) +', ' +
	flag + ', ' +  quoteString(text)+', '+ quoteString(from)+', this.offsetTop'+(uid?(',\''+uid+'\''):'')+');"'+ 
  	'>';
  document.writeln(s);
}


function DG1(name, flag, title, text, from, uid){
  DrawGift(name, flag, title, text, from, uid, 61, 60);
}

function DG2(name, flag, title, text, from, uid){
  DrawGift(name, flag, title, text, from, uid, 80, 74);
}

function DF(name, flag, title, text, from, uid){
  DrawGift(name, flag, title, text, from, uid, 60, 60);
}

function quote_url(s){
	var from = Array('+', ' ', '#');
	var to = Array('%2B', '+', '%23');
	for(var i=0;i<from.length;++i) while(s.indexOf(from[i])>=0)  s= s.replace(from[i],to[i]);
	return s;
}

function ShowGift(title, name, img, text, from, y, uid) {

	var el = document.getElementById("mgift");
	var o = window.event.srcElement;
	var stitle = (img & 8)?
		'<a href="/encicl/object/'+ name +'.html" target=_blank>' + title + '</a>':
		((img & 2)?'<a target=_blank href="../i/items/big/3d'+name+'.jpg">' + title + '</a>':
		title);
        if (el.style.visibility !='visible'){
	  if (uid){
	  	if (parseInt(uid))from = gift[0] + '<a target=_blank href="/inf.php?'+uid+'">' + from + '</a>' + gift[1];
		else from = gift[0] + '<a target=_blank href="/encicl/klan/'+uid+'.html">' + from + '</a>' + gift[1];
	  }else if (from) from = gift[0] + ((from == 'АНТИБК Online')?from:'<a target=_blank href="/inf.php?login='+quote_url(from)+'">' + from + '</a>') + gift[1];
	  if (!from) from = gift[2];
	  document.getElementById("mgift_sign").innerHTML = '<small>' + (text?text+'<br>':'') + from + '</small>';
	  document.getElementById("mgift_title").innerHTML = '<small><b>' + stitle + '</b></small>';
	  var eimg = document.getElementById("mgift_pict");
	  if (!(img & 6)){
	    eimg.innerHTML = '<br><img src=../i/items/' +name+ '.gif alt="'+title+'"><br><br>';
	  } else {	     
	    var s = ((img & 4)?'middle/':'big/3d');
	    eimg.innerHTML = '<img width=240 src="../i/items/' + s + name + '.jpg" '+ (img==5?'':' height=180')+'alt="' + title + '">';
	  }
	}
	var x = 15; 
	// var y = y; # window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	el.style.left = x + "px";
	el.style.top  = y + "px";
	if (el.style.visibility != "visible") {
		el.style.visibility = "visible";
	}
}

function hideshow () {
	document.getElementById("mmoves").style.visibility = 'hidden';
}

function HideGift () {
        document.getElementById("mgift").style.visibility = 'hidden';
}

function drawDivs(){
	document.writeln('<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>');
	document.writeln('<div id="mgift" style="background-color:#FFFFCC; z-index:99; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;">');
	document.writeln('<table width=240 border=0 cellpadding=0 cellspacing=0>' + 
			'<tr><td align=left id=mgift_title></td><td align=right><font color=red>'+
			'<a href="javascript:void(0);" onclick="HideGift(); return 0;"><b>x</b></a>'+
			'</font></td></tr>'+
			'<tr><td colspan=2><img src="../i/1x1.gif" alt="" width=240 height=1 border=0></td></tr>'+
			'<tr><td colspan=2 id=mgift_pict align=center bgcolor="#dedede"><td></tr>' +
			'<tr><td colspan=2 id=mgift_sign></td></tr></table></div>');

}

