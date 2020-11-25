<?php
	session_start();
	if ($_SESSION['uid'] == null) {
		header("Location: index.php");
		exit;
	}
	
	include "connect.php";
	include "functions.php";
	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['uid']."' LIMIT 1;"));
	
	$d = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".$_SESSION['uid']."' AND `dressed` = 0 AND `setsale` = 0 ; "));
	$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`= 0 AND `id` = '".(int)$_GET['sed']."' AND `owner` = '".$_SESSION['uid']."'  AND `podzem`=1 LIMIT 1;"));

   // if ($user['room'] != 59 or $user['battle'] != 0) {
		//header("Location: main.php");  
		//exit; 
	//}
	
	if (($_GET['set'] OR $_POST['set'])){
		if ($_GET['set']) {
			$set = $_GET['set']; 
		}
		if ($_POST['set']){
			$set = $_POST['set']; 
		}
		if (!isset($_POST['count']) or !is_numeric($_POST['count'])){
			$_POST['count'] =1; 
		}
		
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `bookshop` WHERE `id` = '".(int)$set."' LIMIT 1;"));
		
		$components = array('xrustal'=>'Хрусталь','braga'=>'Брага','almaz'=>'Алмаз','mox'=>'Пещерный Мох','bur'=>'Бур','costi'=>'Кости','autvais'=>'Аутвайс','kamen'=>'Драконий Камень','granit'=>'Гранит','cvetok'=>'Подгорный Эдельвейс','klik'=>'Клык Проклятья Глубин','amulet'=>'Амулет Пустынника','zelie'=>'Зелье Пустынника','trapio'=>'Тряпье');
		
		foreach($components as $k=>$v){
			if($dress[$k]>0){
				$vear = mysql_query("SELECT koll,id FROM `inventory` WHERE `type`='200' and `name`='$v'  and owner='".$user["id"]."'");
				while($vls = mysql_fetch_array($vear))
				{
					 $$k += $vls['koll'];
				}
			}
		}

		if (($dress['massa']*$_POST['count']+$d[0]) > get_meshok()) {
			echo "<font color=red><b>Недостаточно места в рюкзаке.</b></font>";
		}elseif(($user['money']>= ($dress['cost']*$_POST['count']))
		&& ($dress['count'] >= $_POST['count'])		
&& ($xrustal >= ($dress['xrustal']*$_POST['count'])) 
					&& ($braga >= ($dress['braga']*$_POST['count'])) 
						&& ($mox >= ($dress['mox']*$_POST['count'])) 
							&&($almaz >= ($dress['almaz']*$_POST['count']))
                              &&($granit >= ($dress['granit']*$_POST['count']))
                                &&($bur >= ($dress['bur']*$_POST['count']))
                                   &&($costi >= ($dress['costi']*$_POST['count']))
                                       &&($autvais >= ($dress['autvais']*$_POST['count']))
                                          &&($kamen >= ($dress['kamen']*$_POST['count']))                      

&&($granit>= ($dress['granit']*$_POST['count']))   
&&($cvetok >= ($dress['cvetok']*$_POST['count']))   
&&($klik >= ($dress['klik']*$_POST['count']))   
&&($amulet >= ($dress['amulet']*$_POST['count']))   
&&($zelie >= ($dress['zelie']*$_POST['count']))   
&&($trapio >= ($dress['trapio']*$_POST['count']))){

			for($k=1;$k<=$_POST['count'];$k++) {
				  if(mysql_query("INSERT INTO `inventory`
                (`prototype`,`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,
                    `gsila`,`glovk`,`ginta`,`gintel`,`ghp`,`gmana`,`gnoj`,`gtopor`,`gdubina`,`gmech`,`gposoh`,`gluk`,`gfire`,`gwater`,`gair`,`gearth`,`glight`,`ggray`,`gdark`,`needident`,`nsila`,`nlovk`,`ninta`,`nintel`,`nmudra`,`nvinos`,`nnoj`,`ntopor`,`ndubina`,`nmech`,`nposoh`,`nluk`,`nfire`,`nwater`,`nair`,`nearth`,`nlight`,`ngray`,`ndark`,
                    `mfkrit`,`mfakrit`,`mfuvorot`,`mfauvorot`,`bron1`,`bron2`,`bron3`,`bron4`,`maxu`,`minu`,`magic`,`nlevel`,`nalign`,`dategoden`,`goden`,`otdel`,`gmp`,`gmeshok`,`destinyinv`,`gift`,`mfkritpow`,`mfantikritpow`,`mfparir`,`mfshieldblock`,`mfcontr`,`mfrub`,`mfkol`,`mfdrob`,`mfrej`,`mfdhit`,`mfdmag`,`mfhitp`,`mfmagp`,`opisan`,`second`,`vid`,`sitost`,`dvur`,`chkol`,`chrub`,`chrej`,`chdrob`,`chmag`,`mfproboj`,`stats`,
                    `mfdkol`,`mfdrub`,`mfdrej`,`mfddrob`,bronmin1,bronmin2,bronmin3,bronmin4,blockzones,
                    mffire, mfwater, mfair, mfearth, mflight, mfdark, minusmfdmag, minusmfdfire, 
                    minusmfdair, minusmfdwater, minusmfdearth, manausage, includemagic, includemagicdex, 
                    includemagicmax, includemagicname, includemagicuses, includemagiccost, includemagicusesperday,
                    mfdair, mfdwater, mfdearth, mfdfire, mfddark, mfdlight, setid, honor                    
                )
                VALUES
                ('{$dress['id']}','{$_SESSION['uid']}','{$dress['name']}','{$dress['type']}',{$dress['massa']},{$dress['cost']},'{$dress['img']}',{$dress['maxdur']},{$dress['isrep']},'{$dress['gsila']}','{$dress['glovk']}','{$dress['ginta']}','{$dress['gintel']}','{$dress['ghp']}','{$dress['gmana']}','{$dress['gnoj']}','{$dress['gtopor']}','{$dress['gdubina']}','{$dress['gmech']}','{$dress['gposoh']}','{$dress['gluk']}','{$dress['gfire']}','{$dress['gwater']}','{$dress['gair']}','{$dress['gearth']}','{$dress['glight']}','{$dress['ggray']}','{$dress['gdark']}','{$dress['needident']}','{$dress['nsila']}','{$dress['nlovk']}','{$dress['ninta']}','{$dress['nintel']}','{$dress['nmudra']}','{$dress['nvinos']}','{$dress['nnoj']}','{$dress['ntopor']}','{$dress['ndubina']}','{$dress['nmech']}','{$dress['nposoh']}','{$dress['nluk']}','{$dress['nfire']}','{$dress['nwater']}','{$dress['nair']}','{$dress['nearth']}','{$dress['nlight']}','{$dress['ngray']}','{$dress['ndark']}',
                '{$dress['mfkrit']}','{$dress['mfakrit']}','{$dress['mfuvorot']}','{$dress['mfauvorot']}','{$dress['bron1']}','{$dress['bron2']}','{$dress['bron3']}','{$dress['bron4']}','{$dress['maxu']}','{$dress['minu']}','{$dress['magic']}','{$dress['nlevel']}','{$dress['nalign']}','".(($dress['goden'])?($dress['goden']*24*60*60+time()):"")."','{$dress['goden']}','{$dress['razdel']}','{$dress['gmp']}','{$dress['gmeshok']}','{$dress['destiny']}','{$dress['gift']}','{$dress['mfkritpow']}','{$dress['mfantikritpow']}','{$dress['mfparir']}','{$dress['mfshieldblock']}','{$dress['mfcontr']}','{$dress['mfrub']}','{$dress['mfkol']}','{$dress['mfdrob']}','{$dress['mfrej']}','{$dress['mfdhit']}','{$dress['mfdmag']}','{$dress['mfhitp']}','{$dress['mfmagp']}','{$dress['opisan']}','{$dress['second']}','{$dress['vid']}','{$dress['sitost']}','{$dress['dvur']}','{$dress['chkol']}','{$dress['chrub']}','{$dress['chrej']}','{$dress['chdrob']}','{$dress['chmag']}','{$dress['mfproboj']}','{$dress['stats']}',
                '{$dress['mfdkol']}','{$dress['mfdrub']}','{$dress['mfdrej']}','{$dress['mfddrob']}','{$dress['bronmin1']}','{$dress['bronmin2']}','{$dress['bronmin3']}','{$dress['bronmin4']}','{$dress['blockzones']}',
                $dress[mffire], $dress[mfwater], $dress[mfair], $dress[mfearth], $dress[mflight], $dress[mfdark], 
                '$dress[minusmfdmag]', '$dress[minusmfdfire]', '$dress[minusmfdair]', '$dress[minusmfdwater]', '$dress[minusmfdearth]',
                '$dress[manausage]', '$dress[includemagic]', '$dress[includemagicdex]', '$dress[includemagicmax]', '$dress[includemagicname]',
                '$dress[includemagicuses]', '$dress[includemagiccost]', '$dress[includemagicusesperday]',
                '$dress[mfdair]', '$dress[mfdwater]', '$dress[mfdearth]', '$dress[mfdfire]', '$dress[mfddark]', '$dress[mfdlight]', '$dress[setid]', '".($dress["honor_cost"]?1:0)."'
                ) ;")){
					$good = 1;
				}else{
						$good = 0;
				}
			}
				
			if ($good==1) {
				if(mysql_query("UPDATE `bookshop` SET `count`=`count`-'".(int)$_POST['count']."' WHERE `id` = '".(int)$set."' LIMIT 1;")){
				mysql_query("UPDATE `users` set `money` = `money`- '".(float)($_POST['count']*$dress['cost'])."' WHERE id = '".$_SESSION['uid']."' ;");
				  $user['money'] -= $_POST['count']*$dress['cost'];      
                  echo "<font color=red><b>Вы купили {$_POST['count']} шт. \"{$dress['name']}\".</b></font>";
				}
				
				foreach($components as $k=>$v){
					$vsego = (($$k)-$dress[$k]);
					if($dress[$k]>0 && $vsego==0){
						mysql_query("DELETE FROM `inventory` WHERE `type`='200'  and `name`='$v' and owner='".$user["id"]."'");
						}elseif($dress[$k]>0 && (($$k)-$dress[$k])>0){
						$ic = mysql_fetch_assoc(mysql_query("select count(*) as count from `inventory` WHERE `type`='200'  and `name`='$v' and owner='".$user["id"]."'"));
						if($ic['count']>1){
                        mysql_query("DELETE FROM `inventory` WHERE `type`='200'  and `name`='$v' and owner='".$user["id"]."' limit ".($ic['count']-1));
						}
                     	mysql_query("UPDATE `inventory` set koll = '$vsego', massa='$mas' WHERE `type`='200' and `name`='$v' and owner='".$user["id"]."'");
						}elseif($dress[$k]>0 && (($$k)-$dress[$k])<0){
						echo 'Не хватает материала "'.$v.'"';
					}
				}
				
				$dressid = '';
				$invdb = mysql_query("SELECT `id` FROM `inventory` WHERE `name` = '".$dress['name']."' ORDER by `id` DESC LIMIT ".(int)$_POST['count']." ;" );
				while ($dressinv = mysql_fetch_array($invdb))  {
					$dressid .= "cap".$dressinv['id'].",";
				}
				$dresscount="(x".(int)$_POST['count'].") ";
				$allcost=(float)($_POST['count']*$dress['cost']);
				$all_material_cost = '';
				
				foreach($components as $k=>$v){
					$all_material_cost .= ", ".$v."(".(float)($dress[$k]*$_POST['count']).")";
				}
							   
				mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".$_SESSION['uid']."','\"".$user['login']."\" купил товар: \"".$dress['name']."\" ".$dresscount."id:(".$dressid.") [0/".$dress['maxdur']."] за ".$allcost." кр.".(($all_material_cost=='')?'':$all_material_cost)."',1,'".time()."');");
			}
		}else {
			echo "<font color=red><b>Недостаточно денег или не хватает ресурсов.</b></font>";
		}
	}





