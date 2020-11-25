<?php
//Клан опыт 2500
if ($_SESSION['uid'] == null) header("Location: index.php");
if ($klan['clanlevel']>5) {
echo"Только кланы до 5 уровня могут использовать этот свиток";
}else{
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
$klan = mysql_fetch_array(mysql_query("SELECT * FROM `clans` WHERE `name` = '{$user['klan']}' LIMIT 1;"));
mysql_query("UPDATE `clans` SET `clanexp`=`clanexp`+'2500' WHERE `name` = '{$user['klan']}' LIMIT 1;");

echo "<font color=red><b>Ваш кланопыт был увеличен на 2500<b></font>";
$bet=1;
}
?>