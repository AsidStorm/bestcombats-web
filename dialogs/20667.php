<?php 


if ($user['room'] == 74) {
    $fl = mysql_result(mysql_query("SELECT floor FROM caveparties WHERE user = " . $user['id']), 0, 0);
    if ($fl == 2) {
        $_level = 9;
    } else {
        $_level = 7;
    }
} elseif ($user['room'] == 403) {
    $_level = 4;
} else {
    header("location: city.php");
    die;
}


$magus = array(
    '4' => array(
        // ������ ��������
        '2513' => array('������� ���������' => 10),
        // �������� ��������
        '2515' => array('������� ���������' => 11),
        // ���� ��������
        '2518' => array('������� ���������' => 9),
        // ���������� ����������
        '2509' => array('������� ���������' => 1)
    ),
    '7' => array(
        // ������ ��������
        '1837' => array('������� ���������' => 21, '���������� ���������' => 11), 
        // �������� ��������
        '1813' => array('������� ���������' => 21, '���������� ���������' => 11), 
        // ���� ��������
        '1815' => array('������� ���������' => 20, '���������� ���������' => 10), 
        // ���������� ����������
        '2510' => array('������� ���������' => 2, '���������� ���������' => 1)
    ),
    '9' => array(
        // ������ ��������
        '1836' => array('������� ���������' => 34, '���������� ���������' => 17, '�������� ���������' => 12),
        // �������� ��������
        '1806' => array('������� ���������' => 35, '���������� ���������' => 18, '�������� ���������' => 12),
        // ���� ��������
        '1808' => array('������� ���������' => 36, '���������� ���������' => 18, '�������� ���������' => 12),
        // ������� ����������
        '2511' => array('�������� ���������' => 1)
    ),
);

$warrior = array(
    '4' => array(
        // ������ ��������
        '2514' => array('������� ���������' => 10),
        // �������� ��������
        '2516' => array('������� ���������' => 10),
        // ���� ��������
        '2517' => array('������� ���������' => 9),
        // ���������� ����������
        '2509' => array('������� ���������' => 1)
    ),
    '7' => array(
        // ������ ��������
        '2519' => array('������� ���������' => 21, '���������� ���������' => 11), 
        // �������� ��������
        '2520' => array('������� ���������' => 21, '���������� ���������' => 11), 
        // ���� ��������
        '2521' => array('������� ���������' => 21, '���������� ���������' => 11), 
        // ���������� ����������
        '2510' => array('���������� ���������' => 1)
    ),
    '9' => array(
        // ������ ��������
        '2522' => array('������� ���������' => 33, '���������� ���������' => 17, '�������� ���������' => 11),
        // �������� ��������
        '2523' => array('������� ���������' => 34, '���������� ���������' => 17, '�������� ���������' => 12),
        // ���� ��������
        '2524' => array('������� ���������' => 35, '���������� ���������' => 18, '�������� ���������' => 12),
        // ������� ����������
        '2511' => array('�������� ���������' => 1)
    ),
);
  
if (isset($_POST['buy'])) {
    $tUser = mqfa("SELECT id, login FROM users WHERE login = '" . mysql_real_escape_string(trim($_POST['login'])) . "'");
    if (!$tUser) {
        $_msg = '����� �������� �� ����������';
    } elseif ($user['login'] == $tUser['login']) {
        $_msg = '�� �� ������ ������ ������� ����';
    } else {
        $check = 1;
        if ($_GET['step'] == 4) { // ��� �����
            $arr = $magus[$_level][$_POST['item']];
        } elseif ($_GET['step'] == 5) { // ��� ������
            $arr = $warrior[$_level][$_POST['item']];
        } else {
            $_msg = '�� ������ ���';
        }
        foreach ($arr as $k=>$v) {
            takeshopitem($_POST['item'], "shop", $user['login'], 0, 0, 0, $tUser['id'], 1, "������� �� ���� ��������� �� " . $user['login']);
            mysql_query("UPDATE inventory SET koll = (koll - $v) WHERE owner = $user[id] AND dressed = 0 AND name = '$k'");
            mysql_query("DELETE FROM inventory WHERE owner = $user[id] AND dressed = 0 AND name = '$k' AND koll = 0");
            $_msg = '�� ������ ������� ������� ��������� ' . $tUser['login'];
        }
    }
    if ($_msg) {
        header('Location: ' . $_SERVER['REQUEST_URI'] . '&msg=' . $_msg);
        exit;
    }
}

