<? 
  include "connect.php";
  if((int)date("H") > 5 && (int)date("H") < 22) $now="day";
  else $now="night";
  if (date("H") <=5) {
    $tme=mktime(6, 1,0);
  } elseif (date("H")<22) {
    $tme=mktime(22, 1,0);
  } else {
    $tme=mktime (6, 1, 0, date("n"), date("j")+1);
  }
  $left=$tme-time();
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta http-equiv="imagetoolbar" content="no" />
<script>setTimeout('document.location.href=\'<?=$_SERVER["PHP_SELF"]?>?<?=time()?>\';',<?=($left*1000)?>);</script>
<link href="<?=IMGBASE;?>/i/move/design22.css" rel="stylesheet" type="text/css" />
<title>bestcombats</title>

<script language="javascript" type="text/javascript">

function showtable (tblname) {
    hidesel(tblname);
    hidemenu(0);
    document.getElementById('menu'+tblname).style.display= '';
    document.getElementById('menu'+tblname).style.width = '';
    document.getElementById('menu'+tblname).style.overflow = 'visible';
}

function hidesel (tblname) {
    for (var i=1;i<=5;i++) {
        if (i!=tblname) {document.getElementById('el'+i).style.backgroundColor='';document.getElementById('el'+i).style.color='';}
    }
}

function hidemenu (time) {
    for (var i=1;i<=4;i++) {
        document.getElementById('menu'+i).style.display='none';
        document.getElementById('menu'+i).style.width = '1px';
        document.getElementById('menu'+i).style.overflow = 'hidden';
    }
}

