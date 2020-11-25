var CtrlPress=false,doc=document;function info(a){for(a=a.replace("%","%25");a.indexOf("+")>=0;)a=a.replace("+","%2B");for(;a.indexOf("#")>=0;)a=a.replace("#","%23");for(;a.indexOf("?")>=0;)a=a.replace("?","%3F");CtrlPress?window.open("/zayavka.pl?logs=1&date=&filter="+a,"_blank"):window.open("/inf.pl?login="+a,"_blank")}doc.onmousedown=Down;function Down(){CtrlPress=window.event.ctrlKey}function NewErrorTrap(){return true}function errtrap(a){var b=window.onerror;window.onerror=NewErrorTrap;window.opener&&doc.write('<IMG SRC=/i/lock3.gif WIDTH=20 HEIGHT=15 ALT="Приватное сообщение" onclick="window.opener.top.AddToPrivate(\''+a+'\', true)" style="cursor:hand">');if(doc.log!=null)window.top.location="http://www.combats-2.ru/";window.onerror=b}
function fastshow(a){
  var b=doc.getElementById("mmoves");
  alert(window.event);
  d=window.event.srcElement;
  if(a!=""&&b.style.visibility!="visible")b.innerHTML="<small>"+a+"</small>";
  a=window.event.clientY+doc.documentElement.scrollTop+doc.body.scrollTop+5;b.style.left=window.event.clientX+doc.documentElement.scrollLeft+doc.body.scrollLeft+3+"px";b.style.top=a+"px";if(b.style.visibility!="visible")b.style.visibility="visible"
}

