<?php
if($user['align']==2.5){
$filename = '/var/www/bestcombats/data/www/bestcombats.net/data/vrag.txt';
if (!file_exists($filename)) {
echo "����� ���� ��� �������.";
}  else{
$kto = array("1" => "<i>���������</i>", "0"=> "".$user['login']."");
$action = array("1" => "�������", "0"=> "��������");
unlink('/var/www/bestcombats/data/www/bestcombats.net/data/vrag.txt');
echo "�� �������� ������ �����!";
addch("<img src=i/magic/1x1.gif> ����� &quot;".$kto[$user['invis']]."&quot; ".$action[$user['sex']]." ������ �����.");			
}
} 	
?>