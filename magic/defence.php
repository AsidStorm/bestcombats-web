<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '14' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '201' LIMIT 1;"));

if ($user['intel'] >= 15) {
    $int=$magic['chanse'] + ($user['intel'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "�� � ���...";}
elseif ($us['battle']) { echo "�������� � ���."; }
elseif ($user['level'] < 7) { echo "������ ������ �� ���������� ��� ������������� ����� ����������!"; }
elseif ($effect['time']) {echo "�� ��������� ��� ���� �������� ������ �� ������"; }
elseif ($user['room'] != $us['room'] && $user["id"]!=7) { echo "�������� � ������ �������!"; }
elseif (!$us['online']) {echo "�������� �� � ����!";}
elseif (rand(1,100) < $int) {

      addch("<img src=i/magic/spell_protect10.gif>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ������� �������� \"������ �� ������\" �� &quot;".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."&quot;, ������ 2 ����.");

      //$user1 = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
      mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,caster) values ('$us[id]','������ �� ������',".(time()+7200).",201,'$user[id]');");
      echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� \"������ �� ������\" </b></font>";
      $bet=1;


} else {
        echo "������ ���������� � ����� �����...";
        $bet=1;
      }
?>
