<?php
//Сообщения в обычный чат
function addch ($text,$room=0) {
			global $user;
			if ($room==0) {
				$room = $user['room'];
			}
			if($fp = fopen ("chat.txt","a")){ //открытие
				flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
				fputs($fp ,":[".time()."]:[!sys!!]:[".($text)."]:[".$room."]\r\n"); //работа с файлом
				fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
				flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
				fclose ($fp); //закрытие
			}
}
//Сообщения для подземок
function cavesys($text) {
  global $user;
  if($fp = @fopen (CHATROOT."chat.txt","a")){
    flock ($fp,LOCK_EX);
    fputs($fp ,":[".time()."]:[!cavesys!!]:[$text]:[$user[caveleader]]\r\n");
    fflush ($fp);
    flock ($fp,LOCK_UN);
    fclose ($fp);
  }
}
//Приваты
function privatemsg($text, $to) {
  global $user;
  if ($room==0) $room = $user['room'];
  $fp = fopen (CHATROOT."chat.txt","a"); //открытие
  flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
  fputs($fp ,":[".time()."]:[{[]}$to{[]}]:[".($text)."]:[".$room."]\r\n"); //работа с файлом
  fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
  flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
  fclose ($fp); //закрытие
}
//Функция системки
function systemmsg($text) {
global $user;
if (filesize(CHATROOT."chat.txt")>20*1024) {
$file=file(CHATROOT."chat.txt");
$fp=fopen(CHATROOT."chat.txt","w");
flock ($fp,LOCK_EX);
for ($s=0;$s<count($file)/1.5;$s++) {
unset($file[$s]);
}
fputs($fp, implode("",$file));
fputs($fp ,"\r\n:[".time ()."]:[!sys2all!!]:[".($text)."]:[1]\r\n"); //работа с файлом
flock ($fp,LOCK_UN);
fclose($fp);
}else {
$fp = fopen (CHATROOT."chat.txt","a"); //открытие
flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
fputs($fp ,"\r\n:[".time ()."]:[!sys2all!!]:[".($text)."]:[1]\r\n"); //работа с файлом
fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
fclose ($fp); //закрытие
}
}
function addchp ($text,$who,$room=0) {
  global $user;
  if ($room==0) $room = $user['room'];
  $fp = fopen (CHATROOT."chat.txt","a"); //открытие
  flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
  fputs($fp ,":[".time()."]:[{$who}]:[".($text)."]:[".$room."]\r\n"); //работа с файлом
  fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
  flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
  fclose ($fp); //закрытие
}

?>
