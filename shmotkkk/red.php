<?
session_start();
include "../connect.php";
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']>2 && ($user['align']<3)) {
?>

<?
if($_POST['save']){
mysql_query("UPDATE `shop` SET `count`='".$_POST['count']."' WHERE `id`='".$_POST['id']."'");
}
$min = $_GET['page']-100;
$b=mysql_query("SELECT * FROM `shop` WHERE `id`>'".$min."' and `id`<'".$_GET['page']."'");
?>


	
<table width="300" border="1" cellspacing="0" cellpadding="0">  
<tr> 	

  
<?
$v=0;
 while($shop=mysql_fetch_array($b)){
$v++;
?>
<td>	
<form action="" method="post">	
<table width="300" height="100" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>
<table width="300" height="100" border="1" cellpadding="0" cellspacing="0">
<tr>
<td width="77" align="center"><img src="/i/sh/<?=$shop['img']?>"/></td>
<td width="217" align="center">
<input name="name" type="text" value="<?=$shop['name']?>"/><br />
<input name="count" type="text" size="10" value="<?=$shop['count']?>" />
<input name="id" type="hidden" value="<?=$shop['id']?>">	
</td>
</tr>
</table>
</td>
</tr>
<tr><td width="217" align="center"><input name="save" type="submit" value="Сохранить" /></td></tr> 
</table>
</form>	
</td>
<?




if($v==3 or $v==6 or $v==9 or $v==12 or $v==15 or $v==18 or $v==21 or $v==24 or $v==27 or $v==30 or $v==33 or $v==36 or $v==39 or $v==42 or $v==45 or $v==48 or $v==51 or $v==54 or $v==57 or $v==60 or $v==63 or $v==66 or $v==69 or $v==72 or $v==75 or $v==78 or $v==81 or $v==84 or $v==87 or $v==90 or $v==93 or $v==96 or $v==99 or $v==102){print"<tr></tr>";}
}
?>	




</tr>
</table>	


	
<?
 for($i=1; $i<21; $i++){
echo'[<a href="red.php?page='.$i.'00">'.($i).'</a>]'; 
 }
 
 }
?>	
	