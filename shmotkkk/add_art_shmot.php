<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']==2.5 OR $user['login']==Jackpot)  {

?>
<form method=post ENCTYPE="multipart/form-data">
<b>������� ��������</b>
<table>


<tr><td>�������� </td><td><input type=text name=name value=''> </td></tr>
<tr><td>�������� </td><td><input type=text name=img value=''> </td></tr>
<tr><td>�������� </td><td><input type=text name=artefact value="0"></td></tr>
<tr><td>������ ������� </td><td><input type=text name=destiny value="1"></td></tr>
<tr><td>���������� � �������� </td><td><input type=text name=count value="10000"></td></tr>
<tr><td>��� �������� 
	</td><td><select name="type">
			<option value="0"></option>
			<option value="3">������</option>
			<option value="11">������</option>
			<option value="27">������</option>
			<option value="9">��������</option>
			<option value="4">�����</option>
			<option value="30">�����</option>
			<option value="8">�����</option>
			<option value="22">������</option>
			<option value="23">�����</option>
			<option value="24">������</option>
			<option value="28">�����</option>
			<option value="10">����</option>
			<option value="1">������</option>
			<option value="2">��������</option>
			<option value="5">������</option>
			<option value="25">���������� ��� �����</option>
			<option value="200">������(�������)</option>
	</select> </td></tr>

<tr><td>����� </td><td><input type=text name=massa value="1"> </td></tr>
<tr><td>����� ������������� </td><td><input type=text name=needident value="0"></td></tr>
<tr><td>���������� ������ </td><td><input type=text name=letter value="0"> </td></tr>
<tr><td>����� �������� </td><td><input type=text name=isrep value="1"> </td></tr>
<tr><td>����� ��... </td><td><input type=text name=dategoden value="0"> </td></tr>
<tr><td>������ �������� 
	</td><td><select name="razdel">
			<option value="0"></option>
			<option value="1">������: �������,����</option>
			<option value="11">������: ������</option>
			<option value="12">������: ������,������</option>
			<option value="13">������: ����</option>
			<option value="15">������: ������</option>
			<option value="2">������: ������</option>
			<option value="21">������: ��������</option>
			<option value="29">������: ������</option>
			<option value="22">������: ������ �����</option>
			<option value="23">������: ������� �����</option>
			<option value="24">������: �����</option>
			<option value="25">������: ������</option>
			<option value="26">������: �����</option>
			<option value="27">������: ������</option>
			<option value="231">������: �����</option>
			<option value="3">����</option>
			<option value="4">��������� ������: ������</option>
			<option value="41">��������� ������: ��������</option>
			<option value="42">��������� ������: ������</option>
			<option value="5">����������: �����������</option>
			<option value="51">3���������: ������ � ��������</option>
			<option value="6">��������</option>
			<option value="7">��������: ��������</option>
			<option value="71">��������: �������</option>
			<option value="555">����</option>
			<option value="111">����� �������</option>
			<option value="222">����� ����</option>
			<option value="333">����� �����</option>
			<option value="444">����� �����</option>
	</select> </td></tr>
<tr><td>������ ������? ������ ��� ������!
	</td><td><select name="second">
			<option value="0">���</option>
			<option value="1">��</option>
	</select> </td></tr>
<tr><td>��������� ������? ������ ��� ������!
	</td><td><select name="dvur">
			<option value="0">���</option>
			<option value="1">��</option>
	</select> </td></tr>
