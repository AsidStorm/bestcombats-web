<?php
// пропуск забытых

if ($_SESSION['uid'] == null) header("Location: index.php");
        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        if ($tar['id']) {
		mysql_query("DELETE FROM visit_podzem WHERE login='".mysql_real_escape_string($user['login'])."'");
		mysql_query("DELETE FROM visit_podzemm WHERE login='".mysql_real_escape_string($user['login'])."'");
		mysql_query("DELETE FROM visit_podzem_a WHERE login='".mysql_real_escape_string($user['login'])."'");
		mysql_query("DELETE FROM visit_podzem_b WHERE login='".mysql_real_escape_string($user['login'])."'");		
		//mysql_query("DELETE FROM visit_podzem_l WHERE login='".mysql_real_escape_string($user['login'])."'");	
		mysql_query("DELETE FROM visit_podzem_g WHERE login='".mysql_real_escape_string($user['login'])."'");		
        echo "<font color=red><b>\"{$user['login']}\"  использовал заклятие \"Пропуск Забытых\" </b></font>";
        $bet=1;
		}
?>