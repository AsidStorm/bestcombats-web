<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
	$lic = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '���' LIMIT 1;"));
	$travma1 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13') LIMIT 1 ;"));

	$travma_1 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND `type`='11' LIMIT 1 ;"));
	$travma_2 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND `type`='12' LIMIT 1 ;"));
	$travma_3 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND `type`='13' LIMIT 1 ;"));
	
	
	include "functions.php";
	header("Cache-Control: no-cache");
	
	if($_GET['travma']==1){
	$travma1 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;"));
	$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;");
	if ($user['battle'] <> 0) {
		echo "��� �� ������ �����...";
	}elseif (!$travma1) {
		echo "� ��� ��� �����...";	
	} else {
		addch("<font color=red>��������! </font>�������� &quot;{$user['login']}&quot; ����������� <b>���������� ����� ������!</b> <img src=/i/magic/abook2.gif>");
		if ($travma1['type']==11){$bet=1;}
		elseif($travma1['type']==12){$bet=2;}
		elseif($travma1['type']==13){$bet=3;}	
		elseif($travma1['type']==14){$bet=4;}	
		
		while ($owntravma = mysql_fetch_array($travma)) {
				deltravma($owntravma['id']);
		}
		echo "�� ������������ C��������� ����� ������.";
	}	
	}
	
	if (@(int)$_POST['travma']>0) {
	$travma1 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;"));
	$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;");
	if ($user['battle'] <> 0) {
		echo "��� �� ������ �����...";
	}elseif (!$travma1) {
		echo "� ��� ��� �����...";	
	} else {
		addch("<font color=red>��������! </font>�������� &quot;{$user['login']}&quot; ����������� <b>���������� ����� ������!</b> <img src=/i/magic/abook2.gif>");
		if ($travma1['type']==11){$bet=1;}
		elseif($travma1['type']==12){$bet=2;}
		elseif($travma1['type']==13){$bet=3;}	
		elseif($travma1['type']==14){$bet=4;}	
		
		while ($owntravma = mysql_fetch_array($travma)) {
				deltravma($owntravma['id']);
		}
		echo "�� ������������ C��������� ����� ������.";
	}	
	}

?>
<HTML>
<HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style>
	.row {
		cursor:pointer;
	} 
</style>
<script type="text/javascript">
  function show(ele) {
      var srcElement = document.getElementById(ele);
      if(srcElement != null) {
          if(srcElement.style.display == "block") {
            srcElement.style.display= 'none';
          }
          else {
            srcElement.style.display='block';
          }
      }
  }
</script>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=e2e0e0>
	<div id=hint4 class=ahint></div>
	<TABLE cellspacing=0 cellpadding=2 width=100%>
<TD style="width: 40%; vertical-align: top; ">
<TABLE cellspacing=0 cellpadding=2 style="width: 100%; ">
<tr>
<TD align=center><h4>���</h4></TD>
</tr>
<tr>

</tr>
<TR>
</head>
</TABLE>
</TD>
<TD style="width: 5%; vertical-align: top; ">&nbsp;</TD>
</TR>
</TABLE>
</body>
</html>

<table width="100%">
<tr>

<td width="120">
<table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<TD align=center><?if($user['align']>0){echo"<img src=\"".IMGBASE."/i/align_".$user['align'].".gif\">";} if ($user['klan'] <> '') { echo '<img title="'.$user['klan'].'" src="http://img.bestcombats.net/klan/'.$user['klan'].'.gif">'; }if($user['deal']>0){ echo"<img src=\"".IMGBASE."/i/deal.gif\">"; } ?><B><?=$user['login']?></B> [<?=$user['level']?>]<a href=inf.php?<?=$user['id']?> target=_blank><IMG SRC=/i/inf.gif WIDTH=12 HEIGHT=11 ALT="���. � <?=$user['login']?>"></a>
<TABLE  border=0 cellSpacing=1 cellPadding=0 width="100%">
<TBODY>
<TR vAlign=top>
<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TBODY>

