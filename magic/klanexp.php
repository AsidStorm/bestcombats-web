<?php
//���� ���� 100000
if ($_SESSION['uid'] == null) header("Location: index.php");
if ($klan['clanlevel']>6) {
  echo"������ ����� �� 5 ������ ����� ������������ ���� ������";
}else{
  mq("UPDATE `clans` SET `clanexp`=`clanexp`+'100000' WHERE `short` = '{$user['klan']}' LIMIT 1;");
  echo "<font color=red><b>��� �������� ��� �������� �� 100000<b></font>";
  $bet=1;
}
?>