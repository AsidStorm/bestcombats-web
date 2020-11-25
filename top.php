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
<td id="el5" class="main_text" onclick="if (confirm('Выйти из игры?')) top.location.href='index.php';">Выход&nbsp;</td>
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
<td align="right" nowrap="nowrap" class="menutop"><span id="menu1" style="display:none; width:0px; overflow:hidden"> <a class="menutop" onclick="this.blur();" href="http://lib.bestcombats.net/index.html" target="_blank"><font color=\"blue\">Библиотека</font></a></span> 
<span id="menu2" style="display:none; width:0px; overflow:hidden"> <a class="menutop" onclick="this.blur(); jumptopath('/radio2.htm'); return false;" href="#"><font color=\"blue\">Радио</font></a> | <a class="menutop" onclick="this.blur();" href="/forum.php" target="_blank"><font color=\"blue\">Форум</font></a> | <a class="menutop" onclick="this.blur();" href="http://scrolls.bestcombats.net/" target="_blank"><font color=\"blue\">Скроллы</font></a> | <a class="menutop" onclick="this.blur();" href="http://top.bestcombats.net/#players" target="_blank"><font color=\"blue\">Рейтинг</font></a></span> 
<span id="menu3" style="display:none; width:0px; overflow:hidden"><a class="menutop" onclick="this.blur(); jumptopath('/main.php?changepsw=1'); return false;" href="#"><font color=\"blue\">Смена пароля</font></a> | <a class="menutop" onclick="this.blur();" href="http://support.bestcombats.net/" target="_blank"><font color=\"blue\">Поддержка</font></a></span> 
<span id="menu4" style="display:none; width:0px; overflow:hidden"><a class="menutop" onclick="this.blur(); jumptopath('/ref.php'); return false;" href="#"><font color="#f53526">Реферальная Система</font></a>
| <a class="menutop" onclick="this.blur(); jumptopath('/main.php?edit=1'); return false;" href="#"><font color=\"blue\">Инвентарь</font></a> | <a class="menutop" onclick="this.blur(); jumptopath('/umenie.php'); return false;" href="#"><font color=\"blue\">Умения</font></a> | <a class="menutop" onclick="this.blur(); jumptopath('/main.php?edit=1&transreport=1'); return false;" href="#"><font color=\"blue\">Отчет о переводах</font></a> | <a class="menutop" onclick="this.blur(); jumptopath('/zayavka.php'); return false;" href="#"><font color=\"blue\">Поединки</font></a> | <a class="menutop" onclick="this.blur();" href="/register.php?edit=1" target="_blank"><font color=\"blue\">Анкета</font></a> | 
<a class="menutop" onclick="this.blur();" href="http://events.bestcombats.net/" target="_blank"><font color=\"blue\">Новости</font></a>

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