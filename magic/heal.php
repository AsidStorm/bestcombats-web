<?php
 if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['battle']>0) {
if ($user['sex'] == 1) {$action="�������";}	else {$action="��������";}
addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' '.$action.' ��������� �� � ���� ������ �� �����))<BR>');
echo'<font color=red><b>������ ������������ � ���</b></font>';
} elseif ($user[login]!=$_POST['target']) {
echo"<font color=red><b>����� ����� ������ �� ���� :)<b></font>";
} elseif (((int)date("H") < 6) || ((int)date("H") >= 22)) { 
  echo "�������������� �������� ������ ���."; 
} elseif (!canmakequest(5)) {
  echo "�� ��� �� ������������ ���� ����� �������� ����!";
}else{
mysql_query("UPDATE `users` SET `hp`=`maxhp` WHERE `login` = '{$user['login']}' LIMIT 1;");
makequest(5);
 echo "<font color=red><b>�������</b></font>";
 }
?>