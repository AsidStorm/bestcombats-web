<?php
// magic �������������
    //if (rand(1,2)==1) {
$coma[] = "��� ���. ������ �������, ��� ������ ����� �����. ";
$coma[] = "��� ����� ����������� � ������� ������. ";
$coma[] = "� ��� �����, ������ � ����� �������: '������������ ���������'. ���... �� ������ � �����. ";
$coma[] = "��� ������ �� ����-�� ������� ���������� �������� ";
$coma[] = "��� �� ��� ����� ";
$coma[] = "�������� ���, �������� ������ ";
$coma[] = "����� ������� � �����������... ����� ������ ���, ������� �����. ";
$coma[] = "�� � ���� �� ���� �� �����... ���... ";
$coma[] = "���� ����� � ������ ������, ����� �������� � ���������� �����! ";
$coma[] = "�� ��������� � ��������� ����... �� ���������... ����, �����, ��� ��� ������. �����, ������. ";
$coma[] = "�� �������� ����� ������, ������� ���� �� ���� �����. ����� ����� ��������, ������ ��� ������. ";
$coma[] = "�� �������� ���������... ";
$coma[] = "���������� ������ � ����� ������ ";
$coma[] = "'��� ��������, ��� �������'. ����� ������������� ��������� ";
$coma[] = "�������, �� ����� �������� ��������� ";
$coma[] = "�� ��� ������ �������� ";
$coma[] = "�� �� ����� ���������� ���� ";
$coma[] = "� ���������� �� ���� �� ������ � ��������, � ����� ������ �� �����, ������ � ������. ";
$coma[] = "�����, �� ����! ";
$coma[] = "������ �������, ���� ������������ ��� ������ �����";
$coma[] = "����� ����� �� ��, �� ������ ��������! ";
$coma[] = "���� ��� �� ��� ���� ����... ";
$coma[] = "� ���� ���� �� �������� ����� ���� ";
$coma[] = "� ���� ��� ���� � �� �������. ";
$coma[] = "� ��� ���� ����� ������ ������, �� �� �� �� �������";
$coma[] = "� ���������� ��� ���� �� ������ � ��������, � ����� ������ �� �����, ������ � ������.";


        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`block`,`level`,`spellfreedom` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            if ($tar['block'] == 1) {
                echo "<font color=red><b>�� ��������� \"$target\" ��� ���� �������� ������ </b></font>";
            }else {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
                  $ok=1;
                } elseif (($user['align'] > '1.8' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                  $ok=1;
                } elseif (($user['align'] > '1.8' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                  $ok=1;
                } elseif ($user['align'] == '1.7' && (($tar['align'] > '2' && $tar['align'] < '3') || $tar['align']=='0' || $tar['align']=='0.98' || $tar['align']=='0.99' || $tar['align']=='7')) {
                  $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                                if ($user['align']==5) $ok=1;
                if ($ok == 1) {
                    if (mysql_query("UPDATE `users` SET `block`='1' WHERE `id` = {$tar['id']} LIMIT 1;")) {
                        $ldtarget=$target;
                        $ldblock=1;
                        if ($user['sex'] == 1) {$action="�������";}
                        else {$action="��������";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ������ �� ��������� &quot;$target&quot;.";
                        $messch="$angel &quot;{$user['login']}&quot; $action �������� ������ �� ��������� &quot;$target&quot;..";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� ������ �� ��������� &quot;$target&quot;..";
                        $messch="&quot;���������&quot; ������� �������� ������ �� ��������� &quot;$target&quot;..";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=i/magic/death.gif> $messch");
                        addchp($coma[rand(0,count($coma)-1)],"�����������");
                        echo "<font color=red><b>������� �������� �������� ������ �� ��������� \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>��������� ������!<b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>�� �� ������ �������� �������� ������ �� ����� ���������!<b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
?>
