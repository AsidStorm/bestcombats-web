<?php

////////////////////////////////// 1 floor ///////////////////////////////////////////

// �������� �� ������ �������
if ($tx*2==2 && $ty*2==10 && (int)$floor == 1) { 
    gotoxy(2, 12, 1, "�� ����������������� �� ������ �������");
}

////////////////////////////////// 3 floor ///////////////////////////////////////////

// �������
if ($tx*2==18 && $ty*2==18 && (int)$floor == 3) { 
    $rand = mt_rand(1,100);
    if ($rand <= 100) {
        $mhp = 500 + mt_rand(0, 500);
        $report = "�� ������ � ������� -$mhp HP.";
        takehp($user["id"], $mhp);
        $aMap = unserialize(mqfa1("select map from caves where leader='$user[caveleader]' and floor='$floor'"));
        $aMap[18][18] = 's/75';
        mq("update caves set map='".serialize($aMap)."' where leader='$user[caveleader]' and floor='$floor'");
    }
}

// �������
if ($tx*2==18 && $ty*2==14 && (int)$floor == 3) {
    $iskey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE prototype = 2589 AND owner = " . $user['id']), 0, 0);
    if (!$iskey) {
        gotoxy(18, 16, 3, "��� ������� ��������� ���� �� ������");
    }
}
 
?>
