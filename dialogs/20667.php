<?php 


if ($user['room'] == 74) {
    $fl = db_result(db_query("SELECT floor FROM caveparties WHERE user = " . $user['id']), 0, 0);
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
        // Кольцо Валентая
        '2513' => array('Блеклый подземник' => 10),
        // Браслеты Валентая
        '2515' => array('Блеклый подземник' => 11),
        // Пояс Валентая
        '2518' => array('Блеклый подземник' => 9),
        // Деревянная Валентинка
        '2509' => array('Блеклый подземник' => 1)
    ),
    '7' => array(
        // Кольцо Валентая
        '1837' => array('Блеклый подземник' => 21, 'Черепичный подземник' => 11), 
        // Браслеты Валентая
        '1813' => array('Блеклый подземник' => 21, 'Черепичный подземник' => 11), 
        // Пояс Валентая
        '1815' => array('Блеклый подземник' => 20, 'Черепичный подземник' => 10), 
        // Серебряная Валентинка
        '2510' => array('Блеклый подземник' => 2, 'Черепичный подземник' => 1)
    ),
    '9' => array(
        // Кольцо Валентая
        '1836' => array('Блеклый подземник' => 34, 'Черепичный подземник' => 17, 'Кровавый подземник' => 12),
        // Браслеты Валентая
        '1806' => array('Блеклый подземник' => 35, 'Черепичный подземник' => 18, 'Кровавый подземник' => 12),
        // Пояс Валентая
        '1808' => array('Блеклый подземник' => 36, 'Черепичный подземник' => 18, 'Кровавый подземник' => 12),
        // Золотая Валентинка
        '2511' => array('Кровавый подземник' => 1)
    ),
);

$warrior = array(
    '4' => array(
        // Кольцо Валентая
        '2514' => array('Блеклый подземник' => 10),
        // Браслеты Валентая
        '2516' => array('Блеклый подземник' => 10),
        // Пояс Валентая
        '2517' => array('Блеклый подземник' => 9),
        // Деревянная Валентинка
        '2509' => array('Блеклый подземник' => 1)
    ),
    '7' => array(
        // Кольцо Валентая
        '2519' => array('Блеклый подземник' => 21, 'Черепичный подземник' => 11), 
        // Браслеты Валентая
        '2520' => array('Блеклый подземник' => 21, 'Черепичный подземник' => 11), 
        // Пояс Валентая
        '2521' => array('Блеклый подземник' => 21, 'Черепичный подземник' => 11), 
        // Серебряная Валентинка
        '2510' => array('Черепичный подземник' => 1)
    ),
    '9' => array(
        // Кольцо Валентая
        '2522' => array('Блеклый подземник' => 33, 'Черепичный подземник' => 17, 'Кровавый подземник' => 11),
        // Браслеты Валентая
        '2523' => array('Блеклый подземник' => 34, 'Черепичный подземник' => 17, 'Кровавый подземник' => 12),
        // Пояс Валентая
        '2524' => array('Блеклый подземник' => 35, 'Черепичный подземник' => 18, 'Кровавый подземник' => 12),
        // Золотая Валентинка
        '2511' => array('Кровавый подземник' => 1)
    ),
);
  
