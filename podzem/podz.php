<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
?>
<form action="" method="post">
<input name="ddd" type="submit" value="�������">
</form>
<?
if($_POST['ddd']){
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='�����'");
mysql_query("UPDATE `inventory` SET present='',podzem='1',name='�������' WHERE name='�������'");
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='�������'");
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='����'");
mysql_query("UPDATE `inventory` SET present='',podzem='1',cost='0',massa='1',name='�����' WHERE name='�����'");
print"�������!";
}
?>