<TR><TD style="BACKGROUND-IMAGE:none">
<?php if ($user['helm'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['helm'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ����� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w9.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>


<TR><TD style="BACKGROUND-IMAGE:none">
<?php if ($user['naruchi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['naruchi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w18.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['weap'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['weap'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w3.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['bron'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['bron'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=80 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w4.gif\" width=60 height=80 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['belt'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['belt'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ����� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w5.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
</TBODY></TABLE>
</TD>


<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TR>
<TD height=20 vAlign=middle>
<table cellspacing="0" cellpadding="0" style='line-height: 1'>

<tr>
<td nowrap style="font-size:9px" style="position: relative">
<table cellspacing="0" cellpadding="0" style='line-height: 1'>
<td nowrap style="font-size:9px" style="position: relative">
<SPAN id="HP" style='position: absolute; left: 5; z-index: 1; font-weight: bold; color: #FFFFFF'></SPAN>
<img src="i/misc/bk_life_loose.gif" alt="������� �����" name="HP1" width="1" height="9" id="HP1">
<img src="i/misc/bk_life_loose.gif" alt="������� �����" name="HP2" width="1" height="9" id="HP2">
</td>
</table>
</td>
</tr>

<?
if($user['maxmana']){ ?> 
<tr><tr><td nowrap style="font-size:9px" style="position: relative">
<?
echo setMP2($user['mana'],$user['maxmana'],$battle);
print"</td>
</tr>";}
?>

</table>
</TD></TR>



<TR><TD height=220 vAlign=top width=120 align=left>
<DIV style="Z-INDEX: 1; POSITION: relative; WIDTH: 120px; HEIGHT: 220px" bgcolor="black">
<IMG border=0 src="/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218>
<DIV style="Z-INDEX: 2; POSITION: absolute; WIDTH: 120px; HEIGHT: 220px; TOP: 0px; LEFT: 0px"></DIV></DIV></TD></TR>
<TR><TD>
<?
if($battle && $invis && $user['id'] != $_SESSION['uid']) {
echo'<IMG border=0 alt="" src="/i/slot_invis.gif" width=120 height=40>';
}elseif ($user['vip']==1) {
echo'<IMG border=0 alt="" src="/i/slot_bottom60.gif" width=120 height=40>';
}elseif ($user['align']>1 && $user['align']<2) {
echo'<IMG border=0 alt="" src="/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($user['align']>=3 && $user['align']<4) {
echo'<IMG border=0 alt="" src="/i/slot_bottom3.gif" width=120 height=40>';
}elseif ($user['align']==7) {
echo'<IMG border=0 alt="" src="/i/slot_bottom7.gif" width=120 height=40>';
}elseif ($user['align']==0.99) {
echo'<IMG border=0 alt="" src="/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($user['align']==0.98) {
echo'<IMG border=0 alt="" src="/i/slot_bottom3.gif" width=120 height=40>';
}else{
echo'<IMG border=0 alt="" src="/i/slot_bottom0.gif" width=120 height=40>';
}
?>
</TD></TR></TBODY></TABLE></TD>
<TD><TABLE border=0 cellSpacing=0 cellPadding=0 width="100%"><TBODY>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['sergi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['sergi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w1.gif\" width=60 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['kulon'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['kulon'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w2.gif\" width=60 height=20 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD><TABLE border=0 cellSpacing=0 cellPadding=0>
<TBODY> <TR>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($user['r1'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['r1'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($user['r2'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['r2'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($user['r3'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['r3'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
</TR></TBODY></TABLE></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['perchi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['perchi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ��������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w11.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ��������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['shit'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['shit'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ���� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w10.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ���</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['leg'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['leg'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=80 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w19.gif\" width=60 height=80 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($user['boots'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($user['boots'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w12.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
</TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
	</td>
  </tr>
</table>
</td>

<td valign="top"><br>
<?
if(!$_GET['d']){print"����� ����������. �������, ��� ���������� � ���� ������. � � ������� �� ������ � ����� ������ ����������, �������� ������, ���� ����� ������ ��������. ��� ������ ����� �������� ������ ���� ���� ������ � ������� �� ����������. ����, ���� ������� �����������, ���� �������� �������� ��������������. ��������� �� �������, ������� ���������� ��� �����, ������� ���������� ����� �������.<br> � ����� ������ �� ����������?<br><b>��������. ��������� ������� ����������: 5 �������� .</b><br><b></b>";}
if($_GET['d']=='1'){print"� ���������, � �� ����������� �������� �� �������. ";}
if($_GET['d']=='2'){print"��� �������� ��������� 5 ��. �� ��������? ";}
if($_GET['d']=='3'){print"����������. ������ ������ ��������������� � ������ ����. <br><br> �������� �� ������ ������ ����������:<br> ������ ������:<b>15</b> <br> ������� ������: <b>30</b><br> ������� ������:<b>45</b><br><br>��������� ������ ���� ������ ��� ����������? ";}
if($_GET['d']=='4'){print"<FONT color='red'>�� ��������� <b>5.00 ��.</b></font><br><br>��� ������ ��� ������������� ���������� ���������� ����. ����������, ��������.";
					mysql_query("UPDATE `users` SET `money`=`money`-5 WHERE `id`='".$user['id']."'");
					mysql_query("UPDATE `users` SET `hp`=`maxhp` WHERE `id`='".$user['id']."'");
					mysql_query("UPDATE `users` SET `mana`=`maxmana` WHERE `id`='".$user['id']."'");}
if($_GET['d']=='5'){print"<i>� ��� ������ � ���� ������ �� �������� �������� �������� � ����, �������� ������� � �������. ���� ������� ���������� �����, � ������ �����������, � �� ������ ������� ������. � ����� ��� ��������, � ������� ������ �������� ������������� ���.</i>";}
if($_GET['d']=='6'){print"��� �������� ��������� <b>15 ��</b>. �� ��������? ";}
if($_GET['d']=='7'){print"��� �������� ��������� <b>30 ��</b>. �� ��������? ";}
if($_GET['d']=='8'){print"��� �������� ��������� <b>45 ��</b>. �� ��������? ";}
if($_GET['d']=='9'){print"�� ���������� ������ ������ ���! ����� � ����������!!! ";
					$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13') LIMIT 1 ;");
					$travma1 = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type`='11' OR `type`='12' OR `type`='13') LIMIT 1 ;"));
					if ($travma1['type']==11){mysql_query("UPDATE `users` SET `money`=`money`-15 WHERE `id`='".$user['id']."'");}
					elseif($travma1['type']==12){mysql_query("UPDATE `users` SET `money`=`money`-30 WHERE `id`='".$user['id']."'");}
					elseif($travma1['type']==13){mysql_query("UPDATE `users` SET `money`=`money`-45 WHERE `id`='".$user['id']."'");}	

					while ($owntravma = mysql_fetch_array($travma)) {
						deltravma($owntravma['id']);
					}}
?>
<br>
<br>
<table >
<!--
	<tr>
		<td>
		���������� �� ������ ������:
		</td>
		
		<td>	
		<INPUT TYPE=button value="����������" onClick="location.href='lic.php?travma=1'">
		</td>
		
	</tr>
	
	<tr>
		<td>
		���������� �� ������� ������:
		</td>
		
		<td>
		<INPUT TYPE=button value="����������" onClick="location.href='lic.php?travma=1'">
		</td>
		
	</tr>

	<tr>
		<td>
		���������� �� ������� ������:
		</td>
		
		<td>	
		<INPUT TYPE=button value="����������" onClick="location.href='lic.php?travma=1'">
		</td>
		
	</tr>
-->

<?
if(!isset($_GET['d'])){print"&bull;<A href='?act=lic&d=1'> ���! ������ �� �������! </A><BR>";}
if(!isset($_GET['d']) and $user['money']>=5){print"&bull;<A href='?act=lic&d=2'> ���, � ������ ������������ ��� ����� � ����! </A><BR>";}
if(!isset($_GET['d'])){print"&bull;<A href='?act=lic&d=3'> � ������ ���� ����� ������? </A><BR>";}
if(!isset($_GET['d'])){print"&bull;<A href='main.php?act=none'> ��� ���� �������� �����. (��������� ��������)</A><BR>";}

if($_GET['d']=='1'){print"&bull;<A href='?act=lic'> �������� � ������� �����.  </A><BR>";}

if($_GET['d']=='2'){print"&bull;<A href='?act=lic&d=4'> �� </A><BR>";}
if($_GET['d']=='2'){print"&bull;<A href='main.php?act=none'> ��� </A><BR>";}

if($_GET['d']=='3' and $travma_1 and $user['money']>=15){print"&bull;<A href='?act=lic&d=6'> ���! ������ ���� �� ������ ������, ����������...</A><BR>";}
if($_GET['d']=='3' and $travma_2 and $user['money']>=30){print"&bull;<A href='?act=lic&d=7'> ���! ������ ���� ������� ������, ����������...</A><BR>";}
if($_GET['d']=='3' and $travma_3 and $user['money']>=45){print"&bull;<A href='?act=lic&d=8'> ���! ������ ���� ������� ������, ����������...</A><BR>";}
if($_GET['d']=='3'){print"&bull;<A href='main.php?act=none'> �������� �������. ������ ������ �� ����. (��������� ��������)</A><BR>";}

if($_GET['d']=='4'){print"&bull;<A href='?act=lic&d=5'> ��, � ��� ������ ��?</A><BR>";}

if($_GET['d']=='5'){print"&bull;<A href='main.php?act=none'> ���.. ��� �������. (��������� ��������)</A><BR>";}

if($_GET['d']=='6'){print"&bull;<A href='?act=lic&d=9'> �� </A><BR>";}
if($_GET['d']=='6'){print"&bull;<A href='main.php?act=none'> ��� </A><BR>";}

if($_GET['d']=='7'){print"&bull;<A href='?act=lic&d=9'> �� </A><BR>";}
if($_GET['d']=='7'){print"&bull;<A href='main.php?act=none'> ��� </A><BR>";}

if($_GET['d']=='8'){print"&bull;<A href='?act=lic&d=9'> �� </A><BR>";}
if($_GET['d']=='8'){print"&bull;<A href='main.php?act=none'> ��� </A><BR>";}

if($_GET['d']=='9'){print"&bull;<A href='main.php?act=none'> �������... � ������� ������ �� ������� ����... (��������� ��������)</A><BR>";}
?>	
</table>
</td>

<td  width="120">
<table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<TD align=center><?if($lic['align']>0){echo"<img src=\"".IMGBASE."/i/align_".$lic['align'].".gif\">";} if ($lic['klan'] <> '') { echo '<img title="'.$lic['klan'].'" src="http://img.bestcombats.net/klan/'.$lic['klan'].'.gif">'; }if($lic['deal']>0){ echo"<img src=\"".IMGBASE."/i/deal.gif\">"; } ?><B><?=$lic['login']?></B> [<?=$lic['level']?>]<a href=inf.php?<?=$lic['id']?> target=_blank><IMG SRC=/i/inf.gif WIDTH=12 HEIGHT=11 ALT="���. � <?=$lic['login']?>"></a>
<TABLE  border=0 cellSpacing=1 cellPadding=0 width="100%">
<TBODY>
<TR vAlign=top>
<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TBODY>

<TR><TD style="BACKGROUND-IMAGE:none">
<?php if ($lic['helm'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['helm'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ����� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w9.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>


<TR><TD style="BACKGROUND-IMAGE:none">
<?php if ($lic['naruchi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['naruchi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w18.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['weap'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['weap'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w3.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['bron'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['bron'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=80 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w4.gif\" width=60 height=80 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['belt'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['belt'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ����� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w5.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
</TBODY></TABLE>
</TD>


<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TR>
<TD height=20 vAlign=middle>
<table cellspacing="0" cellpadding="0" style='line-height: 1'>
<tr>
<td nowrap style="font-size:9px" style="position: relative">

<table cellspacing="0" cellpadding="0" style='line-height: 1'><td nowrap style="font-size:9px" style="position: relative"><SPAN id="HP" style='position: absolute; left: 5; z-index: 1; font-weight: bold; color: #FFFFFF'></SPAN><img src="/i/misc/bk_life_loose.gif" alt="������� �����" name="HP1" width="1" height="9" id="HP1"><img src="/i/misc/bk_life_loose.gif" alt="������� �����" name="HP2" width="1" height="9" id="HP2"></td></table></td>
</tr>
<?
if($lic['maxmana']){ ?> 
<tr><tr><td nowrap style="font-size:9px" style="position: relative">
<?
echo setMP2($lic['mana'],$lic['maxmana'],$battle);
print"</td>
</tr>";}

?>

</table>
</TD></TR>



<TR><TD height=220 vAlign=top width=120 align=left>
<DIV style="Z-INDEX: 1; POSITION: relative; WIDTH: 120px; HEIGHT: 220px" bgcolor="black">
<IMG border=0 src="/i/shadow/<?=$lic['sex']?>/<?print"".$lic['shadow']."";?>" width=120 height=218>
<DIV style="Z-INDEX: 2; POSITION: absolute; WIDTH: 120px; HEIGHT: 220px; TOP: 0px; LEFT: 0px"></DIV></DIV></TD></TR>
<TR><TD>
<?
if($battle && $invis && $lic['id'] != $_SESSION['uid']) {
echo'<IMG border=0 alt="" src="/i/slot_invis.gif" width=120 height=40>';
}elseif ($lic['vip']==1) {
echo'<IMG border=0 alt="" src="/i/slot_bottom60.gif" width=120 height=40>';
}elseif ($lic['align']>1 && $lic['align']<2) {
echo'<IMG border=0 alt="" src="/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($lic['align']>=3 && $lic['align']<4) {
echo'<IMG border=0 alt="" src="/i/slot_bottom3.gif" width=120 height=40>';
}elseif ($lic['align']==7) {
echo'<IMG border=0 alt="" src="/i/slot_bottom7.gif" width=120 height=40>';
}elseif ($lic['align']==0.99) {
echo'<IMG border=0 alt="" src="/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($lic['align']==0.98) {
echo'<IMG border=0 alt="" src="/i/slot_bottom3.gif" width=120 height=40>';
}else{
echo'<IMG border=0 alt="" src="/i/slot_bottom0.gif" width=120 height=40>';
}
?>
</TD></TR></TBODY></TABLE></TD>
<TD><TABLE border=0 cellSpacing=0 cellPadding=0 width="100%"><TBODY>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['sergi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['sergi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w1.gif\" width=60 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['kulon'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['kulon'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w2.gif\" width=60 height=20 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>

<TR><TD><TABLE border=0 cellSpacing=0 cellPadding=0>
<TBODY> <TR>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['r1'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['r1'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['r2'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['r2'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
<TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['r3'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['r3'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=20 height=20 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������ �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD>";
}}else{
print "<img src=\"".IMGBASE."/i/w6.gif\" width=20 height=20 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD>";
}?>
</TR></TBODY></TABLE></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['perchi'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['perchi'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ��������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w11.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� ��������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['shit'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['shit'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=60 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ���� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w10.gif\" width=60 height=60 onMouseMove=\"TipShow('<b>������ ���� ���</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['leg'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['leg'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=80 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w19.gif\" width=60 height=80 onMouseMove=\"TipShow('<b>������ ���� ������</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php if ($lic['boots'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($lic['boots'])."' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
print "<img src=\"".IMGBASE."/i/sh/".$dress['img']."\" width=60 height=40 onMouseMove=\"TipShow('<b>".$dress['name']."<br>���������: ".$dress['duration']."/".$dress['maxdur'].""; if($dress['ghp']>0){print"<br>������� �����: + ".$dress['ghp']."";} if($dress['text']!=null){print"<br>�� ������� �������������: <br><font color=#FFFF00>".$dress['text']."</font>";} print"</b>', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}}else{
print "<img src=\"".IMGBASE."/i/w12.gif\" width=60 height=40 onMouseMove=\"TipShow('<b>������ ���� �����</b>\', event);\" onMouseOut=\"TipHide();\"></TD></TR>";
}?>
</TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
	</td>
  </tr>
</table>
</td>

</tr>
</table>

<TABLE width=100% align="right">
<tr><td>
<br>
<br>
<br>
<?php include("mail_ru.php"); ?>
</TD></tr>
</TABLE>
</body>
</html>