<?php

if ($user["sex"]==1) {
    $a="";
    $one="�����";
    $la="��";
    $en="��";
    $that="���";
    $need="�����";
} else {
    $a="�";
    $one="�����";
    $la="��";
    $en="��";
    $that="��";
    $need="�����";
}


if ($step == 1) {
    $speach.="������� ������ ����� ���������, � �� ����� ������ ��� ����! ��� �����, ������ �� �� �����??";
    $answers=array(
        "2"=>"$user[login], ������ ��� ������� ������� ������ �� ������������� ������!", // ok
        "3"=>"$user[login], ������ ���������� � ����������� ������ �� ����� ��������!", // ok
        "4"=>"��������, �, �������, ������� ������.. (��������� ��������)" // ok
    );
}

if ($step == 2) {
    $isNotice = mysql_result(mysql_query("SELECT id FROM inventory WHERE owner = $user[id] AND prototype = 2560 LIMIT 1"), 0, 0);
    $isTrend  = mysql_result(mysql_query("SELECT name FROM inventory WHERE owner = $user[id] AND (prototype = 2561 OR prototype = 2562 OR prototype = 2563) LIMIT 1"), 0, 0);
    $isToken  = mysql_result(mysql_query("SELECT name FROM inventory WHERE owner = $user[id] AND (prototype = 2564 OR prototype = 2565 OR prototype = 2563) LIMIT 1"), 0, 0);
    if (!$isNotice && !$isTrend) {
        $speach.="��� ��������� ����������� ���� ����� �������� � ��������";
    } elseif ($isNotice && !$isTrend && !$isToken) {
        if ($user['level'] <= 7) {
            $tid   = 2561;
            $tname = '����������� � ���� ������ �������� I';
        } elseif ($user['level'] <= 9) {
            $tid   = 2562;
            $tname = '����������� � ���� ������ �������� II';
        } else {
            $tid   = 2563;
            $tname = '����������� � ���� ������ �������� III';
        }
        mysql_query("DELETE FROM inventory WHERE owner = $user[id] AND id = $isNotice");
        takeshopitem($tid, "shop", "", "", 2, 0, $user['id']);
        $speach.="<span style=\"color: red\">�� ������ \"��������\"<br />�� �������� \"$tname\"</span>"; 
    } elseif ($isToken) {
        $speach .= "��� ������� ������� � �������, �������� ��������� ����������� ������. ������ ���������� �������� � ���������.";
    } else {
        $speach .= "� ��� ��� ���� \"$isTrend\"";
    }
    $answers=array(
        "4"=>"� ����� �������... (��������� ��������)" // ok
    );
}

if ($step == 3) {
    $speach.="
        <span style=\"color: red;\">� ��� ������������ ������� ��� ��������� �������</span><br /><br />
        <b>����� ����</b> - 10x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> � (��� ����������� �� ����������)<br />
        <b>����������� ������</b> - 20x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> 3x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /><br />
        <b>����������� ����</b> - 30x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> � 5x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /> (���� ������� ������� ��������� ������ ����� ����)<br />
        <b>����� ����������� ����</b> - 45x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> � 10x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /> (��� ���������, ������� ��������� 10+)";
    $answers=array(
        "4"=>"������ (��������� ��������)" // ok
    );
}

if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
