<?php
$coma[] = "� ����� ����... ����� � ����? ";
$coma[] = "� ������ ��� ������� �� ������ - ���������� ������ �����������... ��� ������ �����...";
$coma[] = "����������� ����� ��������� ������� ������ �������";
$coma[] = "����������? ���������� � ������� ������������";
$coma[] = "����� �����������!";
$coma[] = "��������� � ���������� - ����� �������� ���� � ������ �� ������";
$coma[] = "���� ���� ���!";
$coma[] = "���� �������, ��� �� ��������";
$coma[] = "��� � ������ 5000 ���: '� ������ �� ���� ������� �� ������' ";
$coma[] = "��������, �������� ������� �����������";

	
		if ($_SESSION['uid'] == null) header("Location: index.php");

		$magictime=time()+($_POST['timer']*60);
		$target=$_POST['target'];
		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '3' LIMIT 1;")); 
			if ($effect['time']) {
				echo "<font color=red><b>�� ��������� \"$target\" ��� ���� �������� ��������� �������� </b></font>";
			}
			else {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] > '1.2' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.2' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				if ($user['align'] > '3' && $user['align'] < '4' || $user['align']>='7.01' && $user['align']<='7.04') {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','�������� ��������� ��������','$magictime',3);")) {
						$ldtarget=$target;
						
						switch($_POST['timer']) {
							case "15": $magictime="15 ���."; break;
							case "30": $magictime="30 ���."; break;
							case "60": $magictime="1 ���."; break;
							case "180": $magictime="3 ����."; break;
							case "360": $magictime="6 �����."; break;
							case "720": $magictime="12 �����."; break;
							case "1440": $magictime="1 �����."; break;
							case "4320": $magictime="3 �����."; break;
							case "10080": $magictime="1 ������."; break;
						}
						if ($user['sex'] == 1) {$action="�������";}
						else {$action="��������";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="��������";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="������";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
						$messch="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
				        $messch="<i><b>���������</b></i> ������� �������� ��������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
						}
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<font color=red><b>��������!</b> </font><img src=http://img.bestcombats.net/pbuttons/sleepf.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"�����������");
						echo "<font color=red><b>������� �������� �������� ��������� �������� �� ��������� \"$target\"</b></font>";			
					} 
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>�� �� ������ �������� �������� ��������� �������� �� ����� ���������!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
		}
?>
