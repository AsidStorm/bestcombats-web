<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']==2.5 )  {

?>
<form method=post ENCTYPE="multipart/form-data">
<b>����</b>
<table width="500" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><table>
<tr><td>�������� </td><td><input type=text name=name value=''> </td></tr>
<tr><td>�������� </td><td><input type=text name=img value=''> </td></tr>
<tr><td>������ ������� </td><td><input type=text name=destiny value="0"></td></tr>
<tr><td>���������� � �������� </td><td><input type=text name=count value="0"></td></tr>
<tr><td>��� �������� 
	</td><td><select name="type">
			<option value="0"></option>
			<option value="3">������</option>
			<option value="29">������</option>
			<option value="11">������</option>
			<option value="27">������</option>
			<option value="9">��������</option>
			<option value="4">�����</option>
			<option value="8">�����</option>
			<option value="22">������</option>
			<option value="23">�����</option>
			<option value="24">������</option>
			<option value="28">�����</option>
			<option value="10">����</option>
			<option value="1">������</option>
			<option value="2">��������</option>
			<option value="5">������</option>
			<option value="25">����������</option>
			<option value="200">������(�������)</option>
			<option value="50">���</option>
	</select> </td></tr>

<tr><td>����� </td><td><input type=text name=massa value="0"> </td></tr>
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
			<option value="7">��������: ��������</option>
			<option value="71">��������: �������</option>
			<option value="50">���</option>
	</select> </td></tr>
<tr><td>������ ������? ������ ��� ������!
	</td><td><select name="second">
			<option value="0">���</option>
			<option value="1">��</option>
	</select> </td></tr>
<tr><td>���.�����  </td><td><input type=text name=duration  value="0"></td></tr>
<tr><td>����.�����  </td><td><input type=text name=maxdur  value="0"></td></tr>
<tr><td>����  </td><td><input type=text name=cost  value="0"></td></tr>
</table>
<b>����������:</b>
<table>
<tr><td>�������  </td><td><input type=text name=nlevel  value="0"></td></tr>
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
<tr><td>��.���� </td><td><input type=text name=mfudar  value="0"></td></tr>-->
<tr><td>��.�������� </td><td><input type=text name=mfantiudar  value="0"></td></tr>-->
<tr><td>��.���� </td><td><input type=text name=mfkrit  value="0"></td></tr>
<tr><td>��.�������� </td><td><input type=text name=mfakrit  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=mfuvorot  value="0"></td></tr>
<tr><td>��.���������� </td><td><input type=text name=mfauvorot  value="0"></td></tr>
<tr><td>��. �������� ����� </td><td><input type=text name=mfkritpow  value="0"></td></tr>
<tr><td>��. ������ ���. ����� </td><td><input type=text name=mfantikritpow  value="0"></td></tr>-->
<tr><td>��.�������� ���. ��. </td><td><input type=text name=mfrej  value="0"></td></tr>
<tr><td>��.�������� ����. ��. </td><td><input type=text name=mfdrob  value="0"></td></tr>
<tr><td>��.�������� ���. ��. </td><td><input type=text name=mfkol  value="0"></td></tr>
<tr><td>��.�������� ���. ��. </td><td><input type=text name=mfrub  value="0"></td></tr>
<tr><td>��.+HP </td><td><input type=text name=plus_hp  value="0"></td></tr>
<tr><td>������ �� ����� </td><td><input type=text name=mfdmag  value="0"></td></tr>
<tr><td>������ �� ����� </td><td><input type=text name=mfdhit  value="0"></td></tr>
<tr><td>��.������� </td><td><input type=text name=mfcontr  value="0"></td></tr>
<tr><td>��.����� </td><td><input type=text name=mfparir  value="0"></td></tr>
<tr><td>��. ����� ����� </td><td><input type=text name=mfshieldblock  value="0"></td></tr>
<tr><td>��. �������� ����� </td><td><input type=text name=mfmagp  value="0"></td></tr>
<tr><td>��.���� </td><td><input type=text name=gnoj  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gtopor  value="0"></td></tr>
<tr><td>��.������ </td><td><input type=text name=gdubina  value="0"></td></tr>
<tr><td>��.���� </td><td><input type=text name=gmech   value="0"></td></tr>
<tr><td>��.������  </td><td><input type=text name=gposoh  value="0"></td></tr>
<tr><td>����� ������ </td><td><input type=text name=bron1  value="0"></td></tr>
<tr><td>����� ������� </td><td><input type=text name=bron2  value="0"></td></tr>
<tr><td>����� ����� </td><td><input type=text name=bron3  value="0"></td></tr>
<tr><td>����� ��� </td><td><input type=text name=bron4  value="0"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gfire  value="0"></td></tr>
<tr><td>���������� ���� </td><td><input type=text name=gwater  value="0"></td></tr>
<tr><td>���������� ������� </td><td><input type=text name=gair  value="0"></td></tr>
<tr><td>���������� ����� </td><td><input type=text name=gearth  value="0"></td></tr>
<tr><td>������� ����� </td><td><input type=text name=glight  value="0"></td></tr>
<tr><td>����� ����� </td><td><input type=text name=ggray  value="0"></td></tr>

