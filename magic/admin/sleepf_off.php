<?php
// magic �������������
    //if (rand(1,2)==1) {

        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '3' LIMIT 1;"));
            if ($effect['time']) {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
                    $ok=1;
                }
                elseif (($user['align'] > '1.2' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] > '1.2' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($user['align']==5) $ok=1;                
                if (in_array($_SESSION['uid'], $smalladms)) $ok=1;
                if ($ok == 1) {
                    if (mysql_query("DELETE FROM`effects` WHERE `owner` = '{$tar['id']}' and `type` = '3' LIMIT 1 ;")) {
                        if ($user['sex'] == 1) {$action="����";}
                        else {$action="�����";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
                        elseif ($user['align'] > '3' && $user['align'] <'4') {
                        $angel="������";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� � ��������� &quot;$target&quot;.";
                        $messch="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� � ��������� &quot;$target&quot;";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ��������� �������� � ��������� &quot;$target&quot;";
                        $messch="&quot;���������&quot; ���� �������� ��������� �������� � ��������� &quot;$target&quot;";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=i/magic/sleepf_off.gif> $messch");
                        echo "<font color=red><b>������� ����� �������� ��������� �������� � ��������� \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!</b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>�� �� ������ ����� �������� ��������� �������� � ����� ���������!</b></font>";
                }
            }
            else {
                echo "<font color=red><b>�� ��������� \"$target\" ��� �������� ��������� �������� </b></font>";
            }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!</b></font>";
        }
?>
