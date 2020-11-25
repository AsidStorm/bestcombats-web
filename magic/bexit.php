<?php
// выход из боя
if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));

if ($user['battle'] == 0) {
	echo "Это боевая магия...";
} else {




			unset($fbattle->battle[$user['id']]);
			if($us['sex'] == 1) {
				addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' вышла из боя!<BR>');
			} else {
				addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' вышел из боя!<BR>');
			}
			
			mysql_query("UPDATE users SET `battle` =0, `hp` = 0, `maxhp` = 0, `mana` = 0, `maxmana` = 0,`hp2` = 0,`hp3` = 0,`hit` = 0,`s_duh` = 0,`krit` = 0,`counter` = 0,`block2` = 0,`parry` = 0 WHERE `id` = '{$user['id']}';");
			mysql_query("DELETE FROM `person_on` WHERE `id_person`='".$user['id']."'");
			mysql_query("UPDATE battle SET `closed` = '1' WHERE `id`= '{$user['battle']}';");

                        $bet=1;
			echo "Вы вышли из боя";


}

?>
