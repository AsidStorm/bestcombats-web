<?php

  // �������� 12x6
  if ($tx*2==12 && $ty*2==6) {
    //$report="<div style=\"font-weight:normal\">����������� �������� ��������� �����������, �� ���������� �� ������ ����.</div>";
    gotoxy(2, 2, 2, "����������� �������� ��������� �����������, �� ���������� �� ������ ����.");
  }
  
  // ������ 14x36
  if ($tx*2==14 && $ty*2==36) {
    $mhp=1000;
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">�� ������ � ������� � �������� <b>-1000 HP</b>.</div>";
  }
  
  // ������ ������
  if ($tx*2==16 && $ty*2==10) {
    $mhp=300+mt_rand(0, 700);
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">�� ������ � ������� � �������� <b>-$mhp HP</b>.</div>";
  }
  
  // �������� 10x30
  if ($tx*2==10 && $ty*2==30) {
    $mhp=round($user["maxhp"]*0.5);
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">����������� �������� �� �������� �� ������ � �������. -$mhp HP.</div>";
  }
  
  // ��������, ��������� � �������
  if ($tx*2==8 && $ty*2==38) {
    //$report="<div style=\"font-weight:normal\">�� ����������� � �������</div>";
    gotoxy(26, 26, 1, "�� ����������� � �������");
  }
  
  // ������� 36x30
  if ($tx*2==36 && $ty*2==30) {
    //$report="<div style=\"font-weight:normal\">�� ����������� �� ������ ����</div>";
    gotoxy(26, 20, 2, "�� ����������� �� ������ ����");
  }

  // ������� 16x46
  if ($tx*2==16 && $ty*2==46) {
    //$report="<div style=\"font-weight:normal\">�� ����������� � ������</div>";
    gotoxy(26, 42, 1, "�� ����������� � ������");
  }
  
  // ������ 6x30
  if ($tx*2==6 && $ty*2==30) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '������ ������� �������������' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = '������ ������� �������������' AND owner = " . $user['id']);
      gotoxy(2, 40, 3, "�� ������ ���������������� �� 3-��� ����, ��� ������ ��� ����� ������� �������������");
    } else {
      $report = '<div style="font-weight:normal">� ��� ��� <b>������ ������� �������������</b>. ���� ��� ���� ���, ����� ������� ����� �� 3-��� ����.</div>';
    }
  }
  
  // ������ 8x32
  if ($tx*2==8 && $ty*2==32) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '������ ������� ��������' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = '������ ������� ��������' AND owner = " . $user['id']);
      gotoxy(2, 2, 3, "�� ������ ���������������� �� 3-��� ����, ��� ������ ��� ����� ������� ��������");
    } else {
      $report = '<div style="font-weight:normal">� ��� ��� <b>������ ������� ��������</b>. ���� ��� ���� ���, ����� ������� ����� �� 3-��� ����.</div>';
    }
  }
  
  // ������ 4x32
  if ($tx*2==4 && $ty*2==32) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = '������ ������� ����' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = '������ ������� ����' AND owner = " . $user['id']);
      gotoxy(22, 16, 4, "�� ������ ���������������� �� 4-��� ����, ��� ������ ��� ����� ������� ����");
    } else {
      $report = '<div style="font-weight:normal">� ��� ��� <b>������ ������� ����</b>. ���� ��� ���� ���, ����� ������� ����� �� 3-��� ����.</div>';
    }
  }

?>
