<?php

if ($user["sex"]==1) {
    $a="";
    $one="одним";
    $la="ёл";
    $en="ен";
    $that="тот";
    $need="нужен";
} else {
    $a="а";
    $one="одной";
    $la="ла";
    $en="на";
    $that="та";
    $need="нужна";
}


if ($step == 1) {
    $speach.="Перед вами с виду обычная наковальня, потертая, местами проржавевшая, со сколами и трещинами.<br /><br />Однако рядом с ней лежит небольшая горка подношений и что-то напоминающую мемориальную табличку. <br /><br />Если попытаться найти знакомые буквы, подключить догадливость и сообразительность, то можно узнать, что это «Наковальня Предков» и на ней «Будет молотом скован Молот».";
    $answers=array(
        "2"=>"Попытаться украсть что-нибудь из подношений.", // ok
        "3"=>"Молот? У меня тут как раз есть части молота!", // ok
        "4"=>"Простите, я, кажется, адресом ошибся... (завершить разговор)" // ok
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
        $speach.="Наклонившись над горкой подаяний, вы внезапно осознали, что прямо на вас смотрит сердитого вида охранник. И что он – не один.";
        $answers=array(
            "4"=>"Вступить в бой. Ничего не остается.", // ok
        );
    } elseif ($rnd <= 80) {
        takehp($user["id"], ($user['hp'] - 1));
        $speach.="Внезапно вашу руку пронзила острая боль, от небольшой ловушки хитро замаскированной в куче для пожертвований. ";
        $answers=array(
            "4"=>"Обидно-то как. (завершить разговор)", // ok
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
        $speach .= "Оглядевшись по сторонам, вы наклоняетесь и хватаете первое, что попало под руку. Кажется, все прошло успешно. ";
        $answers=array(
            "4"=>"Рассмотреть добычу.", // ok
        );
    }
}

if ($step == 3) {
    $speach.="Вспомнив все то, что вы знаете о кузнечном деле, вы осторожно начинаете соединять все части молота в одно целое. Кое-где приходится осторожно ковать, кое-где старательно шлифовать разношенные части. Но в целом у вас получается неплохо.";
    $answers=array(
        "5"=>"Продолжить", // ok
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
        // удаление частей
        foreach ($isParts as $v) {
            $speach .= 'Вы отдали "' . $v['name'] . '"<br />';
            if ($v['koll'] > 1) {
                mysql_query("UPDATE inventory SET koll = (koll - 1) WHERE id = $v[id] AND owner = $user[id]");
            } else {
                mysql_query("DELETE FROM inventory WHERE id = $v[id] AND owner = $user[id]");
            }
        }
        // получение молота
        takeshopitem(2580, "shop", 1, 0, 0, 0, $user['id'], 0, '', 1);
        $speach .= 'Вы получили "Молот Глубин"';
        $speach .= "</span>";  
        $speach .= "<br /><br />И как результат Молот Глубин – готов. Да, не слишком впечатляющ, но… ";
        $answers=array(
            "4"=>"Ну, что получилось, то получилось. (завершить разговор)", // ok
        );
    } else {
        $speach .= "<span style=\"color: red\">Ничего не получилось. У Вас нет всех необходимых частей молота.</span>";
        $answers=array(
            "4"=>"Ну, не получилось, так не получилось. (завершить разговор)", // ok
        );
    }
}

if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
