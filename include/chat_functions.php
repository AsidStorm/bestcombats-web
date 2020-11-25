<?php
//Ñîîáùåíèÿ â îáû÷íûé ÷àò
function addch ($text,$room=0) {
			global $user;
			if ($room==0) {
				$room = $user['room'];
			}
			if($fp = fopen ("chat.txt","a")){ //îòêðûòèå
				flock ($fp,LOCK_EX); //ÁËÎÊÈÐÎÂÊÀ ÔÀÉËÀ
				fputs($fp ,":[".time()."]:[!sys!!]:[".($text)."]:[".$room."]\r\n"); //ðàáîòà ñ ôàéëîì
				fflush ($fp); //Î×ÈÙÅÍÈÅ ÔÀÉËÎÂÎÃÎ ÁÓÔÅÐÀ È ÇÀÏÈÑÜ Â ÔÀÉË
				flock ($fp,LOCK_UN); //ÑÍßÒÈÅ ÁËÎÊÈÐÎÂÊÈ
				fclose ($fp); //çàêðûòèå
			}
}
//Ñîîáùåíèÿ äëÿ ïîäçåìîê
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
//Ïðèâàòû
function privatemsg($text, $to) {
  global $user;
  if ($room==0) $room = $user['room'];
  $fp = fopen (CHATROOT."chat.txt","a"); //îòêðûòèå
  flock ($fp,LOCK_EX); //ÁËÎÊÈÐÎÂÊÀ ÔÀÉËÀ
  fputs($fp ,":[".time()."]:[{[]}$to{[]}]:[".($text)."]:[".$room."]\r\n"); //ðàáîòà ñ ôàéëîì
  fflush ($fp); //Î×ÈÙÅÍÈÅ ÔÀÉËÎÂÎÃÎ ÁÓÔÅÐÀ È ÇÀÏÈÑÜ Â ÔÀÉË
  flock ($fp,LOCK_UN); //ÑÍßÒÈÅ ÁËÎÊÈÐÎÂÊÈ
  fclose ($fp); //çàêðûòèå
}
//Ôóíêöèÿ ñèñòåìêè
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
fputs($fp ,"\r\n:[".time ()."]:[!sys2all!!]:[".($text)."]:[1]\r\n"); //ðàáîòà ñ ôàéëîì
flock ($fp,LOCK_UN);
fclose($fp);
}else {
$fp = fopen (CHATROOT."chat.txt","a"); //îòêðûòèå
flock ($fp,LOCK_EX); //ÁËÎÊÈÐÎÂÊÀ ÔÀÉËÀ
fputs($fp ,"\r\n:[".time ()."]:[!sys2all!!]:[".($text)."]:[1]\r\n"); //ðàáîòà ñ ôàéëîì
fflush ($fp); //Î×ÈÙÅÍÈÅ ÔÀÉËÎÂÎÃÎ ÁÓÔÅÐÀ È ÇÀÏÈÑÜ Â ÔÀÉË
flock ($fp,LOCK_UN); //ÑÍßÒÈÅ ÁËÎÊÈÐÎÂÊÈ
fclose ($fp); //çàêðûòèå
}
}
function addchp ($text,$who,$room=0) {
  global $user;
  if ($room==0) $room = $user['room'];
  $fp = fopen (CHATROOT."chat.txt","a"); //îòêðûòèå
  flock ($fp,LOCK_EX); //ÁËÎÊÈÐÎÂÊÀ ÔÀÉËÀ
  fputs($fp ,":[".time()."]:[{$who}]:[".($text)."]:[".$room."]\r\n"); //ðàáîòà ñ ôàéëîì
  fflush ($fp); //Î×ÈÙÅÍÈÅ ÔÀÉËÎÂÎÃÎ ÁÓÔÅÐÀ È ÇÀÏÈÑÜ Â ÔÀÉË
  flock ($fp,LOCK_UN); //ÑÍßÒÈÅ ÁËÎÊÈÐÎÂÊÈ
  fclose ($fp); //çàêðûòèå
}

?>
