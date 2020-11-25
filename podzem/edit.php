<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['login']=="Реализатор") {

?>
<table width="100%" border="1" cellspacing="0" cellpadding="0"><tr>
<td align="left" valign="top">
<table width="700" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300" align="left" valign="top">
<?
$nec = db_query("SELECT * FROM podzem2");
while($sc = mysqli_fetch_array($nec)){
print"<a href='edit_podzem.php?name=".$sc['name']."'>".$sc['name']."</a><br />";

}
?>	
	
	</td>
    <td width="400" align="left" valign="top">
	
<form action="" method="get">
<? if(!$_GET['new']){ ?>
<input name="new" type="submit" value="Создать новую" />
<?
if($_GET['new']){
print "<script>location.href='main.php?act=none'</script>";
exit;}
if($_GET['news']){
$SQL2 = db_query("INSERT INTO podzem2(name) VALUES('".$_GET['name']."')");
print "<script>location.href='edit.php'</script>";
exit;}

 }else{ ?>
<input style="font-size:12px;" name="name" type="text" size="10" value="Название" />
<input name="news" type="submit" value="Создать" />
<?
 } ?>

	</td>
  </tr>
</table>

</td>
</tr></table>
<?
}
?>