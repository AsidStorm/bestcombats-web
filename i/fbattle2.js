combat_loaded = true;
var ranged = false; // ������������� ������
var cur_col = 0;    // ������� �������
var defend=false;   // ������
var enemy="";       // unused ? �����   // ������;
var myid="11";      // ?
var noattack = '';  // ?
var moves = new Array(); // ������ ������������ ����� - ������ ��-�� �����, ��������� (moves[attacks]) - ����

var atk_zones = '� ������,� �����,� �����,� ����(���),�� �����'.split(',');



function dv() {
    document.write('<TABLE cellspacing=1 width=100%><TD height=1 bgcolor=#b0b0b0></TABLE>');
}

var Blocks=new Array("���","������", "�����", "�����", "���� (���)", "����");

function draw_combat_info(legend, side){
  var s ='<img src="/i/1x1.gif" border=0 width="4" height=1>';
  if (!side) return;
  for (var i=1;i<=5;i++){
    s += '<img src="/i/combats/'+((3+(side & 1))*10 + legend[i])+'.gif" alt="" width="10" height="12" border="0" align="bottom">';
  }
  return s;
}

var adh_colors = new Array('#00FFAA', '#00EA9B', '#00EEFF', '#00D0EE');
var adh_styles = new Array('background-color: #00FFAA','background-color: #00d98f', 'background-color: #00EEFF', 'background-color: #00b0cc');
function adhs(a,d,tm,to){
  adh(a,d,tm,to,true);
}

// ��������� �����, ������ (������ ���), ����� (������ ��� ������ �����)
function adh(a,d,tm,to, highlite) {
    var s = "", s1 = "", legend = new Array(0,0,0,0,0,0);

    if (a > 0) { s1="�����: "+Blocks[a]+"<BR>"; legend[a] = 2;}
    var dd = (""+d).split('');

    for (i=0; i<dd.length; i++) {
        if (s) s+= (i == dd.length - 1) ? " � ": ", ";
        s+=Blocks[parseInt(dd[i])];
        legend[parseInt(dd[i])] += 1;
    }

    s = '������: ' + s;

    document.write("<SPAN style='' onmouseover='fastshow(\""+s1+s+"\"); this.style.textDecoration=\"underline\"' onmouseout='hideshow(); this.style.textDecoration=\"\"'>");
    if (tm) { // ����� ���������� - ������ ���� ������� ����� �(?) �������
        s = '<font class=date' + (highlite?'2':'') + '>' + tm + '</font>';
        if (to) s+=(draw_combat_info(legend, to));
        document.write(s+'</SPAN>');
        document.write(' ');
    } else if (tm=='') document.write('??:?? </SPAN> ');
}


var wait = true, reload = false;
function DrawDots(is_attack){
  var i, j, s = '<table border=0 cellspacing=0 cellpadding=0>';
  for (i=0; i < atk_zones.length; i++){
    s += '<tr><td nowrap>';
    if (is_attack){
        for (j = 0; j < attacks; j++){
if(j>0){kolatack=j;}else{kolatack='';}
            s += '<INPUT '+(top.autohit?'disabled':'')+' TYPE=radio' + noattack + ' NAME=attack'+kolatack+' value='+(i+1)+
                 ' id="r_' + j + '_' + i +'" onclick="set_move('+j+');">';}
        s += '<label id="lfa_' + i + '" for="r_0_' + i + '">���� ' + atk_zones[i] + '</label>';
    } else {
        s += '<INPUT '+(top.autohit?'disabled':'')+' TYPE=radio NAME=defend value='+(i+1)+
             ' id="r_' + attacks + '_' + i +'" onclick="set_move('+attacks+');">' +
             '<label for="r_' + attacks + '_' + i + '">���� ' + def_zones[i] + '</label>';
    }
    s += '</tr></tr>\n';
  }
  // if (is_attack )window.clipboardData.setData('Text',s);
  s += '</table>';
  document.getElementById('dots'+is_attack).innerHTML=s;
  //document.writeln(s);
  wait = false;
}

function Prv(logins)
{
    top.frames['bottom'].window.document.F1.text.focus();
    top.frames['bottom'].document.forms[0].text.value = logins + top.frames['bottom'].document.forms[0].text.value;
}

pos=0;
function AddTarget()
{   var o = window.event.srcElement;
    if (o.tagName == "SPAN") {
        var login=o.innerText;
        if (o.alt != null && o.alt.length>0) login=o.alt;
        eval('f1.attack'+pos+'.value=login');
        pos=(pos+1) % attacks;
    }
}

