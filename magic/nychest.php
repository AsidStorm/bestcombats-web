<?

$ma1 = mysql_fetch_array(mysql_query("SELECT * from inventory where owner='$_SESSION[uid]' and id='$_GET[use]' AND (prototype=101779 OR prototype=101780 OR prototype=101781 OR prototype=101782);"));
$vo1 = mysql_fetch_array(mysql_query("SELECT * from inventory where owner='$_SESSION[uid]' and id='$_GET[use]' AND (prototype=101775 OR prototype=101776 OR prototype=101777 OR prototype=101778);"));

if ($ma1['id']) { 
if ($ma1['ecost'] == 200) 
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand21=rand(70, 80);
if ($user["level"]<=9) {
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1890,"shop","Сундук", "", 0, array("maxdur"=>$rand21));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1891,"shop","Сундук", "", 0, array("maxdur"=>$rand21));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1889,"shop","Сундук", "", 0, array("maxdur"=>$rand21));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1888,"shop","Сундук", "", 0, array("maxdur"=>$rand21));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1541,"shop","Сундук", "", 0, array("goden"=>60));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'"); 
} 
elseif ($ma1['ecost'] == 400)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand22=rand(13, 16);
$rand23=rand(70, 80);
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>$rand22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , ";
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>$rand22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1891,"shop","Сундук", "", 0, array("maxdur"=>$rand23));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1890,"shop","Сундук", "", 0, array("maxdur"=>$rand23));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1889,"shop","Сундук", "", 0, array("maxdur"=>$rand23));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , "; }
else {
$ret=takeshopitem(1888,"shop","Сундук", "", 0, array("maxdur"=>$rand23));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\">$ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>90, "maxdur"=>7));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'"); 
}
elseif ($ma1['ecost'] == 600)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand24=rand(17, 21);
$rand25=rand(95, 105);
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>120, "maxdur"=>10));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>$rand24));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>$rand24));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1891,"shop","Сундук", "", 0, array("maxdur"=>$rand25));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1890,"shop","Сундук", "", 0, array("maxdur"=>$rand25));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1888,"shop","Сундук", "", 0, array("maxdur"=>$rand25));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1889,"shop","Сундук", "", 0, array("maxdur"=>$rand25));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'");
}
elseif ($ma1['ecost'] == 1000)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand26=rand(15, 18);
$rand27=rand(105, 113);
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>$rand26));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101698,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(101618,"berezka","Сундук", "", 0, array("maxdur"=>22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101585,"berezka","Сундук", "", 0, array("maxdur"=>$rand26));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101699,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1889,"shop","Сундук", "", 0, array("maxdur"=>$rand27));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1890,"shop","Сундук", "", 0, array("maxdur"=>$rand27));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1891,"shop","Сундук", "", 0, array("maxdur"=>$rand27));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1888,"shop","Сундук", "", 0, array("maxdur"=>$rand27));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>120, "maxdur"=>12));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'"); 
} 
else { echo "Что то не так =D 1"; } 
}
 
elseif ($vo1['id']) {
if ($vo1['ecost'] == 200)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand28=rand(70, 80);
if ($user["level"]<=9) {
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1895,"shop","Сундук", "", 0, array("maxdur"=>$rand28));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1894,"shop","Сундук", "", 0, array("maxdur"=>$rand28));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1892,"shop","Сундук", "", 0, array("maxdur"=>$rand28));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1893,"shop","Сундук", "", 0, array("maxdur"=>$rand28));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>60));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>60));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name]";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'"); 
} 
elseif ($vo1['ecost'] == 400)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand29=rand(10, 15);
$rand30=rand(70, 80);
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>90, "maxdur"=>7));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>$rand29));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>$rand29));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>15));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>$rand29));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1895,"shop","Сундук", "", 0, array("maxdur"=>$rand30));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1894,"shop","Сундук", "", 0, array("maxdur"=>$rand30));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1893,"shop","Сундук", "", 0, array("maxdur"=>$rand30));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1892,"shop","Сундук", "", 0, array("maxdur"=>$rand30));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>90));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'");
}
elseif ($vo1['ecost'] == 600)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand31=rand(17, 21);
$rand32=rand(101, 112);
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>$rand31));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>$rand31));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>20));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>$rand31));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1894,"shop","Сундук", "", 0, array("maxdur"=>$rand32));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1895,"shop","Сундук", "", 0, array("maxdur"=>$rand32));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1893,"shop","Сундук", "", 0, array("maxdur"=>$rand32));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1892,"shop","Сундук", "", 0, array("maxdur"=>$rand32));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>120, "maxdur"=>10));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'");
} 
elseif ($vo1['ecost'] == 1000)
{
echo "<div align='left'>Удачно использовано заклинание. Вы обнаружили: <font color=black>";
$rand33=rand(18, 25);
$rand34=rand(105, 122);
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(2316,"shop","Сундук", "", 0, array("goden"=>120, "maxdur"=>12));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
if ($user["level"]<=9) {
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>$rand33));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>$rand33));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(100593,"berezka","Сундук", "", 0, array("maxdur"=>22));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
$ret=takeshopitem(101629,"berezka","Сундук", "", 0, array("maxdur"=>$rand33));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
if ($user["level"]<=8) {
$ret=takeshopitem(1892,"shop","Сундук", "", 0, array("maxdur"=>$rand34));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=9) {
$ret=takeshopitem(1894,"shop","Сундук", "", 0, array("maxdur"=>$rand34));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
elseif ($user["level"]<=10) {
$ret=takeshopitem(1893,"shop","Сундук", "", 0, array("maxdur"=>$rand34));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
else {
$ret=takeshopitem(1895,"shop","Сундук", "", 0, array("maxdur"=>$rand34));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , "; }
$ret=takeshopitem(1539,"shop","Сундук", "", 0, array("goden"=>120));
echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] ";
echo "<br></font></div>";
mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'");
}
else { echo "Что то не так =D 2"; } 
}

else { echo "Что то не так =D 3"; }

?>