function printItems($array) {
    global $user;
    $string = '
        <style type="text/css">
            #table {
                width: 100%;
                border-collapse:collapse;
                margin-bottom: 1em;
            }
            #table, #table td, #table th {
                border:1px solid #7F7F7F;
            }
            #table td, table th {
                padding: 0.3em;
            }
        </style>
    ';
    foreach ($array as $k=>$v) {
        $price = '';
        $check = 1;
        foreach ($v as $kk=>$vv) {
            $price .= $kk . ' (' . $vv . ')<br />';
            if ($check) {
                $check = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND dressed = 0 AND name = '$kk' AND koll >= $vv"), 0, 0);
            }
        }
        if ($check) {
            $check = '
                <tr style="background: #D2D2D2; text-align: center;">
                    <td colspan="2">
                        <form action="" method="POST">
                            ������ � ������� ���:&nbsp;
                            <input type="hidden" name="item" value="' . $k . '" />
                            <input type="text" name="login" value="����� ���������" />
                            <input type="submit" name="buy" value="������" />
                        </form>
                    </td>
                </tr>
            ';
        } else {
            $check = '
                <tr style="background: #D2D2D2; text-align: center;">
                    <td colspan="2">� ��� ������������ ������� ��� �������</td>
                </tr>
            ';
        }
        $string .= '
            <table id="table">
                <tr style="background: #BFBFBF">
                    <td style="width: 80px;text-align:center;"><b>����:</b><br /></td>
                    <td>' . $price . '</td>
                </tr>
                ' . $check . '
                <tr>
                    <td style="width: 80px;text-align:center;"><img src="/i/sh/' . mysql_result(mysql_query("SELECT img FROM shop WHERE id = $k"), 0, 0) . '"></td>
                    <td>' . itemdata(mysql_fetch_assoc(mysql_query("SELECT * FROM shop WHERE id = $k"))) . '</td>
                </tr>
            </table>
        ';
    }
    return $string;
}

if ($step==1) {
    $speach .= "������ ������������ ���� ������. ������ ��������� ����� � ������� ������� �������� ������ ��� ������ �������, ����� ��������. ������ ����� �����, �� �������� �� �� �� �� ����� ����?";
    $answers = array(
        "2"=>"� ������ ���� ����� � ���� ������� �������. ",
        "3"=>"� �� ����� �����, �� � �������� � ����� �� ����. (��������� ��������)"
    );
}

if ($step==2) {
    $speach .= "������ ������������ ���� ������. ������ ��������� ����� � ������� ������� �������� ������ ��� ������ �������, ����� ��������. ������ ����� �����, �� �������� �� �� �� �� ����� ����?";
    $answers=array(
        "4"=>"� ���� ���������� ������� ��� �����.", // ok
        "5"=>"� ����� �� ���������� ������� ��� ������.", // ok
        "3"=>"� ��������� ������ �������. (��������� ��������)" // ok
    );
}

if ($step==4) {
    $speach .= (@$_GET['msg']?'<p style="color: red;"><b>'.$_GET['msg'].'</b></p>':'') . "<p>������� ��� �����:</p>" . printItems($magus[$_level]);
    $answers=array(
        "5"=>"� ����� �� ���������� ������� ��� ������.", // ok
        "3"=>"� ��������� ������ �������. (��������� ��������)" // ok
    );
}

if ($step==5) {
    $speach .= (@$_GET['msg']?'<p style="color: red;"><b>'.$_GET['msg'].'</b></p>':'') . "<p>������� ��� ������:</p>" . printItems($warrior[$_level]);
    $answers=array(
        "4"=>"� ���� ���������� ������� ��� �����.", // ok
        "3"=>"� ��������� ������ �������. (��������� ��������)" // ok
    );
}

if ($step == 3) {
    header("location: city.php");
    die;
}
  
?>
