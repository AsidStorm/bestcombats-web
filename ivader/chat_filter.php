<?php
		//If ($_SERVER['REMOTE_ADDR']!='176.37.62.46'){die();}

		include "/var/www/rbc/data/www/test.old-bk.ru/connect.php";

?>

<form method=get>
	<fieldset>
		<legend>��������� ���������</legend>
		<table>
			<tr><td><input size=200 type='text' name='text' value='<?=$_GET['text']?>'></td><td><input type=submit value='�������������� ->'></td></tr>
		</table>
	</fieldset>
</form>

<?
function translitIt($str) 
{
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


### ��������� ��� � ������ �������
$_GET['text']=mb_strtolower($_GET['text']);

	### ������� �����, �������, ����, �������, �������������
	$_GET['text']=str_replace('.','',$_GET['text']);
	$_GET['text']=str_replace(',','',$_GET['text']);
	$_GET['text']=str_replace('(','',$_GET['text']);
	$_GET['text']=str_replace(')','',$_GET['text']);
	$_GET['text']=str_replace('-','',$_GET['text']);
	$_GET['text']=str_replace('_','',$_GET['text']);
	$_GET['text']=str_replace(' ','',$_GET['text']);
	$_GET['text']=str_replace('*','',$_GET['text']);

	$_GET['text']=str_replace('�','�',$_GET['text']); ## ����������, �����-�� ����
	$_GET['text']=str_replace('�','�',$_GET['text']); ## ����������, �����-�� ����
	$_GET['text']=str_replace('�','�',$_GET['text']); ## ����������, �����-�� ����

	$_GET['text']=str_replace('k','c',$_GET['text']); ## ����������, �����-�� ����

### ��������� ��� ����� ������ ���������
$_GET['text']=translitIt($_GET['text']);

### ��������� �� ������� ����������� ����
If (
	substr_count($_GET['text'],"cruelworld") or 
	substr_count($_GET['text'],"onebc") or 
	substr_count($_GET['text'],"ardaniya") or 
	substr_count($_GET['text'],"oldbc") or 
	substr_count($_GET['text'],"recombats")

){echo "<font color=RED>������� �������� �����!</font><br/>";}



echo "��������� �������: ".$_GET['text'];

//$users_u=mysql_query("SELECT * from `users` where `login` like '%�'  ");

while ($users_u_w=mysql_fetch_array($users_u)){
	echo $users_u_w['login']."<br/>";
}
?>