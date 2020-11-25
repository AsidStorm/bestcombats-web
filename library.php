<?php
	include "connect.php";
	include "functions.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<script LANGUAGE='JavaScript'>
document.ondragstart = test;
//запрет на перетаскивание
document.onselectstart = test;
//запрет на выделение элементов страницы
document.oncontextmenu = test;
//запрет на выведение контекстного меню
function test() {
 return false
}
</SCRIPT>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Бойцовский клуб | Библиотека</title>
<link href="i/main2.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#000000" topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign=top>
    <td><table width="100%" height="135"  border="0" cellpadding="0" cellspacing="0">
<td background="register/sitebk_02.jpg" scope="col" align="center"><img src="register/sitebk_03ru.gif" width="194" height="135" border="0" /></a></td>
        <tr>
          <td background="i/sitebk_02.jpg" scope="col" align=center><!--<img src="i/sitebk_03ru.gif" width="194" height="135" border=0>--></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor='#3D3D3B'>
  <tr valign=top>
    <td></td>
    <td align=center><SCRIPT>
wsize=document.body.clientWidth;
if (wsize >= 800 ) wsize=Math.floor(wsize*0.8);
if (wsize < 700) wsize=700;
document.write('<table cellspacing=0 cellpadding=0 bgcolor=#f2e5b1 border=0 width='+(wsize-20)+'>');

</SCRIPT>
  <tr valign=top>
    <td width="29" rowspan=2 background="i/n21_08_1.jpg"><img src="i/encicl/pictlr_axe.jpg" width="29" height="256"></td>
    <td width="118" align="left"><img id="imleft" src="i/encicl/pictl_axe.jpg" width="118" height="257"><BR>
    </td>
    <td rowspan=2 align="left"><!-- Begin of text -->      
      <p><b><br>
        <!--&gt;&gt;</b> <a href="../index.html">Содержание</a> / <a href="../subjects.html">Предметы</a> / <a href="../weapon.html">Оружие</a> / <a href="../axe.html">Топоры</a> / <b><i>Топор Паука</i></b> -->
      <p>
	  <?
	  if($_GET['a']==2){$data = mysql_query("SELECT * FROM `shop_luka` WHERE `id`='".(int)$_GET['id']."' ORDER by `nlevel` ASC");
	$row = mysql_fetch_array($data);}
	elseif($_GET['a']==1){$data = mysql_query("SELECT * FROM `berezka` WHERE `id`='".(int)$_GET['id']."' ORDER by `nlevel` ASC");
	$row = mysql_fetch_array($data);}
	else{$data = mysql_query("SELECT * FROM `shop` WHERE `id`='".(int)$_GET['id']."' ORDER by `nlevel` ASC");
	$row = mysql_fetch_array($data);}
	if($row['id']!=$_GET['id']){die('Not found');}
		//if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		//echo "<TR><TD align=center style='width:150px'><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
		
		//echo "<TD valign=top>";?>
		

	

      <h2><?=$row['name']?></h2>
      <br />
      <img src="i/encicl/ln3.jpg" width="400" height="1">
      </p>
      
      <p align="center">&nbsp;</p>
      <BR>
      <table width="504" border="0" align=center cellpadding="0" cellspacing="0">
        <tr>

          <td align=left valign="top">
	
	<table width="95%"  border="0" align="center" cellpadding="3" cellspacing="0" class="inup3">
        <tr>
        <td>
	
	<? showitem_lib($row);?>
	
	
	</td>

        </tr>
      </table>

	</tr>
      </table>
      
      <!-- End of text -->
    <td style='padding-left: 3' align=right><img id="imright" height=144 src="i/encicl/pict_subject.jpg" width=139 border=0></td>

    <td valign=top background="i/nnn21_03_1.jpg">&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr valign=top>
    <td></td>
    <td valign=center style="padding-bottom:50" align="right"><IMG height=236 src="i/encicl/pictr_axe.jpg" width=128 border=0></td>
    <td width="23" valign=top background="i/nnn21_03_1.jpg">&nbsp;</td>
  </tr>
</table>
</td>
<td></td>

</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor=#000000>
  <TR>
    <TD colspan=3 width="100%" height=13 background="i/sitebk_07.jpg"></TD>
  </TR>
  <tr valign=top>
    <td width="20%"><div align="center">
        
      </div></td>

    <td align=center valign=middle><div align="center"><NOBR><span class="style6">Copyright © 2010-2011 «www.vr-bk.net.ru»</span></NOBR></div></td>
    <td width="20%"></td>
  </tr>
</table>
</body>
</html>