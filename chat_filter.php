<?
include "../forum.capitamiken.timhost.ru/connect.php";

function translitIt($str) {
    $tr = array(
        "�"=>"A","�"=>"B","�"=>"V","�"=>"G",
        "�"=>"D","�"=>"E","�"=>"J","�"=>"Z","�"=>"I",
        "�"=>"Y","�"=>"C","�"=>"L","�"=>"M","�"=>"N",
        "�"=>"O","�"=>"P","�"=>"R","�"=>"C","�"=>"T",
        "�"=>"U","�"=>"F","�"=>"H","�"=>"TS","�"=>"CH",
        "�"=>"SH","�"=>"SCH","�"=>"","�"=>"YI","�"=>"",
        "�"=>"E","�"=>"YU","�"=>"YA","�"=>"a","�"=>"b",
        "�"=>"v","�"=>"g","�"=>"d","�"=>"e","�"=>"j",
        "�"=>"z","�"=>"i","�"=>"y","�"=>"c","�"=>"l",
        "�"=>"m","�"=>"n","�"=>"o","�"=>"p","�"=>"r",
        "�"=>"c","�"=>"t","�"=>"u","�"=>"f","�"=>"h",
        "�"=>"ts","�"=>"ch","�"=>"sh","�"=>"sch","�"=>"y",
        "�"=>"yi","�"=>"","�"=>"e","�"=>"yu","�"=>"ya"
    );
    return strtr($str,$tr);
}

Function filter_msg($msg){
	$original=$msg;
	### ��������� ��� � ������ �������
	$msg=mb_strtolower($msg);

	### ������� �����, �������, ����, �������, �������������
	$msg=str_replace(' ','',$msg);
	
	If (substr_count($msg,"u.to/") or substr_count(strrev($msg),"u.to/")
	
	){
		mysql_query("insert into `temp_chat_filter`(`owner`,`message`,`original`)values('".$_SESSION['uid']."','".$msg."','".$original."')");
		return 1;	
	}
	
	
	$msg = preg_replace("/[^a-zA-Z�-��-ߨ�\d]/","", $msg);
	
	
	$msg=str_replace('�','�',$msg); ## ����������, �����-�� ����
	$msg=str_replace('�','�',$msg); ## ����������, �����-�� ����
	$msg=str_replace('�','�',$msg); ## ����������, �����-�� ����

	$msg=str_replace('k','c',$msg); ## ����������, �����-�� ����

	### ��������� ��� ����� ������ ���������
	$msg=translitIt($msg);

	### ��������� �� ������� ����������� ����     
	If (
include'chat/antispam.txt';	
		
	){
		mysql_query("insert into `temp_chat_filter`(`owner`,`message`,`original`)values('".$_SESSION['uid']."','".$msg."','".$original."')");
		return 1;
	}
}
?>