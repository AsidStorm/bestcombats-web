<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".db_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	//if ($user['align']==2.5)  {

?>
<table width="100%" border="1" cellspacing="0" cellpadding="0"><tr>
<td align="left" valign="top">
<?
$nes = db_query("SELECT * FROM `podzem2` WHERE name='".db_escape_string($_GET['name'])."'");
$s = mysqli_fetch_array($nes);
?>
<table width="460" border="1" cellspacing="0" cellpadding="0">
  <tr>
<?
if($_GET['n']=='91'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">91</td>
<td align="center"><a href="?n=91&p=92&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=91&d=81&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v91"]!='' or $s["n91"]!='' or $s["l91"]!='' or $s["p91"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=91&name='.$_GET['name'].'">91</a><br>
<font style="font-size:8px;">'.$s["v91"].' '.$s["n91"].' '.$s["l91"].' '.$s["p91"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=91&name='.$_GET['name'].'">91</a></td>';}}	

if($_GET['n']=='92'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=92&l=91&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">92</td>
<td align="center"><a href="?n=92&p=93&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=92&d=82&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v92"]!='' or $s["n92"]!='' or $s["l92"]!='' or $s["p92"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=92&name='.$_GET['name'].'">92</a><br>
<font style="font-size:8px;">'.$s["v92"].' '.$s["n92"].' '.$s["l92"].' '.$s["p92"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=92&name='.$_GET['name'].'">92</a></td>';}}

if($_GET['n']=='93'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=93&l=92&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">93</td>
<td align="center"><a href="?n=93&p=94&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=93&d=83&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v93"]!='' or $s["n93"]!='' or $s["l93"]!='' or $s["p93"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=93&name='.$_GET['name'].'">93</a><br>
<font style="font-size:8px;">'.$s["v93"].' '.$s["n93"].' '.$s["l93"].' '.$s["p93"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=93&name='.$_GET['name'].'">93</a></td>';}}	

if($_GET['n']=='94'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=94&l=93&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">94</td>
<td align="center"><a href="?n=94&p=95&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=94&d=84&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v94"]!='' or $s["n94"]!='' or $s["l94"]!='' or $s["p94"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=94&name='.$_GET['name'].'">94</a><br>
<font style="font-size:8px;">'.$s["v94"].' '.$s["n94"].' '.$s["l94"].' '.$s["p94"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=94&name='.$_GET['name'].'">94</a></td>';}}

if($_GET['n']=='95'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=95&l=94&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">95</td>
<td align="center"><a href="?n=95&p=96&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=95&d=85&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v95"]!='' or $s["n95"]!='' or $s["l95"]!='' or $s["p95"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=95&name='.$_GET['name'].'">95</a><br>
<font style="font-size:8px;">'.$s["v95"].' '.$s["n95"].' '.$s["l95"].' '.$s["p95"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=95&name='.$_GET['name'].'">95</a></td>';}}	

if($_GET['n']=='96'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=96&l=95&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">96</td>
<td align="center"><a href="?n=96&p=97&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=96&d=86&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v96"]!='' or $s["n96"]!='' or $s["l96"]!='' or $s["p96"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=96&name='.$_GET['name'].'">96</a><br>
<font style="font-size:8px;">'.$s["v96"].' '.$s["n96"].' '.$s["l96"].' '.$s["p96"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=96&name='.$_GET['name'].'">96</a></td>';}}

if($_GET['n']=='97'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=97&l=96&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">97</td>
<td align="center"><a href="?n=97&p=98&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=97&d=87&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v97"]!='' or $s["n97"]!='' or $s["l97"]!='' or $s["p97"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=97&name='.$_GET['name'].'">97</a><br>
<font style="font-size:8px;">'.$s["v97"].' '.$s["n97"].' '.$s["l97"].' '.$s["p97"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=97&name='.$_GET['name'].'">97</a></td>';}}

if($_GET['n']=='98'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=98&l=97&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">98</td>
<td align="center"><a href="?n=98&p=99&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=98&d=88&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v98"]!='' or $s["n98"]!='' or $s["l98"]!='' or $s["p98"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=98&name='.$_GET['name'].'">98</a><br>
<font style="font-size:8px;">'.$s["v98"].' '.$s["n98"].' '.$s["l98"].' '.$s["p98"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=98&name='.$_GET['name'].'">98</a></td>';}}

if($_GET['n']=='99'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=99&l=98&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">99</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=99&d=89&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v99"]!='' or $s["n99"]!='' or $s["l99"]!='' or $s["p99"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=99&name='.$_GET['name'].'">99</a><br>
<font style="font-size:8px;">'.$s["v99"].' '.$s["n99"].' '.$s["l99"].' '.$s["p99"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=99&name='.$_GET['name'].'">99</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='81'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=81&v=91&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">81</td>
<td align="center"><a href="?n=81&p=82&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=81&d=71&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v81"]!='' or $s["n81"]!='' or $s["l81"]!='' or $s["p81"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=81&name='.$_GET['name'].'">81</a><br>
<font style="font-size:8px;">'.$s["v81"].' '.$s["n81"].' '.$s["l81"].' '.$s["p81"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=81&name='.$_GET['name'].'">81</a></td>';}}	

if($_GET['n']=='82'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=82&v=92&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=82&l=81&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">82</td>
<td align="center"><a href="?n=82&p=83&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=82&d=72&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v82"]!='' or $s["n82"]!='' or $s["l82"]!='' or $s["p82"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=82&name='.$_GET['name'].'">82</a><br>
<font style="font-size:8px;">'.$s["v82"].' '.$s["n82"].' '.$s["l82"].' '.$s["p82"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=82&name='.$_GET['name'].'">82</a></td>';}}

if($_GET['n']=='83'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=83&v=93&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=83&l=82&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">83</td>
<td align="center"><a href="?n=83&p=84&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=83&d=73&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v83"]!='' or $s["n83"]!='' or $s["l83"]!='' or $s["p83"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=83&name='.$_GET['name'].'">83</a><br>
<font style="font-size:8px;">'.$s["v83"].' '.$s["n83"].' '.$s["l83"].' '.$s["p83"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=83&name='.$_GET['name'].'">83</a></td>';}}	

