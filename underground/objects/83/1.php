<?php
 
 // ����� �� 2-�� ����
if ($tx*2==8 && $ty*2==2) {
    //$report="<div style=\"font-weight:normal\">�� ������������ ��������� �� �������.</div>";
    gotoxy(12, 20, 2, "�� ������������ ������ �� 2-�� ����.");
}
  
// ����������, ����� �� 4-�� ����
if ($tx*2==4 && $ty*2==4) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        header('Location: dialog.php?char=21952');
        exit;
    } else {
        $report = "���������� �������� ������ ��� ������ �������.";
    }
    //gotoxy(24, 26, 4, "�� ������������ ������ �� 4-�� ����.");
}
  
// ������
if ($tx*2==4 && $ty*2==12) {
    //$report="<div style=\"font-weight:normal\">�� ������������ ��������� �� �������.</div>";
    gotoxy(2, 6, 1, "�� ������ � ������ �������.");
}

// ������
if ($tx*2==8 && $ty*2==12) {
    $aBots = mysql_result(mysql_query("SELECT COUNT(*) FROM cavebots WHERE leader='$user[caveleader]' AND ((x = 6 AND y = 12) OR (x = 8 AND y = 10) OR (x = 12 AND y = 12)) AND floor='1'"), 0, 0);
    if ($aBots) {
        $report = '������ �������� ���������� �� ���������';
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand <= 80) {
                $report = usagesleft($tx, $ty) ? '�����, ��������� ��� ���.' : '�����';
            } else {
                $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // ��������
            }
        } else {
            $report="�����";
        }
    }
}

// �������
if (($tx*2==6 && $ty*2==10) || ($tx*2==2 && $ty*2==12)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = usagesleft($tx, $ty) ? '�����, ��������� ��� ���.' : '�����'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "�� ������ � ������� -$mhp HP.";
            takehp($user["id"], $mhp);
        } elseif ($rand <= 85) {
            $report = itemtofloor(2581, 0, 0, 1); // ����� ��������� �� �����
        } else {
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // ���������
        }
    } else {
        $report="�����";
    }
}

// �������
if (($tx*2==16 && $ty*2==8) || ($tx*2==16 && $ty*2==16)) {
    if (usagesleft($tx, $ty)) {
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            takeusage($tx, $ty);
            $report = usagesleft($tx, $ty) ? '�����, ��������� ��� ���.' : '�����'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "�� ������ � ������� -$mhp HP.";
            takehp($user["id"], $mhp);
        } elseif ($rand <= 90) {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // ��������
        } elseif ($rand <= 95) {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2577, 2579), 0, 0, 1); // �����
        } else {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // ���������
        }
    } else {
       $report="�����";
    }
}
  
?>
