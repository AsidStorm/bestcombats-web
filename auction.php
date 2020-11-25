<?php
	session_start();
	if ($_SESSION['uid'] == null) {
		header("Location: index.php");
		exit;
	}
	
	include "./connect.php";
	include "./functions.php";
	include "./time_functions.php";
	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['uid']."' LIMIT 1;"));
	
	if($user['room'] != 42){ 
		header("Location: main.php"); 
		exit;
	}
	if($user['battle'] != 0){
		header('location: fbattle.php'); 
		exit;
	}
	
	if(isset($_GET['sale'],$_GET['kredit'],$_GET['n']) and $_GET['sale']!=""){
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".(int)$_GET['n']."' and owner='".$_SESSION['uid']."' LIMIT 1;"));
		echo mysql_error();
		if($dress){
			if($_GET['kredit']>=0.01){
				if(mysql_query("insert into `auction` (id,time,price,pers_id,stype,xdd,bids) values ('".$dress['id']."', '".(time()+86400)."', '".(float)$_GET['kredit']."', '".$_SESSION['uid']."', '', '', '')")){
					if(mysql_query("update `inventory` set `auction`=3, `owner`=owner+200000000 WHERE `id`='".(int)$_GET['n']."'")){
						$err= "<font color=red><b>Вы выставили ".$dress['name']." на аукцион за ".(float)$_GET['kredit']." кр.</b></font>";
					}
				}
			}else{
				$err = "<font color=red>Вы не можете выставить предмет за бесценок</font>";
			}
		}else{
			$err = "<font color=red>Вы не можете выставить чужой предмет</font>";
		}
		$_GET['razdel']=3;
	}
	
	if(isset($_GET['cssale'],$_GET['kredit'],$_GET['n']) and $_GET['cssale']!=""){
		if($user['money']>=$_GET['kredit']){
			$dress = mysql_fetch_array(mysql_query("SELECT * FROM `auction` WHERE `id` = '".(int)$_GET['n']."' LIMIT 1;"));
			
			if ($dress['pers_id']!=$_SESSION['uid']){
				if($dress['price'] < $_GET['kredit']){
					$bids = (($dress['bids']=="")?($_SESSION['uid']):($dress['bids'].",".$_SESSION['uid']));
					$sales = (($dress['sales']=="")?((float)$_GET['kredit']):($dress['sales'].",".(float)$_GET['kredit']));
					if(mysql_query("update `users` set `money`=money-".(float)$_GET['kredit']." WHERE `id`='".$_SESSION['uid']."'")){
						if(mysql_query("update `auction` set `price`='".(float)$_GET['kredit']."', `bids`='".$bids."', `sales`='".$sales."' WHERE `id`='".(int)$_GET['n']."'")){
							$err= "<font color=red><b>Вы поставили ставку на ".$dress['name']." в количестве ".(float)$_GET['kredit']." кр.</b></font>";
						}
					}
				}else{
					$err = "<font color=red>Вы не можете сделать ставку ниже текущей</font>";
				}
			}else{
				$err = "<font color=red>Вы не можете сделать ставку на свой предмет</font>";
			}
		}else{
			$err = "<font color=red>У Вас недостаточно денег</font>";
		}
		$_GET['razdel']=0;
	}
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<link rel="stylesheet" href="http://img.bestcombats.net/css/jquery.tooltip.css" />
<script src="http://img.bestcombats.net/js/lib/jquery.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/sl.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/lib/jquery.bgiframe.js" type="text/javascript"></script>

<script src="http://img.bestcombats.net/js/lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/jquery.tooltip.js" type="text/javascript"></script>
<SCRIPT>
$(function() {
$('img').tooltip({
showURL: false
});

});
$(function() {
$('span').tooltip({
showURL: false
});

});
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
// Закрывает окно
function closehint3()
{
	document.all("hint3").style.visibility="hidden";
}
function AddCount(name)
{

	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = event.x+document.body.scrollLeft-20;
	document.all("hint3").style.top = event.y+document.body.scrollTop+5;
	document.all("count").focus();
}
function sale(name, txt, n, kr)
{
	var s = prompt("Поставить на аукцион \""+txt+"\". Укажите цену:", kr);
	if ((s != null)&&(s != '')) {
		location.href="auction.php?sale="+name+"&kredit="+s+"&n="+n;
	}
}
function cssale(name, txt, n, kr)
{
	var s = prompt("Поднять ставку \""+txt+"\". Укажите цену:", kr);
	if ((s != null)&&(s != '')) {
		location.href="auction.php?cssale="+name+"&kredit="+s+"&n="+n;
	}
}
</SCRIPT>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
<TABLE border=0 width=100% cellspacing="0" cellpadding="0">
<FORM action="city.php" method=GET>
<tr><td valign=top><div align=center><h3>Филиал Аукциона</h3></div><td align=right>
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
<br>
	<small>Масса:

	<?=(int)$d[0];?>/<?=$user['sila']*4?> <BR>
	У вас в наличии: <FONT COLOR="#339900"><?=$user['money']?></FONT> кр.</small>

</TD></TR>


</FORM>
</table>


<div id=hint4 class=ahint></div>
<?=$err?>
<TABLE width=100%><TD valign=top height=100%>
<TABLE width="600px" cellspacing=0 cellpadding=4 bgcolor=d2d2d2>
<FORM METHOD=POST name=F1>

<tr>
	<td width="60px" align="center" bgcolor="#C7C7C7"><b>Залы:</b></td>
	<td width="120px" align="center" bgcolor="<?=(!isset($_GET['razdel']) or $_GET['razdel']==0)?"#A5A5A5":"#C7C7C7"?>"><a href="?razdel=0">Аукцион</a></td>
	<td width="120px" align="center" bgcolor="<?=(isset($_GET['razdel']) and $_GET['razdel']==1)?"#A5A5A5":"#C7C7C7"?>"><a href="?razdel=1">Мои ставки </a></td>
	<td width="120px" align="center" bgcolor="<?=(isset($_GET['razdel']) and $_GET['razdel']==2)?"#A5A5A5":"#C7C7C7"?>"><a href="?razdel=2">Мои лоты</a></td>
	<td width="180px" align="center" bgcolor="<?=(isset($_GET['razdel']) and $_GET['razdel']==3)?"#A5A5A5":"#C7C7C7"?>"><a href="?razdel=3">Выставить на аукцион</a></td>
</tr>
</table>
<TABLE cellpadding=0 cellspacing=0 width="100%">
<TR valign="top"><TD>

		<form method=post action="auction.php">
		<input type="hidden" name="sid" value="">
		<input type="hidden" name="id" value="1">
		
