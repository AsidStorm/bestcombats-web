<?php
   
    
$d = mqfa("SELECT * FROM effects WHERE type = 9999 AND owner = " . $user['id'] . " ORDER BY id DESC");
if ($d) {
    global $nodrink;
    if (in_array($user["room"],$nodrink)) {
      echo "Здесь запрещено пить эликсиры!";
    } elseif ($user['battle'] > 0) {
      echo "Не в бою...";               
    } else {
        mysql_query('DELETE FROM effects WHERE id = ' . $d['id']);
        mysql_query("
            UPDATE users 
            SET 
              sila  = (".((-1)*$d['sila'])." + sila), 
              lovk  = (".((-1)*$d['lovk'])." + lovk), 
              inta  = (".((-1)*$d['inta'])." + inta), 
              vinos = (".((-1)*$d['vinos'])." + vinos)
            WHERE id = $user[id]
        ") or die(mysql_error());
        echo "Вы успешно вылечены от болезни " . $d['name'];
        addchp ('<font color=red>Внимание!</font> Вы успешно вылечены от болезни <b>' . $d['name'] . '</b>', '{[]}'.$user['login'].'{[]}');
        $bet=1;
    }
} else {
    echo "Вы не болеете";
}

    
?>
