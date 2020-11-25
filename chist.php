<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	include "functions.php";
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
    $restr=mqfa1("select time from effects where owner='$user[id]' and type=".CLANRESTRICTION." order by id desc");
	$vv=mysql_fetch_assoc(mysql_query("SELECT COUNT(`login`) AS `login` FROM `chist` WHERE `owner`='".$user['id']."'"));

?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style>
	.row {
		cursor:pointer;
	}
</style>
<SCRIPT>
var Hint3Name = '';
function runmagic4(title, magic, name, name1, n){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</b></BIG></td></tr><tr><td colspan=2>'+
	'<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><td><form action="cerkov.php?n='+n+'" method=POST><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
	'Укажите логин жениха: <INPUT TYPE=text NAME="'+name+'">'+
	'<br>Укажите логин невесты: <INPUT TYPE=text NAME="'+name1+'">'+
	'<br><center><INPUT TYPE="submit" value=" »» "></center></TD></TR></FORM></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}
function closehint3(){
	document.all("hint3").style.visibility="hidden";
    Hint3Name='';
}
</SCRIPT>
</head>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<table border='0' cellspacing='0' cellpadding='0' width="100%">
										<tr height='22'>
										
											<td align='center' class='tbl-usi_label-center'>Подача заявок на чистоту</td>
										</tr>
								</table>
								<table border='0' cellspacing='0' cellpadding='0' width="100%">
										<tr height='22'>
										
											<td align='center' class='tbl-usi_label-center'>
<BR><TD style="width: 5%; vertical-align: top; ">&nbsp;</TD>
<TD style="width: 25%; vertical-align: top; text-align: right; "><INPUT type='button' value='Обновить' style='width: 75px' onclick='location="/chist.php"'>
&nbsp;<INPUT TYPE=button value="Вернутся" style='width: 75px' onclick="location.href='main.php'"></TD>
										</td>
										</tr>
								</table>
							<tr>
									<td class='tbl-usi_left'>&nbsp;</td>
									<td class='bgg2' valign='top' align='center' style='padding: 6 4 6 4'>
<body bgcolor="#CCCCCC">
<table width=100% cellspacing=0 cellpadding=5 border=0>
<tr>
<?
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));


?>
<td align=left>У Вас на счету: <b><?=$user['money']?></b> кр.</td>
<td align=right valign=top>&nbsp;</td>
</tr>
</table><table width=100% cellspacing=0 cellpadding=3 border=0>
        <tr>
<td align=center style='padding-left: 20px'><br>
<center>
Здесь вы можите подать заявку на чистоту. Стоимость этой услуги:<br>
<table border="3" bordercolor="#000000" style="background-color:#FFFFFF" width="70%" cellpadding="3" cellspacing="5">
	<tr>
		<td><b>Обычная проверка (Проверяеться по очереди)</b></td>
		<td><b>VIP Проверка (Проверяеться вне очереди)</b></td>
	</tr>
	<tr>
		<td>8 уровень - 200кр.</td>
		<td>8 уровень - 300кр.</td>
	</tr>
	<tr>
		<td>9 уровень - 400кр.</td>
		<td>9 уровень - 500кр.</td>
	</tr>
	<tr>
		<td>10 уровень - 600кр.</td>
		<td>10 уровень - 700кр.</td>
	</tr>
	<tr>
		<td>11 уровень - 800кр.</td>
		<td>11 уровень - 900кр.</td>
	</tr>
	<tr>
		<td>12 уровень - 1000кр.</td>
		<td>12 уровень - 1100кр.</td>
	</tr>
	<tr>
		<td>13 уровень - 1200кр.</td>
		<td>13 уровень - 1300кр.</td>
	</tr>
	<tr>
		<td>14 уровень - 1400кр.</td>
		<td>14 уровень - 1500кр.</td>
	</tr>
	<tr>
		<td>15 уровень - 1600кр.</td>
		<td>15 уровень - 1700кр.</td>
	</tr>
</table>
<br>
<?if(!$restr){
echo'<form action="" method="post">
<input name="gg" type="submit" value="Подать заявку"> или 
<input name="ggVIP" type="submit" value="Подать VIP заявку">
</form>';
} else {
echo "<font color=red><b>Вы не можете подать заявку, У вас запрет на вступление в кланы ещё ".secs2hrs($restr-time())."!</b></font>";
}
?>
<?
//Цены на обычные проверки
$tsena = array(8=>200,9=>400,10=>600,11=>800,12=>1000,13=>1200,14=>1400,15=>1600);
//Цены на вип ПРоверки 
$tsenavip = array(8=>300,9=>500,10=>700,11=>900,12=>1100,13=>1300,14=>1500,15=>1700);


