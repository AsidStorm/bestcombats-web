<?php
  
/*************************************** ������ *********************************************/
  
  // ������ 14x14
  if ($tx*2==14 && $ty*2==14) {  
    if (usagesleft($tx, $ty)) {
      takeusage($tx, $ty);
      $rnd=mt_rand(1,100);
      if ($rnd<=80) {
        setCaveEffect(9992, 9993);
      } else {
       /** 
         * 2334 ������ ���������, 967 ������ ������� ������, 2330 ����� ������ ����������
         * 2328	�������� ��������, 2397	�������� ���������, 1423 �������� ������ 
        **/
        $items = array(2334, 967, 2330, 2328, 2397, 1423);
        $i = mt_rand(0, 5);
        $report=itemtofloor($items[$i], 0, 0, 1);
      }
    } else {
      $report="<div style=\"font-weight:normal\">�����.</div>";
    }
  }
  
  // ������ 20x2
  if ($tx*2==20 && $ty*2==2) {  
    $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '������������� ����' AND owner = " . $user['id']), 0, 0);
    if (!$isKey) {
        $item1 = mysql_result(mysql_query("SELECT id FROM inventory WHERE name = '������� �������������� �����' AND owner = " . $user['id'] . " LIMIT 1"), 0, 0);
        $item2 = mysql_result(mysql_query("SELECT id FROM inventory WHERE name = '������� �������������� �����' AND owner = " . $user['id'] . " LIMIT 1"), 0, 0);
        if ($item1 && $item2) {
            $report = pickupitem(2532, 0, 0, 0, 1, 2);
            mysql_query("DELETE FROM inventory WHERE owner = $user[id] AND (name = '������� �������������� �����' OR name = '������� �������������� �����')");
        } else {
            $report = '����� ����� ������� <b>������������� ����</b>.<br /> ��� ������ ����� ���������� ����� ������� � ������� �������������� �����';
        }
    } else {
      $report="<div style=\"font-weight:normal\">� ��� ��� ���� <b>������������� ����</b></div>";
    }
  }
  
  
/*************************************** ������ *********************************************/

  // ������ 16x2
  if ($tx*2==16 && $ty*2==2) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 16) OR 
                (x = 4 AND y = 20) OR 
                (x = 6 AND y = 16) OR 
                (x = 6 AND y = 18) OR 
                (x = 6 AND y = 10) OR
                (x = 8 AND y = 16) OR 
                (x = 8 AND y = 20) OR 
                (x = 10 AND y = 18)
            ) 
            AND floor='4'
    ");
    if ($aBots) {
        $report = '��� �� ��� ������, c������ ���� ��������� <b>��������</b>';
    } else {
        $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '��������� ���� Nr.4' AND owner = " . $user['id']), 0, 0);
        if (!$isKey) {
            $report=pickupitem(2533, 1, 0, 0, 3);
        } else {
            $report = '� ��� ��� ���� <b>��������� ���� Nr.4</b>';    
        }
    }
  }
  
    // ������ 8x6
    if ($tx*2==8 && $ty*2==6) { 
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $charms0 = array(2534, 2538, 2542, 2546, 2550);
            $rnd = mt_rand(0, count($charms0) - 1);
            $report=itemtofloor($charms0[$rnd], 0, 0, 1);
        } else {
            $report="<div style=\"font-weight:normal\">�����.</div>";
        }
    }
  
    // ������ 4x6
    if ($tx*2==4 && $ty*2==6) {  
        $report="<div style=\"font-weight:normal\">���� �� ��������</div>";
    }

