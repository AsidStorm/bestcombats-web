var rKey = '';
var eKey = '';
var tFobj = null;
var tPsw = null;
var tDiv = null;

var chRus = 'àáâãäå¸æçèéêëìíîïðñòóôõö÷øùúûüýþÿ';
var chEng = 'abcdefghijklmnopqrstuvwxyz';
var chDec = '0123456789';
var spSim = '!@#$%^&*()_+|=-`~[]{}.,?><;:/';

function delSim(fl) {
	tObj = eval("document.forms['"+tFobj+"']."+tPsw);
	tObj.value = (fl ? '' : tObj.value.substring(0,tObj.value.length-1));
}

function putKey(tmp) {
	tObj = eval("document.forms['"+tFobj+"']."+tPsw);
	tObj.value += tmp;
}

function KeyShow(shiftFl, tmp) {
	var trshap = '';
	if(!tFobj) return;

	for (var j = 0; j < tmp.length; j++) { ich = tmp.charAt(j);
		if(shiftFl) ich=ich.toUpperCase();
		trshap += "<TD><INPUT type=button class='btkey' value='"+ich+"' onclick=\"putKey(this.value); this.blur();\"></TD>";
	}
return trshap;
}

function KeyCreate(tmp) {
	var out = '';
	var cnt = tmp.length;
	for (var j = 0; j < cnt; j++) {
		tt = Math.floor((tmp.length-1) * Math.random());
		out += tmp.charAt(tt);
		tmp = tmp.substring(0,tt).concat(tmp.substring(tt+1)); 
		}
return out;
}

function KeypadShow(fl, iForm, iField, iKeyPad) {


if(tFobj && tPsw && tDiv) {
	tObj = eval("document.forms['"+tFobj+"']."+tPsw);
	tObj.style.backgroundColor = '';
	if(tFobj != iForm || tPsw != iField) eval("document.all['"+tDiv+"'].style.display='none'");
	}

tPsw = iField; tFobj = iForm;  tDiv = iKeyPad;
tObj = eval("document.forms['"+tFobj+"']."+tPsw);
tKeyp =	eval("document.all['"+tDiv+"']");

if ( tKeyp.style.display == 'block' ) { tKeyp.style.display='none'; tFobj = tDiv = tPsw = null; }
	else {
		tKeyp.style.display='block';
		if(!keyTable) shKeypad(fl);

		tObj.style.backgroundColor = '#fceddd';
		tKeyp.innerHTML = keyTable;
	}
}

var keyTable = '';
function shKeypad(fl) {

	chRus1 = chRus;
	chEng1 = chEng;
	chDec1 = chDec;
	spSim1 = spSim;
	if(fl) {
		chRus1 = KeyCreate(chRus1);
		chEng1 = KeyCreate(chEng1);
		chDec1 = KeyCreate(chDec1);
		spSim1 = KeyCreate(spSim1);
		}
	keyTable = '<TABLE align=center border=0 cellspacing=0 cellpadding=0>';
	keyTable += '<TR>' + KeyShow(0, chEng1) + "<TD colspan=7 align=right><INPUT style='width=140;' type=button class='btn' value='&larr;' onclick=\"delSim()\"></TD></TR>";
	keyTable += '<TR>' + KeyShow(1, chEng1)+"<TD colspan=7 align=right><INPUT style='width=140;' type=button class='btn' value='Î÷èñòèòü âñå' onclick=\"delSim(1);\"></TD></TR>";
	keyTable += '<TR>' + KeyShow(0, chDec1) +"<TD colspan=16 align=right><INPUT style='width=140;' type=button class='btn' value='Ïî àëôàâèòó' onclick=\"shKeypad(); document.all['"+tDiv+"'].innerHTML = keyTable;\"></TD><TD colspan=7 align=right><INPUT style='width=140;' type=button class='btn' value='Ïåðåìåøàòü' onclick=\"shKeypad(1); document.all['"+tDiv+"'].innerHTML = keyTable;\"></TD></TR>";
	keyTable += '<TR><td style="HEIGHT: 8px;"></td></TR>';
	keyTable += '<TR>' + KeyShow(0, chRus1)+'</TR>';
	keyTable += '<TR>' + KeyShow(1, chRus1)+'</TR>';
	keyTable += '<TR><td style="HEIGHT: 8px;"></td></TR>';
	keyTable += '<TR>' + KeyShow(0, spSim1) +'</TR>';
	keyTable += '</TABLE>';
}
