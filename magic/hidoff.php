<?php

	if ($user['invis']==0) {echo"<font color=red><b>�� ��� ��� �������� �����������<b></font>";}
       else{

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
			mysql_query("UPDATE `users` SET `invis` = '0' WHERE `id` = '{$tar['id']}';");
            
            echo mysql_error();
        
}
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
        }
$bet=1;
?>
