<?php
session_start();
if ($_SESSION['uid'] == null) {
header("Location: index.php");
exit;}
include'connect.php';
$user=mysql_fetch_array(mysql_query("SELECT * from users where id='".$_SESSION['uid']."'"));
if(isset($_POST['post_mess'])){
mysql_query("UPDATE `users` set `bloknot`='".$_POST['text']."' WHERE `id`='".$_SESSION['uid']."'");
die("<script>window.location='bloknot.php';</script>");
}
?>
	<HTML><HEAD>
	<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
	<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
	<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
	<meta http-equiv=PRAGMA content=NO-CACHE>
	<META Http-Equiv=Expires Content=0>
	<style>
		.row {
			cursor:pointer;
		}
	</style>
<script type="text/javascript" src="http://img.bestcombats.net/bloknot/js/jquery.js"></script>
<script type="text/javascript" src="http://img.bestcombats.net/bloknot/js/jquery.limit.js"></script>
<script type="text/javascript">			
$(document).ready(function(){				
$('textarea').limit('500','#charsLeft');			
});		
</script> 
	</HEAD>
	<body leftmargin=5 topmargin=5 marginwidth=0 marginheight=0 bgcolor=#e2e0e0><div id=hint3 class=ahint></div>
	<table width=100%>
	<tr><td align=middle width=100%>
		<table>
		<tr><td>
		<BR><fieldset ><legend><b>�������: (<span id="charsLeft"></span>&nbsp;������ ��������.)</b></legend><form  action="?" method="post"><b>��������/������������� ��������� </b> <small>�� ����� 500 ������.</small><br>
<textarea name="text" rows="8" cols="85"><?=$user['bloknot']?></textarea>                     

<br><input type="submit" name="post_mess" value="���������"></form></fieldset>
			</td>
		</tr>
	</table>
			</td>
		</tr>
	</table>