function fastshow2(a,d,e){
  var posx = 0;
  var posy = 0;
  if (!e) var e = window.event;
  if (e.pageX || e.pageY)
  {
    posx = e.pageX;
    posy = e.pageY;
  }
  else if (e.clientX || e.clientY)
  {
    posx = e.clientX + document.body.scrollLeft;
    posy = e.clientY + document.body.scrollTop;
  }

  var b=doc.getElementById("mmoves");
  //d=window.event.srcElement;
  if(a!="" && b.style.visibility!="visible") b.innerHTML="<small>"+a+"</small>";
  //a=window.event.clientY+doc.documentElement.scrollTop+doc.body.scrollTop+5;
  a=posy+5;
  //b.style.left=window.event.clientX+doc.documentElement.scrollLeft+doc.body.scrollLeft+3+"px";
  b.style.left=(posx+3)+"px";
  b.style.top=a+"px";
  if(b.style.visibility!="visible")
  b.style.visibility="visible"
}

  var gift=new Array("","","");function quoteString(a){a=a.replace(/\\/g,"\\\\");a=a.replace(/\'/g,"\\'");a=a.replace(/\"/g,'\\"');a=a.replace(/\n/g,"\\n");return"'"+a+"'"}function DrawGift(a,b,d,e,c,f,g,h){g='<IMG SRC="/i/items/'+a+'.gif" WIDTH='+g+" HEIGHT="+h+' style="cursor: hand;" ALT="';if(e)g+=e+"\n";c=c.replace(/клан /g,"клана ");if(c=="__hide")c="";g+=(c?gift[0]+c+gift[1]:gift[2])+'" onclick="HideGift();ShowGift('+quoteString(d)+", "+quoteString(a)+", "+b+", "+quoteString(e)+", "+quoteString(c)+", this.offsetTop"+(f?",'"+f+"'":"")+');">';doc.writeln(g)}function DG1(a,b,d,e,c,f){DrawGift(a,b,d,e,c,f,60,60)}function DG2(a,b,d,e,c,f){DrawGift(a,b,d,e,c,f,80,74)}function DF(a,b,d,e,c,f){DrawGift(a,b,d,e,c,f,60,60)}function quote_url(a){for(var b=Array("+"," ","#"),d=Array("%2B","+","%23"),e=0;e<b.length;++e)for(;a.indexOf(b[e])>=0;)a=a.replace(b[e],d[e]);return a}function ShowGift(a,b,d,e,c,f,g){var h=doc.getElementById("mgift"),i=window.event.srcElement;i=d&8?'<a href="http://capitalcity.combats.com/encicl/object/'+b+'.html" target=_blank>'+a+"</a>":d&2?'<a target=_blank href="/i/items/big/3d'+b+'.jpg">'+a+"</a>":a;if(h.style.visibility!="visible"){if(g)c=parseInt(g)?gift[0]+'<a target=_blank href="/inf.pl?'+g+'">'+c+"</a>"+gift[1]:gift[0]+'<a target=_blank href="http://capitalcity.combats.com/encicl/klan/'+g+'.html">'+c+"</a>"+gift[1];else if(c)c=gift[0]+(c=="Бойцовский Клуб"?"<b>"+c+"</b>":'<a target=_blank href="/inf.pl?login='+quote_url(c)+'">'+c+"</a>")+gift[1];c||(c=gift[2]);doc.getElementById("mgift_sign").innerHTML="<small>"+(e?e+"<br>":"")+c+"</small>";doc.getElementById("mgift_title").innerHTML="<small><b>"+i+"</b></small>";doc.getElementById("mgift_pict").innerHTML=d&6?'<img width=240 src="/i/items/'+(d&4?"middle/":"big/3d")+b+'.jpg" '+(d==5?"":" height=180")+'alt="'+a+'">':"<br><img src=/i/items/"+b+'.gif alt="'+a+'"><br><br>'}h.style.left="15px";h.style.top=f+"px";if(h.style.visibility!="visible")h.style.visibility="visible"}function hideshow(){doc.getElementById("mmoves").style.visibility="hidden"}function HideGift(){doc.getElementById("mgift").style.visibility="hidden"}function drawDivs(){doc.writeln('<div id="mmoves" style="background-color:#FFFFCC; z-index:100; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>');doc.writeln('<div id="mgift" style="background-color:#FFFFCC; z-index:99; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;">');doc.writeln('<table width=240 border=0 cellpadding=0 cellspacing=0><tr><td align=left id=mgift_title></td><td align=right><font color=red><a href="javascript:void(0);" onclick="HideGift(); return 0;"><b>x</b></a></font></td></tr><tr><td colspan=2><img src="/i/1x1.gif" alt="" width=240 height=1 border=0></td></tr><tr><td colspan=2 id=mgift_pict align=center bgcolor="#dedede"><td></tr><tr><td colspan=2 id=mgift_sign></td></tr></table></div>')}function DrawOnline(a,b){if(b==="online")doc.write("Персонаж сейчас находится в клубе.");else{doc.write("Персонаж не в клубе");a!=="hide"&&doc.write(", но был тут:<br/>"+CombatsUI.UTCMsec2PlainText(CombatsUI.UTCMsec2Moscow(a*1E3))+'<img src="/i/clok3_2.png" title="Время сервера" /><br/>('+LocalText.PeriodToText("ru",b-a,2,"ACC")+" назад)")}}var rnd=Math.random(),delay=18,redHP=0.33,yellowHP=0.66,TimerOn=-1,tkHP,maxHP,speed=100,mspeed=100;function setHP(a,b,d){tkHP=a;maxHP=b;if(TimerOn>=0){clearTimeout(TimerOn);TimerOn=-1}speed=d;setHPlocal()}function setHPlocal(){if(tkHP>maxHP){tkHP=maxHP;TimerOn=-1}else TimerOn=0;var a=Math.round(tkHP)+"/"+maxHP;a=120;var b=Math.round(a/maxHP*tkHP);a=a-b;if(doc.all("HP")){doc.HP1.width=b;doc.HP2.width=a;doc.HP2.display=a?"":"none";doc.HP1.src=tkHP/maxHP<redHP?"/i/misc/bk_life_red.gif":tkHP/maxHP<yellowHP?"/i/misc/bk_life_yellow.gif":"/i/misc/bk_life_green.gif";b=doc.all("HP").innerHTML;doc.all("HP").innerHTML=Math.round(tkHP)+"/"+maxHP}tkHP+=maxHP/100*speed/1E3;if(TimerOn!=-1)TimerOn=setTimeout("setHPlocal()",delay*100)}var Mdelay=18,MTimerOn=-1,tkMana,maxMana;function setMana(a,b,d){tkMana=a;maxMana=b;if(MTimerOn>=0){clearTimeout(MTimerOn);MTimerOn=-1}if(d<1)d=1;mspeed=d;setManalocal()}function setManalocal(){if(maxMana==0)return 0;if(tkMana>maxMana){tkMana=maxMana;MTimerOn=-1}else MTimerOn=0;var a=Math.round(tkMana)+"/"+maxMana;a=120;var b=Math.round(a/maxMana*tkMana);a=a-b;if(doc.all("Mana")){doc.Mana1.width=b;doc.Mana2.width=a;doc.Mana2.display=a?"":"none";doc.Mana1.src="/i/misc/bk_life_beg_33.gif";b=doc.all("Mana").innerHTML;doc.all("Mana").innerHTML=b.substring(0,b.lastIndexOf(":")+1)+Math.round(tkMana)+"/"+maxMana}tkMana+=maxMana/1E3*mspeed/100;if(MTimerOn!=-1)MTimerOn=setTimeout("setManalocal()",Mdelay*100)}