<?php
// решетка
if ($tx*2==16 && $ty*2==40 && (int)$floor == 1) {
    $iskey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE prototype = 11466 AND owner = " . $user['id']), 0, 0);
    if (!$iskey) {
        gotoxy(16, 42, 1, "Для прохода необходим Мерцающий ключ №5");
    }
}
?>