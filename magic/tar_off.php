<?php
// magic �������������
	//if (rand(1,2)==1) {

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		$target=$_POST['target'];
		if ($tar['id']) {
			if ($tar['align'] > '3' && $tar['align'] < '4') {
				$ok=0;
				if ($user['align'] > '2' && $user['align'] < '3') {
					$ok=1;
				}
				elseif (($user['align'] == '3.99') && ($tar['align'] != '3.99')) {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("UPDATE `users` SET `align`='0' WHERE `id` = {$tar['id']} LIMIT 1;")) {
						if ($user['sex'] == 1) {$action="�����";}
						else {$action="������";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="�����";
						}
						elseif ($user['align'] > '3' && $user['align'] < '4') {
							$angel="������";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; ������ &quot;������&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; ������ &quot;������&quot;.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; ������ &quot;������&quot;.";
						$messch="&quot;���������&quot; ����� ������ ������ ��������� &quot;$target&quot;..";
                        }
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/tar_off.gif> $messch");
						echo "<font color=red><b>�������� \"$target\" ����� ������ \"������\"</b></font>";			
					}
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>�� �� ������ ����� ���������� ����� ���������!<b></font>";
				}
			}
			else {
				echo "<font color=red><b>�������� \"$target\" �� ������� � ������ </b></font>";
			}
		}
		else {
			echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
		}
?>
