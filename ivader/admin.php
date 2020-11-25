<html>
<head>
	<title>Админ Центр Silver-BK</title>
</head>
<body>

<?
include "../connect.php";

#######################
	echo "<fieldset><legend>Модераторы без 2-ого пароля</legend>";		
	$moder=mysql_query("SELECT login,ip,id,align from users where `align`>1 and `align`<4 and `bot`=0 and `pass2` IS NULL  ");	
	If (mysql_num_rows($moder)==0){
		echo "<i>нету таких...</b>";
	}else{
		while ($moder_w=mysql_fetch_array($moder)){
			echo "<img src='/i/align_".$moder_w['align'].".gif'>".$moder_w['login']."<a href='/inf.php?".$moder_w['id']."' target='_blank'><img src='/i/inf.gif'></a><br/>";
		}
	}
	$count_all=mysql_num_rows(mysql_query("SELECT id from users where  id>100000 "));
	$count_with_pass=mysql_num_rows(mysql_query("SELECT id from users where  id>100000 and pass2 IS NOT NULL "));
	echo "<br/>Всего игроков: ".$count_all;
	echo "<br/>Игроков со вторым паролем: ".$count_with_pass;
	echo "</fieldset>";

#######################
?>

</body>