?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT LANGUAGE="JavaScript">
function AddCount(name, txt)
{
	document.all("hint3").innerHTML = '<table border=0 width=100% cellspacing=1 cellpadding=0 bgcolor="#CCC3AA"><tr><td align=center><B>Купить неск. штук</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</TD></tr><tr><td colspan=2>'+
	'<table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor="#FFF6DD"><tr><INPUT TYPE="hidden" name="set" value="'+name+'"><td colspan=2 align=center><B><I>'+txt+'</td></tr><tr><td width=80% align=right>'+
	'Количество (шт.) <INPUT TYPE="text" NAME="count" size=4></td><td width=20%>&nbsp;<INPUT TYPE="submit" value=" »» ">'+
	'</TD></TR></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = event.x+document.body.scrollLeft-20;
	document.all("hint3").style.top = event.y+document.body.scrollTop+5;
	document.all("count").focus();
}
// Закрывает окно
function closehint3()
{
	document.all("hint3").style.visibility="hidden";
}
</SCRIPT>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
<TABLE border=0 width=100% cellspacing="0" cellpadding="0">
<FORM action="city.php" method=GET>
<tr><td valign=top><div align=center><h3>Книжный магазин</h3></div><td align=right>
<link href="/i/move/design6.css" rel="stylesheet" type="text/css"><script language="javascript" type="text/javascript">
function fastshow2 (content, eEvent ) {
var el = document.getElementById("mmoves");
eEvent = eEvent || window.event;
if( !eEvent )
return;
var o = eEvent.target || eEvent.srcElement;
if (content!='' && el.style.visibility != "visible") {el.innerHTML = '<small>'+content+'</small>';}
var x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft - el.offsetWidth + 5;
var y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop+20;
if (x + el.offsetWidth + 3 > document.body.clientWidth + document.body.scrollLeft) { x=(document.body.clientWidth + document.body.scrollLeft - el.offsetWidth - 5); if (x < 0) {x=0}; }
if (y + el.offsetHeight + 3 > document.body.clientHeight  + document.body.scrollTop) { y=(document.body.clientHeight + document.body.scrollTop - el.offsetHeight - 3); if (y < 0) {y=0}; }
if (x<0) {x=0;}
if (y<0) {y=0;}
el.style.left = x + "px";
el.style.top  = y + "px";
if (el.style.visibility != "visible") {
el.style.visibility = "visible";
}
}
function hideshow () {
document.getElementById("mmoves").style.visibility = 'hidden';
}
</script>
<table  border="0" cellpadding="0" cellspacing="0">
<tr align="right" valign="top">
<td>