if($_GET['n']=='84'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=84&v=94&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=84&l=83&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">84</td>
<td align="center"><a href="?n=84&p=85&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=84&d=74&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v84"]!='' or $s["n84"]!='' or $s["l84"]!='' or $s["p84"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=84&name='.$_GET['name'].'">84</a><br>
<font style="font-size:8px;">'.$s["v84"].' '.$s["n84"].' '.$s["l84"].' '.$s["p84"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=84&name='.$_GET['name'].'">84</a></td>';}}

if($_GET['n']=='85'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=85&v=95&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=85&l=84&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">85</td>
<td align="center"><a href="?n=85&p=86&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=85&d=75&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v85"]!='' or $s["n85"]!='' or $s["l85"]!='' or $s["p85"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=85&name='.$_GET['name'].'">85</a><br>
<font style="font-size:8px;">'.$s["v85"].' '.$s["n85"].' '.$s["l85"].' '.$s["p85"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=85&name='.$_GET['name'].'">85</a></td>';}}	

if($_GET['n']=='86'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=86&v=96&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=86&l=85&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">86</td>
<td align="center"><a href="?n=86&p=87&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=86&d=76&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v86"]!='' or $s["n86"]!='' or $s["l86"]!='' or $s["p86"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=86&name='.$_GET['name'].'">86</a><br>
<font style="font-size:8px;">'.$s["v86"].' '.$s["n86"].' '.$s["l86"].' '.$s["p86"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=86&name='.$_GET['name'].'">86</a></td>';}}

if($_GET['n']=='87'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=87&v=97&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=87&l=86&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">87</td>
<td align="center"><a href="?n=87&p=88&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=87&d=77&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v87"]!='' or $s["n87"]!='' or $s["l87"]!='' or $s["p87"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=87&name='.$_GET['name'].'">87</a><br>
<font style="font-size:8px;">'.$s["v87"].' '.$s["n87"].' '.$s["l87"].' '.$s["p87"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=87&name='.$_GET['name'].'">87</a></td>';}}

if($_GET['n']=='88'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=88&v=98&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=88&l=87&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">88</td>
<td align="center"><a href="?n=88&p=89&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=88&d=78&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v88"]!='' or $s["n88"]!='' or $s["l88"]!='' or $s["p88"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=88&name='.$_GET['name'].'">88</a><br>
<font style="font-size:8px;">'.$s["v88"].' '.$s["n88"].' '.$s["l88"].' '.$s["p88"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=88&name='.$_GET['name'].'">88</a></td>';}}

if($_GET['n']=='89'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=89&v=99&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=89&l=88&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">89</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=89&d=79&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v89"]!='' or $s["n89"]!='' or $s["l89"]!='' or $s["p89"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=89&name='.$_GET['name'].'">89</a><br>
<font style="font-size:8px;">'.$s["v89"].' '.$s["n89"].' '.$s["l89"].' '.$s["p89"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=89&name='.$_GET['name'].'">89</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='71'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=71&v=81&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">71</td>


<td align="center"><a href="?n=71&p=72&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=71&d=61&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v71"]!='' or $s["n71"]!='' or $s["l71"]!='' or $s["p71"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=71&name='.$_GET['name'].'">71</a><br>
<font style="font-size:8px;">'.$s["v71"].' '.$s["n71"].' '.$s["l71"].' '.$s["p71"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=71&name='.$_GET['name'].'">71</a></td>';}}	

if($_GET['n']=='72'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=72&v=82&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=72&l=71&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">72</td>
<td align="center"><a href="?n=72&p=73&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=72&d=62&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v72"]!='' or $s["n72"]!='' or $s["l72"]!='' or $s["p72"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=72&name='.$_GET['name'].'">72</a><br>
<font style="font-size:8px;">'.$s["v72"].' '.$s["n72"].' '.$s["l72"].' '.$s["p72"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=72&name='.$_GET['name'].'">72</a></td>';}}

if($_GET['n']=='73'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=73&v=83&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=73&l=72&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">73</td>
<td align="center"><a href="?n=73&p=74&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=73&d=63&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v73"]!='' or $s["n73"]!='' or $s["l73"]!='' or $s["p73"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=73&name='.$_GET['name'].'">73</a><br>
<font style="font-size:8px;">'.$s["v73"].' '.$s["n73"].' '.$s["l73"].' '.$s["p73"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=73&name='.$_GET['name'].'">73</a></td>';}}	

if($_GET['n']=='74'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=74&v=84&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=74&l=73&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">74</td>
<td align="center"><a href="?n=74&p=75&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=74&d=64&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v74"]!='' or $s["n74"]!='' or $s["l74"]!='' or $s["p74"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=74&name='.$_GET['name'].'">74</a><br>
<font style="font-size:8px;">'.$s["v74"].' '.$s["n74"].' '.$s["l74"].' '.$s["p74"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=74&name='.$_GET['name'].'">74</a></td>';}}

if($_GET['n']=='75'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=75&v=85&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=75&l=74&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">75</td>
<td align="center"><a href="?n=75&p=76&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=75&d=65&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v75"]!='' or $s["n75"]!='' or $s["l75"]!='' or $s["p75"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=75&name='.$_GET['name'].'">75</a><br>
<font style="font-size:8px;">'.$s["v75"].' '.$s["n75"].' '.$s["l75"].' '.$s["p75"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=75&name='.$_GET['name'].'">75</a></td>';}}	

if($_GET['n']=='76'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=76&v=86&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=76&l=75&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">76</td>
<td align="center"><a href="?n=76&p=77&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=76&d=66&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v76"]!='' or $s["n76"]!='' or $s["l76"]!='' or $s["p76"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=76&name='.$_GET['name'].'">76</a><br>
<font style="font-size:8px;">'.$s["v76"].' '.$s["n76"].' '.$s["l76"].' '.$s["p76"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=76&name='.$_GET['name'].'">76</a></td>';}}

if($_GET['n']=='77'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=77&v=87&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=77&l=76&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">77</td>
<td align="center"><a href="?n=77&p=78&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=77&d=67&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v77"]!='' or $s["n77"]!='' or $s["l77"]!='' or $s["p77"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=77&name='.$_GET['name'].'">77</a><br>
<font style="font-size:8px;">'.$s["v77"].' '.$s["n77"].' '.$s["l77"].' '.$s["p77"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=77&name='.$_GET['name'].'">77</a></td>';}}

