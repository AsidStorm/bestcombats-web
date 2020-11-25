<?
error_reporting(E_ALL ^ E_NOTICE);
include_once('includes/mapmove_class.php');
echo "<body style='font-family:monospace;'>";
$map = new TMapmove();
$map->cur_pos=array(0,0);
//$c=array(0,0);
$map->paint();
$map->move_to(1,1);
$map->paint();
echo "</body>";
?>