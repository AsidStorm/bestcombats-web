<?php

$p = mqfa("SELECT id, name FROM effects WHERE type = 9994 AND owner = " . $user['id'] . " ORDER BY id DESC");
if ($p) {
    global $nodrink;
    if (in_array($user["room"],$nodrink)) {
      echo "����� ��������� ���� ��������!";
    } elseif ($user['battle'] > 0) {
      echo "�� � ���...";               
    } else {
        mysql_query('DELETE FROM effects WHERE id = ' . $p['id']);
        echo "�� ������� �������� �� ��� " . $p['name'];
        addchp ('<font color=red>��������!</font> �� ������� �������� �� ��� <b>' . $p['name'] . '</b>', '{[]}'.$user['login'].'{[]}');
        $bet=1;
    }
} else {
    echo "�� �� ���������";
}
    
?>
