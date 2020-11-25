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
    $speach.="Легионы Общего Врага наступают, а ты здесь ходишь без дела! Кто такой, почему не на войне??";
    $answers=array(
        "2"=>"$user[login], прибыл для несения срочной службы на безвозмездной основе!", // ok
        "3"=>"$user[login], прибыл отчитаться о проделанной работе на полях сражения!", // ok
        "4"=>"Простите, я, кажется, адресом ошибся.. (завершить разговор)" // ok
    );
}

if ($step == 2) {
    $isNotice = mysql_result(mysql_query("SELECT id FROM inventory WHERE owner = $user[id] AND prototype = 2560 LIMIT 1"), 0, 0);
    $isTrend  = mysql_result(mysql_query("SELECT name FROM inventory WHERE owner = $user[id] AND (prototype = 2561 OR prototype = 2562 OR prototype = 2563) LIMIT 1"), 0, 0);
    $isToken  = mysql_result(mysql_query("SELECT name FROM inventory WHERE owner = $user[id] AND (prototype = 2564 OR prototype = 2565 OR prototype = 2563) LIMIT 1"), 0, 0);
    if (!$isNotice && !$isTrend) {
        $speach.="Для получения Направления надо взять Повестку у Военкома";
    } elseif ($isNotice && !$isTrend && !$isToken) {
        if ($user['level'] <= 7) {
            $tid   = 2561;
            $tname = 'Направление в зону боевых действий I';
        } elseif ($user['level'] <= 9) {
            $tid   = 2562;
            $tname = 'Направление в зону боевых действий II';
        } else {
            $tid   = 2563;
            $tname = 'Направление в зону боевых действий III';
        }
        mysql_query("DELETE FROM inventory WHERE owner = $user[id] AND id = $isNotice");
        takeshopitem($tid, "shop", "", "", 2, 0, $user['id']);
        $speach.="<span style=\"color: red\">Вы отдали \"Повестка\"<br />Вы получили \"$tname\"</span>"; 
    } elseif ($isToken) {
        $speach .= "При наличии жетонов в рюкзаке, получить повторное направление НЕЛЬЗЯ. Трофеи необходимо оставить в общежитии.";
    } else {
        $speach .= "У Вас уже есть \"$isTrend\"";
    }
    $answers=array(
        "4"=>"Я скоро вернусь... (завершить разговор)" // ok
    );
}

if ($step == 3) {
    $speach.="
        <span style=\"color: red;\">У Вас недостаточно жетонов для получения награды</span><br /><br />
        <b>Сухой Паек</b> - 10x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> и (нет ограничения на количество)<br />
        <b>Героическое Кольцо</b> - 20x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> 3x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /><br />
        <b>Героический Плащ</b> - 30x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> и 5x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /> (если конечно уровень позволяет носить такие вещи)<br />
        <b>Очень Героический Плащ</b> - 45x<img style=\"height: 27px;\" src=\"/i/sh/token23soldier.gif\" /> и 10x<img style=\"height: 27px;\" src=\"/i/sh/token23command.gif\" /> (для ветеранов, уровень персонажа 10+)";
    $answers=array(
        "4"=>"Хорошо (завершить разговор)" // ok
    );
}

if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
