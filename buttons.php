<?php
$djs=array();
  header ("Content-type: text/html; charset=windows-1251");
    session_start();
    if (@$_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $user = mysqli_fetch_array(db_query("SELECT id,level,vip,align,deal,radiodj,login,klan FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    header("Cache-Control: no-cache");
    $inclan=mqfa1("select klan from users where id='$_SESSION[uid]'");

if ($_GET['ch'] != null){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<HTML>
	<HEAD>
		<link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
		<meta http-equiv="Content-type" content="text/html; charset=windows-1251">
		<SCRIPT LANGUAGE="JavaScript" SRC="<?=IMG_PATH?>/js/ch.js"></SCRIPT>
		<SCRIPT LANGUAGE="JavaScript" SRC="<?=IMG_PATH?>/js/sl2.js"></SCRIPT>
                <script LANGUAGE="JavaScript">
        <!--
        function showItem(url)
        {
        window.open(url,'newwin','top=15, left=20, menubar=0, toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, width=500, height=600');
        }
        </SCRIPT>
        <style type="text/css">


.hoversmile{
}

a.hoversmile:hover {
    background-color:gray;
}

.ssm-smile {
   width:400px;
   height:140px;
   background-color:#f2f0f0;
   text-align: center;
   border: 2px groove black;
  opacity: 0.8; filter: alpha (opacity=80);
}
.ssm-smile-title {
  height:10px;
  font-size:120%;
  FONT-FAMILY:Tahoma;
  background:url(<?=IMG_PATH?>/buttons/smilestitle.gif);
}
.ssm-smile-body {
  padding: 5px;
  overflow-y:scroll;
  height: 110px;
}

.menu {
  background-color: #d2d0d0;
  border-color: #ffffff #626060 #626060 #ffffff;
  border-style: solid;
  border-width: 1px;
  position: absolute;
  left: 0px;
  top: 0px;
  visibility: hidden;
}

.menuItem {
  border: 0px solid #000000;
  color: #003388;
  display: block;
  font-family: MS Sans Serif, Arial, Tahoma,sans-serif;
  font-size: 8pt;
  font-weight: bold;
  padding: 2px 12px 2px 8px;
  text-decoration: none;
  cursor:pointer;
}

.menuItem:hover {
  background-color: #a2a2a2;
  color: #0066FF;
}

span {
  FONT-SIZE: 10pt;
  FONT-FAMILY: Verdana, Arial, Helvetica, Tahoma, sans-serif;
  text-decoration: none;
  FONT-WEIGHT: bold;
  cursor: pointer;
}

.my_clip_button {   border: 0px solid #000000;
  color: #003388;
  display: block;
  font-family: MS Sans Serif, Arial, Tahoma,sans-serif;
  font-size: 8pt;
  font-weight: bold;
  padding: 2px 12px 2px 8px;
  text-decoration: none; }
.my_clip_button.hover { background-color: #a2a2a2; color: #0066FF; }
.actbt
{
    cursor: default; font-size: 10pt; color: #000; font-weight: bold;  height: 18px; text-align: center; font-family: Arial; top: 0px; background-image: url(test/active_bg.gif);
}
.nactbt
{
    cursor: default; font-size: 10pt; height: 18px; color: #fff; text-align: center; font-family: Arial; top: 0px; background-image: url(test/nonact_bg.gif);
}

</style>
<SCRIPT>
function S(name){
    var sData = top.frames['bottom'].window.document;
    sData.F1.text.focus();
    sData.F1.text.value = sData.F1.text.value + ':'+name+': ';
}

function SSm(name){
        ssminput=top.frames['bottom'].document.getElementById('ssmtext');
        ssminput.focus();
        ssminput.value+=':'+name+': ';
}
function clickbut(but_name) {
        document.getElementById('td_sys').style.backgroundImage = "url(<?=IMG_PATH?>/buttons/nonact_bg.gif)";
        document.getElementById('td_sys').style.color = "#ffffff";
        document.getElementById('td_sys').style.fontWeight = "normal";
        document.getElementById('td_all').style.backgroundImage = "url(<?=IMG_PATH?>/buttons/nonact_bg.gif)";
        document.getElementById('td_all').style.color = "#ffffff";
        document.getElementById('td_all').style.fontWeight = "normal";
        document.getElementById('td_log').style.backgroundImage = "url(<?=IMG_PATH?>/buttons/nonact_bg.gif)";
        document.getElementById('td_log').style.color = "#ffffff";
        document.getElementById('td_log').style.fontWeight = "normal";
        document.getElementById('td_clan').style.backgroundImage = "url(<?=IMG_PATH?>/buttons/nonact_bg.gif)";
        document.getElementById('td_clan').style.color = "#ffffff";
        document.getElementById('td_clan').style.fontWeight = "normal";


    document.getElementById('ch1').innerHTML = "<img src=<?=IMG_PATH?>/buttons/nonact_left.gif>";
    document.getElementById('ch2').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_0.gif>";
    document.getElementById('ch3').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_0.gif>";
    document.getElementById('ch4').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_0.gif>";
    document.getElementById('ch7').innerHTML = "<img src=<?=IMG_PATH?>/buttons/nonact_right.gif>";

    if (but_name == 'all') {
      document.getElementById('ch1').innerHTML = "<img src=<?=IMG_PATH?>/buttons/active_left.gif>";
      document.getElementById('ch2').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_l.gif>";
      document.getElementById('mes_sys').style.display = "none";
      document.getElementById('mes').style.display = "inline";
      document.getElementById('logs').style.display = "none";
      document.getElementById('mes_clan').style.display = "none";
    } else if (but_name == 'sys')  {
      document.getElementById('ch2').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_r.gif>";
      if (document.getElementById('td_log').style.display=='none') {
        document.getElementById('<?
          if ($inclan) echo "ch4"; else echo "ch7";
        ?>').innerHTML = "<img src=<?=IMG_PATH?>/buttons/<?
          if ($inclan) echo "a_l"; else echo "active_right";
        ?>.gif>";        
      } else {
        document.getElementById('<?
          if ($inclan) echo "ch4"; else echo "ch3";
        ?>').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_l.gif>";
      }
      document.getElementById('mes').style.display = "none";
      document.getElementById('mes_sys').style.display = "inline";
      document.getElementById('logs').style.display = "none";
      document.getElementById('mes_clan').style.display = "none";
    } else if (but_name == 'log')  {
      document.getElementById('ch3').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_r.gif>";
      document.getElementById('ch7').innerHTML = "<img src=<?=IMG_PATH?>/buttons/active_right.gif>";
      document.getElementById('mes').style.display = "none";
      document.getElementById('mes_sys').style.display = "none";
      document.getElementById('logs').style.display = "inline";
      document.getElementById('mes_clan').style.display = "none";
    } else if (but_name == 'clan')  {
      document.getElementById('ch4').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_r.gif>";
      if (document.getElementById('td_log').style.display=='none') {
        document.getElementById('ch7').innerHTML = "<img src=test/active_right.gif>";
      } else {
        document.getElementById('ch3').innerHTML = "<img src=<?=IMG_PATH?>/buttons/a_l.gif>";
      }
      document.getElementById('mes').style.display = "none";
      document.getElementById('mes_sys').style.display = "none";
      document.getElementById('mes_clan').style.display = "inline";
      document.getElementById('logs').style.display = "none";
    }

                                       
    document.getElementById('td_' + but_name).style.backgroundImage = "url(<?=IMG_PATH?>/buttons/active_bg.gif)";
    document.getElementById('td_' + but_name).style.color = "#000000";
    document.getElementById('td_' + but_name).style.fontWeight = "bold";
  if (but_name == 'log') window.scrollTo(0,0);
  else window.scrollBy(0,10000);
}

</SCRIPT>
    </head>
        <body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 bgcolor=#eeeeee onload="top.RefreshChat()">
<div style="z-index:100; position: fixed; top: 0px; right: 0px;"><table border=0 cellspacing=0 cellpadding=0><tr>
<td style="width:10px"><div id="ch1"><img src="<?=IMG_PATH?>/buttons/active_left.gif"></div></td>
<td style="width:38px" valign="top"><div class="actbt" id="td_all" onclick="clickbut('all');">Чат</div>
</td>
<td style="width: 10px;"><div id="ch2" ><img src="<?=IMG_PATH?>/buttons/a_l.gif"></div></td>
<td style="width:160px;" valign="top"><div class="nactbt" id="td_sys" onclick="clickbut('sys');">Системные&nbsp;сообщения</div></td>
<td style="width:10px;<? if (!$inclan) echo "display:none"; ?>"><div id="ch4" ><img src="<?=IMG_PATH?>/buttons/a_0.gif"></div></td>
<td style="<? if (!$inclan) echo "display:none"; else echo "width:80px"; ?>" valign="top"><div class="nactbt" id="td_clan" onclick="clickbut('clan');">Клан-чат</div></td>
<td style="display:none;width:10px" id="ch3"><img src="<?=IMG_PATH?>/buttons/a_0.gif"></td>
<td valign="top"><div style="display:none;width:50px" id="td_log" class="nactbt" onclick="clickbut('log');" valign="top">Лог&nbsp;боя</div>
</td>
<td valign="top"><div style="display:none;width:50px" id="td_log" class="nactbt" onclick="clickbut('log');" valign="top">Лог&nbsp;боя</div>
</td>
<td>
<div id="ch7"><img src="<?=IMG_PATH?>/buttons/nonact_right.gif"></div>
</td></tr></table></div>


<div id="mes" style="visibility:visible; width:100%; z-index:0; top:25px; left:0px; position:absolute;padding-bottom:5px">

<?php
include ('newdata.php');
if (isset($news[date('d.m.y')])) {
    echo '<br><font color="#FF0000"><b>Последние обновления (' . date('d.m.y') . '):</b> ' . $news[date('d.m.y')] . '</font>';
} elseif (isset($news[date('d.m.y', strtotime('-1 day'))])) {
    echo '<br><font color="#FF0000"><b>Последние обновления (' . date('d.m.y', strtotime('-1 day')) . '):</b> ' . $news[date('d.m.y', strtotime('-1 day'))] . '</font>';
} else {
    echo ' <p><center><font color="ff0000"><B>FAQ</B></font>&nbsp;<a href="http://bestcombats.net/forum.php?topic=8417&konftop=13"target="_blank">Информация для новичков</a>&nbsp;<font color="ff0000"><B>FAQ</B></font></p></font></center>';
	echo ' <center><i>Игра будет постоянно развиваться и дополняться!</i></center>';
}
echo '<br>';

$lplist = db_query("SELECT * FROM `iplog` WHERE `owner` = '{$user['id']}' ORDER by `id` DESC LIMIT 1;");
$ind=0;
        while ($iplog = mysqli_fetch_array($lplist)) {
          $ind++;
          $dat=date("m.d.y H:i",$iplog['date']);
          $ip=$iplog['ip'];
    echo '<font color="#FF0000"><b>Внимание! </b></font>В предыдущий раз этим персонажем заходили с IP:&nbsp;' . $ip . ' &nbsp;&nbsp; <br>';
}


?>

</div>
<div id="mes_sys" style="visibility:visible; width:100%; z-index:0; top:18px; left:0px; position:absolute; display:none;padding-bottom:5px"></div>
<div id="mes_clan" style="visibility:visible; width:100%; z-index:0; top:18px; left:0px; position:absolute; display:none;padding-bottom:5px"></div>
<div id="logs" style="visibility:visible; width:100%; z-index:0; top:18px; left:0px; position:absolute; display:none;padding-bottom:5px;padding-top:10px"></div>
<DIV ID="oMenu"  onmouseout="closeMenu()" style="position:absolute; border:1px solid #666; background-color:#CCC; display:none; "></DIV>
<DIV ID="oMenu"  onmouseout="closeMenu()" style="position:absolute; border:1px solid #666; background-color:#CCC; display:none; "></DIV>
<?php
    } else {
  if((int)date("H") > 5 && (int)date("H") < 22) $now="day";
  else $now="night";
  if (date("H") <=5) {
    $tme=mktime(6, 1,0);
  } elseif (date("H")<22) {
    $tme=mktime(22, 1,0);
  } else {
    $tme=mktime (6, 1, 0, date("n"), date("j")+1,0);
  }
  $left=$tme-time();
?>
<HTML><HEAD><link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
<script>
function refr() {
  if (document.F1.text.value=='') {
document.location.href='<? echo htmlspecialchars($_SERVER["PHP_SELF"])?>?<?=time()?>';
  } else {
    setTimeout('refr()',1000);
  }
}
setTimeout('refr()',<?=($left*1000)?>);
</script>
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<SCRIPT LANGUAGE="JavaScript">
top.ChatTranslit = false;

var map_en = new Array('s`h','S`h','S`H','s`Х','sh`','Sh`','SH`',"'o",'yo',"'O",'Yo','YO','zh','w','Zh','ZH','W','ch','Ch','CH','sh','Sh','SH','e`','E`',"'u",'yu',"'U",'Yu',"YU","'a",'ya',"'A",'Ya','YA','a','A','b','B','v','V','g','G','d','D','e','E','z','Z','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','r','R','s','S','t','T','u','U','f','F','h','H','c','C','`','y','Y',"'")
var map_ru = new Array('сх','Сх','СХ','сХ','щ','Щ','Щ','ё','ё','Ё','Ё','Ё','ж','ж','Ж','Ж','Ж','ч','Ч','Ч','ш','Ш','Ш','э','Э','ю','ю','Ю','Ю','Ю','я','я','Я','Я','Я','а','А','б','Б','в','В','г','Г','д','Д','е','Е','з','З','и','И','й','Й','к','К','л','Л','м','М','н','Н','о','О','п','П','р','Р','с','С','т','Т','у','У','ф','Ф','х','Х','ц','Ц','ъ','ы','Ы','ь')

function convert(str)
{   for(var i=0;i<map_en.length;++i) while(str.indexOf(map_en[i])>=0) str = str.replace(map_en[i],map_ru[i]);
    return str;
}

function send(adm) {

document.write(adm); }

function translate() {
    var strarr = new Array();
    strarr = document.F1.text.value.split(' ');
    for(var k=0;k<strarr.length;k++) {
        if(strarr[k].indexOf("http://") < 0 && strarr[k].indexOf('@') < 0 && strarr[k].indexOf("www.") < 0 && !(strarr[k].charAt(0)==":" && strarr[k].charAt(strarr[k].length-1)==":")) {
            if ((k<strarr.length-1)&&(strarr[k]=="to" || strarr[k]=="private")&&(strarr[k+1].charAt(0)=="[")) {
                while ( (k<strarr.length-1) && (strarr[k].charAt(strarr[k].length-1)!="]") ) k++;
            } else { strarr[k] = convert(strarr[k]) }
        }
    }
    document.F1.text.value = strarr.join(' ');
}


function sw_translit()
{
   top.ChatTranslit = ! top.ChatTranslit;
   if (top.ChatTranslit) {
       document.all('b___translit').src = b___translit_on.src;
       document.all('b___translit').alt = b___translit_on.alt;
   } else {
       document.all('b___translit').src = b___translit_off.src;
       document.all('b___translit').alt = b___translit_off.alt;
   }
}


function sw_filter()
{
   top.ChatOm = ! top.ChatOm;
   if (top.ChatOm) {
       document.all('b___filter').src = b___filter_on.src;
       document.all('b___filter').alt = b___filter_on.alt;
       document.F1.om.value = '1';
   } else {
       document.all('b___filter').src = b___filter_off.src;
       document.all('b___filter').alt = b___filter_off.alt;
       document.F1.om.value = '';
   }
}

function sw_sys()
{
   top.ChatSys = ! top.ChatSys;
   if (top.ChatSys) {
       document.all('b___sys').src = b___sys_on.src;
       document.all('b___sys').alt = b___sys_on.alt;
       document.F1.sys.value = '1';
   } else {
       document.all('b___sys').src = b___sys_off.src;
       document.all('b___sys').alt = b___sys_off.alt;
       document.F1.sys.value = '';
   }
}

function sw_slow()
{
   if (top.ChatSlow) {
     if (top.ChatTimerID >= 0 && 0) { // выключаем чат
         top.StopRefreshChat();
         document.all('b___slow').src = b___chat_off.src; document.all('b___slow').alt = b___chat_off.alt;
     } else { // Запускаем чат на нормальную скорость
         top.ChatSlow = false;
         top.ChatDelay=top.ChatNormDelay;
         top.RefreshChat();
         document.all('b___slow').src = b___slow_off.src; document.all('b___slow').alt = b___slow_off.alt;
     }
   } else { // замедляем чат
     top.ChatSlow = true;
     document.all('b___slow').src = b___slow_on.src; document.all('b___slow').alt = b___slow_on.alt;
     top.ChatDelay=top.ChatSlowDelay;
     top.RefreshChat();
   }
}

function subm()
{
if (top.ChatTranslit) translate();
}

var b___translit_on = new Image; b___translit_on.src="<?=IMG_PATH?>/buttons/b___translit_on.gif"; b___translit_on.alt="(включено) Преобразовывать транслит в русский текст";
var b___translit_off = new Image; b___translit_off.src="<?=IMG_PATH?>/buttons/b___translit_off.gif"; b___translit_off.alt="(выключено) Преобразовывать транслит в русский текст";
var b___filter_on = new Image; b___filter_on.src="<?=IMG_PATH?>/buttons/b___filter_on.gif"; b___filter_on.alt="(включено) Показывать в чате только сообщения адресованные мне";
var b___filter_off = new Image; b___filter_off.src="<?=IMG_PATH?>/buttons/b___filter_off.gif"; b___filter_off.alt="(выключено) Показывать в чате только сообщения адресованные мне";
var b___sys_on = new Image; b___sys_on.src="<?=IMG_PATH?>/buttons/b___sys_on.gif"; b___sys_on.alt="(включено) Показывать в чате системные сообщения";
var b___sys_off = new Image; b___sys_off.src="<?=IMG_PATH?>/buttons/b___sys_off.gif"; b___sys_off.alt="(выключено) Показывать в чате системные сообщения";
var b___slow_on = new Image; b___slow_on.src="<?=IMG_PATH?>/buttons/b___slow_on.gif"; b___slow_on.alt="(включено) Медленное обновление чата (раз в минуту)";
var b___slow_off = new Image; b___slow_off.src="<?=IMG_PATH?>/buttons/b___slow_off.gif"; b___slow_off.alt="(выключено) Медленное обновление чата (раз в минуту)";
var b___chat_off = new Image; b___chat_off.src="<?=IMG_PATH?>/buttons/b___chat_off.gif"; b___chat_off.alt="Обновление чата выключено!";


function IsIE(elem){ //также эта функция есть выше
    //----------IE,FF,Opera----------------------------no support Safari, Chrome
    ss=top.frames['chat'].document.getElementById('mes').offsetHeight;
    if (ss>0 && (ss-140)>0) ss-=144;
        elem.style.position = 'absolute';
    elem.style.top=ss+'px';
}


function rslength() // изменяет размер строки ввода текста
{
    var size = document.body.clientWidth-(2*30)-31-59-256-18-30-30;
if (size<100) { size=100 }
document.F1.text.width = size;
document.all('T2').width = size;
}


function clearc()
{
    if (document.forms[0].text.value == '') {
        if(confirm('Очистить окно чата?')) {
          top.frames['chat'].document.all("mes").innerHTML='';
          top.frames['chat'].document.all("mes_sys").innerHTML='';
        }
    } else { document.F1.text.value=''; }

    document.F1.text.focus();
}

window.onresize=rslength;

</SCRIPT>

<script language="VBScript">
sub flashsound_FSCommand(byval command, byval args)
call flashsound_DoFSCommand(command, args)
end sub
</script>

<SCRIPT language=JavaScript>
function flashsound_DoFSCommand(command, args) {
    top.frames['bottom'].document.getElementById('soundM').innerHTML='';
}

function SoundB(){
    if (top.SoundOff==true)
        top.frames['bottom'].document.getElementById('but_sound').src='<?=IMG_PATH?>/buttons/zvuk.gif';
    else top.frames['bottom'].document.getElementById('but_sound').src='<?=IMG_PATH?>/buttons/zvuk_off.gif';
    top.SoundOff=!top.SoundOff;
}
</SCRIPT>



</HEAD>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 bgcolor=#E6E6E6 onload="top.strt(); rslength();" onfocus="document.forms[0].text.focus()">
<FORM action="ch.php" target="refreshed" method=GET name="F1" onsubmit="subm(); top.NextRefreshChat();">
<INPUT TYPE="hidden" name="color" value="000000">
<INPUT TYPE="hidden" name="sys" value="">
<INPUT TYPE="hidden" name="om" value="">
<INPUT TYPE="hidden" name="lid" value="">

<table width="100%" height="30" cellspacing="0" cellpadding="0">
    <tr valign="top" style="background-image:url(<?=IMG_PATH?>/buttons/beg_chat_03.gif); background-position: top; background-repeat:repeat-x; ">
      <td width="9"><img src="<?=IMG_PATH?>/buttons/bkf_l_r1_02.gif" width="9" height="30"></td>
<td width="30"><IMG SRC="<?=IMG_PATH?>/buttons/b___.gif" WIDTH=30 HEIGHT=30 BORDER=0 ALT="Чат"></td>

<div id="soundM" style="position:absoluite;"></div>
<div id="soundM2" style="position:absoluite;"></div>



<td valign="middle" id="T2"><input type="text" id="ssmtext" name="text" maxlength="300" size=80 style="width:100%"></TD>
<td nowrap id="T3"><a href="javascript:void(0)" onclick="if (top.ChatTranslit) {translate();}document.forms[0].submit()" title="Добавить текст в чат"><IMG SRC="<?=IMG_PATH?>/buttons/b___ok.gif" WIDTH=30 HEIGHT=30 BORDER=0 ALT="Добавить текст в чат"></a><IMG SRC="<?=IMG_PATH?>/buttons/1x1.gif" WIDTH="8" HEIGHT="1" BORDER=0 ALT=""><a href="javascript:void(0)" onclick="clearc();" title="Очистить строку ввода"><IMG SRC="<?=IMG_PATH?>/buttons/b___clear.gif" WIDTH=30 HEIGHT=30 BORDER=0 ALT="Очистить строку ввода"></a><a href="javascript:void(0)" onclick="sw_filter();" title="(выключено) Показывать в чате только сообщения адресованные мне"><IMG SRC="<?=IMG_PATH?>/buttons/b___filter_off.gif" WIDTH=30 HEIGHT=30 BORDER=0 name="b___filter" ALT="(выключено) Показывать в чате только сообщения адресованные мне"></a><a href="javascript:void(0)" onclick="sw_sys();" title="(выключено) Показывать в чате системные сообщения"><IMG SRC="<?=IMG_PATH?>/buttons/b___sys_off.gif" WIDTH=30 HEIGHT=30 BORDER=0 name="b___sys" ALT="(выключено) Показывать в чате системные сообщения"></a><a href="javascript:void(0)" onclick="sw_slow();" title="(выключено) Медленное обновление чата (раз в минуту)"><IMG SRC="<?=IMG_PATH?>/buttons/b___slow_off.gif" WIDTH=30 HEIGHT=30 BORDER=0 name="b___slow" ALT="(выключено) Медленное обновление чата (раз в минуту)"></a><img src="<?=IMG_PATH?>/buttons/b___translit_off.gif" alt="(выключено) Преобразовывать транслит в русский текст (правила перевода см. в энциклопедии)" name="b___translit" width="30" height="30" id="b___translit" style="cursor: hand;" onclick="sw_translit();"><a href="javascript:void(0)" onclick="SoundB()" title="Звуки"><IMG SRC="<?=IMG_PATH?>/buttons/zvuk_off.gif" id="but_sound" WIDTH=30 HEIGHT=30 BORDER=0></a><a href="javascript:void(0)" onclick="smiles()" title="Смайлики"><IMG SRC="<?=IMG_PATH?>/buttons/1x1.gif" WIDTH="8" HEIGHT="1" BORDER=0 ALT=""><IMG SRC="<?=IMG_PATH?>/buttons/b___smile.gif" WIDTH=30 HEIGHT=30 BORDER=0 ALT="Смайлики"></a>
<IMG title="Избранное" SRC="<?=IMG_PATH?>/buttons/b___cl1.gif" style="cursor:pointer" onclick="top.cht('main.php?edit=1&razdel=8&'+Math.random())" WIDTH=30 HEIGHT=30 BORDER=0 ALT="">
<IMG title="Локация" SRC="<?=IMG_PATH?>/buttons/location.gif" style="cursor:pointer" onclick="top.cht('main.php')" WIDTH=30 HEIGHT=30 BORDER=0 ALT="">
<IMG title="Поединки" SRC="<?=IMG_PATH?>/buttons/battles.gif" style="cursor:pointer" onclick="top.cht('zayavka.php')" WIDTH=30 HEIGHT=30 BORDER=0 ALT="">
</TD>
<td width="19" id="T4" background="<?=IMG_PATH?>/buttons/b___bg2.gif"><img src="<?=IMG_PATH?>/buttons/b___1.gif" width="19" height="30" alt="" /></td>
<td align="right" nowrap="nowrap" bgcolor="BAB7B3" id="T5" background="<?=IMG_PATH?>/buttons/b___bg2.gif">

<?php
    echo "<a href=\"javascript:void(0)\" title=\"Настройки/Инвентарь\"><IMG SRC=\"".IMGBASE."/i/$now/a___inv.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Настройки/Инвентарь\" onclick=\"top.cht('main.php?edit='+Math.random())\"></a>";
    
    if ($user['level']>=4) {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('give.php')\" title=\"Передачи\"><IMG SRC=\"".IMGBASE."/i/$now/b__give.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Передачи\" ></a>";
    }
        echo "<a href=\"javascript:void(0)\" title=\"Алхимики онлайн\"><IMG SRC=\"".IMGBASE."/i/$now/a___dlr.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Алхимики онлайн\" onclick=\"top.cht('dealer.php')\"></a>";
    if ($user['level'] > 1)
		echo "<a href=\"javascript:void(0)\" title=\"Лич\"><IMG SRC=\"".IMGBASE."/i/a___lich.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Лич\" onclick=\"top.cht('lic.php')\"></a>";
    if (($user['vip']>0) && ($user['vip']<5))  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('acounts/vip.php')\" title=\"VIP Панель\"><IMG SRC=\"<?=IMG_PATH?>/buttons/a___vip.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"VIP панель\"></a>";
    }
    if (($user['align']>2) && ($user['align']<3))  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('a.php')\" title=\"Панель Админа\"><IMG SRC=\"".IMGBASE."/i/$now/a___haos.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Панель Админа\"></a>";
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('admin/admin.php')\" title=\"Панель Админа\"><IMG SRC=\"<?=IMG_PATH?>/buttons/admin.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Панель Админа\"></a>";
        echo "<a href='https://109.206.165.115:65525/ispmgr' target='_blank'><IMG SRC=\"<?=IMG_PATH?>/buttons/php.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Isp Manager\">";
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('palklan.php')\" title=\"Паладины\"><IMG SRC=\"<?=IMG_PATH?>/buttons/clan.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Паладины\"></a>";
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('tarklan.php')\" title=\"Тарманы\"><IMG SRC=\"<?=IMG_PATH?>/buttons/clan.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Тарманы\"></a>";
    }
    if (($user['align']>1) && ($user['align']<2)) {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('palklan.php?'+Math.random())\" title=\"Клан\"><IMG SRC=\"".IMGBASE."/i/$now/clan.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Клан\"></a>";
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/a___pal.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
    }
    if (in_array($_SESSION['uid'], $smalladms) || $user["align"]==5) echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/a___pal.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";

    if (($user['align']>3) && ($user['align']<4)) {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/b__orden.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('tarklan.php?'+Math.random())\" title=\"Клан\"><IMG SRC=\"".IMGBASE."/i/$now/clan.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Клан\"></a>";
            }
    if ($user['align']>=0.98 && $user['align']<0.99)  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/b__orden.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
    }
    if (($user['deal']>0) && ($user['align']<6)) {
    echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('admin/dealer.php')\" title=\"Панель Алхимика\"><IMG SRC=\"<?=IMG_PATH?>/buttons/alx.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Панель Алхимика\"></a>";
    }
    if ($user['align']==0.99)  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/b__light.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
    }
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('chist.php')\" title=\"Проверки\"><IMG SRC=\"/i/$now/b__light.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Проверки\"></a>";
    if ($user['align']==7 || $user['align']==7.001 || $user['align']==7.002 || $user['align']==7.003 || $user['align']==7.004)  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/b__neit.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
    }
    if ($user['align']==10)  {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('orden.php')\" title=\"Склонность\"><IMG SRC=\"".IMGBASE."/i/$now/b__otm.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Склонность\"></a>";
    }
    if ($user['klan']) {
        echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('klan1.php?'+Math.random())\" title=\"Клан\"><IMG SRC=\"".IMGBASE."/i/$now/clan.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Клан\"></a>";
    }
    if ($user['align']==2.5 || $user['align']==2.7 || $user['align']==77 || $user['align']==2.6)  {
    echo "<a href=\"javascript:void(0)\" title=\"Орден Чести\"><IMG SRC=\"".IMGBASE."/i/$now/a___chest.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Орден Чести\" onclick=\"top.cht('ordenchesti.php')\"></a>";
    }
    if ($user['radiodj']==1) {
	echo "<a href=\"javascript:void(0)\" onclick=\"top.cht('admin/radiodj.php')\" title=\"Радио\"><IMG SRC=\"<?=IMG_PATH?>/buttons/radiodj_but.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Радио\"></a>";
	}
    if ($user['level']>=0)  {
    echo "<a href=\"javascript:void(0)\" title=\"Друзья\"><IMG SRC=\"".IMGBASE."/i/$now/a___friend3.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Друзья\" onclick=\"top.cht('friend.php')\"></a>";
    echo "<a href=\"javascript:void(0)\" title=\"Блокнот\"><IMG SRC=\"<?=IMG_PATH?>/buttons/b_notepad.gif\" WIDTH=30 HEIGHT=30 BORDER=0 ALT=\"Блокнот\" onclick=\"window.open('bloknot.php', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')\"></a>";
    }
?>
<a href="javascript:void(0)" title="Выход из игры"><IMG SRC="<?=IMGBASE?>/i/<?=$now?>/a___ext.gif" WIDTH=30 HEIGHT=30 BORDER=0 ALT="Выход из игры" onclick="if (confirm('Выйти из игры?')) top.window.location='index.php?exit=0.560057875997465'"></a></TD>
<td width="70" valign="middle" background="<?=IMGBASE?>/i/<?=$now?>/b___bg2.gif" bgcolor="BAB7B3" id="T6">
<script>
    var html='';
        if (navigator.userAgent.match(/MSIE/)) {
            // IE gets an OBJECT tag
            html += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="70" height="26"><param name="movie" value="<?=IMGBASE?>/i/clock.swf?hours=<?=date("H")?>&minutes=<?=date("i")?>&sec=<?=date("s")?>" /><param name="quality" value="high" /></object>';
        }
        else {
            // all other browsers get an EMBED tag
            html += '<embed src="<?=IMGBASE?>/i/clock.swf?hours=<?=date("H")?>&minutes=<?=date("i")?>&sec=<?=date("s")?>" quality="best" width="70" height="26" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
        }
        document.write(html);
</script>
</td>
<td width="9" valign="middle" background="<?=IMGBASE?>/i/<?=$now?>/b___bg2.gif" bgcolor="BAB7B3"><img src="<?=IMGBASE?>/i/<?=$now?>/bkf_l_r1_06.gif" width="9" height="30"></td>

</TR>
</TABLE>

<SCRIPT language="JavaScript">
var user = top.getCookie("ChatColor");
if ((user != null)&&(user != "")) document.F1.color.value = user;
document.F1.text.focus();
function smiles(){
if (document.all && document.all.item && !window.opera && !document.layers){
    //rof IE only
   var x = event.screenX - 150;
   var y = event.screenY - 320;
   var sFeatures = 'dialogLeft:'+x+'px;dialogTop:'+y+'px;dialogHeight:310px;dialogWidth:300px;help:no;status:no;unadorned:yes';
   window.showModelessDialog("<?
     if (in_array($user["id"], $djs)) echo "dj";
     if ($user["align"]==2.5) echo "cocos";
   ?>smiles.html?7", window, sFeatures);
}
else{ //все остальные браузеры
//смайлы лежать здесь, в ch.php и ch2.91.js
var sm=['237','239','254','253','276','275','278','284','289','288','294','293','295','310','313','324','336','347','346','345','348','361','362','366','367','382','393','411','415','413','419','422','434','442','447','453','467','471','472','475','551','554','559','564','568','573','601','602','603','604','605','606','607','238','608','609','610','611','612','613','614','349','616','617','621','000','029','030','077','126','127','131','155','156','267','297','319','350','353','354','357','358','243','206','627','623','624','368','376','385','386','414','417','457','459','469','473','474','477','552','558','560','570','574','575','576','579','950','951','952','953','954','955','956','957','958','959','960','002','003','004','008','009','011','012','013','014','015','016','021','023','024','025','027','031','032','628','629','630','631','632','633','634','635','636','637','638','639','640','641','642','643','644','645','646','647','648','650','651','652','653','654','655','656','657','001','007','006','1000','010','018','022','019','026','034','033','038','036','040','039','043','049','052','056','059','057','062','066','068','073','082','175','080','079','083','086','085','114','118','119','123','161','164','167','166','170','174','177','179','178','186','189','188','190','202','205','203','221','246','255','277','600','744', '151', '152', '153', '154', '157', '158', '159', '160', '162', '163', '165', '168', '169', '171', '172', '173', '176', '180', '181', '182', '183', '184', '185', '187', '240', '241', '242', '244', '245', '247', '248', '249', '250', '251', '252', '256', '257', '258', '259', '260', '261', '262', '263', '264', '265', '266', '268', '269', '270', '271', '272', '273', '274', '279', '280', '281', '282', '283','130','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147','148','149','150','191','192','193','194','195','196','197','198','199','200','201','204','207','208','209','210','211','212','213','214','215','216','217','218','219','220','222','223','224','225','226','227','372', '373', '230', '231', '232', '233', '234', '235', '236', '285', '286', '287', '290', '291', '292', '296', '298', '299', '300', '301', '302', '303', '304', '305', '306', '307', '308', '309', '311', '312', '314', '315', '316', '317', '318', '320', '321', '322', '323', '325', '326', '327', '328', '329', '330', '331', '332', '333', '334', '335', '337', '338', '339', '340', '341', '342', '343', '344', '351', '352', '355', '356', '359', '360', '363', '364', '365', '369', '370', '371'];

    function createMessage(title, body) {
        var container = document.createElement('div');
        var i=0;
        body='';
        while(i<sm.length){
            var s = sm[i++];
            body +='<a href="javascript:void(0)" onClick="SSm(\''+s+'\')"><IMG SRC=<?=IMGBASE?>/chat/smiles/smiles_'+s+'.gif BORDER=0 ALT="" ></a>';
        }
        container.innerHTML = '<div id="ssmsmilediv" class="ssm-smile"><div class="ssm-smile-body">'+body+'</div><input class="ssm-smile-ok" type="button" value="Закрыть"/></div>';

        return container.firstChild;
    }

    function positionMessage(elem) {
        var ua = navigator.userAgent.toLowerCase();
        // Определим Internet Explorer
        if (ua.indexOf("msie") != -1 && ua.indexOf("opera") == -1 && ua.indexOf("webtv") == -1) {
            IsIE(elem);
         }
        else{
            //------------all browser------------------not support IE
            elem.style.position = 'fixed';
            elem.style.bottom =0+'px';
        }

        elem.style.right = 2+'px';
    }

    function addCloseOnClick(messageElem) {
        var input = messageElem.getElementsByTagName('INPUT')[0];
        input.onclick = function() {
            messageElem.parentNode.removeChild(messageElem);
        }
    }

    function setupMessageButton(title, body) {
        var messageElem = createMessage(title, body);
        positionMessage(messageElem);
        addCloseOnClick(messageElem);
        top.frames['chat'].document.body.appendChild(messageElem);
    }
    try{
        el=top.frames['chat'].document.getElementById('ssmsmilediv');
        el.parentNode.removeChild(el);
    }
    catch(err){
    }
    setupMessageButton('Смайлики ;)', '');
}
}
</SCRIPT>
</FORM>
<?php
}
?>
</body>
</html>