<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']==2.5 OR $user['login']==volter)  {
if ($user['room'] != 35) {$magaz='shop_old';}else{$magaz='berezka';}
?>
<form action="" method="get">
<input name="name" type="text" value="�������� ��������" />
<input name="next" type="submit" value="������" />
</form>
<?
if($_GET['next']){
$sp = mysql_fetch_array(mysql_query("SELECT * FROM `$magaz` WHERE `name` = '".$_GET['name']."' LIMIT 1;"));
if($sp){
if($_GET['es']!=1){
?>
<form method=post action="/shmotkkk/edit_shmot.php?name=<? print"".$sp['name']."";?>&next=1&es=1">
<b>����</b>
<table>

<tr><td>�������� </td><td><input type=text name=name value='<? print"".$sp['name']."";?>'> </td></tr>
<tr><td>�������� </td><td><input type=text name=img value='<? print"".$sp['img']."";?>'> </td></tr>
<tr><td>���������� � �������� </td><td><input type=text name=count value="<? print"".$sp['count']."";?>"></td></tr>
<tr><td>��� �������� 
	</td><td><select name="type">
			<option value="<? print"".$sp['type']."";?>">�������� ����� ����� ����!</option>
			<option value="3">������</option>
			<option value="29">������</option>
			<option value="11">������</option>
			<option value="9">��������</option>
			<option value="4">�����</option>
			<option value="27">�������/�� ��� ��� �����)</option>
			<option value="8">�����</option>
			<option value="10">����</option>
			<option value="1">������</option>
			<option value="28">�����</option>
			<option value="2">��������</option>
			<option value="5">������</option>
			<option value="22">������</option>
			<option value="23">����</option>
			<option value="24">�����</option>
			<option value="25">����������</option>
			<option value="50">���</option>
			<option value="188">��������</option>
	</select> </td></tr>

<tr><td>����� </td><td><input type=text name=massa value="<? print"".$sp['massa']."";?>"> </td></tr>
<tr><td>����� ������������� </td><td><input type=text name=needident value="<? print"".$sp['needident']."";?>"></td></tr>
<tr><td>���������� ������ </td><td><input type=text name=letter value="<? print"".$sp['letter']."";?>"> </td></tr>
<tr><td>����� �������� </td><td><input type=text name=isrep value="<? print"".$sp['isrep']."";?>"> </td></tr>
<tr><td>������ �������� 
	</td><td><select name="razdel">
			<option value="<? print"".$sp['razdel']."";?>">�������� ����� ����� ����</option>
			<option value="1">������: �������,����</option>
			<option value="11">������: ������</option>
			<option value="12">������: ������,������</option>
			<option value="13">������: ����</option>
			<option value="14">������: ���� � ������</option>
			<option value="2">������: ������</option>
			<option value="21">������: ��������</option>
			<option value="29">������: ������</option>
			<option value="22">������: ������ �����</option>
			<option value="23">������: ������� �����</option>
			<option value="24">������: �����</option>
			<option value="25">������: ������</option>
			<option value="26">������: �����</option>
			<option value="27">������: ������</option>
			<option value="28">������: �����</option>
			<option value="3">����</option>
			<option value="4">��������� ������: ������</option>
			<option value="41">��������� ������: ��������</option>
			<option value="42">��������� ������: ������</option>
			<option value="5">����������: �����������</option>
			<option value="51">3���������: ������ � ��������</option>
			<option value="6">��������</option>
			<option value="188">��������</option>
			<option value="7">��������: ��������</option>
			<option value="71">��������: �������</option>
			<option value="50">���</option>
	</select> </td></tr>
<tr><td>������ ������? ������ ��� ������!
	</td><td><select name="second">
	<? if($sp['second']==0){print"<option value='0'>���</option>";}
	else{print"<option value='1'>��</option>";}?>
			<option value="0">���</option>
			<option value="1">��</option>
	</select> </td></tr>

<tr><td>���.�����  </td><td><input type=text name=duration  value="<? print"".$sp['duration']."";?>"></td></tr>
<tr><td>����.�����  </td><td><input type=text name=maxdur  value="<? print"".$sp['maxdur']."";?>"></td></tr>
<tr><td>����  </td><td><input type=text name=cost  value="<? print"".$sp['cost']."";?>"></td></tr>
<tr><td>���� ���. </td><td><input type=text name=ecost  value="<? print"".$sp['ecost']."";?>"></td></tr>
</table>
<b>����������:</b>
<table>
<tr><td>�������  </td><td><input type=text name=nlevel  value="<? print"".$sp['nlevel']."";?>"></td></tr>
<tr><td>����  </td><td><input type=text name=nsila  value="<? print"".$sp['nsila']."";?>"></td></tr>
<tr><td>��������  </td><td><input type=text name=nlovk  value="<? print"".$sp['nlovk']."";?>"></td></tr>
<tr><td>��������  </td><td><input type=text name=ninta  value="<? print"".$sp['ninta']."";?>"></td></tr>
<tr><td>�����  </td><td><input type=text name=nvinos  value="<? print"".$sp['nvinos']."";?>"></td></tr>
<tr><td>��������� </td><td><input type=text name=nintel value="<? print"".$sp['nintel']."";?>"> </td></tr>
<tr><td>��������  </td><td><input type=text name=nmudra  value="<? print"".$sp['nmudra']."";?>"></td></tr>
<tr><td>��.����  </td><td><input type=text name=nnoj  value="<? print"".$sp['nnoj']."";?>"></td></tr>
<tr><td>��.������  </td><td><input type=text name=ntopor  value="<? print"".$sp['ntopor']."";?>"></td></tr>
<tr><td>��.������  </td><td><input type=text name=ndubina  value="<? print"".$sp['ndubina']."";?>"></td></tr>
<tr><td>��.����  </td><td><input type=text name=nmech  value="<? print"".$sp['nmech']."";?>"></td></tr>
<tr><td>����������  </td><td><input type=text name=nalign  value="<? print"".$sp['nalign']."";?>"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=nfire  value="<? print"".$sp['nfire']."";?>"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=nwater  value="<? print"".$sp['nwater']."";?>"></td></tr>
<tr><td>���������� �������  </td><td><input type=text name=nair  value="<? print"".$sp['nair']."";?>"></td></tr>
<tr><td>���������� �����  </td><td><input type=text name=nearth value="<? print"".$sp['nearth']."";?>"> </td></tr>
<tr><td>������� �����  </td><td><input type=text name=nlight  value="<? print"".$sp['nlight']."";?>"></td></tr>
<tr><td>����� �����  </td><td><input type=text name=ngray  value="<? print"".$sp['ngray']."";?>"></td></tr>
<tr><td>������ �����  </td><td><input type=text name=ndark  value="<? print"".$sp['ndark']."";?>"></td></tr>
</table>
<b>���� ���������</b>
<table>
<tr><td>���.���� </td><td><input type=text name=minu  value="<? print"".$sp['minu']."";?>"></td></tr>
<tr><td>����.���� </td><td><input type=text name=maxu  value="<? print"".$sp['maxu']."";?>"></td></tr>
<tr><td>���� </td><td><input type=text name=gsila  value="<? print"".$sp['gsila']."";?>"></td></tr>
<tr><td>�������� </td><td><input type=text name=glovk  value="<? print"".$sp['glovk']."";?>"></td></tr>
<tr><td>������� </td><td><input type=text name=ginta  value="<? print"".$sp['ginta']."";?>"></td></tr>
<tr><td>��������� </td><td><input type=text name=gintel  value="<? print"".$sp['gintel']."";?>"></td></tr>
<tr><td>�� </td><td><input type=text name=ghp  value="<? print"".$sp['ghp']."";?>"></td></tr>
<tr><td>���� </td><td><input type=text name=gmana  value="<? print"".$sp['gmana']."";?>"></td></tr>
<tr><td>��.���� </td><td><input type=text name=mfkrit  value="<? print"".$sp['mfkrit']."";?>"></td></tr>
<tr><td>��.�������� </td><td><input type=text name=mfakrit  value="<? print"".$sp['mfakrit']."";?>"></td></tr>
<tr><td>��.������ </td><td><input type=text name=mfuvorot  value="<? print"".$sp['mfuvorot']."";?>"></td></tr>
<tr><td>��.���������� </td><td><input type=text name=mfauvorot  value="<? print"".$sp['mfauvorot']."";?>"></td></tr>

<tr><td>��.���.���� </td><td><input type=text name=mfkritpow  value="<? print"".$sp['mfkritpow']."";?>"></td></tr>
<!--<tr><td>��.�������.����� </td><td><input type=text name=mfantikritpow  value="<? // print"".$sp['mfantikritpow']."";?>"></td></tr>-->
<!--<tr><td>��.���.����� </td><td><input type=text name=mfudar  value="<? //print"".$sp['mfudar']."";?>"></td></tr>
<tr><td>��.�������.����� </td><td><input type=text name=mfantiudar  value="<? //print"".$sp['mfantiudar']."";?>"></td></tr>-->
<tr><td>��.��������� </td><td><input type=text name=mfcontr  value="<? print"".$sp['mfcontr']."";?>"></td></tr>
<tr><td>��.����������� </td><td><input type=text name=mfparir  value="<? print"".$sp['mfparir']."";?>"></td></tr>
<tr><td>��.����� ����� </td><td><input type=text name=myshieldblock  value="<? print"".$sp['mfshieldblock']."";?>"></td></tr>
<tr><td>�������� ����� ������ </td><td><input type=text name=mfmagp  value="<? print"".$sp['mfmagp']."";?>"></td></tr>

<tr><td>��.���� </td><td><input type=text name=gnoj  value="<? print"".$sp['gnoj']."";?>"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gtopor  value="<? print"".$sp['gtopor']."";?>"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gdubina  value="<? print"".$sp['gdubina']."";?>"></td></tr>
<tr><td>��.���� </td><td><input type=text name=gmech   value="<? print"".$sp['gmech']."";?>"></td></tr>
<tr><td>����� ������ </td><td><input type=text name=bron1  value="<? print"".$sp['bron1']."";?>"></td></tr>
<tr><td>����� ����� </td><td><input type=text name=bron2  value="<? print"".$sp['bron2']."";?>"></td></tr>
<tr><td>����� ������ </td><td><input type=text name=bron3  value="<? print"".$sp['bron3']."";?>"></td></tr>
<!--<tr><td>����� ����� </td><td><input type=text name=bron4  value="<? //print"".$sp['bron4']."";?>"></td></tr>-->
<tr><td>����� ��� </td><td><input type=text name=bron4  value="<? print"".$sp['bron4']."";?>"></td></tr>
<tr><td>������ �� ����� </td><td><input type=text name=mfdhit  value="<? print"".$sp['mfdhit']."";?>"></td></tr>
<tr><td>������ �� ����� </td><td><input type=text name=mfdmag  value="<? print"".$sp['mfdmag']."";?>"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gfire  value="<? print"".$sp['gfire']."";?>"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gwater  value="<? print"".$sp['gwater']."";?>"></td></tr>
<tr><td>���������� ������� </td><td><input type=text name=gair  value="<? print"".$sp['gair']."";?>"></td></tr>
<tr><td>���������� ����� </td><td><input type=text name=gearth  value="<? print"".$sp['gearth']."";?>"></td></tr>
<tr><td>������� ����� </td><td><input type=text name=glight  value="<? print"".$sp['glight']."";?>"></td></tr>
<tr><td>����� ����� </td><td><input type=text name=ggray  value="<? print"".$sp['ggray']."";?>"></td></tr>
<tr><td>������ ����� </td><td><input type=text name=gdark  value="<? print"".$sp['gdark']."";?>"></td></tr>
<!--<tr><td>������� </td><td><input type=text name=sitost  value="<? //print"".$sp['sitost']."";?>"></td></tr>-->
<tr><td>��������� �������� ID</td><td><input type=text name=magic  value="<? print"".$sp['magic']."";?>"></td></tr>
<!--<tr><td>+ �� ��� ������ </td><td><input type=text name=plus_hp  value="<? //print"".$sp['plus_hp']."";?>"></td></tr>
<tr><td>+ ���� ��� ������ </td><td><input type=text name=plus_mana  value="<? //print"".$sp['plus_mana']."";?>"></td></tr>
<tr><td>+ ���� ��� �������� </td><td><input type=text name=plus_opit  value="<? //print"".$sp['plus_opit']."";?>"></td></tr>-->
<tr><td>���� �������� � ���. </td><td><input type=text name=godenm  value="<? print"".$sp['godenm']."";?>"></td></tr>
<!--<tr><td>����������������� �������� �����: </td><td><input type=text name=timem  value="<? //print"".$sp['timem']."";?>"></td></tr>-->
<tr><td>���.�����</td><td>
<tr><td>������� ����</td><td>
			<select name="k_kach">
			<option value="<? print"".$sp['k_kach']."";?>"><? print"".$sp['k_kach']."";?></option>
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>������� ����</td><td>
			<select name="r_kach">
			<option value="<? print"".$sp['r_kach']."";?>"><? print"".$sp['r_kach']."";?></option>
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>�������� ����</td><td>
			<select name="d_kach">
			<option value="<? print"".$sp['d_kach']."";?>"><? print"".$sp['d_kach']."";?></option>
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>������� ����</td><td>
			<select name="z_kach">
			<option value="<? print"".$sp['z_kach']."";?>"><? print"".$sp['z_kach']."";?></option>
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>�������� �������� �����</td><td><input type=text name=mfkol  value="<? print"".$sp['mfkol']."";?>"></td></tr>
<tr><td>�������� �������� �����</td><td><input type=text name=mfrub  value="<? print"".$sp['mfrub']."";?>"></td></tr>
<tr><td>�������� ��������� �����</td><td><input type=text name=mfdrob  value="<? print"".$sp['mfdrob']."";?>"></td></tr>
<tr><td>�������� �������� �����</td><td><input type=text name=mfrej  value="<? print"".$sp['mfrej']."";?>"></td></tr>

<input name="names" type="hidden" value="<? print"".$sp['name']."";?>" />
</table>
<INPUT name="sav" TYPE="submit" value=" ��������� ">
<INPUT name="dels" TYPE="submit" value=" ������� ">
</form>

<?
}
if ($_POST['name'] and $_POST['sav']) {

mysql_query("UPDATE `$magaz` SET name='".$_POST['name']."',duration='".$_POST['duration']."',maxdur='".$_POST['maxdur']."',cost='".$_POST['cost']."',ecost='".$_POST['ecost']."',nlevel='".$_POST['nlevel']."',nsila='".$_POST['nsila']."',nlovk='".$_POST['nlovk']."',ninta='".$_POST['ninta']."',nvinos='".$_POST['nvinos']."',nintel='".$_POST['nintel']."',nmudra='".$_POST['nmudra']."',nnoj='".$_POST['nnoj']."',ntopor='".$_POST['ntopor']."',ndubina='".$_POST['ndubina']."',nmech='".$_POST['nmech']."',nalign='".$_POST['nalign']."',minu='".$_POST['minu']."',maxu='".$_POST['maxu']."',gsila='".$_POST['gsila']."',glovk='".$_POST['glovk']."',ginta='".$_POST['ginta']."',gintel='".$_POST['gintel']."',ghp='".$_POST['ghp']."',mfkrit='".$_POST['mfkrit']."',mfakrit='".$_POST['mfakrit']."',mfuvorot='".$_POST['mfuvorot']."',mfauvorot='".$_POST['mfauvorot']."',gnoj='".$_POST['gnoj']."',gtopor='".$_POST['gtopor']."',gdubina='".$_POST['gdubina']."',gmech='".$_POST['gmech']."',img='".$_POST['img']."',count='".$_POST['count']."',bron1='".$_POST['bron1']."',bron2='".$_POST['bron2']."',bron3='".$_POST['bron3']."',bron4='".$_POST['bron4']."',bron5='".$_POST['bron5']."',magic='".$_POST['magic']."',type='".$_POST['type']."',massa='".$_POST['massa']."',needident='".$_POST['needident']."',nfire='".$_POST['nfire']."',nwater='".$_POST['nwater']."',nair='".$_POST['nair']."',nearth='".$_POST['nearth']."',nlight='".$_POST['nlight']."',ngray='".$_POST['ngray']."',ndark='".$_POST['ndark']."',gfire='".$_POST['gfire']."',gwater='".$_POST['gwater']."',gair='".$_POST['gair']."',gearth='".$_POST['gearth']."',glight='".$_POST['glight']."',ggray='".$_POST['ggray']."',gdark='".$_POST['gdark']."',letter='".$_POST['letter']."',isrep='".$_POST['isrep']."',razdel='".$_POST['razdel']."',mfkritpow='".$_POST['mfkritpow']."',mfcontr='".$_POST['mfcontr']."',second='".$_POST['second']."',godenm='".$_POST['godenm']."',mfdhit='".$_POST['mfdhit']."',mfshieldblock='".$_POST['mfshieldblock']."',k_kach='".$_POST['k_kach']."',r_kach='".$_POST['r_kach']."',d_kach='".$_POST['d_kach']."',z_kach='".$_POST['z_kach']."',mfdmag='".$_POST['mfdmag']."',mfparir='".$_POST['mfparir']."',mfmagp='".$_POST['mfmagp']."',mfkol='".$_POST['mfkol']."',mfrub='".$_POST['mfrub']."',mfdrob='".$_POST['mfdrob']."',mfrej='".$_POST['mfrej']."',gmana='".$_POST['gmana']."' WHERE `name` = '".$_POST['names']."'");
	


echo "C�������� ���� '".$_POST['name']."'.";
exit();
 
 }
if($_POST['dels']){
mysql_query("DELETE FROM $magaz WHERE `name` = '".$_POST['names']."'");
echo "������� ���� '".$_POST['name']."'.";
exit();
}
 }else{print"����� ���� �� ����������!";}
//////////////////////////////
}
}
?>