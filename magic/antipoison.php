<?php

$p = mqfa("SELECT id, name FROM effects WHERE type = 9994 AND owner = " . $user['id'] . " ORDER BY id DESC");
if ($p) {
    global $nodrink;
    if (in_array($user["room"],$nodrink)) {
      echo "Здесь запрещено пить эликсиры!";
    } elseif ($user['battle'] > 0) {
      echo "Не в бою...";               
    } else {
        mysql_query('DELETE FROM effects WHERE id = ' . $p['id']);
        echo "Вы успешно вылечены от яда " . $p['name'];
        addchp ('<font color=red>Внимание!</font> Вы успешно вылечены от яда <b>' . $p['name'] . '</b>', '{[]}'.$user['login'].'{[]}');
        $bet=1;
    }
} else {
    echo "Вы не отравлены";
}
    
?>