if($_GET['n']=='78'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=78&v=88&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=78&l=77&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">78</td>
<td align="center"><a href="?n=78&p=79&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=78&d=68&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v78"]!='' or $s["n78"]!='' or $s["l78"]!='' or $s["p78"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=78&name='.$_GET['name'].'">78</a><br>
<font style="font-size:8px;">'.$s["v78"].' '.$s["n78"].' '.$s["l78"].' '.$s["p78"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=78&name='.$_GET['name'].'">78</a></td>';}}

if($_GET['n']=='79'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=79&v=89&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=79&l=78&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">79</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=79&d=69&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v79"]!='' or $s["n79"]!='' or $s["l79"]!='' or $s["p79"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=79&name='.$_GET['name'].'">79</a><br>
<font style="font-size:8px;">'.$s["v79"].' '.$s["n79"].' '.$s["l79"].' '.$s["p79"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=79&name='.$_GET['name'].'">79</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='61'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=61&v=71&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">61</td>
<td align="center"><a href="?n=61&p=62&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=61&d=51&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v61"]!='' or $s["n61"]!='' or $s["l61"]!='' or $s["p61"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=61&name='.$_GET['name'].'">61</a><br>
<font style="font-size:8px;">'.$s["v61"].' '.$s["n61"].' '.$s["l61"].' '.$s["p61"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=61&name='.$_GET['name'].'">61</a></td>';}}	

if($_GET['n']=='62'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=62&v=72&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=62&l=61&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">62</td>
<td align="center"><a href="?n=62&p=63&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=62&d=52&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v62"]!='' or $s["n62"]!='' or $s["l62"]!='' or $s["p62"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=62&name='.$_GET['name'].'">62</a><br>
<font style="font-size:8px;">'.$s["v62"].' '.$s["n62"].' '.$s["l62"].' '.$s["p62"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=62&name='.$_GET['name'].'">62</a></td>';}}

if($_GET['n']=='63'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=63&v=73&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=63&l=62&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">63</td>
<td align="center"><a href="?n=63&p=64&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=63&d=53&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v63"]!='' or $s["n63"]!='' or $s["l63"]!='' or $s["p63"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=63&name='.$_GET['name'].'">63</a><br>
<font style="font-size:8px;">'.$s["v63"].' '.$s["n63"].' '.$s["l63"].' '.$s["p63"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=63&name='.$_GET['name'].'">63</a></td>';}}	

if($_GET['n']=='64'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=64&v=74&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=64&l=63&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">64</td>
<td align="center"><a href="?n=64&p=65&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=64&d=54&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v64"]!='' or $s["n64"]!='' or $s["l64"]!='' or $s["p64"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=64&name='.$_GET['name'].'">64</a><br>
<font style="font-size:8px;">'.$s["v64"].' '.$s["n64"].' '.$s["l64"].' '.$s["p64"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=64&name='.$_GET['name'].'">64</a></td>';}}

if($_GET['n']=='65'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=65&v=75&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=65&l=64&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">65</td>
<td align="center"><a href="?n=65&p=66&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=65&d=55&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v65"]!='' or $s["n65"]!='' or $s["l65"]!='' or $s["p65"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=65&name='.$_GET['name'].'">65</a><br>
<font style="font-size:8px;">'.$s["v65"].' '.$s["n65"].' '.$s["l65"].' '.$s["p65"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=65&name='.$_GET['name'].'">65</a></td>';}}	

if($_GET['n']=='66'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=66&v=76&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=66&l=65&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">66</td>
<td align="center"><a href="?n=66&p=67&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=66&d=56&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v66"]!='' or $s["n66"]!='' or $s["l66"]!='' or $s["p66"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=66&name='.$_GET['name'].'">66</a><br>
<font style="font-size:8px;">'.$s["v66"].' '.$s["n66"].' '.$s["l66"].' '.$s["p66"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=66&name='.$_GET['name'].'">66</a></td>';}}

if($_GET['n']=='67'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=67&v=77&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=67&l=66&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">67</td>
<td align="center"><a href="?n=67&p=68&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=67&d=57&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v67"]!='' or $s["n67"]!='' or $s["l67"]!='' or $s["p67"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=67&name='.$_GET['name'].'">67</a><br>
<font style="font-size:8px;">'.$s["v67"].' '.$s["n67"].' '.$s["l67"].' '.$s["p67"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=67&name='.$_GET['name'].'">67</a></td>';}}

if($_GET['n']=='68'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=68&v=78&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=68&l=67&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">68</td>
<td align="center"><a href="?n=68&p=69&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=68&d=58&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v68"]!='' or $s["n68"]!='' or $s["l68"]!='' or $s["p68"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=68&name='.$_GET['name'].'">68</a><br>
<font style="font-size:8px;">'.$s["v68"].' '.$s["n68"].' '.$s["l68"].' '.$s["p68"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=68&name='.$_GET['name'].'">68</a></td>';}}

if($_GET['n']=='69'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=69&v=79&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=69&l=68&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">69</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=69&d=59&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v69"]!='' or $s["n69"]!='' or $s["l69"]!='' or $s["p69"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=69&name='.$_GET['name'].'">69</a><br>
<font style="font-size:8px;">'.$s["v69"].' '.$s["n69"].' '.$s["l69"].' '.$s["p69"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=69&name='.$_GET['name'].'">69</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='51'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=51&v=61&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">51</td>
<td align="center"><a href="?n=51&p=52&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=51&d=41&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v51"]!='' or $s["n51"]!='' or $s["l51"]!='' or $s["p51"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=51&name='.$_GET['name'].'">51</a><br>
<font style="font-size:8px;">'.$s["v51"].' '.$s["n51"].' '.$s["l51"].' '.$s["p51"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=51&name='.$_GET['name'].'">51</a></td>';}}	

if($_GET['n']=='52'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=52&v=62&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=52&l=51&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">52</td>
<td align="center"><a href="?n=52&p=53&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=52&d=42&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v52"]!='' or $s["n52"]!='' or $s["l52"]!='' or $s["p52"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=52&name='.$_GET['name'].'">52</a><br>
<font style="font-size:8px;">'.$s["v52"].' '.$s["n52"].' '.$s["l52"].' '.$s["p52"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=52&name='.$_GET['name'].'">52</a></td>';}}

