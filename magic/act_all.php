<?php
if ($user['align']==4){ echo "��������� ��������� ���������!";}	
else{
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		
$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14');");				
if ($user['battle'] > 0) {
	echo "�� � ���...";
} elseif ($us['battle'] > 0) {
	echo "�������� � ���...";
} elseif (!$travma) {
	echo "� ��������� ��� �����...";
} elseif ($user['room'] != $us['room']) {
	echo "�������� � ������ �������!";
} elseif ($user['align'] >= 0) {		
		
			if ($user['sex'] == 1) {$action="�������";}
			else {$action="��������";}		
				if ($user['align'] >= '0') {
				$angel="�������� ";
			}
					
				if ($user['invis']==1) {
				addch(" <font color=red>��������! </font><img src=i/magic/cure3.gif> <i><b>��������� </i></b> {$_POST['target']}  ".$action." �� ����� ");
				}else
				addch("<font color=red>��������! </font><img src=i/magic/align_2.5.gif>    {$_POST['target']}  ".$action." �� ����� ");
				while ($owntravma=mysql_fetch_array($travma)) {
					deltravma($owntravma['id']);
				}

} else {
				echo "���-�� ��� �� ��...";
	}	
	}
?>
