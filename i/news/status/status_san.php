<?
	$la = sys_getloadavg();
	$la[0]=$la[0]/4;
	$la[1]=$la[1]/4;
	$la[2]=$la[2]/4;
?>
<HTML>
	<HEAD>
		<link rel=stylesheet type="text/css" href="i/main.css">
		<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
	</HEAD>
<left><BODY leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=e2e0e0>
<?
	echo "<left><img src='http://img.combats.com/i/city/gerb/7.gif'></left>";
	
$online = mysql_query("select * from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='sandcity';");
?>
<br><br><b>Sand City</b><br>
������ � ������: <?=mysql_num_rows($online)?> ��� .
<br><?//$num = mysql_num_rows(mysql_query("SELECT `id` FROM `users`"));echo"����� �������: ".$num." ���.";?>
<?
	echo "�������� �� ������: ";
	if ($la[1] < 0.70) {
		echo "<font color=green>������</font>";
	} elseif ($la[1] < 1.20) {
		echo "<font color=orange>�������</font>";
	} elseif ($la[1] > 1.20) {
		echo "<font color=red>�������</font>";
	}
	//	$up=exec("uptime");
//	echo "<br>".substr($up,0,strpos($up,','));
	include "connect.php";
?>
</BODY></center>
</HTML>