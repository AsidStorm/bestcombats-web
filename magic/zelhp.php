<?php

global $caverooms, $canalrooms;

if ($user['battle'] > 0) {
    echo "�� � ���...";
} elseif (($row['name'] == '����������� ��������' || $row['name'] == '����������� �������' || $row['name'] == '��������� ����' || $row['name'] == '������� ����') && !in_array($user['room'], $canalrooms) && !in_array($user['room'], $caverooms)) {
    echo "����� ������������ ������ � ������� ����������.";
} else {
  if($row['name']=='����� �����' || $row['name']=='����� �����') $deltahp=100;
  if($row['name']=='������� �����') $deltahp=250;
  if($row['name']=='����� ����') $deltamana=200;
  if($row['name']=='������� ����') $deltamana=500;
  if($row['name']=='����������� ��������') $deltahp=150;
  if($row['name']=='����������� �������') $deltahp=300;
  if($row['name']=='��������� ����') $deltamana=250;
  if($row['name']=='������� ����') $deltamana=500;
  if($row['prototype']==2461) $deltahp=600;
  getadditdata($user);
  if ($deltahp) {
    $deltahp=floor($deltahp*(addictval($user["hpaddict"])*0.04+1));
    $need=$user["hp"]<$user["maxhp"];
  }
  if ($deltamana) {
    $deltamana=floor($deltamana*(addictval($user["manaaddict"])*0.04+1));
    $need=$user["mana"]<$user["maxmana"];
  }
  if ($need) {
    mq("update users set ".($deltahp?"hp=if(hp+$deltahp>maxhp, maxhp, hp+$deltahp), `fullhptime` = ".time()."":"")." ".($deltamana?"mana=if(mana+$deltamana>maxmana, maxmana, mana+$deltamana), `fullmptime` = ".time()."":"")." where id='$user[id]'");

    if ($deltahp) echo "����� ������� &quot;".$row['name']."&quot;. ������� ������������� ".min($deltahp,$user["maxhp"]-$user["hp"])." ��. ������ �����.";
    if ($deltamana) echo "����� ������� &quot;".$row['name']."&quot;. ������� ������������� ".min($deltamana,$user["maxmana"]-$user["mana"])." ��. ������ ����.";

    $user["hp"]=min($user["hp"]+$deltahp, $user["maxhp"]);
    $user["mana"]=min($user["mana"]+$deltamana, $user["maxmana"]);
    //mysql_query("UPDATE `users` SET ".$plhp." WHERE `id` = ".$user['id']."");
    //mysql_query("UPDATE `users` SET `mana` = `maxmana`, `fullmptime` = ".time()." WHERE  `mana` > `maxmana` AND `id` = '".$user['id']."' LIMIT 1;");
    //mysql_query("UPDATE `users` SET `hp` = `hp`, `fullhptime` = ".time()." WHERE  `hp` > `maxhp` AND `id` = '".$user['id']."' LIMIT 1;");

    $bet=1;
  } elseif ($deltahp) echo "�� � ��� �������.";
  elseif ($deltamana) echo "���� ���� � ��� ������.";
}
?>
