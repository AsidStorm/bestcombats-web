<?php
// magic �������������
    //if (rand(1,2)==1) {

$coma[] = "� � �� ������� ��� ��� �����... ";


        if ($_SESSION['uid'] == null) header("Location: index.php");

        $magictime=time()+($_POST['timer']*60*1440);
        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '5' LIMIT 1;"));
            if ($effect['time']) {
                echo "<font color=red><b>�� ��������� \"$target\" ��� ���� �������� ������������� </b></font>";
            }
            else {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777' || $user['align'] == '1.1') {
                    $ok=1;
                }
                elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($ok == 1) {
                    if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','�������� �������������','$magictime',5);")) {
                        $ldtarget=$target;
                        $magictime="���� ����";
                        switch($_POST['timer']) {
                            case "2": $magictime="���� ����."; break;
                            case "2": $magictime="��� ���."; break;
                            case "3": $magictime="��� ���."; break;
                            case "7": $magictime="���� ������."; break;
                            case "14": $magictime="��� ������."; break;
                            case "30": $magictime="�����."; break;
                            case "60": $magictime="��� ������."; break;
                            case "365": $magictime="���������."; break;
                        }
                        if ($user['sex'] == 1) {$action="�������";}
                        else {$action="��������";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                            $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                            $angel="�������";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ������������� �� ��������� &quot;$target&quot; ������ $magictime";
                        $messch="$angel &quot;{$user['login']}&quot; $action �������� ������������� �� ��������� &quot;$target&quot; ������ $magictime.";
                        if ($user['invis'] == '1') {
                        $messch="&quot;���������&quot; ������� �������� ������������� �� ��������� &quot;$target&quot; ������ $magictime";
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ������������� �� ��������� &quot;$target&quot; ������ $magictime";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=i/magic/obezl.gif> $messch");
                        addchp($coma[rand(0,count($coma)-1)],"�����������");
                        echo "<font color=red><b>������� �������� �������� ������������� �� ��������� \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!<b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>�� �� ������ �������� �������� ������������� �� ����� ���������!<b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
?>