if($_GET['n']=='53'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=53&v=63&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=53&l=52&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">53</td>
<td align="center"><a href="?n=53&p=54&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=53&d=43&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v53"]!='' or $s["n53"]!='' or $s["l53"]!='' or $s["p53"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=53&name='.$_GET['name'].'">53</a><br>
<font style="font-size:8px;">'.$s["v53"].' '.$s["n53"].' '.$s["l53"].' '.$s["p53"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=53&name='.$_GET['name'].'">53</a></td>';}}	

if($_GET['n']=='54'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=54&v=64&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=54&l=53&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">54</td>
<td align="center"><a href="?n=54&p=55&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=54&d=44&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v54"]!='' or $s["n54"]!='' or $s["l54"]!='' or $s["p54"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=54&name='.$_GET['name'].'">54</a><br>
<font style="font-size:8px;">'.$s["v54"].' '.$s["n54"].' '.$s["l54"].' '.$s["p54"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=54&name='.$_GET['name'].'">54</a></td>';}}

if($_GET['n']=='55'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=55&v=65&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=55&l=54&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">55</td>
<td align="center"><a href="?n=55&p=56&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=55&d=45&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v55"]!='' or $s["n55"]!='' or $s["l55"]!='' or $s["p55"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=55&name='.$_GET['name'].'">55</a><br>
<font style="font-size:8px;">'.$s["v55"].' '.$s["n55"].' '.$s["l55"].' '.$s["p55"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=55&name='.$_GET['name'].'">55</a></td>';}}	

if($_GET['n']=='56'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=56&v=66&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=56&l=55&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">56</td>
<td align="center"><a href="?n=56&p=57&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=56&d=46&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v56"]!='' or $s["n56"]!='' or $s["l56"]!='' or $s["p56"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=56&name='.$_GET['name'].'">56</a><br>
<font style="font-size:8px;">'.$s["v56"].' '.$s["n56"].' '.$s["l56"].' '.$s["p56"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=56&name='.$_GET['name'].'">56</a></td>';}}

if($_GET['n']=='57'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=57&v=67&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=57&l=56&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">57</td>
<td align="center"><a href="?n=57&p=58&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=57&d=47&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v57"]!='' or $s["n57"]!='' or $s["l57"]!='' or $s["p57"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=57&name='.$_GET['name'].'">57</a><br>
<font style="font-size:8px;">'.$s["v57"].' '.$s["n57"].' '.$s["l57"].' '.$s["p57"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=57&name='.$_GET['name'].'">57</a></td>';}}

if($_GET['n']=='58'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=58&v=68&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=58&l=57&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">58</td>
<td align="center"><a href="?n=58&p=59&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=58&d=48&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v58"]!='' or $s["n58"]!='' or $s["l58"]!='' or $s["p58"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=58&name='.$_GET['name'].'">58</a><br>
<font style="font-size:8px;">'.$s["v58"].' '.$s["n58"].' '.$s["l58"].' '.$s["p58"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=58&name='.$_GET['name'].'">58</a></td>';}}

if($_GET['n']=='59'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=59&v=69&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=59&l=58&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">59</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=59&d=49&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v59"]!='' or $s["n59"]!='' or $s["l59"]!='' or $s["p59"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=59&name='.$_GET['name'].'">59</a><br>
<font style="font-size:8px;">'.$s["v59"].' '.$s["n59"].' '.$s["l59"].' '.$s["p59"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=59&name='.$_GET['name'].'">59</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='41'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=41&v=51&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">41</td>
<td align="center"><a href="?n=41&p=42&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=41&d=31&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v41"]!='' or $s["n41"]!='' or $s["l41"]!='' or $s["p41"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=41&name='.$_GET['name'].'">41</a><br>
<font style="font-size:8px;">'.$s["v41"].' '.$s["n41"].' '.$s["l41"].' '.$s["p41"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=41&name='.$_GET['name'].'">41</a></td>';}}	

if($_GET['n']=='42'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=42&v=52&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=42&l=41&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">42</td>
<td align="center"><a href="?n=42&p=43&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=42&d=32&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v42"]!='' or $s["n42"]!='' or $s["l42"]!='' or $s["p42"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=42&name='.$_GET['name'].'">42</a><br>
<font style="font-size:8px;">'.$s["v42"].' '.$s["n42"].' '.$s["l42"].' '.$s["p42"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=42&name='.$_GET['name'].'">42</a></td>';}}

if($_GET['n']=='43'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=43&v=53&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=43&l=42&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">43</td>
<td align="center"><a href="?n=43&p=44&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=43&d=33&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v43"]!='' or $s["n43"]!='' or $s["l43"]!='' or $s["p43"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=43&name='.$_GET['name'].'">43</a><br>
<font style="font-size:8px;">'.$s["v43"].' '.$s["n43"].' '.$s["l43"].' '.$s["p43"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=43&name='.$_GET['name'].'">43</a></td>';}}	

if($_GET['n']=='44'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=44&v=54&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=44&l=43&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">44</td>
<td align="center"><a href="?n=44&p=45&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=44&d=34&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v44"]!='' or $s["n44"]!='' or $s["l44"]!='' or $s["p44"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=44&name='.$_GET['name'].'">44</a><br>
<font style="font-size:8px;">'.$s["v44"].' '.$s["n44"].' '.$s["l44"].' '.$s["p44"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=44&name='.$_GET['name'].'">44</a></td>';}}

if($_GET['n']=='45'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=45&v=55&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=45&l=44&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">45</td>
<td align="center"><a href="?n=45&p=46&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=45&d=35&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v45"]!='' or $s["n45"]!='' or $s["l45"]!='' or $s["p45"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=45&name='.$_GET['name'].'">45</a><br>
<font style="font-size:8px;">'.$s["v45"].' '.$s["n45"].' '.$s["l45"].' '.$s["p45"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=45&name='.$_GET['name'].'">45</a></td>';}}	

if($_GET['n']=='46'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=46&v=56&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=46&l=45&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">46</td>
<td align="center"><a href="?n=46&p=47&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=46&d=36&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v46"]!='' or $s["n46"]!='' or $s["l46"]!='' or $s["p46"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=46&name='.$_GET['name'].'">46</a><br>
<font style="font-size:8px;">'.$s["v46"].' '.$s["n46"].' '.$s["l46"].' '.$s["p46"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=46&name='.$_GET['name'].'">46</a></td>';}}

