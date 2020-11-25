<?php
	session_start();
//ini_set("display_errors", 1);
//error_reporting(E_ALL ^ E_NOTICE);
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	$hellround=mysqli_fetch_array(db_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
	include "functions.php";
	if ($user['room'] != 2002) {header("Location: main.php");}
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

	function ist($id) {
		db_query("UPDATE hellround_pohod set end=1, date_out='".time()."' Where owner='".$id."'");
		header('location: hellround.php'); die();
	}
	
	if ($hellround['volna']>1 and $hellround['end']==0 and $user['lose']>$hellround['user_lose']){
	    if ($user['level'] == '7') { 
		$obrazti=rand(1,15);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obrazti.",".($obrazti/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obrazti.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
		if ($user['level'] == '8') { 
		$obraztic=rand(1,15);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obraztic.",".($obraztic/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obraztic.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
		if ($user['level'] == '9') { 
		$obraztia=rand(5,20);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obraztia.",".($obraztia/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obraztia.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
		if ($user['level'] == '10') { 
		$obraztid=rand(5,20);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obraztid.",".($obraztid/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obraztid.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
		if ($user['level'] == '11') { 
		$obraztib=rand(10,30);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obraztib.",".($obraztib/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obraztib.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
		if ($user['level'] == '12') { 
		$obraztie=rand(10,30);
		db_query("insert into inventory (`name`,`owner`,`maxdur`,`koll`,`massa`,`img`,`destinyinv`,`type`,`made`,`isrep`) values ('Образец',".$user['id'].",'1',".$obraztie.",".($obraztie/10).",'mater_suv_drop.gif','0','190','suburb','0')");
        addchp ('<font color=red><b>Внимание!</b></font> Вы создали предмет "Образец"x'.$obraztie.' ','{[]}'.$user['login'].'{[]}');		
		ist($user['id']); }
	}
	
	If ($hellround['volna']>1 and $hellround['end']==0){
		$add_hp=$user['maxhp']/20;
		$add_mp=$user['maxmana']/20;
		If ($user['maxhp']<$user['hp']+$add_hp){$add_hp=$user['maxhp']-$user['hp'];}
		If ($user['maxmana']<$user['mana']+$add_mp){$add_mp=$user['maxmana']-$user['mana'];}
		db_query("UPDATE users set `hp`=`hp`+'".$add_hp."', `mana`=`mana`+'".$add_mp."' WHERE id='".$_SESSION['uid']."'");
		
		$pohod['volna']=$hellround['volna'];
		$_POST['letsgo']=1;
	}elseif($hellround['end']==1){
		$pohod['volna']=1;
		$_POST['letsgo']=1;	
	}
	
	header("Cache-Control: no-cache");
    // демон, запускающий волны
    $names = array("Рабочий Мглы",
				   "Проклятие Глубин",
				   "Кошмар Глубин",
				   "Кошмар Глубин",
				   "Лука",
				   "Сила Крoггентайла",
				   "Большой Тяжёлый Молот",
				   "Гарл Йонни Салистон",
				   
				   "Древний Страж",
				   "Pабочий мглы",
				   "Нaдзиратель глубин",
				   "Душа Кроггентaйла",
				   "Древний Страж");
	$bots = array(20450,21302,85,24,89,21055,21454,21455,
					20760,19586,19587,21304,20761);
	$shema = array ( "20450" => 4, //0
	                 "11152" => 4, //1
	                 "21302" => 2, //2
	                 "85" => 2, //3
	                 "89" => 2, //4	 
	                 "21055" => 5, //5
	                 "21454" => 3, //6
	                 "21455" => 10, //7
	                 "20760" => 7, //8
	                 "20761" => 4, //9					 
					 );
					 

	$ggs=mysqli_fetch_array(db_query("SELECT * FROM battle WHERE t1='".$user['id']."' and room=102 ORDER by date ASC"));
	if ($ggs['win']==2 and $ggs['to1']>=time()-60) {
		ist($user['id']);
	}
	
	if ($_POST['start']) {
		//db_query("DELETE FROM inventory WHERE name='Пропуск' and owner='".$user['id']."' LIMIT 1");
		$H=24-date("H");
		$M=60-date("i");
		$S=60-date("s");
		$zader_time=$H*60*60+$M*60+$S;
		
		db_query("insert into effects (`owner`,`type`,`time`,`name`) values (".$_SESSION['uid'].",9997,".(time()+$zader_time).",'Касание хаоса')");
		$pohod1=mysqli_fetch_array(db_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
		$l=time()-60*60*24;
		if ($pohod1['date_out']<=$l){
			db_query("UPDATE hellround_pohod set date_in='".time()."',volna=1,end=0 WHERE owner='".$user['id']."'");
		} else { 
			ist($user['id']); 
		}
	}

	$pohod=mysqli_fetch_array(db_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
	if ($_POST['cash']){
		$gr=$pohod['volna']*100-600;
		db_query("UPDATE users SET money=money+400 where id='".$user['id']."'");
		$_SESSION['cash']=0;
	}
	
	if ($pohod['end']==1 or $_POST['dal']) {ist($user['id']);}

	if ($_POST['letsgo']) {
	
		if ($pohod['volna']==1){
			db_query("UPDATE `hellround_pohod` SET `user_lose`=".$user['lose']." WHERE `owner` = ".$user['id']." LIMIT 1;");
		}
		
		if ($pohod['volna']==31){ist($user['id']);}
		$rand_bos=rand(1,100);
		If ($rand_bos<10){
			$rand_bos=rand(5,9);
			$_SESSION['cash']=1;
			$botz = mysqli_fetch_array(db_query("SELECT `maxhp`,`id` FROM `users` WHERE `id` = '".$bots[$rand_bos]."' LIMIT 1;"));
			db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$names[$rand_bos]." (проекция ".($n).")','".$bots[$rand_bos]."','','".$botz['maxhp']."');");
			$botw = db_insert_id();
			$enemys[] = $botw;
			$teams = array();
			foreach($enemys as $v) {
				$teams[$user['id']][$v] = array(0,0,time());
				$teams[$v][$user['id']] = array(0,0,time());
			 }
		} else {
			for($n = 1; $n <= $pohod['volna']; $n++) {
				$gg=rand(0,4);
				$botz = mysqli_fetch_array(db_query("SELECT `maxhp`,`id` FROM `users` WHERE `id` = '".$bots[$gg]."' LIMIT 1;"));
				db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$names[$gg]." (проекция ".($n).")','".$bots[$gg]."','','".$botz['maxhp']."');");
				$botw = db_insert_id();
				$enemys[] = $botw;
			}
			$teams = array();
			foreach($enemys as $v) {
				$teams[$user['id']][$v] = array(0,0,time());
				$teams[$v][$user['id']] = array(0,0,time());
			} 
		}
		
		db_query("INSERT INTO `battle` (`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`)
								   VALUES ('','".serialize($teams)."','3','1','0','".$user['id']."','".implode(";",$enemys)."','".time()."','".time()."')");
		$id = db_insert_id();
		// апдейтим бота
		foreach($enemys as $v) {
			db_query("UPDATE `bots` SET `battle` = ".$id." WHERE `id` = ".$v." LIMIT 1;");
		}
		addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда <b>".nick3($user['id'])."</b> вышел на битву с Адом... <BR>");
		//chown ("/backup/logs/battle".$id.".txt" , "www-data" );
		//chgrp ("/backup/logs/battle".$id.".txt" , "www-data" );

		db_query("UPDATE users SET `battle` =".$id.",`zayavka`=0 WHERE `id`= ".$user['id'].";");
		$volna=db_result(db_query("SELECT volna FROM hellround_pohod WHERE owner='".$user['id']."'"),0);
        addchp ('<font color=red><b>Внимание!</b></font> Надвигается <font color=blue><b>'.$volna.'</b></font> волна! ','{[]}'.$user['login'].'{[]}');
		db_query("UPDATE `hellround_pohod` SET `volna`=`volna`+1, `repa`=`repa`+1 WHERE `owner` = ".$user['id']." LIMIT 1;");
		db_query("UPDATE daily_kwest SET taked=taked+1 WHERE user_id='".$user['id']."' and kwest_id=7");
		If($pohod['volna']>$pohod['max_volna']){
			db_query("UPDATE `hellround_pohod` SET `max_volna`='".$pohod['volna']."' WHERE `owner` = ".$user['id']." LIMIT 1;");
		}
		header ("location:fbattle.php");
	}

?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT SRC="jquery-1.6.2.min.js"></SCRIPT>
<SCRIPT SRC="jquery-ui-1.8.16.custom.min.js"></SCRIPT>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
	<TABLE border=0 width=100% cellspacing="0" cellpadding="0">
	<td align=right>	
	</table>
	<table>
	<tr>
	<td>
	<form action=""  method=post >
<input type=submit id=st1 name=letsgo value="Пошли на <? echo $pohod['volna'];?> Волну"><br>
</form>
<form action=""  method=post >
<INPUT TYPE="submit" value="Здатся" name="dal">
</form>
<span id=st2 style="display:none;" >Осталось:<b id=st3></b></span>

<?
if (($pohod['volna']==21 or $pohod['volna']==26 or $pohod['volna']==31) and $_SESSION['cash']==1)
{
$_SESSION['cash']=0;
$gr=400; ?>
<form method=post action=''>
В Комнате Валяеться<? echo $gr; ?>Кр <br>
<input type=submit name=cash value='podnet'>
</form>
<?
}
?>
	</td>
	</tr>
	</table>
	<script>
	$("#st1").click(function () {  
	  $("#st1").hide();
	  $("#st2").show();
	  //$("#st3").text("3").delay(5000);
	  //$("#st3").text("2").delay(5000);
	  //$("#st3").text("1").delay(5000);
	  setTimeout(function () {$("#st3").text('3');, 220);
	  setTimeout(function () {$("#st3").text('2');, 220);
	  setTimeout(function () {$("#st3").text('1');, 220);
	  
    });
	</script>
</BODY>
</HTML>