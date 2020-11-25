<?php
if($user['align']==2.5){
$filename = '/var/www/bestcombats/data/www/bestcombats.net/data/vrag.txt';
if (!file_exists($filename)) {
echo "Общий Враг Уже отозван.";
}  else{
$kto = array("1" => "<i>Невидимка</i>", "0"=> "".$user['login']."");
$action = array("1" => "отозвал", "0"=> "отозвала");
unlink('/var/www/bestcombats/data/www/bestcombats.net/data/vrag.txt');
echo "Вы отозвали Общего Врага!";
addch("<img src=i/magic/1x1.gif> Ангел &quot;".$kto[$user['invis']]."&quot; ".$action[$user['sex']]." Общего Врага.");			
}
} 	
?>