if($_GET['n']=='47'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=47&v=57&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=47&l=46&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">47</td>
<td align="center"><a href="?n=47&p=48&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=47&d=37&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v47"]!='' or $s["n47"]!='' or $s["l47"]!='' or $s["p47"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=47&name='.$_GET['name'].'">47</a><br>
<font style="font-size:8px;">'.$s["v47"].' '.$s["n47"].' '.$s["l47"].' '.$s["p47"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=47&name='.$_GET['name'].'">47</a></td>';}}

if($_GET['n']=='48'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=48&v=58&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=48&l=47&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">48</td>
<td align="center"><a href="?n=48&p=49&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=48&d=38&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v48"]!='' or $s["n48"]!='' or $s["l48"]!='' or $s["p48"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=48&name='.$_GET['name'].'">48</a><br>
<font style="font-size:8px;">'.$s["v48"].' '.$s["n48"].' '.$s["l48"].' '.$s["p48"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=48&name='.$_GET['name'].'">48</a></td>';}}

if($_GET['n']=='49'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=49&v=59&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=49&l=48&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">49</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=49&d=39&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v49"]!='' or $s["n49"]!='' or $s["l49"]!='' or $s["p49"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=49&name='.$_GET['name'].'">49</a><br>
<font style="font-size:8px;">'.$s["v49"].' '.$s["n49"].' '.$s["l49"].' '.$s["p49"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=49&name='.$_GET['name'].'">49</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='31'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=31&v=41&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">31</td>
<td align="center"><a href="?n=31&p=32&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=31&d=21&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v31"]!='' or $s["n31"]!='' or $s["l31"]!='' or $s["p31"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=31&name='.$_GET['name'].'">31</a><br>
<font style="font-size:8px;">'.$s["v31"].' '.$s["n31"].' '.$s["l31"].' '.$s["p31"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=31&name='.$_GET['name'].'">31</a></td>';}}	

if($_GET['n']=='32'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=32&v=42&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=32&l=31&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">32</td>
<td align="center"><a href="?n=32&p=33&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=32&d=22&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v32"]!='' or $s["n32"]!='' or $s["l32"]!='' or $s["p32"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=32&name='.$_GET['name'].'">32</a><br>
<font style="font-size:8px;">'.$s["v32"].' '.$s["n32"].' '.$s["l32"].' '.$s["p32"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=32&name='.$_GET['name'].'">32</a></td>';}}

if($_GET['n']=='33'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=33&v=43&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=33&l=32&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">33</td>
<td align="center"><a href="?n=33&p=34&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=33&d=23&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v33"]!='' or $s["n33"]!='' or $s["l33"]!='' or $s["p33"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=33&name='.$_GET['name'].'">33</a><br>
<font style="font-size:8px;">'.$s["v33"].' '.$s["n33"].' '.$s["l33"].' '.$s["p33"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=33&name='.$_GET['name'].'">33</a></td>';}}	

if($_GET['n']=='34'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=34&v=44&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=34&l=33&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">34</td>
<td align="center"><a href="?n=34&p=35&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=34&d=24&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v34"]!='' or $s["n34"]!='' or $s["l34"]!='' or $s["p34"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=34&name='.$_GET['name'].'">34</a><br>
<font style="font-size:8px;">'.$s["v34"].' '.$s["n34"].' '.$s["l34"].' '.$s["p34"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=34&name='.$_GET['name'].'">34</a></td>';}}

if($_GET['n']=='35'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=35&v=45&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=35&l=34&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">35</td>
<td align="center"><a href="?n=35&p=36&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=35&d=25&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v35"]!='' or $s["n35"]!='' or $s["l35"]!='' or $s["p35"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=35&name='.$_GET['name'].'">35</a><br>
<font style="font-size:8px;">'.$s["v35"].' '.$s["n35"].' '.$s["l35"].' '.$s["p35"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=35&name='.$_GET['name'].'">35</a></td>';}}	

if($_GET['n']=='36'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=36&v=46&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=36&l=35&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">36</td>
<td align="center"><a href="?n=36&p=37&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=36&d=26&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v36"]!='' or $s["n36"]!='' or $s["l36"]!='' or $s["p36"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=36&name='.$_GET['name'].'">36</a><br>
<font style="font-size:8px;">'.$s["v36"].' '.$s["n36"].' '.$s["l36"].' '.$s["p36"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=36&name='.$_GET['name'].'">36</a></td>';}}

if($_GET['n']=='37'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=37&v=47&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=37&l=36&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">37</td>
<td align="center"><a href="?n=37&p=38&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=37&d=27&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v37"]!='' or $s["n37"]!='' or $s["l37"]!='' or $s["p37"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=37&name='.$_GET['name'].'">37</a><br>
<font style="font-size:8px;">'.$s["v37"].' '.$s["n37"].' '.$s["l37"].' '.$s["p37"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=37&name='.$_GET['name'].'">37</a></td>';}}

if($_GET['n']=='38'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=38&v=48&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=38&l=37&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">38</td>
<td align="center"><a href="?n=38&p=39&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=38&d=28&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v38"]!='' or $s["n38"]!='' or $s["l38"]!='' or $s["p38"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=38&name='.$_GET['name'].'">38</a><br>
<font style="font-size:8px;">'.$s["v38"].' '.$s["n38"].' '.$s["l38"].' '.$s["p38"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=38&name='.$_GET['name'].'">38</a></td>';}}

if($_GET['n']=='39'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=39&v=49&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=39&l=38&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">39</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=39&d=29&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v39"]!='' or $s["n39"]!='' or $s["l39"]!='' or $s["p39"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=39&name='.$_GET['name'].'">39</a><br>
<font style="font-size:8px;">'.$s["v39"].' '.$s["n39"].' '.$s["l39"].' '.$s["p39"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=39&name='.$_GET['name'].'">39</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='21'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=21&v=31&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">21</td>
<td align="center"><a href="?n=21&p=22&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=21&d=11&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v21"]!='' or $s["n21"]!='' or $s["l21"]!='' or $s["p21"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=21&name='.$_GET['name'].'">21</a><br>
<font style="font-size:8px;">'.$s["v21"].' '.$s["n21"].' '.$s["l21"].' '.$s["p21"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=21&name='.$_GET['name'].'">21</a></td>';}}	

