<?php
// ����� ������� �� �����
		if ($_SESSION['uid'] == null) header("Location: index.php");
		if ($user['spellfreedom']==1) {
		echo"�������� ��� ���������� ����� �����";
		}
		elseif ($user['vip']==1) {
		echo"VIP �������� �� ����� �������� ������ ������";
		}
		elseif ($user['align']> '1' && $user['align']< '2') {
		echo"������� �� ����� ������������ ������ ������";
		}
		elseif ($user['align']> '3' && $user['align']< '3') {
		echo"������ �� ����� ������������ ������ ������";
		}
		elseif ($user['align']=='4') {
		echo"������� �� ����� �������� ������ ������";
		}
		else{
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
		$magictime=time()+(180*60*1440);		
		if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','����� �������','$magictime',22);")) {
		mysql_query("DELETE FROM`effects` WHERE `owner` = '{$user['id']}' and `type` = '10' LIMIT 1 ;");
		mysql_query("UPDATE `users` SET  `spellfreedom`='1' WHERE `id` = {$user['id']} LIMIT 1;");						
		$ldtarget=$user['login'];
		$ldblock=1;
		if ($user['sex'] == 1) {$action="��������";}
		else {$action="���������";}
		if ($user['sex'] == 1)  {$pol="���� ���������";}
		else {$pol="����� ���������";}
		$mess="�������� &quot;{$user['login']}&quot; $action ����� ��������� ����� � $pol.";
		$messch="�������� &quot;{$user['login']}&quot; $action ����� ��������� ����� � $pol.";						
		mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','$mess','".time()."');");
		addch("<img src=i/magic/freedom180.gif> $messch");
		echo "<font color=red><b>�������� \"{$user['login']}\" ��������</b></font>";			
		}
		else {
		echo "<font color=red><b>�� �� ������ �������� ����� ��������� ����� �� ����� ���������!<b></font>";
		}
	$bet=1;
}
?>