<?php
//����� +2000
 if ($_SESSION['uid'] == null) header("Location: index.php");
if ($user[vip]!=1) {
echo"������ vip ����� �������� ����";
}else{
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
mysql_query("UPDATE `users` SET `exp`=`exp`+'2000' WHERE `login` = '{$user['login']}' LIMIT 1;");
$mess="�������� &quot;{$user['login']}&quot; ������� ���� ���� �� +2000 ������� ����������.";					
mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','$mess','".time()."');");

 
 echo "<font color=red><b>��� ���� ��� �������� �� 2000<b></font>";
 $bet=1;
?>