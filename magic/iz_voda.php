<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '66' ;"));  
      
if ($user['level'] >= 1) {
    $int=$magic['chanse'];
    if ($int>98){$int=99;}
}else {$int=0;}
$bos = mysql_query("SELECT `id`,`prototype`,`name` FROM `bots` WHERE `name` = '".$_POST['target']."' AND `battle` = '".$user['battle']."' AND `hp` > '0'");
$bor = mysql_fetch_array($bos);
if ($user['battle'] == 0) {echo "��� ������ �����...";}
elseif ($user['level'] < 1) { echo "������ ������ �� ���������� ��� ������������� ����� ����������!"; }
elseif (!$bor) { echo "".$_POST['target']." �� � ��� ��� ����!"; }
elseif ($bor['prototype']!='3920'){echo "���� ������ �� ��� ����� �������!";}
elseif (rand(1,100) < $int) {    
$damage = ($user['intel']+$user['level'])*25;  
addlog($user['battle'],'<span class=sysdate>'.date("H:i").' </span><b>'.$user['login'].'</b> ����������� �������� <b>�������� �������</b> �� '.$_POST['target'].', ���������� ��������  <b>'.$damage.'</b> �� �������.<BR>');    
mysql_query("update bots set `hp`=`hp`-'".$damage."' WHERE name='".$_POST['target']."' AND `battle`='".$user['battle']."' AND `hp` > '0'");
// $bet=1;
      

} else {
        echo "������ ���������� � ����� �����...";
        $bet=1;
      }  
?>