<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".db_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "../functions.php";
	if ($user['radiodj']!=1) header("Location: /index.php");
	
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 >
<table align=right><tr><td><INPUT TYPE="button" onclick="location.href='../main.php';" value="Вернуться" title="Вернуться"></td></tr></table>
<h3>Панель Радио DJ!</h3>


<h4>Системное сообщение</h4>

<div id=adm_act>
<div style='float:left;'>Отправить системное сообщение в чат</div>
<div style='float:left; margin-left:10px;'>
<input name='sysmsg' id='sysmsg' size=100> 
<input type="button" OnClick=" document.getElementById('action').value='sysmsg'; document.getElementById('msg').value=document.getElementById('sysmsg').value; document.actform.submit(); " value="Отправить">

</div>
<form method=POST name='actform'>
<input type=hidden name='action' id='action'>
<input type=hidden name='msg' id='msg'>
</form>
</div>
<br><br clear="all"><hr>
<?
if ($_POST['action']!="") {
switch ($_POST['action']) {			
case "sysmsg":
systemmsg('<font color=\"#CB0000\"><b>Внимание!</b> '.($_POST['msg']).' (с Ув. <img src=<?=IMG_PATH?>/radio/radiodj.png></a><b>DJ '.$user["login"].'</b>)</font>');
break;
}
}
?>
</body>
</html>