<?if(!isset($_GET['razdel']) or $_GET['razdel']==0){?>
		<table border=0 cellspacing="1" cellpadding="4" bgcolor="#a5a5a5" width="600px">
		<tr valign=top>
			<td width="80" align="center">Предмет</td>
			<td width="120" align="center">Ставка</td>
			<td width="200" align="center">Владелец</td>
			<td width="110" align="center">Время</td>
		</tr>	
		<?
		$q = mysql_query("select i.*, a.id as auc_id, a.time as auc_time, a.price as auc_price, a.pers_id as auc_pers_id, a.stype as auc_bider, a.stype as auc_bider_id, a.bids as auc_bids, a.sales as auc_sales, u.login as auc_owner from users u, inventory i, auction a where i.id=a.id and u.id=a.pers_id");
		while($item = mysql_fetch_assoc($q)){
		if($item['auc_time']<time()){
			if($item['auc_bids']==""){
				mysql_query("delete from auction where id='".$item['auc_id']."'");
				mysql_query("update inventory set auction=0, owner='".$item['auc_pers_id']."' where id='".$item['auc_id']."'");
				continue;
			}else{
				$bids = explode(",", $item['auc_bids']); 
				$bid_sales = explode("|", $item['auc_sales']); 
				$bids = array_reverse($bids);
				$bid_sales = array_reverse($bid_sales);
				foreach($bids as $k=>$bid_id){
					if($k==0){
						mysql_query("update inventory set auction=0, owner='".$bid_id."' where id='".$item['auc_id']."'");
					}else{
						mysql_query("update users set money=money+".$bid_sales[$k]." where id='".$bid_id."'");
					}
				}
			}
		}
		
		$magic = magicinf ($item['magic']);
		$incmagic = mysql_fetch_array(mysql_query('SELECT * FROM `magic` WHERE `id` = "'.$item['includemagic'].'" LIMIT 1;'));
		$incmagic['name'] = $item['includemagicname'];
		$incmagic['cur'] = $item['includemagicdex'];
		$incmagic['max'] = $item['includemagicmax'];
		if(!$magic){
			$magic['chanse'] = $incmagic['chanse'];
			$magic['time'] = $incmagic['time'];
			$magic['targeted'] = $incmagic['targeted'];
		}
	
		$item_descr = "<b>".$item['name']."</b><BR>";
		$item_descr .= "Долговечность: {$item['duration']}/{$item['maxdur']}<BR>";
		$item_descr .= (($magic['chanse'] && $item['show']==1)?"Вероятность срабатывания: ".$magic['chanse']."%<BR>":"")."
		".(($magic['time'])?"Продолжительность действия магии: ".$magic['time']." мин.<BR>":"")."
		".(($item['goden'])?"Срок годности: ".time_left($item['dategoden'])." ".((!$item['count'])?"(до ".date("Y.m.d H:i",$item['dategoden']).")":"")."<BR>":"")."
		".(($item['nsila'] OR $item['nlovk'] OR $item['ninta'] OR $item['nvinos'] OR $item['nlevel'] OR $item['nintel'] OR $item['nmudra'] OR $item['nnoj'] OR $item['ntopor'] OR $item['ndubina'] OR $item['nmech'] OR $item['nposoh'] OR $item['nfire'] OR $item['nwater'] OR $item['nair'] OR $item['nearth'] OR $item['nearth'] OR $item['nlight'] OR $item['ngray'] OR $item['ndark'])?"<b>Требуется минимальное:</b><BR>":"")."
		".(($item['nlevel']>0)?"• Уровень: {$item['nlevel']}</font><BR>":"")."
		".(($item['nsila']>0)?"• Сила: {$item['nsila']}</font><BR>":"")."
		".(($item['nlovk']>0)?"• Ловкость: {$item['nlovk']}</font><BR>":"")."
		".(($item['ninta']>0)?"• Интуиция: {$item['ninta']}</font><BR>":"")."
		".(($item['nvinos']>0)?"• Выносливость: {$item['nvinos']}</font><BR>":"")."
		".(($item['nintel']>0)?"• Интеллект: {$item['nintel']}</font><BR>":"")."
		".(($item['nmudra']>0)?"• Мудрость: {$item['nmudra']}</font><BR>":"")."
		".(($item['nnoj']>0)?"• Мастерство владения ножами и кастетами: {$item['nnoj']}</font><BR>":"")."
		".(($item['ntopor']>0)?"• Мастерство владения топорами и секирами: {$item['ntopor']}</font><BR>":"")."
		".(($item['ndubina']>0)?"• Мастерство владения дубинами и булавами: {$item['ndubina']}</font><BR>":"")."
		".(($item['nmech']>0)?"• Мастерство владения мечами: {$item['nmech']}</font><BR>":"")."
		".(($item['nposoh']>0)?"• Мастерство владения посохами: {$item['nposoh']}</font><BR>":"")."
		".(($item['nfire']>0)?"• Мастерство владения стихией Огня: {$item['nfire']}</font><BR>":"")."
		".(($item['nwater']>0)?"• Мастерство владения стихией Воды: {$item['nwater']}</font><BR>":"")."
		".(($item['nair']>0)?"• Мастерство владения стихией Воздуха: {$item['nair']}</font><BR>":"")."
		".(($item['nearth']>0)?"• Мастерство владения стихией Земли: {$item['nearth']}</font><BR>":"")."
		".(($item['nlight']>0)?"• Мастерство владения магией Света: {$item['nlight']}</font><BR>":"")."
		".(($item['ngray']>0)?"• Мастерство владения серой магией: {$item['ngray']}</font><BR>":"")."
		".(($item['ndark']>0)?"• Мастерство владения магией Тьмы: {$item['ndark']}</font><BR>":"")."
        ".(($item['gmeshok'] OR $item['honor'] OR $item['mfhitp'] OR $item['mfmagp'] OR $item['attacka'] OR $item['add_stats'] OR $item['mfpodav'] OR $item['gsila'] OR $item['mfdhit'] OR $item['mfdmag']  OR $item['mfkritpow']  OR $item['mfantikritpow'] OR $item['mfparir']  OR $item['mfshieldblock'] OR $item['mfcontr']  OR $item['mfrub'] OR $item['mfkol']  OR $item['mfdrob'] OR $item['mfrej'] OR $item['mfkrit'] OR $item['mfakrit']  OR $item['mfuvorot'] OR $item['mfauvorot']  OR $item['glovk'] OR $item['ghp'] OR $item['gmana'] OR $item['ginta'] OR $item['gintel'] OR $item['gnoj'] OR $item['gtopor'] OR $item['gdubina'] OR $item['gmech'] OR $item['gposoh'] OR $item['gfire'] OR $item['gwater'] OR $item['gair'] OR $item['gearth'] OR $item['gearth'] OR $item['glight'] OR $item['ggray'] OR $item['gdark'] OR $item['minu'] OR $item['maxu'] OR $item['bron1'] OR $item['bron2'] OR $item['bron3'] OR $item['bron4'])?"<b>Действует на:</b><BR>":"")."
	    ".(($item['deistvie'] && $item['show']==1)?"<b>Действует на:</b><BR>• ".$item['deistvie']."<BR> ":"")."
        ".(($item['minu'])?"• Минимальное наносимое повреждение: {$item['minu']}<BR>":"")."
		".(($item['maxu'])?"• Максимальное наносимое повреждение: {$item['maxu']}<BR>":"")."
		".(($item['gsila'])?"• Сила: ".(($item['gsila']>0)?"+":"")."{$item['gsila']}<BR>":"")."
		".(($item['glovk'])?"• Ловкость: ".(($item['glovk']>0)?"+":"")."{$item['glovk']}<BR>":"")."
		".(($item['ginta'])?"• Интуиция: ".(($item['ginta']>0)?"+":"")."{$item['ginta']}<BR>":"")."
		".(($item['gintel'])?"• Интеллект: ".(($item['gintel']>0)?"+":"")."{$item['gintel']}<BR>":"")."
		".(($item['ghp'])?"• Уровень жизни: +{$item['ghp']}<BR>":"")."
		".(($item['gmana'])?"• Уровень маны: +{$item['gmana']}<BR>":"")."
		".(($item['mfkrit'])?"• Мф. критических ударов: ".(($item['mfkrit']>0)?"+":"")."{$item['mfkrit']}%<BR>":"")."
		".(($item['mfakrit'])?"• Мф. против крит. ударов: ".(($item['mfakrit']>0)?"+":"")."{$item['mfakrit']}%<BR>":"")."
		".(($item['mfkritpow'])?"• Мф. мощности критического. удара: ".(($item['mfkritpow']>0)?"+":"")."{$item['mfkritpow']}%<BR>":"")."
		".(($item['mfantikritpow'])?"• Мф. против мощ. крит. удара: ".(($item['mfantikritpow']>0)?"+":"")."{$item['mfantikritpow']}%<BR>":"")."
		".(($item['mfparir'])?"• Мф. парирования: ".(($item['mfparir']>0)?"+":"")."{$item['mfparir']}%<BR>":"")."
		".(($item['mfshieldblock'])?"• Мф. блока щитом: ".(($item['mfshieldblock']>0)?"+":"")."{$item['mfshieldblock']}%<BR>":"")."
		".(($item['mfcontr'])?"• Мф. контрудара: ".(($item['mfcontr']>0)?"+":"")."{$item['mfcontr']}%<BR>":"")."
		".(($item['mfuvorot'])?"• Мф. увертливости: ".(($item['mfuvorot']>0)?"+":"")."{$item['mfuvorot']}%<BR>":"")."
		".(($item['mfauvorot'])?"• Мф. против увертлив.: ".(($item['mfauvorot']>0)?"+":"")."{$item['mfauvorot']}%<BR>":"")."
		".(($item['gnoj'])?"• Мастерство владения ножами и кастетами: +{$item['gnoj']}<BR>":"")."
		".(($item['gtopor'])?"• Мастерство владения топорами и секирами: +{$item['gtopor']}<BR>":"")."
		".(($item['gdubina'])?"• Мастерство владения дубинами и булавами: +{$item['gdubina']}<BR>":"")."
		".(($item['gmech'])?"• Мастерство владения мечами: +{$item['gmech']}<BR>":"")."
		".(($item['gposoh'])?"• Мастерство владения посохами: +{$item['gposoh']}<BR>":"")."
		".(($item['gfire'])?"• Мастерство владения стихией Огня: +{$item['gfire']}<BR>":"")."
		".(($item['gwater'])?"• Мастерство владения стихией Воды: +{$item['gwater']}<BR>":"")."
		".(($item['gair'])?"• Мастерство владения стихией Воздуха: +{$item['gair']}<BR>":"")."
		".(($item['gearth'])?"• Мастерство владения стихией Земли: +{$item['gearth']}<BR>":"")."
		".(($item['glight'])?"• Мастерство владения магией Света: +{$item['glight']}<BR>":"")."
		".(($item['ggray'])?"• Мастерство владения серой магией: +{$item['ggray']}<BR>":"")."
		".(($item['gdark'])?"• Мастерство владения магией Тьмы: +{$item['gdark']}<BR>":"").""
               
         .(($item['bron1']!=0)?"• Броня головы: {$item['bron11']}-{$item['bron1']} (".(((($item['bron11']-1)!=0)?($item['bron11']-1)."+":""))."d".(1+$item['bron1']-$item['bron11']).")<br>":"")."
		".(($item['bron2']!=0)?"• Броня корпуса: {$item['bron22']}-{$item['bron2']} (".(((($item['bron22']-1)!=0)?($item['bron22']-1)."+":""))."d".(1+$item['bron2']-$item['bron22']).")<br>":"")."
		".(($item['bron3']!=0)?"• Броня пояса: {$item['bron33']}-{$item['bron3']} (".(((($item['bron33']-1)!=0)?($item['bron33']-1)."+":""))."d".(1+$item['bron3']-$item['bron33']).")<br>":"")."
		".(($item['bron4']!=0)?"• Броня ног: {$item['bron44']}-{$item['bron4']} (".(((($item['bron44']-1)!=0)?($item['bron44']-1)."+":""))."d".(1+$item['bron4']-$item['bron44']).")<br>":"")."

		".(($item['add_stats'])?"• Количество увеличений: {$item['add_stats']}<BR>":"")."
        ".(($item['attacka'])?"• Дополнительный удар: +{$item['attacka']}<BR>":"")."
		".(($item['mfdhit'])?"• Защита от урона: ".(($item['mfdhit']>0)?"+":"")."{$item['mfdhit']}%<BR>":"")."
		".(($item['mfdmag'])?"• Защита от магии: ".(($item['mfdmag']>0)?"+":"")."{$item['mfdmag']}%<BR>":"")."
		".(($item['mfdfire'])?"• Защита от магии Огня: ".(($item['mfdfire']>0)?"+":"")."{$item['mfdfire']}%<BR>":"")."
        ".(($item['mfdair'])?"• Защита от магии Воздуха: ".(($item['mfdair']>0)?"+":"")."{$item['mfdair']}%<BR>":"")."
        ".(($item['mfdwater'])?"• Защита от магии Воды: ".(($item['mfdwater']>0)?"+":"")."{$item['mfdwater']}%<BR>":"")."
        ".(($item['mfdearth'])?"• Защита от магии Земли: ".(($item['mfdearth']>0)?"+":"")."{$item['mfdearth']}%<BR>":"")."
        ".(($item['mffire'])?"• Мф. мощности урона Огня: ".(($item['mffire']>0)?"+":"")."{$item['mffire']}%<BR>":"")."
        ".(($item['mfair'])?"• Мф. мощности урона Воздуха: ".(($item['mfair']>0)?"+":"")."{$item['mfair']}%<BR>":"")."
        ".(($item['mfwater'])?"• Мф. мощности урона Воды: ".(($item['mfwater']>0)?"+":"")."{$item['mfwater']}%<BR>":"")."
        ".(($item['mfearth'])?"• Мф. мощности урона Земли: ".(($item['mfearth']>0)?"+":"")."{$item['mfearth']}%<BR>":"")."
        ".(($item['mfhitp'])?"• Мф. мощности урона: ".(($item['mfhitp']>0)?"+":"")."{$item['mfhitp']}%<BR>":"")."
		".(($item['mfmagp'])?"• Мф. мощности магии: ".(($item['mfmagp']>0)?"+":"")."{$item['mfmagp']}%<BR>":"")."
		".(($item['mfpodav'])?"• Мф. подавления защиты от магии: ".(($item['mfpodav']>0)?"+":"")."{$item['mfpodav']}%<BR>":"")."
		".(($item['mfrub'])?"• Мф. мощности рубящго урона: ".(($item['mfrub']>0)?"+":"")."{$item['mfrub']}%<BR>":"")."
		".(($item['mfkol'])?"• Мф. мощности колющего урона: ".(($item['mfkol']>0)?"+":"")."{$item['mfkol']}%<BR>":"")."
		".(($item['mfdrob'])?"• Мф. мощности дробящего урона: ".(($item['mfdrob']>0)?"+":"")."{$item['mfdrob']}%<BR>":"")."
		".(($item['mfrej'])?"•  Мф. мощности режущего урона: ".(($item['mfrej']>0)?"+":"")."{$item['mfrej']}%<BR>":"")."
		".(($item['gmeshok'])?"• Увеличивает рюкзак: +{$item['gmeshok']}<BR>":"")."
		".(($item['letter'])?"Количество символов: ".strlen($item['letter'])."</div>":"")."
		".(($item['letter'])?"На бумаге записан текст:<div style='background-color:FAF0E6;'> ".nl2br($item['letter'])."</div>":"")."
		".(($magic['name'] && $item['type'] != 50 && $item['type'] != 25 && $item['type'] != 29 && ($item['type'] != 200))?"<font color=maroon>Наложены заклятия:</font> <img src=\"http://img.wapbk.ru/i/magic/".$magic['img']."\" alt=\"".$magic['name']."\">".$magic['name']."<BR>":"")."
		".((($item['type'] == 25))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
		".((($item['type'] == 29))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
        ".(($item['text'])?"На ручке выгравирована надпись:<center>".$item['text']."</center><BR>":"")."
		".(($incmagic['max'])?"	Встроено заклятие <img src=\"/i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." шт.	<BR>":"")."
		".(($item['podzem'])?"<br><font style='font-size:11px; color:#990000'>Предмет из подземелья</font><BR>":"")."
	    ".(($item['sh']==1)?"<i>Особенности:</i><BR>• Колющие атаки: Регулярны<BR>• Режущие атаки: Ничтожно редки<BR>• Рубящие атаки:  Ничтожно редки<BR>• Ледяные атаки: Ничтожно редки<BR>":"")."
        ".(($item['dvur'])?"<font style='font-size:11px; color:#990000'>двуручное оружие</font><BR>":"")."
		".(($item['opisan'])?"<small>".$item['opisan']."</small><BR>":"")."
        ".((!$item['isrep'])?"<small><font color=maroon>Предмет не подлежит ремонту</font></small><BR>":"");
		?>
		<tr bgcolor="#e2e2e2" onclick="cssale('2', '<?=$item['name']?>', '<?=$item['id']?>', '<?=$item['cost']?>');" style="cursor:pointer">
			<td align="center"><img src="/i/sh/<?=$item['img']?>" title="<?=$item_descr?>"></td>
			<td align="right"><?=number_format($item['auc_price'], 2, '.', ' ')?> кр.
				<?
					$your_bid = '';
					if($item['auc_bids']!=""){
						echo "<br>"; 
						$bids = explode(",", $item['auc_bids']); 
						$bids = array_reverse($bids);
						$bidders = array();
						foreach($bids as $k=>$bidder_id){
							$login = mysql_fetch_assoc(mysql_query("select login from users where id='".$bidder_id."' LIMIT 1"));
							$bidders[] = ($k==0)?"<b>".$login['login']."</b>":$login['login'];
							$your_bid = ($bidder_id==$_SESSION['uid'])?'(ваша ставка)<br>':'';
						}
						$bidders_out = implode("<br>", $bidders);
						echo $your_bid.'<span title="'.$bidders_out.'">(участников: '.count($bids).')</span>';
					}
				?>
			</td>
			<td align="right"><?=$item['auc_owner']?></td>
			<td align="center"><?=date_time_left2($item['auc_time'])?></td>
		</tr>
		<?}?>	
		</table>
