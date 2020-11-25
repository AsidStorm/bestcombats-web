<?php
	session_start();
	include '../connect.php';
	$user = mysql_fetch_array(mysql_query('SELECT u.block,u.id,u.color,u.invis,u.align,u.klan,u.chattime,u.sid,u.login,u.level,u.room,o.date FROM `users` as u, `online` as o WHERE u.`id` = o.`id` AND u.`id` = \''.$_SESSION['uid'].'\' LIMIT 1;'));
	include '../functions.php';
    nick99 ($user['id']);
	if($_GET['online'] != null) {
			if ($_GET['room'] && (int)$_GET['room'] < 900) { $user['room'] = (int)$_GET['room']; }
	$data = mysql_query('select align,u.id,klan,level,login,battle,o.date,invis, (SELECT `id` FROM `effects` WHERE `type` = 2 AND `owner` = u.id LIMIT 1) as slp, (SELECT `id` FROM `effects` WHERE (`type` = 11 OR `type` = 12 OR `type` = 13 OR `type` = 14) AND `owner` = u.id LIMIT 1) as trv,deal,action FROM `online` as o, `users` as u WHERE o.`id` = u.`id` AND (o.`date` >= '.(time()-90).' OR u.`in_tower` = 1) AND o.`room` = '.$user['room'].' AND o.`city` = \'test\' ORDER by `u`.`login`;');

?>
	<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.old-bk.ru/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>

<SCRIPT>
function fastshow (content) {

var el = document.getElementById("mmoves");

var o = window.event.srcElement;

if (content!='' && el.style.visibility != "visible") {el.innerHTML = '<small>'+content+'</small>';}

var x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft + 3;

var y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop+5;

el.style.left = x + "px";

el.style.top  = y + "px";

if (el.style.visibility != "visible") {

el.style.visibility = "visible";

}

}

function hideshow() {

document.getElementById("mmoves").style.visibility = 'hidden';

}

	function w(name,id,align,klan,level,slp,trv,deal,battle,name2,afk) {
			if (align.length>0) {
				altext="";
				if (align>2 && align<2.5) altext = "Ангел";
				if (align == 2.5) altext = "Ангел-Администратор";
                if (align == 2.6) altext = "Ангел";
				if (align>2.6 && align<3) altext = "Ангел";
				if (align>3.00 && align<4) altext = "Тёмное Братство";
				if (align>1 && align<2 && klan !="mu") altext = "Паладин";
				if (align>1 && align<2 && klan =="mu") altext = "Падший ангел";
				if ( align == 0.98 ) altext ="Тёмный";
				if ( align == 777 ) altext ="Ангел Падальщик";
				if ( align == 4 ) altext ="В хаосе";
				if ( align == 7 ) altext ="Нейтрал";
				if ( align == 0.99 ) altext ="Светлый";
				if (!name2) name2=name;
				align='<img src="http://img.old-bk.ru/i/align_'+align+'.gif" title="'+altext+'" width=13 height=15>';
				}
                        if(battle>0){filter = 'style="filter:invert"';}else{filter = '';}

                        if (klan.length>0) { klan='<A HREF="/claninf.php?'+klan+'" target=_blank><img src="http://img.old-bk.ru/i/klan/'+klan+'.gif" title="'+klan+'" width=24 height=15></A>';}

                        if (deal>0) { klan+='<img src="http://img.old-bk.ru/i/deal.gif" width=15 height=15>';}
                        if (afk>0) {document.write('<font style=\'font-size:11px;\' onmouseover="javascript:fastshow(\'персонажа нет на месте\');" onmouseout="javascript:hideshow();"> <b>afk</b></font> ');}

                        document.write('<A HREF="javascript:top.AddToPrivate(\''+name+'\', top.CtrlPress)" target=refreshed><img src="http://img.old-bk.ru/i/lock.gif" '+filter+' title="Приват" width=20 height=15></A>'+align);

                        document.write('<a href="(\''+name+'\',true)"></a>'+klan);
	                document.write('<a href="javascript:top.AddTo(\''+name+'\')" target=refreshed>'+name2+'</a>['+level+']<a href="inf.php?'+id+'" target=_blank title="Инф. о '+name+'">'+'<IMG SRC="http://img.old-bk.ru/i/inf.gif" WIDTH=12 HEIGHT=11 BORDER=0 ALT="Инф. о '+name+'"></a>');
			if (slp>0) { document.write(' <IMG SRC="http://img.old-bk.ru/i/sleep2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Наложено заклятие молчания">'); }
			if (trv>0) { document.write(' <IMG SRC="http://img.old-bk.ru/i/travma2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Инвалидность">'); }
			document.write('<BR>');
	}
	top.rld();
	setTimeout('onl.submit()', 15000);
</SCRIPT>
<title><?=$rooms[$user['room']]?> (<?=mysql_num_rows($data)?>)</title>
</HEAD>
<body mardginwidth=0 leftmardgin=0 leftmargin=0 marginwidth=0 bgcolor=#faf2f2 onscroll="top.myscroll()" onLoad="document.body.scrollTop=top.OnlineOldPosition">
<center>
<form method="post" name="onl" id="onl" action="/ch.php?online=<?=mt_rand(1000,1000000000)?>">
<INPUT TYPE=submit value="Обновить">

</center>
<font style="COLOR:#8f0000;FONT-SIZE:10pt"><B><?=$rooms[$user['room']]?> (<?=mysql_num_rows($data)?>)</B></font>
<table border=0><tr><td nowrap><fant color="fffff">
<!--<script>-->
<?php
if($user['room']==5 && vrag=="on"){
			$vrag = mysql_fetch_array(mysql_query('select align,u.id,klan,level,login,o.date, (SELECT `id` FROM `effects` WHERE `type` = 2 AND `owner` = u.id LIMIT 1) as slp, (SELECT `id` FROM `effects` WHERE (`type` = 11 OR `type` = 12 OR `type` = 13 OR `type` = 14) AND `owner` = u.id LIMIT 1) as trv,deal FROM `online` as o, `users` as u WHERE u.`id`=61 ;'));
				$vrag_b = mysql_fetch_array(mysql_query("SELECT `battle` FROM `bots` WHERE  `prototype` = 61 LIMIT 1 ;"));

		echo 'w(\'',$vrag['login'],'\',',$vrag['id'],',\'',$vrag['align'],'\',\'',$vrag['klan'],'\',\'',$vrag['level'],'\',\'',$vrag['slp'],'\',\'',$vrag['trv'],'\',\'',(int)$row['deal'],'\',\'',$vrag_b['battle'],'\');';
}
		while($row=mysql_fetch_array($data))
		{
		if($row['action']){
		$rrr=$row['action'];
		$act=explode("<>:<>",$rrr);
		$aa=htmlspecialchars(stripslashes_deep($act[1]));
		
		
		$aa=eregi_replace("/afk ", "", $aa);
		
		$aa=eregi_replace("/dnd ", "", $aa);
		
		$aa=eregi_replace("/buy ", "", $aa);
		
		$aa=eregi_replace("/sell ", "", $aa);
		

		$act_line=" <span alt=\"{$aa}\"><b>{$act[0]}</b></span> ";
		//$act_line="/afk";
		}
		else{$act_line="";}
			//if ($row['slp']=='NULL')  { $row['slp'] = 0; }
                        if ($row['invis']>0 && $row['id']==$_SESSION['uid'])  { $row['login2'] = $row['login']."</a> (the invisible)"; }
			if($row['invis']==0 or $row['id']==$_SESSION['uid']){
			
			//echo 'w(\'',$row['login'],'\',',$row['id'],',\'',$row['align'],'\',\'',$row['klan'],'\',\'',$row['level'],'\',\'',$row['slp'],'\',\'',$row['trv'],'\',\'',(int)$row['deal'],'\',\'',$row['battle'],'\',\'',$row['login2'],'\');';
			if((int)$row['battle']>0){$filter = "style=\"filter:invert\"";}else{$filter = "";}
			if ($row['klan']!="") { $klan='<A HREF="/claninf.php?'.$row['klan'].'" target=_blank><img src=http://img.old-bk.ru/i/klan/'.$row['klan'].'.gif title='.$row['klan'].' width=24 height=15></A>';}else{$klan="";}
			if ((int)$row['deal']>0) { $klan.='<img src="http://img.old-bk.ru/i/deal.gif" width=12 height=15>';}

			echo "<A HREF=\"javascript:top.AddToPrivate('{$row['login']}', top.CtrlPress)\" target=refreshed><img src=\"http://img.old-bk.ru/i/lock.gif\" ". $filter ." title=\"Приват\" width=20 height=15></A><img src=\"http://img.old-bk.ru/i/align_{$row['align']}.gif\" width=12 height=15>{$klan}{$act_line}<a href=\"javascript:top.AddTo('{$row['login']}')\" target=refreshed>{$row['login']}</a>[{$row['level']}]<a href=\"inf.php?{$row['id']}\" target=_blank title=\"Инф. о {$row['login']}\"><IMG SRC=\"http://img.old-bk.ru/i/inf.gif\" WIDTH=12 HEIGHT=11 BORDER=0 ALT=\"Инф. о {$row['login']}\"></a>";
			if ((int)$row['slp']>0) { echo(' <IMG SRC="http://img.old-bk.ru/i/sleep2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Наложено заклятие молчания">'); }
			if ((int)$row['trv']>0) { echo(' <IMG SRC="http://img.old-bk.ru/i/travma2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Инвалидность">'); }
			echo "</br>";
			
			}
		}
?>
<!-- </script> 
-->
</td></tr></table>
	<SCRIPT>document.write('<INPUT TYPE=checkbox onclick="if(this.checked == true) { top.OnlineStop = false; } else { top.OnlineStop=true; }" '+(top.OnlineStop?'':'checked')+'> Обновлять автомат.')
	</SCRIPT></body></html>
<?php
	die();

	}
	elseif ( $_GET['show'] != null) {
		if($_SESSION['sid'] != $user['sid']) {
			$_SESSION['uid'] = null;
			die ("<script>top.location.href='index.php';</script>");
		}
		$cha = file("/chat.txt");
		header('Content-Type: text/html; charset=windows-1251');
		echo "<script>";
		$ks = 0;
		foreach($cha as $k => $v) {
			//echo "alert('df');";
			  

			preg_match("/:\[(.*)\]:\[(.*)\]:\[(.*)]:\[(.*)\]/",$v,$math);
			//print_r($data);
			$math[3] = stripslashes($math[3]);
			if (( $math[2] == '{[]}'.$user['login'].'{[]}') && ( $math[1] >=  $user['chattime'])) {
				echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
				$ks++;
				$lastpost = $math[1];
			}
			elseif(substr($math[2],0,4) == '{[]}' && ( $math[1] >=  $user['chattime'])) {
				//exit;
			}
			elseif (( $math[2] == '!sys!!') && ( $math[1] >=  $user['chattime']) && ($user['room']==$math[4])) {
				if($_GET['om'] != 1){
				if($_GET['sys'] == 1 OR strpos($math[3],"<img src=http://img.old-bk.ru/i/magic/" ) !== FALSE) {
					echo "window.top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";

					echo "window.top.frames['chat'].document.getElementById(\"mes_sys\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
					$ks++;
					$lastpost = $math[1];
				}
				}
				
					echo "window.top.frames['chat'].document.getElementById(\"mes_sys\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
					$ks++;
					$lastpost = $math[1];
				
			}
			elseif ( $math[2] == '!sys2all!!' &&  $math[1] >=  $user['chattime']) {
				echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
				$ks++;
				$lastpost = $math[1];
			}
			elseif ( $math[1] >=  $user['chattime']) {
/*				if (strpos($math[3],"private [pal-" ) !== FALSE) {
					$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='pal' AND `user` = '".$user['id']."';"));
					$chans = explode(",",$chans['name']) ;
					$pos = strpos($math[3],"[pal-" )+5;
					if(in_array(substr($math[3],$pos,1),$chans)) {
						$math[3] = preg_replace("/private \[pal-([1-9])]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"pal-\\1\",false)'.chr(92).'\' class=private>private [ pal-\\1 ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
			else*/if ( $math[1] >=  $user['chattime']) {
/*				if (strpos($math[3],"private [tar-" ) !== FALSE) {
					$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='tar' AND `user` = '".$user['id']."';"));
					$chans = explode(",",$chans['name']) ;
					$pos = strpos($math[3],"[tar-" )+5;
					if(in_array(substr($math[3],$pos,1),$chans)) {
						$math[3] = preg_replace("/private \[tar-([1-9])]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"tar-\\1\",false)'.chr(92).'\' class=private>private [ tar-\\1 ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
				elseif (strpos($math[3],"private [klan-{$user['klan']}-" ) !== FALSE) {
					$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='".$user['klan']."' AND `user` = '".$user['id']."';"));
					$chans = explode(",",$chans['name']) ;
					$pos = strpos($math[3],"[klan-{$user['klan']}-" )+strlen($user['klan'])+7;
					if(in_array(substr($math[3],$pos,1),$chans)) {
						$math[3] = preg_replace("/private \[klan-".$user['klan']."-([1-9])]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"klan-\\1\",false)'.chr(92).'\' class=private>private [ klan-\\1 ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
				else*/if (strpos($math[3],"private [pal]" ) !== FALSE) {
					if((int)$user['align']==1 OR $user['id'] == 1) {
						$math[3] = preg_replace("/private \[pal]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"pal\",false)'.chr(92).'\' class=private>private [ pal ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
				elseif (strpos($math[3],"private [tar]" ) !== FALSE) {
					if((int)$user['align']==3 OR $user['id'] == 1) {
						$math[3] = preg_replace("/private \[tar]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"tar\",false)'.chr(92).'\' class=private>private [ tar ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
				elseif (((strpos($math[3],"private [klan-{$user['klan']}]" ) !== FALSE) )) {
					if($user['klan']!='') {
					
					
					
						$math[3] = preg_replace("/private \[klan\-{$user['klan']}\]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"klan\",false)'.chr(92).'\' class=private>private [ klan ]</a>'", $math[3]);
						//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
						echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
				elseif (((strpos($math[3],"private [{$user['login']}]" ) !== FALSE) OR ($math[2] == $user['login']))) {
					$sound=false;
					preg_match_all("/private \[(.*)\]/siU",$math[3],$mmm,PREG_PATTERN_ORDER);
					foreach($mmm[1] as $res){
						$res=trim($res);
						if ($sound==false)
							$sound=($res==$user['login'])?true:false;
						if (strlen($res)<3 || strlen($res)>25 || !ereg("^[ёa-zA-Zа-яА-Я0-9-][ёa-zA-Zа-яА-Я0-9_ -]+[a-zA-Zа-яА-Я0-9ё-]$",$res)  || preg_match("/__/",$res) || preg_match("/--/",$res) || preg_match("/  /",$res) || preg_match("/(.)\\1\\1\\1/",$res)){
							$math[3]=str_replace($res,$user['login'],$math[3]);
						}
					}
					$math[3] = preg_replace("/private \[(.*)\]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"'.(('\\1' != '".$user['login']."')?'\\1':'".$math[2]."').'\",false)'.chr(92).'\' class=private>private [ <span oncontextmenu=\"return OpenMenu(event,".$user['level'].")\">\\1</span> ]</a>'", $math[3]);
					//$math[3] = str_replace("private [{$user['login']}]", "<a href=javascript:top.AddToPrivate(\"{$math[2]}\",false) class=private>private [ {$user['login']} ]</a>",$math[3]);
					$sssss="top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
					if ($sound==true) 
						$sssss.="top.soundD();";
					echo $sssss;
					//echo "top.frames['chat'].document.all(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
					$ks++;
					$lastpost = $math[1];
				}
				elseif(( strpos($math[3],"private" ) === FALSE ) && ($user['room']==$math[4]))
				{
					$times = ''; $soundON='';
					if ((strpos($math[3],"[".$user['login']."]") > 0) OR ($math[2] == $user['login'])) {
						$times = 'date2';
						//$math[3] = preg_replace("/to \[".$user['login']."\]/U", "<B>".$math[2]."</B>", $math[3]);
						$math[3] = str_replace("to [".$user['login']."]","<B>to [".$user['login']."]</B>",$math[3] );
						$soundON='top.soundD();';
					} elseif($_GET['om'] != 1) {
						$times = 'date';
					}
					if($_GET['om'] != 1 OR $times == 'date2') {
						echo $soundON."top.frames['chat'].document.all(\"mes\").innerHTML += '<span class={$times}>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
						$ks++;
						$lastpost = $math[1];
					}
				}
			}
		}
}
		if ($ks > 0) {
			mysql_query("UPDATE `users` SET `chattime` = '".($lastpost+3)."' WHERE `id` = {$user['id']};");
		}
		echo "</script><script> top.srld();</script>";
			if ((int)$user['id']!=229 && (int)$user['id']!=4717 && (int)$user['id']!=122 && (int)$user['id']!=112 && (int)$user['id']!=1981 && (int)$user['id']!=86)
			mysql_query("UPDATE `online` SET `date` = ".time()." WHERE `id` = {$user['id']};");
			die();
	}
	else
	{

		if (strpos($_GET['text'],"private" ) !== FALSE && $user['level'] == 0) {
			preg_match_all("/\[(.*)\]/U", $_GET['text'], $matches);
			//echo "<script>alert('". $matches[1]."')</script>";
			for ($ii=0;$ii<count($matches[1]);$ii++){
				$dde = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE (`klan` = 'adminion' OR `deal` = 1 OR (`align`>1 AND `align`<2) OR (`align`>3 AND `align`<4)) AND `login` = '".trim($matches[1][$ii])."' LIMIT 1 ;"));
				if (!$dde['id']) {
					exit;
				}
			}
		}
		
		if ( trim($_GET['text']) != null) {

			$_GET['text'] = substr($_GET['text'],0,200);
			$_GET['text'] = str_replace('<','&lt;',$_GET['text']);
			$_GET['text'] = str_replace(']:[','] : [',$_GET['text']);
			$_GET['text'] = str_replace('>','&gt;',$_GET['text']);
			$_GET['text'] = str_replace('\x3e','&lt;',$_GET['text']);


			$_GET['text'] = ereg_replace('private \[klan-([a-zA-Z]*)\]','',$_GET['text']);

			if ($user['klan'] == '') {
				$_GET['text'] = str_replace('private [klan]','',$_GET['text']);
				$_GET['text'] = str_replace('private [klan]','private [klan-'.$user['klan'].']',$_GET['text']);
			}
			else {
			   // $k1 = Array("/:\[klan-1\]:/","/:\[klan-2\]:/","/:\[klan-3\]:/","/:\[klan-4\]:/","/:\[klan-5\]:/","/:\[klan-6\]:/","/:\[klan-7\]:/","/:\[klan-8\]:/","/:\[klan-9\]:/");
				//$k2 = Array("[klan-".$user['klan']."-1]","[klan-".$user['klan']."-2]","[klan-".$user['klan']."-3]","[klan-".$user['klan']."-4]","[klan-".$user['klan']."-5]","[klan-".$user['klan']."-6]","[klan-".$user['klan']."-7]","[klan-".$user['klan']."-8]","[klan-".$user['klan']."-9]");
				$_GET['text'] = str_replace('private [klan]','private [klan-'.$user['klan'].']',$_GET['text']);

/*				$_GET['text'] = ereg_replace('private \[klan-([1-9])\]','private [klan-'.$user['klan'].'-\\1]',$_GET['text']);

				$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='".$user['klan']."' AND `user` = '".$user['id']."';"));
				$chans = explode(",",$chans['name']) ;
				$pos = strpos($_GET['text'],"[klan-{$user['klan']}-" )+strlen($user['klan'])+7;
                if(!in_array(substr($_GET['text'],$pos,1),$chans)) {
					$_GET['text'] = ereg_replace("private \[klan-{$user['klan']}-[1-9]\]",'',$_GET['text']);
				}

*/				//$_GET['text'] = preg_replace($k1, $k2, $_GET['text'],3);
			}
				if((int)$user['align'] != 1 AND $user['id'] != 111 AND $user['id'] !=311 AND $user['id'] !=229 AND $user['id'] !=4717) {
				$_GET['text'] = str_replace('private [pal]','',$_GET['text']);
//				$_GET['text'] = ereg_replace("private \[pal-[1-9]\]",'',$_GET['text']);
			}/* else {
				$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='pal' AND `user` = '".$user['id']."';"));
				$chans = explode(",",$chans['name']) ;
				$pos = strpos($_GET['text'],"[pal-" )+5;
                if(!in_array(substr($_GET['text'],$pos,1),$chans)) {
					$_GET['text'] = ereg_replace("private \[pal-[1-9]\]",'',$_GET['text']);
				}
			}*/
				if((int)$user['align'] != 3 AND $user['id'] != 111 AND $user['id'] !=311 AND $user['id'] !=229 AND $user['id'] !=4717) {
				$_GET['text'] = str_replace('private [tar]','',$_GET['text']);
//				$_GET['text'] = ereg_replace("private \[tar-[1-9]\]",'',$_GET['text']);
			}/* else {
				$chans = mysql_fetch_array(mysql_query("SELECT `name` FROM `chanels` WHERE `klan`='tar' AND `user` = '".$user['id']."';"));
				$chans = explode(",",$chans['name']) ;
				$pos = strpos($_GET['text'],"[tar-" )+5;
                if(!in_array(substr($_GET['text'],$pos,1),$chans)) {
					$_GET['text'] = ereg_replace("private \[tar-[1-9]\]",'',$_GET['text']);
				}
			}*/
$tmptext=$_GET['text'];


			$_GET['text'] = str_replace("'", "",$_GET['text']);



			if (filesize("/chat.txt")>100*1024) {
				//file_put_contents("chat.txt", file_get_contents("chat.txt", NULL, NULL, 3*1024), LOCK_EX);
				// chmod("$fp", 0644);
				// удаление последней строки
			if ($action!=1) {
				$file=file("/chat.txt");
				$fp=fopen("/chat.txt","w");
				flock ($fp,LOCK_EX);
				for ($s=0;$s<count($file)/1.6;$s++) {
					unset($file[$s]);
				}
				fputs($fp, implode("",$file));
				fputs($fp ,"\r\n:[".time ()."]:[{$user['login']}]:[<font color=\"".(($user['color'])?$user['color']:"#000000")."\">".($_GET['text'])."</font>]:[".$user['room']."]\r\n"); //работа с файлом
				flock ($fp,LOCK_UN);
				fclose($fp);
				}
			}else{
				if ($action!=1) {
					$fp = fopen ("/chat.txt","a"); //открытие
					flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
					fputs($fp ,":[".time ()."]:[{$user['login']}]:[<font color=\"".(($user['color'])?$user['color']:"#000000")."\">".($_GET['text'])."</font>]:[".$user['room']."]\r\n"); //работа с файлом
					fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
					flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
					fclose ($fp); //закрытие
				}
			}
			

		
			die ("<script>top.CLR1();top.RefreshChat();</script>");

		}
	}
?>
</form>
</body>
</html>