<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
?>
<form action="" method="post">
<input name="ddd" type="submit" value="Удалить">
</form>
<?
if($_POST['ddd']){
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='Гайка'");
mysql_query("UPDATE `inventory` SET present='',podzem='1',name='Вентиль' WHERE name='Винтель'");
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='Ключиик'");
mysql_query("UPDATE `inventory` SET present='',podzem='1' WHERE name='Болт'");
mysql_query("UPDATE `inventory` SET present='',podzem='1',cost='0',massa='1',name='Жетон' WHERE name='Житон'");
print"Удалено!";
}
?>