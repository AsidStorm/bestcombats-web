<?php
if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['sex'] == 1) {$action="присвоил";}	else {$action="присвоила";}			
mysql_query("UPDATE `users` SET `align`='7' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
addch("<img src=i/magic/dneit.gif> Ангел &quot;{$user['login']}&quot; ".$action." нейтральную склонность персонажу &quot;{$_POST['target']}&quot;");

 echo "<font color=red><b>Успешно присвоена Нейтральная Склонность<b></font>";
?>