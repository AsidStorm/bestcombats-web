<?php
// magic �������������
    //if (rand(1,2)==1) {


        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['ldnick']}' LIMIT 1;"));
        $target=$_POST['ldnick'];
        if ($tar['id']) {
            $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777' || ($user['align'] > '3.04' && $user['align'] < '3.999') || $user['align'] == '3.99' || $user['align'] == '5') {
                $ok=1;
            }
            elseif (($user['align'] > '1' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] >= $tar['align'])) {
                $ok=1;
            }
            elseif (($user['align'] > '1' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                $ok=1;
            }
            if ($ok == 1) {
                if ($_POST['red']) {
                    if (!$_POST['ldtext']) {$pal="";}
                    else {
                        $date_today = date("m.d.y H:i");
                        $pal=$date_today." ".$_POST['ldtext'];
                    }
                    if (mysql_query("UPDATE `users` SET `palcom` = '$pal' WHERE `id` = {$tar['id']} LIMIT 1;")) {
                        $mess="��������� �� ".$user['login'].": ".$_POST['ldtext'];
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        $mess="�������� ������� �������� � ����/���������� &quot;{$_POST['ldnick']}&quot;: $mess";
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        echo "<font color=red><b>������� �������� ������� �������� � ����/���������� ��������� \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!<b></font>";
                    }
                }
                else {
                    $mess="��������� �� ".$user['login'].": ".$_POST['ldtext'];
                    if (mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');")) {
                        $mess="��������� ������ � ���� &quot;{$_POST['ldnick']}&quot;: $mess";
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        echo "<font color=red><b>������� ��������� ������ � ���� ������ \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!<b></font>";
                    }
                }
            }
            else {
                echo "<font color=red><b>�� �� ������ �������� ������ � ���� ����� ���������!<b></font>";
            }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
?>
