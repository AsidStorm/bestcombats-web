<?php
if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['sex'] == 1) {$action="��������";}	else {$action="���������";}			
mysql_query("UPDATE `users` SET `align`='0.98' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
addch("<img src=i/magic/ddark.gif> ����� &quot;{$user['login']}&quot; ".$action." ������ ���������� ��������� &quot;{$_POST['target']}&quot;");

 echo "<font color=red><b>������� ��������� ������ ����������<b></font>";
?>