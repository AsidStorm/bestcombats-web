<?

include('connect.php');

if (!isset($_GET['id']))
{
	die();
}
else 
{
	$id = mysql_real_escape_string($_GET['id']);
	$showItem = mysql_query("
		SELECT 
			inventory.*,
			users.login
		FROM
			inventory,
			users,
			show_item
		WHERE
			show_item.item_hash = '".$id."' AND
			users.id = show_item.user_id AND
			inventory.owner = users.id AND
			show_item.item_id = inventory.id
	");
	
	function showitem ($row) {
	
	if(!$magic){
		$magic['chanse'] = $incmagic['chanse'];
		$magic['time'] = $incmagic['time'];
		$magic['targeted'] = $incmagic['targeted'];
	}
	// if shop
	echo "<img src=i/sh/{$row['img']} align=left style='padding: 15px; margin: 10 px;'>";
	// end if shop
if ($row['destinyinv']>0) {
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (�����: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destinyinv']}.gif alt=\"���� ������� ������ � ���� ����� �������. �� �� ������ �������� ��� ����-���� ���.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���." ALT="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���.">':"")."<BR>";
	}
elseif ($row['destiny']>0) {
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (�����: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif alt=\"���� ������� ����� ������ � ���� ����� �������. �� �� ������� �������� ��� ����-���� ���.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���." ALT="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���.">':"")."<BR>";
	}else{
	echo "<a href=#>{$row['name']}</a>";if($row['koll']>'0'){echo " <b>(x{$row['koll']})</b>";}print"<img src=i/align_{$row['nalign']}.gif> (�����: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���." ALT="���� ������� ��� ������� '.$row['present'].'. �� �� ������� �������� ���� ������� ����-���� ���.">':"")."<BR>";
}

	echo "<b>��������: <font color=green>{$row['login']}</font></b> &nbsp; &nbsp;<br>";
	if($row['ecost']>0) { echo "<b>����: {$row['ecost']} ���.</b> &nbsp; &nbsp;"; } elseif($row['cost']>0) { echo "<b>����: {$row['cost']} ��.</b> &nbsp; &nbsp;"; }
	
if($row['type']!=200){
		echo "<BR>�������������: {$row['duration']}/{$row['maxdur']}<BR>";
}
if (!$row['needident']) {
		echo (($magic['chanse'])?"����������� ������������: ".$magic['chanse']."%<BR>":"")."
		 ".(($row['goden'])?"���� ��������: {$row['goden']} ��. ".((!$row['count'])?"(�� ".date("Y.m.d H:i",$row['dategoden']).")":"")."<BR>":"")."
        ".(($magic['time'])?"����������������� �������� �����: ".$magic['time']." ���.<BR>":"")."
		".(($row['nsila'] OR $row['nlovk'] OR $row['ninta'] OR $row['nvinos'] OR $row['nlevel'] OR $row['nintel'] OR $row['nmudra'] OR $row['nnoj'] OR $row['ntopor'] OR $row['ndubina'] OR $row['nmech'] OR $row['nposoh'] OR $row['nfire'] OR $row['nwater'] OR $row['nair'] OR $row['nearth'] OR $row['nearth'] OR $row['nlight'] OR $row['ngray'] OR $row['ndark'])?"<b>��������� �����������:</b><BR>":"")."
		".(($row['nlevel']>0)?"� ".(($row['nlevel'] > $user['level'])?"<font color=red>":"")."�������: {$row['nlevel']}</font><BR>":"")."
		".(($row['nsila']>0)?"� ".(($row['nsila'] > $user['sila'])?"<font color=red>":"")."����: {$row['nsila']}</font><BR>":"")."
		".(($row['nlovk']>0)?"� ".(($row['nlovk'] > $user['lovk'])?"<font color=red>":"")."��������: {$row['nlovk']}</font><BR>":"")."
		".(($row['ninta']>0)?"� ".(($row['ninta'] > $user['inta'])?"<font color=red>":"")."��������: {$row['ninta']}</font><BR>":"")."
		".(($row['nvinos']>0)?"� ".(($row['nvinos'] > $user['vinos'])?"<font color=red>":"")."������������: {$row['nvinos']}</font><BR>":"")."
		".(($row['nintel']>0)?"� ".(($row['nintel'] > $user['intel'])?"<font color=red>":"")."���������: {$row['nintel']}</font><BR>":"")."
		".(($row['nmudra']>0)?"� ".(($row['nmudra'] > $user['mudra'])?"<font color=red>":"")."��������: {$row['nmudra']}</font><BR>":"")."
		".(($row['nnoj']>0)?"� ".(($row['nnoj'] > $user['noj'])?"<font color=red>":"")."���������� �������� ������ � ���������: {$row['nnoj']}</font><BR>":"")."
		".(($row['ntopor']>0)?"� ".(($row['ntopor'] > $user['topor'])?"<font color=red>":"")."���������� �������� �������� � ��������: {$row['ntopor']}</font><BR>":"")."
		".(($row['ndubina']>0)?"� ".(($row['ndubina'] > $user['dubina'])?"<font color=red>":"")."���������� �������� �������� � ��������: {$row['ndubina']}</font><BR>":"")."
		".(($row['nmech']>0)?"� ".(($row['nmech'] > $user['mec'])?"<font color=red>":"")."���������� �������� ������: {$row['nmech']}</font><BR>":"")."
		".(($row['nposoh']>0)?"� ".(($row['nposoh'] > $user['posoh'])?"<font color=red>":"")."���������� �������� ��������: {$row['nposoh']}</font><BR>":"")."
		".(($row['nfire']>0)?"� ".(($row['nfire'] > $user['mfire'])?"<font color=red>":"")."���������� �������� ������� ����: {$row['nfire']}</font><BR>":"")."
		".(($row['nwater']>0)?"� ".(($row['nwater'] > $user['mwater'])?"<font color=red>":"")."���������� �������� ������� ����: {$row['nwater']}</font><BR>":"")."
		".(($row['nair']>0)?"� ".(($row['nair'] > $user['mair'])?"<font color=red>":"")."���������� �������� ������� �������: {$row['nair']}</font><BR>":"")."
		".(($row['nearth']>0)?"� ".(($row['nearth'] > $user['mearth'])?"<font color=red>":"")."���������� �������� ������� �����: {$row['nearth']}</font><BR>":"")."
		".(($row['nlight']>0)?"� ".(($row['nlight'] > $user['mlight'])?"<font color=red>":"")."���������� �������� ������ �����: {$row['nlight']}</font><BR>":"")."
		".(($row['ngray']>0)?"� ".(($row['ngray'] > $user['mgray'])?"<font color=red>":"")."���������� �������� ����� ������: {$row['ngray']}</font><BR>":"")."
		".(($row['ndark']>0)?"� ".(($row['ndark'] > $user['mdark'])?"<font color=red>":"")."���������� �������� ������ ����: {$row['ndark']}</font><BR>":"")."
        ".(($row['mfhitp'] OR $row['mfmagp'] OR $row['mfpodav'] OR $row['attacka'] OR $row['add_stats'] OR $row['gsila'] OR $row['mfdhit'] OR $row['mfdmag']  OR $row['mfkritpow']  OR $row['mfantikritpow'] OR $row['mfparir']  OR $row['mfshieldblock'] OR $row['mfcontr']  OR $row['mfrub'] OR $row['mfkol']  OR $row['mfdrob'] OR $row['mfrej'] OR $row['mfkrit'] OR $row['mfakrit']  OR $row['mfuvorot'] OR $row['mfauvorot']  OR $row['glovk'] OR $row['ghp'] OR $row['gmana'] OR $row['ginta'] OR $row['gintel'] OR $row['gnoj'] OR $row['gtopor'] OR $row['gdubina'] OR $row['gmech']  OR $row['gposoh'] OR $row['gfire'] OR $row['gwater'] OR $row['gair'] OR $row['gearth'] OR $row['gearth'] OR $row['glight'] OR $row['ggray'] OR $row['gdark'] OR $row['bron1'] OR $row['bron2'] OR $row['bron3'] OR $row['bron4'] OR $row['givebuter'])?"<b>��������� ��:</b><BR>":"")."
		".(($row['deistvie'] && $row['show']==1)?"<b>��������� ��:</b><BR>� ".$row['deistvie']."<BR> ":"")."
		
       
		
        ".(($row['givebuter'])?"�������� ������ (HP): ".(($row['givebuter']>0)?"+":"")."{$row['givebuter']}<BR>":"")."
		".(($row['gsila'])?"� ����: ".(($row['gsila']>0)?"+":"")."{$row['gsila']}<BR>":"")."
		".(($row['glovk'])?"� ��������: ".(($row['glovk']>0)?"+":"")."{$row['glovk']}<BR>":"")."
		".(($row['ginta'])?"� ��������: ".(($row['ginta']>0)?"+":"")."{$row['ginta']}<BR>":"")."
		".(($row['gintel'])?"� ���������: ".(($row['gintel']>0)?"+":"")."{$row['gintel']}<BR>":"")."
		".(($row['ghp'])?"� ������� �����: +{$row['ghp']}<BR>":"")."
		".(($row['gmana'])?"� ������� ����: +{$row['gmana']}<BR>":"")."
		".(($row['mfkrit'])?"� ��. ����������� ������: ".(($row['mfkrit']>0)?"+":"")."{$row['mfkrit']}%<BR>":"")."
		".(($row['mfakrit'])?"� ��. ������ ����. ������: ".(($row['mfakrit']>0)?"+":"")."{$row['mfakrit']}%<BR>":"")."
		".(($row['mfkritpow'])?"� ��. �������� ����. �����: ".(($row['mfkritpow']>0)?"+":"")."{$row['mfkritpow']}%<BR>":"")."
		".(($row['mfantikritpow'])?"� ��. ������ ���. ����. �����: ".(($row['mfantikritpow']>0)?"+":"")."{$row['mfantikritpow']}%<BR>":"")."
		".(($row['mfparir'])?"� ��. �����������: ".(($row['mfparir']>0)?"+":"")."{$row['mfparir']}%<BR>":"")."
		".(($row['mfshieldblock'])?"� ��. ����� �����: ".(($row['mfshieldblock']>0)?"+":"")."{$row['mfshieldblock']}%<BR>":"")."
		".(($row['mfcontr'])?"� ��. ����������: ".(($row['mfcontr']>0)?"+":"")."{$row['mfcontr']}%<BR>":"")."
		".(($row['mfuvorot'])?"� ��. ������������: ".(($row['mfuvorot']>0)?"+":"")."{$row['mfuvorot']}%<BR>":"")."
		".(($row['mfauvorot'])?"� ��. ������ ��������.: ".(($row['mfauvorot']>0)?"+":"")."{$row['mfauvorot']}%<BR>":"")."
		".(($row['gnoj'])?"� ���������� �������� ������ � ���������: +{$row['gnoj']}<BR>":"")."
		".(($row['gtopor'])?"� ���������� �������� �������� � ��������: +{$row['gtopor']}<BR>":"")."
		".(($row['gdubina'])?"� ���������� �������� �������� � ��������: +{$row['gdubina']}<BR>":"")."
		".(($row['gmech'])?"� ���������� �������� ������: +{$row['gmech']}<BR>":"")."
		".(($row['gposoh'])?"� ���������� �������� ��������: +{$row['gposoh']}<BR>":"")."
		".(($row['gfire'])?"� ���������� �������� ������� ����: +{$row['gfire']}<BR>":"")."
		".(($row['gwater'])?"� ���������� �������� ������� ����: +{$row['gwater']}<BR>":"")."
		".(($row['gair'])?"� ���������� �������� ������� �������: +{$row['gair']}<BR>":"")."
		".(($row['gearth'])?"� ���������� �������� ������� �����: +{$row['gearth']}<BR>":"")."
		".(($row['glight'])?"� ���������� �������� ������ �����: +{$row['glight']}<BR>":"")."
		".(($row['ggray'])?"� ���������� �������� ����� ������: +{$row['ggray']}<BR>":"")."
	    ".(($row['gdark'])?"� ���������� �������� ������ ����: +{$row['gdark']}<BR>":"").""
       
     
         .(($row['bron1']!=0)?"� ����� ������: {$row['bron11']}-{$row['bron1']} (".(((($row['bron11']-1)!=0)?($row['bron11']-1)."+":""))."d".(1+$row['bron1']-$row['bron11']).")<br>":"")."
		".(($row['bron2']!=0)?"� ����� �������: {$row['bron22']}-{$row['bron2']} (".(((($row['bron22']-1)!=0)?($row['bron22']-1)."+":""))."d".(1+$row['bron2']-$row['bron22']).")<br>":"")."
		".(($row['bron3']!=0)?"� ����� �����: {$row['bron33']}-{$row['bron3']} (".(((($row['bron33']-1)!=0)?($row['bron33']-1)."+":""))."d".(1+$row['bron3']-$row['bron33']).")<br>":"")."
		".(($row['bron4']!=0)?"� ����� ���: {$row['bron44']}-{$row['bron4']} (".(((($row['bron44']-1)!=0)?($row['bron44']-1)."+":""))."d".(1+$row['bron4']-$row['bron44']).")<br>":"")."

		".(($row['add_stats'] && !$row['count'])?"� ���������� ����������: {$row['add_stats']}<BR>
		� ����: {$row['gsila']}<a href=\"upd.php?id=".($row['id'])."&p=1\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		� ��������: {$row['glovk']}<a href=\"upd.php?id=".($row['id'])."&p=2\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		� ��������: {$row['ginta']}<a href=\"upd.php?id=".($row['id'])."&p=3\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		� ���������: {$row['gintel']}<a href=\"upd.php?id=".($row['id'])."&p=4\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		":"")."
		".(($row['add_stats'] && $row['count'])?"� ���������� ����������: {$row['add_stats']}<BR>":"")."
        ".(($row['attacka'])?"� �������������� ����: +{$row['attacka']}<BR>":"")."
		".(($row['mfdhit'])?"� ������ �� �����: ".(($row['mfdhit']>0)?"+":"")."{$row['mfdhit']}%<BR>":"")."
		".(($row['mfdmag'])?"� ������ �� �����: ".(($row['mfdmag']>0)?"+":"")."{$row['mfdmag']}%<BR>":"")."
		".(($row['mfdfire'])?"� ������ �� ����� ����: ".(($row['mfdfire']>0)?"+":"")."{$row['mfdfire']}%<BR>":"")."
        ".(($row['mfdair'])?"� ������ �� ����� �������: ".(($row['mfdair']>0)?"+":"")."{$row['mfdair']}%<BR>":"")."
        ".(($row['mfdwater'])?"� ������ �� ����� ����: ".(($row['mfdwater']>0)?"+":"")."{$row['mfdwater']}%<BR>":"")."
        ".(($row['mfdearth'])?"� ������ �� ����� �����: ".(($row['mfdearth']>0)?"+":"")."{$row['mfdearth']}%<BR>":"")."
        ".(($row['mffire'])?"� ��. �������� ����� ����: ".(($row['mffire']>0)?"+":"")."{$row['mffire']}%<BR>":"")."
        ".(($row['mfair'])?"� ��. �������� ����� �������: ".(($row['mfair']>0)?"+":"")."{$row['mfair']}%<BR>":"")."
        ".(($row['mfwater'])?"� ��. �������� ����� ����: ".(($row['mfwater']>0)?"+":"")."{$row['mfwater']}%<BR>":"")."
        ".(($row['mfearth'])?"� ��. �������� ����� �����: ".(($row['mfearth']>0)?"+":"")."{$row['mfearth']}%<BR>":"")."
        ".(($row['mfhitp'])?"� ��. �������� �����: ".(($row['mfhitp']>0)?"+":"")."{$row['mfhitp']}%<BR>":"")."
		".(($row['mfmagp'])?"� ��. �������� ����� ������: ".(($row['mfmagp']>0)?"+":"")."{$row['mfmagp']}%<BR>":"")."
		".(($row['mfpodav'])?"� ��. ���������� ������ �� �����: ".(($row['mfpodav']>0)?"+":"")."{$row['mfpodav']}%<BR>":"")."
		".(($row['mfrub'])?"� ��. �������� ������� �����: ".(($row['mfrub']>0)?"+":"")."{$row['mfrub']}%<BR>":"")."
		".(($row['mfkol'])?"� ��. �������� �������� �����: ".(($row['mfkol']>0)?"+":"")."{$row['mfkol']}%<BR>":"")."
		".(($row['mfdrob'])?"� ��. �������� ��������� �����: ".(($row['mfdrob']>0)?"+":"")."{$row['mfdrob']}%<BR>":"")."
		".(($row['mfrej'])?"�  ��. �������� �������� �����: ".(($row['mfrej']>0)?"+":"")."{$row['mfrej']}%<BR>":"")."
		".(($row['gmeshok'])?"� ����������� ������: +{$row['gmeshok']}<BR>":"")."
		".(($row['letter'])?"���������� ��������: ".strlen($row['letter'])."</div>":"")."
		".(($row['letter'])?"�� ������ ������� �����:<div style='background-color:FAF0E6;'> ".nl2br($row['letter'])."</div>":"")."
		
		".(($row['minu'] OR $row['maxu'] OR $row['mfproboi'] OR $row['mfruburon'] OR $row['mfrejuron'])?"<b>�������� ��������:</b><BR>":"")."
        
       
        ".(($row['minu'])?"� ����������� ��������� �����������: {$row['minu']}<BR>":"")."
		".(($row['maxu'])?"� ������������ ��������� �����������: {$row['maxu']}<BR>":"")."
        ".(($row['mfproboi'])?"� ��. ������ �����: ".(($row['mfproboi']>0)?"+":"")."{$row['mfproboi']}%<BR>":"")."
        ".(($row['mfruburon'])?"� ��. �������� �������� �����: ".(($row['mfruburon']>0)?"+":"")."{$row['mfruburon']}%<BR>":"")."
        ".(($row['mfrejuron'])?"� ��. �������� �������� �����: ".(($row['mfrejuron']>0)?"+":"")."{$row['mfrejuron']}%<BR>":"")."
       	".(($row['k_kach']>0 or $row['r_kach']>0 or $row['d_kach']>0 or $row['z_kach']>0)?"<b>�����������:</b><br />":"")."
         ".(($row['k_kach']>0)?"� ������� �����:":"")."
         ".(($row['k_kach']==10)?" �����<br />":"")."
		 ".(($row['k_kach']==30)?" ����<br />":"")."
		 ".(($row['k_kach']==50)?" ���������<br />":"")."
		 ".(($row['k_kach']==70)?" �����<br />":"")."
         ".(($row['r_kach']>0)?"� ������� �����:":"")."
         ".(($row['r_kach']==10)?" �����<br />":"")."
		 ".(($row['r_kach']==30)?" ����<br />":"")."
		 ".(($row['r_kach']==50)?" ���������<br />":"")."
		 ".(($row['r_kach']==70)?" �����<br />":"")."
         ".(($row['d_kach']>0)?"� �������� �����:":"")."
         ".(($row['d_kach']==10)?" �����<br />":"")."
		 ".(($row['d_kach']==30)?" ����<br />":"")."
		 ".(($row['d_kach']==50)?" ���������<br />":"")."
		 ".(($row['d_kach']==70)?" �����<br />":"")."
         ".(($row['z_kach']>0)?"� ������� �����:":"")."
         ".(($row['z_kach']==10)?" �����<br />":"")."
		 ".(($row['z_kach']==30)?" ����<br />":"")."
		 ".(($row['z_kach']==50)?" ���������<br />":"")."
		 ".(($row['z_kach']==70)?" �����<br />":"")."
		 
		 ".(($row['complect_id']>0)?"����� ���������: ".echoComplect($row['complect_id'])."<BR>":"")."   
		
         ".((($row['type'] == 25 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".((($row['type'] == 29 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		
        ".((($row['type'] == 188 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".(($row['text'])?"�� ����� ������������� �������:<center>".$row['text']."</center><BR>":"")."
	   
		".(($incmagic['max'])?"	�������� �������� <img src=\"i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." ��.	<BR>":"")."
		".(($row['type']==27)?"<small><b>��������:</b><BR><font color=maroon>��������� ��� �����</font></small><BR>":"")."
		".(($row['type']==28)?"<small><b>��������:</b><BR><font color=maroon>��������� ������ �����</font></small><BR>":"")."
		".(($row['podzem'])?"<small><font color=maroon>������� �� ����������</font></small><BR>":"")."
		      
        
        ".(($row['second'])?"<small><b>��������:</b><BR><font style='font-size:11px; color:#990000'>������ ������</font></small><BR>":"")."
        
         

        ".((!$row['isrep'])?" ":"")."
        ".(($row['dvur'])?"<small><b>��������:</b><BR><font color=maroon>��������� ������</font></small><BR>":"")."
		
        
        ".(($row['opisan'])?"<small>".$row['opisan']."</small><BR>":"")."
        ".(($row['magic']>0 && $row['show']==1)?"\r\n<br/><font style='font-size:11px; color:#990000'>�������� �����:</font> {$magic['name']} <img src=\"i/magic/".$magic['img']."\" alt=\"".$magic['name']."\"><BR>":"");
        
        
		
       }
       else { echo "<font color=maroon><B>�������� �������� �� ����������������</B></font><BR>"; }
                
                if($row['made']){
                        switch($row['made']){
                        case 'capitalcity': $made='Capital City'; break;
                        case 'angelscity': $made='Angels City'; break;
                        case 'demonscity': $made='Demons City'; break;
                        case 'devilscity': $made='Devils City'; break;
                        case 'oldcity': $made='Old City'; break;
                        case 'dungeon': $made='Abandonedplain'; break;
                        case 'emeraldscity': $made='Emeralds City'; break;
                        case 'suncity': $made='Sun City'; break;	
}  
                }
                else {
                     switch($_SESSION['incity']){
                     case 'capitalcity':$made='Capital City'; break;
                     case 'angelscity': $made='Angels City'; break;
                     case 'demonscity': $made='Demons City'; break;
                     case 'devilscity': $made='Devils City'; break;
                     case 'oldcity': $made='Old City'; break;
                     case 'dungeon': $made='Abandonedplain'; break;
                     case 'emeraldscity': $made='Emeralds City'; break;
                     case 'suncity': $made='Sun City'; break;	
}
                }
		echo "<small>������� � Devilscity</small></td></TR>";
}
	
	echo '<HTML><HEAD><TITLE>���������� ���� [ ���������� � �������� ]</TITLE>
<link rel=stylesheet type="text/css" href="i/main.css">
<link href="i/move/design6.css" rel="stylesheet" type="text/css">
<body bgcolor=#e2e0e0 style="margin: 10px;">
<TABLE BORDER=0 WIDTH=100% >

';
$row = mysql_fetch_assoc($showItem);
showitem($row);
	
echo '

</TABLE>

';
	
}

?>