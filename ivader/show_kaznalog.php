<?php
	include "../connect.php";
?>

<form method=get>
	<fieldset>
		<legend>���� �����</legend>
		<table>
			<tr><td>����</td><td><input type='text' name='klan' value='<?=$_GET['klan']?>'></td><td><input type=submit value='����������'></td></tr>
			<tr><td>��������</td><td><input type='text' name='user' value='<?=$_GET['user']?>'></td><td><input type=submit value='����������'></td></tr>
		</table>
	</fieldset>
</form>

<?

		If (isset($_GET['klan']) and !empty($_GET['klan'])){
			$klanlog = mysql_query("SELECT * FROM `kaznalog` WHERE `klan` = '".$_GET['klan']."' order by date DESC; ");
		}elseif(isset($_GET['user']) and !empty($_GET['user'])){
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".$_GET['user']."' "));
			$klanlog = mysql_query("SELECT * FROM `kaznalog` WHERE `user` = '".$user['id']."' order by date DESC; ");
		}
		
		If (empty($_GET['klan']) and empty($_GET['user'])){
			//echo "�������� �� ������ � ��!";
		}elseIf (empty($klanlog)){
			echo "���� ��� ���� ��������� �� ������� � ��!";
		}else{
			$i=0;
			echo "<table border=1 cellpadding=3 cellspacing=3>";
			echo "<tr><td>�</td><td>����</td><td>�����</td><td>��������</td><td>�����</td><td>����</td></tr>";
			While ($work=mysql_fetch_array($klanlog)){
				$i++;
				$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$work['user']."' "));
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$work['klan']."</td>";
					echo "<td>".$user['login']."[".$user['level']."]<a href='/inf.php?".$user['id']."' target='_blank'><img src='/i/inf.gif'></a></td> ";
					if($work['action']==0){echo "<td align=center><img src=\"/i/kazna_get.gif\" alt=\"������\"></td>";}else{echo "<td align=center><img src=\"/i/kazna_put.gif\" alt=\"�������\"></td>";}
					echo "<td>".$work['sum']." ��.</td>";
					echo "<td>".$work['date']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
?>