var Hint3Name = '';

step=0;
top.is_qlaunch = 0;
function errmess(s)
{
  messid.innerHTML='<B>'+s+'</B>';
  highlight();
}
function highlight()
{
  if (step) return(0);
  step=10;
  setTimeout(dohi,50);
}

function dohi()
{
  var hx=new Array(0,1,2,3,4,5,6,7,8,9,"A","B","C","D","E","F");
  step--;
  messid.style.color="#"+hx[Math.floor(15-step/2)]+((step&1)?"F":"8")+"0000";
  if (step>0) setTimeout(dohi,50);
}

function fixspaces(s)
{
  while (s.substr(s.length-1,s.length)==" ") s=s.substr(0,s.length-1);
  while (s.substr(0,1)==" ") s=s.substr(1,s.length);
  return(s);
}

// ���������, �������� �������, ��� ���� � �������
function findlogin(title, script, name, defaultlogin, mtype, addon, need_defend) {
    var s;

    if (need_defend && defend==false)    {
        defend = -1;
//      errmess("���� �� ������."); return false;
    }
    if (need_defend) {
        addon+="<INPUT type=hidden name='mdefend' value='"+defend+"'>";
        addon+="<INPUT type=hidden name='enemy' value='"+enemy+"'>";
        addon+="<INPUT type=hidden name='myid' value='"+myid+"'>";
    }

    s='<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><form action="'+script+'" method=POST name=slform><td colspan=2>'+
    '������� ����� ���������:<small><BR>(����� �������� �� ������ � ����)</TD></TR><TR><TD width=50% align=right style="padding-left:5"><INPUT style="width: 100%" TYPE="text" NAME="'+name+'" value="'+defaultlogin+'"></TD><TD width=50%><INPUT type=image SRC="#IMGSRC#" WIDTH="27" HEIGHT="20" BORDER=0 ALT="" onclick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);">'+(addon?addon:'')+'</TD></TR></FORM></TABLE>';
    s = crtmagic(mtype, title, s);

    document.all("hint4").innerHTML = s;
    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = document.body.scrollTop+50;
    document.all(name).focus();
    Hint3Name = name;
}

// ���������, �������� �������, ��� ���� � �������
function bank_open(ac_list, ac_def, skipz, name) {
    var ac =  ac_list.split(',');
    var s;
    var addon = '<INPUT type=hidden name="ac_open" value="' + Math.random() +'">';
    var hint = '�������� ���� � ������� ������';
    var title = '���� � �����';
    var opt = '<select name="num" size=0 style="width: 100px">';
    for (var i=0; i<ac.length; i++){
        opt += '<option value="' + ac[i] + '"' +((ac_def && (ac_def == ac[i]))?' selected':'')+ '>'+ ac[i] + '</option>';
    }
    opt += '</select>';
    //alert (opt);
    s='<table border=0 width=100% cellspacing="0" cellpadding="2" ><tr>'+
    '<form action="?" method="POST" name=slform>'+
    '<input type=hidden name=edit value=2>'+
    '<td colspan=2 align=center>'+ hint + '</TD></TR>' +
    '<TR><TD width=84% align=right style="padding-left:5">' + opt+ '&nbsp;<input style="width: 100px" type="password" name="psw" size="12" maxlength="30"></TD>' +
    '<TD width=16%><INPUT type=image SRC="#IMGSRC#" WIDTH="27" HEIGHT="20" BORDER=0 ALT="" >'+(addon?addon:'')+'</TD></TR></FORM></TABLE>';
    s = crtmagic('', title, s,"",skipz);
    if (!name) {name = "hint4"};

    document.all(name).innerHTML = s;
    document.all(name).style.visibility = "visible";
    if (!skipz) {
        document.all(name).style.left = 100;
        document.all(name).style.zIndex = 200;
        document.all(name).style.top = document.body.scrollTop+50;
    }
    document.all('num').focus();
    Hint3Name = 'num';



    for (var i=0; i<ac.length; i++){
        opt += '<option value="' + ac[i] + '"' +((ac_def && ac_def == ac[i])?' selected':'')+ '>'+ ac[i] + '</option>';
    }
    opt += '</select>';

}

