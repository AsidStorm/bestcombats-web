<?php
include "../connect.php";
?>

<form method=get>
	<fieldset>
		<legend>���� ���</legend>
		<table>
			<tr><td>ID</td><td><input type='text' name='id' value='<?=$_GET['id']?>'></td><td><input type=submit value='����������'></td></tr>
		</table>
	</fieldset>
</form>

<?
$battle=mysql_fetch_array(mysql_query("SELECT * from `battle` where `id`='".$_GET['id']."' "));

If (!empty($battle)){
	$t1=explode(';',$battle['t1']);
	echo "������ �������:<br/>";
	for ($i=0;$i<count($t1);$i++){
		If ($t2[$i]>=10000000){
			$bot=mysql_fetch_array(mysql_query("SELECT * from `bots` where `id`='".$t1[$i]."'  "));
			$user=mysql_fetch_array(mysql_query("SELECT `login` from `users` where `id`='".$bot['prototype']."' "));
		}else{
			$user=mysql_fetch_array(mysql_query("SELECT `login` from `users` where `id`='".$t1[$i]."' "));
		}
		echo '&bull; '.(!empty($user['login'])?$user['login'].' - '.$t1[$i]:'<i>�������� �� ������</i>').'<br/>';
	}
	
	
	$t2=explode(';',$battle['t2']);
	echo "<br/>������ �������:<br/>";
	for ($i=0;$i<count($t2);$i++){
		If ($t2[$i]>=10000000){
			$bot=mysql_fetch_array(mysql_query("SELECT * from `bots` where `id`='".$t2[$i]."'  "));
			$user=mysql_fetch_array(mysql_query("SELECT `login` from `users` where `id`='".$bot['prototype']."' "));
		}else{
			$user=mysql_fetch_array(mysql_query("SELECT `login` from `users` where `id`='".$t2[$i]."' "));
		}
		echo '&bull; '.(!empty($user['login'])?$user['login'].' - '.$t2[$i]:'<i>�������� �� ������</i>').'<br/>';
	}
	
	
	echo "<br/>";
	$damage=explode('{',$battle['damage']);
	$damage[1]=substr($damage[1],0,-1);
	$damage=explode(';',$damage[1]);
	for ($i=0;$i<count($damage);$i++){
		echo $damage[$i].' '; $i++;
		echo $damage[$i].'<br/>';
	}
	
	
	echo "<br/>";
	$exp=explode('{',$battle['exp']);
	$exp[1]=substr($exp[1],0,-1);
	$exp=explode(';',$exp[1]);
	for ($i=0;$i<count($exp);$i++){
		echo $exp[$i].' '; $i++;
		echo $exp[$i].'<br/>';
	}	
	
}
?>