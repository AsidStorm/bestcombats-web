<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
 if ($_SESSION['uid'] == null) header("Location: index.php");
 if(!$_POST){$targeted=0;}
 $ptarget = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
 if($_POST){
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".db_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '252' ;"));
$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '9990' LIMIT 1;"));
}
else
{ 
$effect = mysqli_fetch_array(db_query("SELECT `time`,`id` FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and `type` = '9990' LIMIT 1;"));
}
      
if ($user['hp'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 0);
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей"; 
}elseif (1==1) {
if($_POST['target']!=""){
      if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил заклятие благословение Ангела на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие благословение Ангела на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      $user = mysqli_fetch_array(db_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
      if ($effect['time']){db_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `login` = '{$_POST['target']}' LIMIT 1;");}
	  else{db_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$user['id']."',9990,".(time()+7200).",'Благословение Ангела',15,15,15,15,250)") or die(db_error());}
	  db_query("UPDATE `users` SET `sila`=`sila`+'15', `lovk`=`lovk`+'15', `inta`=`inta`+'15', `intel`=`intel`+'15', `maxhp`=`maxhp`+'250', `hp`=`hp`+'250' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Благословение Ангела\" </b></font>";      
      $bet=1;
	  }
	  else
	  {
	  if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил заклятие благословение Ангела на &quot;невидимка&quot;, сроком 2 часа.");  
		}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие благословение Ангела на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      //$user = mysqli_fetch_array(db_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
      if ($effect['time']){db_query("UPDATE `effects` SET `time`=".(time()+7200)." WHERE `owner` = '{$_SESSION['uid']}' LIMIT 1;");}
	  else{db_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$user['id']."',9990,".(time()+7200).",'Благословение Ангела',15,15,15,15,250)") or die(db_error());}
	  //db_query("UPDATE `users` SET `sila`=`sila`+'".floor($ptarget['level']*1.5)."', `lovk`=`lovk`+'".floor($ptarget['level']*1.5)."', `inta`=`inta`+'".floor($ptarget['level']*1.5)."', `intel`=`intel`+'".floor($ptarget['level']*1.5)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  db_query("UPDATE `users` SET `sila`=`sila`+'".floor($ptarget['level']*1.5)."',`lovk`=`lovk`+'".floor($ptarget['level']*1.5)."',`inta`=`inta`+'".floor($ptarget['level']*1.5)."',`intel`=`intel`+'".floor($ptarget['level']*1.5)."',`hp`=`hp`+'".floor($ptarget['level']*15)."',`maxhp`=`maxhp`+'".floor($ptarget['level']*15)."' WHERE `id` = '".$ptarget['id']."' LIMIT 1;");
	  	 
      echo "<font color=red><b>На персонажа \"{$user['login']}\" наложено заклятие \"Благословение Ангела\" </b></font>";      
      $bet=1;}
      

} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
	  }
?>