if($_GET['n']=='22'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=22&v=32&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=22&l=21&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">22</td>
<td align="center"><a href="?n=22&p=23&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=22&d=12&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v22"]!='' or $s["n22"]!='' or $s["l22"]!='' or $s["p22"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=22&name='.$_GET['name'].'">22</a><br>
<font style="font-size:8px;">'.$s["v22"].' '.$s["n22"].' '.$s["l22"].' '.$s["p22"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=22&name='.$_GET['name'].'">22</a></td>';}}

if($_GET['n']=='23'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=23&v=33&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=23&l=22&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">23</td>
<td align="center"><a href="?n=23&p=24&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=23&d=13&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v23"]!='' or $s["n23"]!='' or $s["l23"]!='' or $s["p23"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=23&name='.$_GET['name'].'">23</a><br>
<font style="font-size:8px;">'.$s["v23"].' '.$s["n23"].' '.$s["l23"].' '.$s["p23"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=23&name='.$_GET['name'].'">23</a></td>';}}	

if($_GET['n']=='24'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=24&v=34&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=24&l=23&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">24</td>
<td align="center"><a href="?n=24&p=25&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=24&d=14&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v24"]!='' or $s["n24"]!='' or $s["l24"]!='' or $s["p24"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=24&name='.$_GET['name'].'">24</a><br>
<font style="font-size:8px;">'.$s["v24"].' '.$s["n24"].' '.$s["l24"].' '.$s["p24"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=24&name='.$_GET['name'].'">24</a></td>';}}

if($_GET['n']=='25'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=25&v=35&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=25&l=24&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">25</td>
<td align="center"><a href="?n=25&p=26&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=25&d=15&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v25"]!='' or $s["n25"]!='' or $s["l25"]!='' or $s["p25"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=25&name='.$_GET['name'].'">25</a><br>
<font style="font-size:8px;">'.$s["v25"].' '.$s["n25"].' '.$s["l25"].' '.$s["p25"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=25&name='.$_GET['name'].'">25</a></td>';}}	

if($_GET['n']=='26'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=26&v=36&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=26&l=25&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">26</td>
<td align="center"><a href="?n=26&p=27&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=26&d=16&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v26"]!='' or $s["n26"]!='' or $s["l26"]!='' or $s["p26"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=26&name='.$_GET['name'].'">26</a><br>
<font style="font-size:8px;">'.$s["v26"].' '.$s["n26"].' '.$s["l26"].' '.$s["p26"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=26&name='.$_GET['name'].'">26</a></td>';}}

if($_GET['n']=='27'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=27&v=37&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=27&l=26&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">27</td>
<td align="center"><a href="?n=27&p=28&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=17&d=17&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v27"]!='' or $s["n27"]!='' or $s["l27"]!='' or $s["p27"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=27&name='.$_GET['name'].'">27</a><br>
<font style="font-size:8px;">'.$s["v27"].' '.$s["n27"].' '.$s["l27"].' '.$s["p27"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=27&name='.$_GET['name'].'">27</a></td>';}}

if($_GET['n']=='28'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=28&v=38&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=28&l=27&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">28</td>
<td align="center"><a href="?n=28&p=29&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=28&d=18&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v28"]!='' or $s["n28"]!='' or $s["l28"]!='' or $s["p28"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=28&name='.$_GET['name'].'">28</a><br>
<font style="font-size:8px;">'.$s["v28"].' '.$s["n28"].' '.$s["l28"].' '.$s["p28"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=28&name='.$_GET['name'].'">28</a></td>';}}

if($_GET['n']=='29'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=29&v=39&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=29&l=28&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">29</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=29&d=19&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v29"]!='' or $s["n29"]!='' or $s["l29"]!='' or $s["p29"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=29&name='.$_GET['name'].'">29</a><br>
<font style="font-size:8px;">'.$s["v29"].' '.$s["n29"].' '.$s["l29"].' '.$s["p29"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=29&name='.$_GET['name'].'">29</a></td>';}}
?>
  </tr>
  <tr>
<?
if($_GET['n']=='11'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=11&v=21&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">11</td>
<td align="center"><a href="?n=11&p=12&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=11&d=1&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v11"]!='' or $s["n11"]!='' or $s["l11"]!='' or $s["p11"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=11&name='.$_GET['name'].'">11</a><br>
<font style="font-size:8px;">'.$s["v11"].' '.$s["n11"].' '.$s["l11"].' '.$s["p11"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=11&name='.$_GET['name'].'">11</a></td>';}}	

if($_GET['n']=='12'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=12&v=22&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=12&l=11&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">12</td>
<td align="center"><a href="?n=12&p=13&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=12&d=2&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v12"]!='' or $s["n12"]!='' or $s["l12"]!='' or $s["p12"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=12&name='.$_GET['name'].'">12</a><br>
<font style="font-size:8px;">'.$s["v12"].' '.$s["n12"].' '.$s["l12"].' '.$s["p12"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=12&name='.$_GET['name'].'">12</a></td>';}}

if($_GET['n']=='13'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=13&v=23&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=13&l=12&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">13</td>
<td align="center"><a href="?n=13&p=14&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=13&d=3&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v13"]!='' or $s["n13"]!='' or $s["l13"]!='' or $s["p13"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=13&name='.$_GET['name'].'">13</a><br>
<font style="font-size:8px;">'.$s["v13"].' '.$s["n13"].' '.$s["l13"].' '.$s["p13"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=13&name='.$_GET['name'].'">13</a></td>';}}	

if($_GET['n']=='14'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=14&v=24&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=14&l=13&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">14</td>
<td align="center"><a href="?n=14&p=15&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=14&d=4&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v14"]!='' or $s["n14"]!='' or $s["l14"]!='' or $s["p14"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=14&name='.$_GET['name'].'">14</a><br>
<font style="font-size:8px;">'.$s["v14"].' '.$s["n14"].' '.$s["l14"].' '.$s["p14"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=14&name='.$_GET['name'].'">14</a></td>';}}

if($_GET['n']=='15'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=15&v=25&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=15&l=14&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">15</td>
<td align="center"><a href="?n=15&p=16&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=15&d=5&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v15"]!='' or $s["n15"]!='' or $s["l15"]!='' or $s["p15"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=15&name='.$_GET['name'].'">15</a><br>
<font style="font-size:8px;">'.$s["v15"].' '.$s["n15"].' '.$s["l15"].' '.$s["p15"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=15&name='.$_GET['name'].'">15</a></td>';}}	