</td>
<td>

<TABLE height=15 border="0" cellspacing="0" cellpadding="0">
<TR>
<TD rowspan=3 valign="bottom"><a href="?rnd=0.313154328583547"><img src="/i/move/rel_1.gif" width="15" height="16" alt="Обновить" border="0" /></a></TD>
<TD colspan="3"><img src="/i/move/navigatin_462.gif" width="80" height="4" /></TD>
</TR>
<TR>
<TD><IMG src="/i/move/navigatin_481.gif" width="9" height="8"></TD>
<TD width=64 bgcolor=black><DIV class="MoveLine"><IMG src="/i/move/wait2.gif" id="MoveLine" class="MoveLine"></DIV></TD>
<TD><IMG src="/i/move/navigatin_50.gif" width="7" height="8"></TD>
</TR>
<TR>
<TD colspan="3"><IMG src="/i/move/navigatin_tt1_532.gif" width="80" height="5"></TD>
</TR>
</TABLE>


<table  border="0" cellspacing="0" cellpadding="0">
<tr>
<td nowrap="nowrap" id="moveto">
<table width="100%"  border="0" cellpadding="0" cellspacing="1" >

<tr>
<td ><img src="/i/move/links.gif" width="9" height="7" /></td>
<td  nowrap><a href="city.php?btg=1" onClick="return check_access();" class="menutop" title="Время перехода: 10 сек.  ">Большая торговая</a></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>
<script language="javascript" type="text/javascript">
var progressEnd = 64;		// set to number of progress <span>'s.
var progressColor = '#00CC00';	// set to progress bar color
var mtime = parseInt('14');
if (!mtime || mtime<=0) {mtime=0;}
var progressInterval = Math.round(mtime*1000/progressEnd);	// set to time between updates (milli-seconds)
var is_accessible = true;
var progressAt = progressEnd;
var progressTimer;
function progress_clear() {
progressAt = 1;
is_accessible = false;
set_moveto(true);
}
function progress_update() {
progressAt++;
//if (progressAt > progressEnd) progress_clear();
if (progressAt > progressEnd) {
is_accessible = true;
if (window.solo_store && solo_store) { solo(solo_store, ""); } // go to stored
set_moveto(false);
} else {
if( !( progressAt % 2 ) )
document.getElementById('MoveLine').style.left = progressAt - 64;
progressTimer = setTimeout('progress_update()',progressInterval);
}
}
function set_moveto (val) {
document.getElementById('moveto').disabled = val;
if (document.getElementById('bmoveto')) {
document.getElementById('bmoveto').disabled = val;
}
}
function progress_stop() {
clearTimeout(progressTimer);
progress_clear();
}
function check(it) {
return is_accessible;
}
function check_access () {
return is_accessible;
}
function ch_counter_color (color) {
}
if (mtime>0) {
progress_clear();
progress_update();
}
</script>
</TD></TR>


