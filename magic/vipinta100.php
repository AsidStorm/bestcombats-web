<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
 if ($_SESSION['uid'] == null) header("Location: index.php");
 if(!$_POST){$targeted=0;}
 $ptarget = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '203' ;"));  
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '99' LIMIT 1;")); 
}
else
{ 
$effect = mysql_fetch_array(mysql_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '99' LIMIT 1;"));
}
      
if ($user['intel'] >= 5) {
    $int=$magic['chanse'] + ($user['intel'] - 5)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($effect['time']) {echo "У вас уже есть заклятие Предчувствие..."; }
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей";}
elseif ($us['vip']==1) {echo "Заклятие может быть наложено только на себя ";}
elseif (1==1) {   
if($_POST['target']!=""){
       addch("<font color=red>внимание! </font><img src=http://img.vr-bk.net/i/magic/spell_godstat_inst.gif> Персонаж &quot;{$user['login']}&quot; наложил заклятие \"Предчувствие\" на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
    
     $user = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
       if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
	  else{mysql_query("INSERT INTO `effects` (`owner`,`inta`,`name`,`time`,`type`) values ('".$user['id']."','100','Предчувствие',".(time()+7200).",99);");}
	  mysql_query("UPDATE `users` SET `inta`=`inta`+'100' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Предчувствие\" </b></font>";      
      $bet=1;
	  }
	  else
	  {
	  addch("<font color=red>внимание! </font> <img src=http://img.vr-bk.net/i/magic/spell_godstat_inst.gif> Персонаж &quot;{$user['login']}&quot; использовал заклятие \"Предчувствие\" сроком 2 часа.");
          if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `owner` = '{$_SESSION['uid']}' LIMIT 1;");}
	  else{mysql_query("INSERT INTO `effects` (`owner`,`inta`,`name`,`time`,`type`) values ('".$ptarget['id']."','".floor($ptarget['login']+100)."','Предчувствие',".(time()+7200).",99);");}
	  mysql_query("UPDATE `users` SET `inta`=`inta`+'".floor($ptarget['login']+100)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  	 

      echo "<font color=red><b>На персонажа \"{$user['login']}\" наложено заклятие \"Предчувствие\" </b></font>";      
      $bet=1;}
      } else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
	  }
?>