<?
include "../forum.capitamiken.timhost.ru/connect.php";

function translitIt($str) {
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

Function filter_msg($msg){
	$original=$msg;
	### Переводим все в нижний регистр
	$msg=mb_strtolower($msg);

	### Убираем точки, ковычки, тире, запятые, подчеркивания
	$msg=str_replace(' ','',$msg);
	
	If (substr_count($msg,"u.to/") or substr_count(strrev($msg),"u.to/")
	
	){
		mysql_query("insert into `temp_chat_filter`(`owner`,`message`,`original`)values('".$_SESSION['uid']."','".$msg."','".$original."')");
		return 1;	
	}
	
	
	$msg = preg_replace("/[^a-zA-Zа-яА-ЯЁё\d]/","", $msg);
	
	
	$msg=str_replace('Я','я',$msg); ## Исключение, какго-то хера
	$msg=str_replace('Ё','ё',$msg); ## Исключение, какго-то хера
	$msg=str_replace('Ч','ч',$msg); ## Исключение, какго-то хера

	$msg=str_replace('k','c',$msg); ## Исключение, какго-то хера

	### Переводим все через фильтр транслита
	$msg=translitIt($msg);

	### проверяем на наличие вредоносных слов     
	If (
include'chat/antispam.txt';	
		
	){
		mysql_query("insert into `temp_chat_filter`(`owner`,`message`,`original`)values('".$_SESSION['uid']."','".$msg."','".$original."')");
		return 1;
	}
}
?>