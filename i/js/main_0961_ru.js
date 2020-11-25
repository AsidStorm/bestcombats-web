function DrawBar(title, id, flags, link_text, link){
  // alert(title + document);
  var s ='<table width="100%" border=0 cellspacing=0 cellpadding=1 background="/i/icon/back.gif">' +
         '<tr><td valign=top>';
  var sz = 11, num = 1;
  var rnd = Math.random();
  s += '<a name="bar__'+id+'" href="?edit='+rnd+'&bar='+id+'&a=explore&is_open='+(1-(flags & 1))+'#bar_'+id+'">';
  if (flags & 1) {
    s+= '<img width='+sz+' height=9 alt="Скрыть" border=0 src="/i/icon/'+num+'minus.gif">';
  } else {
    s+= '<img width='+sz+' height=9 alt="Показать" border=0 src="/i/icon/'+num+'plus.gif">';
  }
  s += '</a> </td>';
  s += '<td>&nbsp;</td><td bgcolor="#e2e0e0"><small>&nbsp;<b>'+title+':<b>&nbsp;</small></td>';
  if (link_text){
     s += '<td>&nbsp;</td><td bgcolor="#e2e0e0"><small>&nbsp;<a href="'+link+'">'+link_text+'</a>&nbsp;</small></td>';
  }
  s += '<td align=right valign=top width="100%">';
  if (!(flags&2)){
     s += '<a href="?edit='+rnd+'&bar='+id+'&a=up#bar_'+id+'"><img border=0 width='+sz+' height=9 alt="Поднять блок наверх" src="/i/icon/'+num+'up.gif"></a>';
  } else {
    s+= '<img border=0 width='+sz+' height=9 alt="" src="/i/icon/'+num+'up-grey.gif">';
  }
  if (!(flags&4)){
    s += '<a href="?edit='+rnd+'&bar='+id+'&a=down#bar_'+id+'"><img border=0 width='+sz+' height=9 alt="Опустить блок вниз" src="/i/icon/'+num+'down.gif"></a>';
  } else {
    s+= '<img border=0 width='+sz+' height=9 alt="" src="/i/icon/'+num+'down-grey.gif">';
  }
  s += ' </td>';
  s += '</tr></table>';
  // window.clipboardData.setData('Text', s);
  document.writeln(s);
}

function UseMagick(title, script, name, extparam, n, extparam2, mtype) {
   var image = name;
   var path = ('' + name).split('/');
   name = path[ path.length - 1 ];
   if ((extparam != null)&&(extparam != '')) {

    var t1='text',t2='text';

    if (extparam.substr(0,1) == "!")
    {
        t1='password';
        extparam=extparam.substr(1,extparam.length);
    }

    var s = '<table border=0 width=100% cellspacing="1" cellpadding="0"><TR><form action="'+script+'" method=POST name=slform><input type=hidden name="use" value="'+name+'"><input type=hidden name="n" value="'+n+'"><td colspan=2 align=left><NOBR><SMALL>'+
    extparam + ':</NOBR></TD></TR><TR><TD width=100% align=left style="padding-left:5"><INPUT tabindex=1 style="width: 100%" TYPE="'+t1+'" id="param" NAME="param" value=""></TD><TD width=10%><IMG SRC="#IMGSRC#" WIDTH="27" HEIGHT="20" BORDER=0 ALT="" tabindex=3 onclick="if (!top.is_qlaunch) { slform.submit(); } else { top.QLaunchQuery(\'' + name + '\', slform.param.value ' + ((extparam2 != null && extparam2 != '') ? ', slform.param2.value' : '') + ' ); closehint3(); } " onmouseover="this.style.cursor = \'hand\';" onmouseout="this.style.cursor = \'\';"></TD></TR>';
    if (extparam2 != null && extparam2 != '') {
        if (extparam2.substr(0,1) == "!")
        {
            t2='password';
            extparam2=extparam2.substr(1,extparam2.length);
        }
        s = s + '<TR><td colspan=2><NOBR><SMALL>'+extparam2+':</NOBR><TR style="padding-left:5"><TD><INPUT tabindex=2 TYPE="'+t2+'" id="param2" NAME="param2" style="width: 50%"></TD><TD></TR>';
    }
    s += '</FORM></TABLE>';
    s = crtmagic(mtype, title, s);
    document.all("hint3").innerHTML = s;
    document.all("hint3").style.visibility = "visible";
    document.all("hint3").style.left = 100;
    document.all("hint3").style.zIndex = 200;
    document.all("hint3").style.top = document.body.scrollTop+50;
    document.all("param").focus();
    Hint3Name = 'param';
   } else {
        dialogconfirm('Подтверждение', script, '<TABLE width=100%><TD><IMG src="/i/sh/'+image+'"></TD><TD>Использовать сейчас?</TABLE>'+
        '<input type=hidden name="use" id="use" value="'+name+'"><input type=hidden name="n" value="'+n+'">', mtype);
   }
}

function dialogconfirm(title, script, text, mtype) {
    var s;
    s='<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><form action="'+script+'" method=POST name=slform><td colspan=2>'+
    text+'</TD></TR><TR><TD width=50% align=left><INPUT TYPE="button" name="tmpname423" value="Да" style="width:70%" onclick="if (!top.is_qlaunch) { slform.submit(); } else { top.QLaunchQuery(slform.use.value); closehint3(); } "></TD><TD width=50% align=right><INPUT type=button style="width:70%" value="Нет" onclick="closehint3();"></TD></TR></FORM></TABLE>';

    s = crtmagic(mtype, title, s);
    document.all("hint3").innerHTML = s;

    document.all("hint3").style.visibility = "visible";
    document.all("hint3").style.left = 200;
    document.all("hint3").style.top = 100;
    document.all("tmpname423").focus();
    Hint3Name = name;
}