</FORM>
</table>
<TABLE border=0 width=100% cellspacing="0" cellpadding="4">
<TR>
    <FORM METHOD=POST ACTION="bookshop.php">
	<INPUT TYPE="hidden" name="sid" value="">
	<INPUT TYPE="hidden" name="id" value="1">
	<TD valign=top align=left>
<!--Магазин-->
<TABLE border=0 width=100% cellspacing="0" cellpadding="0" bgcolor="#A5A5A5">
<TR>
	<TD align=center><B>Отдел "<?php
	if ($_POST['sale']) {
		echo "Скупка";
	} else
switch ($_GET['otdel']) {
	case null:
		echo "Книги";
		$_GET['otdel'] = 1;
	break;
	case 1:
		echo "Книги";
	break;

	case 111:
		echo "Воинские приемы защиты";
	break;

	case 112:
		echo "Воинские приемы контрударов";
	break;

	case 113:
		echo "Воинские приемы критических ударов";
	break;

	case 115:
		echo "Воинские комбо-приемы";
	break;

	case 12:
		echo "Воинские приемы силы духа";
	break;

	case 200:
		echo "Заклинания Огня";
	break;

        case 21:
		echo "Заклинания Воды";
	break;

        case 22:
		echo "Заклинания Воздуха";
	break;

	case 23:
		echo "Заклинания Земли";
	break;

	case 231:
		echo "Заклинания Белой магии";
	break;

	case 24:
		echo "Заклинания Черной магии";
	break;

	case 25:
		echo "Заклинания Серой магии";
	break;

    case 116:
		echo "Воинские приемы парирования";
	break;



}


	?>"</B>

	</TD>
