<?php

/* monitoring script by bllem*/
	$la = sys_getloadavg();
	$la[0]=$la[0]/4;
	$la[1]=$la[1]/4;
	$la[2]=$la[2]/4;
?>
<HTML>
	<HEAD>
		<link rel=stylesheet type="text/css" href="http://also.bestcombats.net/i/main.css">
		<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
	</HEAD>
<BODY leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=e2e0e0>
<table align=right>
	<tr>
		<td>
			<INPUT TYPE="button" onClick="location.href='?rnd=0.872328978425941'" class="knopka" value="��������"> 
		</td>
		<td>
		<INPUT TYPE="button" onClick="location.href='a.php';" value="���������" title="���������">
		</td>
	</tr>
</table>

<h4>������� ��������</h4>
<?
	echo "<B>�� 1 ������:</B> ".($la[0]*100)."% ";
	if ($la[0] < 0.16) {
		echo "<font color=green>������</font>";
	} elseif ($la[0] < 0.25) {
		echo "<font color=orange>�������</font>";
	} elseif ($la[0] > 0.25) {
		echo "<font color=red>�������</font>";
	}
	echo "<BR><B>�� 5 �����:</B> ".($la[1]*100)."% ";
	if ($la[1] < 0.16) {
		echo "<font color=green>������</font>";
	} elseif ($la[1] < 0.25) {
		echo "<font color=orange>�������</font>";
	} elseif ($la[1] > 0.25) {
		echo "<font color=red>�������</font>";
	}
	echo "<BR><B>�� 15 �����:</B> ".($la[2]*100)."% ";
	if ($la[2] < 0.16) {
		echo "<font color=green>������</font>";
	} elseif ($la[2] < 0.25) {
		echo "<font color=orange>�������</font>";
	} elseif ($la[2] > 0.25) {
		echo "<font color=red>�������</font>";
	}
//	$up=exec("uptime");
//	echo "<br>".substr($up,0,strpos($up,','));

include "connect.php";

$online = mysql_query("select * from `online`  WHERE `real_time` >= ".(time()-60).";");
?>


<br>(������ � ����� <?=mysql_num_rows($online)?> ���.)<br><br>
<?$num = mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE bot not like '1'"));echo"������������������:<font color=black><b> ".$num." </font></b>���.<br>";?></td><?$bl = mysql_num_rows(mysql_query("SELECT `block` FROM `users` WHERE `block` =1"));echo"��������������:<font color=red><b> ".$bl." </b></font>���.<br>";?><?$haos = mysql_num_rows(mysql_query("SELECT `align` FROM `users` WHERE `align` =4"));echo"� �����:<font color=red><b> ".$haos." </b></font>���.<br><br>";


if (!$_POST['dlogs']) {$_POST['dlogs']=date("d.m.y");}

$ddate33="20".substr($_POST['dlogs'],6,2)."-".substr($_POST['dlogs'],3,2)."-".substr($_POST['dlogs'],0,2)."";			
$res = mysql_fetch_array(mysql_query("select count(`id`) from `users` where `borntime` LIKE '".$ddate33." %';"));
echo "�� ������� ".$res[0]." </b>���.";
?>
</BODY>
</HTML>