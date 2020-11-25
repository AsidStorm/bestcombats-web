<?
// 1- Паук    1 - Колл. ботов     1 - Падает гайка
// 2- Зомби   2 - Колл. ботов     2 - Падает болт
// 3- Жук     3 - Колл. ботов     3 - Падает винтель
// Например 121 = 2 паука и 1 Зомби
if($rt["n$loc4"]=='1'){$ob = "pauk"; $b_n = "Паук";}
else if($rt["n$loc4"]=='2'){$ob = "zombi"; $b_n = "Зомби";}
else if($rt["n$loc4"]=='3'){$ob = "zuk"; $b_n = "Жук";}

else if($rt["n$loc4"]=='4'){$ob = "merz"; $b_n = "Мерзость";}
else if($rt["n$loc4"]=='5'){$ob = "obit"; $b_n = "Обитатель";}
else if($rt["n$loc4"]=='6'){$ob = "zud"; $b_n = "Жудкий";}
else if($rt["n$loc4"]=='7'){$ob = "mart"; $b_n = "Мартын";}
else if($rt["n$loc4"]=='8'){$ob = "luka"; $b_n = "Лука";}

////////////////2 этаж////////////////////////
else if($rt["n$loc4"]=='9'){$ob = "krisa"; $b_n = "Крыса";}
else if($rt["n$loc4"]=='10'){$ob = "bez_san"; $b_n = "Безголовый";}
else if($rt["n$loc4"]=='11'){$ob = "stal"; $b_n = "Стальной";}
else if($rt["n$loc4"]=='12'){$ob = "krov"; $b_n = "Кровавый";}
else if($rt["n$loc4"]=='13'){$ob = "mis"; $b_n = "Мышь";}
else if($rt["n$loc4"]=='14'){$ob = "prorab"; $b_n = "Прораб";}
else if($rt["n$loc4"]=='15'){$ob = "slesar"; $b_n = "Слесарь";}
else if($rt["n$loc4"]=='16'){$ob = "sliz"; $b_n = "Слизь";}
else if($rt["n$loc4"]=='17'){$ob = "star"; $b_n = "Старожил";}
else if($rt["n$loc4"]=='18'){$ob = "xoz"; $b_n = "Хозяин";}
else if($rt["n$loc4"]>=29 && $rt["n$loc4"]<=31){
  list($b_n,$ob)=botname($rt["n$loc4"]);
}