function jumptopath (path,topframe) {
    var rnd=Math.random();
    if (!topframe) {
        top.frames['main'].location.href = ''+path+'';
} else {
top.location.href = ''+path+'';
}
}
function loadpers() {
document.getElementById('el4').style.backgroundColor='#404040';
document.getElementById('el4').style.color='#FFFFFF';
showtable('4');
}
</script>
</head>
<body onload="loadpers();">
<div style="background: url(<?=IMGBASE;?>/i/<?=$now?>/top_lite_cap_11.gif) repeat-x bottom; ">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="background: url(<?=IMGBASE;?>/i/<?=$now?>/top_lite_cap_03.gif) repeat-x top; ">
<tr>
<td align="left"><img height="14" src="<?=IMGBASE;?>/i/<?=$now?>/top_lite_cap_01.gif" width="64" /><SPAN id='mailspan' style="position: absolute"></SPAN></td>
<td rowspan=2 style="text-align: center; vertical-align: middle; width: 100%"></td>
<td align="right" class="main_text"><table cellspacing="0" cellpadding="0" border="0" width="500">
<tr valign="bottom">
<td width="31" height="14"><img height="14" src="<?=IMGBASE;?>/i/<?=$now?>/mennu112_06_lite.gif" width="31" /></td>
<td align="center"><table height="14" cellspacing="0" cellpadding="0" width="100%" background="<?=IMGBASE;?>/i/move/mennu112_06.gif" border="0">
<tr align="middle">
<td id="el1" class="main_text" onclick="this.style.backgroundColor='#404040'; this.style.color='#FFFFFF'; showtable('1');">Знания</td>
<td width="1"><img height="11" src="<?=IMGBASE;?>/i/move/mennu112_09.gif" width="1" /></td>
<td id="el2" class="main_text" onclick="this.style.backgroundColor='#404040'; this.style.color='#FFFFFF'; showtable('2');">Общение</td>
<td width="1"><img height="11" src="<?=IMGBASE;?>/i/move/mennu112_09.gif" width="1" /></td>
<td id="el3" class="main_text" onclick="this.style.backgroundColor='#404040'; this.style.color='#FFFFFF'; showtable('3');">Безопасность</td>
<td width="1"><img height="11" src="<?=IMGBASE;?>/i/move/mennu112_09.gif" width="1" /></td>
<td id="el4" class="main_text" onclick="this.style.backgroundColor='#404040'; this.style.color='#FFFFFF'; showtable('4');">Персонаж</td>
<td width="1"><img height="11" src="<?=IMGBASE;?>/i/move/mennu112_09.gif" width="1" /></td>
<td id="el5" class="main_text" onclick="if (confirm('Выйти из игры?')) top.location.href='index.php?exit=0.560057875997465';">Выход&nbsp;</td>
</tr>
</table></td>
<td width="38"><img height="14" src="<?=IMGBASE;?>/i/<?=$now?>/mennu112_04_lite.gif" width="37" /></td>
</tr>
</table></td>
</tr>
<tr>
<td align="left"><img height="17" src="<?=IMGBASE;?>/i/<?=$now?>/top_lite_cap_07.gif" width="15" /><img height="17" src="<?=IMGBASE;?>/i/<?=$now?>/top_lite_cap_08.gif" width="152" /></td>
<td align="right"><table cellspacing="0" cellpadding="0" width="500" style="background-image:url(<?=IMGBASE;?>/i/<?=$now?>/top_lite_dream_15.gif);" border="0">
<tr>
<td align="left"><img height="17" src="<?=IMGBASE;?>/i/<?=$now?>/top_lite_dream_13.gif" width="20" /></td>
<td valign="top"><table cellspacing="0" cellpadding="0" width="100%" border="0">
<tr>
<td align="right" nowrap="nowrap" class="menutop"><span id="menu1" style="display:none; width:0px; overflow:hidden"> <a class="menutop" onclick="this.blur();" href="encicl" target="_blank">Библиотека</a> | <a class="menutop" onclick="this.blur();" href="/encicl/index.php?section=0&page=error" target="_blank">FAQ</a> | <a class="menutop" onclick="this.blur();" href="/encicl/law.html" target="_blank">Законы</a> | <a class="menutop" onclick="this.blur();" href="/encicl/law.html" target="_blank">Соглашения</a> | <a class="menutop" onclick="this.blur();" href="/encicl/law.html" target="_blank">Правила безопасности</a></span> 
<span id="menu2" style="display:none; width:0px; overflow:hidden"><a class="menutop" onclick="this.blur(); jumptopath('/radio.html'); return false;" href="#" http://stream0.radiostyle.ru:8000/CombatS-2.m3u" target="_blank">Радио</a> | <a class="menutop" onclick="this.blur();" href="forum.php" target="_blank">sms-история</a> | <a class="menutop" onclick="this.blur();" href="forum.php" target="_blank">Телеграммы</a> | <a class="menutop" onclick="this.blur();" href="forum.php" target="_blank">События</a> | <a class="menutop" onclick="this.blur();" href="forum.php" target="_blank">Скроллы</a> | <a class="menutop" onclick="this.blur();" href="/forum.php" target="_blank">Форум</a> | <a class="menutop" onclick="this.blur();" href="reit_pers.php" target="_blank">Рейтинг</a> | <a class="menutop" onclick="this.blur();" href="reit_refer.php" target="_blank">Рейтинг реф</a></span> 
<span id="menu3" style="display:none; width:0px; overflow:hidden"><a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#">Поддержка</a> | <a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#">Отчеты</a> | <a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#">Правила</a> | <a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#">Настройки</a> | <a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#">Смена пароля</a></span> 
<span id="menu4" style="display:none; width:0px; overflow:hidden"><a class="menutop" onclick="this.blur(); jumptopath('/ref.php'); return false;" href="#"><font color=\"red\">Реферальная система</font></a>
<!--| <a class="menutop" onclick="this.blur(); jumptopath('/ferma.php'); return false;" href="#"><font color=gray>Ферма</font></a>  -->
| <a class="menutop" onclick="this.blur(); jumptopath('/main.php?edit=1'); return false;" href="#">Новости</B></A>
<!--| <A class=menutop onclick="this.blur(); jumptopath('/vzarab.php'); return false;" href="#"><B style="COLOR: gray">ВЗаработке</B></A>-->
</span>&nbsp;</td>
</tr>
</table></td>
<td align="right"><img height="17" src="<?=IMGBASE;?>/i/<?=$now?>/top_lite_dream_18.gif" width="22" /></td>
</tr>
</table></td>
</tr>
</table></div><table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" style="background-image:url(<?=IMGBASE;?>/i/<?=$now?>/sand_top_20s.gif); background-repeat:repeat-x;"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td><img src="<?=IMGBASE;?>/i/<?=$now?>/sand_lit_20.gif" width="15" height="6" /><img src="<?=IMGBASE;?>/i/<?=$now?>/sand_top_20s.gif" width="31" height="6" /></td>
<td width="100%"><img src="<?=IMGBASE;?>/i/<?=$now?>/sand_top_20s.gif" width="31" height="6" /></td>
<td><img src="<?=IMGBASE;?>/i/<?=$now?>/sand_lit_27.gif" width="24" height="6" /></td>
</tr>
</table></td>
</tr>
</table>
</body>
</html>
