<?php
//���� ���� 1000
if ($_SESSION['uid'] == null) header("Location: index.php");
if ($klan['clanlevel']>5) {
echo"������ ����� �� 5 ������ ����� ������������ ���� ������";
}else{
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
$klan = mysql_fetch_array(mysql_query("SELECT * FROM `clans` WHERE `name` = '{$user['klan']}' LIMIT 1;"));
mysql_query("UPDATE `clans` SET `clanexp`=`clanexp`+'1000' WHERE `name` = '{$user['klan']}' LIMIT 1;");

echo "<font color=red><b>��� �������� ��� �������� �� 1000<b></font>";
$bet=1;
}
?>