<tr><td>������ ����� </td><td><input type=text name=gdark  value="0"></td></tr>
<tr><td>�� ����� </td><td><input type=text name=magic  value=""></td></tr>

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
			
</table></td>
    <td align="left" valign="top">
	<table>
	<tr><td><img src='../i/craft/etc_recipe_blue_i00.png' />������� </td><td><input type=text name=recept  value=""></td></tr>
	
	<tr><td><img src='../i/craft/etc_recipe_blue_i00.png' />�������� ����? </td><td><input type=text name=recepti  value="1"></td></tr>
	
	<tr><td><img src='../i/craft/Silver_Nugget.jpg' />Silver&nbsp;Nugget </td><td><input type=text name=Silver_Nugget  value="0"></td></tr>
	<tr><td><img src='../i/craft/Stem.jpg' />Stem </td><td><input type=text name=Stem  value="0"></td></tr>
	<tr><td><img src='../i/craft/Animal_Bone.jpg' />Animal&nbspBone </td><td><input type=text name=Animal_Bone  value="0"></td></tr>
	<tr><td><img src='../i/craft/Suede.jpg' />Suede </td><td><input type=text name=Suede  value="0"></td></tr>
	<tr><td><img src='../i/craft/Iron_Ore.jpg' />Iron&nbspOre </td><td><input type=text name=Iron_Ore  value="0"></td></tr>
	
	<tr><td><img src='../i/craft/Charcoal.jpg' />Charcoal </td><td><input type=text name=Charcoal  value="0"></td></tr>
	<tr><td><img src='../i/craft/Animal_Skin.jpg' />Animal&nbspSkin </td><td><input type=text name=Animal_Skin  value="0"></td></tr>
	<tr><td><img src='../i/craft/Thread.jpg' />Thread </td><td><input type=text name=Thread  value="0"></td></tr>
	<tr><td><img src='../i/craft/Coal.jpg' />Coal </td><td><input type=text name=Coal  value="0"></td></tr>
	
	<tr><td><img src='../i/craft/High_Grade_Suede.jpg' />High&nbspGrade&nbspSuede </td><td><input type=text name=High_Grade_Suede  value="0"></td></tr>	
	<tr><td><img src='../i/craft/Leather.jpg' />Leather </td><td><input type=text name=Leather  value="0"></td></tr>
	<tr><td><img src='../i/craft/Cokes.jpg' />Cokes </td><td><input type=text name=Cokes  value="0"></td></tr>
	<tr><td><img src='../i/craft/Coarse_Bone_Powder.jpg' />Coarse&nbspBone&nbspPowder </td><td><input type=text name=Coarse_Bone_Powder  value="0"></td></tr>   
	<tr><td><img src='../i/craft/Braided_Hemp.jpg' />Braided&nbspHemp </td><td><input type=text name=Braided_Hemp  value="0"></td></tr>
	
	<tr><td><img src='../i/craft/Steel.jpg' />Steel </td><td><input type=text name=Steel  value="0"></td></tr>	
	<tr><td><img src='../i/craft/Metallic_Fiber.jpg' />Metallic&nbspFiber.jpg </td><td><input type=text name=Metallic_Fiber  value="0"></td></tr>	
	<tr><td><img src='../i/craft/Durable_Metal_Plate.jpg' />Durable&nbspMetal&nbspPlate </td><td><input type=text name=Durable_Metal_Plate  value="0"></td></tr>	
	<tr><td><img src='../i/craft/Metal_Hardener.jpg' />Metal&nbspHardener </td><td><input type=text name=Metal_Hardener  value="0"></td></tr>	
	<tr><td><img src='../i/craft/Metallic_Thread.jpg' />Metallic&nbspThread </td><td><input type=text name=Metallic_Thread  value="0"></td></tr>
	<tr><td><img src='../i/craft/Crafted_Leather.jpg' />Crafted&nbspLeather </td><td><input type=text name=Crafted_Leather  value="0"></td></tr>	
	
	<tr><td><img src='../i/craft/Mithril_Ore.jpg' />Mithril&nbspOre </td><td><input type=text name=Mithril_Ore  value="0"></td></tr>
	<tr><td><img src='../i/craft/Stone_of_Purity.jpg' />Stone&nbspof&nbspPurity </td><td><input type=text name=Stone_of_Purity  value="0"></td></tr>
	<tr><td><img src='../i/craft/Oriharukon_Ore.jpg' />Oriharukon&nbspOre </td><td><input type=text name=Oriharukon_Ore  value="0"></td></tr>
	<tr><td><img src='../i/craft/Adamantite_Nugget.jpg' />Adamantite&nbspNugget </td><td><input type=text name=Adamantite_Nugget  value="0"></td></tr>
	<tr><td><img src='../i/craft/Varnish.jpg' />Varnish </td><td><input type=text name=Varnish  value="0"></td></tr>
	<tr><td><img src='../i/craft/Compound_Braid.jpg' />Compound&nbspBraid.jpg </td><td><input type=text name=Compound_Braid  value="0"></td></tr>
	
	<tr><td>����� ������ %</td><td><input type=text name=craft  value="60"></td></tr>
	</table>
	</td>
	
	<td align="left" valign="top">
	<table>
	<tr><td>������� </td><td><select name="magaz">
			<option value="0">������</option>
			<option value="1">� �������</option>
			<option value="2">� �������</option>
	</select> </td></tr>
	<tr><td>������� ����</td><td><input type=text name=ecost  value="0"></td></tr>
	</table>
	</td>
  </tr>

