<?
		if ($_SESSION['uid'] == null) header("Location: index.php");
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
		if ($user['sex'] == 1) {$action="������";}	else {$action="�������";}
		addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' '.$action.' ��� �� �������� ����������� ����...<BR>');		
		mysql_query("UPDATE battle SET `closed` = '1' WHERE `id`= '{$user['battle']}';");
		$bet=1;
?>