if($_GET['n']=='16'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=16&v=26&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=16&l=15&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">16</td>
<td align="center"><a href="?n=16&p=17&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=16&d=6&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v16"]!='' or $s["n16"]!='' or $s["l16"]!='' or $s["p16"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=16&name='.$_GET['name'].'">16</a><br>
<font style="font-size:8px;">'.$s["v16"].' '.$s["n16"].' '.$s["l16"].' '.$s["p16"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=16&name='.$_GET['name'].'">16</a></td>';}}

if($_GET['n']=='17'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=17&v=27&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=17&l=16&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">17</td>
<td align="center"><a href="?n=17&p=18&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=17&d=7&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v17"]!='' or $s["n17"]!='' or $s["l17"]!='' or $s["p17"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=17&name='.$_GET['name'].'">17</a><br>
<font style="font-size:8px;">'.$s["v17"].' '.$s["n17"].' '.$s["l17"].' '.$s["p17"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=17&name='.$_GET['name'].'">17</a></td>';}}

if($_GET['n']=='18'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=18&v=28&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=18&l=17&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">18</td>
<td align="center"><a href="?n=18&p=19&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=18&d=8&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v18"]!='' or $s["n18"]!='' or $s["l18"]!='' or $s["p18"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=18&name='.$_GET['name'].'">18</a><br>
<font style="font-size:8px;">'.$s["v18"].' '.$s["n18"].' '.$s["l18"].' '.$s["p18"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=18&name='.$_GET['name'].'">18</a></td>';}}

if($_GET['n']=='19'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=19&v=29&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=19&l=18&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">19</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"><a href="?n=19&d=9&name='.$_GET['name'].'"><img src="labirint3/1/n1.gif" border="0"></a></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v19"]!='' or $s["n19"]!='' or $s["l19"]!='' or $s["p19"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=19&name='.$_GET['name'].'">19</a><br>
<font style="font-size:8px;">'.$s["v19"].' '.$s["n19"].' '.$s["l19"].' '.$s["p19"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=19&name='.$_GET['name'].'">19</a></td>';}}
?>
 </tr>
  <tr>
 <?  
if($_GET['n']=='1'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=1&v=11&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"></td>
<td align="center">01</td>
<td align="center"><a href="?n=1&p=2&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v1"]!='' or $s["n1"]!='' or $s["l1"]!='' or $s["p1"]!=''){

print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=1&name='.$_GET['name'].'">01</a><br>
<font style="font-size:8px;">'.$s["v1"].' '.$s["n1"].' '.$s["l1"].' '.$s["p1"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=1&name='.$_GET['name'].'">01</a></td>';}}	

if($_GET['n']=='2'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=2&v=12&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=2&l=1&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">02</td>
<td align="center"><a href="?n=2&p=3&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>'; 
}else{if($s["v2"]!='' or $s["n2"]!='' or $s["l2"]!='' or $s["p2"]!=''){

print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=2&name='.$_GET['name'].'">02</a><br>
<font style="font-size:8px;">'.$s["v2"].' '.$s["n2"].' '.$s["l2"].' '.$s["p2"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=2&name='.$_GET['name'].'">02</a></td>';}}	

if($_GET['n']=='3'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=3&v=13&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=3&l=2&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">03</td>
<td align="center"><a href="?n=3&p=4&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v3"]!='' or $s["n3"]!='' or $s["l3"]!='' or $s["p3"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=3&name='.$_GET['name'].'">03</a><br>
<font style="font-size:8px;">'.$s["v3"].' '.$s["n3"].' '.$s["l3"].' '.$s["p3"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=3&name='.$_GET['name'].'">03</a></td>';}}		

if($_GET['n']=='4'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=4&v=14&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=4&l=3&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">04</td>
<td align="center"><a href="?n=4&p=5&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v4"]!='' or $s["n4"]!='' or $s["l4"]!='' or $s["p4"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=4&name='.$_GET['name'].'">04</a><br>
<font style="font-size:8px;">'.$s["v4"].' '.$s["n4"].' '.$s["l4"].' '.$s["p4"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=4&name='.$_GET['name'].'">04</a></td>';}}	

if($_GET['n']=='5'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=5&v=15&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=5&l=4&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">05</td>
<td align="center"><a href="?n=5&p=6&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v5"]!='' or $s["n5"]!='' or $s["l5"]!='' or $s["p5"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=5&name='.$_GET['name'].'">05</a><br>
<font style="font-size:8px;">'.$s["v5"].' '.$s["n5"].' '.$s["l5"].' '.$s["p5"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=5&name='.$_GET['name'].'">05</a></td>';}}

if($_GET['n']=='06'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=6&v=16&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=6&l=5&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">06</td>
<td align="center"><a href="?n=6&p=7&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v6"]!='' or $s["n6"]!='' or $s["l6"]!='' or $s["p6"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=6&name='.$_GET['name'].'">06</a><br>
<font style="font-size:8px;">'.$s["v6"].' '.$s["n6"].' '.$s["l6"].' '.$s["p6"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=6&name='.$_GET['name'].'">06</a></td>';}}

if($_GET['n']=='7'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=7&v=17&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=7&l=6&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">07</td>
<td align="center"><a href="?n=7&p=8&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v7"]!='' or $s["n7"]!='' or $s["l7"]!='' or $s["p7"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=7&name='.$_GET['name'].'">07</a><br>
<font style="font-size:8px;">'.$s["v7"].' '.$s["n7"].' '.$s["l7"].' '.$s["p7"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=7&name='.$_GET['name'].'">07</a></td>';}}

if($_GET['n']=='8'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=8&v=18&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=8&l=7&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">08</td>
<td align="center"><a href="?n=8&p=9&name='.$_GET['name'].'"><img src="labirint3/1/r1.gif" border="0"></a></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v8"]!='' or $s["n8"]!='' or $s["l8"]!='' or $s["p8"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=8&name='.$_GET['name'].'">08</a><br>
<font style="font-size:8px;">'.$s["v8"].' '.$s["n8"].' '.$s["l8"].' '.$s["p8"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=8&name='.$_GET['name'].'">08</a></td>';}}

