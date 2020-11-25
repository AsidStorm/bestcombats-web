<?php
$b=mqfa1("select battle from users where login='$_POST[target]'");
if ($b) {
mysql_query("UPDATE users SET `battle` =0, `nich` = `nich`+'1',`fullhptime` = ".time().",`fullmptime` = ".time().",`udar` = '0' WHERE `battle` = $b");
mq("update battle set win=0 where id='$b'");
mq("delete from bots where battle='$b'");
$fp = fopen ("backup/logs/battle$b.txt","a"); //открытие
flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
fputs($fp , '<hr><span class=date>'.date("H:i").'</span> Бой закончен. Ничья.<BR>'); //работа с файлом
fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
fclose ($fp); //закрытие
echo "<b>Бой персонажа $_POST[target] удалён.</b>";
} else echo "<b><font color=red>Персонаж $_POST[target] не в бою.</font></b>";
?>