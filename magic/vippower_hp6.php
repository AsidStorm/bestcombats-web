<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
 if ($_SESSION['uid'] == null) header("Location: index.php");
 if(!$_POST){$targeted=0;}
 $ptarget = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '204' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '901' LIMIT 1;")); 
}
else
{ 
$effect = mysql_fetch_array(mysql_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '901' LIMIT 1;"));
}
      
if ($user['intel'] >= 15) {
    $int=$magic['chanse'] + ($user['intel'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($effect['time']) {echo "У вас уже есть заклятие Предчувствие..."; }
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей";}
elseif ($us['vip']==1) {echo "Заклятие может быть наложено только на себя ";}
elseif (1==1) { 
if($_POST['target']!=""){
      addch("<font color=red>внимание! </font><img src=http://img.vr-bk.net/i/magic/power_hp6.gif> Персонаж &quot;{$user['login']}&quot; наложил заклятие \"Жажда Жизни +6\" на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
    
      $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
	  $addhp=$user['vinos']*6;
      if ($effect['time']){mysql_query("UPDATE `effects` SET `hp`='".$addhp."',`time`=".(time()+7200)." WHERE `owner` = '{$user['id']}' and `type` = '901' LIMIT 1;");}
	  else{mysql_query("INSERT INTO `effects` (`owner`,`hp`,`maxhp`,`name`,`time`,`type`) values ('".$user['id']."','".$addhp."','".$addhp."','Жажда Жизни +6',".(time()+7200).",901);");
	  mysql_query("UPDATE `users` SET `maxhp`=`maxhp`+'".$addhp."', `hp`=`hp`+'".$addhp."' WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
      echo "<font color=red><b>Удачно наложено заклятие Жажда Жизни +6 </b> Усиление добавило +".$addhp." HP</font>";
	  
       $bet=1;
	  }
	  else
	  {
	
	  echo "Введите логин персонажа!";
	  }
      

} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
	  }
?>