/*************************************** ������ *********************************************/

    // ����� 10x2
    if ($tx*2==10 && $ty*2==2) {
        $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '��������� ���� Nr.4' AND owner = " . $user['id']), 0, 0);
        if (!$isKey) {
            $report = '<div style="font-weight:normal">��� ������� ��������� <b>��������� ���� Nr.4</b></div>';
        } else {
            $usX = mqfa1("SELECT x FROM caveparties WHERE user='$user[id]'");
            if ($usX == 6) {
                gotoxy(8, 2, 4, '�� ������� ������ ����� �����');
            } else {
                gotoxy(12, 2, 4, '�� ������� ������ ����� �����');
            }
        }
    }
  
    // ����������� 4x18
    if ($tx*2==4 && $ty*2==18) {
        $aBots=mqfaa("
            SELECT bot, cnt, battle 
            FROM cavebots 
            WHERE 
                leader='$user[caveleader]'
                AND (
                    (x = 4 AND y = 16) OR 
                    (x = 4 AND y = 20) OR 
                    (x = 6 AND y = 16) OR 
                    (x = 6 AND y = 18) OR 
                    (x = 6 AND y = 10) OR
                    (x = 8 AND y = 16) OR 
                    (x = 8 AND y = 20) OR 
                    (x = 10 AND y = 18)
                ) 
                AND floor='4'
        ");
        if ($aBots) {
            $report = '��� �� ��� ������, c������ ���� ��������� <b>��������</b>';
        } else {
            //$report = pickupitem(2532, 0, 0, 0, 1, 2);
            $charms = array(
                '2535' => array( '���������� ������ [0]'    => 3, '������������� ����'=>1 ), // ���������� ������    [1]
                '2539' => array( '���������� ����� [0]'     => 3, '������������� ����'=>1 ), // ���������� �����     [1]
                '2543' => array( '���������� ��������� [0]' => 3, '������������� ����'=>1 ), // ���������� ��������� [1]
                '2547' => array( '���������� ���� [0]'      => 3, '������������� ����'=>1 ), // ���������� ����      [1]
                '2551' => array( '���������� �������� [0]'  => 3, '������������� ����'=>1 ), // ���������� ��������  [1]
                '2536' => array( '���������� ������ [1]'    => 3, '������������� ����'=>1 ), // ���������� ������    [2]
                '2540' => array( '���������� ����� [1]'     => 3, '������������� ����'=>1 ), // ���������� �����     [2]
                '2544' => array( '���������� ��������� [1]' => 3, '������������� ����'=>1 ), // ���������� ��������� [2]
                '2548' => array( '���������� ���� [1]'      => 3, '������������� ����'=>1 ), // ���������� ����      [2]
                '2552' => array( '���������� �������� [1]'  => 3, '������������� ����'=>1 ), // ���������� ��������  [2]
                '2537' => array( '���������� ������ [2]'    => 3, '������������� ����'=>1 ), // ���������� ������    [3]
                '2541' => array( '���������� ����� [2]'     => 3, '������������� ����'=>1 ), // ���������� �����     [3]
                '2545' => array( '���������� ��������� [2]' => 3, '������������� ����'=>1 ), // ���������� ��������� [3]
                '2549' => array( '���������� ���� [2]'      => 3, '������������� ����'=>1 ), // ���������� ����      [3]
                '2553' => array( '���������� �������� [2]'  => 3, '������������� ����'=>1 ), // ���������� ��������  [3]
            );
            foreach($charms as $chID => $needs) {
                $isInInv = true;    // ������� ���� ����������� ����� � ���������
                $nItems    = array(); // ������ ��� ID �����. �����
                foreach ($needs as $need => $count) {
                    // �������� ������� ��������� � �� ���-��
                    $checkCount = mqfaa("SELECT id, name FROM inventory WHERE name = '$need' AND owner = $user[id]");
                    if (count($checkCount) >= $count) { // ���� ����
                        // ���������� ID ������������ ���-�� �����
                        for ($i = 0; $i < $count; $i++) {
                            $nItems[] = $checkCount[$i];
                        }
                    } else { // ���� ���
                        $isInInv = false;
                    }
                }
                if ($isInInv) {
                    $report = pickupitem($chID, 0, 0, 0, $podzem=1) . ' ��';
                    foreach ($nItems as $in => $nItem) {
                        mysql_query("DELETE FROM inventory WHERE name = '$nItem[name]' AND id = $nItem[id] AND owner = $user[id]");
                        $report .= (($in > 0) ? ', ' : ' ') . $nItem['name'];
                    }
                    break;
                }
            }
            if (!$isInInv) {
                $report = '������ �� ���������';
            }
        }
    }
  
  // ������ 6x2
  if ($tx*2==6 && $ty*2==2) {
    $report="<div style=\"font-weight:normal\">�������.</div>";
  }
  
  // ���� 6x8
  if ($tx*2==6 && $ty*2==8) {
    $report="<div style=\"font-weight:normal\">�� �����...</div>";
  }

    // ���������� 2x2
    if ($tx*2==2 && $ty*2==2) {
        $report="<div style=\"font-weight:normal\">�������� ���� ��� ������� 1-�� �����</div>";
    }

?>
