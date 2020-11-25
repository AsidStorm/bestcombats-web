<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	$kasanie_haosa = mysql_fetch_array(mysql_query("SELECT time FROM `effects` WHERE `owner` = '{$_SESSION['uid']}' and name='Касание хаоса' LIMIT 1;"));
	include "functions.php";
	if ($user['room'] != 2002) {header("Location: main.php");}
    if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
	header("Cache-Control: no-cache");	
	
	$exs=mysql_num_rows(mysql_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
	if ($exs<=0){
		mysql_query("INSERT INTO hellround_pohod (owner,end,level) VALUES ('".$user['id']."','1','".$user['level']."')");
	}
	
	If ($exs['level']<$user['level']){
		mysql_query("UPDATE `hellround_pohod` SET `level`='".$user['level']."' WHERE `owner` = ".$user['id']." LIMIT 1;");		
	}
	
	$pohod1=mysql_fetch_array(mysql_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
	if ($pohod1['end']==0) {header('location: peshera.php'); die();}


?>

<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://bestcombats.net/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
<TABLE width=100%>
<TR>
<TD valign=top width=100%><center><font style="font-size:24px; color:#000033"><h3>Излом Хаоса</h3></font></center></td>
<TD nowrap valign=top>
<BR><DIV align=right>
<td width=280 valign=top><TABLE cellspacing=0 cellpadding=0><TD width=100%>&nbsp;</TD><TD><HTML>
<table  border="0" cellpadding="0" cellspacing="0">
<tr align="right" valign="top">
<td>
 
 
</td>
<td>
 
<TABLE height=15 border="0" cellspacing="0" cellpadding="0">
<link href="http://img.combats.com/i/move/design6.css" rel="stylesheet" type="text/css"><script language="javascript" type="text/javascript">
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
<TD rowspan=3 valign="bottom"><a href="?rnd=0.313154328583547"><img src="http://img.combats.com/i/move/rel_1.gif" width="15" height="16" alt="Обновить" border="0" /></a></TD>
<TD colspan="3"><img src="http://img.combats.com/i/move/navigatin_462.gif" width="80" height="4" /></TD>
</TR>
<TR>
<TD><IMG src="http://img.combats.com/i/move/navigatin_481.gif" width="9" height="8"></TD>
<TD width=64 bgcolor=black><DIV class="MoveLine"><IMG src="http://img.combats.com/i/move/wait2.gif" id="MoveLine" class="MoveLine"></DIV></TD>
<TD><IMG src="http://img.combats.com/i/move/navigatin_50.gif" width="7" height="8"></TD>
</TR>
<TR>
<TD colspan="3"><IMG src="http://img.combats.com/i/move/navigatin_tt1_532.gif" width="80" height="5"></TD>
</TR>
</TABLE>


<table  border="0" cellspacing="0" cellpadding="0">
<tr>
<td nowrap="nowrap" id="moveto">
<table width="100%"  border="0" cellpadding="0" cellspacing="1" >

<tr>
<td ><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" /></td>
<td  nowrap><a href="city.php?cp=1" onClick="return check_access();" class="menutop">Центральная Площадь</a></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- <br /><span class="menutop"><nobr>Общежитие</nobr></span>-->
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
/*	progressColor = color;
for (var i = 1; i <= progressAt; i++) {
document.getElementById('progress'+i).style.backgroundColor = progressColor;
}*/
}
if (mtime>0) {
progress_clear();
progress_update();
}

</script>
</TD></TR>

</HTML>
</TD></TABLE>

</table>
</DIV>
</TD>

</TR>
</table>
	
	
<form action='peshera.php' method=post>
<table>
<TR>
<TD><FORM>
<input type="radio" name="start" value="7"  <? If($user['level']<>5 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';}  ?> >Проход для новичков</input>&nbsp;<br/>
<input type="radio" name="start" value="8"  <? If($user['level']<>8 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';}  ?> >Проход для жителей</input>&nbsp;<br/>
<input type="radio" name="start" value="9"  <? If($user['level']<>9 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';}  ?> >Проход для любителей</input>&nbsp;<br/>
<input type="radio" name="start" value="10"  <? If($user['level']<>10 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';}  ?> >Проход для бывалых</input>&nbsp;<br/>
<input type="radio" name="start" value="11" <? If($user['level']<>11 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';} ?> >Проход для профессионалов</input>&nbsp;<br/>
<input type="radio" name="start" value="12" <? If($user['level']<>12 or !isset($kasanie_haosa) or $kasanie_haosa['time']>time() ){echo'disabled';} ?> >Проход для легенд</input>&nbsp;<br/>
<INPUT type='submit' value='Начать поход'>
</FORM></TD>
</TR>
	
	<?
	$tt=mysql_fetch_array(mysql_query("SELECT * FROM hellround_pohod WHERE owner='".$user['id']."'"));
	$l=time()-60*60*12;
	$pro=mysql_num_rows(mysql_query("SELECT * FROM inventory WHERE owner='".$user['id']."' and name='Пропуск'"));
	
	//echo "<center><input type=submit name=start value='Начать поход'></center>";
	/*
	if($pro<=0){
		echo "<center><font color=red><b>У вас нету пропуска</b></font></center>";
	}elseif ($tt['date_out']<=$l || $user['align']=="2.5"){
		echo "<center><input type=submit name=start value='Начать поход'></center>";
	} else { 
		$tr=$tt['date_out']+60*60*12; 
		echo "<center><font color=red><b>Следующий поход в : ".date("j.m.Y G:i",$tr)."</b></font></center>";
	}
	*/
	?>

	</tr>

</table>

</BODY>
</HTML>