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
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (ћасса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destinyinv']}.gif alt=\"Ётот предмет св€зан с ¬ами общей судьбой. ¬ы не можете передать его кому-либо еще.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще." ALT="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
	}
elseif ($row['destiny']>0) {
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (ћасса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif alt=\"Ётот предмет будет св€зан с ¬ами общей судьбой. ¬ы не сможете передать его кому-либо еще.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще." ALT="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
	}else{
	echo "<a href=#>{$row['name']}</a>";if($row['koll']>'0'){echo " <b>(x{$row['koll']})</b>";}print"<img src=i/align_{$row['nalign']}.gif> (ћасса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще." ALT="Ётот предмет вам подарил '.$row['present'].'. ¬ы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
}

	echo "<b>¬ладелец: <font color=green>{$row['login']}</font></b> &nbsp; &nbsp;<br>";
	if($row['ecost']>0) { echo "<b>÷ена: {$row['ecost']} екр.</b> &nbsp; &nbsp;"; } elseif($row['cost']>0) { echo "<b>÷ена: {$row['cost']} кр.</b> &nbsp; &nbsp;"; }
	
if($row['type']!=200){
		echo "<BR>ƒолговечность: {$row['duration']}/{$row['maxdur']}<BR>";
}
if (!$row['needident']) {
		echo (($magic['chanse'])?"¬еро€тность срабатывани€: ".$magic['chanse']."%<BR>":"")."
		 ".(($row['goden'])?"—рок годности: {$row['goden']} дн. ".((!$row['count'])?"(до ".date("Y.m.d H:i",$row['dategoden']).")":"")."<BR>":"")."
        ".(($magic['time'])?"ѕродолжительность действи€ магии: ".$magic['time']." мин.<BR>":"")."
		".(($row['nsila'] OR $row['nlovk'] OR $row['ninta'] OR $row['nvinos'] OR $row['nlevel'] OR $row['nintel'] OR $row['nmudra'] OR $row['nnoj'] OR $row['ntopor'] OR $row['ndubina'] OR $row['nmech'] OR $row['nposoh'] OR $row['nfire'] OR $row['nwater'] OR $row['nair'] OR $row['nearth'] OR $row['nearth'] OR $row['nlight'] OR $row['ngray'] OR $row['ndark'])?"<b>“ребуетс€ минимальное:</b><BR>":"")."
		".(($row['nlevel']>0)?"Х ".(($row['nlevel'] > $user['level'])?"<font color=red>":"")."”ровень: {$row['nlevel']}</font><BR>":"")."
		".(($row['nsila']>0)?"Х ".(($row['nsila'] > $user['sila'])?"<font color=red>":"")."—ила: {$row['nsila']}</font><BR>":"")."
		".(($row['nlovk']>0)?"Х ".(($row['nlovk'] > $user['lovk'])?"<font color=red>":"")."Ћовкость: {$row['nlovk']}</font><BR>":"")."
		".(($row['ninta']>0)?"Х ".(($row['ninta'] > $user['inta'])?"<font color=red>":"")."»нтуици€: {$row['ninta']}</font><BR>":"")."
		".(($row['nvinos']>0)?"Х ".(($row['nvinos'] > $user['vinos'])?"<font color=red>":"")."¬ыносливость: {$row['nvinos']}</font><BR>":"")."
		".(($row['nintel']>0)?"Х ".(($row['nintel'] > $user['intel'])?"<font color=red>":"")."»нтеллект: {$row['nintel']}</font><BR>":"")."
		".(($row['nmudra']>0)?"Х ".(($row['nmudra'] > $user['mudra'])?"<font color=red>":"")."ћудрость: {$row['nmudra']}</font><BR>":"")."
		".(($row['nnoj']>0)?"Х ".(($row['nnoj'] > $user['noj'])?"<font color=red>":"")."ћастерство владени€ ножами и кастетами: {$row['nnoj']}</font><BR>":"")."
		".(($row['ntopor']>0)?"Х ".(($row['ntopor'] > $user['topor'])?"<font color=red>":"")."ћастерство владени€ топорами и секирами: {$row['ntopor']}</font><BR>":"")."
		".(($row['ndubina']>0)?"Х ".(($row['ndubina'] > $user['dubina'])?"<font color=red>":"")."ћастерство владени€ дубинами и булавами: {$row['ndubina']}</font><BR>":"")."
		".(($row['nmech']>0)?"Х ".(($row['nmech'] > $user['mec'])?"<font color=red>":"")."ћастерство владени€ мечами: {$row['nmech']}</font><BR>":"")."
		".(($row['nposoh']>0)?"Х ".(($row['nposoh'] > $user['posoh'])?"<font color=red>":"")."ћастерство владени€ посохами: {$row['nposoh']}</font><BR>":"")."
		".(($row['nfire']>0)?"Х ".(($row['nfire'] > $user['mfire'])?"<font color=red>":"")."ћастерство владени€ стихией ќгн€: {$row['nfire']}</font><BR>":"")."
		".(($row['nwater']>0)?"Х ".(($row['nwater'] > $user['mwater'])?"<font color=red>":"")."ћастерство владени€ стихией ¬оды: {$row['nwater']}</font><BR>":"")."
		".(($row['nair']>0)?"Х ".(($row['nair'] > $user['mair'])?"<font color=red>":"")."ћастерство владени€ стихией ¬оздуха: {$row['nair']}</font><BR>":"")."
		".(($row['nearth']>0)?"Х ".(($row['nearth'] > $user['mearth'])?"<font color=red>":"")."ћастерство владени€ стихией «емли: {$row['nearth']}</font><BR>":"")."
		".(($row['nlight']>0)?"Х ".(($row['nlight'] > $user['mlight'])?"<font color=red>":"")."ћастерство владени€ магией —вета: {$row['nlight']}</font><BR>":"")."
		".(($row['ngray']>0)?"Х ".(($row['ngray'] > $user['mgray'])?"<font color=red>":"")."ћастерство владени€ серой магией: {$row['ngray']}</font><BR>":"")."
		".(($row['ndark']>0)?"Х ".(($row['ndark'] > $user['mdark'])?"<font color=red>":"")."ћастерство владени€ магией “ьмы: {$row['ndark']}</font><BR>":"")."
        ".(($row['mfhitp'] OR $row['mfmagp'] OR $row['mfpodav'] OR $row['attacka'] OR $row['add_stats'] OR $row['gsila'] OR $row['mfdhit'] OR $row['mfdmag']  OR $row['mfkritpow']  OR $row['mfantikritpow'] OR $row['mfparir']  OR $row['mfshieldblock'] OR $row['mfcontr']  OR $row['mfrub'] OR $row['mfkol']  OR $row['mfdrob'] OR $row['mfrej'] OR $row['mfkrit'] OR $row['mfakrit']  OR $row['mfuvorot'] OR $row['mfauvorot']  OR $row['glovk'] OR $row['ghp'] OR $row['gmana'] OR $row['ginta'] OR $row['gintel'] OR $row['gnoj'] OR $row['gtopor'] OR $row['gdubina'] OR $row['gmech']  OR $row['gposoh'] OR $row['gfire'] OR $row['gwater'] OR $row['gair'] OR $row['gearth'] OR $row['gearth'] OR $row['glight'] OR $row['ggray'] OR $row['gdark'] OR $row['bron1'] OR $row['bron2'] OR $row['bron3'] OR $row['bron4'] OR $row['givebuter'])?"<b>ƒействует на:</b><BR>":"")."
		".(($row['deistvie'] && $row['show']==1)?"<b>ƒействует на:</b><BR>Х ".$row['deistvie']."<BR> ":"")."
		
       
		
        ".(($row['givebuter'])?"Х”ровень жизниь (HP): ".(($row['givebuter']>0)?"+":"")."{$row['givebuter']}<BR>":"")."
		".(($row['gsila'])?"Х —ила: ".(($row['gsila']>0)?"+":"")."{$row['gsila']}<BR>":"")."
		".(($row['glovk'])?"Х Ћовкость: ".(($row['glovk']>0)?"+":"")."{$row['glovk']}<BR>":"")."
		".(($row['ginta'])?"Х »нтуици€: ".(($row['ginta']>0)?"+":"")."{$row['ginta']}<BR>":"")."
		".(($row['gintel'])?"Х »нтеллект: ".(($row['gintel']>0)?"+":"")."{$row['gintel']}<BR>":"")."
		".(($row['ghp'])?"Х ”ровень жизни: +{$row['ghp']}<BR>":"")."
		".(($row['gmana'])?"Х ”ровень маны: +{$row['gmana']}<BR>":"")."
		".(($row['mfkrit'])?"Х ћф. критических ударов: ".(($row['mfkrit']>0)?"+":"")."{$row['mfkrit']}%<BR>":"")."
		".(($row['mfakrit'])?"Х ћф. против крит. ударов: ".(($row['mfakrit']>0)?"+":"")."{$row['mfakrit']}%<BR>":"")."
		".(($row['mfkritpow'])?"Х ћф. мощности крит. удара: ".(($row['mfkritpow']>0)?"+":"")."{$row['mfkritpow']}%<BR>":"")."
		".(($row['mfantikritpow'])?"Х ћф. против мощ. крит. удара: ".(($row['mfantikritpow']>0)?"+":"")."{$row['mfantikritpow']}%<BR>":"")."
		".(($row['mfparir'])?"Х ћф. парировани€: ".(($row['mfparir']>0)?"+":"")."{$row['mfparir']}%<BR>":"")."
		".(($row['mfshieldblock'])?"Х ћф. блока щитом: ".(($row['mfshieldblock']>0)?"+":"")."{$row['mfshieldblock']}%<BR>":"")."
		".(($row['mfcontr'])?"Х ћф. контрудара: ".(($row['mfcontr']>0)?"+":"")."{$row['mfcontr']}%<BR>":"")."
		".(($row['mfuvorot'])?"Х ћф. увертливости: ".(($row['mfuvorot']>0)?"+":"")."{$row['mfuvorot']}%<BR>":"")."
		".(($row['mfauvorot'])?"Х ћф. против увертлив.: ".(($row['mfauvorot']>0)?"+":"")."{$row['mfauvorot']}%<BR>":"")."
		".(($row['gnoj'])?"Х ћастерство владени€ ножами и кастетами: +{$row['gnoj']}<BR>":"")."
		".(($row['gtopor'])?"Х ћастерство владени€ топорами и секирами: +{$row['gtopor']}<BR>":"")."
		".(($row['gdubina'])?"Х ћастерство владени€ дубинами и булавами: +{$row['gdubina']}<BR>":"")."
		".(($row['gmech'])?"Х ћастерство владени€ мечами: +{$row['gmech']}<BR>":"")."
		".(($row['gposoh'])?"Х ћастерство владени€ посохами: +{$row['gposoh']}<BR>":"")."
		".(($row['gfire'])?"Х ћастерство владени€ стихией ќгн€: +{$row['gfire']}<BR>":"")."
		".(($row['gwater'])?"Х ћастерство владени€ стихией ¬оды: +{$row['gwater']}<BR>":"")."
		".(($row['gair'])?"Х ћастерство владени€ стихией ¬оздуха: +{$row['gair']}<BR>":"")."
		".(($row['gearth'])?"Х ћастерство владени€ стихией «емли: +{$row['gearth']}<BR>":"")."
		".(($row['glight'])?"Х ћастерство владени€ магией —вета: +{$row['glight']}<BR>":"")."
		".(($row['ggray'])?"Х ћастерство владени€ серой магией: +{$row['ggray']}<BR>":"")."
	    ".(($row['gdark'])?"Х ћастерство владени€ магией “ьмы: +{$row['gdark']}<BR>":"").""
       
     
         .(($row['bron1']!=0)?"Х Ѕрон€ головы: {$row['bron11']}-{$row['bron1']} (".(((($row['bron11']-1)!=0)?($row['bron11']-1)."+":""))."d".(1+$row['bron1']-$row['bron11']).")<br>":"")."
		".(($row['bron2']!=0)?"Х Ѕрон€ корпуса: {$row['bron22']}-{$row['bron2']} (".(((($row['bron22']-1)!=0)?($row['bron22']-1)."+":""))."d".(1+$row['bron2']-$row['bron22']).")<br>":"")."
		".(($row['bron3']!=0)?"Х Ѕрон€ по€са: {$row['bron33']}-{$row['bron3']} (".(((($row['bron33']-1)!=0)?($row['bron33']-1)."+":""))."d".(1+$row['bron3']-$row['bron33']).")<br>":"")."
		".(($row['bron4']!=0)?"Х Ѕрон€ ног: {$row['bron44']}-{$row['bron4']} (".(((($row['bron44']-1)!=0)?($row['bron44']-1)."+":""))."d".(1+$row['bron4']-$row['bron44']).")<br>":"")."

		".(($row['add_stats'] && !$row['count'])?"Х  оличество увеличений: {$row['add_stats']}<BR>
		Х —ила: {$row['gsila']}<a href=\"upd.php?id=".($row['id'])."&p=1\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		Х Ћовкость: {$row['glovk']}<a href=\"upd.php?id=".($row['id'])."&p=2\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		Х »нтуици€: {$row['ginta']}<a href=\"upd.php?id=".($row['id'])."&p=3\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		Х »нтеллект: {$row['gintel']}<a href=\"upd.php?id=".($row['id'])."&p=4\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		":"")."
		".(($row['add_stats'] && $row['count'])?"Х  оличество увеличений: {$row['add_stats']}<BR>":"")."
        ".(($row['attacka'])?"Х ƒополнительный удар: +{$row['attacka']}<BR>":"")."
		".(($row['mfdhit'])?"Х «ащита от урона: ".(($row['mfdhit']>0)?"+":"")."{$row['mfdhit']}%<BR>":"")."
		".(($row['mfdmag'])?"Х «ащита от магии: ".(($row['mfdmag']>0)?"+":"")."{$row['mfdmag']}%<BR>":"")."
		".(($row['mfdfire'])?"Х «ащита от магии ќгн€: ".(($row['mfdfire']>0)?"+":"")."{$row['mfdfire']}%<BR>":"")."
        ".(($row['mfdair'])?"Х «ащита от магии ¬оздуха: ".(($row['mfdair']>0)?"+":"")."{$row['mfdair']}%<BR>":"")."
        ".(($row['mfdwater'])?"Х «ащита от магии ¬оды: ".(($row['mfdwater']>0)?"+":"")."{$row['mfdwater']}%<BR>":"")."
        ".(($row['mfdearth'])?"Х «ащита от магии «емли: ".(($row['mfdearth']>0)?"+":"")."{$row['mfdearth']}%<BR>":"")."
        ".(($row['mffire'])?"Х ћф. мощности урона ќгн€: ".(($row['mffire']>0)?"+":"")."{$row['mffire']}%<BR>":"")."
        ".(($row['mfair'])?"Х ћф. мощности урона ¬оздуха: ".(($row['mfair']>0)?"+":"")."{$row['mfair']}%<BR>":"")."
        ".(($row['mfwater'])?"Х ћф. мощности урона ¬оды: ".(($row['mfwater']>0)?"+":"")."{$row['mfwater']}%<BR>":"")."
        ".(($row['mfearth'])?"Х ћф. мощности урона «емли: ".(($row['mfearth']>0)?"+":"")."{$row['mfearth']}%<BR>":"")."
        ".(($row['mfhitp'])?"Х ћф. мощности урона: ".(($row['mfhitp']>0)?"+":"")."{$row['mfhitp']}%<BR>":"")."
		".(($row['mfmagp'])?"Х ћф. мощности магии стихий: ".(($row['mfmagp']>0)?"+":"")."{$row['mfmagp']}%<BR>":"")."
		".(($row['mfpodav'])?"Х ћф. подавлени€ защиты от магии: ".(($row['mfpodav']>0)?"+":"")."{$row['mfpodav']}%<BR>":"")."
		".(($row['mfrub'])?"Х ћф. мощности руб€щго урона: ".(($row['mfrub']>0)?"+":"")."{$row['mfrub']}%<BR>":"")."
		".(($row['mfkol'])?"Х ћф. мощности колющего урона: ".(($row['mfkol']>0)?"+":"")."{$row['mfkol']}%<BR>":"")."
		".(($row['mfdrob'])?"Х ћф. мощности дроб€щего урона: ".(($row['mfdrob']>0)?"+":"")."{$row['mfdrob']}%<BR>":"")."
		".(($row['mfrej'])?"Х  ћф. мощности режущего урона: ".(($row['mfrej']>0)?"+":"")."{$row['mfrej']}%<BR>":"")."
		".(($row['gmeshok'])?"Х ”величивает рюкзак: +{$row['gmeshok']}<BR>":"")."
		".(($row['letter'])?" оличество символов: ".strlen($row['letter'])."</div>":"")."
		".(($row['letter'])?"Ќа бумаге записан текст:<div style='background-color:FAF0E6;'> ".nl2br($row['letter'])."</div>":"")."
		
		".(($row['minu'] OR $row['maxu'] OR $row['mfproboi'] OR $row['mfruburon'] OR $row['mfrejuron'])?"<b>—войства предмета:</b><BR>":"")."
        
       
        ".(($row['minu'])?"Х ћинимальное наносимое повреждение: {$row['minu']}<BR>":"")."
		".(($row['maxu'])?"Х ћаксимальное наносимое повреждение: {$row['maxu']}<BR>":"")."
        ".(($row['mfproboi'])?"Х ћф. пробо€ брони: ".(($row['mfproboi']>0)?"+":"")."{$row['mfproboi']}%<BR>":"")."
        ".(($row['mfruburon'])?"Х ћф. мощности руб€щего урона: ".(($row['mfruburon']>0)?"+":"")."{$row['mfruburon']}%<BR>":"")."
        ".(($row['mfrejuron'])?"Х ћф. мощности режущего урона: ".(($row['mfrejuron']>0)?"+":"")."{$row['mfrejuron']}%<BR>":"")."
       	".(($row['k_kach']>0 or $row['r_kach']>0 or $row['d_kach']>0 or $row['z_kach']>0)?"<b>ќсобенности:</b><br />":"")."
         ".(($row['k_kach']>0)?"Х  олющие атаки:":"")."
         ".(($row['k_kach']==10)?" –едки<br />":"")."
		 ".(($row['k_kach']==30)?" ћалы<br />":"")."
		 ".(($row['k_kach']==50)?" ¬ременами<br />":"")."
		 ".(($row['k_kach']==70)?" „асты<br />":"")."
         ".(($row['r_kach']>0)?"Х –уб€щие атаки:":"")."
         ".(($row['r_kach']==10)?" –едки<br />":"")."
		 ".(($row['r_kach']==30)?" ћалы<br />":"")."
		 ".(($row['r_kach']==50)?" ¬ременами<br />":"")."
		 ".(($row['r_kach']==70)?" „асты<br />":"")."
         ".(($row['d_kach']>0)?"Х ƒроб€щие атаки:":"")."
         ".(($row['d_kach']==10)?" –едки<br />":"")."
		 ".(($row['d_kach']==30)?" ћалы<br />":"")."
		 ".(($row['d_kach']==50)?" ¬ременами<br />":"")."
		 ".(($row['d_kach']==70)?" „асты<br />":"")."
         ".(($row['z_kach']>0)?"Х –ежущие атаки:":"")."
         ".(($row['z_kach']==10)?" –едки<br />":"")."
		 ".(($row['z_kach']==30)?" ћалы<br />":"")."
		 ".(($row['z_kach']==50)?" ¬ременами<br />":"")."
		 ".(($row['z_kach']==70)?" „асты<br />":"")."
		 
		 ".(($row['complect_id']>0)?"„асть комплекта: ".echoComplect($row['complect_id'])."<BR>":"")."   
		
         ".((($row['type'] == 25 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".((($row['type'] == 29 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		
        ".((($row['type'] == 188 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".(($row['text'])?"Ќа ручке выгравирована надпись:<center>".$row['text']."</center><BR>":"")."
	   
		".(($incmagic['max'])?"	¬строено закл€тие <img src=\"i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." шт.	<BR>":"")."
		".(($row['type']==27)?"<small><b>ќписание:</b><BR><font color=maroon>ќдеваетс€ под броню</font></small><BR>":"")."
		".(($row['type']==28)?"<small><b>ќписание:</b><BR><font color=maroon>ќдеваетс€ поверх брони</font></small><BR>":"")."
		".(($row['podzem'])?"<small><font color=maroon>ѕредмет из подземель€</font></small><BR>":"")."
		      
        
        ".(($row['second'])?"<small><b>ќписание:</b><BR><font style='font-size:11px; color:#990000'>¬торое оружие</font></small><BR>":"")."
        
         

        ".((!$row['isrep'])?" ":"")."
        ".(($row['dvur'])?"<small><b>ќписание:</b><BR><font color=maroon>ƒвуручное оружие</font></small><BR>":"")."
		
        
        ".(($row['opisan'])?"<small>".$row['opisan']."</small><BR>":"")."
        ".(($row['magic']>0 && $row['show']==1)?"\r\n<br/><font style='font-size:11px; color:#990000'>¬строена маги€:</font> {$magic['name']} <img src=\"i/magic/".$magic['img']."\" alt=\"".$magic['name']."\"><BR>":"");
        
        
		
       }
       else { echo "<font color=maroon><B>—войства предмета не идентифицированы</B></font><BR>"; }
                
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
		echo "<small>—делано в Devilscity</small></td></TR>";
}
	
	echo '<HTML><HEAD><TITLE>Ѕойцовский клуб [ »нформаци€ о предмете ]</TITLE>
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