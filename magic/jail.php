<?php
// magic �������������	
$coma[] = "� ���� ��� �������?!";
$coma[] = "��, � ���� ��� ����� � ������ ���� ���. ";
$coma[] = "����� ������, �� ����������!";
$coma[] = "����� ����� ������� �����, � �� ����!";
$coma[] = "� � ���� �������� � ����� �������... ";
$coma[] = "��� � ���� ���� �� ";
$coma[] = "�� ������� � ���� ��������, �� ����!";
$coma[] = "� ���� ���� ����� �������";
$coma[] = "������ ��� ����, ��� ��� ������� ������???";
$coma[] = "������ ���� ������ �������� �� ��������.";
$coma[] = "���, ��� �������� ����� ������, �� ����� ������ ������ �� ���.";
$coma[] = "����� ��� ������, � ����� ���� ���������. ";
$coma[] = "���� ��������� ";
$coma[] = "� ������ �� �����.";
$coma[] = "������ ���� ���������, ������ �������!";
$coma[] = "��-��-��, ����� ���� ����� ���! ";
$coma[] = "��������� ��� �����, � �� ��� ����� �����������. ";
$coma[] = "����. ������� ��� �� ����������. ";
$coma[] = "����� �����������!";


		if ($_SESSION['uid'] == null) header("Location: index.php");

		$magictime=time()+($_POST['timer']*60*1440);
		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`prison`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		mysql_query("select * from `online`  WHERE `id` = '{$tar['id']}';");
		$target=$_POST['target'];
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '21' LIMIT 1;")); 
			
			if ($effect['time']) {
				$time_still=$effect['time'] - time();
				$time_new=$magictime - time();
				if ($time_still < $time_new) {
					$ok=0;
					if (($user['align'] > '2' && $user['align'] < '3') || $user['align'] == '777') {$ok=1;}
					elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
						$ok=1;
					}
					elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
					}
				    elseif ($user['align'] > '3' && $user['align'] < '4') {
					$ok=1;
				    }
                    elseif (($user['align'] > '3.06' && $user['align'] < '4') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
					}
					elseif (($user['align'] > '3.06' && $user['align'] < '4') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
                                                                                }
					if ($ok == 1) {
						if (mysql_query("UPDATE `effects` SET `time`='$magictime' WHERE `id` = '{$tar['id']}' LIMIT 1;")) {
							$ldtarget=$target;
							$ldblock=1;
						
							switch($_POST['timer']) {
								case "1": $magictime="���� ����."; break;
								case "2": $magictime="��� ���."; break;
								case "3": $magictime="��� ���."; break;
								case "7": $magictime="������."; break;
								case "14": $magictime="��� ������."; break;
								case "30": $magictime="�����."; break;
								case "60": $magictime="��� ������."; break;
								case "365": $magictime="���������."; break;
							}
							if ($user['sex'] == 1) {$action="��������";}
							else {$action="���������";}
							if ($user['nevid'] == '1') {
                        $angel="���������";
                        }
                        elseif ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="������";
						}
							$mess="��������� ���������. $angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime";
							$messch="��������� ���������. $angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime.";
						    if ($user['invis'] == '1') {
						$mess="��������� ���������. $angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime";
						$messch="��������� ���������. &quot;���������&quot; �������� � ��������� ��������� &quot;$target&quot; ������ $magictime";
                        }
							mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
							mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
							addch("<img src=i/magic/jail.gif> $messch");
							addchp($coma[rand(0,count($coma)-1)],"�����������");
							echo "<font color=red><b>�������� \"$target\" ��������� � ���������</b></font>";	
						}
						else {
							echo "<font color=red><b>��������� ������!<b></font>";
						}
					}
					else {
						echo "<font color=red><b>�� �� ������ ��������� � ��������� ����� ���������!<b></font>";	
					}
				}
				else {
					echo "<font color=red><b>�� �� ������ ��������� ���� ���������!</b></font>";
				}
			}
			else {
				$ok=0;
				if ($user['align'] > '2' && $user['align'] < '3') {
					$ok=1;
				}
				elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
                elseif (($user['align'] > '3.06' && $user['align'] < '4') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
				$ok=1;
					}
				elseif (($user['align'] > '3.06' && $user['align'] < '4') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
                                                                                }
				if ($ok == 1) {
					if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','���������','$magictime',21);")) {
					        include "functions/wake.php";
					        wake($tar['id']);
						mysql_query("UPDATE `users` SET  `prison`='1', `room`='666' WHERE `id` = {$tar['id']} LIMIT 1;");
						mysql_query("UPDATE `online` SET  `room`='666' WHERE `id` = {$tar['id']} LIMIT 1;");
						
						$ldtarget=$target;
						$ldblock=1;
						
						switch($_POST['timer']) {
							case "1": $magictime="���� ����."; break;
							case "2": $magictime="��� ���."; break;
							case "3": $magictime="��� ���."; break;
							case "7": $magictime="������."; break;
							case "14": $magictime="��� ������."; break;
							case "30": $magictime="�����."; break;
							case "60": $magictime="��� ������."; break;
							case "365": $magictime="���������."; break;
						}
						if ($user['sex'] == 1) {$action="��������";}
						else {$action="���������";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="������";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime";
						$messch="$angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action � ��������� ��������� &quot;$target&quot; ������ $magictime";
						$messch="&quot;���������&quot; �������� � ��������� ��������� &quot;$target&quot; ������ $magictime";
                        }
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/jail.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"�����������");
						echo "<font color=red><b>�������� \"$target\" ��������� � ���������</b></font>";			
					} 
					else {
						echo "<font color=red><b>��������� ������!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>�� �� ������ ��������� � ��������� ����� ���������!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
		}
?>
