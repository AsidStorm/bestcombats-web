<?
include "../connect.php";

$effects=mysql_query("SELECT * from `effects` where `time`>'".(time()+12*60*60)."' and `name`<>'�������������' and `name`<>'������� �����' and `name`<>'�������� ��������� ��������' and `name`<>'���������' and `name`<>'�������� �����' and `name`<>'�������� �������������' and `type`<>11 and `type`<>12 and `type`<>13 and `type`<>14 and `name`<>'�������� �� ����������' and `name`<>'�������� ��������' and `name`<>'����������� ��������' ORDER by `time` DESC;");
$i=0;

echo "<table border=1 cellpadding=3 cellspacing=3>";
while ($effects_w=mysql_fetch_array($effects)){
	
	$user=mysql_fetch_array(mysql_query("SELECT `login`,`room` from `users` where `id`='".$effects_w['owner']."' "));
	$obshaga=mysql_fetch_array(mysql_query("SELECT * from `obshaga` where `pers`='".$effects_w['owner']."' "));
	If (empty($obshaga)){
		$obshaga['sleep']=0;
	}
	
	If ($obshaga['sleep']==0 and $user['room']<>101 and $user['room']<>102 and $user['room']<>103 and $user['room']<>104){
		$i++;
		echo "<tr><td>".$i.'</td><td>'.$effects_w['name']."</td><td>".$effects_w['type']."</td><td>".$user['login']."</td><td>".(floor(($effects_w['time']-time())/60))." �����</td><td>".$obshaga['sleep']."</td><td>".$user['room']."</td></tr>";
		mysql_query("UPDATE `effects` SET `time`='".(time()+60*1)."' where `id`='".$effects_w['id']."'  LIMIT 1;");
	}
}
echo $i;
echo "</table>";
?>