<?php

// ����� �����������
	if ($user['invis']==1) {echo"<font color=red><b>�� ��� ��� ���� �������� �����������<b></font>";}
       else{


        $magictime=time()+(60*120);
        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','�������� �����������','{$magictime}',1022);");
			mysql_query("UPDATE `users` SET `invis` = '1' WHERE `id` = '{$tar['id']}';");
            
            echo mysql_error();
        
}
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
        }
$bet=1;
?>