<tr><td>���.�����  </td><td><input type=text name=duration  value="0"></td></tr>
<tr><td>����.�����  </td><td><input type=text name=maxdur  value="1"></td></tr>
<tr><td>���� ��� </td><td><input type=text name=ecost  value="0"></td></tr>
</table>
<b>����������:</b>
<table>
<tr><td>�������  </td><td><input type=text name=nlevel  value="7"></td></tr>
<tr><td>����  </td><td><input type=text name=nsila  value="0"></td></tr>
<tr><td>��������  </td><td><input type=text name=nlovk  value="0"></td></tr>
<tr><td>��������  </td><td><input type=text name=ninta  value="0"></td></tr>
<tr><td>�����  </td><td><input type=text name=nvinos  value="0"></td></tr>
<tr><td>��������� </td><td><input type=text name=nintel value="0"> </td></tr>
<tr><td>��������  </td><td><input type=text name=nmudra  value="0"></td></tr>
<tr><td>��.����  </td><td><input type=text name=nnoj  value="0"></td></tr>
<tr><td>��.������  </td><td><input type=text name=ntopor  value="0"></td></tr>
<tr><td>��.������  </td><td><input type=text name=ndubina  value="0"></td></tr>
<tr><td>��.����  </td><td><input type=text name=nmech  value="0"></td></tr>
<tr><td>��.������  </td><td><input type=text name=nposoh  value="0"></td></tr>
<tr><td>����������  </td><td><input type=text name=nalign  value="0"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=nfire  value="0"></td></tr>
<tr><td>���������� ����  </td><td><input type=text name=nwater  value="0"></td></tr>
<tr><td>���������� �������  </td><td><input type=text name=nair  value="0"></td></tr>
<tr><td>���������� �����  </td><td><input type=text name=nearth value="0"> </td></tr>
<tr><td>������� �����  </td><td><input type=text name=nlight  value="0"></td></tr>
<tr><td>����� �����  </td><td><input type=text name=ngray  value="0"></td></tr>
<tr><td>������ �����  </td><td><input type=text name=ndark  value="0"></td></tr>
</table>
<b>���� ���������</b>
<table>
<tr><td>���.���� </td><td><input type=text name=minu  value="0"></td></tr>
<tr><td>����.���� </td><td><input type=text name=maxu  value="0"></td></tr>
<tr><td>���� </td><td><input type=text name=gsila  value="0"></td></tr>
<tr><td>�������� </td><td><input type=text name=glovk  value="0"></td></tr>
<tr><td>������� </td><td><input type=text name=ginta  value="0"></td></tr>
<tr><td>��������� </td><td><input type=text name=gintel  value="0"></td></tr>
<tr><td>�� </td><td><input type=text name=ghp  value="0"></td></tr>
<tr><td>���� </td><td><input type=text name=gmana  value="0"></td></tr>
<tr><td>��.���� </td><td><input type=text name=mfkrit  value="0"></td></tr>
<tr><td>��.�������� </td><td><input type=text name=mfakrit  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=mfuvorot  value="0"></td></tr>
<tr><td>��.���������� </td><td><input type=text name=mfauvorot  value="0"></td></tr>
<tr><td>��. �������� ����� </td><td><input type=text name=mfkritpow  value="0"></td></tr>
<tr><td>��. ������ ���. ����� </td><td><input type=text name=mfantikritpow  value="0"></td></tr>
<tr><td>��. ���. ������ </td><td><input type=text name=mfmagp  value="0"></td></tr>

<tr><td>������ �� ����� </td><td><input type=text name=mfdmag  value="0"></td></tr>
<tr><td>������ �� ����� </td><td><input type=text name=mfdhit  value="0"></td></tr>
<tr><td>��.������� </td><td><input type=text name=mfcontr  value="0"></td></tr>
<tr><td>��.����� </td><td><input type=text name=mfparir  value="0"></td></tr>
<tr><td>��. ����� ����� </td><td><input type=text name=mfshieldblock  value="0"></td></tr>

<tr><td>�������� �������� �����</td><td><input type=text name=mfkol  value="0"></td></tr>
<tr><td>�������� �������� �����</td><td><input type=text name=mfrub  value="0"></td></tr>
<tr><td>�������� ��������� �����</td><td><input type=text name=mfdrob  value="0"></td></tr>
<tr><td>�������� �������� �����</td><td><input type=text name=mfrej  value="0"></td></tr>

<tr><td>��.���� </td><td><input type=text name=gnoj  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gtopor  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gdubina  value="0"></td></tr>
<tr><td>��.���� </td><td><input type=text name=gmech   value="0"></td></tr>
<tr><td>��.������  </td><td><input type=text name=gposoh  value="0"></td></tr>
<tr><td>����� ������ ���. </td><td><input type=text name=bron11  value="0"></td></tr>
<tr><td>����� ������ ����. </td><td><input type=text name=bron1  value="0"></td></tr>
<tr><td>����� ������� ���. </td><td><input type=text name=bron22  value="0"></td></tr>
<tr><td>����� ������� ����. </td><td><input type=text name=bron2  value="0"></td></tr>
<tr><td>����� ����� ���. </td><td><input type=text name=bron33  value="0"></td></tr>
<tr><td>����� ����� ����. </td><td><input type=text name=bron3  value="0"></td></tr>
<tr><td>����� ��� ���. </td><td><input type=text name=bron44  value="0"></td></tr>
<tr><td>����� ��� ����. </td><td><input type=text name=bron4  value="0"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gfire  value="0"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gwater  value="0"></td></tr>
<tr><td>���������� ������� </td><td><input type=text name=gair  value="0"></td></tr>
<tr><td>���������� ����� </td><td><input type=text name=gearth  value="0"></td></tr>
<tr><td>������� ����� </td><td><input type=text name=glight  value="0"></td></tr>
<tr><td>����� ����� </td><td><input type=text name=ggray  value="0"></td></tr>
<tr><td>������ ����� </td><td><input type=text name=gdark  value="0"></td></tr>
<tr><td>�� ����� </td><td><input type=text name=magic  value=""></td></tr>
<tr><td>���������� ����� </td><td><input type=text name=mfpodav  value="0"></td></tr>
<tr><td>����� </td><td><input type=text name=add_stats  value="0"></td></tr>
<tr><td>�������� </td><td><textarea name="opisanie" cols="30" rows="5"></textarea></td></tr>
<tr><td>���.�����</td><td>
<tr><td>������� ����</td><td>
			<select name="k_kach">
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>������� ����</td><td>
			<select name="r_kach">
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>�������� ����</td><td>
			<select name="d_kach">
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
<tr><td>������� ����</td><td>
			<select name="z_kach">
			<option value="0">�������</option>
			<option value="10">�����</option>
			<option value="30">����</option>
			<option value="50">���������</option>
			<option value="70">�����</option>
	        </select></td></tr>
