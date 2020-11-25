<?php
		//If ($_SERVER['REMOTE_ADDR']!='176.37.62.46'){die();}

		include "/var/www/rbc/data/www/test.old-bk.ru/connect.php";

?>

<form method=get>
	<fieldset>
		<legend>текстовое сообщение</legend>
		<table>
			<tr><td><input size=200 type='text' name='text' value='<?=$_GET['text']?>'></td><td><input type=submit value='профильтровать ->'></td></tr>
		</table>
	</fieldset>
</form>

<?
function translitIt($str) 
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"C","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"C","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"c","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"c","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
    );
    return strtr($str,$tr);
}


### Переводим все в нижний регистр
$_GET['text']=mb_strtolower($_GET['text']);

	### Убираем точки, ковычки, тире, запятые, подчеркивания
	$_GET['text']=str_replace('.','',$_GET['text']);
	$_GET['text']=str_replace(',','',$_GET['text']);
	$_GET['text']=str_replace('(','',$_GET['text']);
	$_GET['text']=str_replace(')','',$_GET['text']);
	$_GET['text']=str_replace('-','',$_GET['text']);
	$_GET['text']=str_replace('_','',$_GET['text']);
	$_GET['text']=str_replace(' ','',$_GET['text']);
	$_GET['text']=str_replace('*','',$_GET['text']);

	$_GET['text']=str_replace('Я','я',$_GET['text']); ## Исключение, какго-то хера
	$_GET['text']=str_replace('Ё','ё',$_GET['text']); ## Исключение, какго-то хера
	$_GET['text']=str_replace('Ч','ч',$_GET['text']); ## Исключение, какго-то хера

	$_GET['text']=str_replace('k','c',$_GET['text']); ## Исключение, какго-то хера

### Переводим все через фильтр транслита
$_GET['text']=translitIt($_GET['text']);

### проверяем на наличие вредоносных слов
If (
	substr_count($_GET['text'],"cruelworld") or 
	substr_count($_GET['text'],"onebc") or 
	substr_count($_GET['text'],"ardaniya") or 
	substr_count($_GET['text'],"oldbc") or 
	substr_count($_GET['text'],"recombats")

){echo "<font color=RED>Найдено впедоное слово!</font><br/>";}



echo "Финальный вариант: ".$_GET['text'];

//$users_u=mysql_query("SELECT * from `users` where `login` like '%у'  ");

while ($users_u_w=mysql_fetch_array($users_u)){
	echo $users_u_w['login']."<br/>";
}
?>