</table>

<INPUT TYPE="submit" value=" �������� ���� ">
</form>

<?

 if ($_POST['name']) {
	if (mysql_query("insert into shop_craft (name,duration,maxdur,cost,nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,nnoj,ntopor,ndubina,nmech,nposoh,nalign,minu,maxu,gsila,glovk,ginta,gintel,ghp,gmana,plus_hp,mfudar,mfantiudar,mfkrit,mfakrit,mfuvorot,mfauvorot,mfkritpow,mfantikritpow,mfrej,mfdrob,mfkol,mfrub,mfdmag,mfdhit,mfcontr,mfparir,mfshieldblock,mfmagp,gnoj,gtopor,gdubina,gmech,gposoh,img,count,bron1,bron2,bron3,bron4,magic,type,massa,needident,nfire,nwater,nair,nearth,nlight,ngray,ndark,gfire,gwater,gair,gearth,glight,ggray,gdark,letter,isrep,dategoden,razdel,destiny,craft,recept,k_kach,r_kach,d_kach,z_kach,second) values ('".$_POST['name']."','".$_POST['duration']."','".$_POST['maxdur']."','".$_POST['cost']."','".$_POST['nlevel']."','".$_POST['nsila']."','".$_POST['nlovk']."','".$_POST['ninta']."','".$_POST['nvinos']."','".$_POST['nintel']."','".$_POST['nmudra']."','".$_POST['nnoj']."','".$_POST['ntopor']."','".$_POST['ndubina']."','".$_POST['nmech']."','".$_POST['nposoh']."','".$_POST['nalign']."','".$_POST['minu']."','".$_POST['maxu']."','".$_POST['gsila']."','".$_POST['glovk']."','".$_POST['ginta']."','".$_POST['gintel']."','".$_POST['ghp']."','".$_POST['gmana']."','".$_POST['plus_hp']."','".$_POST['mfudar']."','".$_POST['mfantiudar']."','".$_POST['mfkrit']."','".$_POST['mfakrit']."','".$_POST['mfuvorot']."','".$_POST['mfauvorot']."','".$_POST['mfkritpow']."','".$_POST['mfantikritpow']."','".$_POST['mfrej']."','".$_POST['mfdrob']."','".$_POST['mfkol']."','".$_POST['mfrub']."','".$_POST['mfdmag']."','".$_POST['mfdhit']."','".$_POST['mfcontr']."','".$_POST['mfparir']."','".$_POST['mfshieldblock']."',''".$_POST['mfmagp']."','".$_POST['gnoj']."','".$_POST['gtopor']."','".$_POST['gdubina']."','".$_POST['gmech']."','".$_POST['gposoh']."','".$_FILES['img']['name']."','".$_POST['count']."','".$_POST['bron1']."','".$_POST['bron2']."','".$_POST['bron3']."','".$_POST['bron4']."','".$_POST['magic']."','".$_POST['type']."','".$_POST['massa']."','".$_POST['needident']."','".$_POST['nfire']."','".$_POST['nwater']."','".$_POST['nair']."','".$_POST['nearth']."','".$_POST['nlight']."','".$_POST['ngray']."','".$_POST['ndark']."','".$_POST['gfire']."','".$_POST['gwater']."','".$_POST['gair']."','".$_POST['gearth']."','".$_POST['glight']."','".$_POST['ggray']."','".$_POST['gdark']."','".$_POST['letter']."','".$_POST['isrep']."','".$_POST['dategoden']."','".$_POST['razdel']."','".$_POST['destiny']."','".$_POST['craft']."','".$_POST['recept']."','".$_POST['k_kach']."','".$_POST['r_kach']."','".$_POST['d_kach']."','".$_POST['z_kach']."','".$_POST['second']."');")) 	{
	echo "OK";
	}
else { echo "NO";}
 move_uploaded_file($_FILES['img']['tmp_name'], './i/sh/'.$_FILES['img']['name']."");
 
$sp = mysql_query("SELECT * FROM `shop_craft` WHERE `name`='".$_POST['name']."'"); 
$row = mysql_fetch_array($sp);
	if (mysql_query("insert into craft (item,recept,Silver_Nugget,Stem,Animal_Bone,Suede,Iron_Ore,Charcoal,Animal_Skin,Thread,Coal,High_Grade_Suede,Leather,Cokes,Coarse_Bone_Powder,Braided_Hemp,Steel,Metallic_Fiber,Durable_Metal_Plate,Metal_Hardener,Metallic_Thread,Crafted_Leather,Mithril_Ore,Stone_of_Purity,Oriharukon_Ore,Adamantite_Nugget,Varnish,Compound_Braid) values ('".$row['id']."','".$_POST['recepti']."','".$_POST['Silver_Nugget']."','".$_POST['Stem']."','".$_POST['Animal_Bone']."','".$_POST['Suede']."','".$_POST['Iron_Ore']."','".$_POST['Charcoal']."','".$_POST['Animal_Skin']."','".$_POST['Thread']."','".$_POST['Coal']."','".$_POST['High_Grade_Suede']."','".$_POST['Leather']."','".$_POST['Cokes']."','".$_POST['Coarse_Bone_Powder']."','".$_POST['Braided_Hemp']."','".$_POST['Steel']."','".$_POST['Metallic_Fiber']."','".$_POST['Durable_Metal_Plate']."','".$_POST['Metal_Hardener']."','".$_POST['Metallic_Thread']."','".$_POST['Crafted_Leather']."','".$_POST['Mithril_Ore']."','".$_POST['Stone_of_Purity']."','".$_POST['Oriharukon_Ore']."','".$_POST['Adamantite_Nugget']."','".$_POST['Varnish']."','".$_POST['Compound_Braid']."');")) 	{
	echo "OK";
	}
else { echo "NO";} 

if($_POST['magaz']==1){

	if (mysql_query("insert into shop (name,duration,maxdur,cost,type,massa,razdel,count,img,koll) values ('".$_POST['recept']."','0','1','".$_POST['ecost']."','200','0.1','52','50000','etc_recipe_blue_i00.png','1');")) 	{
	echo "OK";
	}
else { echo "NO";} 

}else if($_POST['magaz']==2){

	if (mysql_query("insert into berezka (name,duration,maxdur,ecost,type,massa,razdel,count,img,koll) values ('".$_POST['recept']."','0','1','".$_POST['ecost']."','200','0.1','52','50000','etc_recipe_blue_i00.png','1');")) 	{
	echo "OK";
	}
else { echo "NO";} 

}


 }
}
?>