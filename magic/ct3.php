<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		
$owntravmadb = mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$us['id']." AND (`type`=12 OR `type`=11 OR `type`=13) ;");	
$ownt = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$us['id']." AND (`type`=12 OR `type`=11 OR `type`=13) LIMIT 1 ;"));		
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '21' ;"));	

if ($user['intel'] >= 8) {
		$int=$magic['chanse'] + ($user['intel'] - 8)*3;
		if ($int>98){$int=99;}
}
else {$int=0;}

	
if ($user['battle'] > 0) {
	echo "�� � ���...";
} elseif ($us['battle'] > 0) {
	echo "�������� � ���...";
} elseif (!$ownt['type']) {
	echo "� ��������� ��� �������, ������� ��� ������ �����...";
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
				
			$travm="������";
			$bet=1;
			while ($owntravma = mysql_fetch_array($owntravmadb)) {
				if ($owntravma['type'] == 13) {$travm="�������";}
				elseif ($owntravma['type'] == 12 && $travm != "�������") {$travm="�������";}
				deltravma($owntravma['id']);	
			}
			echo "�������� &quot;{$_POST['target']}&quot; �������!";
			if($user['invis']==1) {
			addch("<img src=i/magic/cure3.gif> &quot;���������&quot; ".$action." �� ".$travm." ����� &quot;{$_POST['target']}&quot;");
			}else
			addch("<img src=i/magic/cure3.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." �� ".$travm." ����� &quot;{$_POST['target']}&quot;");


} else {
	echo "������ ���������� � ����� �����...";
	$bet=1;
}	
?>