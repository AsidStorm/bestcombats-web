<?php
include "functions/attack.php";
mq("lock tables online write, users write, battle write, effects write, obshagaeffects write, bots write, zayavka write, inventory write");
$us = mysql_fetch_array(mq("SELECT *,(select `id` from `online` WHERE `real_time` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
if ($us["battle"]) $us["online"]=1;
if($user['room']==20 or $user['room']==21 or $user['room']==45){
//���������
if ($us['battle']) $bd=mysql_fetch_array(mq("SELECT * FROM `battle` WHERE `id` = '{$us['battle']}' ;"));
else $bd=array();

echo"<div align=right><font color=red><b>";
$tme=localtime();

$cant=cantjoinbattle($user, $us, $bd);
if (!$cant) $cant2=cantattack($us,0,0,1);
$checkLevels = $user['level'] - $us['level'];
if ($checkLevels < 0) {
    $checkLevels = $checkLevels * (-1); 
} 

if ($user['align'] == 2.5) {
}

if ($tme["2"]>=8 && $tme["2"]<18) {$rand1=rand(5,7);} else {$rand1=7;} if ($cant) {
  echo $cant;
} elseif ($cant2) {
  echo $cant2;
} elseif ($tme["2"]>=8 && $tme["2"]<18 && !$us['bot'] && $_SERVER["REMOTE_ADDR"]!="127.0.0.1" && $user['level'] > $us['level']) {
  echo "� 08:00 �� 18:00 ��������� �������� ������ �� ������� ��� ������ ���������";
//} elseif ($tme["2"]>=8 && $tme["2"]<18) {
 // echo "� 08:00 �� 18:00 ��������� ����������";
} elseif ($tme["2"]<8 && $tme["2"]>=18 && !$us['bot'] && $checkLevels > 2) {
    echo "� 18:00 �� 8:00 ��������� �������� ������ �� ����������, ������ ��� ������ ���, �� �� ����� ��� �� 2 �����.";
} elseif (($us['login']=="����� ����" && vrag!="on") || (!$us['online'] && !$us["bot"]) || $us['invis']) {
  echo "�������� �� � ����!";
//} elseif ($us['level'] < $rand1 && !$us["bot"]) {
  //echo "���� ������ ������ ������� �� ��������� ���� ".($rand1)." ������! �������� ���, ��������� �������� �� 5 �� 7 ���. ����� � 18:00 �� 08:00 ����������� ������� ����������� 7!";
} elseif ($us['incity'] != $user['incity']) {
  echo "�� �� ������ ������� �� ��������, ������������ � ������ ������.";
} elseif ($user['align'] == $us['align']) {
  echo "����� ����� ����� ���������.";
} elseif ($user['klan'] != '' && ($user['klan'] == $us['klan'])) {
echo "����� ����� ����� ��������.";
} elseif ($us['align']>=2 && $us['align']<3 ) {
	echo "��������� ".$user['login'].", ���� ������� ������� �� ������ ����� �������� � ���� � ����� ��������������� ��� ���������...";
	mysql_query("UPDATE `users` SET `hp`=1 WHERE `id`='".$user['id']."'");
		addch("<img src=i/magic/bexit.gif> <B>".$user['login']."</B>, ��������� ������� �� &quot;<strong>{$_POST['target']}</strong>&quot;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=i/priem/wis_air_shaft10.gif> <b>���� � ������</b> �������� ������� <strong>".$user['login']."</strong> <Font Color=red><b> -".($user['hp']-1)."</b></font> [1/".$user['maxhp']."].<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>������ ����� - ���������������.</u>");

} else {
  if ($user['sex'] == 1) {$action="�����";}   else {$action="������";}
  if ($user['align'] > '2' && $user['align'] < '3')  {
    $angel="�����";
  } elseif ($user['align'] > '1' && $user['align'] < '2') {
    $angel="��������";
  }

  if($us['id']!=$user['id']) {
    if ($user['invis']==1) {
      addch("<img src=i/magic/attack.gif> <B>���������</B>, �������� ���������, �������� ".$action." �� &quot;{$_POST['target']}&quot;");
      addchp ('<font color=red>��������!</font> �� ��� '.$action.' <B>���������</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($us['id']).'{[]}');
    } else {
      addch("<img src=i/magic/attack.gif> <B>{$user['login']}</B>, �������� ���������, �������� ".$action." �� &quot;{$_POST['target']}&quot;");
      addchp ('<font color=red>��������!</font> �� ��� '.$action.' <B>'.$user['login'].'</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($us['id']).'{[]}');
    }
    //destructitem($row['id']);
    $bet=1;
    //���
    if($us['login']=="����� ����" || $us["bot"]) {
      $arha = mysql_fetch_array(mq ('SELECT * FROM `bots` WHERE `prototype` = '.$us['id'].' LIMIT 1;'));
      if ($arha) {
        $us['battle'] = $arha['battle'];
        $us['id'] = $arha['id'];
        $bot=0;
      } else $bot=1;
    } else $bot=0;
    attack($_POST["target"], 1, 0, 0, 0, 0, 3, $us, $bd, $bot, "��������� �� ��");
  } else {
    echo '��������?...';
  }
  //$bet=1;
}
echo"</b></font></div>";
}
mq("unlock tables");
?>