<?php
//podarokNY.php	
	if ($_SESSION['uid'] == null) header("Location: index.php");
if((int)date("n")!=0){
	$data=mysql_fetch_array(mysql_query("SELECT * FROM `users` where id='".$_SESSION['uid']."'"));

	$rrr=mt_rand(1,3);
	($rrr==1)?$rstat="gsila":"gsila";
	($rrr==2)?$rstat="glovk":"gsila";
	($rrr==3)?$rstat="ginta":"gsila";
$letter="���������, <b>".$data['login']."</b>!

������ ��� �������� ���� .

������� ���� ������������ !
<i>� �������� ��������� � ���, ������������� �������.</i>";
	
	
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ����� ', '25', '1', '0.00', 'spell_godstat_wis.gif', '1', '0', '171', '�������������') ;");
	
	mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������������� ������� 1500HP', '25', '1', '0.00', 'cureHP1500_100.gif', '5', '0', '9', '�������������') ;");
	
        mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ����', '25', '1', '0.00', 'spell_godstat_dex.gif', '1', '0', '171', '�������������') ;");
        
        mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '������� ���������', '25', '1', '0.00', 'spell_godstat_intel.gif', '1', '0', '171', '�������������') ;");
       
        mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '���������', '25', '1', '0.00', 'attack.gif', '5', '0', '23', '�������������') ;");

         mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`magic`,`present`)VALUES('".$_SESSION['uid']."', '�������� ���������', '25', '1', '0.00', 'attackb.gif', '2', '0', '45', '�������������') ;");
		 
		 mysql_query("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`letter`,`present`,`gift`)VALUES('".$_SESSION['uid']."', '�������� � ���� ��������!', '200', '1', '0.00', 'cards_dr.gif', '1', '".$letter."', '�������������', '1') ;");
	
	
	echo "�� ������� ������� �� �������������..<br>$got";
	
			destructitem($_GET['use']);
}
else
{
echo "<font color=red><b>��� �� �����...<b></font>";
}

?>