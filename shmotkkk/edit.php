<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['align']==2.5)  {


if(!$_GET['log']){ ?>

<form method=GET action="edit.php?log=<?=$_GET['log']?>">
<b>�������� ����������</b>
<table>

<tr><td>����� </td><td><input type=text name=log value=''> </td></tr>

</table>
<INPUT TYPE="submit" value=" ������������� ">
</form>
<? }else{
$users = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".$_GET['log']."' LIMIT 1;"));
?>
<form method=post ENCTYPE="multipart/form-data">
<b>�������� ����������</b>
<table>


<tr><td>����� </td><td><input type=text name=login value='<?=$users['login']?>'> </td></tr>
<tr><td>���� </td><td><input type=text name=sila value='<?=$users['sila']?>'> </td></tr>
<tr><td>�������� </td><td><input type=text name=lovk value='<?=$users['lovk']?>'> </td></tr>
<tr><td>�������� </td><td><input type=text name=inta value='<?=$users['inta']?>'> </td></tr>
<tr><td>����� </td><td><input type=text name=vinos value='<?=$users['vinos']?>'> </td></tr>
<tr><td>�������� </td><td><input type=text name=intel value='<?=$users['intel']?>'> </td></tr>
<tr><td>�������� </td><td><input type=text name=mudra value='<?=$users['mudra']?>'> </td></tr>
<tr><td>���������� </td><td><input type=text name=duh value='<?=$users['duh']?>'> </td></tr>

<tr><td>�� </td><td><input type=text name=money value='<?=$users['money']?>'> </td></tr>
<tr><td>��� </td><td><input type=text name=ekr value='<?=$users['ekr']?>'> </td></tr>

<tr><td>����� </td><td><input type=text name=level value='<?=$users['level']?>'> </td></tr>
<tr><td>��� </td><td><input type=text name=exp value='<?=$users['exp']?>'> </td></tr>
<tr><td>���� ��� </td><td><input type=text name=nextup value='<?=$users['nextup']?>'> </td></tr>
<tr><td>������� </td><td><input type=text name=room value='<?=$users['room']?>'> </td></tr>
<tr><td>�������� �� ��� ������� 0 </td><td><input type=text name=battle value='<?=$users['battle']?>'> </td></tr>
<tr><td>������������ �� </td><td><input type=text name=maxhp value='<?=$users['maxhp']?>'> </td></tr>
<tr><td>�� ������ </td><td><input type=text name=hp value='<?=$users['hp']?>'> </td></tr>

</table>
<INPUT TYPE="submit" value=" ��������� ">
</form>

<form method=post ENCTYPE="multipart/form-data">
<b>�������� �������</b>
<table>
<tr><td>����� </td><td><input type=text name=names value='<?=$users['login']?>'> </td></tr>
<tr><td>����� ���������</td><td><input type="file" name="img"> </td></tr>
</table>
<INPUT TYPE="submit" name="soh" value=" ��������� ">
</form>
<?
}


 if ($_POST['login']) {
 
if (mysql_query("UPDATE `users` SET login='".$_POST['login']."',sila='".$_POST['sila']."',lovk='".$_POST['lovk']."',inta='".$_POST['inta']."',vinos='".$_POST['vinos']."',intel='".$_POST['intel']."',mudra='".$_POST['mudra']."',duh='".$_POST['duh']."',money='".$_POST['money']."',ekr='".$_POST['ekr']."',level='".$_POST['level']."',exp='".$_POST['exp']."',nextup='".$_POST['nextup']."',room='".$_POST['room']."',battle='".$_POST['battle']."',maxhp='".$_POST['maxhp']."',hp='".$_POST['hp']."' WHERE login='".$_POST['login']."'")) 	{	
	echo "OK";  
}
else 
{ 
    echo "NO";
}

 }
 
  if ($_POST['soh']) {
 
if (mysql_query("UPDATE `users` SET shadow='".$_FILES['img']['name']."' WHERE login='".$_POST['names']."'")) 	{	
	echo "����� ������ ����������";  
    move_uploaded_file($_FILES['img']['tmp_name'], '/var/www/vhosts/default/htdocs/i/shadow/'.$_FILES['img']['name']."");
}
else 
{ 
    echo "����� �� ����������!";
}

  }
 
}
?>