</TR>

<TR><TD>
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?
if($_REQUEST['present']) {

	if($_POST['to_login'] && $_POST['flower']) {
		$to = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".mysql_real_escape_string($_POST['to_login'])."' LIMIT 1;"));
		if ($_POST['to_login'] == $user['login']) {
			echo "<b><font color=red>Очень щедро дарить что-то самому себе ;)</font></b>";
		}
		elseif ($to['room'] > 500 && $to['room'] < 561) {
			echo "<b><font color=red>Персонаж в данный момент участвует в турнире в Башне Смерти. Попробуйте позже.</font></b>";
		}
		else {

			if($_POST['from']==1) { $from = 'Аноним'; }
			elseif($_POST['from']==2 && $user['klan']) { $from = ' клана '.$user['klan']; }
			else {$from = $user['login'];}
			if ($to) if(mysql_query("UPDATE `inventory` SET `owner` = '".$to['id']."', `present` = '".$from."', `letter` = '".mysql_real_escape_string($_POST['podarok2'])."' WHERE  `present` = '' AND `id` = '".mysql_real_escape_string($_POST['flower'])."' AND `owner` = '".$_SESSION['uid']."' AND `dressed` = 0  AND `setsale`=0")) {
				$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($_POST['flower'])."' LIMIT 1; "));
				$buket_name=$res['name'];
				mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".$_SESSION['uid']."','Подарен предмет \"".$res['name']."\" id:(cap".$res['id'].") [".$res['duration']."/".$res['maxdur']."] от \"".$from."\" к \"".$to['login']."\"','1','".time()."');");
				mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($to['id'])."','Подарен предмет \"".$res['name']."\" id:(cap".$res['id'].") [".$res['duration']."/".$res['maxdur']."] от \"".$from."\" к \"".$to['login']."\"','1','".time()."');");
				if(($_POST['from']==1) || ($_POST['from']==2)) {
					$action="подарил";
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($to['id'])."','Подарен предмет \"".$res['name']."\" id:(cap".$res['id'].") [".$res['duration']."/".$res['maxdur']."] от \"".$user['login']."\" к \"".$to['login']."\"','5','".time()."');");
				}
				else {
					if ($user['sex'] == 0) {$action="подарила";}
					else {$action="подарил";}
				}
				$us = mysql_fetch_array(mysql_query("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '{$to['id']}' LIMIT 1;"));
				if($us[0]){
					addchp ('<font color=red>Внимание!</font> <span oncontextmenu=OpenMenu()>'.$from.'</span> '.$action.' вам <B>'.$buket_name.'</B>.   ','{[]}'.$_POST['to_login'].'{[]}');
				} else {
					// если в офе
					mysql_query("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".mysql_real_escape_string($to['id'])."','','".'<font color=red>Внимание!</font> <span oncontextmenu=OpenMenu()>'.$from.'</span> '.$action.' вам <B>'.$buket_name.'</B>.   '."');");
				}
				echo "<b><font color=red>Подарок удачно доставлен к \"",$_POST['to_login'],"\"</font></b>";
			}
			echo mysql_error();
		}
	}

		?>

       
