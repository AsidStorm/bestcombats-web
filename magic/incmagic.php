<?php
if ($_SESSION['uid'] == null) header("Location: index.php");
// magic 
// ����������� �����
if ($user['battle'] > 0) {
	echo "�� � ���...";
} else	{
	if ($user['hp'] >= 0) {
		$int=80 + $user['hp'] - 0;
		if ($int>100){$int=100;}
	}
	else {$int=0;}
	if (rand(1,100) <= $int OR !$_SESSION['scroll']) {		
		if(!$_SESSION['scroll']) {
			$_SESSION['scroll'] = $_POST['target'];
			?><body onload="okno('�������� ��������, � ������� ������������ ������', 'main.php?edit=1&use=<?=$_GET['use']?>','target')"><?			
		} else {			
			$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = '".$_SESSION['scroll']."' AND `owner` = '{$user['id']}' AND `dressed`=0 LIMIT 1;"));
			$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `name` LIKE '{$_POST['target']}' AND `includemagic` = 0 AND `dressed`=0  LIMIT 1;"));
			//echo "SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `name` LIKE '{$_REQUEST['target']}' AND `includemagic` = 0  LIMIT 1;";
			$_SESSION['scroll'] = null;
			if(!$svitok){
				echo "<font color=red><b>� ��� ��� ������ ������!<b></font>";
			}elseif(!$dress OR $dress['type'] >= 12){
				echo "<font color=red><b>� ��� ��� ������ ��������!<b></font>";
			}else {
				$incmagic = mysql_fetch_array(mysql_query('SELECT * FROM `magic` WHERE `id` = \''.$svitok['magic'].'\' LIMIT 1;'));
				if(!$incmagic['img']) {
					echo "<font color=red><b>���� ������ ������ ���������� � ��������!<b></font>";
				} else {
					// ����������
					destructitem($svitok['id']);
					echo "<font color=red><b>������ \"".$svitok['name']."\" ������ ������� � \"".$dress['name']."\"<b></font>";					
					mysql_query("UPDATE `inventory` SET 
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
	
	
		//$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` LIKE '%�����%' AND `owner` = '{$user['id']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
		//$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = '������� �� ������ +1' AND `owner` = '{$user['id']}' LIMIT 1;"));
		
		
		/*if ($dress && $svitok) {
			if (mysql_query("UPDATE `inventory` SET `sharped` = 1, `name` = CONCAT(`name`,'+1'), `minu` = `minu`+1, `maxu`=`maxu`+1, `cost` = `cost`+6, `ntopor` = `ntopor`+1, `nsila` = `nsila`+1 WHERE `id` = {$dress['id']} LIMIT 1;")) {
				echo "<font color=red><b>������� \"{$_POST['target']}\" ������ ������� +1.<b></font> ";
				$bet=1;
			}
			else {
				echo "<font color=red><b>��������� ������!<b></font>";
			}
		} else {
			echo "<font color=red><b>������������ ��� �������� ��� ������������ ������<b></font>";
		}*/
	} else
	{
		echo "<font color=red><b>C����� ���������� � ����� �����...<b></font>";
		$bet=1;
		$_SESSION['scroll'] = null;
	}
}
?>