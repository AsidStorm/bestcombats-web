// selectlogin.js

var Hint3Name = '';

function fixspaces(s)
{
  while (s.substr(s.length-1,s.length)==" ") s=s.substr(0,s.length-1);
  while (s.substr(0,1)==" ") s=s.substr(1,s.length);
  return(s);
}

// Заголовок, название скрипта, имя поля с логином
function findlogin(title, script, name)
{
    document.all("hint3").innerHTML = '<table border=0 width=100% cellspacing="1" cellpadding="0" bgcolor="#CCC3AA"><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table border=0 width=100% cellspacing="0" cellpadding="2" bgcolor="#FFF6DD"><tr><form action="'+script+'" method=POST name=slform><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE="text" NAME="'+name+'"></TD><TD width=50%><INPUT type=image SRC="/i/b__ok.gif" WIDTH="25" HEIGHT="18" BORDER=0 ALT="" onclick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);"></TD></TR></FORM></TABLE></td></tr></table>';
    document.all("hint3").style.visibility = "visible";
    document.all("hint3").style.left = 100;
    document.all("hint3").style.top = 60;
    document.all(name).focus();
    Hint3Name = name;
}

// Для магии. Заголовок, название скрипта, название магии, номер вещицы в рюкзаке
function magicklogin(title, script, magickname, n)
{
    document.all("hint3").innerHTML = '<table border=0 width=100% cellspacing="1" cellpadding="0" bgcolor="#CCC3AA"><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table border=0 width=100% cellspacing="0" cellpadding="2" bgcolor="#FFF6DD"><tr><form action="'+script+'" method=POST name=slform><input type=hidden name="use" value="'+magickname+'"><input type=hidden name="n" value="'+n+'"><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE="text" NAME="param"></TD><TD width=50%><INPUT type=image SRC="/i/b__ok.gif" WIDTH="25" HEIGHT="18" BORDER=0 ALT="" onclick="slform.param.value=fixspaces(slform.param.value);"></TD></TR></FORM></TABLE></td></tr></table>';
    document.all("hint3").style.visibility = "visible";
    document.all("hint3").style.left = 100;
    document.all("hint3").style.top = 60;
    document.all("param").focus();
    Hint3Name = 'param';
}

// Закрывает окно ввода логина
function closehint3()
{
    document.all("hint3").style.visibility="hidden";
    Hint3Name='';
}

// Магия
function UseMagick(script, name, extparam, n) {
   if ((extparam != null)&&(extparam != '')) {
     var s = prompt(extparam+':', '');
     if ((s != null)&&(s != '')) {
       re = /\%/g; s=s.replace(re, "%25");
       re = /\+/g; s=s.replace(re, "%2B");
       re = /\#/g; s=s.replace(re, "%23");
       re = /\?/g; s=s.replace(re, "%3F");
       re = /\&/g; s=s.replace(re, "%26");
       window.location.href=script+'?use='+name+'&param='+s+'&n='+n;
     }
   } else {
     if (confirm('Использовать сейчас?')) { location=script+'?use='+name+'&n='+n; }
   }
}