var sd4 = 0;
function foundmagictype (mtypes) {
    if (mtypes) {
        mtypes=mtypes+"";
        if (mtypes.indexOf(',') == -1) return parseInt(mtypes);
        var s=mtypes.split(',');
        var found=0;
        var doubl=0;
        var maxfound=0;

        for (i=0; i < s.length; i++) {
            var k=parseInt(s[i]);
            if (k > maxfound) {
                found=i + 1;
                maxfound=k;
                doubl=0;
            } else {
                if (k == maxfound) {doubl=1;}
            }
        }
        if (doubl) {return 0};

        return found;
    }
    return 0;
}


function crtmagic(mtype, title, body, subm, noclose) {
    return crtmagic_full(mtype, title, body, subm, noclose, 270, 0);
}
function crtmagic_full(mtype, title, body, subm, noclose, dx, dy) {
//name, XYX, X1-X2-Y2, pad.LRU
    mtype=foundmagictype(mtype);

var names=new Array(
'neitral',17, 6, 14, 17, 14, 7,0,0, 3,
'fire', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'water', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'air', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'earth', 57,30, 33, 20, 21, 14, 11, 12, 0,
'white', 51, 25, 46, 44, 44, 10, 5, 5, 0,
'gray', 51, 25, 46, 44, 44, 10, 5, 5, 0,
'black', 51, 25, 46, 44, 44, 10, 5, 5, 0);
var colors=new Array('B1A993','DDD5BF', 'ACA396','D3CEC8', '96B0C6', 'BDCDDB', 'AEC0C9', 'CFE1EA', 'AAA291', 'D5CDBC', 'BCBBB6', 'EFEEE9', '969592', 'DADADA', '72726B', 'A6A6A0');

while (body.indexOf('#IMGSRC#')>=0) body = body.replace('#IMGSRC#', '/i/misc/dmagic/'+names[mtype*10]+'_30.gif');
var s='<table width="'+dx+(dy?'" height="'+dy:'')+'" border="0" align="center" cellpadding="0" cellspacing="0">'+
    '<tr>'+
    '<td width="100%">'+
    '<table width="100%"  border="0" cellspacing="0" cellpadding="0">'+
    '<tr><td>'+
        '<table width="100%" border="0" cellpadding="0" cellspacing="0">'+
        '<tr>'+
        '<td width="'+names[mtype*10+1]+'" align="left"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_03.gif" width="'+names[mtype*10+1]+'" height="'+names[mtype*10+2]+'"></td>'+
        '<td width="100%" align="right" background="/i/misc/dmagic/b'+names[mtype*10]+'_05.gif"></td>'+
        '<td width="'+names[mtype*10+3]+'" align="right"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_07.gif" width="'+names[mtype*10+3]+'" height="'+names[mtype*10+2]+'"></td>'+
        '</tr>'+
        '</table></td>'+
    '</tr>'+
    '<tr><td>'+
        '<table width="100%" border="0" cellspacing="0" cellpadding="0">'+
        '<tr>'+
            (names[mtype*10+7]?'<td width="'+names[mtype*10+7]+'"><SPAN style="width:'+names[mtype*10+7]+'">&nbsp;</SPAN></td>':'')+
            '<td width="5" background="/i/misc/dmagic/b'+names[mtype*10]+'_17.gif">&nbsp;</td>'+
            '<td width="100%">'+
            '<table width="100%" border="0" cellspacing="0" cellpadding="0">'+
            '<tr><td bgcolor="#'+colors[mtype*2]+'"'+(names[mtype*10+9]?' style="padding-top: '+names[mtype*10+9]+'"':'')+' >'+
            '<table border=0 width=100% cellspacing="0" cellpadding="0"><td style="padding-left: 20" align=center><B>'+title+
            '</td><td width=20 align=right valign=top style="cursor: hand" '+(noclose?'':'onclick="closehint3();" ') + 'style=\'filter:Gray()\' onmouseover="this.filters.Gray.Enabled=false" onmouseout="this.filters.Gray.Enabled=true"><IMG src="/i/clear.gif" width=13 height=13>&nbsp;</td></table>'+
            '</td></tr>'+
            '<tr>'+
                '<td align="center" bgcolor="#'+colors[mtype*2+1]+'">'+body+
            '</tr>'+
            '</table></td>'+
            '<td width="5" background="/i/misc/dmagic/b'+names[mtype*10]+'_19.gif">&nbsp;</td>'+
            (names[mtype*10+8]?'<td width="'+names[mtype*10+8]+'"><SPAN style="width:'+names[mtype*10+8]+'">&nbsp;</SPAN></td></td>':'')+
            '</tr>'+
        '</table></td>'+
    '</tr>'+
    '<tr><td>'+
        '<table width="100%"  border="0" cellpadding="0" cellspacing="0">'+
        '<tr>'+
            '<td width="'+names[mtype*10+4]+'" align="left"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_27.gif" width="'+names[mtype*10+4]+'" height="'+names[mtype*10+6]+'"></td>'+
            '<td width="100%" align="right" background="/i/misc/dmagic/b'+names[mtype*10]+'_29.gif"></td>'+
            '<td width="'+names[mtype*10+5]+'" align="right"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_31.gif" width="'+names[mtype*10+5]+'" height="'+names[mtype*10+6]+'"></td>'+
        '</tr>'+
        '</table></td>'+
    '</tr>'+
    '</table></td>'+
'</tr>'+
'</table>';

    return s;
}