<?}elseif(isset($_GET['razdel']) and $_GET['razdel']==1){?>
<table border=0 cellspacing="1" cellpadding="4" bgcolor="#a5a5a5" width="600px">
		<tr valign=top>
			<td width="80" align="center">Предмет</td>
			<td width="120" align="center">Ставка</td>
			<td width="200" align="center">Владелец</td>
			<td width="110" align="center">Время</td>
		</tr>	
		<?
		$q = mysql_query("select i.*, a.id as auc_id, a.time as auc_time, a.price as auc_price, a.pers_id as auc_pers_id, a.stype as auc_bider, a.stype as auc_bider_id, a.bids as auc_bids, a.sales as auc_sales, u.login as auc_owner from users u, inventory i, auction a where i.id=a.id and u.id=a.pers_id and a.bids!=''");
		while($item = mysql_fetch_assoc($q)){
		if($item['auc_time']<time()){
			if($item['auc_bids']==""){
				mysql_query("delete from auction where id='".$item['auc_id']."'");
				mysql_query("update inventory set auction=0, owner='".$item['auc_pers_id']."' where id='".$item['auc_id']."'");
				continue;
			}else{
				$bids = explode(",", $item['auc_bids']); 
				$bid_sales = explode("|", $item['auc_sales']); 
				$bids = array_reverse($bids);
				$bid_sales = array_reverse($bid_sales);
				foreach($bids as $k=>$bid_id){
					if($k==0){
						mysql_query("update inventory set auction=0, owner='".$bid_id."' where id='".$item['auc_id']."'");
					}else{
						mysql_query("update users set money=money+".$bid_sales[$k]." where id='".$bid_id."'");
					}
				}
			}
		}
		if($item['auc_bids']==""){
			continue;
		}else{
			$bids = explode(",", $item['auc_bids']); 
			if(!in_array($_SESSION['uid'], $bids)){
				continue;
			}
		}
		
		$magic = magicinf ($item['magic']);
		$incmagic = mysql_fetch_array(mysql_query('SELECT * FROM `magic` WHERE `id` = "'.$item['includemagic'].'" LIMIT 1;'));
		$incmagic['name'] = $item['includemagicname'];
		$incmagic['cur'] = $item['includemagicdex'];
		$incmagic['max'] = $item['includemagicmax'];
		if(!$magic){
			$magic['chanse'] = $incmagic['chanse'];
			$magic['time'] = $incmagic['time'];
			$magic['targeted'] = $incmagic['targeted'];
		}
	
		$item_descr = "<b>".$item['name']."</b><BR>";
		$item_descr .= "Долговечность: {$item['duration']}/{$item['maxdur']}<BR>";
		$item_descr .= (($magic['chanse'] && $item['show']==1)?"Вероятность срабатывания: ".$magic['chanse']."%<BR>":"")."
		".(($magic['time'])?"Продолжительность действия магии: ".$magic['time']." мин.<BR>":"")."
		".(($item['goden'])?"Срок годности: ".time_left($item['dategoden'])." ".((!$item['count'])?"(до ".date("Y.m.d H:i",$item['dategoden']).")":"")."<BR>":"")."
		".(($item['nsila'] OR $item['nlovk'] OR $item['ninta'] OR $item['nvinos'] OR $item['nlevel'] OR $item['nintel'] OR $item['nmudra'] OR $item['nnoj'] OR $item['ntopor'] OR $item['ndubina'] OR $item['nmech'] OR $item['nposoh'] OR $item['nfire'] OR $item['nwater'] OR $item['nair'] OR $item['nearth'] OR $item['nearth'] OR $item['nlight'] OR $item['ngray'] OR $item['ndark'])?"<b>Требуется минимальное:</b><BR>":"")."
		".(($item['nlevel']>0)?"• Уровень: {$item['nlevel']}</font><BR>":"")."
		".(($item['nsila']>0)?"• Сила: {$item['nsila']}</font><BR>":"")."
		".(($item['nlovk']>0)?"• Ловкость: {$item['nlovk']}</font><BR>":"")."
		".(($item['ninta']>0)?"• Интуиция: {$item['ninta']}</font><BR>":"")."
		".(($item['nvinos']>0)?"• Выносливость: {$item['nvinos']}</font><BR>":"")."
		".(($item['nintel']>0)?"• Интеллект: {$item['nintel']}</font><BR>":"")."
		".(($item['nmudra']>0)?"• Мудрость: {$item['nmudra']}</font><BR>":"")."
		".(($item['nnoj']>0)?"• Мастерство владения ножами и кастетами: {$item['nnoj']}</font><BR>":"")."
		".(($item['ntopor']>0)?"• Мастерство владения топорами и секирами: {$item['ntopor']}</font><BR>":"")."
		".(($item['ndubina']>0)?"• Мастерство владения дубинами и булавами: {$item['ndubina']}</font><BR>":"")."
		".(($item['nmech']>0)?"• Мастерство владения мечами: {$item['nmech']}</font><BR>":"")."
		".(($item['nposoh']>0)?"• Мастерство владения посохами: {$item['nposoh']}</font><BR>":"")."
		".(($item['nfire']>0)?"• Мастерство владения стихией Огня: {$item['nfire']}</font><BR>":"")."
		".(($item['nwater']>0)?"• Мастерство владения стихией Воды: {$item['nwater']}</font><BR>":"")."
		".(($item['nair']>0)?"• Мастерство владения стихией Воздуха: {$item['nair']}</font><BR>":"")."
		".(($item['nearth']>0)?"• Мастерство владения стихией Земли: {$item['nearth']}</font><BR>":"")."
		".(($item['nlight']>0)?"• Мастерство владения магией Света: {$item['nlight']}</font><BR>":"")."
		".(($item['ngray']>0)?"• Мастерство владения серой магией: {$item['ngray']}</font><BR>":"")."
		".(($item['ndark']>0)?"• Мастерство владения магией Тьмы: {$item['ndark']}</font><BR>":"")."
        ".(($item['gmeshok'] OR $item['honor'] OR $item['mfhitp'] OR $item['mfmagp'] OR $item['attacka'] OR $item['add_stats'] OR $item['mfpodav'] OR $item['gsila'] OR $item['mfdhit'] OR $item['mfdmag']  OR $item['mfkritpow']  OR $item['mfantikritpow'] OR $item['mfparir']  OR $item['mfshieldblock'] OR $item['mfcontr']  OR $item['mfrub'] OR $item['mfkol']  OR $item['mfdrob'] OR $item['mfrej'] OR $item['mfkrit'] OR $item['mfakrit']  OR $item['mfuvorot'] OR $item['mfauvorot']  OR $item['glovk'] OR $item['ghp'] OR $item['gmana'] OR $item['ginta'] OR $item['gintel'] OR $item['gnoj'] OR $item['gtopor'] OR $item['gdubina'] OR $item['gmech'] OR $item['gposoh'] OR $item['gfire'] OR $item['gwater'] OR $item['gair'] OR $item['gearth'] OR $item['gearth'] OR $item['glight'] OR $item['ggray'] OR $item['gdark'] OR $item['minu'] OR $item['maxu'] OR $item['bron1'] OR $item['bron2'] OR $item['bron3'] OR $item['bron4'])?"<b>Действует на:</b><BR>":"")."
	    ".(($item['deistvie'] && $item['show']==1)?"<b>Действует на:</b><BR>• ".$item['deistvie']."<BR> ":"")."
        ".(($item['minu'])?"• Минимальное наносимое повреждение: {$item['minu']}<BR>":"")."
		".(($item['maxu'])?"• Максимальное наносимое повреждение: {$item['maxu']}<BR>":"")."
		".(($item['gsila'])?"• Сила: ".(($item['gsila']>0)?"+":"")."{$item['gsila']}<BR>":"")."
		".(($item['glovk'])?"• Ловкость: ".(($item['glovk']>0)?"+":"")."{$item['glovk']}<BR>":"")."
		".(($item['ginta'])?"• Интуиция: ".(($item['ginta']>0)?"+":"")."{$item['ginta']}<BR>":"")."
		".(($item['gintel'])?"• Интеллект: ".(($item['gintel']>0)?"+":"")."{$item['gintel']}<BR>":"")."
		".(($item['ghp'])?"• Уровень жизни: +{$item['ghp']}<BR>":"")."
		".(($item['gmana'])?"• Уровень маны: +{$item['gmana']}<BR>":"")."
		".(($item['mfkrit'])?"• Мф. критических ударов: ".(($item['mfkrit']>0)?"+":"")."{$item['mfkrit']}%<BR>":"")."
		".(($item['mfakrit'])?"• Мф. против крит. ударов: ".(($item['mfakrit']>0)?"+":"")."{$item['mfakrit']}%<BR>":"")."
		".(($item['mfkritpow'])?"• Мф. мощности критического. удара: ".(($item['mfkritpow']>0)?"+":"")."{$item['mfkritpow']}%<BR>":"")."
		".(($item['mfantikritpow'])?"• Мф. против мощ. крит. удара: ".(($item['mfantikritpow']>0)?"+":"")."{$item['mfantikritpow']}%<BR>":"")."
		".(($item['mfparir'])?"• Мф. парирования: ".(($item['mfparir']>0)?"+":"")."{$item['mfparir']}%<BR>":"")."
		".(($item['mfshieldblock'])?"• Мф. блока щитом: ".(($item['mfshieldblock']>0)?"+":"")."{$item['mfshieldblock']}%<BR>":"")."
		".(($item['mfcontr'])?"• Мф. контрудара: ".(($item['mfcontr']>0)?"+":"")."{$item['mfcontr']}%<BR>":"")."
		".(($item['mfuvorot'])?"• Мф. увертливости: ".(($item['mfuvorot']>0)?"+":"")."{$item['mfuvorot']}%<BR>":"")."
		".(($item['mfauvorot'])?"• Мф. против увертлив.: ".(($item['mfauvorot']>0)?"+":"")."{$item['mfauvorot']}%<BR>":"")."
		".(($item['gnoj'])?"• Мастерство владения ножами и кастетами: +{$item['gnoj']}<BR>":"")."
		".(($item['gtopor'])?"• Мастерство владения топорами и секирами: +{$item['gtopor']}<BR>":"")."
		".(($item['gdubina'])?"• Мастерство владения дубинами и булавами: +{$item['gdubina']}<BR>":"")."
		".(($item['gmech'])?"• Мастерство владения мечами: +{$item['gmech']}<BR>":"")."
		".(($item['gposoh'])?"• Мастерство владения посохами: +{$item['gposoh']}<BR>":"")."
		".(($item['gfire'])?"• Мастерство владения стихией Огня: +{$item['gfire']}<BR>":"")."
		".(($item['gwater'])?"• Мастерство владения стихией Воды: +{$item['gwater']}<BR>":"")."
		".(($item['gair'])?"• Мастерство владения стихией Воздуха: +{$item['gair']}<BR>":"")."
		".(($item['gearth'])?"• Мастерство владения стихией Земли: +{$item['gearth']}<BR>":"")."
		".(($item['glight'])?"• Мастерство владения магией Света: +{$item['glight']}<BR>":"")."
		".(($item['ggray'])?"• Мастерство владения серой магией: +{$item['ggray']}<BR>":"")."
		".(($item['gdark'])?"• Мастерство владения магией Тьмы: +{$item['gdark']}<BR>":"").""
               
         .(($item['bron1']!=0)?"• Броня головы: {$item['bron11']}-{$item['bron1']} (".(((($item['bron11']-1)!=0)?($item['bron11']-1)."+":""))."d".(1+$item['bron1']-$item['bron11']).")<br>":"")."
		".(($item['bron2']!=0)?"• Броня корпуса: {$item['bron22']}-{$item['bron2']} (".(((($item['bron22']-1)!=0)?($item['bron22']-1)."+":""))."d".(1+$item['bron2']-$item['bron22']).")<br>":"")."
		".(($item['bron3']!=0)?"• Броня пояса: {$item['bron33']}-{$item['bron3']} (".(((($item['bron33']-1)!=0)?($item['bron33']-1)."+":""))."d".(1+$item['bron3']-$item['bron33']).")<br>":"")."
		".(($item['bron4']!=0)?"• Броня ног: {$item['bron44']}-{$item['bron4']} (".(((($item['bron44']-1)!=0)?($item['bron44']-1)."+":""))."d".(1+$item['bron4']-$item['bron44']).")<br>":"")."

		".(($item['add_stats'])?"• Количество увеличений: {$item['add_stats']}<BR>":"")."
        ".(($item['attacka'])?"• Дополнительный удар: +{$item['attacka']}<BR>":"")."
		".(($item['mfdhit'])?"• Защита от урона: ".(($item['mfdhit']>0)?"+":"")."{$item['mfdhit']}%<BR>":"")."
		".(($item['mfdmag'])?"• Защита от магии: ".(($item['mfdmag']>0)?"+":"")."{$item['mfdmag']}%<BR>":"")."
		".(($item['mfdfire'])?"• Защита от магии Огня: ".(($item['mfdfire']>0)?"+":"")."{$item['mfdfire']}%<BR>":"")."
        ".(($item['mfdair'])?"• Защита от магии Воздуха: ".(($item['mfdair']>0)?"+":"")."{$item['mfdair']}%<BR>":"")."
        ".(($item['mfdwater'])?"• Защита от магии Воды: ".(($item['mfdwater']>0)?"+":"")."{$item['mfdwater']}%<BR>":"")."
        ".(($item['mfdearth'])?"• Защита от магии Земли: ".(($item['mfdearth']>0)?"+":"")."{$item['mfdearth']}%<BR>":"")."
        ".(($item['mffire'])?"• Мф. мощности урона Огня: ".(($item['mffire']>0)?"+":"")."{$item['mffire']}%<BR>":"")."
        ".(($item['mfair'])?"• Мф. мощности урона Воздуха: ".(($item['mfair']>0)?"+":"")."{$item['mfair']}%<BR>":"")."
        ".(($item['mfwater'])?"• Мф. мощности урона Воды: ".(($item['mfwater']>0)?"+":"")."{$item['mfwater']}%<BR>":"")."
        ".(($item['mfearth'])?"• Мф. мощности урона Земли: ".(($item['mfearth']>0)?"+":"")."{$item['mfearth']}%<BR>":"")."
        ".(($item['mfhitp'])?"• Мф. мощности урона: ".(($item['mfhitp']>0)?"+":"")."{$item['mfhitp']}%<BR>":"")."
		".(($item['mfmagp'])?"• Мф. мощности магии: ".(($item['mfmagp']>0)?"+":"")."{$item['mfmagp']}%<BR>":"")."
		".(($item['mfpodav'])?"• Мф. подавления защиты от магии: ".(($item['mfpodav']>0)?"+":"")."{$item['mfpodav']}%<BR>":"")."
		".(($item['mfrub'])?"• Мф. мощности рубящго урона: ".(($item['mfrub']>0)?"+":"")."{$item['mfrub']}%<BR>":"")."
		".(($item['mfkol'])?"• Мф. мощности колющего урона: ".(($item['mfkol']>0)?"+":"")."{$item['mfkol']}%<BR>":"")."
		".(($item['mfdrob'])?"• Мф. мощности дробящего урона: ".(($item['mfdrob']>0)?"+":"")."{$item['mfdrob']}%<BR>":"")."
		".(($item['mfrej'])?"•  Мф. мощности режущего урона: ".(($item['mfrej']>0)?"+":"")."{$item['mfrej']}%<BR>":"")."
		".(($item['gmeshok'])?"• Увеличивает рюкзак: +{$item['gmeshok']}<BR>":"")."
		".(($item['letter'])?"Количество символов: ".strlen($item['letter'])."</div>":"")."
		".(($item['letter'])?"На бумаге записан текст:<div style='background-color:FAF0E6;'> ".nl2br($item['letter'])."</div>":"")."
		".(($magic['name'] && $item['type'] != 50 && $item['type'] != 25 && $item['type'] != 29 && ($item['type'] != 200))?"<font color=maroon>Наложены заклятия:</font> <img src=\"http://img.wapbk.ru/i/magic/".$magic['img']."\" alt=\"".$magic['name']."\">".$magic['name']."<BR>":"")."
		".((($item['type'] == 25))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
		".((($item['type'] == 29))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
        ".(($item['text'])?"На ручке выгравирована надпись:<center>".$item['text']."</center><BR>":"")."
		".(($incmagic['max'])?"	Встроено заклятие <img src=\"/i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." шт.	<BR>":"")."
		".(($item['podzem'])?"<br><font style='font-size:11px; color:#990000'>Предмет из подземелья</font><BR>":"")."
	    ".(($item['sh']==1)?"<i>Особенности:</i><BR>• Колющие атаки: Регулярны<BR>• Режущие атаки: Ничтожно редки<BR>• Рубящие атаки:  Ничтожно редки<BR>• Ледяные атаки: Ничтожно редки<BR>":"")."
        ".(($item['dvur'])?"<font style='font-size:11px; color:#990000'>двуручное оружие</font><BR>":"")."
		".(($item['opisan'])?"<small>".$item['opisan']."</small><BR>":"")."
        ".((!$item['isrep'])?"<small><font color=maroon>Предмет не подлежит ремонту</font></small><BR>":"");
		?>
		<tr bgcolor="#e2e2e2" onclick="cssale('2', '<?=$item['name']?>', '<?=$item['id']?>', '<?=$item['cost']?>');" style="cursor:pointer">
			<td width="80" align="center"><img src="/i/sh/<?=$item['img']?>" title="<?=$item_descr?>"></td>
			<td width="120" align="right"><?=number_format($item['auc_price'], 2, '.', ' ')?> кр.
				<?
					$your_bid = '';
					if($item['auc_bids']!=""){
						echo "<br>"; 
						$bids = explode(",", $item['auc_bids']); 
						$bids = array_reverse($bids);
						$bidders = array();
						foreach($bids as $k=>$bidder_id){
							$login = mysql_fetch_assoc(mysql_query("select login from users where id='".$bidder_id."' LIMIT 1"));
							$bidders[] = ($k==0)?"<b>".$login['login']."</b>":$login['login'];
							$your_bid = ($bidder_id==$_SESSION['uid'])?'(ваша ставка)<br>':'';
						}
						$bidders_out = implode("<br>", $bidders);
						echo '<span title="'.$bidders_out.'">(участников: '.count($bids).')</span>';
					}
				?>
			</td>
			<td width="200" align="right"><?=$item['auc_owner']?></td>
			<td width="140" align="center"><?=date_time_left2($item['auc_time'])?></td>
		</tr>
		<?}?>	
		</table>
