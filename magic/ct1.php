<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		
$owntravma = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$us['id']." AND `type`=11;"));	
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '19' ;"));	

if ($user['intel'] >= 4) {
		$int=$magic['chanse'] + ($user['intel'] - 4)*3;
		if ($int>98){$int=99;}
	}
else {$int=0;}
	

	
if ($user['battle'] > 0) {
	echo "�� � ���...";
} elseif ($us['battle'] > 0) {
	echo "�������� � ���...";
} elseif (!$owntravma['id']) {
	echo "� ��������� ��� ������ �����...";
} elseif ($user['room'] != $us['room']) {
	echo "�������� � ������ �������!";
} elseif (!$us['online']) {
	echo "�������� �� � ����!";
} elseif (rand(1,100) < $int) {		
		
			if ($user['sex'] == 1) {$action="�������";}
			else {$action="��������";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="�����";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="��������";
			}
				$bet=1;
				echo "�������� &quot;{$_POST['target']}&quot; �������!";
				if($user['invis']==1) {
				addch("<img src=i/magic/cure1.gif> &quot;���������&quot; ".$action." �� ������ ����� &quot;{$_POST['target']}&quot;");
				}else
				addch("<img src=i/magic/cure1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." �� ������ ����� &quot;{$_POST['target']}&quot;");
				deltravma($owntravma['id']);	
				} else {
				echo "������ ���������� � ����� �����...";
				$bet=1;
				}	
?>