<?php
// ������ ������
if ($_SESSION['uid'] == null) header("Location: index.php");

        $us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
                if ($user['sex'] == 1) {$action="";}
                else {$action="�";}
                if ($user['battle'] > 0) {
                    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],'b').' �����������'.$action.' �������� ����������� ������ '.(($us['id']!=$user['id'])?"�� ".nick5($us['id'],'b'):"").'<BR>');
                    $fbattle->write_log ();
                }
                mysql_query("UPDATE `users` SET `hp` = '0' WHERE `id` = ".$us['id'].";");
                echo "�� ������������ �������� ����������� ������ �� ".$us['login']."!";
                $bet=1;
        echo "</B></FONT>";


?>