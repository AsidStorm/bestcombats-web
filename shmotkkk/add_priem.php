<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']==2.5)  {

?>
<form method=post action="add_priem.php">
<b>������</b>
<table>

<tr><td>�������� </td><td><input type=text name=name value=''> </td></tr>
<tr><td>�������� </td><td><input type=text name=priem value=''> </td></tr>
<tr><td>��� ������ 
	</td><td><select name="type">
			<option value="0"></option>
			<option value="1">������ �����</option>
			<option value="2">������ ������</option>
			<option value="3">������ �����������</option>
			<option value="4">������ ����������� ������</option>
			<option value="5">������ �����������</option>
			<option value="6">�����-������</option>
			<option value="7">������ �����</option>
			<option value="8">������ ������</option>
			<option value="9">������ ���� ����</option>
			<option value="10">���������� ����</option>
			<option value="11">���������� ����</option>
			<option value="12">���������� �������</option>
			<option value="13">���������� �����</option>
			<option value="14">���������� ����� �����</option>
			<option value="15">���������� ����� �����</option>
			<option value="16">���������� ����� ����</option>
	</select> </td></tr>
</table>
<b>����������:</b>
<table>
<tr><td>�������  </td><td><input type=text name=minlevel  value="0"></td></tr>
<tr><td>����  </td><td><input type=text name=need_sil  value="0"></td></tr>
<tr><td>������������  </td><td><input type=text name=need_vyn  value="0"></td></tr>
<tr><td>��������� </td><td><input type=text name=intel value="0"> </td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/hit.gif></td><td><input type=text name=n_hit  value="0"></td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/krit.gif></td><td><input type=text name=n_krit  value="0"></td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/counter.gif></td><td><input type=text name=n_counter  value="0"></td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/block.gif></td><td><input type=text name=n_block  value="0"></td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/parry.gif></td><td><input type=text name=n_parry  value="0"></td></tr>
<tr><td><img src=http://img.combats.com/i/misc/micro/hp.gif></td><td><input type=text name=n_hp  value="0"></td></tr>
<tr><td>���� ����  </td><td><input type=text name=sduh  value="0"></td></tr>
<tr><td>��������  </td><td><input type=text name=wait  value="0"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=m_magic1  value="0"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=m_magic2  value="0"></td></tr>
<tr><td>���������� �������  </td><td><input type=text name=m_magic3  value="0"></td></tr>
<tr><td>���������� �����  </td><td><input type=text name=m_magic4 value="0"> </td></tr>
<tr><td>������� �����  </td><td><input type=text name=m_magic5  value="0"></td></tr>
<tr><td>����� �����  </td><td><input type=text name=m_magic6  value="0"></td></tr>
<tr><td>������ �����  </td><td><input type=text name=m_magic7  value="0"></td></tr>
<tr><td>������ ����  </td><td><input type=text name=mana  value="0"></td></tr>
<tr><td>���� ������ ���  </td><td><input type=text name=hod  value="0"></td></tr>
<tr><td>�������� </td><td><textarea name=opisan value=''> </textarea></td></tr>
</table>
<INPUT TYPE="submit" value=" �������� ����� ">
</form>

<?

 if ($_POST['name']) {
	if (mysql_query("insert into priem (name,opisan,type,priem,n_block,n_hit,n_hp,n_krit,n_counter,n_parry,minlevel,wait,sduh,intel,m_magic1,m_magic2,m_magic3,m_magic4,m_magic5,m_magic6,m_magic7,need_sil,need_vyn,hod,mana) values ('".$_POST['name']."','".$_POST['opisan']."','".$_POST['type']."','".$_POST['priem']."','".$_POST['n_block']."','".$_POST['n_hit']."','".$_POST['n_hp']."','".$_POST['n_krit']."','".$_POST['n_counter']."','".$_POST['n_parry']."','".$_POST['minlevel']."','".$_POST['wait']."','".$_POST['sduh']."','".$_POST['intel']."','".$_POST['m_magic1']."','".$_POST['m_magic2']."','".$_POST['m_magic3']."','".$_POST['m_magic4']."','".$_POST['m_magic5']."','".$_POST['m_magic6']."','".$_POST['m_magic7']."','".$_POST['need_sil']."','".$_POST['need_vyn']."','".$_POST['hod']."','".$_POST['mana']."');")) 	{	echo "OK";	}
else { echo "NO";}
 
 }
}
?>