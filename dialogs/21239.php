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
    $speach.="Рад тебя видеть, новобранец! Ведь ты не откажешь отечеству, когда оно нуждается в тебе! Я уже вижу непреодолимое желание в твоих глазах, получить повестку и попасть на передовую!<br /><br />Так возрадуйся, я здесь, чтобы осуществить твою мечту! Впрочем, если ты не горишь желанием ОТДАТЬ ДОЛГ РОДИНЕ, есть более простое задание!";
    $answers=array(
        "2"=>"Скорее! Я хочу на фронт!", // ok
        "3"=>"Готов взяться за более простое задание, товарищ Военком!", // ok
        "4"=>"Вы ошиблись, меня нет дома. (завершить разговор)" // ok
    );
}

if ($step == 2) {
    $isNotice = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = 2560"), 0, 0);
    $isTrend  = mysql_result(mysql_query("SELECT name FROM inventory WHERE owner = $user[id] AND (prototype = 2561 OR prototype = 2562 OR prototype = 2563) LIMIT 1"), 0, 0);
    if (!$isNotice && !$isTrend) {
        takeshopitem(2560, "shop", "", "", 2, 0, $user['id']);
        $speach.="<span style=\"color: red\">Вы получили Повестка</span><br /><br />Чудненько! (потирает руки) Вот тебе повестка на фронт, отдашь ее сержанту и получишь от него дальнейшие инструкции.";
    } elseif ($isNotice && !$isTrend) {
        $speach.="У Вас уже есть Повестка.";    
    } else {
        $speach.="У Вас уже есть \"$isTrend\"";
    }
    $answers=array(
        "4"=>"ТАК ТОЧНО! (завершить разговор)" // ok
    );
}

if ($step == 3) {
    $speach.="Требуется Жетон «Рядовой армии Общего Врага» х 25.<br /><br />Прохождение теста на знание устава, 3 вопроса.<br /><br />Награда за все правильные ответы - \"Устав. Коллекционное издание.\"";
    $answers=array(
        "4"=>"Хорошо. (завершить разговор)" // ok
    );
}

if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
