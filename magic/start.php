<?php
		if ($_SESSION['uid'] == null) header("Location: index.php");
		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$target=$_POST['target'];		
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '10' LIMIT 1;")); 
			if ($effect['time']) {
				$ok=0;
				if ($user['align'] > 2 && $user['align'] < 3) {
					$ok=1;
}
				if ($ok == 1) {
					if (mysql_query("DELETE FROM`effects` WHERE `owner` = '{$tar['id']}' and `type` = '10' LIMIT 1 ;")) {
						if ($user['sex'] == 1) {$action="����";}
						else {$action="�����";}
						if ($user['align'] > 2 && $user['align'] < 3) {
							$angel="�����";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action ���� � &quot;$target&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action ���� � &quot;$target&quot;.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action ���� � ��������� &quot;$target&quot;.";
						$messch="&quot;���������&quot; ���� � ��������� &quot;$target&quot;.";
                        }
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/chainsoff.gif> $messch");
						echo "<font color=red><b>������� ����� ���� � ��������� \"$target\"</b></font>";
			
					}
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					      }
				}
				else {
					echo "<font color=red><b>�� �� ������ ����� ���� � ����� ���������!<b></font>";
				     }
			}
			else {
				echo "<font color=red><b>�� ��������� \"$target\" ��� ��� </b></font>";
			     }
}
		else {
			echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
		     }
?>
