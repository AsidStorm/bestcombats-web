<?php
//podarokNY.php	
	if ($_SESSION['uid'] == null) header("Location: index.php");
if((int)date("n")!=0){
	$data=mysqli_fetch_array(db_query("SELECT * FROM `users` where id='".$_SESSION['uid']."'"));

	$rrr=mt_rand(1,3);
	($rrr==1)?$rstat="gsila":"gsila";
	($rrr==2)?$rstat="glovk":"gsila";
	($rrr==3)?$rstat="ginta":"gsila";
$letter="Уважаемый, <b>".$data['login']."</b>!

Желаем вам приятной игры .

Примите наши поздравления !
<i>С глубоким уважением к Вам, Администрация проекта.</i>";
	
	
	
	db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Сила Великана', '25', '1', '0.00', 'spell_godstat_str.gif', '1', '0', '171', 'Администрация') ;");
	
	db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Восстановление энергии 1500HP', '25', '1', '0.00', 'cureHP1500_100.gif', '5', '0', '9', 'Администрация') ;");
	
        db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Скорость Змеи', '25', '1', '0.00', 'spell_godstat_dex.gif', '1', '0', '171', 'Администрация') ;");
        
        db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Предвидение', '25', '1', '0.00', 'spell_godstat_inst.gif', '1', '0', '171', 'Администрация') ;");
       
        db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Нападение', '25', '1', '0.00', 'attack.gif', '5', '0', '23', 'Администрация') ;");

         db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Кровавое нападение', '25', '1', '0.00', 'attackb.gif', '3', '0', '45', 'Администрация') ;");
		 
		 db_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`letter`,`present`,`gift`)VALUES('".$_SESSION['uid']."', 'Открытка С Днем Рожденья!', '200', '1', '0.00', 'cards_dr.gif', '1', '".$letter."', 'Администрация', '1') ;");
	
	
	echo "Вы вскрыли подарок от Администрации..<br>$got";
	
			destructitem($_GET['use']);
}
else
{
echo "<font color=red><b>Еще не время...<b></font>";
}

?>