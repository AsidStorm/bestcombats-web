<?
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	include "functions.php";
	$al = mysql_fetch_assoc(mysql_query("SELECT * FROM `aligns` WHERE `align` = '{$user['align']}' LIMIT 1;"));
	header("Cache-Control: no-cache");
	if ($user['align']<1 or $user['align']>6) header("Location: index.php");
?>

<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
<table align=right><tr><td><INPUT type='button' value='Обновить' style='width: 75px' onclick='location="/ktogde77.php"'>&nbsp;&nbsp;&nbsp;<INPUT TYPE="button" onclick="location.href='main.php';" value="Вернуться" title="Вернуться"></table>

<table>
<tr>
	<th>Онлайн</td>
	<th>Зарегистрированные за 24 часа</td>
</tr>

<tr>
	<td valign=top>
	<?
	$online = mysql_query("select id from `online`  WHERE `real_time` >= ".(time()-60).";");
	$i=0;
	echo "<table border=1 cellspacing=0 cellpadding=2>
			<tr align=center bgcolor=#A5A5A5><td><b>№</b></td><td><b>Ник</b></td><td><b>Локация</b></td><td><b>Город</b></td></tr>";
	while($ON = mysql_fetch_array($online)){
		$USER = mysql_fetch_array(mysql_query("SELECT login,id,align,klan,level,deal,battle,room,incity FROM `users` WHERE `id` = '{$ON['id']}' "));
		$rrm = $rooms[$USER['room']];
		$i++;
		echo "<tr>";
		echo "<td align=center>".$i."</td>";	
		echo '<td><A HREF="javascript:top.AddToPrivate(\'',$USER['login'],'\', top.CtrlPress)" target=refreshed><img src="http://img.bestcombats.net/chat/lock.gif" width=20 height=15></A>';
		nick2($USER['id']);
		echo "</td>";
		echo "<td>";	
		If (!empty($rrm)){
			echo $rrm;
		}else{
			$labirint=mysql_fetch_array(mysql_query("SELECT name from `labirint` where `user_id`=".$USER['id']." LIMIT 1;"));
			echo $labirint['name'];
		}
		
		echo "</td>";
		echo "<td>";	
		If ($USER['incity']=='virtcity'){echo "Capital City";}
		elseif($USER['incity']=='suburb'){echo "Angels City";}
		elseif($USER['incity']=='dungeon'){echo "Abadoned Plain";}
		else{echo $USER['incity'];}
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	</td>
	<td valign=top>
	<?
	$online = mysql_query("select *  from `users`  WHERE `user_id`=0 and `vid`=0 and `borntime` BETWEEN '".date("Y-m-d H:i:s" ,(time()-86400))."' and '".date("Y-m-d H:i:s" ,time())."' Order by borntime ASC;"); 
	$i=0;
	echo "<table border=1 cellspacing=0 cellpadding=2>
			<tr align=center bgcolor=#A5A5A5><td><b>№</b></td><td><b>Ник</b></td><td><b>Локация</b></td><td><b>Город</b></td></tr>";
	while($ON = mysql_fetch_array($online)){
		$rrm = $rooms[$ON['room']];
		$i++;
		echo "<tr>";
		echo "<td align=center>".$i."</td>";	
		echo '<td><A HREF="javascript:top.AddToPrivate(\'',$ON['login'],'\', top.CtrlPress)" target=refreshed><img src="http://img.bestcombats.net/chat/lock.gif" width=20 height=15></A>';
		nick2($ON['id']);
		echo "</td>";
		echo "<td>";	
		echo $rrm;
		echo "</td>";
		echo "<td>";	
		If ($ON['incity']=='virtcity'){echo "Capital City";}
		elseif($ON['incity']=='suburb'){echo "Angels City";}
		elseif($ON['incity']=='dungeon'){echo "Abadoned Plain";}
		else{echo $ON['incity'];}
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>	
	</td>
</tr>
</table>