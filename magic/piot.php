<?php
// magic �������������
	//if (rand(1,2)==1) {
	
$coma[] = "��������� ������� ������� ������� ����������� � �����-������ �����, ����������� ����������.  ";
$coma[] = "� ���� �� �������� ���� �� �����.  ";
$coma[] = "���� ������ ������ �������������, � ���� ����������!  ";
$coma[] = "� ������� �� ���� � �� ��� ���������� ��� �������. ";
$coma[] = "��� �� ��� ����� ";
$coma[] = "������� ������� �� �������, � �������� ������������.  ";
$coma[] = "� ���, ���� ������ ��������, ���� �� ���������.  ";

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`bar`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		mysql_query("select * from `online`  WHERE `id` = '{$tar['id']}';");

		$target=$_POST['target'];
		if ($tar['id']) {
			if ($tar['bar'] == 1) {
				echo "<font color=red><b>�������� \"$target\" ��� � ���� </b></font>";
			}
			else {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] > '1.8' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.8' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				elseif (($user['align'] == '1.7' && $tar['level'] == '0') && !($tar['align'] > '2' && $tar['align'] < '3')) {
					$ok=1;
				}
				if ($user['align'] > '3' && $user['align'] < '4') {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("UPDATE `users` SET `bar`='1',`room`='667' WHERE `id` = {$tar['id']} LIMIT 1;")) {
						mysql_query("UPDATE `online` SET  `room`='667' WHERE `id` = {$tar['id']} LIMIT 1;");

						$ldtarget=$target;
						$ldblock=1;
						if ($user['sex'] == 1) {$action="�����";}
						else {$action="�����";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="�����";
						}
						elseif ($user['align'] > '1' && $user['align'] < '2') {
							$angel="�������";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action ���� � &quot;$target&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action ���� � &quot;$target&quot;..";
						
						addch("<img src=i/magic/piot.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"�����������");
						echo "<font color=red><b>�������� \"$target\" ���������� ����� � ����.</b></font>";			
					} 
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>�� �� �����!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
		}
?>
