<?php
// магия "шаг назад"
if (rand(1,100)!=1) {
	
	if ($_SESSION['uid'] == null) header("Location: index.php");
	
	mysql_query("UPDATE `users` SET `hp`=`maxhp` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;");
	
	echo "<font color=red><b>Вы подкрепили свои силы...<b></font>";
	$bet=1;
}
?>