<?php
//Экспа +2000
 if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
mysql_query("UPDATE `users` SET `exp`=`exp`+'2000' WHERE `login` = '{$user['login']}' LIMIT 1;");
$mess="Персонаж &quot;{$user['login']}&quot; повысил свой опыт на +2000 свитком разрешения.";					
mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','$mess','".time()."');");

 
 echo "<font color=red><b>Ваш опыт был увеличен на 2000<b></font>";
 $bet=1;
?>