if($_GET['n']=='9'){
print'<td height="50" width="50" align="center" bgcolor="#FF0000">
<table width="50" height="50" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td>
<td align="center"><a href="?n=9&v=19&name='.$_GET['name'].'"><img src="labirint3/1/v1.gif" border="0"></a></td>
<td>&nbsp;</td></tr><tr>
<td align="center"><a href="?n=9&l=8&name='.$_GET['name'].'"><img src="labirint3/1/l1.gif" border="0"></a></td>
<td align="center">09</td>
<td align="center"></td>
</tr><tr><td>&nbsp;</td>
<td align="center"></td>
<td>&nbsp;</td></tr></table>
</td>';
}else{if($s["v9"]!='' or $s["n9"]!='' or $s["l9"]!='' or $s["p9"]!=''){
print'<td height="50" width="50" align="center" bgcolor="#0066FF"><a href="?n=9&name='.$_GET['name'].'">09</a><br>
<font style="font-size:8px;">'.$s["v9"].' '.$s["n9"].' '.$s["l9"].' '.$s["p9"].'</font></td>';
}else{print'<td height="50" width="50" align="center"><a href="?n=9&name='.$_GET['name'].'">09</a></td>';}}
?>
  </tr>
</table>
<?
if($_GET['v']){
if($s["n".$_GET['v'].""]!=''){$Up = db_query("UPDATE podzem2 SET `v".db_escape_string($_GET['n'])."`='',`n".db_escape_string($_GET['v'])."`='' WHERE name='".db_escape_string($_GET['name'])."'");}
else{$Up = db_query("UPDATE podzem2 SET `v".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['v'])."',`n".db_escape_string($_GET['v'])."`='".db_escape_string($_GET['n'])."' WHERE name='".db_escape_string($_GET['name'])."'");}
print "<script>location.href='?n=".$_GET['v']."&name=".$_GET['name']."'</script>";
}
if($_GET['d']){
if($s["v".$_GET['d'].""]!=''){$Up = db_query("UPDATE podzem2 SET `n".db_escape_string($_GET['n'])."`='',`v".db_escape_string($_GET['v'])."`='' WHERE name='".db_escape_string($_GET['name'])."'");}
else{$Up = db_query("UPDATE podzem2 SET `n".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['d'])."',`v".db_escape_string($_GET['d'])."`='".db_escape_string($_GET['n'])."' WHERE name='".db_escape_string($_GET['name'])."'");}
print "<script>location.href='?n=".$_GET['n']."&name=".$_GET['name']."'</script>";
}
if($_GET['p']){
if($s["l".$_GET['p'].""]==''){$Up = db_query("UPDATE podzem2 SET `p".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['p'])."',`l".db_escape_string($_GET['p'])."`='".db_escape_string($_GET['n'])."' WHERE name='".db_escape_string($_GET['name'])."'");}
else{$Up = db_query("UPDATE podzem2 SET `p".db_escape_string($_GET['n'])."`='',`l".db_escape_string($_GET['p'])."`='' WHERE name='".db_escape_string($_GET['name'])."'");}
print "<script>location.href='?n=".$_GET['p']."&name=".$_GET['name']."'</script>";
}
if($_GET['l']){
if($s["p".$_GET['l'].""]==''){$Up = db_query("UPDATE podzem2 SET `l".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['l'])."',`p".db_escape_string($_GET['l'])."`='".db_escape_string($_GET['n'])."' WHERE name='".db_escape_string($_GET['name'])."'");}
else{$Up = db_query("UPDATE podzem2 SET `l".db_escape_string($_GET['n'])."`='',`p".db_escape_string($_GET['l'])."`='' WHERE name='".db_escape_string($_GET['name'])."'");}
print "<script>location.href='?n=".$_GET['l']."&name=".$_GET['name']."'</script>";
}

?>
</td>
<td>
<table width="450" height="500" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50">&nbsp;</td>
    <td width="400" align="center" valign="top">
<?
print'<form action="" method="get">
<select style="background-color:#996633; font-size:12px;" size="1" name="botd">
  <option  value="36">Рубака Глубин</option>
  <option  value="37">Надзиратель Глубин</option>
  <option  value="38">Литейщик</option>
  <option  value="39">Служитель Глубин</option>
  <option  value="40">Служитель Бездны</option>
  
    <option  value="36.37">Рубака Глубин и Надзиратель Глубин</option>
   <option  value="36.36">Рубака Глубин2</option>
  <option  value="37.37">Надзиратель Глубин2</option>
  <option  value="38.38">Литейщик2</option>
  <option  value="39.39">Служитель Глубин2</option>
  <option  value="40.40">Служитель Бездны2</option>
  
   <option  value="36.36.36">Рубака Глубин3</option>
  <option  value="37.37.37">Надзиратель Глубин3</option>
  <option  value="38.38.38">Литейщик3</option>
  <option  value="39.39.39">Служитель Глубин3</option>
  <option  value="40.40.40">Служитель Бездны3</option>

  
</select>
<input name="n" type="hidden" value="'.$_GET['n'].'" />
<input name="nas" type="hidden" value="'.$_GET['name'].'" />
&nbsp;<input style="background-color:#996633; font-size:12px;" name="sozdat" type="submit" value="Поставить">
&nbsp;<input style="background-color:#996633; font-size:12px;" name="delite" type="submit" value="Убрать">
</form>';

if($_GET['open']){print"<font>Вы добавили бота на клетку ".$_GET['n']."</font>";}

if($_GET['w']==1){print"<font>Вы добавили бота на клетку ".$_GET['n']."</font>";}
if($_GET['w']==2){print"<font>Вы удалили бота с клетки ".$_GET['n']."</font>";}

if($_GET['sozdat']){
db_query("UPDATE podzem3 SET `n".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['botd'])."' WHERE glava='default' and name='".db_escape_string($_GET['nas'])."'");
db_query("UPDATE podzem3 SET `n".db_escape_string($_GET['n'])."`='".db_escape_string($_GET['botd'])."' WHERE glava='Adversary' and name='".db_escape_string($_GET['nas'])."'");
print "<script>location.href='?n=".$_GET['n']."&w=1&name=".$_GET['nas']."'</script>";
exit();
}
if($_GET['delite']){
db_query("UPDATE podzem3 SET `n".db_escape_string($_GET['n'])."`='' WHERE glava='default' and name='".db_escape_string($_GET['name'])."'");
print "<script>location.href='?n=".$_GET['n']."&w=2&name=".$_GET['name']."'</script>";
exit();
}



?>
	</td>
  </tr>
</table>

</td>
</tr></table>
<?
//}
?>