function bank_info() {
    alert('� ��� ��� �������� ������. \n\n �� ������ �������: �� ������ ������� ���� � ����� ��,'+
        ' �� ������������ �����*\n\n* ������ �������: ������ �������.');
}

function bank_blocked(tm) {
    var s = '���� ����� ������������� (��� '+ tm + ').';
    alert(s);
}

function get_bank_pwd(){

}

function b_confirm(script, txt, mtype, addon, need_defend) {

    if (need_defend && defend==false)    {
        defend=-1
//      errmess("���� �� ������."); return false;
    }

    if (need_defend) {
        addon+="<INPUT type=hidden name='mdefend' value='"+defend+"'>";
        addon+="<INPUT type=hidden name='enemy' value='"+enemy+"'>";
        addon+="<INPUT type=hidden name='myid' value='"+myid+"'>";
    }

    dialogconfirm('�������������', '/battle.pl', '<TABLE width=100%><TD><B>'+txt+'</B><BR>������������ ������?</TABLE>'+addon, mtype);
}


function dialogconfirm(title, script, text, mtype) {
    var s;

    s='<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><form action="'+script+'" method=POST name=slform><td colspan=2>'+
    text+'</TD></TR><TR><TD width=50% align=left><INPUT TYPE="button" name="tmpname423" value="��" style="width:70%" onclick="if (!top.is_qlaunch) { slform.submit(); } else { top.QLaunchQuery(slform.use.value); closehint3(); } "></TD><TD width=50% align=right><INPUT type=button style="width:70%" value="���" onclick="closehint3();"></TD></TR></FORM></TABLE>';

    s = crtmagic(mtype, title, s);
    document.all("hint4").innerHTML = s;

    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = document.body.scrollTop+50;
    document.all("tmpname423").focus();
    Hint3Name = name;
}

function dialogOK(title, text, mtype) {
    var s;

    s='<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
    text+'</TD></TR><TR><TD width=100% align=right><INPUT type=button style="width:70%" value="�������" onclick="closehint3();"></TD></TR></FORM></TABLE>';

    s = crtmagic(mtype, title, s);
    document.all("hint4").innerHTML = s;
    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = document.body.scrollTop+50;
    Hint3Name = name;
}


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
// ��� �����. ���������, �������� �������, �������� �����, ����� ������ � �������, ����� �� ���������, �������� ���. ����
function magicklogin(title, script, magickname, n, defaultlogin, extparam, mtype) {
    var s = '<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><form action="'+script+'" method=POST name=slform><input type=hidden name="use" value="'+magickname+'"><input type=hidden name="n" value="'+n+'"><td colspan=2>'+
    '������� ����� ���������:<small><BR>(����� �������� �� ������ � ����)</TD></TR><TR><TD style="padding-left:5" width=50% align=right><INPUT TYPE="text" NAME="param" value="'+defaultlogin+'" style="width: 100%"></TD><TD width=50%><IMG SRC="#IMGSRC#" WIDTH="27" HEIGHT="20" BORDER=0 ALT="" onclick="slform.param.value=fixspaces(slform.param.value); if (!top.is_qlaunch) { slform.submit(); } else { top.QLaunchQuery(\'' + magickname + '\', slform.param.value); closehint3(); } " onmouseover="this.style.cursor = \'hand\';" onmouseout="this.style.cursor = \'\';"></TD></TR>';
    if (extparam != null && extparam != '') {
        s = s + '<TR><td style="padding-left:5">'+extparam+'<BR><INPUT style="width: 100%" TYPE="text" NAME="param2"></TD><TD></TR>';
    }
    s = s + '</FORM></TABLE>';
    s = crtmagic(mtype, title, s);
    document.all("hint4").innerHTML = s;
    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = document.body.scrollTop+50;
    document.all("param").focus();
    Hint3Name = 'param';
}

