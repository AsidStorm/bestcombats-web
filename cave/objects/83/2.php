<?php

// ����� �� 3-�� ����
if ($tx*2==12 && $ty*2==2) {
    gotoxy(10, 20, 3, "�� ������������ ������ �� 3-�� ����.");
}
  
// ������
if (($tx*2==22 && $ty*2==4) || ($tx*2==22 && $ty*2==12) || ($tx*2==22 && $ty*2==16) || ($tx*2==0 && $ty*2==2) || ($tx*2==0 && $ty*2==6) || ($tx*2==0 && $ty*2==10) || ($tx*2==0 && $ty*2==14) || ($tx*2==0 && $ty*2==18)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = usagesleft($tx, $ty) ? '�����, ��������� ��� ���.' : '�����'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "�� ������ � ������� -$mhp HP.";
            takehp($user["id"], $mhp);
        } elseif ($rand <= 90) {
            $report = itemtofloor(mt_rand(2577, 2579), 0, 0, 1); // �����
        } else {
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // ���������
        }
    } else {
       $report="�����";
    }
}

// �������
if (($tx*2==6 && $ty*2==18) || ($tx*2==10 && $ty*2==8)) {
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

// ������
if (($tx*2==12 && $ty*2==8) || ($tx*2==6 && $ty*2==2)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 80) {
            $report = '�����';
        } else {
            $report = itemtofloor(2360, 0, 0, 1); // ������� ������
        }
    } else {
        $report="�����";
    }
}

// �����
if ($tx*2==12 && $ty*2==12) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = usagesleft($tx, $ty) ? '�����, ��������� ��� ���.' : '�����'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "�� ������ � ������� -$mhp HP.";
            takehp($user["id"], $mhp);
        } else {
            $report = itemtofloor(2587, 0, 0, 1); // ����������� �������
            if (usagesleft($tx, $ty)) {
                takeusage($tx, $ty);
            }
        }
    } else {
        $report = "�����";
    }
}

// ������ 21x8
if ($tx*2==22 && $ty*2==8) {
    gotoxy(24, 8, 2, "�� ������ � �����.");
}

// ������ 24x7
if ($tx*2==24 && $ty*2==6) {
    gotoxy(20, 8, 2, "�� ��������� �� ������.");
}
  
// ������ 26x7
if ($tx*2==26 && $ty*2==6) {
    gotoxy(20, 4, 2, "�� ��������� �� ������.");
}

?>
