<?php

$us = mysql_fetch_array(mysql_query("SELECT honorpoints FROM `users` WHERE `id` = 4475817 LIMIT 1;"));		
	

if ($us['honorpoints'] == 0) {
	echo "����� ���� ��� �������.";
}  else{		
		
						if ($user['sex'] == 1) {$action="�������";}
			else {$action="��������";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="�����";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="��������";
			}
                                mysql_query("UPDATE `users` SET `honorpoints`=0 WHERE `id`='4475817'");
				echo "�� �������� ����� �����!";
				addch("<img src=i/magic/1x1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." ����� �����.");
				
} 	
?>