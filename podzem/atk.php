<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

if($_GET['act']=="atk"){
$ass = mysql_query("SELECT glav_id,glava,name FROM labirint WHERE user_id=".$user['id']."");
$lab = mysql_fetch_array($ass);
$glav_id = $lab["glav_id"];
$asx = mysql_query("SELECT login FROM labirint WHERE glav_id='$glav_id' and boi='".$_GET['n']."'");
if(!$lax = mysql_fetch_array($asx)){
$f = mysql_query("SELECT `n".$_GET['n']."` FROM podzem3 WHERE glava='".$lab["glava"]."' and name='".$lab["name"]."'");
$rt = mysql_fetch_array($f);


startpod($user['login'],$rt['n'.$_GET['n'].''],$_GET['n'],$user);

}else{

$jert = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".$lax["login"]."' LIMIT 1;"));
if($jert['id']!=$user['id']) {

				$bet=1;
				//арх
				if($jert['id'] > _BOTSEPARATOR_) {
					$arha = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `prototype` = '.$jert['id'].' LIMIT 1;'));
					$jert['battle'] = $arha['battle'];
					$jert['id'] = $arha['id'];
					$bot=1;
				}
				if($jert['battle'] > 0) {
					//вмешиваемся
					$bd = mysql_fetch_array(mysql_query ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
					$battle = unserialize($bd['teams']);
                    $battle[$user['id']] = $battle[$jert['id']];
                    foreach($battle[$user['id']] as $k => $v) {
                    $battle[$k][$user['id']] = array(0,0,time());
                    }
                    $t1 = explode(";",$bd['t1']);
						
					// проставляем кто-где
					if (in_array ($jert['id'],$t1)) {
						$ttt = 1;
					} else {
						$ttt = 2;
					}

//addch ("<b>".nick7($user['id'])."</b> вмешался в <a href=logs.php?log=".$id." target=_blank>поединок »»</a>.  ",$user['room']);



addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>');

mysql_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\')  WHERE `id` = '.$jert['battle'].' ;');

mysql_query("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);
mysql_query("UPDATE `labirint` SET `boi`='".$_GET['n']."',`di`='0' WHERE `user_id`='".$user['id']."'");

}}}



print "<script>location.href=\"main.php?act=none\";</script>";
die();
}
?>