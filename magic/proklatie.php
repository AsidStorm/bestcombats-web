<?php
 if ($_SESSION['uid'] == null) header("Location: index.php");
 $ptarget = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '262' ;"));  
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '9991' LIMIT 1;")); 
}
else
{ 
$effect = mysql_fetch_array(mysql_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '9991' LIMIT 1;"));
}
     

if ($user['battle'] > 0) {echo "Только в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования Проклятие!"; }
elseif ($effect['time']) {echo "На персонаже уже есть Проклятие"; }
elseif ($us['bot']==0) {echo "Проклятие может быть наложено только на персонажей"; 
}elseif (1==1) {
if($_POST['target']!="2"){
      if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил Проклятие на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил Проклятие на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      $user = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
      if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+900)." WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
	  else{mysql_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$user['id']."',9991,".(time()+900).",'Проклятие',-15,-15,-15,-15,-250)") or die(mysql_error());}
	  mysql_query("UPDATE `users` SET `sila`=`sila`-'15', `lovk`=`lovk`-'15', `inta`=`inta`-'15', `intel`=`intel`-'15', `maxhp`=`maxhp`-'250', `hp`=`hp`-'250' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Благословение Ангела\" </b></font>";      
      $bet=1;
	  }
	  else
	  {
	  if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил Проклятие на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; Проклятие на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      //$user = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
      if ($effect['time']){mysql_query("UPDATE `effects` SET `time`=".(time()+900)." WHERE `owner` = '{$_SESSION['uid']}' LIMIT 1;");}
	  else{mysql_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$user['id']."',9991,".(time()+900).",'Проклятие',-15,-15,-15,-15,-250)") or die(mysql_error());}
	  //mysql_query("UPDATE `users` SET `sila`=`sila`+'".floor($ptarget['level']*1.5)."', `lovk`=`lovk`+'".floor($ptarget['level']*1.5)."', `inta`=`inta`+'".floor($ptarget['level']*1.5)."', `intel`=`intel`+'".floor($ptarget['level']*1.5)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  mysql_query("UPDATE `users` SET `sila`=`sila`+'".floor($ptarget['level']*1.5)."',`lovk`=`lovk`+'".floor($ptarget['level']*1.5)."',`inta`=`inta`+'".floor($ptarget['level']*1.5)."',`intel`=`intel`+'".floor($ptarget['level']*1.5)."',`hp`=`hp`+'".floor($ptarget['level']*15)."',`maxhp`=`maxhp`+'".floor($ptarget['level']*15)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  	 
      echo "<font color=red><b>На персонажа \"{$user['login']}\" наложено \"Проклятие\" </b></font>";      
      $bet=1;}
      

} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
	  }
?>