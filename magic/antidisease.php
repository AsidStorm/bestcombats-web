<?php
   
    
$d = mqfa("SELECT * FROM effects WHERE type = 9999 AND owner = " . $user['id'] . " ORDER BY id DESC");
if ($d) {
    global $nodrink;
    if (in_array($user["room"],$nodrink)) {
      echo "����� ��������� ���� ��������!";
    } elseif ($user['battle'] > 0) {
      echo "�� � ���...";               
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
        echo "�� ������� �������� �� ������� " . $d['name'];
        addchp ('<font color=red>��������!</font> �� ������� �������� �� ������� <b>' . $d['name'] . '</b>', '{[]}'.$user['login'].'{[]}');
        $bet=1;
    }
} else {
    echo "�� �� �������";
}

    
?>
