<?php
if ($_SESSION['uid'] == null) header("Location: index.php");
// magic 
// встраивание магии
if ($user['battle'] > 0) {
	echo "Не в бою...";
} else	{
	if ($user['hp'] >= 0) {
		$int=80 + $user['hp'] - 0;
		if ($int>100){$int=100;}
	}
	else {$int=0;}
	if (rand(1,100) <= $int OR !$_SESSION['scroll']) {		
		if(!$_SESSION['scroll']) {
			$_SESSION['scroll'] = $_POST['target'];
			?><body onload="okno('Название предмета, в который встраивается свиток', 'main.php?edit=1&use=<?=$_GET['use']?>','target')"><?			
		} else {			
			$svitok = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `name` = '".$_SESSION['scroll']."' AND `owner` = '{$user['id']}' AND `dressed`=0 LIMIT 1;"));
			$dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `name` LIKE '{$_POST['target']}' AND `includemagic` = 0 AND `dressed`=0  LIMIT 1;"));
			//echo "SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `name` LIKE '{$_REQUEST['target']}' AND `includemagic` = 0  LIMIT 1;";
			$_SESSION['scroll'] = null;
			if(!$svitok){
				echo "<font color=red><b>У вас нет такого свитка!<b></font>";
			}elseif(!$dress OR $dress['type'] >= 12){
				echo "<font color=red><b>У вас нет такого предмета!<b></font>";
			}else {
				$incmagic = mysqli_fetch_array(db_query('SELECT * FROM `magic` WHERE `id` = \''.$svitok['magic'].'\' LIMIT 1;'));
				if(!$incmagic['img']) {
					echo "<font color=red><b>Этот свиток нельзя встраивать в предметы!<b></font>";
				} else {
					// встраиваем
					destructitem($svitok['id']);
					echo "<font color=red><b>Свиток \"".$svitok['name']."\" удачно встроен в \"".$dress['name']."\"<b></font>";					
					db_query("UPDATE `inventory` SET 
						".($dress['nintel']<$svitok['nintel']?"`nintel`='".$svitok['nintel']."',":"")."
						".($dress['nlevel']<$svitok['nlevel']?"`nlevel`='".$svitok['nlevel']."',":"")."
						".($dress['nmudra']<$svitok['nmudra']?"`nmudra`='".$svitok['nmudra']."',":"")."
						".($dress['ngray']<$svitok['ngray']?"`ngray`='".$svitok['ngray']."',":"")."
						".($dress['ndark']<$svitok['ndark']?"`ndark`='".$svitok['ndark']."',":"")."
						".($dress['nlight']<$svitok['nlight']?"`nlevel`='".$svitok['nlight']."',":"")."						
						`massa`=`massa`+1,`cost`=`cost`+'".$svitok['cost']."', `includemagic` = '".$svitok['magic']."', `includemagicdex` = '".$svitok['maxdur']."', `includemagicmax` = '".$svitok['maxdur']."', `includemagicname` = '".$svitok['name']."', `includemagicuses` = '100+".$user['intel']."', `includemagiccost` = '".($svitok['cost']/2)."' WHERE `id` = '{$dress['id']}' LIMIT 1;");	
					$bet=1;
				}
			}
		}
	
	
		//$dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `name` LIKE '%Топор%' AND `owner` = '{$user['id']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
		//$svitok = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `name` = 'Заточка на топоры +1' AND `owner` = '{$user['id']}' LIMIT 1;"));
		
		
		/*if ($dress && $svitok) {
			if (db_query("UPDATE `inventory` SET `sharped` = 1, `name` = CONCAT(`name`,'+1'), `minu` = `minu`+1, `maxu`=`maxu`+1, `cost` = `cost`+6, `ntopor` = `ntopor`+1, `nsila` = `nsila`+1 WHERE `id` = {$dress['id']} LIMIT 1;")) {
				echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно заточен +1.<b></font> ";
				$bet=1;
			}
			else {
				echo "<font color=red><b>Произошла ошибка!<b></font>";
			}
		} else {
			echo "<font color=red><b>Неправильное имя предмета или неправильный свиток<b></font>";
		}*/
	} else
	{
		echo "<font color=red><b>Cвиток рассыпался в ваших руках...<b></font>";
		$bet=1;
		$_SESSION['scroll'] = null;
	}
}
?>