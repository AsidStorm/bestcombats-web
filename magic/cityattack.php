<?php
include "functions/attack.php";
mq("lock tables online write, users write, battle write, effects write, obshagaeffects write, bots write, zayavka write, inventory write");
$us = mysql_fetch_array(mq("SELECT *,(select `id` from `online` WHERE `real_time` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
if ($us["battle"]) $us["online"]=1;
if($user['room']==20 or $user['room']==21 or $user['room']==45){
//нападение
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
  echo "С 08:00 до 18:00 нападение возможно только на равного или старше персонажа";
//} elseif ($tme["2"]>=8 && $tme["2"]<18) {
 // echo "С 08:00 до 18:00 нападение невозможно";
} elseif ($tme["2"]<8 && $tme["2"]>=18 && !$us['bot'] && $checkLevels > 2) {
    echo "с 18:00 до 8:00 нападение возможно только на персонажей, старше или младше Вас, но не более чем на 2 уовня.";
} elseif (($us['login']=="Общий Враг" && vrag!="on") || (!$us['online'] && !$us["bot"]) || $us['invis']) {
  echo "Персонаж не в игре!";
//} elseif ($us['level'] < $rand1 && !$us["bot"]) {
  //echo "Этой магией нельзя напасть на персонажа ниже ".($rand1)." уровня! Пробуйте ещё, возможные варианты от 5 до 7 лвл. Также с 18:00 до 08:00 минимальный уровень становиться 7!";
} elseif ($us['incity'] != $user['incity']) {
  echo "Вы не можете напасть на человека, находящегося в другом городе.";
} elseif ($user['align'] == $us['align']) {
  echo "Чтите честь своих товарищей.";
} elseif ($user['klan'] != '' && ($user['klan'] == $us['klan'])) {
echo "Чтите честь ваших сокланов.";
} elseif ($us['align']>=2 && $us['align']<3 ) {
	echo "Уважаемый ".$user['login'].", Ваша попытка напасть на высший совет записана в дело и будет рассматриваться как покушение...";
	mysql_query("UPDATE `users` SET `hp`=1 WHERE `id`='".$user['id']."'");
		addch("<img src=i/magic/bexit.gif> <B>".$user['login']."</B>, попытался напасть на &quot;<strong>{$_POST['target']}</strong>&quot;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=i/priem/wis_air_shaft10.gif> <b>Гром и Молния</b> поразили наглеца <strong>".$user['login']."</strong> <Font Color=red><b> -".($user['hp']-1)."</b></font> [1/".$user['maxhp']."].<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Высший совет - неприкосновенен.</u>");

} else {
  if ($user['sex'] == 1) {$action="напал";}   else {$action="напала";}
  if ($user['align'] > '2' && $user['align'] < '3')  {
    $angel="Ангел";
  } elseif ($user['align'] > '1' && $user['align'] < '2') {
    $angel="Персонаж";
  }

  if($us['id']!=$user['id']) {
    if ($user['invis']==1) {
      addch("<img src=i/magic/attack.gif> <B>невидимка</B>, применив нападение, внезапно ".$action." на &quot;{$_POST['target']}&quot;");
      addchp ('<font color=red>Внимание!</font> На вас '.$action.' <B>невидимка</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($us['id']).'{[]}');
    } else {
      addch("<img src=i/magic/attack.gif> <B>{$user['login']}</B>, применив нападение, внезапно ".$action." на &quot;{$_POST['target']}&quot;");
      addchp ('<font color=red>Внимание!</font> На вас '.$action.' <B>'.$user['login'].'</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($us['id']).'{[]}');
    }
    //destructitem($row['id']);
    $bet=1;
    //арх
    if($us['login']=="Общий враг" || $us["bot"]) {
      $arha = mysql_fetch_array(mq ('SELECT * FROM `bots` WHERE `prototype` = '.$us['id'].' LIMIT 1;'));
      if ($arha) {
        $us['battle'] = $arha['battle'];
        $us['id'] = $arha['id'];
        $bot=0;
      } else $bot=1;
    } else $bot=0;
    attack($_POST["target"], 1, 0, 0, 0, 0, 3, $us, $bd, $bot, "Нападение на ЦП");
  } else {
    echo 'Мазохист?...';
  }
  //$bet=1;
}
echo"</b></font></div>";
}
mq("unlock tables");
?>