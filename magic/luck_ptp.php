<?php
// пропуск забытых

if ($_SESSION['uid'] == null) header("Location: index.php");
        $tar = mysqli_fetch_array(db_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        if ($tar['id']) {
		db_query("DELETE FROM visit_podzem WHERE login='".db_escape_string($user['login'])."'");
		db_query("DELETE FROM visit_podzemm WHERE login='".db_escape_string($user['login'])."'");
		db_query("DELETE FROM visit_podzem_a WHERE login='".db_escape_string($user['login'])."'");
		db_query("DELETE FROM visit_podzem_b WHERE login='".db_escape_string($user['login'])."'");
		//db_query("DELETE FROM visit_podzem_l WHERE login='".db_escape_string($user['login'])."'");
		db_query("DELETE FROM visit_podzem_g WHERE login='".db_escape_string($user['login'])."'");
        echo "<font color=red><b>\"{$user['login']}\"  использовал заклятие \"Пропуск Забытых\" </b></font>";
        $bet=1;
		}
?>