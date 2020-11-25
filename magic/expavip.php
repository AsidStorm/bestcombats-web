<?php
//Экспа +2000
 if ($_SESSION['uid'] == null) header("Location: index.php");
if ($user[vip]!=1) {
echo"Только vip может повышать опыт";
}else{
$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
db_query("UPDATE `users` SET `exp`=`exp`+'2000' WHERE `login` = '{$user['login']}' LIMIT 1;");
$mess="Персонаж &quot;{$user['login']}&quot; повысил свой опыт на +2000 свитком разрешения.";					
db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','$mess','".time()."');");

 
 echo "<font color=red><b>Ваш опыт был увеличен на 2000<b></font>";
 $bet=1;
?>