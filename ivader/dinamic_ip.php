<?php
		

		include "../connect.php";

?>

<form method=get>
	<fieldset>
		<legend>��������</legend>
		<table>
			<tr><td>�����</td><td><input type='text' name='login' value='<?=$_GET['login']?>'></td><td><input type=submit value='����������'></td></tr>
			<tr><td>ID</td><td><input type='text' name='id' value='<?=$_GET['id']?>'></td><td><input type=submit value='����������'></td></tr>
		</table>
	</fieldset>
</form>

<?
		If (isset($_GET['id']) and !empty($_GET['id'])){
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_GET['id']."' LIMIT 1;"));
		}elseif(isset($_GET['login']) and !empty($_GET['login'])){
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".$_GET['login']."' LIMIT 1;"));
		}
		
		If (empty($_GET['id']) and empty($_GET['login'])){
			//echo "�������� �� ������ � ��!";
		}elseIf (empty($user)){
			echo "�������� �� ������ � ��!";
		}else{
			$ip=explode('.',$user['ip']);

			
			$ip_users= mysql_query("SELECT * from `users` where `ip` like '".$ip[0].".".$ip[1]."%' and `id`<>'".$user['ip']."' ");
			
			
			
			While ($users_mult=mysql_fetch_array($ip_users)){
				echo  $users_mult['login'].' '.$users_mult['ip'].'<br>';
			}
			
		}
?>