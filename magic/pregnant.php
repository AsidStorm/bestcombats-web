<?php
$target=mqfa("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
$elix=mqfa("select id, name, time from effects where owner=$target[id] and type=30");
$efftime=60*60*24*270;



global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено пользоваться магией!";
} elseif ($user["sex"]!=1) {
  echo "Этот свиток могут использовать только персонажи мужского пола.";
} elseif ($user["battle"]>0) {
  echo "Не в бою...";
} elseif (!$target) {
  echo "Персонаж $_POST[target] не найден.";
} elseif (!$target["online"]) {
  echo "Персонаж $_POST[target] не в игре.";
} elseif ($target["room"]!=$user["room"]) {
  echo "Персонаж $_POST[target] вне пределов досягаемости.";
} elseif ($target["sex"]!=0) {
  echo "Этот свиток можно использовать только на персонажей женского пола.";
} elseif($elix) {
  echo "$_POST[target] уже беременна.";
} elseif ($row["prototype"]==1715 && $user["married"]!=$target["login"]) {
  echo "Этот свиток можно использовать только на свою супругу.";
} else {
  mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$target[id]','$row[name] от $user[login]', ".(time()+$efftime).",30)");
  echo "Персонаж &quot;$_POST[target]&quot; забеременела.";
  addch("<img src=i/magic/$row[img]>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"$row[name]\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком 9 месяцев.");
  updeffects();
  $bet=1;
}
?>