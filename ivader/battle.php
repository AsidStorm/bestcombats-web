<?php
		//If ($_SERVER['REMOTE_ADDR']!='176.37.62.46'){die();}

		include "/var/www/rbc/data/www/test.old-bk.ru/connect.php";

?>

<form method=get>
	<fieldset>
		<legend>Бой</legend>
		<table>
			<tr><td colspan=7>Персонаж <input type='text' name='user' value='<?=$_GET['user']?>'><input type=submit value='Добавить ->'></td></tr>
			<tr>
				<td><img src="http://img.combats.com/i/misc/micro/hit.gif"><input size=2 type='text' name='hit' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/krit.gif"><input size=2 type='text' name='krit' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/counter.gif"><input size=2 type='text' name='counter' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/block.gif"><input size=2 type='text' name='block' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/parry.gif"><input size=2 type='text' name='parry' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/hp.gif"><input size=2 type='text' name='hp2' ></td></td>
				<td><img src="http://img.combats.com/i/misc/micro/spirit.gif"><input size=2 type='text' name='spirit' ></td></td>
			</tr>
		</table>
	</fieldset>
</form>

<?
If (isset($_GET['hit']) or isset($_GET['krit']) or isset($_GET['krit']) or isset($_GET['counter']) or isset($_GET['block']) or isset($_GET['parry']) or isset($_GET['hp2']) or isset($_GET['spirit'])){
	mysql_query("UPDATE `users` set 
		`hit`=`hit`+'".$_GET['hit']."',
		`krit`=`krit`+'".$_GET['krit']."',
		`counter`=`counter`+'".$_GET['counter']."',
		`block2`=`block2`+'".$_GET['block2']."',
		`parry`=`parry`+'".$_GET['parry']."',
		`hp2`=`hp2`+'".$_GET['hp2']."',
		`s_duh`=`s_duh`+('".$_GET['s_duh']."'*100) 
		where `login`='".$_GET['user']."' and `battle`>0 ");
	echo "Добавлено!";
}
?>