<!-- Подарить подарок -->
<form method="post">
<TABLE cellspacing=0 cellpadding=0 width=100% bgcolor=#e0e0e2><TD>
<INPUT TYPE=hidden name=present value=1>
Вы можете сделать подарок дорогому человеку. Ваш подарок будет отображаться в информации о персонаже.
<OL>
<LI>Укажите логин персонажа, которому хотите сделать подарок<BR>
Login <INPUT TYPE=text NAME=to_login value="">

<LI>Напишите текст сопроводительной записки (в информации о персонаже не отображается)<BR>
<TEXTAREA NAME=txt ROWS=6 COLS=80></TEXTAREA>
<LI>Выберите, от чьего имени подарок:<BR>
<INPUT TYPE=radio NAME=from value=0 checked> <? nick2($user['id']);?><BR>
<INPUT TYPE=radio NAME=from value=1 > анонимно<BR>
<INPUT TYPE=radio NAME=from value=2 > от имени клана<BR>
<LI>Нажмите кнопку <B>Подарить</B> под предметом, который хотите преподнести в подарок:<BR>
</OL>
<input type="hidden" name="flower" id="flower" value="">
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?

//print_r($_POST);

	$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".$_SESSION['uid']."' AND `dressed` = 0 AND `gift`=1 AND `setsale`=0 AND `present` = '' ORDER by `id` DESC; ");
	while($row = mysql_fetch_array($data)) {
		if(!@in_array($row['id'],@array_keys($_SESSION['flowers']))) {
			$row['count'] = 1;
			if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
			echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"/i/sh/{$row['img']}\" BORDER=0>";
			?>
			<BR><input type="submit" onClick="document.all['flower'].value='<?=$row['id']?>';" value="Подарить">
			</TD>
			<?php
			echo "<TD valign=top>";
			showitem ($row);
			echo "</TD></TR>";
		}
	}
?>
</table>
</form>

		<?
	}
	else