// ���������� ���
function set_move(col, n){
  moves[col] = n || 1;
  if (document.getElementById("f1t")){ // ����������� �� ��������
    var i;
    // ����������� ������� �������
    for (i=0; i<atk_zones.length;i++) document.getElementById("r_" + cur_col + '_' + i).style.backgroundColor = "transparent";
    // ���������� ����� ���� ����
    if (n) document.getElementById("r_" + cur_col + '_' + (n - 1)).checked = true;
    // ���������� ��������� �������
    cur_col = (col + 1) % (attacks + 1);
    // ���������� ��������� �������
    if (top.autogo && check(1)) form_submit();
    else for (i=0; i<atk_zones.length;i++){
            document.getElementById("r_" + cur_col + '_' + i).style.backgroundColor = "#CCCCCC";
            document.getElementById("lfa_" + i).htmlFor = "r_" + (cur_col < attacks ? cur_col:0) + '_' + i;
        }
  }
  if (top.autogo && check(1)) form_submit();
}

function check(ok){
  var silent = (ok == 1);
  if (ranged == 1){ // Backward combatibility (uncomplete)
    for (i=0; i<attacks; i++)
            if ( eval('f1.attack.value') == "" ) { if (!silent) errmess('���� �� ������.'); return false; }
  } else {
    for (var i=0; i<=attacks; i++){
        if (moves[i] == null){
            if (!silent) errmess(((i<attacks)? '����':'����') + ' �� ������.');
            return false;
        }
    }
  }
  return true;
}

function set_action () {
    var e = event;
    if (wait || reload) return;
    if (typeof attacks == 'undefined') {return;}
    if (((e.keyCode>=49 && e.keyCode<=53) || (e.keyCode>=97 && e.keyCode<=101)) && document.getElementById("f1t")) {
        set_move(cur_col, e.keyCode - ((e.keyCode>=97) ? 96: 48));
        wait = true; setTimeout('wait=false;', 75);
    }
    if (check(1) && cur_col ==attacks && document.getElementById("let_attack") && !document.getElementById("let_attack").disabled) document.getElementById("let_attack").focus();
    return;
}

function form_submit(){
    if (reload) return;
    reload = true;
    var id = setTimeout('document.f1.submit()', 150);
}

function setf(choise) {
    if (choise){
        set_move(attacks); moves[attacks] = null;// ������� ���
        if (document.getElementById("f1t")) document.getElementById("f1t").focus();
    } else if (document.getElementById("refreshb")) document.getElementById("refreshb").focus();
    return;
}

function setAutoGo(ok){
  if (top.autogo == ok) return true;
  top.autogo = ok;
  document.getElementById("let_attack").disabled = !!ok;
  if (check(1) && ok) form_submit();
  if (ok) {
    setautohit(!ok);
    document.f1.autohit.checked=false;
  }
  return true;
}

function checksubmit() {
  if (document.f1.autohit.checked) {
    var i=0;
    var attacks=0;
    while (i<document.f1.elements.length) {
      if (document.f1.elements[i].type=='radio') {
        document.f1.elements[i].disabled=false;
        if (document.f1.elements[i].name=='attack' && attacks<1) attacks=1;
        if (document.f1.elements[i].name=='attack1' && attacks<2) attacks=2;
        if (document.f1.elements[i].name=='attack2' && attacks<3) attacks=3;
        if (document.f1.elements[i].name=='attack3' && attacks<4) attacks=4;
        if (document.f1.elements[i].name=='attack4' && attacks<5) attacks=5;        
      }
      i++;
    }    
    i=0;
    while (i<attacks) {
      if (i==0) document.f1.elements['attack'][randhit()].checked=true;
      else document.f1.elements['attack'+i][randhit()].checked=true;
      i++;
    }
    document.f1.elements['defend'][randhit()].checked=true;
  }
  document.f1.submit();
}

function randhit() {
  return Math.floor(Math.random()*5);
}

function setautohit(ok){
  if (top.autohit == ok) return true;
  top.autohit = ok;
  if (ok) {
    setAutoGo(!ok);
    document.f1.autogo.checked=false;
    var i=0;
    while (i<document.f1.elements.length) {
      if (document.f1.elements[i].type=='radio') document.f1.elements[i].checked=false;
      if (document.f1.elements[i].type=='radio') document.f1.elements[i].disabled=true;
      i++;
    }
  } else {
    var i=0;
    while (i<document.f1.elements.length) {
      if (document.f1.elements[i].type=='radio') document.f1.elements[i].disabled=false;
      i++;
    }
  }
  return true;
}

