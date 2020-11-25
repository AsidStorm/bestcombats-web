<?
$dir = '/var/www/rbc/data/mod-tmp/'; 

$files_array = scandir($dir);
$j=0;

for ($i=2; $i < count($files_array);$i++){
	If (filesize($dir.$files_array[$i])==0){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		//echo $files_array[$i]." - ".(filesize($dir.$files_array[$i]))."<br/>";
		$j++;
	}
}

echo "Удалено ".$j." файла!";
?>