</table>
<INPUT TYPE="submit" value=" �������� ���� ">
</form>

<?

 if ($_POST['name']) {
	if (mysql_query("insert into berezka (name,img,artefact,destiny,count,type,massa,needident,letter,isrep,dategoden,razdel,second,dvur,duration,maxdur,ecost,nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,nnoj,ntopor,ndubina,nmech,nposoh,nalign,nfire,nwater,nair,nearth,nlight,ngray,ndark,minu,maxu,gsila,glovk,ginta,gintel,ghp,gmana,mfkrit,mfakrit,mfuvorot,mfauvorot,mfkritpow,mfantikritpow,mfmagp,mfdmag,mfdhit,mfcontr,mfparir,mfshieldblock,mfkol,mfrub,mfdrob,mfrej,gnoj,gtopor,gdubina,gmech,gposoh,bron11,bron1,bron22,bron2,bron33,bron3,bron44,bron4,gfire,gwater,gair,gearth,glight,ggray,gdark,magic,mfpodav,add_stats) values ('".$_POST['name']."','".$_POST['duration']."','".$_POST['maxdur']."','".$_POST['ecost']."','".$_POST['nlevel']."','".$_POST['nsila']."','".$_POST['nlovk']."','".$_POST['ninta']."','".$_POST['nvinos']."','".$_POST['nintel']."','".$_POST['nmudra']."','".$_POST['nnoj']."','".$_POST['ntopor']."','".$_POST['ndubina']."','".$_POST['nmech']."','".$_POST['nposoh']."','".$_POST['nalign']."','".$_POST['minu']."','".$_POST['maxu']."','".$_POST['gsila']."','".$_POST['glovk']."','".$_POST['ginta']."','".$_POST['gintel']."','".$_POST['ghp']."','".$_POST['gmana']."','".$_POST['mfkrit']."','".$_POST['mfakrit']."','".$_POST['mfuvorot']."','".$_POST['mfauvorot']."','".$_POST['mfkritpow']."','".$_POST['mfantikritpow']."','".$_POST['mfrej']."','".$_POST['mfdrob']."','".$_POST['mfkol']."','".$_POST['mfrub']."','".$_POST['mfdmag']."','".$_POST['mfdhit']."','".$_POST['mfcontr']."','".$_POST['mfparir']."','".$_POST['mfshieldblock']."','".$_POST['gnoj']."','".$_POST['gtopor']."','".$_POST['gdubina']."','".$_POST['gmech']."','".$_POST['gposoh']."','".$_POST['img']."','".$_POST['count']."','".$_POST['bron11']."','".$_POST['bron1']."','".$_POST['bron22']."','".$_POST['bron2']."','".$_POST['bron33']."','".$_POST['bron3']."','".$_POST['bron44']."','".$_POST['bron4']."','".$_POST['magic']."','".$_POST['mfpodav']."','".$_POST['add_stats']."','".$_POST['type']."','".$_POST['massa']."','".$_POST['needident']."','".$_POST['nfire']."','".$_POST['nwater']."','".$_POST['nair']."','".$_POST['nearth']."','".$_POST['nlight']."','".$_POST['ngray']."','".$_POST['ndark']."','".$_POST['gfire']."','".$_POST['gwater']."','".$_POST['gair']."','".$_POST['gearth']."','".$_POST['glight']."','".$_POST['ggray']."','".$_POST['gdark']."','".$_POST['letter']."','".$_POST['isrep']."','".$_POST['dategoden']."','".$_POST['razdel']."','".$_POST['artefact']."','".$_POST['destiny']."','".$_POST['k_kach']."','".$_POST['r_kach']."','".$_POST['d_kach']."','".$_POST['z_kach']."','".$_POST['second']."','".$_POST['mfmagp']."','".$_POST['opisanie']."','".$_POST['dvur']."');")) 	{	echo "OK";
	echo "OK";
	}
else { echo "NO";}
 
 }
}
?>