function DrawRes(SP_HIT, SP_KRT, SP_CNTR, SP_BLK, SP_PRY, SP_HP, SP_SPR, spirit_level){
document.writeln('<TABLE width=238><tr>' +
        "<TD width=34 align=center><SMALL><IMG alt='���������� ����' width=8 height=8 src='/i/misc/micro/hit.gif'>" + SP_HIT + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='����������� ����' width=7 height=8 src='/i/misc/micro/krit.gif'>" + SP_KRT + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='����������� ���������' width=8 height=8 src='/i/misc/micro/counter.gif'>" + SP_CNTR + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='�������� ����' width=7 height=8 src='/i/misc/micro/block.gif'>" + SP_BLK + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='�������� �����������' width=8 height=8 src='/i/misc/micro/parry.gif'>" + SP_PRY + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='���������� ����' width=8 height=8 src='/i/misc/micro/hp.gif'>" + SP_HP + "</TD>" +
        "<TD width=34 align=center><SMALL><IMG alt='������� ���� (" + spirit_level + ")' width=7 height=8 src='/i/misc/micro/spirit.gif'>" + SP_SPR + "</TD>" +
        '</tr></TABLE>');
}

function DrawTrick(can_use, img,  txt, free_cast, dsc, resource, select_target, target, target_login, magic_type, name){

  var s = '';
  var rnd = Math.random();
  var res = resource.split(',');
  // 0=HIT, 1=KRT, 2=CNTR, 3=BLK, 4=PRY, 5=HP, 6=spirit, 7=mana, 8=cool_down, 9=cool_down_left, 10=limit, 11=limit_left, 12=startwait

  if (can_use){
    if (select_target){
        s += "<A style='cursor: pointer' onclick=\"tricklogin('</b>��������" +
             (target == 'friend' ? ' ������������� ����': (target == 'enemy' ? ' �����': (target == 'any'? ' ����':""))) +
             ' ��� ������ <b nobr nowrap>' + txt + "', 'fbattle.php', 'target',  '" + target_login + "', '" +
             magic_type + "', '<INPUT type=hidden name=special value=" + name+ ">'" + (free_cast?'':', 1') + ')">';
    } else {
//      s += free_cast ? '<A HREF="/fbattle.php?special=' + name + '&r=' + rnd + '">': "<A style='cursor: pointer' onclick=\"b_confirm('fbattle.php', '" + txt + "', '" + magic_type + "', '<INPUT type=hidden name=special value=" + name+ ">', 1)\">";
        s +=  '<A HREF="/fbattle.php?special=' + name + '&r=' + rnd + '">';

    }
  }

  s +=  '<IMG style="' + (can_use? 'cursor:pointer': " -moz-opacity:.70; opacity:.70;filter:gray(), Alpha(Opacity='70');") + '" width=40 height=25 '+ "src='i/priem/" + img+ ".gif'";
  if (txt){
    s+= "onmouseout='hideshow();' onmouseover='fastshow2(\"<B>" + txt + "</B><BR>" ;
    s+= (res[0]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/hit.gif\\"> '+ res[0] + '&nbsp;&nbsp;');
    s+= (res[1]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/krit.gif\\"> '+ res[1] + '&nbsp;&nbsp;');

    s+=  (res[2]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/counter.gif\\"> '+ res[2] + '&nbsp;&nbsp;');

    s+=  (res[3]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/block.gif\\"> '+ res[3] + '&nbsp;&nbsp;');
    s+=  (res[4]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/parry.gif\\"> '+ res[4] + '&nbsp;&nbsp;');
    s+=  (res[5]=='0'? '': '<IMG width=8 height=8 src=\\"/i/misc/micro/hp.gif\\"> '+ res[5] + '&nbsp;&nbsp;');
    s+=  (res[6] == '0' ? '': '<BR>���� ����: ' + res[6] ) ;
    s+=  (res[7] == '0' ? '': '<BR>������ ����: ' + res[7] ) ;
    s+=  (res[8] == '0' ? '': '<BR>��������: ' + res[8]        + (res[9] == '0' ? '' : ' (��� ' + res[9] + ")")) ;
    if (res[8]==0 && res[9]>0) s+='<BR>��������: ��� ' + res[9];
    s+=  (res[12] == '0' ? '': '<BR>��������� ��������: ' + res[12] ) ;
    s+=  (res[10] == '0' ? '': '<BR>�������������: ' + res[11] + '/' +res[10]);
    // + (res[11] == '' ? '' : ' (��� ' + res[11] + ")")) ;
    s+=  (free_cast? '': '<BR>&bull; ���� ������ ���') ;
    s+=  '<br><br>' +  dsc + "\", this, event)'" ;
  }
  s+= '>' + (can_use ? '</A><IMG SRC="Reg/1x1.gif" WIDTH="2" HEIGHT="1" BORDER=0 ALT="">': '<IMG SRC="Reg/1x1.gif" WIDTH="2" HEIGHT="1" BORDER=0 ALT="">');
//if (img=='wis_fire_incenerate10')window.clipboardData.setData('Text',s);
  document.write(s);
}

var alert_text = "������������ ����������� ����� ������ � Javascript. ���, ������ �����, ������� ������������� ���� ��������. "+
        "����������� �� ��������� ��� �������� ��� �����/�������� ������������/�����/������� ����� (�������� ����� ����������� ����� �������) � ��������� � ����";


function DrawButtons(script_alert){
  document.getElementById('buttons').innerHTML='<input type=checkbox name=autohit onmouseout=\'hideshow()\' onmouseover=\'fastshow2("�������������� ����� ��� ����� � �����",this, event)\' value=1 onclick="setautohit(this.checked);"'+(top.autohit?' checked':'')+'>'+
  '&nbsp;&nbsp;&nbsp;<input type=checkbox name=autogo value=1 onmouseout=\'hideshow()\' onmouseover=\'fastshow2("���� ��� ����������� ����",this, event)\' onclick="setAutoGo(this.checked);"'+(top.autogo?' checked':'')+'>' +
  '&nbsp;<INPUT TYPE=submit id="let_attack"' + (top.autogo ? ' disabled':'')+ ' value="������ !!!" onclick="this.disabled = true; checksubmit(); return false;">' +
  (script_alert?' <span title="' + alert_text +'"><b>(<font color=red>!</font>)</b></span>':'');
}

function hideshow(){document.getElementById("mmoves").style.visibility="hidden"}
function fastshow(a){var b=document.getElementById("mmoves"),d=window.event.srcElement;if(a!=""&&b.style.visibility!="visible")b.innerHTML="<small>"+a+"</small>";a=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop+5;b.style.left=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft+3+"px";b.style.top=a+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}

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

  var b=document.getElementById("mmoves");
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


var enblinking=0;
var timeactive=1;

function blinken() {
  if (document.getElementById('enemynick').style.color=='#003388') document.getElementById('enemynick').style.color='#ff0000'
  else document.getElementById('enemynick').style.color='#003388';
  setTimeout('blinken()',300);
}

function cleartmo() {
  timeactive=0;
}

function makeemptyhit() {
  top.frames['main'].document.emptyhit.submit();
}

function showtime(fname,lefttime,af) {
  if (timeactive==0) return;
  lefttime--;
  if (lefttime<10) {
    if (enblinking==0) {
      setTimeout('blinken()',300);
      enblinking=1;
    }
    document.getElementById(fname).style.color='#ff0000';
  }
  if (lefttime>0) setTimeout("showtime('"+fname+"',"+lefttime+",'"+af+"')",1000);
  else eval(af);
  sec=lefttime%60;
  min=Math.floor(lefttime/60);
  day=Math.floor(lefttime/86400);
  hour=Math.floor((lefttime/3600)-(day*86400/3600));
  if (sec<10) sec="0"+sec;
  if (min>60) min-=(Math.floor(min/60)*60);
  if (min==60) min=0;
  if (min<10) min="0"+min;
  ret='';
  if (hour>0) ret=hour+':';
  //if (hour>0 || min>0)
  ret+=min+':';
  ret+=sec;
  document.getElementById(fname).innerHTML=ret;
}

function note(title, script, name,coma,errk){
  var errkom=''; var com='';
  if (errk==1) { errkom='������ ������������ �������: /\:*?"<>|+%<br>'; com=coma}
  document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
  '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
  errkom+'</font>������� �����</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'" value="'+com+'"></TD><TD width=50%><INPUT TYPE="submit" value=" �� "></TD></TR></TABLE></FORM></td></tr></table>';
  document.all("hint3").style.visibility = "visible";
  document.all("hint3").style.left = 200;
  document.all("hint3").style.top = 60;
  document.all(name).focus();
  Hint3Name = name;
}
