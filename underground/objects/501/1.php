<?php
if ($tx*2==2 && $ty*2==10) {
    if (usagesleft($tx, $ty)) {
      if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'")) {
        // 2364	�������� ������, 2363 �������� ������������
        $report=pickupitem(mt_rand(2363, 2364), 1, 0, 0, 3);
        takeusage($tx, $ty);
        useitem(2459);
        if (!@$report) {
          $report="<div style=\"font-weight:normal\">�� ������� �� ������� �������.</div>";
        }
      } else {
        $report="��� ����, ����� ������� �������, ��� ���������� ������ �������.";
      }
    } else {
      $report="�����.";
    }
  }
//���� ����� 1
  if ($tx*2==20 && $ty*2==8) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 20 AND y = 6) OR 
                (x = 18 AND y = 6) OR 
                (x = 6 AND y = 16) OR 
                (x = 6 AND y = 18) OR 
                (x = 6 AND y = 10) OR
                (x = 8 AND y = 16) OR 
                (x = 8 AND y = 20) OR 
                (x = 10 AND y = 18)
            ) 
            AND floor='1'
    ");
    if ($aBots) {
        $report = '������� ���� ��������� <b>������</b>';
    } else {
        $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '��������� ���� �1' AND owner = " . $user['id']), 0, 0);
        if (!$isKey) {
            $report=pickupitem(2533, 1, 0, 0, 3);
        } else {
            $report = '� ��� ��� ���� <b>��������� ���� �1</b>';    
        }
    }
  }
?>