// �����
function UseMagick(title, script, name, extparam, n, extparam2, mtype) {
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
    document.all("hint4").innerHTML = s;
    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = document.body.scrollTop+50;
    document.all("param").focus();
    Hint3Name = 'param';
   } else {
        dialogconfirm('�������������', script, '<TABLE width=100%><TD><IMG src="/i/items/'+name+'.gif"></TD><TD>������������ ������?</TABLE>'+
        '<input type=hidden name="use" id="use" value="'+name+'"><input type=hidden name="n" value="'+n+'">', mtype);
   }
}

// ��������� ���� ����� ������
function closehint3()
{
    top.is_qlaunch = 0;
    document.all("hint4").style.visibility="hidden";
    Hint3Name='';
}

// ��� ������ �����. ���������, �������� �����, ����� ������ � �������
function Bmagicklogin (title, magickname, n, defaultlogin, extparam, mtype) {
    if (defend==false) {
        defend=-1;
//      errmess("���� �� ������."); return false;
    }

    var s = '<table border=0 width=100% cellspacing="0" cellpadding="2"><tr><form action="/battle.pl" method=POST name="bmagic" onsubmit="bmagic.mdefend.value=defend;"><input type=hidden name="use" value="'+magickname+'"><input type=hidden name="n" value="'+n+'"><input type=hidden name="mdefend" value="'+defend+'"><input type=hidden name="enemy" value="'+enemy+'"><input type=hidden name="myid" value="'+myid+'"><td colspan=2 align=left>'+
    '������� ����� ���������:<small><BR>(����� �������� �� ������ � ����)</TD></TR><TR><TD width=50% align=right><INPUT style="width: 100%" TYPE="text" id="param" NAME="param" value="'+defaultlogin+'"></TD><TD width=50%><INPUT type=image SRC="#IMGSRC#" WIDTH="27" HEIGHT="20" BORDER=0 ALT="" onclick="bmagic.param.value=fixspaces(bmagic.param.value);"></TD></TR>';
    if (extparam != null && extparam != '') {
        s = s + '<TR><td colspan=2>'+extparam+'<TR><TD style="padding-left:5"><INPUT style="width: 100%" TYPE="text" NAME="param2"><TD></TD></TR>';
    }
    s = s + '</FORM></TABLE>';
    s = crtmagic(mtype, title, s);

    document.all("hint4").innerHTML= s;
    document.all("hint4").style.visibility = "visible";
    document.all("hint4").style.left = 100;
    document.all("hint4").style.zIndex = 200;
    document.all("hint4").style.top = 60;
    document.all("param").focus();
    Hint3Name = 'param';
}

// �����
function BUseMagick(name, extparam, n, mtype) {
    if (defend==false)    {
        defend=-1;
//      errmess("���� �� ������."); return false;
    }

    if ((extparam != null)&&(extparam != '')) {
        var s = prompt(extparam+':', '');
        if ((s != null)&&(s != '')) {
            re = /\%/g; s=s.replace(re, "%25");
            re = /\+/g; s=s.replace(re, "%2B");
            re = /\#/g; s=s.replace(re, "%23");
            re = /\?/g; s=s.replace(re, "%3F");
            re = /\&/g; s=s.replace(re, "%26");
            window.location.href='/battle.pl?use='+name+'&param='+s+'&n='+n+'&mdefend='+defend+'&enemy='+enemy+'&myid='+myid;
        }
    } else {
        dialogconfirm('�������������', '/battle.pl', '<TABLE width=100%><TD><IMG src="/i/items/'+name+'.gif"></TD><TD>������������ ������?</TABLE>'+
        '<input type=hidden name="use" value="'+name+'"><input type=hidden name="n" value="'+n+'"><input type=hidden name="mdefend" value="'+defend+'"><input type=hidden name="enemy" value="'+enemy+'"><input type=hidden name="myid" value="'+myid+'">', mtype);
    }
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
