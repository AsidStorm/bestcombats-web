<?php
$target=mqfa("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
$elix=mqfa("select id, name, time from effects where owner=$target[id] and type=30");
$efftime=60*60*24*270;



global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ������������ ������!";
} elseif ($user["sex"]!=1) {
  echo "���� ������ ����� ������������ ������ ��������� �������� ����.";
} elseif ($user["battle"]>0) {
  echo "�� � ���...";
} elseif (!$target) {
  echo "�������� $_POST[target] �� ������.";
} elseif (!$target["online"]) {
  echo "�������� $_POST[target] �� � ����.";
} elseif ($target["room"]!=$user["room"]) {
  echo "�������� $_POST[target] ��� �������� ������������.";
} elseif ($target["sex"]!=0) {
  echo "���� ������ ����� ������������ ������ �� ���������� �������� ����.";
} elseif($elix) {
  echo "$_POST[target] ��� ���������.";
} elseif ($row["prototype"]==1715 && $user["married"]!=$target["login"]) {
  echo "���� ������ ����� ������������ ������ �� ���� �������.";
} else {
  mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$target[id]','$row[name] �� $user[login]', ".(time()+$efftime).",30)");
  echo "�������� &quot;$_POST[target]&quot; ������������.";
  addch("<img src=i/magic/$row[img]>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ������� �������� \"$row[name]\" �� &quot;".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."&quot;, ������ 9 �������.");
  updeffects();
  $bet=1;
}
?>