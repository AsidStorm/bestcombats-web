<?php
function imp ($array) {
	foreach($array as $k => $v) {
		$str .= $k.";".$v.";";
	}
	return $str;
}

function expa ($str) {
	$array = explode(";",$str);
	for ($i = 0; $i<=count($array)-2;$i=$i+2) {
		$rarray[$array[$i]] = $array[$i+1];
	}
	return $rarray;
}
?>