<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
 if ($_SESSION['uid'] == null) header("Location: index.php");
 if(!$_POST){$targeted=0;}
 $ptarget = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".db_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '7000' ;"));
$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '99999' LIMIT 1;"));
}
else
{ 
$effect = mysqli_fetch_array(db_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '99999' LIMIT 1;"));
}
      
if ($user['intel'] >= 0) {
    $int=$magic['chanse'] + ($user['intel'] - 0)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($effect['time']) {echo "У вас уже есть заклятие Предчувствие..."; }
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей";}
elseif ($us['vip']==1) {echo "Заклятие может быть наложено только на себя ";}
elseif (1==1) {
if($_POST['target']!=""){
      addch("<font color=red>внимание! </font><img src=http://img.vr-bk.net/i/magic/invoke_spell_godintel100.gif>Персонаж &quot;{$user['login']}&quot; наложил заклятие \"Ледяной Интеллект\" на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
    
      $user = mysqli_fetch_array(db_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
       if ($effect['time']){db_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
	  else{db_query("INSERT INTO `effects` (`owner`,`intel`,`name`,`time`,`type`) values ('".$user['id']."','100','Ледяной Интеллект',".(time()+7200).",99999);");}
	  db_query("UPDATE `users` SET `intel`=`intel`+'100' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Ледяной Интеллект\" </b></font>";      
      $bet=1;
	  }
	  else
	  {
	  addch("<font color=red>внимание! </font> <img src=http://img.vr-bk.net/i/magic/invoke_spell_godintel100.gif> Персонаж &quot;{$user['login']}&quot; использовал заклятие \"Ледяной Интеллект\" сроком 2 часа.");
          if ($effect['time']){db_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `owner` = '{$_SESSION['uid']}' LIMIT 1;");}
	  else{db_query("INSERT INTO `effects` (`owner`,`intel`,`name`,`time`,`type`) values ('".$ptarget['id']."','".floor($ptarget['login']+100)."','Ледяной Интеллект',".(time()+7200).",99999);");}
	  db_query("UPDATE `users` SET `intel`=`intel`+'".floor($ptarget['login']+100)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  	 

      echo "<font color=red><b>На персонажа \"{$user['login']}\" наложено заклятие \"Ледяной Интеллект\" </b></font>";      
      $bet=1;}
      } else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
	  }
      
	  
?>