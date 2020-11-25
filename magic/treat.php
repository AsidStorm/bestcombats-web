<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
//$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;");
$travma2 = mysql_query("SELECT id FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13') and id not in (select effect from treats where user='$user[id]');");
//$owntravma2=mysql_fetch_array($travma);
if ($user['battle'] > 0) {
  echo "Не в бою...";}
elseif ($us['battle'] > 0) {
  echo "Персонаж в бою...";} 
elseif (mysql_num_rows($travma2)==0) {
  echo "У персонажа нет травм, к которым вы можете применить первую помощь...";}
elseif ($user['room'] != $us['room']) {
  echo "Персонаж в другой комнате!";
} elseif (!canmakequest(5)) {
  echo "Вы ещё не восстановили силы после прошлого раза!";
} else{
              
			if ($user['sex'] == 1) {$action="оказал первую помощь";}
			else {$action="оказала первую помощь";}
			if ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}


			if ($user['invis']==1) {
				addch("<img src=i/magic/cure3.gif> &quot;невидимка&quot; ".$action." &quot;{$_POST['target']}&quot;");
			}else
				addch("<img src=i/magic/cure3.gif> $angel &quot;{$user['login']}&quot; ".$action." &quot;{$_POST['target']}&quot;");

				while ($owntravma = mysql_fetch_array($travma2)) {
				  mq("update effects set time=time-".(rand(15,30)*60)." where id='$owntravma[id]'");
				  mq("insert into treats (user, effect) values ('$user[id]', '$owntravma[id]')");

				}
makequest(5);
echo "Вы оказали первую помощь персонажу &quot;{$_POST['target']}&quot;.";
}
?>