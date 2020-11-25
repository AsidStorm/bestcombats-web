<?php
function antispam ($text){
$os = array("combats.com", "combats.net", "combats.biz", "combats.az");
if (in_array("$text", $os)) {
$text = str_replace($text, "<font color=red>Найдены запрещенные символы в сообщение</font>", "$text");
}
return $text;
}
?>