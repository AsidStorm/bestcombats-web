var CtrlPress = false;
function info(login)
{
    login = login.replace('%', '%25');
    while (login.indexOf('+')>=0) login = login.replace('+', '%2B');
    while (login.indexOf('#')>=0) login = login.replace('#', '%23');
    while (login.indexOf('?')>=0) login = login.replace('?', '%3F');
    if (CtrlPress) { window.open('/zayavka.pl?logs=1&date=&filter='+login, '_blank'); }
    else { window.open('/inf.pl?login='+login, '_blank'); }
}
document.onmousedown = Down;
function Down() {CtrlPress = window.event.ctrlKey}

function NewErrorTrap() { return true; }
function errtrap(nick)
{
    var OldErrorTrap = window.onerror;
    window.onerror = NewErrorTrap;
    if (window.opener) { // && window.opener.top.delay) {
        document.write('<IMG SRC=/i/lock3.gif WIDTH=20 HEIGHT=15 ALT="Приватное сообщение" onclick="window.opener.top.AddToPrivate(\''+nick+'\', true)" style="cursor:hand">');
    }
    if (document.log != null) { window.top.location="http://www.combats-2.ru/"; }
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
  var s = ('<IMG SRC="/i/items/'+name+'.gif" WIDTH='+width+' HEIGHT='+height+' style="cursor: hand;" ALT="');
  if (text)s+=text+"\n";
  from = from.replace(/клан /g, 'клана ');
  if (from == '__hide') from = '';
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
        '<a href="http://capitalcity.combats.com/encicl/object/'+ name +'.html" target=_blank>' + title + '</a>':
        ((img & 2)?'<a target=_blank href="/i/items/big/3d'+name+'.jpg">' + title + '</a>':
        title);
        if (el.style.visibility !='visible'){
      if (uid){
        if (parseInt(uid))from = gift[0] + '<a target=_blank href="/inf.pl?'+uid+'">' + from + '</a>' + gift[1];
        else from = gift[0] + '<a target=_blank href="http://capitalcity.combats.com/encicl/klan/'+uid+'.html">' + from + '</a>' + gift[1];
      }else if (from) from = gift[0] + ((from == 'Бойцовский Клуб')?'<b>'+from+'</b>':'<a target=_blank href="/inf.pl?login='+quote_url(from)+'">' + from + '</a>') + gift[1];
      if (!from) from = gift[2];
      document.getElementById("mgift_sign").innerHTML = '<small>' + (text?text+'<br>':'') + from + '</small>';
      document.getElementById("mgift_title").innerHTML = '<small><b>' + stitle + '</b></small>';
      var eimg = document.getElementById("mgift_pict");
      if (!(img & 6)){
        eimg.innerHTML = '<br><img src=/i/items/' +name+ '.gif alt="'+title+'"><br><br>';
      } else {
        var s = ((img & 4)?'middle/':'big/3d');
        eimg.innerHTML = '<img width=240 src="/i/items/' + s + name + '.jpg" '+ (img==5?'':' height=180')+'alt="' + title + '">';
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
    document.writeln('<div id="mmoves" style="background-color:#FFFFCC; z-index:100; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>');
    document.writeln('<div id="mgift" style="background-color:#FFFFCC; z-index:99; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;">');
    document.writeln('<table width=240 border=0 cellpadding=0 cellspacing=0>' +
            '<tr><td align=left id=mgift_title></td><td align=right><font color=red>'+
            '<a href="javascript:void(0);" onclick="HideGift(); return 0;"><b>x</b></a>'+
            '</font></td></tr>'+
            '<tr><td colspan=2><img src="/i/1x1.gif" alt="" width=240 height=1 border=0></td></tr>'+
            '<tr><td colspan=2 id=mgift_pict align=center bgcolor="#dedede"><td></tr>' +
            '<tr><td colspan=2 id=mgift_sign></td></tr></table></div>');

}

var rnd = Math.random();
//-- Смена хитпоинтов
var delay = 18;     // Каждые 18сек. увеличение HP на 1%
var redHP = 0.33;   // меньше 30% красный цвет
var yellowHP = 0.66;// меньше 60% желтый цвет, иначе зеленый
var TimerOn = -1;   // id таймера
var tkHP, maxHP;
var speed=100;
var mspeed=100;

function setHP(value, max, newspeed) {
    tkHP=value; maxHP=max;
    if (TimerOn>=0) { clearTimeout(TimerOn); TimerOn=-1; }
    speed=newspeed;
    setHPlocal();
}
function setHPlocal() {
    if (tkHP>maxHP) { tkHP=maxHP; TimerOn=-1;} else {TimerOn=0;}
    var le=Math.round(tkHP)+"/"+maxHP;
    le=120;
    var sz1 = Math.round((le/maxHP)*tkHP);
    var sz2 = le - sz1;
    if (document.all("HP")) {
        document.HP1.width=sz1;
        document.HP2.width=sz2;
        document.HP2.display=sz2?"":"none";
        if (tkHP/maxHP < redHP) { document.HP1.src='/i/misc/bk_life_red.gif'; }
        else {
            if (tkHP/maxHP < yellowHP) { document.HP1.src='/i/misc/bk_life_yellow.gif'; }
            else { document.HP1.src='/i/misc/bk_life_green.gif'; }
        }
        var s = document.all("HP").innerHTML;
        document.all("HP").innerHTML = Math.round(tkHP)+"/"+maxHP;
    }
    tkHP = (tkHP+(maxHP/100)*speed/1000);
    if (TimerOn!=-1) {TimerOn=setTimeout('setHPlocal()', delay*100)};
}

var Mdelay = 18;
var MTimerOn = -1;  // id таймера
var tkMana, maxMana;

function setMana(value, max, newspeed) {
    tkMana=value; maxMana=max;
    if (MTimerOn>=0) { clearTimeout(MTimerOn); MTimerOn=-1; }
    if (newspeed < 1) newspeed=1;
    mspeed=newspeed;
    setManalocal();
}

function setManalocal() {
    if (maxMana==0) return(0);
    if (tkMana>maxMana) { tkMana=maxMana; MTimerOn=-1; } else {MTimerOn=0;}
    var le=Math.round(tkMana)+"/"+maxMana;
    le=120;
    var sz1 = Math.round( ( le / maxMana ) * tkMana);
    var sz2 = le - sz1;
    if (document.all("Mana")) {
        document.Mana1.width=sz1;
        document.Mana2.width=sz2;
        document.Mana2.display=sz2?"":"none";
        document.Mana1.src='/i/misc/bk_life_beg_33.gif';
        var s = document.all("Mana").innerHTML;
        document.all("Mana").innerHTML = s.substring(0, s.lastIndexOf(':')+1) + Math.round(tkMana)+"/"+maxMana;
    }
    tkMana = (tkMana+(maxMana/1000)*mspeed/100);
    if (MTimerOn!=-1) {MTimerOn=setTimeout('setManalocal()', Mdelay*100);};
}
