<?php
  session_start();
  include "connect.php";
  include "functions.php";
  $_SERVER['QUERY_STRING']=str_replace("%20"," ",$_SERVER['QUERY_STRING']);
  $us = " `name` = '{$_SERVER['QUERY_STRING']}' or `short` = '{$_SERVER['QUERY_STRING']}' ";
  $klan = mysqli_fetch_array(db_query("SELECT * FROM `clans`  WHERE {$us} LIMIT 1;"));
  $klan["members"]=unserialize($klan["members"]);
  foreach ($klan["members"] as $k=>$v) {
    $klan["members"][$k]["klan"]=$klan["short"];
    $v["klan"]=$klan["short"];
    $members[$v["id"]]=$v;
  }
  $usr ="{$_SERVER['QUERY_STRING']}";
  $_SERVER['QUERY_STRING'] = $klan;
  if($klan['name'] == NULL) {
    $usr = htmlspecialchars($usr);

        ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Language" content="ru">
<TITLE>Произошла ошибка</TITLE></HEAD><BODY text="#FFFFFF"><p><font color=black>
Произошла ошибка: <pre>Нет информации о клане "<?=$usr?>" в этом городе</pre>
<b><p><a href = "javascript:window.history.go(-1);">Назад</b></a>
<HR>
<p align="right">(c) <a href="/">Бойцовский Клуб</a></p>
</body></html>
<?
        die();
    }
?>
<HTML>
<HEAD>
<title>Информация о клане <?=$klan['name']?></title>
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<link href="http://img.bestcombats.net/css/design3.css" rel="stylesheet" type="text/css">
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style type="text/css">
img.pnged {
behavior:   url(http://img.bestcombats.net/pngbehavior.htc);
}
</style>
</HEAD>
<body style="margin:10px; margin-top:5px; background-image: url(http://img.bestcombats.net/klan/<?=$klan['clanbig']?>.gif); background-repeat:no-repeat; background-position: top right" bgcolor=e2e0e0>
<table width="100%" cellpadding=0 cellspacing=0 border=0>
<?if ($klan['guard']==1) {?>
<tr><td colspan=2 align=center>Информация о клане <img src="http://img.bestcombats.net/clans/guard.gif" alt="Гвардейский клан"> "<b><?=$klan['name']?></b>"</td></tr>
<?}else{?>
<tr><td colspan=2 align=center>Информация о клане  "<b><?=$klan['name']?></b>"</td></tr>
<?}?>
</table>
<table width="100%" cellpadding=0 cellspacing=0 border=0>
<tr>
<td width="50%">Уровень: <FONT color=#007200><B><?=$klan['clanlevel']?></B></FONT></td>
<td width="50%">
Знак клана: <img src="http://img.bestcombats.net/klan/<?=$klan['short']?>.gif"> Склонность: <img src="http://img.bestcombats.net/align/align_<?=$klan['align']?>.gif">
</td>
</tr>
<tr>
<td>Рейтинг: <a style='color: #007200;'><?=$klan['clanreit']?></td>
<?
if ($klan['clandem']==0) {
echo'<td>Тип правления: <FONT color=#007200><B>неизвестно</B></FONT></td>';
}elseif ($klan['clandem']==1) {
echo'<td>Тип правления: <FONT color=#007200><B>Анархия</B></FONT></td>';
}elseif ($klan['clandem']==2) {
echo'<td>Тип правления: <FONT color=#007200><B>Монархия</B></FONT></td>';
}elseif ($klan['clandem']==3) {
echo'<td>Тип правления: <FONT color=#007200><B>Диктатура</B></FONT></td>';
}elseif ($klan['clandem']==4) {
echo'<td>Тип правления: <FONT color=#007200><B>Демократия</B></FONT></td>';
}
?>
</tr>
<tr>
<td>Девиз клана: <B><?=$klan['deviz']?></B></td></tr>
<tr>
<td colspan=2 align=center style='padding-right: 150px;'><hr></td>
</tr>
<tr valign=top>
<td>
Глава клана:
<?
  echo clannick3($klan["glava"]);
?>
<? if ($klan['homepage']) {?>
<hr style='margin-right: 15px;'>Сайт Клана: <strong><?
  if (strpos($klan['homepage'],"http")!==false) echo "<a  href=\"$klan[homepage]\" target=\"_blank\">$klan[homepage]</a>";
  else echo "<a  href=\"http://$klan[homepage]\" target=\"_blank\">$klan[homepage]</a>";
?></strong><br>
<?}?>
<td>
Бойцы клана:
<?
					$data=db_query("SELECT `id`, `login`,`level`,`align` FROM `users` WHERE `klan` = '".$klan['short']."' order by level DESC, login asc ;");
					while ($row = mysqli_fetch_array($data)) {
							echo '<br>';
							nick2($row['id']);
}

$R_ONLINE = db_query("SELECT `klan` FROM users WHERE `klan` = '{$klan['short']}';");
$total = 0;
        while(mysqli_fetch_array($R_ONLINE)){
        $total++;
        }
?>
<br>Всего: <b><?=$klan["cnt"]?></b>
</td>
</tr>
<tr>
<td colspan=2 align=right>
<a href="clanreit.php">таблица кланов</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</HTML>