<?php
	//If ($_SERVER['REMOTE_ADDR']!='176.37.62.46'){die();}
	include "../connect.php";
?>

<form method=get>
	<fieldset>
		<legend>��������</legend>
		<table>
			<tr><td>�����</td><td><input type='text' name='login' value='<?=$_GET['login']?>'></td><td><input type=submit value='����������'></td></tr>
			<tr><td>ID</td><td><input type='text' name='id' value='<?=$_GET['id']?>'></td><td><input type=submit value='����������'></td></tr>
		</table>
	</fieldset>
</form>

<?
		If (isset($_GET['id']) and !empty($_GET['id'])){
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_GET['id']."' LIMIT 1;"));
		}elseif(isset($_GET['login']) and !empty($_GET['login'])){
			$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".$_GET['login']."' LIMIT 1;"));
		}
		
		If (empty($_GET['id']) and empty($_GET['login'])){
			//echo "�������� �� ������ � ��!";
		}elseIf (empty($user)){
			echo "�������� �� ������ � ��!";
		}else{
		
		$upow=0; $bparir=0; $bcontr=0; $bkritpow=0; 
		$bdhit=0; $bdmag=0; $bmfbron=0; $bmfmagp=0; 
        $bmfuv=0; $bmfauv=0; $bmfakrit=0; $bmfkrit=0; //������������
        $bmfuv1=0; $bmfauv1=0; $bmfakrit1=0; $bmfkrit1=0; //������������
		$pl_min_u=0;$pl_max_u=0;$bmfdef=0;$bmfpodav=0;
		
		
        if ($user['sila']>=25)  $upow+=5;
        if ($user['sila']>=50)  $upow+=5;
        if ($user['sila']>=75)  $upow+=7;
        if ($user['sila']>=100) $upow+=8;
        if ($user['sila']>=125){$pl_min_u+=10;$pl_max_u+=10;}
		
        if ($user['lovk']>=25)  $bparir+=5;
		if ($user['lovk']>=50)  $bmfakrit+=15;
		if ($user['lovk']>=50)  $bmfuv+=35;
        if ($user['lovk']>=75)  $bparir+=10;	
        if ($user['lovk']>=100) $bmfakrit+=25;	
		if ($user['lovk']>=100) $bmfuv+=70;
		
		if ($user['inta']>=25)  $bkritpow+=10;
		if ($user['inta']>=50)  $bmfkrit+=35;
		if ($user['inta']>=50)  $bmfauv+=15;
		if ($user['inta']>=75)  $bkritpow+=15;
		if ($user['inta']>=100) $bmfkrit+=70;
		if ($user['inta']>=100) $bmfauv+=30;

		if ($user['vinos']>=125)$bmfdef+=25;

        if ($user['intel']>=25)  $bmfmagp+=5;
        if ($user['intel']>=50)  $bmfmagp+=5;
        if ($user['intel']>=75)  $bmfmagp+=7;
        if ($user['intel']>=100) $bmfmagp+=8;
        if ($user['intel']>=125) $bmfmagp+=10;		
		
		if ($user['mudra']>=125) $bmfpodav+=3;

		
		$mf = array ();
		$user_dress = mysql_fetch_array( mysql_query('SELECT sum(minu),sum(maxu),sum(mfkrit),sum(mfakrit),sum(mfuvorot),sum(mfauvorot),sum(bron1),sum(bron2),sum(bron3),sum(bron4),sum(mfkritpow),sum(mfantikritpow),sum(mfparir),sum(mfshieldblock),sum(mfcontr),sum(mfrub),sum(mfkol),sum(mfdrob),sum(mfrej),sum(mfdhit),sum(mfdmag),sum(mfhitp),sum(mfmagp),sum(mffire),sum(mfwater),sum(mfair),sum(mfearth),sum(mflight),sum(mfgray),sum(mfdark),sum(mfpodav),sum(uron_col),sum(uron_rub),sum(uron_drob),sum(uron_rej),sum(mykol),sum(myrub),sum(mydrob),sum(myrej) FROM `inventory` WHERE `dressed`=1 AND `owner` = \''.$user['id'].'\' LIMIT 1;'));
		$mf_dress   = mysql_fetch_array( mysql_query('SELECT sum(mfdhit),sum(mfdmag),sum(mfhitp),sum(mfmagp),sum(mffire),sum(mfwater),sum(mfair),sum(mfearth),sum(mflight),sum(mfgray),sum(mfdark),sum(mfpodav) FROM `inventory` WHERE `dressed`=1 AND `owner` = \''.$user['id'].'\' LIMIT 1;'));
		$mf_effects = mysql_fetch_array( mysql_query('SELECT sum(mfdmag),sum(mffire),sum(mfair),sum(mfwater),sum(mfearth),sum(mykol),sum(myrub),sum(mydrob),sum(myrej),sum(mfdhit),sum(mfmagp),sum(mfhitp) FROM `effects` WHERE `owner` = \''.$user['id'].'\' LIMIT 1;'));
		$user_u1    = mysql_fetch_array( mysql_query('SELECT minu,maxu,breakdownarmor,uron_col,uron_rub,uron_drob,uron_rej FROM `inventory` WHERE `id` = \''.$user['weap'].'\' LIMIT 1;'));
		$user_u2    = mysql_fetch_array( mysql_query('SELECT minu,maxu,breakdownarmor,uron_col,uron_rub,uron_drob,uron_rej,type FROM `inventory` WHERE `id` = \''.$user['shit'].'\' AND `second`=1 LIMIT 1;'));
		$user_sleep = mysql_fetch_array( mysql_query('SELECT sleep FROM `obshaga` WHERE `pers` = \''.$user['id'].'\'  LIMIT 1;'));
		$ghp_weapon = mysql_fetch_array( mysql_query('SELECT sum(ghp),sum(gmana) FROM `inventory` WHERE `dressed`=1 AND `owner` = \''.$user['id'].'\' LIMIT 1;'));
		$ghp_effect = mysql_fetch_array( mysql_query('SELECT sum(hp) FROM `effects` WHERE `owner` = \''.$user['id'].'\' LIMIT 1;'));

		
		$user_dress[0]=floor($user_dress[0]-$user_u1[0]);
		$user_dress[1]=floor($user_dress[1]-$user_u1[1]);
		
		$enemy_dress[0]=floor($enemy_dress[0]-$enemy_u1[0]);
		$enemy_dress[1]=floor($enemy_dress[1]-$enemy_u1[1]);
		
        $user_dress[6]+=$bmfbron;
        $user_dress[7]+=$bmfbron;
        $user_dress[8]+=$bmfbron;
        $user_dress[9]+=$bmfbron;
		
		$myhitp        = $user_dress[21]+$upow;
		$mykritpow     = $user_dress[10]+$bkritpow;
		$myantikritpow = $user_dress[11];
		$myparir       = $user_dress[12]+$bparir;
		$myshieldblock = $user_dress[13];
		$mycontr 	   = $user_dress[14]+$bcontr;
		$mydhit        = $user_dress[19];
		$mydmag        = $user_dress[20]+$mf_effects[0];
		$mymagp        = $user_dress[22]+$bmfmagp;
		$mfpodav       = $user_dress[30]+$bmfpodav;
				
		//������ //			
		$mykol  = $user_dress[35]+$user['vinos']*1.5+$mf_effects[5]+$mf_effects[9]+$mf_dress[0]+$bmfdef;
		$myrub  = $user_dress[36]+$user['vinos']*1.5+$mf_effects[6]+$mf_effects[9]+$mf_dress[0]+$bmfdef;
		$mydrob = $user_dress[37]+$user['vinos']*1.5+$mf_effects[7]+$mf_effects[9]+$mf_dress[0]+$bmfdef;
		$myrej  = $user_dress[38]+$user['vinos']*1.5+$mf_effects[8]+$mf_effects[9]+$mf_dress[0]+$bmfdef;
		
		$mffire = $user_dress[23]+$user['vinos']*1.5+$mf_effects[1]+$mf_effects[0]+$mf_dress[1];
		$mfair  = $user_dress[24]+$user['vinos']*1.5+$mf_effects[2]+$mf_effects[0]+$mf_dress[1];
		$mfwater= $user_dress[25]+$user['vinos']*1.5+$mf_effects[3]+$mf_effects[0]+$mf_dress[1];
		$mfearth= $user_dress[26]+$user['vinos']*1.5+$mf_effects[4]+$mf_effects[0]+$mf_dress[1];
		$mflight= $user_dress[27]+$user['vinos']*1.5+$mf_effects[0]+$mf_dress[1];
		$mfdark = $user_dress[29]+$user['vinos']*1.5+$mf_effects[0]+$mf_dress[1];
		$mfgray = $user_dress[28]+$user['vinos']*1.5+$mf_effects[0]+$mf_dress[1];				
				
		// �������� //
		$uron_col  = $user_dress[16]+$mf_effects[11]+$upow;				
		$uron_rub  = $user_dress[15]+$mf_effects[11]+$upow;
		$uron_drob = $user_dress[17]+$mf_effects[11]+$upow;
		$uron_rej  = $user_dress[18]+$mf_effects[11]+$upow;
		
		$uron_fire  = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_water = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_air   = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_earth = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_light = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_dark  = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		$uron_grey  = 0+$user['intel']*0.5+$user_dress[22]+$mf_effects[10];
		
		$mfpodav = 0+$mf_dress[11];
		
		/////////////////////////////////////////////////////////
		$mykrit = $user_dress[2]+$user['inta']*5+$bmfkrit;
		$myuvorot = $user_dress[4]+$user['lovk']*5+$bmfuv;
		$myakrit = $user_dress[3]+$user['inta']*5+$bmfakrit;
		$myauvorot = $user_dress[5]+$user['lovk']*5+$bmfauv;
		
		$mf['me'] = array ('udar' => floor(1+$user_dress[0]+$user_u1[0]+$pl_min_u),'maxudar' =>(floor(3+$user_dress[1]+$user_u1[1]+$pl_max_u)),
						   'udar2' => floor(1+$user_dress[0]+$user_u2[0+$pl_min_u]),'maxudar2' =>(floor(3+$user_dress[1]+$user_u2[1]+$pl_max_u)));

		If ($myuvorot<0){$myuvorot=0;}	
		

			
?>
<small>�����: <b><?=$user['login']?></b><BR></small>
<BR>
<small>�������: <b><?=$user['level']?></b><BR></small>
<small>�����: <b><?=$user['maxhp']?></b><BR></small>
<small>������ �����: <b><?echo $user['maxhp']-$ghp_weapon[0]-$ghp_effect[0];?></b><BR></small>
<?if($user['maxmana']>0){echo"<BR><small>����: <b>{$user['maxmana']}</b></small><BR>";}?>
<?if($user['maxmana']>0){echo"<small>������ ����: <b>".($user['maxmana']-$ghp_weapon[1])."</b></small><BR>";}?>
<BR>
<?if($user['battle']>0){echo"<small>���: <b>��</b></small><BR>";}else{echo"<small>���: <b>���</b></small><BR>";}?>
<BR>
<?if(isset($user_sleep) and $user_sleep['sleep']==1){echo"<small>���: <b>��</b></small><BR>";}else{echo"<small>���: <b>���</b></small><BR>";}?>

<BR>
<small>����: <b><?=$user['sila']?></b><BR></small>
<small>��������: <b><?=$user['lovk']?></b><BR></small>
<small>��������: <b><?=$user['inta']?></b><BR></small>
<small>������������: <b><?=$user['vinos']?></b><BR></small>
<?if($user['level']>3){echo"<small>���������: <b>{$user['intel']}</b></small><BR>";}?>
<?if($user['level']>6){echo"<small>��������: <b>{$user['mudra']}</b></small><BR>";}?>
<?if($user['level']>9){echo"<small>����������: <b>{$user['spirit']}</b></small><BR>";}?>
<?if($user['level']>12){echo"<small>����: <b>{$user['will']}</b></small><BR>";}?>
<?if($user['level']>15){echo"<small>������� ����: <b>{$user['freedom']}</b></small><BR>";}?>
<?if($user['level']>18){echo"<small>��������������: <b>{$user['god']}</b></small><BR>";}?>
========================================================================<br/>
<SPAN title='����������� �� ���� ����� ����������� ��� ������ ������ ����, ��� ����� ����� � ������ ����������. �������������� ����, �������� � �����, �� �����������.'>����: <? echo $mf['me']['udar']; ?> - <? echo $mf['me']['maxudar'];?> <? If (!empty($user['shit']) and !empty($user_u2[7])){echo " / ".$mf['me']['udar2']."-".$mf['me']['maxudar2'];} ?> </SPAN><br>
<SPAN title='��. ����. ����� ��������� ������� ����������� ����, ��������� �������������� ����������� ���� ������ ����.'>��. ����. �����: <?=floor($mykrit)?></SPAN><br>
<SPAN title='��. �������� ����. ����� ������� ��� ����������� ����.'>��. �������� ����. �����: <?=floor($mykritpow)?></SPAN><br>
<SPAN title='��. ������ ����. ����� ������� ����������� ��������� ����. �����'>��. ������ ����. �����: <?=floor($myakrit)?></SPAN><br>
<SPAN title='��. ����������� ��������� ��� ���������� �� ����� ����������, ��������� ��������� ��.'>��. �����������: <?=floor($myuvorot)?></SPAN><br>
<SPAN title='��. ������ ����������� ������� ����� ���������� ���������� �� ����� �����'>��. ������ �����������: <?=floor($myauvorot)?></SPAN><br>
<SPAN title='��. ���������� ��������� ������� �������������� ���� �� ����������, ����� ���� ��� �� ���������� �� ��� �����'>��. ����������: <?=floor($mycontr)?></SPAN><br>
<SPAN title='��. ����������� ��������� "�������" ���� ����� ����������. �������� ���� ����������� � ��� ����� ������� ������ ��. ����������� � �������� ��. ����������� ����������'>��. �����������: <?=floor($myparir)?></SPAN><br>
<SPAN title='��. ����� ����� ��������� "�������" ���� ����� ����������. ���� ����������� ���������.'>��. ����� �����: <?=floor($myshieldblock)?></SPAN><br>
========================================================================<br/>
<SPAN title='������ �� ����������� ����� ������� ���� ���������� ��� ����������� �������'>������� ����: +<?=floor($uron_col)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>������� ����: +<?=floor($uron_rub)?>%</SPAN><br>
<SPAN title='������ �� ����������� ����� ������� ���� ���������� ��� ����������� �������'>�������� ����: +<?=floor($uron_drob)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>������� ����: +<?=floor($uron_rej)?>%</SPAN><br>
<br/>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� ����: +<?=floor($uron_fire)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� ����: +<?=floor($uron_water)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� �������: +<?=floor($uron_air)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� �����: +<?=floor($uron_earth)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� �����: +<?=floor($uron_light)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� ����: +<?=floor($uron_dark)?>%</SPAN><br>
<SPAN title='������ �� ���������� ���� ������� ���� ���������� ��� ����������� �������'>����� �����: +<?=floor($uron_grey)?>%</SPAN><br>
<br/>
<b>���������� ������:</b><br/>
<SPAN>�� ����� ����: +<?=floor($mfpodav)?>%</SPAN><br>
<SPAN>�� ����� ����: +<?=floor($mfpodav)?>%</SPAN><br>
<SPAN>�� ����� �������: +<?=floor($mfpodav)?>%</SPAN><br>
<SPAN>�� ����� �����: +<?=floor($mfpodav)?>%</SPAN><br>
========================================================================<br/>
<SPAN title='�������� ����� �������� ��� ���� ����������� �������'> ������� ����: <?=floor($mykol)?> </SPAN><BR>
<SPAN title='�������� �������� ����� �������� ��� ���� �������� �������'> ������� ����: <?=floor($myrub)?> </SPAN><BR>
<SPAN title='�������� �������� ����� �������� ��� ���� �������� �������'> �������� ����: <?=floor($mydrob)?> </SPAN><BR>
<SPAN title='�������� ��������� ����� �������� ��� ���� ��������� �������'> ������� ����: <?=floor($myrej)?> </SPAN><BR>
<SPAN title='�������� ����� ���� �������� ��� ���� ��������� �������'> ����� ����: <?=floor($mffire)?> </SPAN><BR>
<SPAN title='�������� ����� ���� �������� ��� ���� �������� �������'> ����� ����: <?=floor($mfwater)?> </SPAN><BR>
<SPAN title='�������� ����� ������� �������� ��� ���� ���������� �������'> ����� �������: <?=floor($mfair)?> </SPAN><BR>
<SPAN title='�������� ����� ����� �������� ��� ���� ��������� �������'> ����� �����: <?=floor($mfearth)?> </SPAN><BR>
<SPAN title='�������� ������� ����� �������� ��� ���� �������� �������'> ����� �����: <?=floor($mflight)?> </SPAN><BR>
<SPAN title='�������� ����� ����� �������� ��� ���� ������ �������'> ����� ����: <?=floor($mfdark)?> </SPAN><BR>
<SPAN title='�������� ������ ����� �������� ��� ���� ������� �������'> ����� �����: <?=floor($mfgray)?> </SPAN><BR>
========================================================================<br/>
������ ���� : <? echo"{$user['noj']} <br>";?>
������ ���� :  <? echo"{$user['mec']} <br>";?>
������ ������ : <? echo"{$user['topor']} <br>";?>
������ ������ :  <? echo"{$user['dubina']} <br>";?>
������ �������� :  <? echo"{$user['posoh']} <br>";?>
������ ������� ���� :  <? echo"{$user['mfire']} <br>";?>
������ ������� ���� : <? echo" {$user['mwater']} <br>";?>
������ ������� ������� : <? echo"{$user['mair']} <br>";?>
������ ������� ����� : <? echo"{$user['mearth']} <br>";?>
������ ������� ����� :  <? echo"{$user['mlight']} <br>";?>
������ ������� ����� ����� :  <? echo"{$user['mgray']} <br>";?>
������ ������� ���� :  <? echo"{$user['mdark']} <br>";?>
========================================================================<br/>
<?
$pers_effect = mysql_query('SELECT name,time FROM `effects` WHERE `owner` = \''.$user['id'].'\' ');
$i=0;
echo "<table border=1 cellpadding=3 cellspacing=3>";
while ($work_eff=mysql_fetch_array($pers_effect)){
	$i++;
	echo "<tr><td>".$i."</td><td>".$work_eff['name']."</td><td>".(floor(($work_eff['time']-time())/60))." �����</td></tr>";
}
echo "</table>";
?>



<?}?>
