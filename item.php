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
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (Масса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destinyinv']}.gif alt=\"Этот предмет связан с Вами общей судьбой. Вы не можете передать его кому-либо еще.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще." ALT="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
	}
elseif ($row['destiny']>0) {
		echo "<a href=#>{$row['name']}</a><img src=i/align_{$row['nalign']}.gif> (Масса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif alt=\"Этот предмет будет связан с Вами общей судьбой. Вы не сможете передать его кому-либо еще.\"><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще." ALT="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
	}else{
	echo "<a href=#>{$row['name']}</a>";if($row['koll']>'0'){echo " <b>(x{$row['koll']})</b>";}print"<img src=i/align_{$row['nalign']}.gif> (Масса: {$row['massa']})<img src=http://img.bestcombats.net/klan/{$row['clan']}.gif><img src=i/destiny{$row['destiny']}.gif><img src=i/artefact{$row['artefact']}.gif>".(($row['present'])?' <IMG SRC="i/podarok.gif" WIDTH="16" HEIGHT="18" BORDER=0 TITLE="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще." ALT="Этот предмет вам подарил '.$row['present'].'. Вы не сможете передать этот предмет кому-либо еще.">':"")."<BR>";
}

	echo "<b>Владелец: <font color=green>{$row['login']}</font></b> &nbsp; &nbsp;<br>";
	if($row['ecost']>0) { echo "<b>Цена: {$row['ecost']} екр.</b> &nbsp; &nbsp;"; } elseif($row['cost']>0) { echo "<b>Цена: {$row['cost']} кр.</b> &nbsp; &nbsp;"; }
	
