<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
	session_start();
	include"functions/adminka_functions.php";
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "functions.php";
    $al = mysql_fetch_assoc(mysql_query("SELECT * FROM `aligns` WHERE `align` = '".mysql_real_escape_string($user['align'])."' LIMIT 1;"));
	$auth_pass = "63a9f0ea7bb98050796b649e85481845";
	header("Cache-Control: no-cache");
	if ($user['align']<2 || $user['align']>3) header("Location: index.php");
function wsoLogin() {
	die("<pre align=center><form method=post>Password: <input type=password name=pass><input type=submit value='>>'></form></pre>");
}

function WSOsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if(!empty($auth_pass)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))
        WSOsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        wsoLogin();
}
?>

<html>
<head>
	<title>Untitled</title>
	<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<script type="text/javascript" src="http://img.bestcombats.net/js/adminka/addclasskillclass.js"></script>
  <script type="text/javascript" src="http://img.bestcombats.net/js/adminka/attachevent.js"></script>
  <script type="text/javascript" src="http://img.bestcombats.net/js/adminka/addcss.js"></script>
  <script type="text/javascript" src="http://img.bestcombats.net/js/adminka/tabtastic.js"></script>
<style>
	.row {
		cursor:pointer;
	}
</style>
<style type="text/css">
.splCont{display:none; padding:3px 5px;}
</style>
<script type="text/javascript">
  function show(ele) {
      var srcElement = document.getElementById(ele);
      if(srcElement != null) {
          if(srcElement.style.display == "block") {
            srcElement.style.display= 'none';
          }
          else {
            srcElement.style.display='block';
          }
      }
  }
