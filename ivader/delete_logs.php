<?
$j=0;

$dir = '../backup/battle_stat/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../backup/debug/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../backup/logs/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../backup/stat/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}
  
// АБАДОН

$dir = '../../dungeon.old-bk.ru/backup/battle_stat/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../../dungeon.old-bk.ru/backup/debug/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../../dungeon.old-bk.ru/backup/logs/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

$dir = '../../dungeon.old-bk.ru/backup/stat/'; 
$files_array = scandir($dir);
for ($i=2; $i < count($files_array);$i++){
	$time=time()-filemtime($dir.$files_array[$i]);

	If ((filesize($dir.$files_array[$i])==0 or $time>60*60*24*30) and $files_array[$i]<>'.htaccess' and $files_array[$i]<>'index.php'){
		$filedir=$dir.$files_array[$i];
		unlink($filedir);
		$j++;
	}
}

//echo "Удалено ".$j." файла!";
?>