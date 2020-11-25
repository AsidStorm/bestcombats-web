<?php
	include "../connect.php";
?>

<form method=get>
	<fieldset>
		<legend>логи Казны</legend>
		<table>
			<tr><td>Клан</td><td><input type='text' name='klan' value='<?=$_GET['klan']?>'></td><td><input type=submit value='посмотреть'></td></tr>
			<tr><td>Персонаж</td><td><input type='text' name='user' value='<?=$_GET['user']?>'></td><td><input type=submit value='посмотреть'></td></tr>
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
			//echo "Персонаж не найден в БД!";
		}elseIf (empty($klanlog)){
			echo "Клан или логи персонажа не найдены в БД!";
		}else{
			$i=0;
			echo "<table border=1 cellpadding=3 cellspacing=3>";
			echo "<tr><td>№</td><td>Клан</td><td>Логин</td><td>Действие</td><td>Сумма</td><td>Дата</td></tr>";
			While ($work=mysql_fetch_array($klanlog)){
				$i++;
				$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$work['user']."' "));
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$work['klan']."</td>";
					echo "<td>".$user['login']."[".$user['level']."]<a href='/inf.php?".$user['id']."' target='_blank'><img src='/i/inf.gif'></a></td> ";
					if($work['action']==0){echo "<td align=center><img src=\"/i/kazna_get.gif\" alt=\"забрал\"></td>";}else{echo "<td align=center><img src=\"/i/kazna_put.gif\" alt=\"положил\"></td>";}
					echo "<td>".$work['sum']." кр.</td>";
					echo "<td>".$work['date']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
?>