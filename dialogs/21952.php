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
    $speach.="����� ���� � ���� ������� ����������, ��������, ������� ������������, �� ������� � ���������.<br /><br />������ ����� � ��� ����� ��������� ����� ���������� � ���-�� ������������ ������������ ��������. <br /><br />���� ���������� ����� �������� �����, ���������� ������������ � �����������������, �� ����� ������, ��� ��� ����������� ������� � �� ��� ������ ������� ������ �����.";
    $answers=array(
        "2"=>"���������� ������� ���-������ �� ����������.", // ok
        "3"=>"�����? � ���� ��� ��� ��� ���� ����� ������!", // ok
        "4"=>"��������, �, �������, ������� ������... (��������� ��������)" // ok
    );
    $isHammer = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE prototype = 2580 AND owner = $user[id]"), 0, 0);
    if ($isHammer) {
        unset($answers[3]);
    }
}

if ($step == 2) {
    $rnd = mt_rand(1,100);
    if ($rnd <= 40) {
        mysql_query("INSERT INTO cavebots SET leader = $user[caveleader], x = 2, y = 6, bot = 85, battle = 0, cnt = 2, floor = 1, type = 2, startx = 2, starty = 6");
        mysql_query("INSERT INTO cavebots SET leader = $user[caveleader], x = 2, y = 6, bot = 82, battle = 0, cnt = 1, floor = 1, type = 2, startx = 2, starty = 6");
        $speach.="������������ ��� ������ ��������, �� �������� ��������, ��� ����� �� ��� ������� ��������� ���� ��������. � ��� �� � �� ����.";
        $answers=array(
            "4"=>"�������� � ���. ������ �� ��������.", // ok
        );
    } elseif ($rnd <= 80) {
        takehp($user["id"], ($user['hp'] - 1));
        $speach.="�������� ���� ���� �������� ������ ����, �� ��������� ������� ����� ��������������� � ���� ��� �������������. ";
        $answers=array(
            "4"=>"������-�� ���. (��������� ��������)", // ok
        );
    } else {
        $crd = mqfa("SELECT x, y FROM caveparties WHERE user='$user[id]'");
        $rnd2 = mt_rand(1,100);
        if ($rnd2 <= 50) {
            $itemID = mt_rand(2573, 2576);
            $podzem = 1;
        } elseif ($rnd2 <= 75) {
            $itemID = mt_rand(2595, 2634);
            $podzem = 3;
        } else {
            $itemID = 2360;
            $podzem = 1;
        }
        $rec = mqfa("select name, img from shop where id='" . $itemID . "'");
        mysql_query("insert into caveitems set leader='$user[caveleader]', name='$rec[name]', img='$rec[img]', small='0', x='" . ($crd['x'] * 2) . "', y='" . ($crd['y'] * 2) . "', floor='1', item='$itemID', foronetrip='0', incave='0', podzem='$podzem'") or die(mysql_error());
        $speach .= "����������� �� ��������, �� ������������ � �������� ������, ��� ������ ��� ����. �������, ��� ������ �������. ";
        $answers=array(
            "4"=>"����������� ������.", // ok
        );
    }
}

if ($step == 3) {
    $speach.="�������� ��� ��, ��� �� ������ � ��������� ����, �� ��������� ��������� ��������� ��� ����� ������ � ���� �����. ���-��� ���������� ��������� ������, ���-��� ����������� ��������� ����������� �����. �� � ����� � ��� ���������� �������.";
    $answers=array(
        "5"=>"����������", // ok
    );
}

if ($step == 5) {
    $parts = array();
    $parts[] = '2577';
    $parts[] = '2578';
    $parts[] = '2579';
    $isParts = array();
    foreach ($parts as $part) {
        $isPart = mysql_fetch_assoc(mysql_query("SELECT id, name, koll FROM inventory WHERE owner = $user[id] AND prototype = $part AND koll > 0 LIMIT 1"));
        if (!$isPart) {
            break;
        } else {
            $isParts[] = $isPart;
        }
    }
    if (count($isParts) == 3) {
        $speach .= "<span style=\"color: red\">";
        // �������� ������
        foreach ($isParts as $v) {
            $speach .= '�� ������ "' . $v['name'] . '"<br />';
            if ($v['koll'] > 1) {
                mysql_query("UPDATE inventory SET koll = (koll - 1) WHERE id = $v[id] AND owner = $user[id]");
            } else {
                mysql_query("DELETE FROM inventory WHERE id = $v[id] AND owner = $user[id]");
            }
        }
        // ��������� ������
        takeshopitem(2580, "shop", 1, 0, 0, 0, $user['id'], 0, '', 1);
        $speach .= '�� �������� "����� ������"';
        $speach .= "</span>";  
        $speach .= "<br /><br />� ��� ��������� ����� ������ � �����. ��, �� ������� ����������, �� ";
        $answers=array(
            "4"=>"��, ��� ����������, �� ����������. (��������� ��������)", // ok
        );
    } else {
        $speach .= "<span style=\"color: red\">������ �� ����������. � ��� ��� ���� ����������� ������ ������.</span>";
        $answers=array(
            "4"=>"��, �� ����������, ��� �� ����������. (��������� ��������)", // ok
        );
    }
}

if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