else if($rt["n$loc4"]=='1.1'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "pauk"; $b_n2 = "Паук";}
else if($rt["n$loc4"]=='1.2'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zombi"; $b_n2 = "Зомби";}
else if($rt["n$loc4"]=='1.3'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zuk"; $b_n2 = "Жук";}
else if($rt["n$loc4"]=='2.2'){$ob = "zombi"; $b_n = "Зомби"; $ob2 = "zombi"; $b_n2 = "Зомби";}
else if($rt["n$loc4"]=='2.3'){$ob = "zombi"; $b_n = "Зомби"; $ob2 = "zuk"; $b_n2 = "Жук";}
else if($rt["n$loc4"]=='3.3'){$ob = "zuk"; $b_n = "Жук"; $ob2 = "zuk"; $b_n2 = "Жук";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc4"]=='9.9'){$ob = "krisa"; $b_n = "Крыса"; $ob2 = "krisa"; $b_n2 = "Крыса";}
else if($rt["n$loc4"]=='10.10'){$ob = "bez_san"; $b_n = "Безголовый"; $ob2 = "bez_san"; $b_n2 = "Безголовый";}
else if($rt["n$loc4"]=='11.11'){$ob = "stal"; $b_n = "Стальной"; $ob2 = "stal"; $b_n2 = "Стальной";}
else if($rt["n$loc4"]=='12.12'){$ob = "krov"; $b_n = "Кровавый"; $ob2 = "krov"; $b_n2 = "Кровавый";}
else if($rt["n$loc4"]=='13.13'){$ob = "mis"; $b_n = "Мышь"; $ob2 = "mis"; $b_n2 = "Мышь";}
else if($rt["n$loc4"]=='14.14'){$ob = "prorab"; $b_n = "Прораб"; $ob2 = "prorab"; $b_n2 = "Прораб";}
else if($rt["n$loc4"]=='15.15'){$ob = "slesar"; $b_n = "Слесарь"; $ob2 = "slesar"; $b_n2 = "Слесарь";}
else if($rt["n$loc4"]=='16.16'){$ob = "sliz"; $b_n = "Слизь"; $ob2 = "sliz"; $b_n2 = "Слизь";}
else if($rt["n$loc4"]=='17.17'){$ob = "star"; $b_n = "Старожил"; $ob2 = "star"; $b_n2 = "Старожил";}
else if($rt["n$loc4"]=='18.18'){$ob = "xoz"; $b_n = "Хозяин"; $ob2 = "xoz"; $b_n2 = "Хозяин";}


else if($rt["n$loc4"]=='1.1.1'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "pauk"; $b_n2 = "Паук"; $ob3 = "pauk"; $b_n3 = "Паук";}
else if($rt["n$loc4"]=='1.1.2'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "pauk"; $b_n2 = "Паук"; $ob3 = "zombi"; $b_n3 = "Зомби";}
else if($rt["n$loc4"]=='1.1.3'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "pauk"; $b_n2 = "Паук"; $ob3 = "zuk"; $b_n3 = "Жук";}
else if($rt["n$loc4"]=='1.2.2'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zombi"; $b_n2 = "Зомби"; $ob3 = "zombi"; $b_n3 = "Зомби";}
else if($rt["n$loc4"]=='1.3.2'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zuk"; $b_n2 = "Жук"; $ob3 = "zombi"; $b_n3 = "Зомби";}
else if($rt["n$loc4"]=='1.3.3'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zuk"; $b_n2 = "Жук"; $ob3 = "zuk"; $b_n3 = "Жук";}
else if($rt["n$loc4"]=='2.2.2'){$ob = "zombi"; $b_n = "Зомби"; $ob2 = "zombi"; $b_n2 = "Зомби"; $ob3 = "zombi"; $b_n3 = "Зомби";}
else if($rt["n$loc4"]=='2.2.3'){$ob = "zombi"; $b_n = "Зомби"; $ob2 = "zombi"; $b_n2 = "Зомби"; $ob3 = "zuk"; $b_n3 = "Жук";}
else if($rt["n$loc4"]=='2.3.3'){$ob = "zombi"; $b_n = "Зомби"; $ob2 = "zuk"; $b_n2 = "Жук"; $ob3 = "zuk"; $b_n3 = "Жук";}
else if($rt["n$loc4"]=='3.3.3'){$ob = "zuk"; $b_n = "Жук"; $ob2 = "zuk"; $b_n2 = "Жук"; $ob3 = "zuk"; $b_n3 = "Жук";}
else if($rt["n$loc4"]=='1.2.3'){$ob = "pauk"; $b_n = "Паук"; $ob2 = "zombi"; $b_n2 = "Зомби"; $ob3 = "zuk"; $b_n3 = "Жук";}


////////////////2 этаж////////////////////////
else if($rt["n$loc4"]=='9.9.9'){$ob = "krisa"; $b_n = "Крыса"; $ob2 = "krisa"; $b_n2 = "Крыса"; $ob3 = "krisa"; $b_n3 = "Крыса";}
else if($rt["n$loc4"]=='10.10.10'){$ob = "bez_san"; $b_n = "Безголовый"; $ob2 = "bez_san"; $b_n2 = "Безголовый"; $ob3 = "bez_san"; $b_n3 = "Безголовый";}
else if($rt["n$loc4"]=='11.11.11'){$ob = "stal"; $b_n = "Стальной"; $ob2 = "stal"; $b_n2 = "Стальной"; $ob3 = "stal"; $b_n3 = "Стальной";}
else if($rt["n$loc4"]=='12.12.12'){$ob = "krov"; $b_n = "Кровавый"; $ob2 = "krov"; $b_n2 = "Кровавый"; $ob3 = "krov"; $b_n3 = "Кровавый";}
else if($rt["n$loc4"]=='13.13.13'){$ob = "mis"; $b_n = "Мышь"; $ob2 = "mis"; $b_n2 = "Мышь"; $ob3 = "mis"; $b_n3 = "Мышь";}
else if($rt["n$loc4"]=='14.14.14'){$ob = "prorab"; $b_n = "Прораб"; $ob2 = "prorab"; $b_n2 = "Прораб"; $ob3 = "prorab"; $b_n3 = "Прораб";}
else if($rt["n$loc4"]=='15.15.15'){$ob = "slesar"; $b_n = "Слесарь"; $ob2 = "slesar"; $b_n2 = "Слесарь"; $ob3 = "slesar"; $b_n3 = "Слесарь";}
else if($rt["n$loc4"]=='16.16.16'){$ob = "sliz"; $b_n = "Слизь"; $ob2 = "sliz"; $b_n2 = "Слизь"; $ob3 = "sliz"; $b_n3 = "Слизь";}
else if($rt["n$loc4"]=='17.17.17'){$ob = "star"; $b_n = "Старожил"; $ob2 = "star"; $b_n2 = "Старожил"; $ob3 = "star"; $b_n3 = "Старожил";}
else if($rt["n$loc4"]=='18.18.18'){$ob = "xoz"; $b_n = "Хозяин"; $ob2 = "xoz"; $b_n2 = "Хозяин"; $ob3 = "xoz"; $b_n3 = "Хозяин";}


if($rt["n$loc4"]=='1' or $rt["n$loc4"]=='2' or $rt["n$loc4"]=='3' or $rt["n$loc4"]=='4' or $rt["n$loc4"]=='5' or $rt["n$loc4"]=='6' or $rt["n$loc4"]=='7' or $rt["n$loc4"]=='8' or $rt["n$loc4"]=='9' or $rt["n$loc4"]=='10' or $rt["n$loc4"]=='11' or $rt["n$loc4"]=='12' or $rt["n$loc4"]=='13' or $rt["n$loc4"]=='14' or $rt["n$loc4"]=='15' or $rt["n$loc4"]=='16' or $rt["n$loc4"]=='17' or $rt["n$loc4"]=='18' or $rt["n$loc4"]=='19' or $rt["n$loc4"]=='20' or $rt["n$loc4"]=='21' or $rt["n$loc4"]=='22' or $rt["n$loc4"]=='23' or $rt["n$loc4"]=='24' or $rt["n$loc4"]=='25' or $rt["n$loc4"]=='26' or $rt["n$loc4"]=='27' or $rt["n$loc4"]=='28' or $rt["n$loc4"]=='29' or $rt["n$loc4"]=='30' or $rt["n$loc4"]=='31'){$k_b = 1;}
else if($rt["n$loc4"]=='1.1' or $rt["n$loc4"]=='1.2' or $rt["n$loc4"]=='1.3' or $rt["n$loc4"]=='2.2' or $rt["n$loc4"]=='2.3' or $rt["n$loc4"]=='3.3' or $rt["n$loc4"]=='9.9' or $rt["n$loc4"]=='10.10' or $rt["n$loc4"]=='11.11' or $rt["n$loc4"]=='12.12' or $rt["n$loc4"]=='13.13' or $rt["n$loc4"]=='14.14' or $rt["n$loc4"]=='15.15' or $rt["n$loc4"]=='16.16' or $rt["n$loc4"]=='17.17' or $rt["n$loc4"]=='18.18' or $rt["n$loc4"]=='19.19' or $rt["n$loc4"]=='20.20' or $rt["n$loc4"]=='21.21' or $rt["n$loc4"]=='22.22' or $rt["n$loc4"]=='23.23' or $rt["n$loc4"]=='24.24' or $rt["n$loc4"]=='25.25' or $rt["n$loc4"]=='26.26' or $rt["n$loc4"]=='27.27' or $rt["n$loc4"]=='28.28'){$k_b = 2;}
else if($rt["n$loc4"]=='1.1.1' or $rt["n$loc4"]=='1.1.2' or $rt["n$loc4"]=='1.1.3' or $rt["n$loc4"]=='1.2.2' or $rt["n$loc4"]=='1.3.2' or $rt["n$loc4"]=='1.3.3' or $rt["n$loc4"]=='2.2.2' or $rt["n$loc4"]=='2.2.3' or $rt["n$loc4"]=='2.3.3' or $rt["n$loc4"]=='3.3.3' or $rt["n$loc4"]=='1.2.3' or $rt["n$loc4"]=='9.9.9' or $rt["n$loc4"]=='10.10.10' or $rt["n$loc4"]=='11.11.11' or $rt["n$loc4"]=='12.12.12' or $rt["n$loc4"]=='13.13.13' or $rt["n$loc4"]=='14.14.14' or $rt["n$loc4"]=='15.15.15' or $rt["n$loc4"]=='16.16.16' or $rt["n$loc4"]=='17.17.17' or $rt["n$loc4"]=='18.18.18' or $rt["n$loc4"]=='19.19.19' or $rt["n$loc4"]=='20.20.20' or $rt["n$loc4"]=='21.21.21' or $rt["n$loc4"]=='22.22.22' or $rt["n$loc4"]=='23.23.23' or $rt["n$loc4"]=='24.24.24' or $rt["n$loc4"]=='25.25.25' or $rt["n$loc4"]=='26.26.26' or $rt["n$loc4"]=='27.27.27' or $rt["n$loc4"]=='28.28.28'){$k_b = 3;}

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

if($rt["n$loc3"]=='1'){$ob3 = "pauk"; $b_n3 = "Паук";}
else if($rt["n$loc3"]=='2'){$ob3 = "zombi"; $b_n3 = "Зомби";}
else if($rt["n$loc3"]=='3'){$ob3 = "zuk"; $b_n3 = "Жук";}

else if($rt["n$loc3"]=='4'){$ob3 = "merz"; $b_n3 = "Мерзость";}
else if($rt["n$loc3"]=='5'){$ob3 = "obit"; $b_n3 = "Обитатель";}
else if($rt["n$loc3"]=='6'){$ob3 = "zud"; $b_n3 = "Жуткий";}
else if($rt["n$loc3"]=='7'){$ob3 = "mart"; $b_n3 = "Мартын";}
else if($rt["n$loc3"]=='8'){$ob3 = "luka"; $b_n3 = "Лука";}

////////////////2 этаж////////////////////////
else if($rt["n$loc3"]=='9'){$ob3 = "krisa"; $b_n3 = "Крыса";}
else if($rt["n$loc3"]=='10'){$ob3 = "bez_san"; $b_n3 = "Безголовый";}
else if($rt["n$loc3"]=='11'){$ob3 = "stal"; $b_n3 = "Стальной";}
else if($rt["n$loc3"]=='12'){$ob3 = "krov"; $b_n3 = "Кровавый";}
else if($rt["n$loc3"]=='13'){$ob3 = "mis"; $b_n3 = "Мышь";}
else if($rt["n$loc3"]=='14'){$ob3 = "prorab"; $b_n3 = "Прораб";}
else if($rt["n$loc3"]=='15'){$ob3 = "slesar"; $b_n3 = "Слесарь";}
else if($rt["n$loc3"]=='16'){$ob3 = "sliz"; $b_n3 = "Слизь";}
else if($rt["n$loc3"]=='17'){$ob3 = "star"; $b_n3 = "Старожил";}
else if($rt["n$loc3"]=='18'){$ob3 = "xoz"; $b_n3 = "Хозяин";}
else if($rt["n$loc3"]>=29 && $rt["n$loc3"]<=31){
  list($b_n3,$ob3)=botname($rt["n$loc3"]);
}

else if($rt["n$loc3"]=='1.1'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "pauk"; $b_n32 = "Паук";}
else if($rt["n$loc3"]=='1.2'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zombi"; $b_n32 = "Зомби";}
else if($rt["n$loc3"]=='1.3'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zuk"; $b_n32 = "Паук";}
else if($rt["n$loc3"]=='2.2'){$ob3 = "zombi"; $b_n3 = "Зомби"; $ob32 = "zombi"; $b_n32 = "Зомби";}
else if($rt["n$loc3"]=='2.3'){$ob3 = "zombi"; $b_n3 = "Зомби"; $ob32 = "zuk"; $b_n32 = "Жук";}
else if($rt["n$loc3"]=='3.3'){$ob3 = "zuk"; $b_n3 = "Жук"; $ob32 = "zuk"; $b_n32 = "Жук";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc3"]=='9.9'){$ob3 = "krisa"; $b_n3 = "Крыса"; $ob32 = "krisa"; $b_n32 = "Крыса";}
else if($rt["n$loc3"]=='10.10'){$ob3 = "bez_san"; $b_n3 = "Безголовый"; $ob32 = "bez_san"; $b_n32 = "Безголовый";}
else if($rt["n$loc3"]=='11.11'){$ob3 = "stal"; $b_n3 = "Стальной"; $ob32 = "stal"; $b_n32 = "Стальной";}
else if($rt["n$loc3"]=='12.12'){$ob3 = "krov"; $b_n3 = "Кровавый"; $ob32 = "krov"; $b_n32 = "Кровавый";}
else if($rt["n$loc3"]=='13.13'){$ob3 = "mis"; $b_n3 = "Мышь"; $ob32 = "mis"; $b_n32 = "Мышь";}
else if($rt["n$loc3"]=='14.14'){$ob3 = "prorab"; $b_n3 = "Прораб"; $ob32 = "prorab"; $b_n32 = "Прораб";}
else if($rt["n$loc3"]=='15.15'){$ob3 = "slesar"; $b_n3 = "Слесарь"; $ob32 = "slesar"; $b_n32 = "Слесарь";}
else if($rt["n$loc3"]=='16.16'){$ob3 = "sliz"; $b_n3 = "Слизь"; $ob32 = "sliz"; $b_n32 = "Слизь";}
else if($rt["n$loc3"]=='17.17'){$ob3 = "star"; $b_n3 = "Старожил"; $ob32 = "star"; $b_n32 = "Старожил";}
else if($rt["n$loc3"]=='18.18'){$ob3 = "xoz"; $b_n3 = "Хозяин"; $ob32 = "xoz"; $b_n32 = "Хозяин";}
/////////////////////////////////////////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='1.1.1'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "pauk"; $b_n32 = "Паук"; $ob33 = "pauk"; $b_n33 = "Паук";}
else if($rt["n$loc3"]=='1.1.2'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "pauk"; $b_n32 = "Паук"; $ob33 = "zombi"; $b_n33 = "Зомби";}
else if($rt["n$loc3"]=='1.1.3'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "pauk"; $b_n32 = "Паук"; $ob33 = "zuk"; $b_n33 = "Жук";}
else if($rt["n$loc3"]=='1.2.2'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zombi"; $b_n32 = "Зомби"; $ob33 = "zombi"; $b_n33 = "Зомби";}
else if($rt["n$loc3"]=='1.3.2'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zuk"; $b_n32 = "Жук"; $ob33 = "zombi"; $b_n33 = "Зомби";}
else if($rt["n$loc3"]=='1.3.3'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zuk"; $b_n32 = "Жук"; $ob33 = "zuk"; $b_n33 = "Жук";}
else if($rt["n$loc3"]=='2.2.2'){$ob3 = "zombi";$b_n3 = "Зомби"; $ob32 = "zombi"; $b_n32 = "Зомби"; $ob33 = "zombi"; $b_n33 = "Зомби";}
else if($rt["n$loc3"]=='2.2.3'){$ob3 = "zombi"; $b_n3 = "Зомби"; $ob32 = "zombi"; $b_n32 = "Зомби"; $ob33 = "zuk"; $b_n33 = "Жук";}
else if($rt["n$loc3"]=='2.3.3'){$ob3 = "zombi"; $b_n3 = "Зомби"; $ob32 = "zuk"; $b_n32 = "Жук"; $ob33 = "zuk"; $b_n33 = "Жук";}
else if($rt["n$loc3"]=='3.3.3'){$ob3 = "zuk"; $b_n3 = "Жук"; $ob32 = "zuk"; $b_n32 = "Жук"; $ob33 = "zuk"; $b_n33 = "Жук";}
else if($rt["n$loc3"]=='1.2.3'){$ob3 = "pauk"; $b_n3 = "Паук"; $ob32 = "zombi"; $b_n32 = "Зомби"; $ob33 = "zuk"; $b_n33 = "Жук";}
////////////////2 этаж////////////////////////
else if($rt["n$loc3"]=='9.9.9'){$ob3 = "krisa"; $b_n3 = "Крыса"; $ob32 = "krisa"; $b_n32 = "Крыса"; $ob33 = "krisa"; $b_n33 = "Крыса";}
else if($rt["n$loc3"]=='10.10.10'){$ob3 = "bez_san"; $b_n3 = "Безголовый"; $ob32 = "bez_san"; $b_n32 = "Безголовый"; $ob33 = "bez_san"; $b_n33 = "Безголовый";}
else if($rt["n$loc3"]=='11.11.11'){$ob3 = "stal"; $b_n3 = "Стальной"; $ob32 = "stal"; $b_n32 = "Стальной"; $ob33 = "stal"; $b_n33 = "Стальной";}
else if($rt["n$loc3"]=='12.12.12'){$ob3 = "krov"; $b_n3 = "Кровавый"; $ob32 = "krov"; $b_n32 = "Кровавый"; $ob33 = "krov"; $b_n33 = "Кровавый";}
else if($rt["n$loc3"]=='13.13.13'){$ob3 = "mis"; $b_n3 = "Мышь"; $ob32 = "mis"; $b_n32 = "Мышь"; $ob33 = "mis"; $b_n33 = "Мышь";}
else if($rt["n$loc3"]=='14.14.14'){$ob3 = "prorab"; $b_n3 = "Прораб"; $ob32 = "prorab"; $b_n32 = "Прораб"; $ob33 = "prorab"; $b_n33 = "Прораб";}
else if($rt["n$loc3"]=='15.15.15'){$ob3 = "slesar"; $b_n3 = "Слесарь"; $ob32 = "slesar"; $b_n32 = "Слесарь"; $ob33 = "slesar"; $b_n33 = "Слесарь";}
else if($rt["n$loc3"]=='16.16.16'){$ob3 = "sliz"; $b_n3 = "Слизь"; $ob32 = "sliz"; $b_n32 = "Слизь"; $ob33 = "sliz"; $b_n33 = "Слизь";}
else if($rt["n$loc3"]=='17.17.17'){$ob3 = "star"; $b_n3 = "Старожил"; $ob32 = "star"; $b_n32 = "Старожил"; $ob33 = "star"; $b_n33 = "Старожил";}
else if($rt["n$loc3"]=='18.18.18'){$ob3 = "xoz"; $b_n3 = "Хозяин"; $ob32 = "xoz"; $b_n32 = "Хозяин"; $ob33 = "xoz"; $b_n33 = "Хозяин";}

if($rt["n$loc3"]=='1' or $rt["n$loc3"]=='2' or $rt["n$loc3"]=='3' or $rt["n$loc3"]=='4' or $rt["n$loc3"]=='5' or $rt["n$loc3"]=='6' or $rt["n$loc3"]=='7' or $rt["n$loc3"]=='8' or $rt["n$loc3"]=='9' or $rt["n$loc3"]=='10' or $rt["n$loc3"]=='11' or $rt["n$loc3"]=='12' or $rt["n$loc3"]=='13' or $rt["n$loc3"]=='14' or $rt["n$loc3"]=='15' or $rt["n$loc3"]=='16' or $rt["n$loc3"]=='17' or $rt["n$loc3"]=='18' or $rt["n$loc3"]=='19' or $rt["n$loc3"]=='19' or $rt["n$loc3"]=='20' or $rt["n$loc3"]=='21' or $rt["n$loc3"]=='22' or $rt["n$loc3"]=='23' or $rt["n$loc3"]=='24' or $rt["n$loc3"]=='25' or $rt["n$loc3"]=='26' or $rt["n$loc3"]=='27' or $rt["n$loc3"]=='28' or $rt["n$loc3"]=='29' or $rt["n$loc3"]=='30' or $rt["n$loc3"]=='31'){$k_b3 = 1;}
else if($rt["n$loc3"]=='1.1' or $rt["n$loc3"]=='1.2' or $rt["n$loc3"]=='1.3' or $rt["n$loc3"]=='2.2' or $rt["n$loc3"]=='2.3' or $rt["n$loc3"]=='3.3' or $rt["n$loc3"]=='9.9' or $rt["n$loc3"]=='10.10' or $rt["n$loc3"]=='11.11' or $rt["n$loc3"]=='12.12' or $rt["n$loc3"]=='13.13' or $rt["n$loc3"]=='14.14' or $rt["n$loc3"]=='15.15' or $rt["n$loc3"]=='16.16' or $rt["n$loc3"]=='17.17' or $rt["n$loc3"]=='18.18' or $rt["n$loc3"]=='19.19' or $rt["n$loc3"]=='20.20' or $rt["n$loc3"]=='21.21' or $rt["n$loc3"]=='22.22' or $rt["n$loc3"]=='23.23' or $rt["n$loc3"]=='24.24' or $rt["n$loc3"]=='25.25' or $rt["n$loc3"]=='26.26' or $rt["n$loc3"]=='27.27' or $rt["n$loc3"]=='28.28'){$k_b3 = 2;}
else if($rt["n$loc3"]=='1.1.1' or $rt["n$loc3"]=='1.1.2' or $rt["n$loc3"]=='1.1.3' or $rt["n$loc3"]=='1.2.2' or $rt["n$loc3"]=='1.3.2' or $rt["n$loc3"]=='1.3.3' or $rt["n$loc3"]=='2.2.2' or $rt["n$loc3"]=='2.2.3' or $rt["n$loc3"]=='2.3.3' or $rt["n$loc3"]=='3.3.3' or $rt["n$loc3"]=='1.2.3' or $rt["n$loc3"]=='9.9.9' or $rt["n$loc3"]=='10.10.10' or $rt["n$loc3"]=='11.11.11' or $rt["n$loc3"]=='12.12.12' or $rt["n$loc3"]=='13.13.13' or $rt["n$loc3"]=='14.14.14' or $rt["n$loc3"]=='15.15.15' or $rt["n$loc3"]=='16.16.16' or $rt["n$loc3"]=='17.17.17' or $rt["n$loc3"]=='18.18.18' or $rt["n$loc3"]=='19.19.19' or $rt["n$loc3"]=='20.20.20' or $rt["n$loc3"]=='21.21.21' or $rt["n$loc3"]=='22.22.22' or $rt["n$loc3"]=='23.23.23' or $rt["n$loc3"]=='24.24.24' or $rt["n$loc3"]=='25.25.25' or $rt["n$loc3"]=='26.26.26' or $rt["n$loc3"]=='27.27.27' or $rt["n$loc3"]=='28.28.28'){$k_b3 = 3;}

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

if($rt["n$loc2"]=='1'){$ob2 = "pauk"; $b_n2 = "Паук";}
else if($rt["n$loc2"]=='2'){$ob2 = "zombi"; $b_n2 = "Зомби";}
else if($rt["n$loc2"]=='3'){$ob2 = "zuk"; $b_n2 = "Жук";}

else if($rt["n$loc2"]=='4'){$ob2 = "merz"; $b_n2 = "Мерзость";}
else if($rt["n$loc2"]=='5'){$ob2 = "obit"; $b_n2 = "Обитатель";}
else if($rt["n$loc2"]=='6'){$ob2 = "zud"; $b_n2 = "Жуткий";}
else if($rt["n$loc2"]=='7'){$ob2 = "mart"; $b_n2 = "Мартын";}
else if($rt["n$loc2"]=='8'){$ob2 = "luka"; $b_n2 = "Лука";}

////////////////2 этаж////////////////////////
else if($rt["n$loc2"]=='9'){$ob2 = "krisa"; $b_n2 = "Крыса";}
else if($rt["n$loc2"]=='10'){$ob2 = "bez_san"; $b_n2 = "Безголовый";}
else if($rt["n$loc2"]=='11'){$ob2 = "stal"; $b_n2 = "Стальной";}
else if($rt["n$loc2"]=='12'){$ob2 = "krov"; $b_n2 = "Кровавый";}
else if($rt["n$loc2"]=='13'){$ob2 = "mis"; $b_n2 = "Мышь";}
else if($rt["n$loc2"]=='14'){$ob2 = "prorab"; $b_n2 = "Прораб";}
else if($rt["n$loc2"]=='15'){$ob2 = "slesar"; $b_n2 = "Слесарь";}
else if($rt["n$loc2"]=='16'){$ob2 = "sliz"; $b_n2 = "Слизь";}
else if($rt["n$loc2"]=='17'){$ob2 = "star"; $b_n2 = "Старожил";}
else if($rt["n$loc2"]=='18'){$ob2 = "xoz"; $b_n2 = "Хозяин";}
else if($rt["n$loc2"]>=29 && $rt["n$loc2"]<=31){
  list($b_n2,$ob2)=botname($rt["n$loc2"]);
}
/////////////////////////////////////////////

else if($rt["n$loc2"]=='1.1'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "pauk"; $b_n22 = "Паук";}
else if($rt["n$loc2"]=='1.2'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zombi"; $b_n22 = "Зомби";}
else if($rt["n$loc2"]=='1.3'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zuk"; $b_n22 = "Паук";}
else if($rt["n$loc2"]=='2.2'){$ob2 = "zombi"; $b_n2 = "Зомби"; $ob22 = "zombi"; $b_n22 = "Зомби";}
else if($rt["n$loc2"]=='2.3'){$ob2 = "zombi"; $b_n2 = "Зомби"; $ob22 = "zuk"; $b_n22 = "Жук";}
else if($rt["n$loc2"]=='3.3'){$ob2 = "zuk"; $b_n2 = "Жук"; $ob22 = "zuk"; $b_n22 = "Жук";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc2"]=='9.9'){$ob2 = "krisa"; $b_n2 = "Крыса"; $ob22 = "krisa"; $b_n22 = "Крыса";}
else if($rt["n$loc2"]=='10.10'){$ob2 = "bez_san"; $b_n2 = "Безголовый"; $ob22 = "bez_san"; $b_n22 = "Безголовый";}
else if($rt["n$loc2"]=='11.11'){$ob2 = "stal"; $b_n2 = "Стальной"; $ob22 = "stal"; $b_n22 = "Стальной";}
else if($rt["n$loc2"]=='12.12'){$ob2 = "krov"; $b_n2 = "Кровавый"; $ob22 = "krov"; $b_n22 = "Кровавый";}
else if($rt["n$loc2"]=='13.13'){$ob2 = "mis"; $b_n2 = "Мышь"; $ob22 = "mis"; $b_n22 = "Мышь";}
else if($rt["n$loc2"]=='14.14'){$ob2 = "prorab"; $b_n2 = "Прораб"; $ob22 = "prorab"; $b_n22 = "Прораб";}
else if($rt["n$loc2"]=='15.15'){$ob2 = "slesar"; $b_n2 = "Слесарь"; $ob22 = "slesar"; $b_n22 = "Слесарь";}
else if($rt["n$loc2"]=='16.16'){$ob2 = "sliz"; $b_n2 = "Слизь"; $ob22 = "sliz"; $b_n22 = "Слизь";}
else if($rt["n$loc2"]=='17.17'){$ob2 = "star"; $b_n2 = "Старожил"; $ob22 = "star"; $b_n22 = "Старожил";}
else if($rt["n$loc2"]=='18.18'){$ob2 = "xoz"; $b_n2 = "Хозяин"; $ob22 = "xoz"; $b_n22 = "Хозяин";}
/////////////////////////////////////////////////////

else if($rt["n$loc2"]=='1.1.1'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "pauk"; $b_n22 = "Паук"; $ob23 = "pauk"; $b_n23 = "Паук";}
else if($rt["n$loc2"]=='1.1.2'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "pauk"; $b_n22 = "Паук"; $ob23 = "zombi"; $b_n23 = "Зомби";}
else if($rt["n$loc2"]=='1.1.3'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "pauk"; $b_n22 = "Паук"; $ob23 = "zuk"; $b_n23 = "Жук";}
else if($rt["n$loc2"]=='1.2.2'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zombi"; $b_n22 = "Зомби"; $ob23 = "zombi"; $b_n23 = "Зомби";}
else if($rt["n$loc2"]=='1.3.2'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zuk"; $b_n22 = "Жук"; $ob23 = "zombi"; $b_n23 = "Зомби";}
else if($rt["n$loc2"]=='1.3.3'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zuk"; $b_n22 = "Жук"; $ob23 = "zuk"; $b_n23 = "Жук";}
else if($rt["n$loc2"]=='2.2.2'){$ob2 = "zombi";$b_n2 = "Зомби"; $ob22 = "zombi"; $b_n22 = "Зомби"; $ob23 = "zombi"; $b_n23 = "Зомби";}
else if($rt["n$loc2"]=='2.2.3'){$ob2 = "zombi"; $b_n2 = "Зомби"; $ob22 = "zombi"; $b_n22 = "Зомби"; $ob23 = "zuk"; $b_n23 = "Жук";}
else if($rt["n$loc2"]=='2.3.3'){$ob2 = "zombi"; $b_n2 = "Зомби"; $ob22 = "zuk"; $b_n22 = "Жук"; $ob23 = "zuk"; $b_n23 = "Жук";}
else if($rt["n$loc2"]=='3.3.3'){$ob2 = "zuk"; $b_n2 = "Жук"; $ob22 = "zuk"; $b_n22 = "Жук"; $ob23 = "zuk"; $b_n23 = "Жук";}
else if($rt["n$loc2"]=='1.2.3'){$ob2 = "pauk"; $b_n2 = "Паук"; $ob22 = "zombi"; $b_n22 = "Зомби"; $ob23 = "zuk"; $b_n23 = "Жук";}

////////////////2 этаж////////////////////////
else if($rt["n$loc2"]=='9.9.9'){$ob2 = "krisa"; $b_n2 = "Крыса"; $ob22 = "krisa"; $b_n22 = "Крыса"; $ob23 = "krisa"; $b_n23 = "Крыса";}
else if($rt["n$loc2"]=='10.10.10'){$ob2 = "bez_san"; $b_n2 = "Безголовый"; $ob22 = "bez_san"; $b_n22 = "Безголовый"; $ob23 = "bez_san"; $b_n23 = "Безголовый";}
else if($rt["n$loc2"]=='11.11.11'){$ob2 = "stal"; $b_n2 = "Стальной"; $ob22 = "stal"; $b_n22 = "Стальной"; $ob23 = "stal"; $b_n23 = "Стальной";}
else if($rt["n$loc2"]=='12.12.12'){$ob2 = "krov"; $b_n2 = "Кровавый"; $ob22 = "krov"; $b_n22 = "Кровавый"; $ob23 = "krov"; $b_n23 = "Кровавый";}
else if($rt["n$loc2"]=='13.13.13'){$ob2 = "mis"; $b_n2 = "Мышь"; $ob22 = "mis"; $b_n22 = "Мышь"; $ob23 = "mis"; $b_n23 = "Мышь";}
else if($rt["n$loc2"]=='14.14.14'){$ob2 = "prorab"; $b_n2 = "Прораб"; $ob22 = "prorab"; $b_n22 = "Прораб"; $ob23 = "prorab"; $b_n23 = "Прораб";}
else if($rt["n$loc2"]=='15.15.15'){$ob2 = "slesar"; $b_n2 = "Слесарь"; $ob22 = "slesar"; $b_n22 = "Слесарь"; $ob23 = "slesar"; $b_n23 = "Слесарь";}
else if($rt["n$loc2"]=='16.16.16'){$ob2 = "sliz"; $b_n2 = "Слизь"; $ob22 = "sliz"; $b_n22 = "Слизь"; $ob23 = "sliz"; $b_n23 = "Слизь";}
else if($rt["n$loc2"]=='17.17.17'){$ob2 = "star"; $b_n2 = "Старожил"; $ob22 = "star"; $b_n22 = "Старожил"; $ob23 = "star"; $b_n23 = "Старожил";}
else if($rt["n$loc2"]=='18.18.18'){$ob2 = "xoz"; $b_n2 = "Хозяин"; $ob22 = "xoz"; $b_n22 = "Хозяин"; $ob23 = "xoz"; $b_n23 = "Хозяин";}
///////////////////////////////////////////////

if($rt["n$loc4"]=='19'){$ob = "trup"; $b_n = "Бродячий&nbspТруп";}
else if($rt["n$loc4"]=='20'){$ob = "izi"; $b_n = "Изи";}
else if($rt["n$loc4"]=='21'){$ob = "kosmar"; $b_n = "Кошмар&nbspГлубин";}
else if($rt["n$loc4"]=='22'){$ob = "prok"; $b_n = "Проклятие&nbspГлубин";}
else if($rt["n$loc4"]=='23'){$ob = "uzas"; $b_n = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24'){$ob = "bes"; $b_n = "Бес";}
else if($rt["n$loc4"]=='25'){$ob = "zelen"; $b_n = "Зеленый&nbspГолем";}
else if($rt["n$loc4"]=='26'){$ob = "demon"; $b_n = "Крылатый&nbspДемон";}
else if($rt["n$loc4"]=='27'){$ob = "skelet"; $b_n = "Скелет";}
else if($rt["n$loc4"]=='28'){$ob = "straz"; $b_n = "Страж";}
else if($rt["n$loc4"]=='19.19'){$ob = "trup"; $b_n = "Бродячий&nbspТруп"; $ob2 = "trup"; $b_n2 = "Бродячий&nbspТруп";}
else if($rt["n$loc4"]=='20.20'){$ob = "izi"; $b_n = "Изи"; $ob2 = "izi"; $b_n2 = "Изи";}
else if($rt["n$loc4"]=='21.21'){$ob = "kosmar"; $b_n = "Кошмар&nbspГлубин"; $ob2 = "kosmar"; $b_n2 = "Кошмар&nbspГлубин";}
else if($rt["n$loc4"]=='22.22'){$ob = "prok"; $b_n = "Проклятие&nbspГлубин"; $ob2 = "prok"; $b_n2 = "Проклятие&nbspГлубин";}
else if($rt["n$loc4"]=='23.23'){$ob = "uzas"; $b_n = "Ужас&nbspГлубин"; $ob2 = "uzas"; $b_n2 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24.24'){$ob = "bes"; $b_n = "Бес"; $ob2 = "bes"; $b_n2 = "Бес";}
else if($rt["n$loc4"]=='25.25'){$ob = "zelen"; $b_n = "Зеленый&nbspГолем"; $ob2 = "zelen"; $b_n2 = "Зеленый&nbspГолем";}
else if($rt["n$loc4"]=='26.26'){$ob = "demon"; $b_n = "Крылатый&nbspДемон"; $ob2 = "demon"; $b_n2 = "Крылатый&nbspДемон";}
else if($rt["n$loc4"]=='27.27'){$ob = "skelet"; $b_n = "Скелет"; $ob2 = "skelet"; $b_n2 = "Скелет";}
else if($rt["n$loc4"]=='28.28'){$ob = "straz"; $b_n = "Страж"; $ob2 = "straz"; $b_n2 = "Страж";}

else if($rt["n$loc4"]=='19.19.19'){$ob = "trup"; $b_n = "Бродячий&nbspТруп"; $ob2 = "trup"; $b_n2 = "Бродячий&nbspТруп"; $ob3 = "trup"; $b_n3 = "Бродячий&nbspТруп";}
else if($rt["n$loc4"]=='20.20.20'){$ob = "izi"; $b_n = "Изи"; $ob2 = "izi"; $b_n2 = "Изи"; $ob3 = "izi"; $b_n3 = "Изи";}
else if($rt["n$loc4"]=='21.21.21'){$ob = "kosmar"; $b_n = "Кошмар&nbspГлубин"; $ob2 = "kosmar"; $b_n2 = "Кошмар&nbspГлубин"; $ob3 = "kosmar"; $b_n3 = "Кошмар&nbspГлубин";}
else if($rt["n$loc4"]=='22.22.22'){$ob = "prok"; $b_n = "Проклятие&nbspГлубин"; $ob2 = "prok"; $b_n2 = "Проклятие&nbspГлубин"; $ob3 = "prok"; $b_n3 = "Проклятие&nbspГлубин";}
else if($rt["n$loc4"]=='23.23.23'){$ob = "uzas"; $b_n = "Ужас&nbspГлубин"; $ob2 = "uzas"; $b_n2 = "Ужас&nbspГлубин"; $ob3 = "uzas"; $b_n3 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24.24.24'){$ob = "bes"; $b_n = "Бес"; $ob2 = "bes"; $b_n2 = "Бес"; $ob3 = "bes"; $b_n3 = "Бес";}
else if($rt["n$loc4"]=='25.25.25'){$ob = "zelen"; $b_n = "Зеленый&nbspГолем"; $ob2 = "zelen"; $b_n2 = "Зеленый&nbspГолем"; $ob3 = "zelen"; $b_n3 = "Зеленый&nbspГолем";}
else if($rt["n$loc4"]=='26.26.26'){$ob = "demon"; $b_n = "Крылатый&nbspДемон"; $ob2 = "demon"; $b_n2 = "Крылатый&nbspДемон"; $ob3 = "demon"; $b_n3 = "Крылатый&nbspДемон";}
else if($rt["n$loc4"]=='27.27.27'){$ob = "skelet"; $b_n = "Скелет"; $ob2 = "skelet"; $b_n2 = "Скелет"; $ob3 = "skelet"; $b_n3 = "Скелет";}
else if($rt["n$loc4"]=='28.28.28'){$ob = "straz"; $b_n = "Страж"; $ob2 = "straz"; $b_n2 = "Страж"; $ob3 = "straz"; $b_n3 = "Страж";}

if ($rt["n$loc3"]=='19'){$ob3 = "trup"; $b_n3 = "Бродячий&nbspТруп";}
else if($rt["n$loc3"]=='20'){$ob3 = "izi"; $b_n3 = "Изи";}
else if($rt["n$loc3"]=='21'){$ob3 = "kosmar"; $b_n3 = "Кошмар&nbspГлубин";}
else if($rt["n$loc3"]=='22'){$ob3 = "prok"; $b_n3 = "Проклятие&nbspГлубин";}
else if($rt["n$loc3"]=='23'){$ob3 = "uzas"; $b_n3 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24'){$ob3 = "bes"; $b_n3 = "Бес";}
else if($rt["n$loc3"]=='25'){$ob3 = "zelen"; $b_n3 = "Зеленый&nbspГолем";}
else if($rt["n$loc3"]=='26'){$ob3 = "demon"; $b_n3 = "Крылатый&nbspДемон";}
else if($rt["n$loc3"]=='27'){$ob3 = "skelet"; $b_n3 = "Скелет";}
else if($rt["n$loc3"]=='28'){$ob3 = "straz"; $b_n3 = "Страж";}
else if($rt["n$loc3"]=='19.19'){$ob3 = "trup"; $b_n3 = "Бродячий&nbspТруп"; $ob32 = "trup"; $b_n32 = "Бродячий Труп";}
else if($rt["n$loc3"]=='20.20'){$ob3 = "izi"; $b_n3 = "Изи"; $ob32 = "izi"; $b_n32 = "Изи";}
else if($rt["n$loc3"]=='21.21'){$ob3 = "kosmar"; $b_n3 = "Кошмар&nbspГлубин"; $ob32 = "kosmar"; $b_n32 = "Кошмар&nbspГлубин";}
else if($rt["n$loc3"]=='22.22'){$ob3 = "prok"; $b_n3 = "Проклятие&nbspГлубин"; $ob32 = "prok"; $b_n32 = "Проклятие&nbspГлубин";}
else if($rt["n$loc3"]=='23.23'){$ob3 = "uzas"; $b_n3 = "Ужас&nbspГлубин"; $ob32 = "uzas"; $b_n32 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24.24'){$ob3 = "bes"; $b_n3 = "Бес"; $ob32 = "bes"; $b_n32 = "Бес";}
else if($rt["n$loc3"]=='25.25'){$ob3 = "zelen"; $b_n3 = "Зеленый&nbspГолем"; $ob32 = "zelen"; $b_n32 = "Зеленый&nbspГолем";}
else if($rt["n$loc3"]=='26.26'){$ob3 = "demon"; $b_n3 = "Крылатый&nbspДемон"; $ob32 = "demon"; $b_n32 = "Крылатый&nbspДемон";}
else if($rt["n$loc3"]=='27.27'){$ob3 = "skelet"; $b_n3 = "Скелет"; $ob32 = "skelet"; $b_n32 = "Скелет";}
else if($rt["n$loc3"]=='28.28'){$ob3 = "straz"; $b_n3 = "Страж"; $ob32 = "straz"; $b_n32 = "Страж";}

else if($rt["n$loc3"]=='19.19.19'){$ob3 = "trup"; $b_n3 = "Бродячий Труп"; $ob32 = "trup"; $b_n32 = "Бродячий Труп"; $ob33 = "trup"; $b_n33 = "Бродячий Труп";}
else if($rt["n$loc3"]=='20.20.20'){$ob3 = "izi"; $b_n3 = "Изи"; $ob32 = "izi"; $b_n32 = "Изи"; $ob33 = "izi"; $b_n33 = "Изи";}
else if($rt["n$loc3"]=='21.21.21'){$ob3 = "kosmar"; $b_n3 = "Кошмар Глубин"; $ob32 = "kosmar"; $b_n32 = "Кошмар Глубин"; $ob33 = "kosmar"; $b_n33 = "Кошмар Глубин";}
else if($rt["n$loc3"]=='22.22.22'){$ob3 = "prok"; $b_n3 = "Проклятие Глубин"; $ob32 = "prok"; $b_n32 = "Проклятие Глубин"; $ob33 = "prok"; $b_n33 = "Проклятие Глубин";}
else if($rt["n$loc3"]=='23.23.23'){$ob3 = "uzas"; $b_n3 = "Ужас Глубин"; $ob32 = "uzas"; $b_n32 = "Ужас Глубин"; $ob33 = "uzas"; $b_n33 = "Ужас Глубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24.24.24'){$ob3 = "bes"; $b_n3 = "Бес"; $ob32 = "bes"; $b_n32 = "Бес"; $ob33 = "bes"; $b_n33 = "Бес";}
else if($rt["n$loc3"]=='25.25.25'){$ob3 = "zelen"; $b_n3 = "Зеленый&nbspГолем"; $ob32 = "zelen"; $b_n32 = "Зеленый&nbspГолем"; $ob33 = "zelen"; $b_n33 = "Зеленый&nbspГолем";}
else if($rt["n$loc3"]=='26.26.26'){$ob3 = "demon"; $b_n3 = "Крылатый&nbspДемон"; $ob32 = "demon"; $b_n32 = "Крылатый&nbspДемон"; $ob33 = "demon"; $b_n33 = "Крылатый&nbspДемон";}
else if($rt["n$loc3"]=='27.27.27'){$ob3 = "skelet"; $b_n3 = "Скелет"; $ob32 = "skelet"; $b_n32 = "Скелет"; $ob33 = "skelet"; $b_n33 = "Скелет";}
else if($rt["n$loc3"]=='28.28.28'){$ob3 = "straz"; $b_n3 = "Страж"; $ob32 = "straz"; $b_n32 = "Страж"; $ob33 = "straz"; $b_n33 = "Страж";}

if($rt["n$loc2"]=='19'){$ob2 = "trup"; $b_n2 = "Бродячий&nbspТруп";}
else if($rt["n$loc2"]=='20'){$ob2 = "izi"; $b_n2 = "Изи";}
else if($rt["n$loc2"]=='21'){$ob2 = "kosmar"; $b_n2 = "Кошмар&nbspГлубин";}
else if($rt["n$loc2"]=='22'){$ob2 = "prok"; $b_n2 = "Проклятие&nbspГлубин";}
else if($rt["n$loc2"]=='23'){$ob2 = "uzas"; $b_n2 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24'){$ob2 = "bes"; $b_n2 = "Бес";}
else if($rt["n$loc2"]=='25'){$ob2 = "zelen"; $b_n2 = "Зеленый&nbspГолем";}
else if($rt["n$loc2"]=='26'){$ob2 = "demon"; $b_n2 = "Крылатый&nbspДемон";}
else if($rt["n$loc2"]=='27'){$ob2 = "skelet"; $b_n2 = "Скелет";}
else if($rt["n$loc2"]=='28'){$ob2 = "straz"; $b_n2 = "Страж";}

else if($rt["n$loc2"]=='19.19'){$ob2 = "trup"; $b_n2 = "Бродячий&nbspТруп"; $ob22 = "trup"; $b_n22 = "Бродячий&nbspТруп";}
else if($rt["n$loc2"]=='20.20'){$ob2 = "izi"; $b_n2 = "Изи"; $ob22 = "izi"; $b_n22 = "Изи";}
else if($rt["n$loc2"]=='21.21'){$ob2 = "kosmar"; $b_n2 = "Кошмар&nbspГлубин"; $ob22 = "kosmar"; $b_n22 = "Кошмар&nbspГлубин";}
else if($rt["n$loc2"]=='22.22'){$ob2 = "prok"; $b_n2 = "Проклятие&nbspГлубин"; $ob22 = "prok"; $b_n22 = "Проклятие&nbspГлубин";}
else if($rt["n$loc2"]=='23.23'){$ob2 = "uzas"; $b_n2 = "Ужас&nbspГлубин"; $ob22 = "uzas"; $b_n22 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24.24'){$ob2 = "bes"; $b_n2 = "Бес"; $ob22 = "bes"; $b_n22 = "Бес";}
else if($rt["n$loc2"]=='25.25'){$ob2 = "zelen"; $b_n2 = "Зеленый&nbspГолем"; $ob22 = "zelen"; $b_n22 = "Зеленый&nbspГолем";}
else if($rt["n$loc2"]=='26.26'){$ob2 = "demon"; $b_n2 = "Крылатый&nbspДемон"; $ob22 = "demon"; $b_n22 = "Крылатый&nbspДемон";}
else if($rt["n$loc2"]=='27.27'){$ob2 = "skelet"; $b_n2 = "Скелет"; $ob22 = "skelet"; $b_n22 = "Скелет";}
else if($rt["n$loc2"]=='28.28'){$ob2 = "straz"; $b_n2 = "Страж"; $ob22 = "straz"; $b_n22 = "Страж";}

else if($rt["n$loc2"]=='19.19.19'){$ob2 = "trup"; $b_n2 = "Бродячий&nbspТруп"; $ob22 = "trup"; $b_n22 = "Бродячий&nbspТруп"; $ob23 = "trup"; $b_n23 = "Бродячий&nbspТруп";}
else if($rt["n$loc2"]=='20.20.20'){$ob2 = "izi"; $b_n2 = "Изи"; $ob22 = "izi"; $b_n22 = "Изи"; $ob23 = "izi"; $b_n23 = "Изи";}
else if($rt["n$loc2"]=='21.21.21'){$ob2 = "kosmar"; $b_n2 = "Кошмар&nbspГлубин"; $ob22 = "kosmar"; $b_n22 = "Кошмар&nbspГлубин"; $ob23 = "kosmar"; $b_n23 = "Кошмар&nbspГлубин";}
else if($rt["n$loc2"]=='22.22.22'){$ob2 = "prok"; $b_n2 = "Проклятие&nbspГлубин"; $ob22 = "prok"; $b_n22 = "Проклятие&nbspГлубин"; $ob23 = "prok"; $b_n23 = "Проклятие&nbspГлубин";}
else if($rt["n$loc2"]=='23.23.23'){$ob2 = "uzas"; $b_n2 = "Ужас&nbspГлубин"; $ob22 = "uzas"; $b_n22 = "Ужас&nbspГлубин"; $ob23 = "uzas"; $b_n23 = "Ужас&nbspГлубин";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24.24.24'){$ob2 = "bes"; $b_n2 = "Бес"; $ob22 = "bes"; $b_n22 = "Бес"; $ob23 = "bes"; $b_n23 = "Бес";}
else if($rt["n$loc2"]=='25.25.25'){$ob2 = "zelen"; $b_n2 = "Зеленый&nbspГолем"; $ob22 = "zelen"; $b_n22 = "Зеленый&nbspГолем"; $ob23 = "zelen"; $b_n23 = "Зеленый&nbspГолем";}
else if($rt["n$loc2"]=='26.26.26'){$ob2 = "demon"; $b_n2 = "Крылатый&nbspДемон"; $ob22 = "demon"; $b_n22 = "Крылатый&nbspДемон"; $ob23 = "demon"; $b_n23 = "Крылатый&nbspДемон";}
else if($rt["n$loc2"]=='27.27.27'){$ob2 = "skelet"; $b_n2 = "Скелет"; $ob22 = "skelet"; $b_n22 = "Скелет"; $ob23 = "skelet"; $b_n23 = "Скелет";}
else if($rt["n$loc2"]=='28.28.28'){$ob2 = "straz"; $b_n2 = "Страж"; $ob22 = "straz"; $b_n22 = "Страж"; $ob23 = "straz"; $b_n23 = "Страж";}  

if($rt["n$loc2"]=='1' or $rt["n$loc2"]=='2' or $rt["n$loc2"]=='3' or $rt["n$loc2"]=='4' or $rt["n$loc2"]=='5' or $rt["n$loc2"]=='6' or $rt["n$loc2"]=='7' or $rt["n$loc2"]=='8' or $rt["n$loc2"]=='9' or $rt["n$loc2"]=='10' or $rt["n$loc2"]=='11' or $rt["n$loc2"]=='12' or $rt["n$loc2"]=='13' or $rt["n$loc2"]=='14' or $rt["n$loc2"]=='15' or $rt["n$loc2"]=='16' or $rt["n$loc2"]=='17' or $rt["n$loc2"]=='18' or $rt["n$loc2"]=='19' or $rt["n$loc2"]=='20' or $rt["n$loc2"]=='21' or $rt["n$loc2"]=='22' or $rt["n$loc2"]=='23' or $rt["n$loc2"]=='24' or $rt["n$loc2"]=='25' or $rt["n$loc2"]=='26' or $rt["n$loc2"]=='27' or $rt["n$loc2"]=='28' or $rt["n$loc2"]=='29' or $rt["n$loc2"]=='30' or $rt["n$loc2"]=='31'){$k_b2 = 1;}
if($rt["n$loc2"]=='1.1' or $rt["n$loc2"]=='1.2' or $rt["n$loc2"]=='1.3' or $rt["n$loc2"]=='2.2' or $rt["n$loc2"]=='2.3' or $rt["n$loc2"]=='3.3' or $rt["n$loc2"]=='9.9' or $rt["n$loc2"]=='10.10' or $rt["n$loc2"]=='11.11' or $rt["n$loc2"]=='12.12' or $rt["n$loc2"]=='13.13' or $rt["n$loc2"]=='14.14' or $rt["n$loc2"]=='15.15' or $rt["n$loc2"]=='16.16' or $rt["n$loc2"]=='17.17' or $rt["n$loc2"]=='18.18' or $rt["n$loc2"]=='19.19' or $rt["n$loc2"]=='20.20' or $rt["n$loc2"]=='21.21' or $rt["n$loc2"]=='22.22' or $rt["n$loc2"]=='23.23' or $rt["n$loc2"]=='24.24' or $rt["n$loc2"]=='25.25' or $rt["n$loc2"]=='26.26' or $rt["n$loc2"]=='27.27' or $rt["n$loc2"]=='28.28'){$k_b2 = 2;}
if($rt["n$loc2"]=='1.1.1' or $rt["n$loc2"]=='1.1.2' or $rt["n$loc2"]=='1.1.3' or $rt["n$loc2"]=='1.2.2' or $rt["n$loc2"]=='1.3.2' or $rt["n$loc2"]=='1.3.3' or $rt["n$loc2"]=='2.2.2' or $rt["n$loc2"]=='2.2.3' or $rt["n$loc2"]=='2.3.3' or $rt["n$loc2"]=='3.3.3' or $rt["n$loc2"]=='1.2.3' or $rt["n$loc2"]=='9.9.9' or $rt["n$loc2"]=='10.10.10' or $rt["n$loc2"]=='11.11.11' or $rt["n$loc2"]=='12.12.12' or $rt["n$loc2"]=='13.13.13' or $rt["n$loc2"]=='14.14.14' or $rt["n$loc2"]=='15.15.15' or $rt["n$loc2"]=='16.16.16' or $rt["n$loc2"]=='17.17.17' or $rt["n$loc2"]=='18.18.18' or $rt["n$loc2"]=='19.19.19' or $rt["n$loc2"]=='20.20.20' or $rt["n$loc2"]=='21.21.21' or $rt["n$loc2"]=='22.22.22' or $rt["n$loc2"]=='23.23.23' or $rt["n$loc2"]=='24.24.24' or $rt["n$loc2"]=='25.25.25' or $rt["n$loc2"]=='26.26.26' or $rt["n$loc2"]=='27.27.27' or $rt["n$loc2"]=='28.28.28'){$k_b2 = 3;}
?>
