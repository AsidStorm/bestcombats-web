<?php
//podarokNY.php	
	if ($_SESSION['uid'] == null) header("Location: index.php");
if((int)date("n")!=0){
	$data=mysql_fetch_array(mysql_query("SELECT * FROM `users` where id='".$_SESSION['uid']."'"));

	$rrr=mt_rand(1,3);
	($rrr==1)?$rstat="gsila":"gsila";
	($rrr==2)?$rstat="glovk":"gsila";
	($rrr==3)?$rstat="ginta":"gsila";

	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ����� ', '25', '1', '0.00', 'spell_godstat_wis.gif', '20', '0', '171', '�����') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������������� ������� 1250MP', '25', '1', '0.00', 'cureMana1250_5.gif', '50', '0', '4', '�����') ;");
        
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '������� ���������', '25', '1', '0.00', 'spell_godstat_intel.gif', '20', '0', '171', '�����') ;");
       
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '���������', '25', '1', '0.00', 'attack.gif', '20', '0', '23', '�����') ;");

    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ���������', '25', '1', '0.00', 'attackb.gif', '10', '0', '45', '�����') ;");
		 
    mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ������� ��������', '188', '1', '0.00', 'pot_base_100_master.gif', '10', '0', '185', '�����') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '����� ����� +6', '25', '1', '0.00', 'spell_powerHPup6.gif', '20', '0', '27', '�����') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '������������ ������', '25', '1', '0.00', 'spell_godprotect10.gif', '10', '0', '208', '�����') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '������������ �������', '25', '1', '0.00', 'spell_godprotect.gif', '10', '0', '208', '�����') ;");
	
	echo "�� ������� ������������� ���������� ������ �����..<br>$got";
	
			destructitem($_GET['use']);
}
else
{
echo "<font color=red><b>��� �� �����...<b></font>";
}

?>