<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT login FROM `users` WHERE `id` = '".$_SESSION['uid']."' LIMIT 1;"));
	if ($user['login']=="actro") {

?>
<form action="" method="post">
<textarea name="zadanie" cols="50" rows="10"></textarea><br />

для какого лвл<br />

<input name="lvl" type="text" /><br />

Награда за выполнение в ед.<br />

<input name="ed" type="text" /><br />

Убить коллич. ботов<br />

<input name="ubit" type="text" /><br />
<input name="ok" type="submit" value="Создать" />
</form>

<?

 if ($_POST['ok']) {
	if (mysql_query("insert into podzem_zad (zadanie,lvl,ed,ubit) values ('".mysql_real_escape_string($_POST['zadanie'])."','".mysql_real_escape_string($_POST['lvl'])."','".mysql_real_escape_string(_POST['ed'])."','".mysql_real_escape_string($_POST['ubit'])."');")) 	{	echo "OK";	}
else { echo "NO";}
 
 }
}
?>