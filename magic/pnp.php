<?php
// ����� �� �������������� (�����)
if($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if($user['zver_id']>0){
 if(!$_POST){$targeted=4;}
	echo "����� ����� ��������� �� 4 �� 20 ��������, � �������� ������ �� ���� �������� ��� ����������� ��������, ����, �������� '_',  '-' � �������. <br>����� �� ����� ���������� ��� ������������� ��������� '_', '-' ��� ��������<br>����� � ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-' � ����� 1 �������, � ����� ����� 3-� ������ ���������� ��������.";
	}else{
	mysql_fetch_array(mysql_query("UPDATE `users` SET `login` = '{$_POST['target']}' WHERE `user_id` = '".$user['id']."'  LIMIT 1;"));
	echo "�� ������� ������������� ������ �����...";
	$bet=1;
	}	
}else{
echo "� ��� ���� �����...";
}

?>