if($row['type']!=200){
		echo "<BR>Долговечность: {$row['duration']}/{$row['maxdur']}<BR>";
}
if (!$row['needident']) {
		echo (($magic['chanse'])?"Вероятность срабатывания: ".$magic['chanse']."%<BR>":"")."
		 ".(($row['goden'])?"Срок годности: {$row['goden']} дн. ".((!$row['count'])?"(до ".date("Y.m.d H:i",$row['dategoden']).")":"")."<BR>":"")."
        ".(($magic['time'])?"Продолжительность действия магии: ".$magic['time']." мин.<BR>":"")."
		".(($row['nsila'] OR $row['nlovk'] OR $row['ninta'] OR $row['nvinos'] OR $row['nlevel'] OR $row['nintel'] OR $row['nmudra'] OR $row['nnoj'] OR $row['ntopor'] OR $row['ndubina'] OR $row['nmech'] OR $row['nposoh'] OR $row['nfire'] OR $row['nwater'] OR $row['nair'] OR $row['nearth'] OR $row['nearth'] OR $row['nlight'] OR $row['ngray'] OR $row['ndark'])?"<b>Требуется минимальное:</b><BR>":"")."
		".(($row['nlevel']>0)?"• ".(($row['nlevel'] > $user['level'])?"<font color=red>":"")."Уровень: {$row['nlevel']}</font><BR>":"")."
		".(($row['nsila']>0)?"• ".(($row['nsila'] > $user['sila'])?"<font color=red>":"")."Сила: {$row['nsila']}</font><BR>":"")."
		".(($row['nlovk']>0)?"• ".(($row['nlovk'] > $user['lovk'])?"<font color=red>":"")."Ловкость: {$row['nlovk']}</font><BR>":"")."
		".(($row['ninta']>0)?"• ".(($row['ninta'] > $user['inta'])?"<font color=red>":"")."Интуиция: {$row['ninta']}</font><BR>":"")."
		".(($row['nvinos']>0)?"• ".(($row['nvinos'] > $user['vinos'])?"<font color=red>":"")."Выносливость: {$row['nvinos']}</font><BR>":"")."
		".(($row['nintel']>0)?"• ".(($row['nintel'] > $user['intel'])?"<font color=red>":"")."Интеллект: {$row['nintel']}</font><BR>":"")."
		".(($row['nmudra']>0)?"• ".(($row['nmudra'] > $user['mudra'])?"<font color=red>":"")."Мудрость: {$row['nmudra']}</font><BR>":"")."
		".(($row['nnoj']>0)?"• ".(($row['nnoj'] > $user['noj'])?"<font color=red>":"")."Мастерство владения ножами и кастетами: {$row['nnoj']}</font><BR>":"")."
		".(($row['ntopor']>0)?"• ".(($row['ntopor'] > $user['topor'])?"<font color=red>":"")."Мастерство владения топорами и секирами: {$row['ntopor']}</font><BR>":"")."
		".(($row['ndubina']>0)?"• ".(($row['ndubina'] > $user['dubina'])?"<font color=red>":"")."Мастерство владения дубинами и булавами: {$row['ndubina']}</font><BR>":"")."
		".(($row['nmech']>0)?"• ".(($row['nmech'] > $user['mec'])?"<font color=red>":"")."Мастерство владения мечами: {$row['nmech']}</font><BR>":"")."
		".(($row['nposoh']>0)?"• ".(($row['nposoh'] > $user['posoh'])?"<font color=red>":"")."Мастерство владения посохами: {$row['nposoh']}</font><BR>":"")."
		".(($row['nfire']>0)?"• ".(($row['nfire'] > $user['mfire'])?"<font color=red>":"")."Мастерство владения стихией Огня: {$row['nfire']}</font><BR>":"")."
		".(($row['nwater']>0)?"• ".(($row['nwater'] > $user['mwater'])?"<font color=red>":"")."Мастерство владения стихией Воды: {$row['nwater']}</font><BR>":"")."
		".(($row['nair']>0)?"• ".(($row['nair'] > $user['mair'])?"<font color=red>":"")."Мастерство владения стихией Воздуха: {$row['nair']}</font><BR>":"")."
		".(($row['nearth']>0)?"• ".(($row['nearth'] > $user['mearth'])?"<font color=red>":"")."Мастерство владения стихией Земли: {$row['nearth']}</font><BR>":"")."
		".(($row['nlight']>0)?"• ".(($row['nlight'] > $user['mlight'])?"<font color=red>":"")."Мастерство владения магией Света: {$row['nlight']}</font><BR>":"")."
		".(($row['ngray']>0)?"• ".(($row['ngray'] > $user['mgray'])?"<font color=red>":"")."Мастерство владения серой магией: {$row['ngray']}</font><BR>":"")."
		".(($row['ndark']>0)?"• ".(($row['ndark'] > $user['mdark'])?"<font color=red>":"")."Мастерство владения магией Тьмы: {$row['ndark']}</font><BR>":"")."
        ".(($row['mfhitp'] OR $row['mfmagp'] OR $row['mfpodav'] OR $row['attacka'] OR $row['add_stats'] OR $row['gsila'] OR $row['mfdhit'] OR $row['mfdmag']  OR $row['mfkritpow']  OR $row['mfantikritpow'] OR $row['mfparir']  OR $row['mfshieldblock'] OR $row['mfcontr']  OR $row['mfrub'] OR $row['mfkol']  OR $row['mfdrob'] OR $row['mfrej'] OR $row['mfkrit'] OR $row['mfakrit']  OR $row['mfuvorot'] OR $row['mfauvorot']  OR $row['glovk'] OR $row['ghp'] OR $row['gmana'] OR $row['ginta'] OR $row['gintel'] OR $row['gnoj'] OR $row['gtopor'] OR $row['gdubina'] OR $row['gmech']  OR $row['gposoh'] OR $row['gfire'] OR $row['gwater'] OR $row['gair'] OR $row['gearth'] OR $row['gearth'] OR $row['glight'] OR $row['ggray'] OR $row['gdark'] OR $row['bron1'] OR $row['bron2'] OR $row['bron3'] OR $row['bron4'] OR $row['givebuter'])?"<b>Действует на:</b><BR>":"")."
		".(($row['deistvie'] && $row['show']==1)?"<b>Действует на:</b><BR>• ".$row['deistvie']."<BR> ":"")."
		
       
		
        ".(($row['givebuter'])?"•Уровень жизниь (HP): ".(($row['givebuter']>0)?"+":"")."{$row['givebuter']}<BR>":"")."
		".(($row['gsila'])?"• Сила: ".(($row['gsila']>0)?"+":"")."{$row['gsila']}<BR>":"")."
		".(($row['glovk'])?"• Ловкость: ".(($row['glovk']>0)?"+":"")."{$row['glovk']}<BR>":"")."
		".(($row['ginta'])?"• Интуиция: ".(($row['ginta']>0)?"+":"")."{$row['ginta']}<BR>":"")."
		".(($row['gintel'])?"• Интеллект: ".(($row['gintel']>0)?"+":"")."{$row['gintel']}<BR>":"")."
		".(($row['ghp'])?"• Уровень жизни: +{$row['ghp']}<BR>":"")."
		".(($row['gmana'])?"• Уровень маны: +{$row['gmana']}<BR>":"")."
		".(($row['mfkrit'])?"• Мф. критических ударов: ".(($row['mfkrit']>0)?"+":"")."{$row['mfkrit']}%<BR>":"")."
		".(($row['mfakrit'])?"• Мф. против крит. ударов: ".(($row['mfakrit']>0)?"+":"")."{$row['mfakrit']}%<BR>":"")."
		".(($row['mfkritpow'])?"• Мф. мощности крит. удара: ".(($row['mfkritpow']>0)?"+":"")."{$row['mfkritpow']}%<BR>":"")."
		".(($row['mfantikritpow'])?"• Мф. против мощ. крит. удара: ".(($row['mfantikritpow']>0)?"+":"")."{$row['mfantikritpow']}%<BR>":"")."
		".(($row['mfparir'])?"• Мф. парирования: ".(($row['mfparir']>0)?"+":"")."{$row['mfparir']}%<BR>":"")."
		".(($row['mfshieldblock'])?"• Мф. блока щитом: ".(($row['mfshieldblock']>0)?"+":"")."{$row['mfshieldblock']}%<BR>":"")."
		".(($row['mfcontr'])?"• Мф. контрудара: ".(($row['mfcontr']>0)?"+":"")."{$row['mfcontr']}%<BR>":"")."
		".(($row['mfuvorot'])?"• Мф. увертливости: ".(($row['mfuvorot']>0)?"+":"")."{$row['mfuvorot']}%<BR>":"")."
		".(($row['mfauvorot'])?"• Мф. против увертлив.: ".(($row['mfauvorot']>0)?"+":"")."{$row['mfauvorot']}%<BR>":"")."
		".(($row['gnoj'])?"• Мастерство владения ножами и кастетами: +{$row['gnoj']}<BR>":"")."
		".(($row['gtopor'])?"• Мастерство владения топорами и секирами: +{$row['gtopor']}<BR>":"")."
		".(($row['gdubina'])?"• Мастерство владения дубинами и булавами: +{$row['gdubina']}<BR>":"")."
		".(($row['gmech'])?"• Мастерство владения мечами: +{$row['gmech']}<BR>":"")."
		".(($row['gposoh'])?"• Мастерство владения посохами: +{$row['gposoh']}<BR>":"")."
		".(($row['gfire'])?"• Мастерство владения стихией Огня: +{$row['gfire']}<BR>":"")."
		".(($row['gwater'])?"• Мастерство владения стихией Воды: +{$row['gwater']}<BR>":"")."
		".(($row['gair'])?"• Мастерство владения стихией Воздуха: +{$row['gair']}<BR>":"")."
		".(($row['gearth'])?"• Мастерство владения стихией Земли: +{$row['gearth']}<BR>":"")."
		".(($row['glight'])?"• Мастерство владения магией Света: +{$row['glight']}<BR>":"")."
		".(($row['ggray'])?"• Мастерство владения серой магией: +{$row['ggray']}<BR>":"")."
	    ".(($row['gdark'])?"• Мастерство владения магией Тьмы: +{$row['gdark']}<BR>":"").""
       
     
         .(($row['bron1']!=0)?"• Броня головы: {$row['bron11']}-{$row['bron1']} (".(((($row['bron11']-1)!=0)?($row['bron11']-1)."+":""))."d".(1+$row['bron1']-$row['bron11']).")<br>":"")."
		".(($row['bron2']!=0)?"• Броня корпуса: {$row['bron22']}-{$row['bron2']} (".(((($row['bron22']-1)!=0)?($row['bron22']-1)."+":""))."d".(1+$row['bron2']-$row['bron22']).")<br>":"")."
		".(($row['bron3']!=0)?"• Броня пояса: {$row['bron33']}-{$row['bron3']} (".(((($row['bron33']-1)!=0)?($row['bron33']-1)."+":""))."d".(1+$row['bron3']-$row['bron33']).")<br>":"")."
		".(($row['bron4']!=0)?"• Броня ног: {$row['bron44']}-{$row['bron4']} (".(((($row['bron44']-1)!=0)?($row['bron44']-1)."+":""))."d".(1+$row['bron4']-$row['bron44']).")<br>":"")."

		".(($row['add_stats'] && !$row['count'])?"• Количество увеличений: {$row['add_stats']}<BR>
		• Сила: {$row['gsila']}<a href=\"upd.php?id=".($row['id'])."&p=1\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		• Ловкость: {$row['glovk']}<a href=\"upd.php?id=".($row['id'])."&p=2\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		• Интуиция: {$row['ginta']}<a href=\"upd.php?id=".($row['id'])."&p=3\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		• Интеллект: {$row['gintel']}<a href=\"upd.php?id=".($row['id'])."&p=4\"><img src=\"i/up.gif\" alt=\"\"></a><br>
		":"")."
		".(($row['add_stats'] && $row['count'])?"• Количество увеличений: {$row['add_stats']}<BR>":"")."
        ".(($row['attacka'])?"• Дополнительный удар: +{$row['attacka']}<BR>":"")."
		".(($row['mfdhit'])?"• Защита от урона: ".(($row['mfdhit']>0)?"+":"")."{$row['mfdhit']}%<BR>":"")."
		".(($row['mfdmag'])?"• Защита от магии: ".(($row['mfdmag']>0)?"+":"")."{$row['mfdmag']}%<BR>":"")."
		".(($row['mfdfire'])?"• Защита от магии Огня: ".(($row['mfdfire']>0)?"+":"")."{$row['mfdfire']}%<BR>":"")."
        ".(($row['mfdair'])?"• Защита от магии Воздуха: ".(($row['mfdair']>0)?"+":"")."{$row['mfdair']}%<BR>":"")."
        ".(($row['mfdwater'])?"• Защита от магии Воды: ".(($row['mfdwater']>0)?"+":"")."{$row['mfdwater']}%<BR>":"")."
        ".(($row['mfdearth'])?"• Защита от магии Земли: ".(($row['mfdearth']>0)?"+":"")."{$row['mfdearth']}%<BR>":"")."
        ".(($row['mffire'])?"• Мф. мощности урона Огня: ".(($row['mffire']>0)?"+":"")."{$row['mffire']}%<BR>":"")."
        ".(($row['mfair'])?"• Мф. мощности урона Воздуха: ".(($row['mfair']>0)?"+":"")."{$row['mfair']}%<BR>":"")."
        ".(($row['mfwater'])?"• Мф. мощности урона Воды: ".(($row['mfwater']>0)?"+":"")."{$row['mfwater']}%<BR>":"")."
        ".(($row['mfearth'])?"• Мф. мощности урона Земли: ".(($row['mfearth']>0)?"+":"")."{$row['mfearth']}%<BR>":"")."
        ".(($row['mfhitp'])?"• Мф. мощности урона: ".(($row['mfhitp']>0)?"+":"")."{$row['mfhitp']}%<BR>":"")."
		".(($row['mfmagp'])?"• Мф. мощности магии стихий: ".(($row['mfmagp']>0)?"+":"")."{$row['mfmagp']}%<BR>":"")."
		".(($row['mfpodav'])?"• Мф. подавления защиты от магии: ".(($row['mfpodav']>0)?"+":"")."{$row['mfpodav']}%<BR>":"")."
		".(($row['mfrub'])?"• Мф. мощности рубящго урона: ".(($row['mfrub']>0)?"+":"")."{$row['mfrub']}%<BR>":"")."
		".(($row['mfkol'])?"• Мф. мощности колющего урона: ".(($row['mfkol']>0)?"+":"")."{$row['mfkol']}%<BR>":"")."
		".(($row['mfdrob'])?"• Мф. мощности дробящего урона: ".(($row['mfdrob']>0)?"+":"")."{$row['mfdrob']}%<BR>":"")."
		".(($row['mfrej'])?"•  Мф. мощности режущего урона: ".(($row['mfrej']>0)?"+":"")."{$row['mfrej']}%<BR>":"")."
		".(($row['gmeshok'])?"• Увеличивает рюкзак: +{$row['gmeshok']}<BR>":"")."
		".(($row['letter'])?"Количество символов: ".strlen($row['letter'])."</div>":"")."
		".(($row['letter'])?"На бумаге записан текст:<div style='background-color:FAF0E6;'> ".nl2br($row['letter'])."</div>":"")."
		
		".(($row['minu'] OR $row['maxu'] OR $row['mfproboi'] OR $row['mfruburon'] OR $row['mfrejuron'])?"<b>Свойства предмета:</b><BR>":"")."
        
       
        ".(($row['minu'])?"• Минимальное наносимое повреждение: {$row['minu']}<BR>":"")."
		".(($row['maxu'])?"• Максимальное наносимое повреждение: {$row['maxu']}<BR>":"")."
        ".(($row['mfproboi'])?"• Мф. пробоя брони: ".(($row['mfproboi']>0)?"+":"")."{$row['mfproboi']}%<BR>":"")."
        ".(($row['mfruburon'])?"• Мф. мощности рубящего урона: ".(($row['mfruburon']>0)?"+":"")."{$row['mfruburon']}%<BR>":"")."
        ".(($row['mfrejuron'])?"• Мф. мощности режущего урона: ".(($row['mfrejuron']>0)?"+":"")."{$row['mfrejuron']}%<BR>":"")."
       	".(($row['k_kach']>0 or $row['r_kach']>0 or $row['d_kach']>0 or $row['z_kach']>0)?"<b>Особенности:</b><br />":"")."
         ".(($row['k_kach']>0)?"• Колющие атаки:":"")."
         ".(($row['k_kach']==10)?" Редки<br />":"")."
		 ".(($row['k_kach']==30)?" Малы<br />":"")."
		 ".(($row['k_kach']==50)?" Временами<br />":"")."
		 ".(($row['k_kach']==70)?" Часты<br />":"")."
         ".(($row['r_kach']>0)?"• Рубящие атаки:":"")."
         ".(($row['r_kach']==10)?" Редки<br />":"")."
		 ".(($row['r_kach']==30)?" Малы<br />":"")."
		 ".(($row['r_kach']==50)?" Временами<br />":"")."
		 ".(($row['r_kach']==70)?" Часты<br />":"")."
         ".(($row['d_kach']>0)?"• Дробящие атаки:":"")."
         ".(($row['d_kach']==10)?" Редки<br />":"")."
		 ".(($row['d_kach']==30)?" Малы<br />":"")."
		 ".(($row['d_kach']==50)?" Временами<br />":"")."
		 ".(($row['d_kach']==70)?" Часты<br />":"")."
         ".(($row['z_kach']>0)?"• Режущие атаки:":"")."
         ".(($row['z_kach']==10)?" Редки<br />":"")."
		 ".(($row['z_kach']==30)?" Малы<br />":"")."
		 ".(($row['z_kach']==50)?" Временами<br />":"")."
		 ".(($row['z_kach']==70)?" Часты<br />":"")."
		 
		 ".(($row['complect_id']>0)?"Часть комплекта: ".echoComplect($row['complect_id'])."<BR>":"")."   
		
         ".((($row['type'] == 25 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".((($row['type'] == 29 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		
        ".((($row['type'] == 188 &&  $row['show']==1))?"<font color=maroon>:</font> ".$magic['name']."<BR>":"")."
		".(($row['text'])?"На ручке выгравирована надпись:<center>".$row['text']."</center><BR>":"")."
	   
		".(($incmagic['max'])?"	Встроено заклятие <img src=\"i/magic/".$incmagic['img']."\" alt=\"".$incmagic['name']."\"> ".$incmagic['cur']." шт.	<BR>":"")."
		".(($row['type']==27)?"<small><b>Описание:</b><BR><font color=maroon>Одевается под броню</font></small><BR>":"")."
		".(($row['type']==28)?"<small><b>Описание:</b><BR><font color=maroon>Одевается поверх брони</font></small><BR>":"")."
		".(($row['podzem'])?"<small><font color=maroon>Предмет из подземелья</font></small><BR>":"")."
		      
        
        ".(($row['second'])?"<small><b>Описание:</b><BR><font style='font-size:11px; color:#990000'>Второе оружие</font></small><BR>":"")."
        
         

        ".((!$row['isrep'])?" ":"")."
        ".(($row['dvur'])?"<small><b>Описание:</b><BR><font color=maroon>Двуручное оружие</font></small><BR>":"")."
		
        
        ".(($row['opisan'])?"<small>".$row['opisan']."</small><BR>":"")."
        ".(($row['magic']>0 && $row['show']==1)?"\r\n<br/><font style='font-size:11px; color:#990000'>Встроена магия:</font> {$magic['name']} <img src=\"i/magic/".$magic['img']."\" alt=\"".$magic['name']."\"><BR>":"");
        
        
		
       }
       else { echo "<font color=maroon><B>Свойства предмета не идентифицированы</B></font><BR>"; }
                
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
		echo "<small>Сделано в Devilscity</small></td></TR>";
}
	
	echo '<HTML><HEAD><TITLE>Бойцовский клуб [ Информация о предмете ]</TITLE>
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