<?
If(isset($_GET['edit']) and $_GET['edit']==1 and isset($_GET['obraz'])){
	If ($user['sex']==1){
		If (mysql_num_rows(mysql_query("SELECT * FROM `shadows_m` WHERE `img`='".$_GET['obraz']."' and ((`nlevel`<='".$user['level']."' and `nsila`<='".$user['sila']."'  and `nlovk`<='".$user['lovk']."'  and `ninta`<='".$user['inta']."' and `nvinos`<='".$user['vinos']."') or (`nlogin`='".$user['login']."' and  `nlogin`<>'')  or (`nclan`='".$user['klan']."' and  `nclan`<>'' and '".$user['klan']."'<>'') )   "))>0){
			mysql_query("UPDATE `users` SET `shadow` = '".$_GET['obraz']."' WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;");
		}else{
			mysql_query("insert into `bag_use`(`ip`,`uid`,`bag`)values('".$_SERVER['REMOTE_ADDR']."','".$_SESSION['uid']."','образ')");
		}
	}else{
		If (mysql_num_rows(mysql_query("SELECT * FROM `shadows_w` WHERE `img`='".$_GET['obraz']."' and ((`nlevel`<='".$user['level']."' and `nsila`<='".$user['sila']."'  and `nlovk`<='".$user['lovk']."'  and `ninta`<='".$user['inta']."' and `nvinos`<='".$user['vinos']."') or (`nlogin`='".$user['login']."' and  `nlogin`<>'') or (`nclan`='".$user['klan']."' and  `nclan`<>'' and '".$user['klan']."'<>'') )  "))>0){	
			mysql_query("UPDATE `users` SET `shadow` = '".$_GET['obraz']."' WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;");
		}else{
			mysql_query("insert into `bag_use`(`login`,`ip`,`uid`,`bag`)values('".$user['login']."','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['uid']."','образ')");
		}
	}
}
?>