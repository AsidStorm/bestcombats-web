<?php
// ����� �����������
 $zaderj=mqfa("select * from `zaderjka` where `owner`='$user[id]' and `type`=1022");
if ($zaderj) {
  echo "<font color=red><b>� ��� �������� �� ������������� ������� ������ ��� ".secs2hrs($zaderj["time"]-time())."<b></font>";
} elseif ($user["battle"]) {
  echo "<font color=red><b>�� � ���<b></font>";
} elseif ($user["level"]<8) {
  echo "<font color=red>������ ������ ������������ ��� ������������� ������� ����������.</font>";
} elseif (!$user["in_tower"]) {
  $s=getvar("siege");
  if (incastle($user["room"]) && !$s) {
    echo "<font color=red><b>� ����� �� ����� ������ ������������ ������ �����������!<b></font>";
  } else {
        if ($_SESSION['uid'] == null) header("Location: index.php");
        if ($user["align"]==2.5) $magictime=time()+(60*240);
        else $magictime=time()+(60*120);
        if ($user["align"]==2.5) $zadtime=time()+0;
        else $zadtime=time()+43200;
        $eff=mqfa1("select id from effects where owner='$user[id]' and type=1022");
        if ($eff) {
          mq("update effects set time='$magictime' where id='$eff'");
        } elseif ($user['id']) {
          mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','�������� �����������','{$magictime}',1022);");
          mq("INSERT INTO `zaderjka` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','�������� �����������','{$zadtime}',1022);");
          mq("UPDATE `users` SET `invis` = '1' WHERE `id` = '{$user['id']}';");
        } else {
          echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
        $bet=1;
  }
} else echo "<font color=red><b>� ����� ������ ������ ������������ ������ �����������!<b></font>";
?>