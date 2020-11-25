<?
include "../connect.php";

$ch_priem1 = mysql_query ("SELECT * FROM `effects` WHERE time>'".(time()+172800)."' and `name`<>'Заклятие хаоса' and `name`<>'Заклятие обезличивания' and `name`<>'Паладинская проверка'  ");
$i=0;
while($ch_priem=mysql_fetch_array($ch_priem1)){
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ch_priem['owner']."' LIMIT 1;"));
	$obshaga = mysql_fetch_array(mysql_query("SELECT * FROM `obshaga` WHERE `pers` = '".$user['id']."' LIMIT 1;"));
	If ($obshaga['sleep']==1){
		$i++;
		echo $i." - ".$user['login']." - ".$ch_priem['name']." - ".floor(($ch_priem['time']-time())/60/60)." часов<BR/>";
		//mysql_query("update effects set `time`='".time()."'   WHERE id='".$ch_priem['id']."'");
		//mysql_query("update users set `sila`=`sila`+".$ch_priem['sila'].",`lovk`=`lovk`+".$ch_priem['lovk'].",`inta`=`inta`+".$ch_priem['inta'].",`intel`=`intel`+".$ch_priem['intel'].",`maxhp`=`maxhp`+".$ch_priem['hp']."  WHERE id='".$ch_priem['owner']."' LIMIT 1;");
		
	}
}
?>