<?php
// magic �������������
	//if (rand(1,2)==1) {
	

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$m = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`married`,`sex`,`login` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$w = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`married`,`sex`,`login` FROM `users` WHERE `login` = '{$_POST['target1']}' LIMIT 1;")); 		
		$muzh=$_POST['target'];
		$zhena=$_POST['target1'];
		if ($m['id'] and $w['id']) {
			if ($m['married']) {
				echo "<font color=red><b>�������� ".$_POST['target']." ��� ������� � �����!<b></font>";
			}
			elseif ($w['married']) {
				echo "<font color=red><b>�������� ".$_POST['target1']." ��� ������� � �����!<b></font>";
			}
			elseif ($m['sex'] != 1) {
				echo "<font color=red><b>������������ ��� ������!<b></font>";
			}
			elseif ($w['sex'] != 0) {
				echo "<font color=red><b>������������ ��� �������!<b></font>";
			}
			else {
				if (($user['align'] > '2' && $user['align'] < '3') || ($user['align'] > '1.6' && $user['align'] < '2')  || $user['align'] == '3.99') {
					if (mysql_query("UPDATE `users` SET `married`='{$_POST['target1']}' WHERE `id` = '{$m['id']}' LIMIT 1;") && mysql_query("UPDATE `users` SET `married`='{$_POST['target']}' WHERE `id` = '{$w['id']}' LIMIT 1;")) {
						$mess="����������� ����� ����� &quot;$muzh&quot; � &quot;$zhena&quot;, ����������� &quot;{$user['login']}&quot;.";
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$m['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$w['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						echo "<font color=red><b>������� ��������������� ���� ����� \"$muzh\" � \"$zhena\"!</b></font>";	
					}
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>�� �� ������ ���������������� ����!<b></font>";	
				}
			}
		}
		else {
			echo "<font color=red><b>�������� \"$muzh\" ��� \"$zhena\" �� ����������!<b></font>";
		}
?>
