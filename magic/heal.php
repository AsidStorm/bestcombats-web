<?php
 if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['battle']>0) {
if ($user['sex'] == 1) {$action="пытался";}	else {$action="пыталась";}
addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' '.$action.' считерить но у него ничего не вышло))<BR>');
echo'<font color=red><b>Нельзя использовать в бою</b></font>';
} elseif ($user[login]!=$_POST['target']) {
echo"<font color=red><b>Можно юзать только на себя :)<b></font>";
} elseif (((int)date("H") < 6) || ((int)date("H") >= 22)) { 
  echo "Восстановление доступно только днём."; 
} elseif (!canmakequest(5)) {
  echo "Вы ещё не восстановили силы после прошлого раза!";
}else{
mysql_query("UPDATE `users` SET `hp`=`maxhp` WHERE `login` = '{$user['login']}' LIMIT 1;");
makequest(5);
 echo "<font color=red><b>Успешно</b></font>";
 }
?>