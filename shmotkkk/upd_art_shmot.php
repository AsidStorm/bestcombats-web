<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";
	mysql_fetch_array(mysql_query("SELECT * FROM `berezka` WHERE `count` >='0'"));
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']>2 && ($user['align']<3)) {
?>
<form method=post action="upd_art_shmot.php">
<table>
<tr><td>Название </td><td><input type=text name=name value=''> </td></tr>
<b>Дает Параметры</b>
<table>
<tr><td>Мф. Мощности Крита </td><td><input type=text name=mfkritpow  value="0"></td></tr>
<tr><td>Мф. Против Мощ. Крита </td><td><input type=text name=mfantikritpow  value="0"></td></tr>
<tr><td>МФ. Парирования </td><td><input type=text name=mfparir  value="0"></td></tr>
<tr><td>Мф. Блока Щитом </td><td><input type=text name=mfshieldblock  value="0"></td></tr>
<tr><td>МФ. Контрудара </td><td><input type=text name=mfcontr  value="0"></td></tr>
<tr><td>Мф. Рубящий урон </td><td><input type=text name=mfrub  value="0"></td></tr>
<tr><td>Мф. Колюий урон </td><td><input type=text name=mfkol  value="0"></td></tr>
<tr><td>Мф. Дробящий урон </td><td><input type=text name=mfdrob  value="0"></td></tr>
<tr><td>Режуий урон </td><td><input type=text name=mfrej  value="0"></td></tr>
<tr><td>Защита от урона </td><td><input type=text name=mfdhit  value="0"></td></tr>
<tr><td>Защита от магии </td><td><input type=text name=mfdmag  value="0"></td></tr>
<tr><td>Цена </td><td><input type=text name=ecost  value="0"></td></tr>

</table>
<INPUT TYPE="submit" value=" Обновить вещь ">
</form>
<?
 if ($_POST['name']) {
	if (mysql_query("UPDATE berezka SET mfkritpow = '".$_POST['mfkritpow']."',mfantikritpow = '".$_POST['mfantikritpow']."',mfparir = '".$_POST['mfparir']."',mfshieldblock = '".$_POST['mfshieldblock']."',mfcontr = '".$_POST['mfcontr']."',mfrub = '".$_POST['mfrub']."',mfkol = '".$_POST['mfkol']."',mfdrob = '".$_POST['mfdrob']."',mfrej = '".$_POST['mfrej']."',mfdhit = '".$_POST['mfdhit']."',mfdmag = '".$_POST['mfdmag']."',ecost = '".$_POST['ecost']."' WHERE name = '".$_POST['name']."';")) 	{
	echo "OK";
	}
else { echo "NO";}
 }
}
?>