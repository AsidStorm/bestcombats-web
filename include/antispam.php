<?php
function hasbad($txt) {
  return $bad;
}

function haslinks($txt) {
  $txt=strtolower($txt);
  $txt=str_replace("made-in-razin","",$txt);
  $txt=str_replace("slon-ua","",$txt);
  $txt=str_replace("d_r_u_i_d","",$txt);
  $txt=str_replace("ji_sun_park","",$txt);
  $txt=str_replace("bestcombats.net/register.php","",$txt);
  $txt=str_replace("inqisitors-Devils.ucoz.ua","",$txt);
  $txt=str_replace("radiostyle.ru","",$txt);
  $txt=str_replace("tampilers.clan.su","",$txt);
  $txt=str_replace("armyoflife.clan.su","",$txt);
  $txt=str_replace("gmail.com","",$txt);
  $txt=str_replace("mail.ru","",$txt);
  $txt=str_replace("bestcombats.net","",$txt);
  $txt=str_replace("youtube.com","",$txt);
  $txt=str_replace("clansanctorum.ru","",$txt);
  $txt=str_replace("stalkers-Devils.ucoz.org","",$txt);
  $txt=str_replace("musicians.clan.su","",$txt);
  $txt=str_replace("tampilers.clan.su","",$txt);
  $txt=str_replace("kayenitknights.clan.su","",$txt);
  $txt=str_replace("rusimperia.ucoz.ru","",$txt);
  $txt=str_replace("webmoney.ru","",$txt);
  $txt=str_replace("gmail.com","",$txt);
  $txt=str_replace("wofclan2011.ucoz.ru","",$txt);
  $txt=str_replace("Devils0fwar.clan.su","",$txt);
  $txt=str_replace("wmk_ru","",$txt);
  $txt=str_replace("wmz.lv","",$txt);
  $txt=str_replace("ice-sun","",$txt);
  $txt=str_replace("Support","",$txt);
  $txt=str_replace("vkontakte.ru","",$txt);
  $txt=str_replace("darkclan.ru","",$txt);
  $txt=str_replace("radikal.ru","",$txt);
  $txt=str_replace("gyazo.com","",$txt);
  $txt=str_replace("wmcasher.ru","",$txt);
  $txt=str_replace("Devils-wov.clan.su","",$txt);
  $txt=str_replace("the-unicorns.ucoz.ru","",$txt);
  $txt=str_replace("www.cossacksofhel.clan.su","",$txt);
  $txt=str_replace("ubj.clan.su","",$txt);
  $txt=str_replace("www.starw.fo.ru","",$txt);
  $txt=str_replace("netexchange.ru","",$txt);
  $txt=str_replace("sprypay.ru","",$txt);
  $txt=str_replace("реал-комбатс","real-combats.com",$txt);
  $txt=str_replace("бквар","bkwar.com",$txt);
  $txt=str_replace("empireofgods net","empireofgods.net",$txt);
  $txt=str_replace("@",".",$txt);
  $txt=str_replace("_",".",$txt);
  $txt=str_replace("*",".",$txt);
  $txt=str_replace("?",".",$txt);
  $txt=str_replace("=",".",$txt);
  $txt=str_replace("-",".",$txt);
  $txt=str_replace(",",".",$txt);
  $txt=str_replace("(","",$txt);
  $txt=str_replace(")","",$txt);
  $txt=str_replace("&lt;","",$txt);
  $txt=str_replace("&gt;","",$txt);
  $txt1=$txt;
  $txt=" $txt ";

  $txt=preg_replace("/\s*\.\s*/", ".", $txt);
  $txt=preg_replace("/(\s|\.)r(\s|\.){0,}u(\s|\.|\/)/i", ".ru ", $txt);
  $txt=preg_replace("/(\s|\.)u(\s|\.){0,}a(\s|\.|\/)/i", ".ru ", $txt);
  $txt=preg_replace("/(\s|\.)o\s{0,}r(\s|\.)\s{0,}g(\s|\.)/i", ".org", $txt);
  $txt=preg_replace("/(\s|\.)c(\s|\.){0,}o(\s|\.){0,}m(\s|\.|\/)/i", ".com ", $txt);

  $txt=str_replace("c o m","com",$txt);
  $txt=str_replace("r u","ru",$txt);
  $txt=str_replace(" рy ",".ru",$txt);
  $txt=str_replace(" com ",".com ",$txt);
  $txt=str_replace(" net ",".net ",$txt);
  $txt=str_replace("combats ru","combats.ru",$txt);
  $txt=str_replace("COMBATS RU","combats.ru",$txt);
  $txt=str_replace("wars az","wars.az",$txt);
  if (strpos(strtolower($txt),"warbk")) return true;
  $txt=str_replace("["," [ ",$txt);
  $txt=str_replace("]"," ] ",$txt);
  $txt=str_replace("..",".",$txt);
  $txt=str_replace("..",".",$txt);
  $txt=str_replace("цом","com",$txt);
  $txt=str_replace("ur.stabmoc","combats.ru",$txt);
  $txt=" $txt ";
    if (strpos($txt,".com") !== false) return true;
    if (strpos($txt,". com") !== false) return true;
    if (strpos($txt,".ru") !== false) return true;

  if (strpos($txt,"t o /") !== false) return true;
  if (strpos($txt,"h e o l . b i z") !== false) return true;
  if (strpos($txt,"b k") !== false) return true;
  if (strpos($txt,"aw-lost") !== false) return true;
  if (strpos($txt,"mybk") !== false) return true;
  if (strpos($txt,"devilwar") !== false) return true;
  if (strpos($txt,"bkwar") !== false) return true;
  if (strpos($txt,"u r l s") !== false) return true;
  if (strpos($txt,"(*)") !== false) return true;
  if (strpos($txt,".ru") !== false) return true;
  if (strpos($txt,"azefight") !== false) return true;
  if (strpos($txt,"o+l+d") !== false) return true;
  if (strpos($txt,"goo.gl") !== false) return true;
  if (strpos($txt,"bi z") !== false) return true;
  if (strpos($txt,"b iz") !== false) return true;
  if (strpos($txt,"(.)") !== false) return true;
  if (strpos($txt,"legendarybk") !== false) return true;
  if (strpos($txt,"Ньюкомбвирт") !== false) return true;
  if (strpos($txt,"l a s t c a r n a g e . o r g") !== false) return true;
  if (strpos($txt,"goo_gl") !== false) return true;
  if (strpos($txt,"vst") !== false) return true;
  if (strpos($txt,"goo.gl") !== false) return true;
  if (strpos($txt,"urlid") !== false) return true;
  if (strpos($txt,"u.to") !== false) return true;
  if (strpos($txt,"u*.*t*o") !== false) return true;
  if (strpos($txt,"legendworld") !== false) return true;
  if (strpos($txt,"{to}") !== false) return true; 
  if (strpos($txt,"worldofchaos") !== false) return true; 
  if (strpos($txt,"жарcаз") !== false) return true;
  if (strpos($txt,"urls") !== false) return true;
  if (strpos($txt,"казварс") !== false) return true;
  if (strpos($txt,"cazbc") !== false) return true;
  if (strpos($txt,"u+r+l+s") !== false) return true;
  if (strpos($txt,"u+r+l+5") !== false) return true;
  if (strpos($txt,"у х у") !== false) return true;
  if (strpos($txt,"точcаkz") !== false) return true;
  if (strpos($txt,"о б к 2") !== false) return true;
  if (strpos($txt,"sbk2") !== false) return true;
  if (strpos($txt,"s b k 2") !== false) return true;
  if (strpos($txt,"obk") !== false) return true;
  if (strpos($txt,"НьюКомбвирт") !== false) return true;
  if (strpos($txt,"u+r+1") !== false) return true;
  if (strpos($txt,"асгардбк") !== false) return true;
  if (strpos($txt,"b+2+3") !== false) return true;
  if (strpos($txt,"a+s+g+a+r+d") !== false) return true;
  if (strpos($txt,"l/o/s/t/b/k/./r/u") !== false) return true;
  if (strpos($txt,"Оbestcombats") !== false) return true;
  if (strpos($txt,"bget") !== false) return true;
  if (strpos($txt,"gd") !== false) return true;
  if (strpos($txt,"тoчcаcom")  !== false) return true;
  if (strpos($txt,"virt")  !== false) return true;
  if (strpos($txt,"newcombvirt")  !== false) return true;
  if (strpos($txt,"t`i`m`e`s`o`f`d`i`s`c`o`r`d")  !== false) return true;
  if (strpos($txt,"комбатс2002ру")  !== false) return true;
  if (strpos($txt,"lcombats") !== false) return true;
  if (strpos($txt,"убираем+") !== false) return true;
  if (strpos($txt,"kg") !== false) return true;
  if (strpos($txt,"c o m b a t s") !== false) return true;
  if (strpos($txt,"o+u+r+c+o+m+b+a+t+s") !== false) return true;
  if (strpos($txt,"h+a+a") !== false) return true;
  if (strpos($txt,"b/k/w/a/r") !== false) return true;
  if (strpos($txt,"k)c") !== false) return true;
  if (strpos($txt,"h t t p") !== false) return true;
  if (strpos($txt,"w w w") !== false) return true;
  if (strpos($txt,"world-fight") !== false) return true;
  if (strpos($txt,"n b k - l i v e") !== false) return true;
  if (strpos($txt,"cruel-world.ru") !== false) return true;
  if (strpos($txt,"goo.gl/p8rk8") !== false) return true;
  if (strpos($txt,"goo.gl/lr") !== false) return true;
  if (strpos($txt,"goo.gl/pzh1") !== false) return true;
  if (strpos($txt,"*ком") !== false) return true;
  if (strpos($txt,"ру-лол") !== false) return true;
  if (strpos($txt,"oasis(точка)evolutions(точка)ru") !== false) return true;

  if (preg_match('/combat[sc].*2/ie', " $txt ")) return 1;    
  if (preg_match('/(s2\.)([cс][oо][mм])(\/\S*)?/ie', " $txt ")) return 1;
  return preg_match('/(([a-zA-Zа-яА-Я0-9\-_\.]+\.)(c.o.m|com|ru|org|co.cc|net|ua|do\.am|su[^p]|us|tk|us|kz|az|biz|рф|info|lv|in|org)(\/|\s|-|_|\.|:))/ie', " $txt ")+strpos($txt,"register.php");
  return preg_match('/(([a-zA-Zа-яА-Я0-9\-_\.]+\.)(com)\S)/ie', " $txt ")+strpos($txt,"register.php");
  return preg_match("/meydan\\.in^[a-zA-Z]+/i", " $txt ")+strpos($txt,"register.php");
  return preg_match('/(([a-zA-Zа-яА-Я0-9\-_\.]+\.)(c.?o.?m|ru|org|co.cc|net|ua|do\.am|su[^p]|us|tk|us|kz|az|biz|рф|info|lv|in)[a-z])/ie', " $txt ")+strpos($txt,"register.php");
  return preg_match('/(([a-zA-Zа-яА-Я0-9\-_\.]+\.)(c.?o.?m|com|ru|org|co.cc|net|ua|do\.am|su[^p]|us|tk|us|kz|az|biz|рф|info)(\/|\S))/ie', " $txt ")+strpos($txt,"register.php");
}