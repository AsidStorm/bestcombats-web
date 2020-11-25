<?
		if ($_SESSION['uid'] == null) header("Location: index.php");
		$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
		if ($user['sex'] == 1) {$action="закрыл";}	else {$action="закрыла";}
		addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' '.$action.' бой от внешнего физического мира...<BR>');		
		db_query("UPDATE battle SET `closed` = '1' WHERE `id`= '{$user['battle']}';");
		$bet=1;
?>