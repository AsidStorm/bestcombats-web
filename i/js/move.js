function findlogin(title, script, name){
  document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
  '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><form action="'+script+'" method=POST><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2>'+
  'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" >> "></TD></TR></FORM></TABLE></td></tr></table>';
  document.all("hint3").style.visibility = "visible";
  document.all("hint3").style.left = 200;
  document.all("hint3").style.top = 100;
  document.all(name).focus();
  Hint3Name = name;
}

function closehint3(){
  document.all("hint3").style.visibility="hidden";
  Hint3Name='';
}

var solo_store;

function solo(n, name, instant) {
  if (instant!="" || check_access()==true) {
    window.location.href = '?goto='+n+'&rnd='+Math.random();
  } else if (name && n) {
    solo_store = n;
    var add_text = (document.getElementById('add_text') || document.createElement('div'));
    add_text.id = 'add_text';
    add_text.innerHTML = 'Вы перейдете в: <strong>' + name +'</strong> (<a href="#" onclick="return clear_solo();">отмена</a>)';
    document.getElementById('ione').parentNode.parentNode.appendChild(add_text);
  }
  return false;
}

function clear_solo () {
  document.getElementById('add_text').removeNode(true);
  solo_store = false;
  ch_counter_color('#00CC00');
  return false;
}

var from_map = false;

function imover(im) {
  if( im.filters ) {
    im.filters.Glow.Enabled=true;
  }
  if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
    from_map = true;
    if( document.getElementById('b' + im.id).runtimeStyle ) document.getElementById('b' + im.id).runtimeStyle.color = '#666666';
    from_map = false;
  }
}

function imout(im) {
  if( im.filters ) im.filters.Glow.Enabled=false;
  if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
    from_map = true;
    if( document.getElementById('b' + im.id).runtimeStyle ) document.getElementById('b' + im.id).runtimeStyle.color = document.getElementById('b' + im.id).style.color;
    from_map = false;
  }
}

function bimover (im) {
  if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
    from_map = true;
    imover(document.getElementById(im.id.substr(1)));
    from_map = false;
  }
}

function bimout (im) {
  if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
    from_map = true;
    imout(document.getElementById(im.id.substr(1)));
    from_map = false;
  }
}

function bsolo (im) {
  if (document.getElementById(im.id.substr(1))) {
    document.getElementById(im.id.substr(1)).click();
  }
  return false;
}


function fullfastshow(a,b,c,d,e,f){if(typeof b=="string")b=a.getElementById(b);var g=c.srcElement?c.srcElement:c,h=g;c=g.offsetLeft;for(var j=g.offsetTop;h.offsetParent&&h.offsetParent!=a.body;){h=h.offsetParent;c+=h.offsetLeft;j+=h.offsetTop;if(h.scrollTop)j-=h.scrollTop;if(h.scrollLeft)c-=h.scrollLeft}if(d!=""&&b.style.visibility!="visible"){b.innerHTML="<small>"+d+"</small>";if(e){b.style.width=e;b.whiteSpace=""}else{b.whiteSpace="nowrap";b.style.width="auto"}if(f)b.style.height=f}d=c+g.offsetWidth+10;e=j+5;if(d+b.offsetWidth+3>a.body.clientWidth+a.body.scrollLeft){d=c-b.offsetWidth-5;if(d<0)d=0}if(e+b.offsetHeight+3>a.body.clientHeight+a.body.scrollTop){e=a.body.clientHeight+ +a.body.scrollTop-b.offsetHeight-3;if(e<0)e=0}b.style.left=d+"px";b.style.top=e+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}function fullhideshow(a){if(typeof a=="string")a=document.getElementById(a);a.style.visibility="hidden";a.style.left=a.style.top="-9999px"}

function gfastshow(dsc, dx, dy) { fullfastshow(document, mmoves3, window.event, dsc, dx, dy); }

function ghideshow() { fullhideshow(mmoves3); }

function Down() {top.CtrlPress = window.event.ctrlKey}

document.onmousedown = Down;