<?php
// magic �������������
    //if (rand(1,2)==1) {

        if ($_SESSION['uid'] == null) header("Location: index.php");
        $target=$_POST['target'];
        $tar = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $magictime=time()+259200;
        if ($tar['id']) {
          $restr=mqfa1("select time from effects where owner='$tar[id]' and type=".CLANRESTRICTION." order by id desc");
          if (!$restr) $restr=mqfa1("select time from alleffects where owner='$tar[id]' and type=".CLANRESTRICTION." order by id desc");
            if ($restr>time()) {
              echo "<font color=red><b>� ��������� ������ �� ���������� � ����� ��� ".secs2hrs($restr-time())."!</b></font>";
            } elseif (($tar['klan'] || $tar['align'] ) && $tar['id']!=7) {
              echo "<font color=red><b>�������� \"$target\" ������� � �����, ���� ����� ����������!</b></font>";
            } else {
                $ok=0;
                if (($user['align'] > '1' && $user['align'] < '3') OR ($user['align']> '3' && $user['align']< '4')) {
                    $ok=1;
                }
                if ($ok == 1) {
                    if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','����������� ��������','".$magictime."','20');")) {
                        $messtel="��������, ��� �������� ���� ����� �������";
                        $mess="".$user['login']." ������ ������� ��� ".$_POST['target']." ���� ����� �������";
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");

                        tele_check($target,$messtel);

                        echo "<font color=red><b>������� ���������� �������� ��������� \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!<b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>�� �� ������ ��������� ��������!<b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
?>
