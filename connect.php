<?php
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );
if (1) {
  define("IMGBASE","");
  define("IMGNUM","");
} else {
  define("IMGBASE","");
  define("IMGFN","_rm");
}

if (!defined("INCRON")) define("INCRON", 1);

define("CHATROOT","/var/www/bestcombats/data/www/bestcombats.net/");
  if (!defined("DOCUMENTROOT")) define("DOCUMENTROOT","/var/www/bestcombats/data/www/bestcombats.net/");
define("APR1", 0);
define("LETTERQUEST", 0);
$status = true;
//$status = false;
$smalladms=array();
Error_Reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
date_default_timezone_set('Europe/Moscow');
if($status == false){
if($_SESSION['uid']!='241959'){die("Текнические работы.");}
}
  #Коннект с БД#
require_once("include/config.inc");
require_once("include/database.inc");

    foreach ($_POST as $k=>$v) {
        $_POST[$k] = htmlspecialchars(db_escape_string($v));
    }
    foreach ($_GET as $k=>$v) {
        $_GET[$k] = htmlspecialchars(db_escape_string($v));
    }
    foreach ($_REQUEST as $k=>$v) {
        $_REQUEST[$k] = htmlspecialchars(db_escape_string($v));
    }

if(!function_exists('remquotes')){
  function remquotes($s) {
    $ret=str_replace('&','&amp;',$s);
    $ret=str_replace('"','&#34;',$ret);
    $ret=str_replace("'",'&#39;',$ret);
    $ret=str_replace(">",'&gt;',$ret);
    $ret=str_replace("<",'&lt;',$ret);
    return $ret;
  }
}

if(!function_exists("format_string")) {
function format_string(&$string)
   {
 $string=str_replace("\\n","<BR>",$string);
 $string = addslashes(preg_replace(array('/\s+/','/,+/','/\-+/','/\0/s','/%00/'), array(' ',',','-',' ',' '),trim(stripcslashes($string))));
 $string=str_replace("<BR>","\\n",$string);
   return $string;
   }}
array_walk($_REQUEST,"format_string");
array_walk($_POST,"format_string");
array_walk($_GET,"format_string");

if(date("w")<6 && date("w")>0){
  define ("proc_exp", "300");
}else{
  define ("proc_exp", "300");
}
$filenameseyn = 'data/seyn.txt';
if(file_exists($filenameseyn)){
define("seyn", "on");
}else{
define("seyn", "off");
}
$filename = 'data/vrag.txt';
if(file_exists($filename)){
define("vrag", "on");
}else{
define("vrag", "off");
}
define("MEMCACHE_PATH", "data/memcache");
if(!function_exists('trace')){
function trace() {
}
}
if(!function_exists('debug')){
function debug($s) {
  $f=fopen("ot.txt", "ab+");
  fwrite($f, "$s\r\n");
  fclose($f);
}
}
define("SELLCOEF", "1");

if(!function_exists('ereg'))            { function ereg($pattern, $subject, &$matches = []) { return preg_match('/'.$pattern.'/', $subject, $matches); } }
if(!function_exists('eregi'))           { function eregi($pattern, $subject, &$matches = []) { return preg_match('/'.$pattern.'/i', $subject, $matches); } }
if(!function_exists('ereg_replace'))    { function ereg_replace($pattern, $replacement, $string) { return preg_replace('/'.$pattern.'/', $replacement, $string); } }
if(!function_exists('eregi_replace'))   { function eregi_replace($pattern, $replacement, $string) { return preg_replace('/'.$pattern.'/i', $replacement, $string); } }
if(!function_exists('split'))           { function split($pattern, $subject, $limit = -1) { return preg_split('/'.$pattern.'/', $subject, $limit); } }
if(!function_exists('spliti'))          { function spliti($pattern, $subject, $limit = -1) { return preg_split('/'.$pattern.'/i', $subject, $limit); } }