</script>
<SCRIPT>
var Hint3Name = '';
// Заголовок, название скрипта, имя поля с логином
function runmagic(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'<select style="background-color:#eceddf; color:#000000;" name="timer"><option value=15>15 мин<option value=30>30 мин<option value=60>1 час'+
	'<option value=180>3 часа<option value=360>6 часов<option value=720>12 часов<option value=1440>сутки</select>'+
	'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

function runmagicf(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'<select style="background-color:#eceddf; color:#000000;" name="timer"><option value=15>15 мин<option value=30>30 мин<option value=60>1 час'+
	'<option value=180>3 часа<option value=360>6 часов<option value=720>12 часов<option value=1440>сутки<option value=4320>3 суток<option value=10080>неделя</select>'+
	'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

function runmagic1(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<form action="a.php" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

function runmagic2(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'<select style="background-color:#eceddf; color:#000000;" name="timer"><option value=2>2 дня<option value=3>3 дня<option value=7>неделя<option value=14>2 недели'+
	'<option value=30>1 месяц<option value=60>2 месяца<option value=365>бессрочно</select>'+
	'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

function runmagic3(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'<br>Причина: <INPUT TYPE=text size=25 NAME="palcom"></TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}
function runmagic4(title, magic, name, name1){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин жениха: <INPUT TYPE=text NAME="'+name+'">'+
	'<br>Укажите логин невесты: <INPUT TYPE=text NAME="'+name1+'">'+
	'<br><center><INPUT TYPE="submit" value=" »» "></center></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}
function runmagic10(title, magic, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
	'<select style="background-color:#eceddf; color:#000000;" name="timer"><option value=2>2 дня<option value=3>3 дня<option value=7>неделя<option value=14>2 недели'+
	'<option value=30>1 месяц<option value=60>2 месяца<option value=365>бессрочно</select>'+
	'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}
function teleport(title, magic, name){
document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td colspan=2><form action="a.php" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
'<select style="background-color:#eceddf; color:#000000;" name="room">'+
'<option value=0">Секретная Комната'+
'<option value=1">Комната для новичков'+
'<option value=2">Комната перехода'+
'<option value=3">Бойцовский Клуб'+
'<option value=4">Подземелье'+
'<option value=5">Зал Воинов 1'+
'<option value=6">Зал Воинов 2'+
'<option value=7">Зал Воинов 3'+
'<option value=8">Торговый зал'+
'<option value=9">Рыцарский зал'+
'<option value=10">Башня рыцарей-магов'+
'<option value=11">2 Этаж'+
'<option value=26">Паркова'+
'<option value=15">Зал Паладинов'+
'<option value=16">Совет Белого Братства'+
'<option value=17">Зал Тьмы'+
'<option value=18">Царство Тьмы'+
'<option value=19">Будуар'+
'<option value=20">Центральная площадь'+
'<option value=21">Страшилкина улица'+
'<option value=22">Магазин'+
'<option value=23">Ремонтная мастерская'+
'<option value=25">Комиссионный магазин'+
'<option value=27">Почта'+
'<option value=28">Регистратура кланов'+
'<option value=37">Банк'+
'<option value=31">Башня смерти'+
'<option value=34">Цветочный магазин'+
'<option value=35">Магазин Березка'+
'<option value=36">Зал Стихий'+
'<option value=37">Магазин Забытой Чести'+
'<option value=42">Лотерея Сталкеров'+
'<option value=43">Комната Знахаря'+
'<option value=402">Вход в подземелье'+
'<option value=666">Тюрьма'+
'<option value=667">Бар "Пьяный Админ"'+
'<option value=888">Зоомагазин'+
'<option value=101">Общежитие'+
'<option value=29">Торговая'+
'</select></select>'+
'</TD><TD width=30><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
document.all("hint3").style.visibility = "visible";
document.all("hint3").style.left = 100;
document.all("hint3").style.top = 100;
document.all(name).focus();
Hint3Name = name;
}
function closehint3(){
document.all("hint3").style.visibility="hidden";
Hint3Name='';
}
</SCRIPT>
</head>

<body leftmargin=5 topmargin=5 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 >
<table align=right><tr><td><INPUT TYPE="button" onclick="location.href='/ktogde77.php';" value="Кто в сети?" title="Кто в сети?"> <INPUT TYPE="button" onClick="location.href='nagruzka.php';" value="Статистика сервера" title="Статистика"> <INPUT TYPE="button" onclick="location.href='main.php';" value="Вернуться" title="Вернуться"></table>
<h3><center>Администраторская панель</center></h3>
<ul class="tabset_tabs">
<li><a href="#tab1" class="active">Кнопки</a></li>
<li><a href="#tab2">Спам</a></li>
<li><a href="#tab3">Работа с кланами</a></li>
<li><a href="#tab4">Работа с персонажами</a></li>
<li><a href="#tab5">Работа с Web сервером</a></li>
<li><a href="#tab6">Работа с поединками</a></li>
<li><a href="#tab7">Работа с магазинами</a></li>
<li><a href="#tab8">Работа с званиями/должностями</a></li><br>
<li><a href="#tab9">Работа с образами</a></li>
<li><a href="#tab10">Админские кнопочки</a></li>
<li><a href="#tab11">Системки</a></li>
<li><a href="#tab12">Невидимки</a></li>
</ul>
<div id="tab1" class="tabset_content">
<h2 class="tabset_label">Кнопки</h2>
<?
echo "<div align=center id=hint3></div>";
$moj = expa($al['accses']);
if(!$_POST['use']){$_POST['use']=$_GET['use'];}

if(isset($_POST['use']) and !empty($_POST['use']) and in_array($_POST['use'],array_keys($moj))) {
			switch($_POST['use']) {
				case "sleep":
					include("./magic/admin/sleep.php");
				break;
				case "sleepf":
					include("./magic/admin/sleepf.php");
				break;
				case "sleep_off":
					include("./magic/admin/sleep_off.php");
				break;
                                case "delbattle":
					include("./magic/admin/delbattle.php");
                                break;
				case "sleepf_off":
					include("./magic/admin/sleepf_off.php");
				break;
				case "haos":
					include("./magic/haos.php");
				break;
				case "haos_off":
					include("./magic/haos_off.php");
				break;
				case "obezl":
					include("./magic/admin/obezl.php");
				break;
				case "obezl_off":
					include("./magic/admin/obezl_off.php");
				break;
				case "death":
					include("./magic/death.php");
				break;
				case "death_off":
					include("./magic/death_off.php");
				break;
				case "chains":
					include("./magic/stop.php");
				break;
				case "chainsoff":
					include("./magic/start.php");
				break;
				case "jail":
					include("./magic/jail.php");
				break;
				case "jail_off":
					include("./magic/jail_off.php");
				break;
				case "ldadd":
					include("./magic/ldadd.php");
				break;
				case "attackk":
					include("./magic/attackk.php");
				break;
				case "attack":
					include("./magic/attack.php");
				break;
				case "battack":
					include("./magic/battack.php");
				break;
				case "attackt":
					include("./magic/attackt.php");
				break;
				case "pal_off":
					include("./magic/pal_off.php");
				break;
				case "tar_off":
					include("./magic/tar_off.php");
				break;
				case "marry":
					include("./magic/marry.php");
				break;
				case "unmarry":
					include("./magic/unmarry.php");
				break;
				case "ct_all":
					include("./magic/act_all.php");
				break;
				case "check":
					include("./magic/check.php");
				break;
				case "teleport":
					include("./magic/teleport.php");
				break;
				case "vampir":
					include("./magic/vampir.php");
				break;
				case "bexit":
					include("./magic/bexit.php");
				break;
				case "devastate":
					include("./magic/devastate.php");
				break;
				case "brat":
					include("./magic/brat.php");
				break;
				case "piot":
					include("./magic/piot.php");
				break;
				case "nepiot":
					include("./magic/nepiot.php");
				break;
				case "bratl":
					include("./magic/bratl.php");
				break;
				case "dneit":
					include("./magic/dneit.php");
				break;
				case "ddark":
					include("./magic/ddark.php");
				break;
				case "dlight":
					include("./magic/dlight.php");
				break;
				case "vragon":
					include("./magic/admin/vragon.php");
				break;
				case "vragoff":
					include("./magic/admin/vragoff.php");
				break;
				case "a_ogon":
					include("./magic/a_ogon.php");
				break;
				case "a_voda":
					include("./magic/a_voda.php");
				break;
				case "a_vozduh":
					include("./magic/a_vozduh.php");
				break;
				case "a_zemlya":
					include("./magic/a_zemlya.php");
				break;
				case "iz_ogon":
					include("./magic/iz_ogon.php");
				break;
				case "iz_voda":
					include("./magic/iz_voda.php");
				break;
				case "iz_vozduh":
					include("./magic/iz_vozduh.php");
				break;
				case "iz_zemlya":
					include("./magic/iz_zemlya.php");
				break;
				case "defence":
					include("./magic/defence.php");
				break;
				case "hidden":
					include("./magic/hidden.php");
				break;
				case "hidden_off":
					include("./magic/hidden_off.php");
				break;
				case "luck_ptp":
					include("./magic/luck_ptp.php");
				break;			
				case "d_blat-100":
					include("./magic/blat.php");
				break;
			}	
}
		echo "<table>";
		echo "<tr><td align=center><br><br>";
		foreach($moj as $k => $v) {
			switch($k) {
				case "sleep": $script_name="runmagic"; $magic_name="Наложить заклятие молчания"; break;
				case "sleepf": 
				if ($user['align']>2 && $user['align']<3) {
					$script_name="runmagicf"; $magic_name="Наложить заклятие форумного молчания"; 
				}
				else {
					$script_name="runmagic"; $magic_name="Наложить заклятие форумного молчания"; 
				}	
				break;
				case "sleep_off": $script_name="runmagic1"; $magic_name="Снять заклятие молчания"; break;
				case "sleepf_off": $script_name="runmagic1"; $magic_name="Снять заклятие форумного молчания"; break;
				case "haos": $script_name="runmagic2"; $magic_name="Наложить заклятие хаоса"; break;
				case "haos_off": $script_name="runmagic1"; $magic_name="Снять заклятие хаоса"; break;
				case "death": $script_name="runmagic1"; $magic_name="Наложить заклятие смерти"; break;
				case "death_off": $script_name="runmagic1"; $magic_name="Снять заклятие смерти"; break;
				case "chains": $script_name="runmagic2"; $magic_name="Наложить Путы"; break;
				case "chainsoff": $script_name="runmagic1"; $magic_name="Снять Путы"; break;
				case "jail": $script_name="runmagic2"; $magic_name="Отправить в Заточение"; break;
				case "jail_off": $script_name="runmagic1"; $magic_name="Выпустить из заточения"; break;
				case "piot": $script_name="runmagic1"; $magic_name="С кем пить идем?"; break;
				case "nepiot": $script_name="runmagic1"; $magic_name="Найух с пляжу!"; break;
				case "obezl": $script_name="runmagic2"; $magic_name="Наложить заклятие обезличивания"; break;
				case "obezl_off": $script_name="runmagic1"; $magic_name="Снять заклятие обезличивания"; break;
				case "pal_off": $script_name="runmagic1"; $magic_name="Лишить звания Паладин"; break;
				case "attackk": $script_name="runmagic1"; $magic_name="Кулачное Нападение"; break;
				case "attack": $script_name="runmagic1"; $magic_name="Нападение"; break;
				case "battack": $script_name="runmagic1"; $magic_name="Кровавое нападение"; break;
				case "attackt": $script_name="runmagic1"; $magic_name="Темное Нападение"; break;
				case "marry": $script_name="runmagic4"; $magic_name="Зарегистрировать брак"; break;
				case "unmarry": $script_name="runmagic4"; $magic_name="Расторгнуть брак"; break;
				case "hidden": $script_name="runmagic1"; $magic_name="Заклятие невидимости"; break;
                                case "delbattle": $script_name="runmagic1"; $magic_name="Удалить бой"; break;
				case "teleport": $script_name="teleport"; $magic_name="Телепортация"; break;
				case "check": $script_name="runmagic1"; $magic_name="Поставить проверку"; break;
				case "ct_all": $script_name="runmagic1"; $magic_name="Вылечить от травм"; break;
				case "pal_buttons": $script_name="runmagic"; $magic_name="Отметить о прохождении проверки"; break;
				case "teleport": $script_name="teleport"; $magic_name="Телепортация"; break;
				case "vampir": $script_name="runmagic1"; $magic_name="Вампиризм (выпить энергию другого игрока)"; break;
				case "brat": $script_name="runmagic1"; $magic_name="Помочь темному собрату (вмешаться в поединок)"; break;
				case "bratl": $script_name="runmagic1"; $magic_name="Рассеять Тьму"; break;
				case "dneit": $script_name="runmagic1"; $magic_name="Присвоить склонность (Нейтральное братство)"; break;
				case "dlight": $script_name="runmagic1"; $magic_name="Присвоить склонность (Светлое братство)"; break;
				case "ddark": $script_name="runmagic1"; $magic_name="Присвоить склонность (Темное братство)"; break;
				case "note": $script_name="runmagic"; $magic_name="Редактировать личное дело"; break;
				case "sys": $script_name="runmagic"; $magic_name="Отправить в чат системное сообщение"; break;
				case "scanner": $script_name="runmagic"; $magic_name="Показать лог действий модератора"; break;
				case "rep": $script_name="runmagic"; $magic_name="Отчет о переводах"; break;
				case "rost": $script_name="runmagic"; $magic_name="Присвоить статус"; break;
				case "ldadd": $script_name=""; $magic_name=""; break;
				case "bexit": $script_name="runmagic1"; $magic_name="Выйти из боя"; break;
				case "a_ogon": $script_name="runmagic1"; $magic_name="Астрал стихий (огонь)"; break;
				case "iz_ogon": $script_name="runmagic1"; $magic_name="Изгнание астрала стихий (огонь)"; break;
				case "a_voda": $script_name="runmagic1"; $magic_name="Астрал стихий (вода)"; break;
				case "iz_voda": $script_name="runmagic1"; $magic_name="Изгнание астрала стихий (вода)"; break;
				case "a_vozduh": $script_name="runmagic1"; $magic_name="Астрал стихий (воздух)"; break;
				case "iz_vozduh": $script_name="runmagic1"; $magic_name="Изгнание астрала стихий (воздух)"; break;
				case "a_zemlya": $script_name="runmagic1"; $magic_name="Астрал стихий (земля)"; break;
				case "iz_zemlya": $script_name="runmagic1"; $magic_name="Изгнание астрала стихий (земля)"; break;
				case "defence": $script_name="runmagic1"; $magic_name="Наложить Защиту от Оружия"; break;
				case "devastate": $script_name="runmagic1"; $magic_name="Наложить Сокрушение"; break;
				case "hidden": $script_name="runmagic1"; $magic_name="Невидимость"; break;
				case "hidden_off": $script_name="runmagic1"; $magic_name="Рассеять невидимость"; break;
				case "luck_ptp": $script_name="runmagic1"; $magic_name="Пропуск забытых"; break;
				case "d_blat-100": $script_name="runmagic1"; $magic_name="Право на подвиг";  break;

			}
            if($k=="vragon"){echo"<a onclick=\"if (confirm('Вы уверены что хотите вызвать Общего Врага?')) window.location='a.php?use=vragon'\" href='#'><img src='http://img.bestcombats.net/pbuttons/16.gif' title='Вызвать Общего Врага'></a> ";}
            elseif($k=="vragoff"){echo"<a onclick=\"if (confirm('Вы уверены что хотите отозвать Общего Врага?')) window.location='a.php?use=vragoff'\" href='#'><img src='http://img.bestcombats.net/pbuttons/34.gif' title='Отозвать Общего Врага'></a> ";}
			elseif ($script_name) {print "<a onclick=\"javascript:$script_name('$magic_name','$k','target','target1') \" href='#'><img src='http://img.bestcombats.net/pbuttons/".$k.".gif' title='".$magic_name."'></a> ";}
		}
		echo "</td></tr></table>";
### Системка ###
			echo "<form method=post action=\"a.php\">Добавить в \"дело\" игрока заметку о нарушении правил, прокрутке и пр. <br>
					<table><tr><td>Введите логин </td><td><input type='text' name='ldnick' value='$ldtarget'></td><td> сообщение <input type='text' size='50' name='ldtext' value=''></td><td><input type='hidden' name='use' value='ldadd'><input type=submit value='Добавить'></td></tr>";
				if ($ldblock) {
					echo "<tr><td colspan=4><input type='checkbox' name='red' class='input' checked> Записать, как причину отправки в хаос/блокировки</td></tr>";
				}
				else {
					echo "<tr><td colspan=4><input type='checkbox' name='red' class='input' > Записать, как причину отправки в хаос/блокировки</td></tr>";
				}
			echo "</table></form>";
?>
</div>
<div id="tab2" class="tabset_content">
<h2 class="tabset_label">Спам</h2>
<?php
##### Спам #####	
function my_strtolower($string)
{
    $str = strtolower($string);
    if (strtolower('Ц') != 'ц') {
        $string = strtr($string, 'АБВГДЕЁЖЗИЙКЛМНОРПСТУФХЦЧШЩЪЬЫЭЮЯ', 'абвгдеёжзийклмнорпстуфхцчшщъьыэюя');
        $string = strtr($string, 'QWERTYUIOPASDFGHJKLZXCVBNM', 'qwertyuiopasdfghjklzxcvbnm');
    }
    return $string;
}

if (isset($_POST['spam_text']) && $_POST['spam_text'] != '') {
    mysql_query('INSERT INTO `spam_text` (`text`) VALUES ("' . mysql_real_escape_string(my_strtolower($_POST['spam_text'])) . '")');
    $user->error = '<b style="color:red">Готово</b>';

}
if (isset($_GET['del_t']) && is_numeric($_GET['del_t'])) {
    mysql_query('DELETE FROM `spam_text` WHERE `id`="' . $_GET['del_t'] . '"');
    header("Location: a.php#tab2");
    echo  '<b style="color:red">Готово</b>';
}
echo '<h4>Панель управления фильтром спама</h4>';
echo '<form method="post" action="">
	Плохое слово <input type="text" name="spam_text" maxlength="20" />&nbsp;<input type="submit" value="Добавить плохое слово" name="turn_submit" /><br />
	<br clear="all" />
	<b>Фильтр:</b><br />';
$bads = mysql_query('SELECT * FROM `spam_text` ORDER by `id` DESC');
while ($badswords = mysql_fetch_array($bads)) {
    echo $badswords['text'] . "<a href='?pal&p=13&del_t=" . $badswords['id'] . "'>X</a>, ";
}
?>
</div>
<div id="tab3" class="tabset_content">
  <h2 class="tabset_label">Работа с кланами</h2>
<?
##### Расформировка Клана #####	
echo"<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Расформировать Клан</legend>
<table><tr><td>Клан</td><td><input type='text' name='del_clan'></td></tr>
<tr><td><input type=submit value='Расформировать'></td></tr>
</table></fieldset></form>";
if (isset($_POST['del_clan'])) {
mysql_query("UPDATE `users` SET `align` = '0',`status`='',`klan`='' WHERE `klan` = '".$_POST['del_clan']."';");
mysql_query("DELETE from `clans` WHERE `name` = '".$_POST['del_clan']."';");
mysql_query("DELETE from `clanstorage` WHERE `klan` = '".$_POST['del_clan']."';");
mysql_query("DELETE from `clanevents` WHERE `klan` = '".$_POST['del_clan']."';");
echo"<font color=red>Клан ".$_POST['del_clan']." расформирован!</font><br>";
}
?>
</div>
<div id="tab4" class="tabset_content">
<h2 class="tabset_label">Работа с персонажами</h2>
<?
##### Очистка истории имен #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Очистить историю имен</legend>
<table><tr><td>Логин</td><td><input type='text' name='clear_historylog'></td></tr>
<tr><td><input type=submit value='Очистить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['clear_historylog'])) {
mysql_query("UPDATE `users` SET `loginhistory`='' WHERE `login` = '".$_POST['clear_historylog']."';");
echo"<font color=red>История имен персонажа ".$_POST['clear_historylog']." очишена!</font><br>";
}	
##### Очистка черного списка #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Очистить черный список</legend>
<table><tr><td>Логин</td><td><input type='text' name='clear_cs'></td></tr>
<tr><td><input type=submit value='Очистить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['clear_cs'])) {
mysql_query("UPDATE `users` SET `ignore`='' WHERE `login` = '".$_POST['clear_cs']."';");
echo"<font color=red>Черный список персонажа ".$_POST['clear_cs']." очишен!</font><br>";
}
##### Смена ника #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Смена имени</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>Новый логин </td><td><input type='text' name='new-login'> </td></tr>
<tr><td><input type=submit value='Изменить'></td></tr></table></fieldset></form>";

if (isset($_POST['login']) && isset($_POST['new-login'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `login` = '".$_POST['new-login']."',`loginhistory`=concat(`loginhistory`,';".$_POST['login']."||".date('d-m-Y')."') WHERE `id` = '".$target_user_tel['id']."';");
echo"<font color=red>Вы изменили персонажу ".$_POST['login']." имя!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Смена пола #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Смена пола</legend>
<table><tr><td>Логин персонажа</td><td><input type='text' name='login'></td></tr>
<tr><td>Пол</td><td><select name='change_sex'>					
<option value='1'>Мужской</option>	
<option value='(0)'>Женский</option>					
</select></td></tr>
<tr><td><small>(образ выставится начальный)</small></td></tr>
<tr><td><input type=submit value='Изменить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['login']) && isset($_POST['change_sex'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `sex` = '".(int)$_POST['change_sex']."',`shadow`='0.gif' WHERE `id` = '".$target_user_tel['id']."';");
echo"<font color=red>Вы изменили персонажу ".$_POST['login']." пол!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Смена емайла #####			
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Смена e-mail'а</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>E-Mail</td><td><input type='text' name='new-email'></td></tr>
<tr><td><input type=submit value='Изменить'></td></tr></table></fieldset></form>";

if (isset($_POST['login']) && isset($_POST['new-email'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `email` = '".$_POST['new-email']."' WHERE `id` = '".$target_user_tel['id']."';");
echo"<font color=red>Вы изменили персонажу ".$_POST['login']." емайл!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Смена даты рождения #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Смена даты рождения</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>Дата рождения </td><td><input type='text' name='new-date'> (в формате ДД-ММ-ГГГГ)</td></tr>
<tr><td><input type=submit value='Изменить'></td></tr></table></fieldset></form>";

if (isset($_POST['login']) && isset($_POST['new-date'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `borndate` = '".$_POST['new-date']."' WHERE `id` = '".$target_user_tel['id']."';");
echo"<font color=red>Вы изменили персонажу ".$_POST['login']." дату рождения!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Удаление Персонажа #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Удалить Персонажа</legend>
<table><tr><td>Логин</td><td><input type='text' name='logindelete'></td></tr>
<tr><td><input type=submit value='Удалить'></td></tr>
</table></fieldset></form>";

if (isset($_POST['logindelete'])) {
$user_del=mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `login` = "'.$_POST['logindelete'].'" Limit 1 '));
mysql_query('DELETE FROM `bank` WHERE owner='.$user_del['id'].' ');  
mysql_query('DELETE FROM `complect` WHERE user='.$user_del['id'].' ');  
mysql_query('DELETE FROM `delo` WHERE pers='.$user_del['id'].' ');  
mysql_query('DELETE FROM `dilerdelo` WHERE `owner`= "'.$_POST['logindelete'].'" ');      
mysql_query('DELETE FROM `droplog` WHERE user='.$user_del['id'].' ');   
mysql_query('DELETE FROM `effects` WHERE owner='.$user_del['id'].' ');   
mysql_query('DELETE FROM `favorites` WHERE user='.$user_del['id'].' ');   
mysql_query('DELETE FROM `inventory` WHERE owner='.$user_del['id'].' ');   
mysql_query('DELETE FROM `obshaga` WHERE pers='.$user_del['id'].' ');   
mysql_query('DELETE FROM `obshagaanimals` WHERE pers='.$user_del['id'].' ');   
mysql_query('DELETE FROM `obshagaeffects` WHERE owner='.$user_del['id'].' ');   
mysql_query('DELETE FROM `obshagastorage` WHERE pers='.$user_del['id'].' ');   
mysql_query('DELETE FROM `podzem3` WHERE `glava`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `podzem4` WHERE `glava`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `podzem5` WHERE `glava`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `podzem_zad_login` WHERE `glava`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `qtimes` WHERE user='.$user_del['id'].' ');
mysql_query('DELETE FROM `quests` WHERE user='.$user_del['id'].' ');
mysql_query('DELETE FROM `qwest` WHERE `login`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `userdata` WHERE id='.$user_del['id'].' ');
mysql_query('DELETE FROM `userstrokes` WHERE user='.$user_del['id'].' ');
mysql_query('DELETE FROM `visit_podzem` WHERE `login`="'.$_POST['logindelete'].'" ');
mysql_query('DELETE FROM `zn_tower` WHERE user_id='.$user_del['id'].' ');
mysql_query('DELETE FROM `friends` WHERE user='.$user_del['id'].' ');
mysql_query('DELETE FROM `friends` WHERE friend='.$user_del['id'].' ');
mysql_query('DELETE FROM `delo_multi` WHERE idperslater='.$user_del['id'].' ');
mysql_query('DELETE FROM `delo_multi` WHERE idpersnow='.$user_del['id'].' ');
mysql_query('DELETE FROM `vxod` WHERE login='.$_POST['logindelete'].' ');
mysql_query('DELETE FROM `vxodd` WHERE login='.$_POST['logindelete'].' ');
mysql_query('DELETE FROM `users` WHERE id='.$user_del['id'].' ');
mysql_query('DELETE FROM `users` WHERE user_id='.$user_del['id'].' ');
echo '<font color="red">Вы удалили перса с ником "'.$_POST['logindelete'].'" !</font>';
}

?>
</div>
<div id="tab5" class="tabset_content">
  <h2 class="tabset_label">Работа с Web сервером</h2>
<?
##### Бан Ip Через Iptables #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Бан Ip Через Iptables</legend>
<table><tr><td>Ip</td><td><input type='text' name='banip'></td></tr>
<tr><td><input type=submit value='Заблокировать'></td></tr>
</table></fieldset></form>";

if (isset($_POST['banip'])){
exec("sudo iptables -I INPUT -s ".$_POST['banip']." -j DROP");
echo"<font color=red>IP ".$_POST['banip']." Заблокирован</font><br>";
}
##### Очистка Логов #####

echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Очистка Логов</legend>
<input type=submit name='dellogs' value='Очистить'>";
echo "</fieldset></form>";

if ($_POST['dellogs']) {
exec("cd /var/www/bestcombats/data/www/bestcombats.net/bus; ls | xargs rm -rf");
exec("touch /var/www/bestcombats/data/www/bestcombats.net/bus/index.php");
exec("cd /var/www/bestcombats/data/www/bestcombats.net/backup/logs; ls | xargs rm -rf");
exec("touch /var/www/bestcombats/data/www/bestcombats.net/backup/logs/index.php");
mysql_query("UPDATE `users` SET `battle` = '0';");
mysql_query("TRUNCATE TABLE  `battle`;");
mysql_query("TRUNCATE TABLE  `logs`;");
mysql_query("TRUNCATE TABLE  `battleunits`;");
echo"<font color=red>Успешно</font>";
}
?>
</div>
<div id="tab6" class="tabset_content">
<h2 class="tabset_label">Работа с поединками</h2>
<?
##### Закрытие Боя #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Закрытие боя (для DeBuger)</legend>
<table><tr><td>ID боя</td><td><input type='text' name='end_battle1'></td></tr>
<tr><td><input type=submit value='Удалить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['end_battle1'])) {
mysql_query("UPDATE `battle` SET `win`=0 WHERE `id` = '".$_POST['end_battle1']."';");
echo"<font color=red>Вы закрыли бой ".$_POST['end_battle1']." из базы!</font><br>";
}
?>
</div>
<div id="tab7" class="tabset_content">
<h2 class="tabset_label">Работа с магазинами</h2>
<?
##### Смена цены у вещи #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Смена цены у вещи</legend>
<table><tr><td>Название вещи</td><td><input type='text' name='name_of_item'></td></tr>
<tr><td>Новая цена</td><td><input type='text' name='new_pri'> </td></tr>
<tr><td>Магазин</td><td><select name='magazin'>					
<option value='shop'>Гос.</option>	
<option value='berezka'>Березка</option>					
</select></td></tr>
<tr><td><input type=submit value='Изменить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['name_of_item']) && isset($_POST['new_pri']) && isset($_POST['magazin'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id` FROM `".$_POST['magazin']."` WHERE `name` = '".$_POST['name_of_item']."';"));
If (!empty($target_user_tel['id'])){
If ($_POST['magazin']=='shop'){
mysql_query("UPDATE `shop` SET `cost` = '".$_POST['new_pri']."' WHERE `id` = '".$target_user_tel['id']."' LIMIT 1;");
}elseif($_POST['magazin']=='berezka'){
mysql_query("UPDATE `berezka` SET `ecost` = '".$_POST['new_pri']."' WHERE `id` = '".$target_user_tel['id']."' LIMIT 1;");
}
echo"<font color=red>Вы изменили цену ".$_POST['name_of_item']."!</font><br>";	
}else{
echo"<font color=red>Не была найда вещь под именем ".$_POST['name_of_item']."!</font><br>";	
}
}
?>
</div>
<div id="tab8" class="tabset_content">
<h2 class="tabset_label">Работа с званиями/должностями</h2>
<?
##### Алхимик #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Выдача должности алхимика</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='".$_POST['login']."'></td></tr>
<tr><td>Должность</td><td><select name='alhimic'>
<option value='0'>0 степень</option>		
<option value='1'>1 степень</option>	
<option value='2'>2 степень</option>
<option value='3'>3 степень</option>
<option value='4'>4 степень</option>
<option value='5'>5 степень</option>";					

echo "</select></td></tr>
<tr><td><input type=submit value='Назначить'></td></tr></table>";
echo "</fieldset></form>";				
if (isset($_POST['login']) && isset($_POST['alhimic'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `deal` = '".(int)$_POST['alhimic']."' WHERE `id` = '".$target_user_tel['id']."';");
echo"<font color=red>Вы присвоили персонажу ".$_POST['login']." звание алхимика ".$_POST['alhimic']." степени!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Silver Account #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Silver Account</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='".$_POST['login']."'></td></tr>
<tr><td>Должность</td><td><select name='silver'>
<option value='604800'>Неделя</option>		
<option value='2629743'>Месяц</option>
<option value='0'>Вечно</option>";					
echo "</select></td></tr>
<tr><td><input type=submit value='Присвоить'></td></tr></table>";
echo "</fieldset></form>";				
if (isset($_POST['login']) && isset($_POST['silver'])) {
$target_user_tel=mysql_fetch_array(mq("SELECT `id`,`vip`,`ekr` FROM `users` WHERE `login` = '".$_POST['login']."';"));
if ($_POST['silver']==604800){
//Срок для личного дела
$skolko = 'Неделю';
//Цена на неделю
$cost = '50';
}elseif ($_POST['silver']==2629743){
//Срок для личного дела
$skolko = 'Месяц';
//Цена на месяц
$cost = '150';
}elseif ($_POST['silver']==0){
//Срок для личного дела
$skolko = 'Вечно';
//Цена на вечно
$cost = '600';
}
if ($target_user_tel['ekr']<$cost){
echo"У персонажа недостаточно еврокредитов для данной операции";
}elseif ($target_user_tel['vip']!=0){
echo"У персонажа уже имееться VIP Account";
}elseif (!empty($target_user_tel['id'])){
mq("UPDATE `users` SET `vip` = '1', `ekr`=`ekr`-'$cost' WHERE `id` = '".$target_user_tel['id']."' LIMIT 1;");
if($_POST['silver']!=0){
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$target_user_tel['id']."','Silver Account',".(time()+$_POST['silver']).",70);");
}
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".$target_user_tel['id']."','Купил Silver Account у диллера ".$user['login']." на срок $skolko.',1,'".time()."');");
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Gold Account #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Gold Account</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='".$_POST['login']."'></td></tr>
<tr><td>Должность</td><td><select name='Gold'>
<option value='604800'>Неделя</option>		
<option value='2629743'>Месяц</option>
<option value='0'>Вечно</option>";					
echo "</select></td></tr>
<tr><td><input type=submit value='Присвоить'></td></tr></table>";
echo "</fieldset></form>";				
if (isset($_POST['login']) && isset($_POST['Gold'])) {
$target_user_tel=mysql_fetch_array(mq("SELECT `id`,`vip`,`ekr` FROM `users` WHERE `login` = '".$_POST['login']."';"));
if ($_POST['Gold']==604800){
//Срок для личного дела
$skolko = 'Неделю';
//Цена на неделю
$cost = '100';
}elseif ($_POST['Gold']==2629743){
//Срок для личного дела
$skolko = 'Месяц';
//Цена на месяц
$cost = '250';
}elseif ($_POST['Gold']==0){
//Срок для личного дела
$skolko = 'Вечно';
//Цена на вечно
$cost = '800';
}
if ($target_user_tel['ekr']<$cost){
echo"У персонажа недостаточно еврокредитов для данной операции";
}elseif ($target_user_tel['vip']!=0){
echo"У персонажа уже имееться VIP Account";
}elseif (!empty($target_user_tel['id'])){
mq("UPDATE `users` SET `vip` = '2', `ekr`=`ekr`-'$cost' WHERE `id` = '".$target_user_tel['id']."' LIMIT 1;");
if($_POST['Gold']!=0){
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$target_user_tel['id']."','Gold Account',".(time()+$_POST['Gold']).",70);");
}
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".$target_user_tel['id']."','Купил Gold Account у диллера ".$user['login']." на срок $skolko.',1,'".time()."');");
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Platinum Account #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Platinum Account</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='".$_POST['login']."'></td></tr>
<tr><td>Должность</td><td><select name='Platinum'>
<option value='604800'>Неделя</option>		
<option value='2629743'>Месяц</option>
<option value='0'>Вечно</option>";					
echo "</select></td></tr>
<tr><td><input type=submit value='Присвоить'></td></tr></table>";
echo "</fieldset></form>";				
if (isset($_POST['login']) && isset($_POST['Platinum'])) {
$target_user_tel=mysql_fetch_array(mq("SELECT `id`,`vip`,`ekr` FROM `users` WHERE `login` = '".$_POST['login']."';"));
if ($_POST['Platinum']==604800){
//Срок для личного дела
$skolko = 'Неделю';
//Цена на неделю
$cost = '150';
}elseif ($_POST['Platinum']==2629743){
//Срок для личного дела
$skolko = 'Месяц';
//Цена на месяц
$cost = '350';
}elseif ($_POST['Platinum']==0){
//Срок для личного дела
$skolko = 'Вечно';
//Цена на вечно
$cost = '1000';
}
if ($target_user_tel['ekr']<$cost){
echo"У персонажа недостаточно еврокредитов для данной операции";
}elseif ($target_user_tel['vip']!=0){
echo"У персонажа уже имееться VIP Account";
}elseif (!empty($target_user_tel['id'])){
mq("UPDATE `users` SET `vip` = '3', `ekr`=`ekr`-'$cost' WHERE `id` = '".$target_user_tel['id']."' LIMIT 1;");
if($_POST['Platinum']!=0){
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$target_user_tel['id']."','Platinum Account',".(time()+$_POST['Platinum']).",70);");
}
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".$target_user_tel['id']."','Купил Platinum Account у диллера ".$user['login']." на срок $skolko.',1,'".time()."');");
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Панель радио #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Присвоить Dj</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr>
<td>Должность</td><td><select name='djname'>	
<option value='1'>Присвоить</option>
<option value='(0)'>Убрать</option>
</select></td>
</tr>
<tr><td><input type=submit value='Назначить'></td></tr>
</table>";
echo "</fieldset></form>";

if (isset($_POST['login']) and isset($_POST['djname'])) {	
$user_id=mysql_result(mysql_query("SELECT `id` FROM `users` WHERE `login` ='".$_POST['login']."' LIMIT 1;"),0);	
if(!empty($user_id)){
If ($_POST['djname']==0){
mysql_query("UPDATE `users` SET `radiodj` = '0' WHERE `login` = '".$_POST['login']."';");
echo"<font color=red>Вы убрали статус dj у ".$_POST['login']."!</font><br>";
}else{
mysql_query("UPDATE `users` SET `radiodj` = '1' WHERE `login` = '".$_POST['login']."';");
echo"<font color=red>Вы присвоили статус Dj  ".$_POST['login']."!</font><br>";
}
}
}
##### Орден света #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Принять в орден / поменять крест</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>Крест</td><td><select name='krest'>
<option value='1.1'>Паладин Поднебесья</option>
<option value='1.2'>Инквизитор</option>
<option value='1.4'>Таможенный Паладин</option>
<option value='1.5'>Паладин Солнечной Улыбки</option>
<option value='1.7'>Паладин Огненной Зари</option>
<option value='1.75'>Хранитель Знаний</option>
<option value='1.9'>Паладин Неба</option>
<option value='1.91'>Старший Паладин Неба</option>
<option value='1.92'>Кавалер Ордена</option>";
if (($user['align'] == '2.5') || ($user['align']=='2.6')) {
echo "<option value='1.99'>Верховный Паладин</option>";
}

echo "</select></td></tr>
<tr><td><input type=submit value='Назначить'></td></tr></table>";
echo "</fieldset></form>";
if ($_POST['login'] && $_POST['krest']) {
switch($_POST['krest']){
case 1.1:
$rang = 'Паладин Поднебесья';
break;
case 1.2:
$rang = 'Инквизитор';
break;
case 1.4:
$rang = 'Таможенный Паладин';
break;
case 1.5:
$rang = 'Паладин Солнечной Улыбки';
break;
case 1.7:
$rang = 'Паладин Огненной Зари';
break;
case 1.75:
$rang = 'Хранитель Знаний';
break;
case 1.9:
$rang = 'Паладин Неба';
break;
case 1.91:
$rang = 'Старший Паладина Неба';
break;
case 1.92:
$rang = 'Кавалер Ордена';
break;
case 1.99:
$rang = 'Верховный Паладин';
break;
}
$dd = mysql_fetch_array(mysql_query("SELECT `id`, `login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
if ($user['sex'] == 1) {$action="присвоил";}
else {$action="присвоила";}
if ($user['align'] > '2' && $user['align'] < '3')  {
$angel="Ангел";
}
elseif ($user['align'] > '1' && $user['align'] < '2') {
$angel="Паладин";
}
if($dd) {
mysql_query("UPDATE `users` SET `align` = '".$_POST['krest']."',`status` = '$rang' WHERE `login` = '".$_POST['login']."';");
$target=$_POST['login'];
$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; звание $rang";
mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$dd['id']."','$mess','".time()."');");
mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
}
}
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Принять в Армаду / поменять должность</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>Должность</td><td><select name='tarmanka'>
<option value='3.01'>Тарман-Служитель</option>
<option value='3.05'>Тарман-Надсмотрщик</option>
<option value='3.07'>Тарман-Убийца</option>
<option value='3.09'>Тарман-Палач</option>
<option value='3.091'>Тарман-Владыка</option>
<option value='3.06'>Каратель</option>
<option value='3.075'>Гвардеец-13</option>
<option value='3.092'>Ветеран Армады</option>";
if (($user['align'] == '2.5') || ($user['align']=='2.6')) {
echo "<option value='3.99'>Патриарх</option>";
}
echo "</select></td></tr>
<tr><td><input type=submit value='Назначить'></td></tr></table>";
echo "</fieldset></form>";
if ($_POST['login'] && $_POST['tarmanka']) {
switch($_POST['tarmanka']){
case 3.01:
$rang = 'Тарман-Служитель';
break;
case 3.05:
$rang = 'Тарман-Надсмотрщик';
break;
case 3.07:
$rang = 'Тарман-Убийца';
break;
case 3.09:
$rang = 'Тарман-Палач';
break;
case 3.091:
$rang = 'Тарман-Владыка';
break;
case 3.06:
$rang = 'Каратель';
break;
case 3.075:
$rang = 'Гвардеец-13';
break;
case 3.092:
$rang = 'Ветеран Армады';
break;
case 3.99:
$rang = 'Патриарх';
break;
}
$dd = mysql_fetch_array(mysql_query("SELECT `id`, `login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
if ($user['sex'] == 1) {$action="присвоил";}
else {$action="присвоила";}
if ($user['align'] > '2' && $user['align'] < '3')  {
$angel="Ангел";
}
elseif ($user['align'] > '1' && $user['align'] < '2') {
$angel="Паладин";
}
if($dd) {
mysql_query("UPDATE `users` SET `align` = '".$_POST['tarmanka']."',`status` = '$rang' WHERE `login` = '".$_POST['login']."';");
$target=$_POST['login'];
$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; звание $rang";
mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$dd['id']."','$mess','".time()."');");
mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
}
}

?>
</div>
<div id="tab9" class="tabset_content">
<h2 class="tabset_label">Работа с образами</h2>
<?
##### Добавление образа #####	
echo "<form  method='post' ENCTYPE='multipart/form-data'><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Добавление образа персонажу</legend>
<table><tr><td>Логин/клан</td><td><input type='text' name='shadow_name'></td></tr>
<tr><td>Тип</td><td><select name='shadow_type'>					
<option value='users'>Персонаж</option>	
<option value='clans'>Клан</option>					
</select></td></tr>					
<tr><td>Пол</td><td><select name='shadow_sex'>					
<option value='m'>Мужской</option>	
<option value='w'>Женский</option>					
</select></td></tr>
<tr><td>Картинка: </td><td><input type='file' name='shadow_file'><BR> </td></tr>
<tr><td><input type=submit value='Загрузить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['shadow_name']) and isset($_POST['shadow_type']) and isset($_POST['shadow_sex']) and isset($_FILES['shadow_file'])) {
If ($_POST['shadow_type']=='users'){
$target_user=mysql_fetch_array(mysql_query("SELECT `id`,`login`,`sex` FROM `users` WHERE `login` = '".$_POST['shadow_name']."';"));
If (!empty($target_user['id'])){
if (!file_exists('/var/www/game/data/www/img.old-bk.ru/i/shadow/'.$target_user['sex'].'/'.$_FILES['shadow_file']['name'])) {
$image_info = GetImageSize($_FILES['shadow_file']['tmp_name']);
If ($image_info[0]==120 and $image_info[1]==220){
move_uploaded_file($_FILES['shadow_file']['tmp_name'], '/var/www/game/data/www/img.old-bk.ru/i/shadow/'.$target_user['sex'].'/'.$_FILES['shadow_file']['name']);
mysql_query("INSERT `shadows_".$_POST['shadow_sex']."` (`img`,`nlogin`)VALUES('".($_FILES['shadow_file']['name'])."','".$_POST['shadow_name']."')  ");
echo"<font color=red>Вы добавили персонажу ".$_POST['shadow_name']." образ!</font><br>";
}else{echo "<font color=red>Картинка не стандартного размера! 120x220 (стандарт)</font><br>";}
}else{echo "<font color=red>Картинка уже существует.</font><br>";}
}else{echo"<font color=red>Не был найден персонаж ".$_POST['shadow_name']."!</font><br>";}						
}elseif($_POST['shadow_type']=='clans'){
$target_clan=mysql_fetch_array(mysql_query("SELECT `id` FROM `clans` WHERE `name` = '".$_POST['shadow_name']."';"));	
If (!empty($target_clan['id'])){
If ($_POST['shadow_sex']=='m'){$sex=1;}else{$sex=0;}
if (!file_exists('/var/www/game/data/www/img.old-bk.ru/i/shadow/'.$sex.'/'.$_FILES['shadow_file']['name'])) {
$image_info = GetImageSize($_FILES['shadow_file']['tmp_name']);
If ($image_info[0]==120 and $image_info[1]==220){	
move_uploaded_file($_FILES['shadow_file']['tmp_name'], '/var/www/game/data/www/img.old-bk.ru/i/shadow/'.$sex.'/'.$_FILES['shadow_file']['name']);
mysql_query("INSERT `shadows_".$_POST['shadow_sex']."` (`img`,`nclan`)VALUES('".($_FILES['shadow_file']['name'])."','".$_POST['shadow_name']."')  ");
echo "<br/><font color=red>Вы добавили клану ".$_POST['shadow_name']." образ!</font><br>";								
}else{echo "<font color=red>Картинка не стандартного размера! 120x220 (стандарт)</font><br>";}
}else{echo "<font color=red>Картинка уже существует.</font><br>";}
}else{echo"<font color=red>Не был найден клан ".$_POST['shadow_name']."!</font><br>";}	
}
				}
?>
</div>
<div id="tab10" class="tabset_content">
<h2 class="tabset_label">Админские кнопочки</h2>
<?
##### Телепортирование между городами #####
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Телепортировать между городами</legend>
<table><tr><td>Логин</td><td><input type='text' name='login' value='",$_POST['login'],"'></td></tr>
<tr><td>Город</td><td><select name='teleportcity'>					
<option value='virtcity'>Capital City</option>	
<option value='dungeon'>Abandoned Plain</option>
<option value='suburb'>Angels City</option>
<option value='suncity'>Sun City</option>";

echo "</select></td></tr>
<tr><td><input type=submit value='Телепортировать'></td></tr></table>";
echo "</fieldset></form>";

if (isset($_POST['login']) && isset($_POST['teleportcity'])) {
$target_user_tel=mysql_fetch_array(mysql_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".$_POST['login']."';"));
If (!empty($target_user_tel['id'])){
mysql_query("UPDATE `users` SET `incity` = '".$_POST['teleportcity']."',`room`=20 WHERE `id` = '".$target_user_tel['id']."';");

If ($_POST['teleportcity']=='dungeon'){
mysql_query("UPDATE `online` SET `city` = 'abandonedplain',`room`=20 WHERE `id` = '".$target_user_tel['id']."';");
}else{
mysql_query("UPDATE `online` SET `city` = '".$_POST['teleportcity']."',`room`=20 WHERE `id` = '".$target_user_tel['id']."';");
}

echo"<font color=red>Вы телепортировали персонажа ".$_POST['login']."!</font><br>";	
}else{
echo"<font color=red>Не был найден персонаж ".$_POST['login']."!</font><br>";	
}
}
##### Удаление Айпи #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Подчистить историю IP</legend>
<table><tr><td>IP</td><td><input type='text' name='clear_ip'></td></tr>
<tr><td><input type=submit value='Удалить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['clear_ip'])) {
mysql_query("DELETE from `iplog` WHERE `ip` = '".$_POST['clear_ip']."';");
mysql_query("UPDATE `users` SET `ip` = '' WHERE `ip` = '".$_POST['clear_ip']."' ");
echo"<font color=red>Вы удалили IP ".$_POST['clear_ip']." из базы!</font><br>";
}	

?>
</div>
<div id="tab11" class="tabset_content">
<h2 class="tabset_label">Системки</h2>
<?
##### Системка #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Отправить системное сообщение в чат</legend>
<table><tr><td>Отправить системное сообщение в чат</td><td><input type='text' name='sysmsg' size='100'></td></tr>
<tr><td><input type=submit value='Отправить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['sysmsg'])) {
systemmsg("<font color=#FF0033>[<b>".($user['login'])."</b>]  ".($_POST['sysmsg'])."</font>");
echo"<font color=red>Отправлено системное сообщение в чат.</font><br>";
}
##### Системка Новости #####	
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Отправить системное сообщение новости</legend>
<table><tr><td>ID Новости</td><td><input type='text' name='newsmsg'></td></tr>
<tr><td><input type=submit value='Отправить'></td></tr>
</table></fieldset></form>";					

if (isset($_POST['newsmsg'])) {
systemmsg("<font color=#FF0033>[<b>".($user['login'])."</b>]  ".($_POST['sysmsg'])."</font>");
echo"<font color=red>Отправлено системное сообщение в чат.</font><br>";
}	
?>
</div>
<div id="tab12" class="tabset_content">
<h2 class="tabset_label">Невидимки</h2>
 <?$r=mq("select users.login, users.room, effects.time from effects left join users on users.id=effects.owner where type=1022 and time>".time());
  if (mysql_num_rows($r)>0) {
    echo "<br><br>Невидимки:<table>
    <tr><td><b>Номер</b></td><td><b>Логин</b></td><td><b>Локация</b><td></td></tr>";
    while ($rec=mysql_fetch_assoc($r)) {
      echo "<tr><td>".substr($rec["time"],strlen($rec["time"])-4)."</td><td>$rec[login]</td><td>".$rooms[$rec["room"]]."</td></tr>";
    }
    echo "</table>";
  }?>

</div>
</body>
</html>