if (isset($_POST['buy'])) {
    $tUser = mqfa("SELECT id, login FROM users WHERE login = '" . db_escape_string(trim($_POST['login'])) . "'");
    if (!$tUser) {
        $_msg = 'Такой персонаж не существует';
    } elseif ($user['login'] == $tUser['login']) {
        $_msg = 'Вы не можете делать подарок себе';
    } else {
        $check = 1;
        if ($_GET['step'] == 4) { // для магов
            $arr = $magus[$_level][$_POST['item']];
        } elseif ($_GET['step'] == 5) { // для войнов
            $arr = $warrior[$_level][$_POST['item']];
        } else {
            $_msg = 'Не шутите так';
        }
        foreach ($arr as $k=>$v) {
            takeshopitem($_POST['item'], "shop", $user['login'], 0, 0, 0, $tUser['id'], 1, "Подарок на день Валентина от " . $user['login']);
            db_query("UPDATE inventory SET koll = (koll - $v) WHERE owner = $user[id] AND dressed = 0 AND name = '$k'");
            db_query("DELETE FROM inventory WHERE owner = $user[id] AND dressed = 0 AND name = '$k' AND koll = 0");
            $_msg = 'Вы удачно сделали подарок персонажу ' . $tUser['login'];
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
                $check = db_result(db_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND dressed = 0 AND name = '$kk' AND koll >= $vv"), 0, 0);
            }
        }
        if ($check) {
            $check = '
                <tr style="background: #D2D2D2; text-align: center;">
                    <td colspan="2">
                        <form action="" method="POST">
                            Купить в подарок для:&nbsp;
                            <input type="hidden" name="item" value="' . $k . '" />
                            <input type="text" name="login" value="логин персонажа" />
                            <input type="submit" name="buy" value="купить" />
                        </form>
                    </td>
                </tr>
            ';
        } else {
            $check = '
                <tr style="background: #D2D2D2; text-align: center;">
                    <td colspan="2">У Вас недостаточно средств для покупки</td>
                </tr>
            ';
        }
        $string .= '
            <table id="table">
                <tr style="background: #BFBFBF">
                    <td style="width: 80px;text-align:center;"><b>Цена:</b><br /></td>
                    <td>' . $price . '</td>
                </tr>
                ' . $check . '
                <tr>
                    <td style="width: 80px;text-align:center;"><img src="/i/sh/' . db_result(db_query("SELECT img FROM shop WHERE id = $k"), 0, 0) . '"></td>
                    <td>' . itemdata(mysqli_fetch_assoc(db_query("SELECT * FROM shop WHERE id = $k"))) . '</td>
                </tr>
            </table>
        ';
    }
    return $string;
}

if ($step==1) {
    $speach .= "ДооМоо приветствует тебя путник. ДооМоо находится здесь с миссией собрать пещерных цветов для своего хозяина, Лорда Валентая. ДооМоо хочет знать, не встречал ли ты их на своем пути?";
    $answers = array(
        "2"=>"Я принес тебе цветы и хочу сделать подарок. ",
        "3"=>"Я не люблю цветы, да и говорить с тобой не хочу. (завершить разговор)"
    );
}

if ($step==2) {
    $speach .= "ДооМоо приветствует тебя путник. ДооМоо находится здесь с миссией собрать пещерных цветов для своего хозяина, Лорда Валентая. ДооМоо хочет знать, не встречал ли ты их на своем пути?";
    $answers=array(
        "4"=>"Я хочу посмотреть подарки для магов.", // ok
        "5"=>"Я хотел бы посмотреть подарки для воинов.", // ok
        "3"=>"Я передумал делать подарки. (завершить разговор)" // ok
    );
}

if ($step==4) {
    $speach .= (@$_GET['msg']?'<p style="color: red;"><b>'.$_GET['msg'].'</b></p>':'') . "<p>Подарки для магов:</p>" . printItems($magus[$_level]);
    $answers=array(
        "5"=>"Я хотел бы посмотреть подарки для воинов.", // ok
        "3"=>"Я передумал делать подарки. (завершить разговор)" // ok
    );
}

if ($step==5) {
    $speach .= (@$_GET['msg']?'<p style="color: red;"><b>'.$_GET['msg'].'</b></p>':'') . "<p>Подарки для войнов:</p>" . printItems($warrior[$_level]);
    $answers=array(
        "4"=>"Я хочу посмотреть подарки для магов.", // ok
        "3"=>"Я передумал делать подарки. (завершить разговор)" // ok
    );
}

if ($step == 3) {
    header("location: city.php");
    die;
}
  
?>