if(isset($_POST['gg'])){
 if($vv['login'] == 0 and $user['level']>='8' and $user['money']>=$tsena[$user['level']] and empty($user['klan'])){
  mysql_query("INSERT INTO `chist` (owner,login)values('".$user['id']."','".$user['login']."')");
  mysql_query("UPDATE `users` SET `money`=`money`-{$tsena[$user['level']]} WHERE `id`='".$user['id']."'");
  print "У вас снято {$tsena[$user['level']]} кр. Ваша заявка принята!";
 }else{
	print"<font color=red>Вам нельзя подать заявку! Вы состоите в клане,Ваш уровень меньше 8 либо у вас недостаточно средств для оплаты данной услуги.</font>";
 }
}
if(isset($_POST['ggVIP'])){
	if($vv['login'] == 0 and $user['level']>='8' and $user['money']>=$tsenavip[$user['level']] and empty($user['klan'])){
	mysql_query("INSERT INTO `chist` (owner,login,status)values('".$user['id']."','".$user['login']."','VIP')");
	mysql_query("UPDATE `users` SET `money`=`money`-{$tsena[$user['level']]} WHERE `id`='".$user['id']."'");
	print"У вас снято {$tsenavip[$user['level']]} кр. Ваша заявка принята!";
	}else{
	print"<font color=red>Вам нельзя подать заявку! Вы состоите в клане,Ваш уровень меньше 8 либо у вас недостаточно средств для оплаты данной услуги.</font>";
	}
}
?>
<br>
<br>
<br>
<br>
В Ожидании.<br>
<br>

<?


if(!empty($_GET['da'])){
	$dd = mysql_fetch_array(mysql_query("SELECT * FROM `chist` WHERE `login`='".$_GET['login']."'"));
	if($dd and $user['align']>=1 and $user['align']<=3){
		mysql_query('DELETE FROM `chist` WHERE `owner`="'.$dd['owner'].'"');
		$magictime=time()+259200;
		mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$dd['owner']."','Паладинская проверка','".$magictime."','20');");
		$messtel="Помечено, что персонаж чист перед законом";
		$mess="".$user['login']." сделал пометку что ".$dd['login']." чист перед законом";
		mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$dd['owner']."','$mess','".time()."');");
		mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
		tele_check($dd['login'],$messtel);					
		echo "<font color=red><b>Успешно поставлена проверка персонажу '".$dd['login']."'</b></font>";
		print "<script>location.href='chist.php'</script>";

	}
}

if(!empty($_GET['net'])){
	$dd = mysql_fetch_array(mysql_query("SELECT * FROM `chist` WHERE `login`='".$_GET['login']."' "));
	if($dd and $user['align']>=1 and $user['align']<=3){
		mysql_query('DELETE FROM `chist` WHERE `owner`="'.$dd['owner'].'"');
		$messnet="Вы не прошли проверку";
		tele_check($dd['login'],$messnet);					
		print"<font color=red><b>'".$dd['login']."'</b> не прошел чистку.</font>";
		print "<script>location.href='chist.php'</script>";

	}
}


if(isset($_GET['open'])){
	$dd = mysql_fetch_array(mysql_query("SELECT * FROM `chist` WHERE `login`='".$_GET['login']."' "));
	if($dd and $user['align']>=1 and $user['align']<=3){
		mysql_query("UPDATE `chist` SET `comment`='".mysql_real_escape_string($_GET['cmt'])."' WHERE `owner`='".$dd['owner']."' ");
		
	}
}

$nn = mysql_query("SELECT * FROM `chist`");
print'<table  border="1" cellspacing="0" cellpadding="0" width=50%>';
while($chi=mysql_fetch_array($nn)){
	print'
	  <tr>
		<td align="center" width="50%">'.$chi['login'].'</td>
		<td align="center" width="50%"><nobr>
		
		';
		if($user['align']>=1 and $user['align']<=3){
			print" <a href='?da=1&login=".$chi['login']."'><input type='submit' value='Одобрить'></a>&nbsp;&nbsp;<a href='?net=1&login=".$chi['login']."'><input type='submit' value='Отказать'></a>";
		}else{
			print"У вас нет прав.";
		}
		print'
		</nobr></td>
		<td width=300><nobr>&nbsp;'.$chi['date'].'&nbsp;</nobr></td>	
		<td width=300>&nbsp;'.$chi['status'].'&nbsp;</td>';
		if($user['align']>=1 and $user['align']<=3){
			echo "<FORM id='REQUEST'><td><nobr><INPUT style=\"font-size:12px;\" TYPE=text NAME=cmt maxlength=40 size=40 value='".$chi['comment']."'>&nbsp;<INPUT style='font-size:12px;' TYPE=submit name=open value='Оставить Комментарий'><input name='login' type='hidden' value='".$chi['login']."'></FORM></nobr></td>";
		}
	  
	  print'</tr>';

}
?>
	</table>


</center><br>
</td>
</tr>
</table>
 
</td>
									<td class='tbl-usi_right'>&nbsp;</td>
							</tr>
 
														<tr height='18'>
							<td width='20' align='right' valign='top'>&nbsp;</td>
							<td class='tbl-shp_sml-bottom' valign='top' align='center'>&nbsp;   </td>
							<td width='20' align='left' valign='top'>&nbsp;</td>
							</tr>
						</table>
