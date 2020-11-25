<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
 if ($_SESSION['uid'] == null) header("Location: index.php");
 if(!$_POST){$targeted=1;}
 $ptarget = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '303' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '26' LIMIT 1;")); 
}
else
{ 
$effect = mysql_fetch_array(mysql_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '26' LIMIT 1;"));
}
      
if ($user['hp'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 0);
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($effect['time']) {echo "На персонаже уже есть заклятие Жажда жизни 6"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей"; 
}elseif (1==1) {
if($_POST['target']!=""){
      if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил заклятие Жажда Жизни +6 на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие Жажда Жизни +6 на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
	  $addhp=$user['vinos']*6; 
      if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
	  else{mysql_query("insert into effects (`owner`,`hpforvinos`,`time`,`name`,`type`) values ('".$user['id']."','6',".(time()+7200).",'Жажда Жизни +6',26);");
	  mysql_query("UPDATE `users` SET `maxhp`=`maxhp`+'".$addhp."', `hp`=`hp`+'".$addhp."' WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие Жажда Жизни +6 </b> Усиление добавило +".$addhp." HP</font>";  
	  
      $bet=1;
	  }
	  else
	   {
	  if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил заклятие Жажда Жизни +6 на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие Жажда Жизни +6 на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `owner` = '{$_SESSION['uid']}' LIMIT 1;");}
	  else{mysql_query("INSERT INTO `effects` (`owner`,`hp`,`name`,`time`,`type`) values ('".$ptarget['id']."','".floor($ptarget['vinos']*6)."','Жажда Жизни +6',".(time()+7200).",26);");}
	  mysql_query("UPDATE `users` SET `hp`=`hp`+'".floor($ptarget['vinos']*6)."',`maxhp`=`maxhp`+'".floor($ptarget['vinos']*5)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  echo "<font color=red><b>На персонажа \"{$user['login']}\" наложено заклятие \"Жажда Жизни +6\" </b></font>";      
      $bet=1;}
	   } else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }
	  }


?>
