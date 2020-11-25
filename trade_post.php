<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	include "functions.php";
	if ($user['room'] != 21) {header("Location: main.php");}
    if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
	header("Cache-Control: no-cache");	
	If (empty($_GET['otdel'])){
		$_GET['otdel']=1;
	}
	If (empty($_GET['page'])){
		$_GET['page']=1;
	}
	
	$obiav = mysql_query("SELECT * FROM `trade_post_abb` where razdel='".$_GET['otdel']."'  LIMIT ".(($_GET['page']-1)*10).",".((($_GET['page']-1)*10)+10)." ");
	$count_posts=ceil(mysql_numrows(mysql_query("SELECT * FROM `trade_post_abb` where razdel='".$_GET['otdel']."' "))/10);
	
	if(!empty($_POST['act']) and $_POST['act']=='add_com' and !empty($_POST['text']) and !empty($_POST['razdel'])){
			echo "Ваше обьявление добавлено!";
			$_POST['text']=eregi_replace('u(.)*n(.)*i(.)*o(.)*n','',$_POST['text']);
			$_POST['text']=eregi_replace('s(.)*e(.)*l(.)*e(.)*c(.)*t','',$_POST['text']);		
			$_POST['text']=eregi_replace('d(.)*e(.)*l(.)*e(.)*t(.)*e','',$_POST['text']);
			mysql_query("INSERT INTO `trade_post_abb` (`owner`, `text`, `razdel`) VALUES ('".$_SESSION['uid']."', '".$_POST['text']."', '".$_POST['razdel']."');");		
	}

?>

<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.silver-bk.com/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
<TABLE width=100%>
<TR>
<TD valign=top width=100%>
	<center><font style="font-size:24px; color:#000033"><h3>Торговый Пост</h3></font></center>
</td>
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
	<td  nowrap><a href="city.php?cp=1" onClick="return check_access();" class="menutop" title="Время перехода: 10 сек.  ">Центральная Площадь</a></td>
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

<table width=98%>
<td valign="top" width=75%>
	<table cellpadding=1 cellspacing=0 width=100% border=1 bordercolor=#A5A5A5>
		<TR>
			<td style="background-color:#A5A5A5" >
				<center><b>Объявления -> <?
							switch ($_GET['otdel']) {
								case 1:
									echo "Покупка вещей";
								break;
								case 2:
									echo "Продажа вещей";
								break;
								case 3:
									echo "Подача заявок";
								break;		
								}?>
				</b></center>
			</td>
		</tr>
		<?
		If ($_GET['otdel']<>'3'){
			while ($work=mysql_fetch_array($obiav)){
			$user_ob=mysql_fetch_array(mysql_query("SELECT login,id,level,align FROM `users` WHERE `id` = '".$work['owner']."' LIMIT 1;"));
		?>
			<TR>
				<td style="background-color:#B5B5B5" >
					<table width=100%>
						<tr>
							<td width=45%><?=nick_trade($user_ob)?></td>
							<td width=35%><small><?=$work['date']?></small></td>
							<!--<td width=20%><small>(осталось: )</small></td>-->
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="background-color:#C7C7C7" >
					<?=$work['text']?>
					<Br/>
					<Br/>
				</td>
			</tr>
		<?}?>
		<tr>
			<td style="background-color:#B5B5B5" >
				Страницы:
				<?
				If (!empty($count_posts)){
					for($i=1;$i<=$count_posts;$i++){
						If ($_GET['page']==$i){
							echo "<font class=number>";
						}else{
							echo "<a href='trade_post.php?otdel=".$_GET['otdel']."&page=".$i."' >";
						}
						echo $i;
						If ($_GET['page']==$i){
							echo "</font> ";
						}else{
							echo '</a> ';
						}
					}
				}else{
					echo "<font class=number>1</font>";
				}
				?>
			</td>
		</tr>
		
		
		<?}else{?>
			<TR>
				<td>
					<form method="POST" action="trade_post.php?otdel=3">
						<center>
						<textarea class="inup" id="answer" rows="12" name="text" cols="100"></textarea> <br/>
						<select name="razdel" class="inup">
							Раздел: <option selected="selected"></option>
							<option value="1">Куплю</option>
							<option value="2">Продам</option>
						</select>
						
						<input type="submit" class="btn" value="Добавить" name="add">
						<input type="hidden" value="add_com" name="act" />
						</center>
					</form>
				</td>
			</tr>	
		<?}
		
		?>
		
	</table>
</td>
<td valign="top" width=25%>
	<table width=100%>
		<tr>
			<td style="background-color:#A5A5A5">
				<center><b>Рубрики</b></center>
				<A HREF="trade_post.php?otdel=1&sid=&0.162486541405194">Покупка вещей</A><BR>
				<A HREF="trade_post.php?otdel=2&sid=&0.337606814894404">Продажа вещей</A><BR>
				<A HREF="trade_post.php?otdel=3&sid=&0.286790872806733">Подача заявок</A><BR>
			</td>
		</tr>
	</table>
</td>
</table>	

	
	

</BODY>
</HTML>