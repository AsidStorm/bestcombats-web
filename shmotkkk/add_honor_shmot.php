<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "../connect.php";	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	if ($user['align']>2 && ($user['align']<3)) {

?>
<form method=post action="add_honor_shmot.php">
<H4>Создать вещь "Ордена Чести"</H4>
<table>


<tr><td>Название </td><td><input type=text name=name value=''> </td></tr>
<tr><td>Картинка </td><td><input type=text name=img value=''> </td></tr>
<tr><td>Связан судьбой </td><td><input type=text name=destiny value="0"></td></tr>
<tr><td>Количество в магазине </td><td><input type=text name=count value="0"></td></tr>
<tr><td>Тип предмета 
	</td><td><select name="type">
			<option value="0"></option>
			<option value="3">Оружие</option>
			<option value="29">Стрелы</option>
			<option value="11">сапоги</option>
			<option value="27">Рубахи</option>
			<option value="9">перчатки</option>
			<option value="4">Броня</option>
			<option value="8">шлемы</option>
			<option value="22">наручи</option>
			<option value="23">пояса</option>
			<option value="24">поножи</option>
			<option value="29">плащи</option>
			<option value="10">Щиты</option>
			<option value="1">серьги</option>
			<option value="2">ожерелья</option>
			<option value="5">кольца</option>
			<option value="25">Заклинания</option>
			<option value="200">Прочее(Подарки)</option>
			<option value="50">Еда</option>
	</select> </td></tr>

<tr><td>Масса </td><td><input type=text name=massa value="0"> </td></tr>
<tr><td>Нужна идентификация </td><td><input type=text name=needident value="0"></td></tr>
<tr><td>Количество знаков </td><td><input type=text name=letter value="0"> </td></tr>
<tr><td>Может чиниться </td><td><input type=text name=isrep value="1"> </td></tr>
<tr><td>Годен до... </td><td><input type=text name=dategoden value="0"> </td></tr>
<tr><td>Раздел магазина 
	</td><td><select name="razdel">
			<option value="0"></option>
			<option value="1">Оружие: кастеты,ножи</option>
			<option value="11">Оружие: топоры</option>
			<option value="12">Оружие: дубины,булавы</option>
			<option value="13">Оружие: мечи</option>
			<option value="14">Оружие: Луки и стрелы</option>
			<option value="2">Одежда: сапоги</option>
			<option value="21">Одежда: перчатки</option>
			<option value="29">Одежда: Рубахи</option>
			<option value="22">Одежда: легкая броня</option>
			<option value="23">Одежда: тяжелая броня</option>
			<option value="24">Одежда: шлемы</option>
			<option value="25">Одежда: наручи</option>
			<option value="26">Одежда: пояса</option>
			<option value="27">Одежда: поножи</option>
			<option value="29">Одежда: плащи</option>
			<option value="3">Щиты</option>
			<option value="4">Ювелирные товары: серьги</option>
			<option value="41">Ювелирные товары: ожерелья</option>
			<option value="42">Ювелирные товары: кольца</option>
			<option value="5">Заклинания: нейтральные</option>
			<option value="51">3аклинания: боевые и защитные</option>
			<option value="6">Амуниция</option>
			<option value="7">Сувениры: открытки</option>
			<option value="71">Сувениры: подарки</option>
			<option value="50">Еда</option>
	</select> </td></tr>

<tr><td>Мин.износ  </td><td><input type=text name=duration  value="0"></td></tr>
<tr><td>Макс.износ  </td><td><input type=text name=maxdur  value="0"></td></tr>
<tr><td>Цена  </td><td><input type=text name=cost  value="0"></td></tr>
</table>
<b>Требования:</b>
<table>
<tr><td>Уровень  </td><td><input type=text name=nlevel  value="0"></td></tr>
<tr><td>Сила  </td><td><input type=text name=nsila  value="0"></td></tr>
<tr><td>Ловкость  </td><td><input type=text name=nlovk  value="0"></td></tr>
<tr><td>Интуиция  </td><td><input type=text name=ninta  value="0"></td></tr>
<tr><td>Вынос  </td><td><input type=text name=nvinos  value="0"></td></tr>
<tr><td>Интеллект </td><td><input type=text name=nintel value="0"> </td></tr>
<tr><td>Мудрость  </td><td><input type=text name=nmudra  value="0"></td></tr>
<tr><td>Ум.ножи  </td><td><input type=text name=nnoj  value="0"></td></tr>
<tr><td>Ум.топоры  </td><td><input type=text name=ntopor  value="0"></td></tr>
<tr><td>Ум.дубины  </td><td><input type=text name=ndubina  value="0"></td></tr>
<tr><td>Ум.мечи  </td><td><input type=text name=nmech  value="0"></td></tr>
<tr><td>Ум.посохи  </td><td><input type=text name=nposoh  value="0"></td></tr>
<tr><td>Склонность  </td><td><input type=text name=nalign  value="0"></td></tr>
<tr><td>Мастерство огня  </td><td><input type=text name=nfire  value="0"></td></tr>
<tr><td>Мастерство воды  </td><td><input type=text name=nwater  value="0"></td></tr>
<tr><td>Мастерство воздуха  </td><td><input type=text name=nair  value="0"></td></tr>
<tr><td>Мастерство земли  </td><td><input type=text name=nearth value="0"> </td></tr>
<tr><td>Светлая магия  </td><td><input type=text name=nlight  value="0"></td></tr>
<tr><td>Серая магия  </td><td><input type=text name=ngray  value="0"></td></tr>
<tr><td>Темная магия  </td><td><input type=text name=ndark  value="0"></td></tr>
</table>
<b>Дает Параметры</b>
<table>
<tr><td>Мин.урон </td><td><input type=text name=minu  value="0"></td></tr>
<tr><td>Макс.урон </td><td><input type=text name=maxu  value="0"></td></tr>
<tr><td>Сила </td><td><input type=text name=gsila  value="0"></td></tr>
<tr><td>Ловкость </td><td><input type=text name=glovk  value="0"></td></tr>
<tr><td>Инуиция </td><td><input type=text name=ginta  value="0"></td></tr>
<tr><td>Интеллект </td><td><input type=text name=gintel  value="0"></td></tr>
<tr><td>НР </td><td><input type=text name=ghp  value="0"></td></tr>
<tr><td>Мана </td><td><input type=text name=gmana  value="0"></td></tr>
<tr><td>Мф.удар </td><td><input type=text name=mfudar  value="0"></td></tr>
<tr><td>Мф.антиудар </td><td><input type=text name=mfantiudar  value="0"></td></tr>
<tr><td>Мф.крит </td><td><input type=text name=mfkrit  value="0"></td></tr>
<tr><td>Мф.антикрит </td><td><input type=text name=mfakrit  value="0"></td></tr>
<tr><td>Мф.уворот </td><td><input type=text name=mfuvorot  value="0"></td></tr>
<tr><td>Мф.антиуворот </td><td><input type=text name=mfauvorot  value="0"></td></tr>
<tr><td>Мф. Мощности Крита </td><td><input type=text name=mfkritpow  value="0"></td></tr>
<tr><td>Мф. Против Мощ. Крита </td><td><input type=text name=mfantikritpow  value="0"></td></tr>
<tr><td>Мф.мощности реж. ур. </td><td><input type=text name=mfrej  value="0"></td></tr>
<tr><td>Мф.мощности дроб. ур. </td><td><input type=text name=mfdrob  value="0"></td></tr>
<tr><td>Мф.мощности кол. ур. </td><td><input type=text name=mfkol  value="0"></td></tr>
<tr><td>Мф.мощности руб. ур. </td><td><input type=text name=mfrub  value="0"></td></tr>
<tr><td>Мф.+HP </td><td><input type=text name=plus_hp  value="0"></td></tr>
<tr><td>Защита от магии </td><td><input type=text name=mfdmag  value="0"></td></tr>
<tr><td>Защита от урона </td><td><input type=text name=mfdhit  value="0"></td></tr>
<tr><td>МФ.контрат </td><td><input type=text name=mfcontr  value="0"></td></tr>
<tr><td>МФ.парир </td><td><input type=text name=mfparir  value="0"></td></tr>
<tr><td>Мф. Блока Щитом </td><td><input type=text name=mfshieldblock  value="0"></td></tr>
<tr><td>Ум.ножи </td><td><input type=text name=gnoj  value="0"></td></tr>
<tr><td>Ум.топоры </td><td><input type=text name=gtopor  value="0"></td></tr>
<tr><td>Ум.дубины </td><td><input type=text name=gdubina  value="0"></td></tr>
<tr><td>Ум.мечи </td><td><input type=text name=gmech   value="0"></td></tr>
<tr><td>Ум.посохи  </td><td><input type=text name=gposoh  value="0"></td></tr>
<tr><td>Броня головы </td><td><input type=text name=bron1  value="0"></td></tr>
<tr><td>Броня корпуса </td><td><input type=text name=bron2  value="0"></td></tr>
<tr><td>Броня пояса </td><td><input type=text name=bron3  value="0"></td></tr>
<tr><td>Броня ног </td><td><input type=text name=bron4  value="0"></td></tr>
<tr><td>Мастерство огня </td><td><input type=text name=gfire  value="0"></td></tr>
<tr><td>Мастерство воды </td><td><input type=text name=gwater  value="0"></td></tr>
<tr><td>Мастерство воздуха </td><td><input type=text name=gair  value="0"></td></tr>
<tr><td>Мастерство земли </td><td><input type=text name=gearth  value="0"></td></tr>
<tr><td>Светлая магия </td><td><input type=text name=glight  value="0"></td></tr>
<tr><td>Серая магия </td><td><input type=text name=ggray  value="0"></td></tr>
<tr><td>Темная магия </td><td><input type=text name=gdark  value="0"></td></tr>
</table>
<INPUT TYPE="submit" value=" Добавить вещь ">
</form>

<?

 if ($_POST['name']) {
	if (mysql_query("insert into honor_shop (name,duration,maxdur,cost,nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,nnoj,ntopor,ndubina,nmech,nposoh,nalign,minu,maxu,gsila,glovk,ginta,gintel,ghp,gmana,plus_hp,mfudar,mfantiudar,mfkrit,mfakrit,mfuvorot,mfauvorot,mfkritpow,mfantikritpow,mfrej,mfdrob,mfkol,mfrub,mfdmag,mfdhit,mfcontr,mfparir,mfshieldblock,gnoj,gtopor,gdubina,gmech,gposoh,img,count,bron1,bron2,bron3,bron4,magic,type,massa,needident,nfire,nwater,nair,nearth,nlight,ngray,ndark,gfire,gwater,gair,gearth,glight,ggray,gdark,letter,isrep,dategoden,razdel,destiny) values ('".$_POST['name']."','".$_POST['duration']."','".$_POST['maxdur']."','".$_POST['cost']."','".$_POST['nlevel']."','".$_POST['nsila']."','".$_POST['nlovk']."','".$_POST['ninta']."','".$_POST['nvinos']."','".$_POST['nintel']."','".$_POST['nmudra']."','".$_POST['nnoj']."','".$_POST['ntopor']."','".$_POST['ndubina']."','".$_POST['nmech']."','".$_POST['nposoh']."','".$_POST['nalign']."','".$_POST['minu']."','".$_POST['maxu']."','".$_POST['gsila']."','".$_POST['glovk']."','".$_POST['ginta']."','".$_POST['gintel']."','".$_POST['ghp']."','".$_POST['gmana']."','".$_POST['plus_hp']."','".$_POST['mfudar']."','".$_POST['mfantiudar']."','".$_POST['mfkrit']."','".$_POST['mfakrit']."','".$_POST['mfuvorot']."','".$_POST['mfauvorot']."','".$_POST['mfkritpow']."','".$_POST['mfantikritpow']."','".$_POST['mfrej']."','".$_POST['mfdrob']."','".$_POST['mfkol']."','".$_POST['mfrub']."','".$_POST['mfdmag']."','".$_POST['mfdhit']."','".$_POST['mfcontr']."','".$_POST['mfparir']."','".$_POST['mfshieldblock']."','".$_POST['gnoj']."','".$_POST['gtopor']."','".$_POST['gdubina']."','".$_POST['gmech']."','".$_POST['gposoh']."','".$_POST['img']."','".$_POST['count']."','".$_POST['bron1']."','".$_POST['bron2']."','".$_POST['bron3']."','".$_POST['bron4']."','".$_POST['magic']."','".$_POST['type']."','".$_POST['massa']."','".$_POST['needident']."','".$_POST['nfire']."','".$_POST['nwater']."','".$_POST['nair']."','".$_POST['nearth']."','".$_POST['nlight']."','".$_POST['ngray']."','".$_POST['ndark']."','".$_POST['gfire']."','".$_POST['gwater']."','".$_POST['gair']."','".$_POST['gearth']."','".$_POST['glight']."','".$_POST['ggray']."','".$_POST['gdark']."','".$_POST['letter']."','".$_POST['isrep']."','".$_POST['dategoden']."','".$_POST['razdel']."');")) 	{
	echo "OK";
	}
else { echo "NO";}
 
 }
}
?>