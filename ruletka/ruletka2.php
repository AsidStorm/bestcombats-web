<?php
session_start();
include_once('../connect.php');
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if($user['align']=='2.5')
{	
?>
	<style type="text/css"> 
	
	.pH3			{ COLOR: #8f0000;  FONT-FAMILY: Arial;  FONT-SIZE: 12pt;  FONT-WEIGHT: bold; }
	.class_ {
		font-weight: bold;
		color: #C5C5C5;
		cursor:pointer;
	}
	.class_st {
		font-weight: bold;
		color: #659BA3;
		cursor:pointer;
	}
	.class__ {
		font-weight: bold;
		color: #FFFFFF;
		cursor:pointer;
		background-color: #659BA3;
	}
	.class__st {
		font-weight: bold;
		color: #FFFFFF;
		cursor:pointer;
		background-color: #659BA3;
		font-size: 10px;
	}
	.class_old {
		font-weight: bold;
		color: #919191;
		cursor:pointer;
	}
	.class__old {
		font-weight: bold;
		color: #FFFFFF;
		cursor:pointer;
		background-color: #838383;
		font-size: 10px;
	}	
	td {
	text-align: center;
}
    </style>
	<script src="http://img.bestcombats.net/js/swfobject_modified.js" type="text/javascript"></script>
<TABLE width="100%" cellspacing="0" cellpadding="0">
	<tr><td valign="top"><div align="center" class="pH3">Рулетка</div>
      <br />
	  <div align="center">
	    <p>Рулетка работает в тестовом режиме. Вы можете потерять кр., возмещаться потери не будут.</p>
	    <p>
          <object id="ruletka" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="940" height="340">
	        <param name="movie" value="http://img.bestcombats.net/swf/ruletka.swf" />
	        <param name="quality" value="high" />
	        <param name="wmode" value="opaque" />
	        <param name="swfversion" value="6.0.65.0" />
	        <!-- Этот тег param предлагает пользователям Flash Player 6.0 r65 и более поздних версий загрузить последнюю версию Flash Player. Удалите его, если не хотите, чтобы пользователи видели запрос. -->
	        <param name="expressinstall" value="http://img.bestcombats.net/swf/expressInstall.swf" />
	        <param name="BGCOLOR" value="#dedfde" />
	        <!-- Следующий тег object не поддерживается браузером Internet Explorer. Поэтому скройте его от Internet Explorer при помощи IECC. -->
	        <!--[if !IE]>-->
	        <object type="application/x-shockwave-flash" data="http://img.bestcombats.net/swf/ruletka.swf" width="940" height="340">
	          <!--<![endif]-->
	          <param name="quality" value="high" />
	          <param name="wmode" value="opaque" />
	          <param name="swfversion" value="6.0.65.0" />
	          <param name="expressinstall" value="http://img.bestcombats.net/swf/expressInstall.swf" />
	          <param name="BGCOLOR" value="#dedfde" />
	          <!-- Браузер отображает следующее альтернативное содержимое для пользователей Flash Player 6.0 и более старых версий. -->
	          <div>
	            <h4>Для содержимого этой страницы требуется более новая версия Adobe Flash Player.</h4>
	            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Получить проигрыватель Adobe Flash Player" /></a></p>
              </div>
	          <!--[if !IE]>-->
            </object>
	        <!--<![endif]-->
          </object>
	    </p>
	  </div>
	<td width="280" align="left" valign="top">
    <TABLE cellspacing="0" cellpadding="0"><TD width="100%">&nbsp;</TD><TD>
	<table  border="0" cellpadding="0" cellspacing="0">
	<tr align="right" valign="top">
	<td>
	<!-- -->
	<? echo $goLis; ?>
	<!-- -->
	</td></table>
	</td></table>
    <small>
    <p align="left">Банк казино: <b><?
    $mn = 0; $mz = 0;
	$sp = mysql_query('SELECT * FROM `ruletka_coin` WHERE `money` > 0 AND `end` > 0');
	while($pl = mysql_fetch_array($sp))
	{
		if($pl['end']==1)
		{
			$mz += $pl['money'];
		}else{
			$mn += $pl['money'];
		}
	}
	echo $mz-($mn-14024);
	?> кр.</b></p></small></td>
	</table>
    <br>
	<div id="textgo" style="visibility:hidden;"></div>
<?
}
?>
<script type="text/javascript">
swfobject.registerObject("ruletka");
</script>