<?}elseif(isset($_GET['razdel']) and $_GET['razdel']==2){?>
<table border=0 cellspacing="1" cellpadding="4" bgcolor="#a5a5a5" width="600px">
		<tr valign=top>
			<td width="80" align="center">Предмет</td>
			<td width="120" align="center">Ставка</td>
			<td width="200" align="center">Владелец</td>
			<td width="110" align="center">Время</td>
		</tr>	
		<?
		$q = mysql_query("select i.*, a.id as auc_id, a.time as auc_time, a.price as auc_price, a.pers_id as auc_pers_id, a.stype as auc_bider, a.stype as auc_bider_id, a.bids as auc_bids, a.sales as auc_sales, u.login as auc_owner from users u, inventory i, auction a where i.id=a.id and u.id=a.pers_id and a.pers_id='".$_SESSION['uid']."'");
		echo mysql_error();
		while($item = mysql_fetch_assoc($q)){
		if($item['auc_time']<time()){
			if($item['auc_bids']==""){
				mysql_query("delete from auction where id='".$item['auc_id']."'");
				mysql_query("update inventory set auction=0, owner='".$item['auc_pers_id']."' where id='".$item['auc_id']."'");
				continue;
			}else{
				$bids = explode(",", $item['auc_bids']); 
				$bid_sales = explode("|", $item['auc_sales']); 
				$bids = array_reverse($bids);
				$bid_sales = array_reverse($bid_sales);
				foreach($bids as $k=>$bid_id){
					if($k==0){
						mysql_query("update inventory set auction=0, owner='".$bid_id."' where id='".$item['auc_id']."'");
					}else{
						mysql_query("update users set money=money+".$bid_sales[$k]." where id='".$bid_id."'");
					}
				}
			}
		}
		
		$magic = magicinf ($item['magic']);
		$incmagic = mysql_fetch_array(mysql_query('SELECT * FROM `magic` WHERE `id` = "'.$item['includemagic'].'" LIMIT 1;'));
		echo mysql_error();
		$incmagic['name'] = $item['includemagicname'];
		$incmagic['cur'] = $item['includemagicdex'];
		$incmagic['max'] = $item['includemagicmax'];
		if(!$magic){
			$magic['chanse'] = $incmagic['chanse'];
			$magic['time'] = $incmagic['time'];
			$magic['targeted'] = $incmagic['targeted'];
		}
	
		$item_descr = "<b>".$item['name']."</b><BR>";
		$item_descr .= "Долговечность: {$item['duration']}/{$item['maxdur']}<BR>";
		$item_descr .= (($magic['chanse'] && $item['show']==1)?"Вероятность срабатывания: ".$magic['chanse']."%<BR>":"")."
		".(($magic['time'])?"Продолжительность действия магии: ".$magic['time']." мин.<BR>":"")."
		".(($item['goden'])?"Срок годности: ".time_left($item['dategoden'])." ".((!$item['count'])?"(до ".date("Y.m.d H:i",$item['dategoden']).")":"")."<BR>":"")."
		".(($item['nsila'] OR $item['nlovk'] OR $item['ninta'] OR $item['nvinos'] OR $item['nlevel'] OR $item['nintel'] OR $item['nmudra'] OR $item['nnoj'] OR $item['ntopor'] OR $item['ndubina'] OR $item['nmech'] OR $item['nposoh'] OR $item['nfire'] OR $item['nwater'] OR $item['nair'] OR $item['nearth'] OR $item['nearth'] OR $item['nlight'] OR $item['ngray'] OR $item['ndark'])?"<b>Требуется минимальное:</b><BR>":"")."
		".(($item['nlevel']>0)?"• Уровень: {$item['nlevel']}</font><BR>":"")."
		".(($item['nsila']>0)?"• Сила: {$item['nsila']}</font><BR>":"")."
		".(($item['nlovk']>0)?"• Ловкость: {$item['nlovk']}</font><BR>":"")."
		".(($item['ninta']>0)?"• Интуиция: {$item['ninta']}</font><BR>":"")."
		".(($item['nvinos']>0)?"• Выносливость: {$item['nvinos']}</font><BR>":"")."
		".(($item['nintel']>0)?"• Интеллект: {$item['nintel']}</font><BR>":"")."
		".(($item['nmudra']>0)?"• Мудрость: {$item['nmudra']}</font><BR>":"")."
		".(($item['nnoj']>0)?"• Мастерство владения ножами и кастетами: {$item['nnoj']}</font><BR>":"")."
		".(($item['ntopor']>0)?"• Мастерство владения топорами и секирами: {$item['ntopor']}</font><BR>":"")."
		".(($item['ndubina']>0)?"• Мастерство владения дубинами и булавами: {$item['ndubina']}</font><BR>":"")."
		".(($item['nmech']>0)?"• Мастерство владения мечами: {$item['nmech']}</font><BR>":"")."
		".(($item['nposoh']>0)?"• Мастерство владения посохами: {$item['nposoh']}</font><BR>":"")."
		".(($item['nfire']>0)?"• Мастерство владения стихией Огня: {$item['nfire']}</font><BR>":"")."
		".(($item['nwater']>0)?"• Мастерство владения стихией Воды: {$item['nwater']}</font><BR>":"")."
		".(($item['nair']>0)?"• Мастерство владения стихией Воздуха: {$item['nair']}</font><BR>":"")."
		".(($item['nearth']>0)?"• Мастерство владения стихией Земли: {$item['nearth']}</font><BR>":"")."
		".(($item['nlight']>0)?"• Мастерство владения магией Света: {$item['nlight']}</font><BR>":"")."
		".(($item['ngray']>0)?"• Мастерство владения серой магией: {$item['ngray']}</font><BR>":"")."
		".(($item['ndark']>0)?"• Мастерство владения магией Тьмы: {$item['ndark']}</font><BR>":"")."
        ".(($item['gmeshok'] OR $item['honor'] OR $item['mfhitp'] OR $item['mfmagp'] OR $item['attacka'] OR $item['add_stats'] OR $item['mfpodav'] OR $item['gsila'] OR $item['mfdhit'] OR $item['mfdmag']  OR $item['mfkritpow']  OR $item['mfantikritpow'] OR $item['mfparir']  OR $item['mfshieldblock'] OR $item['mfcontr']  OR $item['mfrub'] OR $item['mfkol']  OR $item['mfdrob'] OR $item['mfrej'] OR $item['mfkrit'] OR $item['mfakrit']  OR $item['mfuvorot'] OR $item['mfauvorot']  OR $item['glovk'] OR $item['ghp'] OR $item['gmana'] OR $item['ginta'] OR $item['gintel'] OR $item['gnoj'] OR $item['gtopor'] OR $item['gdubina'] OR $item['gmech'] OR $item['gposoh'] OR $item['gfire'] OR $item['gwater'] OR $item['gair'] OR $item['gearth'] OR $item['gearth'] OR $item['glight'] OR $item['ggray'] OR $item['gdark'] OR $item['minu'] OR $item['maxu'] OR $item['bron1'] OR $item['bron2'] OR $item['bron3'] OR $item['bron4'])?"<b>Действует на:</b><BR>":"")."
	    ".(($item['deistvie'] && $item['show']==1)?"<b>Действует на:</b><BR>• ".$item['deistvie']."<BR> ":"")."
        ".(($item['minu'])?"• Минимальное наносимое повреждение: {$item['minu']}<BR>":"")."
		".(($item['maxu'])?"• Максимальное наносимое повреждение: {$item['maxu']}<BR>":"")."
		".(($item['gsila'])?"• Сила: ".(($item['gsila']>0)?"+":"")."{$item['gsila']}<BR>":"")."
		".(($item['glovk'])?"• Ловкость: ".(($item['glovk']>0)?"+":"")."{$item['glovk']}<BR>":"")."
		".(($item['ginta'])?"• Интуиция: ".(($item['ginta']>0)?"+":"")."{$item['ginta']}<BR>":"")."
		".(($item['gintel'])?"• Интеллект: ".(($item['gintel']>0)?"+":"")."{$item['gintel']}<BR>":"")."
		".(($item['ghp'])?"• Уровень жизни: +{$item['ghp']}<BR>":"")."
		".(($item['gmana'])?"• Уровень маны: +{$item['gmana']}<BR>":"")."
		".(($item['mfkrit'])?"• Мф. критических ударов: ".(($item['mfkrit']>0)?"+":"")."{$item['mfkrit']}%<BR>":"")."
		".(($item['mfakrit'])?"• Мф. против крит. ударов: ".(($item['mfakrit']>0)?"+":"")."{$item['mfakrit']}%<BR>":"")."
		".(($item['mfkritpow'])?"• Мф. мощности критического. удара: ".(($item['mfkritpow']>0)?"+":"")."{$item['mfkritpow']}%<BR>":"")."
		".(($item['mfantikritpow'])?"• Мф. против мощ. крит. удара: ".(($item['mfantikritpow']>0)?"+":"")."{$item['mfantikritpow']}%<BR>":"")."
		".(($item['mfparir'])?"• Мф. парирования: ".(($item['mfparir']>0)?"+":"")."{$item['mfparir']}%<BR>":"")."
		".(($item['mfshieldblock'])?"• Мф. блока щитом: ".(($item['mfshieldblock']>0)?"+":"")."{$item['mfshieldblock']}%<BR>":"")."
		".(($item['mfcontr'])?"• Мф. контрудара: ".(($item['mfcontr']>0)?"+":"")."{$item['mfcontr']}%<BR>":"")."
		".(($item['mfuvorot'])?"• Мф. увертливости: ".(($item['mfuvorot']>0)?"+":"")."{$item['mfuvorot']}%<BR>":"")."
		".(($item['mfauvorot'])?"• Мф. против увертлив.: ".(($item['mfauvorot']>0)?"+":"")."{$item['mfauvorot']}%<BR>":"")."
		".(($item['gnoj'])?"• Мастерство владения ножами и кастетами: +{$item['gnoj']}<BR>":"")."
		".(($item['gtopor'])?"• Мастерство владения топорами и секирами: +{$item['gtopor']}<BR>":"")."
		".(($item['gdubina'])?"• Мастерство владения дубинами и булавами: +{$item['gdubina']}<BR>":"")."
		".(($item['gmech'])?"• Мастерство владения мечами: +{$item['gmech']}<BR>":"")."
		".(($item['gposoh'])?"• Мастерство владения посохами: +{$item['gposoh']}<BR>":"")."
		".(($item['gfire'])?"• Мастерство владения стихией Огня: +{$item['gfire']}<BR>":"")."
		".(($item['gwater'])?"• Мастерство владения стихией Воды: +{$item['gwater']}<BR>":"")."
		".(($item['gair'])?"• Мастерство владения стихией Воздуха: +{$item['gair']}<BR>":"")."
		".(($item['gearth'])?"• Мастерство владения стихией Земли: +{$item['gearth']}<BR>":"")."
		".(($item['glight'])?"• Мастерство владения магией Света: +{$item['glight']}<BR>":"")."
		".(($item['ggray'])?"• Мастерство владения серой магией: +{$item['ggray']}<BR>":"")."
		".(($item['gdark'])?"• Мастерство владения магией Тьмы: +{$item['gdark']}<BR>":"").""
               
         .(($item['bron1']!=0)?"• Броня головы: {$item['bron11']}-{$item['bron1']} (".(((($item['bron11']-1)!=0)?($item['bron11']-1)."+":""))."d".(1+$item['bron1']-$item['bron11']).")<br>":"")."
		".(($item['bron2']!=0)?"• Броня корпуса: {$item['bron22']}-{$item['bron2']} (".(((($item['bron22']-1)!=0)?($item['bron22']-1)."+":""))."d".(1+$item['bron2']-$item['bron22']).")<br>":"")."
		".(($item['bron3']!=0)?"• Броня пояса: {$item['bron33']}-{$item['bron3']} (".(((($item['bron33']-1)!=0)?($item['bron33']-1)."+":""))."d".(1+$item['bron3']-$item['bron33']).")<br>":"")."
		".(($item['bron4']!=0)?"• Броня ног: {$item['bron44']}-{$item['bron4']} (".(((($item['bron44']-1)!=0)?($item['bron44']-1)."+":""))."d".(1+$item['bron4']-$item['bron44']).")<br>":"")."

		".(($item['add_stats'])?"• Количество увеличений: {$item['add_stats']}<BR>":"")."
        ".(($item['attacka'])?"• Дополнительный удар: +{$item['attacka']}<BR>":"")."
		".(($item['mfdhit'])?"• Защита от урона: ".(($item['mfdhit']>0)?"+":"")."{$item['mfdhit']}%<BR>":"")."
		".(($item['mfdmag'])?"• Защита от магии: ".(($item['mfdmag']>0)?"+":"")."{$item['mfdmag']}%<BR>":"")."
		".(($item['mfdfire'])?"• Защита от магии Огня: ".(($item['mfdfire']>0)?"+":"")."{$item['mfdfire']}%<BR>":"")."
        ".(($item['mfdair'])?"• Защита от магии Воздуха: ".(($item['mfdair']>0)?"+":"")."{$item['mfdair']}%<BR>":"")."
        ".(($item['mfdwater'])?"• Защита от магии Воды: ".(($item['mfdwater']>0)?"+":"")."{$item['mfdwater']}%<BR>":"")."
        ".(($item['mfdearth'])?"• Защита от магии Земли: ".(($item['mfdearth']>0)?"+":"")."{$item['mfdearth']}%<BR>":"")."
        ".(($item['mffire'])?"• Мф. мощности урона Огня: ".(($item['mffire']>0)?"+":"")."{$item['mffire']}%<BR>":"")."
        ".(($item['mfair'])?"• Мф. мощности урона Воздуха: ".(($item['mfair']>0)?"+":"")."{$item['mfair']}%<BR>":"")."
        ".(($item['mfwater'])?"• Мф. мощности урона Воды: ".(($item['mfwater']>0)?"+":"")."{$item['mfwater']}%<BR>":"")."
        ".(($item['mfearth'])?"• Мф. мощности урона Земли: ".(($item['mfearth']>0)?"+":"")."{$item['mfearth']}%<BR>":"")."
        ".(($item['mfhitp'])?"• Мф. мощности урона: ".(($item['mfhitp']>0)?"+":"")."{$item['mfhitp']}%<BR>":"")."
		".(($item['mfmagp'])?"• Мф. мощности магии: ".(($item['mfmagp']>0)?"+":"")."{$item['mfmagp']}%<BR>":"")."
		".(($item['mfpodav'])?"• Мф. подавления защиты от магии: ".(($item['mfpodav']>0)?"+":"")."{$item['mfpodav']}%<BR>":"")."
		".(($item['mfrub'])?"• Мф. мощности рубящго урона: ".(($item['mfrub']>0)?"+":"")."{$item['mfrub']}%<BR>":"")."
		".(($item['mfkol'])?"• Мф. мощности колющего урона: ".(($item['mfkol']>0)?"+":"")."{$item['mfkol']}%<BR>":"")."
		".(($item['mfdrob'])?"• Мф. мощности дробящего урона: ".(($item['mfdrob']>0)?"+":"")."{$item['mfdrob']}%<BR>":"")."
		".(($item['mfrej'])?"•  Мф. мощности режущего урона: ".(($item['mfrej']>0)?"+":"")."{$item['mfrej']}%<BR>":"")."
		".(($item['gmeshok'])?"• Увеличивает рюкзак: +{$item['gmeshok']}<BR>":"")."
		".(($item['letter'])?"Количество символов: ".strlen($item['letter'])."</div>":"")."
		".(($item['letter'])?"На бумаге записан текст:<div style='background-color:FAF0E6;'> ".nl2br($item['letter'])."</div>":"")."
		".(($magic['name'] && $item['type'] != 50 && $item['type'] != 25 && $item['type'] != 29 && ($item['type'] != 200))?"<font color=maroon>Наложены заклятия:</font> <img src=\"http://img.wapbk.ru/i/magic/".$magic['img']."\" alt=\"".$magic['name']."\">".$magic['name']."<BR>":"")."
		".((($item['type'] == 25))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
		".((($item['type'] == 29))?"<font color=maroon>Наложены заклятия:</font> ".$magic['name']."<BR>":"")."
        ".(($item['text'])?"На ручке выгравирована надпись:<center>".$item['text']."</center><BR>":"")."
		".(($incmagic['max'])?"	Встроено заклятие <img src=\"/i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." шт.	<BR>":"")."
		".(($item['podzem'])?"<br><font style='font-size:11px; color:#990000'>Предмет из подземелья</font><BR>":"")."
	    ".(($item['sh']==1)?"<i>Особенности:</i><BR>• Колющие атаки: Регулярны<BR>• Режущие атаки: Ничтожно редки<BR>• Рубящие атаки:  Ничтожно редки<BR>• Ледяные атаки: Ничтожно редки<BR>":"")."
        ".(($item['dvur'])?"<font style='font-size:11px; color:#990000'>двуручное оружие</font><BR>":"")."
		".(($item['opisan'])?"<small>".$item['opisan']."</small><BR>":"")."
        ".((!$item['isrep'])?"<small><font color=maroon>Предмет не подлежит ремонту</font></small><BR>":"");
		?>
		<tr bgcolor="#e2e2e2" onclick="cssale('2', '<?=$item['name']?>', '<?=$item['id']?>', '<?=$item['cost']?>');" style="cursor:pointer">
			<td width="80" align="center"><img src="/i/sh/<?=$item['img']?>" title="<?=$item_descr?>"></td>
			<td width="120" align="right"><?=number_format($item['auc_price'], 2, '.', ' ')?> кр.
				<?
					$your_bid = '';
					if($item['auc_bids']!=""){
						echo "<br>"; 
						$bids = explode(",", $item['auc_bids']); 
						$bids = array_reverse($bids);
						$bidders = array();
						foreach($bids as $k=>$bidder_id){
							$login = mysql_fetch_assoc(mysql_query("select login from users where id='".$bidder_id."' LIMIT 1"));
							$bidders[] = ($k==0)?"<b>".$login['login']."</b>":$login['login'];
							$your_bid = ($bidder_id==$_SESSION['uid'])?'(ваша ставка)<br>':'';
						}
						$bidders_out = implode("<br>", $bidders);
						echo '<span title="'.$bidders_out.'">(участников: '.count($bids).')</span>';
					}
				?>
			</td>
			<td width="200" align="right"><?=$item['auc_owner']?></td>
			<td width="140" align="center"><?=date_time_left2($item['auc_time'])?></td>
		</tr>
		<?}?>	
		</table>
<?}elseif(isset($_GET['razdel']) and $_GET['razdel']==3){?>
	<table cellspacing="1" cellpadding="4" border="0" bgcolor="#a5a5a5" width="600px">
	<?$data = mysql_query("SELECT * FROM `inventory` WHERE `type` < 25   AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 200 AND `name` NOT LIKE '% (мф)%'  AND `name` NOT LIKE '%Букет%'  AND `name` NOT LIKE '%Мешок%' ORDER by `update` DESC; ");
	while($row = mysql_fetch_array($data)) {
			echo mysql_error();

		$row['count'] = 1;
		if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center ><IMG SRC=\"/i/sh/{$row['img']}\" BORDER=0>";
		?>
		<BR><small>
		<BR><A onclick="sale('1', '<?=$row['name']?>', '<?=$row['id']?>', '<?=$row['cost']?>');" HREF="#">Выставить на аукцион</A>
		</TD>
		</small>
		</TD>
		<?php
		echo "<TD valign=top>";
		 showitem ($row);
		echo "</TD></TR>";
	}?>
	</table>
<?}?>
		
		</form>
</TD>

    
</TR></TABLE>
</body>
</HTML>