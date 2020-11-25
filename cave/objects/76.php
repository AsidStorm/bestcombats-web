<?php


////////////////////////////// ������ ���� ///////////////////////////////////////////

// ���������� 18x4
if ($tx*2==18 && $ty*2==4 && (int)$floor == 1) {  
    $report="<div style=\"font-weight:normal\">���� �� ��������</div>";
}

// ������ ���������� ������� 6x14
if ($tx*2==6 && $ty*2==14 && (int)$floor == 1) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 2) OR 
                (x = 4 AND y = 4) OR 
                (x = 8 AND y = 2) OR 
                (x = 8 AND y = 4) OR 
                (x = 6 AND y = 4)
            ) 
            AND floor='1'
    ");
    if ($aBots) {
        $report = '��� ������ ������� ���������� ����� ���� �������� � ������ � ���������.';
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand<=66) {
                $report = '�����, ��������� ��� ���.'; 
            } else {
                $rItems = array(1900, 1963, 1964, 2262);
                $rnd = mt_rand(0, (count($rItems) - 1));
                $report=itemtofloor($rItems[$rnd], 0, 0, 1);
            }
        } else {
            $report="�����";
        }
    }
}

// �������� 6x2
if ($tx*2==6 && $ty*2==2 && (int)$floor == 1) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 2) OR 
                (x = 4 AND y = 4) OR 
                (x = 8 AND y = 2) OR 
                (x = 8 AND y = 4) OR 
                (x = 6 AND y = 4)
            ) 
            AND floor='1'
    ");
    if ($aBots) {
        $report = '��� ������ ��������� ���������� ��������� ������.';
    } else {
        gotoxy(14, 6, 1, "�� ������������ ����������������.");
    }
}

// ����� �� 2-�� 14x2
if ($tx*2==14 && $ty*2==2 && (int)$floor == 1) {  
    gotoxy(16, 20, 2, "�� ������������ ������ �� 2-�� ����");
}

////////////////////////////// ������ ���� ///////////////////////////////////////////

// �������� 18x16
if ($tx*2==18 && $ty*2==16 && $floor == 2) {  
    gotoxy(6, 20, 2, "�� ������������ ����������������.");
}

// �������� 10x4
if ($tx*2==10 && $ty*2==4 && $floor == 2) {  
    $report="<div style=\"font-weight:normal\">�� ��������</div>";
}

// ������������ ����� 2x20
if ($tx*2==2 && $ty*2==20 && $floor == 2) {  
    if (isset($_GET['r'])) {
        gotoxy(6, 16, 2, "�� ������������ ����������������.");
    } else {
        gotoxy(6, 4, 2, "�� ������������ ����������������.");
    }
}

// ������������ ����� 2x8
if ($tx*2==2 && $ty*2==8 && $floor == 2) {  
    if (isset($_GET['r'])) {
        //$map[12][4] = 'p/65/63';
        //updmap();
        gotoxy(6, 12, 2, "�� ������������ ����������������.");
    } else {
        gotoxy(10, 12, 2, "�� ������������ ����������������.");
    }
}

// ������ ����� ����� � ������������ ���� 2x4
if ($tx*2==2 && $ty*2==4 && $floor == 2) {  
    if (isset($_GET['r'])) {
        gotoxy(16, 4, 2, "�� ������������ ����������������.");
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand <= 50) {
                $report = '�����, ��������� ��� ���.'; 
            } else {
                if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'")) {
                    $report=pickupitem(2461, 0, 0, 0, 3);
                    useitem(2459);
                } else {
                    $report="��� ����, ����� ������� �������, ��� ���������� ������ �������.";
                }
            }
        } else {
            $report="�����.";
        }
    }
}

// ������������ ���� 2x16
if ($tx*2==2 && $ty*2==16 && $floor == 2) {  
    gotoxy(6, 8, 2, "�� ������������ ����������������.");
}

// ������������ ���� 4x12
if ($tx*2==4 && $ty*2==12 && $floor == 2) {  
    gotoxy(16, 12, 2, "�� ������������ ����������������.");
}

// ���������� 2x12
if ($tx*2==2 && $ty*2==12 && $floor == 2) { 
    $report="<div style=\"font-weight:normal\">���� �� ��������</div>";
}

// ����� �� 3-�� 16x2
if ($tx*2==16 && $ty*2==2 && $floor == 2) {  
    gotoxy(16, 22, 3, "�� ������������ ������ �� 3-�� ����");
}

////////////////////////////// 3-�� ���� ///////////////////////////////////////////

// ������ ������� �������� 2x10
if ($tx*2==2 && $ty*2==10 && $floor == 3) {  
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = '�����.'; 
        } elseif ($rand <= 75) {
            $report=itemtofloor(mt_rand(2554, 2559), 0, 0, 1);
        } else {
            $rItems = array(100502, 101772, 101629, 100594, 100593, 101585, 101618);
            $rnd = mt_rand(0, (count($rItems) - 1));
            $report=itemtofloor($rItems[$rnd], 0, 0, 1, 'berezka');
        }
    } else {
        $report="�����.";
    }
}

// ������ 10x2
if ($tx*2==10 && $ty*2==2 && $floor == 3) {  
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = '�����.'; 
        } elseif ($rand <= 75) {
            $report=itemtofloor(mt_rand(2554, 2559), 0, 0, 1);
        } else {
            $rItems = array(100502, 101772, 101629, 100594, 100593, 101585, 101618);
            $rnd = mt_rand(0, (count($rItems) - 1));
            $report=itemtofloor($rItems[$rnd], 0, 0, 1, 'berezka');
        }
    } else {
        $report="�����.";
    }
}

// ����� �� 4-�� 18x8
if ($tx*2==18 && $ty*2==8 && $floor == 3) {  
    gotoxy(2, 6, 4, "�� ������������ ������ �� 4-�� ����");
}

////////////////////////////// 4-�� ���� ///////////////////////////////////////////

// ���������� 2x2
if ($tx*2==2 && $ty*2==2 && $floor == 4) {  
    $report="<div style=\"font-weight:normal\">���� �� ��������</div>";
}

// ������
if ((($tx*2==8 && $ty*2==2) || ($tx*2==8 && $ty*2==4) || ($tx*2==8 && $ty*2==6)) && $floor == 4) {  
    $report="<div style=\"font-weight:normal\">���� �� ��������</div>";
}

// ����� �� 3-�� 2x6
if ($tx*2==2 && $ty*2==6 && $floor == 4) {  
    gotoxy(16, 22, 3, "�� ������������ ������ �� 3-�� ����");
}
 
?>
