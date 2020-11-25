<?php

if ($user['id'] != 7) {
    header("location: city.php");
    die;
}
 
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
    mysql_query("REPLACE INTO bezdna_exam_users SET id = $user[id], questionID = " . mt_rand(1, 10));
    $speach.="Я не вижу, кто ты. Но я слышу твое дыхание. Оно не похоже на дыхание моих рабов. Кто ты?";
    $answers=array(
        "2"=>"Я не твой раб, и этого достаточно.", // ok
        //"3"=>"Я пришелец сверху.", // ok
        "4"=>"Тихо уйти (завершить разговор)", // ok
    );
}

if ($step == 2) {
    $speach.="О. Ты дерзок. Но мне уже давно никто не дерзил. Приятно вновь вспомнить то время, когда я еще был способен вызывать у подчиненных ярость, а не слепое обожание. Ты не хочешь открывать мне свою личность – я понимаю это желание. Но открой мне тогда цель твоего прихода.";
    $answers=array(
        "5"=>"Я хотел бы присоединиться к вашему культу", // ok
        "4"=>"Тихо уйти (завершить разговор)", // ok
    );
}

if ($step == 5) {
    $speach.="Тогда тебе придется доказать свое желание. Знаешь ли ты слова Великой Книги? Я буду называть тебе стих, и его начало, а ты продолжать его. Готов?";
    $answers=array(
        "6"=>"Да", // ok
        "4"=>"Тихо уйти (завершить разговор)", // ok
    );
}

if ($step == 6) {
    $exam = mqfa("SELECT * FROM bezdna_exam_users WHERE id = $user[id]");
    $ques = mysql_fetch_assoc(mysql_query("SELECT * FROM bezdna_exam_questions WHERE volume = $exam[step] AND id = $exam[questionID] LIMIT 1")); 
    if (isset($_GET['a'])) {
        if (md5($ques['id']) == $_GET['a']) {
            $exam['step']++; 
            //die("REPLACE INTO bezdna_exam_users SET id = $user[id], step = " . $exam['step'] . ", questionID = " . mt_rand((($exam['step']*10)-9), ($exam['step']*10)));
            mysql_query("REPLACE INTO bezdna_exam_users SET id = $user[id], step = " . $exam['step'] . ", questionID = " . mt_rand((($exam['step']*10)-9), ($exam['step']*10)));
            header("Location: dialog.php?char=21971&step=6");
            die;
        } else {
            header("Location: dialog.php?char=21971&step=7");
            die;
        }
    }
    $isPage = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = $ques[pageID] AND koll > 0 LIMIT 1"), 0, 0);
    $isBook = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = $ques[bookID] AND koll > 0 LIMIT 1"), 0, 0);
    $speach.=$ques['question'];
    if ($isBook) {
        $answ = mqfaa("SELECT id, answer FROM bezdna_exam_questions WHERE volume = $exam[step] AND id != $exam[questionID] ORDER BY RAND() LIMIT 3");
        shuffle($answ);
        foreach ($answ as $v) {
            $answers[6 . '&a=' . md5($v['id'])] = $v['answer']; 
        }
        $answers[6 . '&a=' . md5($ques['id'])] = 'У меня есть ' . mysql_result(mysql_query("SELECT name FROM shop WHERE id = $ques[bookID] LIMIT 1"), 0, 0) . ' (показать книгу).';
    } elseif ($isPage) {
        $answ = mqfaa("SELECT DISTINCT id, answer FROM bezdna_exam_questions WHERE volume = $exam[step] AND id != $exam[questionID] ORDER BY RAND() LIMIT 3");
        $answ[] = array('id' =>$ques['id'], 'answer'=>$ques['answer']);
        echo $ques['answer'];
        shuffle($answ);
        foreach ($answ as $v) {
            $answers[6 . '&a=' . md5($v['id'])] = $v['answer']; 
        }
    } else {
        $answ = mqfaa("SELECT DISTINCT id, answer FROM bezdna_exam_questions WHERE volume = $exam[step] AND id != $exam[questionID] ORDER BY RAND() LIMIT 4");
        shuffle($answ);
        echo $ques['answer'];
        foreach ($answ as $v) {
            $answers[6 . '&a=' . md5($v['id'])] = $v['answer']; 
        }
    }
}

if ($step == 7) {
    mysql_query("REPLACE INTO bezdna_exam_users SET id = $user[id], questionID = " . mt_rand(1, 10));
    $speach.="Вы не сдали экзамен";
    $answers=array(
        "4"=>"Тихо уйти (завершить разговор)", // ok
    );
}


if ($step == 4) {
    header("location: city.php");
    die;
}
  
?>
