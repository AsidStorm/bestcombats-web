<?php
//podarokNY.php	
	if ($_SESSION['uid'] == null) header("Location: index.php");
if((int)date("n")!=0){
	$data=mysql_fetch_array(mysql_query("SELECT * FROM `users` where id='".$_SESSION['uid']."'"));

	$rrr=mt_rand(1,3);
	($rrr==1)?$rstat="gsila":"gsila";
	($rrr==2)?$rstat="glovk":"gsila";
	($rrr==3)?$rstat="ginta":"gsila";

	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Сила Великана', '25', '1', '0.00', 'spell_godstat_str.gif', '20', '0', '171', 'Дилер') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Восстановление энергии 1500HP', '25', '1', '0.00', 'cureHP1500_100.gif', '50', '0', '9', 'Дилер') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Скорость Змеи', '25', '1', '0.00', 'spell_godstat_dex.gif', '20', '0', '171', 'Дилер') ;");
        
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Предвидение', '25', '1', '0.00', 'spell_godstat_inst.gif', '20', '0', '171', 'Дилер') ;");
       
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Нападение', '25', '1', '0.00', 'attack.gif', '20', '0', '23', 'Дилер') ;");

    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Кровавое нападение', '25', '1', '0.00', 'attackb.gif', '10', '0', '45', 'Дилер') ;");
		 
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Снадобье Забытых Мастеров', '188', '1', '0.00', 'pot_base_100_master.gif', '10', '0', '185', 'Дилер') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Жажда жизни +6', '25', '1', '0.00', 'spell_powerHPup6.gif', '20', '0', '27', 'Дилер') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Неуязвимость Оружию', '25', '1', '0.00', 'spell_godprotect10.gif', '10', '0', '208', 'Дилер') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', 'Неуязвимость Стихиям', '25', '1', '0.00', 'spell_godprotect.gif', '10', '0', '208', 'Дилер') ;");
	
	echo "Вы вскрыли Коллекционный Воинский Сундук Металла..<br>$got";
	
			destructitem($_GET['use']);
}
else
{
echo "<font color=red><b>Еще не время...<b></font>";
}

?>