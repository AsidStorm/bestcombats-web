<?php
$b=mqfa1("select battle from users where login='$_POST[target]'");
if ($b) {
mysql_query("UPDATE users SET `battle` =0, `nich` = `nich`+'1',`fullhptime` = ".time().",`fullmptime` = ".time().",`udar` = '0' WHERE `battle` = $b");
mq("update battle set win=0 where id='$b'");
mq("delete from bots where battle='$b'");
$fp = fopen ("backup/logs/battle$b.txt","a"); //��������
flock ($fp,LOCK_EX); //���������� �����
fputs($fp , '<hr><span class=date>'.date("H:i").'</span> ��� ��������. �����.<BR>'); //������ � ������
fflush ($fp); //�������� ��������� ������ � ������ � ����
flock ($fp,LOCK_UN); //������ ����������
fclose ($fp); //��������
echo "<b>��� ��������� $_POST[target] �����.</b>";
} else echo "<b><font color=red>�������� $_POST[target] �� � ���.</font></b>";
?>