if ($_REQUEST['sale']) {
	$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".$_SESSION['uid']."' AND `dressed` = 0  AND `setsale`=0  AND `podzem`=0 AND `ecost`=0 AND `gift`=0 AND `honor`=0 ORDER by `update` DESC; ");
	while($row = mysql_fetch_array($data)) {
		$row['count'] = 1;
		if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"/i/sh/{$row['img']}\" BORDER=0>";

		$price=$row['cost']/2;

		?>
		<BR><A HREF="bookshop.php?sed=<?=$row['id']?>&sid=&sale=1">продать за <?=round($price-$row['duration']*($row['cost']/($row['maxdur']*10)),2)?></A>
		
		</TD>		



<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
} else
{
	$data = mysql_query("SELECT * FROM `bookshop` WHERE `count` > 0 AND `razdel` = '".mysql_real_escape_string($_GET['otdel'])."' ORDER by `nlevel` ASC");  

        while($row = mysql_fetch_array($data)) {
		if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"/i/sh/{$row['img']}\" BORDER=0>";
		?>
		<BR><A HREF="bookshop.php?otdel=<?=$_GET['otdel']?>&set=<?=$row['id']?>&sid=">купить</A>
		<IMG SRC="/i/up.gif" WIDTH=11 HEIGHT=11 BORDER=0 ALT="Купить несколько штук" style="cursor:hand" onClick="AddCount('<?=$row['id']?>', '<?=$row['name']?>')"><br><A HREF="bookshop.php?otdel=<?=$_GET['otdel']?>&set1=<?=$row['id']?>&sid="></A></TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
}
	$user8 = mysql_fetch_array(mysql_query("SELECT money FROM `users` WHERE `id` = '".$_SESSION['uid']."' LIMIT 1;"));
?>

</TABLE>
</TD></TR>
</TABLE>

	</TD>
	

 <TD valign=top width=280><BR>
	<div align=right><small>Масса:

<?php

	$d = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `setsale` = 0 ; "));

	echo $d[0];
	?>/<?=get_meshok()?><BR>

	У вас в наличии: <FONT COLOR="#339900"><?=$user['money']?></FONT> кр.</small></div>

	
	<div style="MARGIN-LEFT:15px; MARGIN-TOP: 10px;">

	

<div style="background-color:#d2d0d0;padding:1"><center><font color="#oooo"><B>Отделы магазина</B></center></div>
<A HREF="bookshop.php?otdel=1&sid=&0.162486541405194">Книги:</A><BR>
<A HREF="bookshop.php?otdel=111&sid=&0.337606814894404">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы атаки</A><BR>
<A HREF="bookshop.php?otdel=112&sid=&0.286790872806733">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы защиты</A><BR>
<A HREF="bookshop.php?otdel=113&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы контрударов</A><BR>
<A HREF="bookshop.php?otdel=115&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы критических ударов</A><BR>
<A HREF="bookshop.php?otdel=116&sid=&0.76205958316951">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы парирования</A><BR>
<A HREF="bookshop.php?otdel=21&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские комбо-приемы</A><BR>
<A HREF="bookshop.php?otdel=200&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Воинские приемы силы духа</A><BR>
<A HREF="bookshop.php?otdel=22&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Огня</A><BR>
<A HREF="bookshop.php?otdel=23&sid=&0.99133839275569">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Воды</A><BR>
<A HREF="bookshop.php?otdel=231&sid=&9133839275569">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Воздуха</A><BR>
<A HREF="bookshop.php?otdel=24&sid=&0.567932791291376">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Земли</A><BR>
<A HREF="bookshop.php?otdel=25&sid=&0.567932791296566">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Белой магии</A><BR>
<A HREF="bookshop.php?otdel=26&sid=&0.567932791291655">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Черной магии</A><BR>
<A HREF="bookshop.php?otdel=27&sid=&0.567932791291687">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Заклинания Серой магии</A><BR>

	</div>
<div id="hint3" class="ahint"></div>
    
</TD>
    </FORM>
</TR>

</TABLE>

<br><div align=left>

	<?php include("mail_ru.php"); ?>

</div>

</HTML>