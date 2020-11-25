<form method=post action="showmap.php">
<table>

<tr><td>Y</td><td>
<input name="y" autocomplete="off" type="text" />
<tr><td>X</td><td>

<input name="x" autocomplete="off" type="text" />
<tr><td>Data</td><td>

<input name="data" type="text" autocomplete="off"/>
</table>
<INPUT TYPE="submit" value=" Добавить ">
</form>
<?php

include '../connect.php';
include 'functions.php';

function printMap($array) {
       
    function drawObjects ($arr, $x, $y, $cont) {
        $styleWall = 'background: #7F7F7F;';
        $styleBat  = 'background: #FFA500;';
        $styleObj  = 'background: #FFFF00;';
        if ($cont == '1') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y+1][$x] == '1' && @$arr[$y-1][$x] == '1') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y][$x+1] == '1' && @$arr[$y][$x-1] == '1') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y][$x-1] == '1' && @$arr[$y+1][$x] == '1/') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y][$x+1] == '1' && @$arr[$y-1][$x] == '1') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y][$x-1] == '1' && @$arr[$y-1][$x] == '1') {
            return $styleWall;
        }
        if (!$cont && @$arr[$y][$x+1] == '1' && @$arr[$y+1][$x] == '1') {
            return $styleWall;
        }
        if (strpos($cont, 'b') !== false || strpos($cont, 'a') !== false || strpos($cont, 'w') !== false) {
            return $styleBat;
        }
        if (strpos($cont, 'o') !== false || strpos($cont, 'p') !== false) {
            return $styleObj;
        }
    }
    
    echo '<table>';
    foreach ($array as $y => $vert) {
        echo '<tr>';
            foreach ($vert as $x => $cont) {
                echo '<td style="text-align: center; white-space: nowrap; padding: 0.3em; ' . drawObjects($array, $x, $y, $cont) . '">
                          <span style="font-size: 0.6em; color: #4D4D4D;vertical-align: top;">' . $x. '/' . $y . '</span><br />
                          <input style="font-size: 0.8em; text-align: center; border: none; width: 5em; ' . drawObjects($array, $x, $y, $cont) . '" type="text" name="arr[' . $y . '][' . $x . ']" value="' . $cont . '" />
                      </td>
                '; 
            }
        echo '</tr>';
    }
    echo '</table>';
}

header("Content-type: text/html; charset=windows-1251");

echo '
    <style type="text/css">
        table
        {
        border-collapse:collapse;
        }
        table, td, th
        {
        border:1px solid black;
        }
    </style>
';
$map = unserialize(db_result(db_query("SELECT map FROM cavemaps WHERE id = 29"), 0, 0));
$map[$_POST['x']][$_POST['y']]=$_POST['data'];
if (mq('UPDATE cavemaps SET `map`= \''.serialize($map).'\' WHERE id = 29')); echo "Карта удачно сохранена";
 
printMap($map);

?>
