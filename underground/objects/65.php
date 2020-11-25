<?

  if ($tx*2==8 && $ty*2==12) {
    $report="<div style=\"font-weight:normal\">Слепой богини символ укажет дальше путь.</div>";
  }
  if ($tx*2==14 && $ty*2==8) {
    gotoxy(12, 2);
    $report="";
  }
  if ($tx*2==14 && $ty*2==12) {
    gotoxy(12, 2);
    $report="";
  }
  if ($tx*2==14 && $ty*2==10) {
    gotoxy(12, 20);
    $report="";
  }
  if ($tx*2==8 && $ty*2==30) {
    $report="<div style=\"font-weight:normal\">Заморский град огромный зовут большим...</div>";
  }
  if ($tx*2==14 && $ty*2==26) {
    gotoxy(12, 20);
    $report="";
  }
  if ($tx*2==14 && $ty*2==28) {
    gotoxy(12, 20);
    $report="";
  }
  if ($tx*2==14 && $ty*2==30) {
    gotoxy(12, 38);
    $report="";
  }
  if ($tx*2==14 && $ty*2==46) {
    gotoxy(12, 38);
    $report="";
  }
  if ($tx*2==14 && $ty*2==48) {
    gotoxy(12, 38);
    $report="";
  }
  if ($tx*2==14 && $ty*2==44) {
    gotoxy(12, 56);
    $report="";
  }
  if ($tx*2==14 && $ty*2==62) {
    gotoxy(12, 56);
    $report="";
  }
  if ($tx*2==14 && $ty*2==64) {
    gotoxy(12, 56);
    $report="";
  }
  if ($tx*2==14 && $ty*2==66) {
    gotoxy(12, 74);
    $report="";
  }
  if ($tx*2==14 && $ty*2==80) {
    gotoxy(12, 74);
    $report="";
  }
  if ($tx*2==14 && $ty*2==82) {
    gotoxy(12, 74);
    $report="";
  }
  if ($tx*2==14 && $ty*2==84) {
    gotoxy(12, 92);
    $report="";
  }
  if ($tx*2==14 && $ty*2==98) {
    gotoxy(12, 92);
    $report="";
  }
  if ($tx*2==14 && $ty*2==102) {
    gotoxy(12, 92);
    $report="";
  }
  if ($tx*2==14 && $ty*2==100) {
    gotoxy(12, 110);
    $report="";
  }
  if ($tx*2==14 && $ty*2==206) {
    gotoxy(12, 200);
    $report="";
  }
  if ($tx*2==14 && $ty*2==210) {
    gotoxy(12, 200);
    $report="";
  }
  if ($tx*2==14 && $ty*2==208) {
    gotoxy(30, 30);
    $s=mqfa1("select id from quests where user='$user[id]' and quest=24");
    if (!$s) {
      mq("update users set money=money+10 where id='$user[id]'");
      $report="Вы решили все задачи и получили 10 кр!";
      $c=mqfa1("select count(id) from quests where quest=24");
      if ($c<10) {
        sysmsg("Персонаж <b>$user[login]</b> нашёл ответы на все вопросы викторины!");
      }
    } else $report="Вы решили все задачи!";
    addqueststep($user["id"], 24);
  }                           
  if ($tx*2==14 && $ty*2==192) {
    gotoxy(12, 200);
    $report="";
  }
  if ($tx*2==14 && $ty*2==190) {
    gotoxy(12, 182);
    $report="";
  }
  if ($tx*2==14 && $ty*2==188) {
    gotoxy(12, 182);
    $report="";
  }
  if ($tx*2==14 && $ty*2==172) {
    gotoxy(12, 182);
    $report="";
  }
  if ($tx*2==14 && $ty*2==174) {
    gotoxy(12, 164);
    $report="";
  }
  if ($tx*2==14 && $ty*2==170) {
    gotoxy(12, 164);
    $report="";
  }
  if ($tx*2==14 && $ty*2==152) {
    gotoxy(12, 164);
    $report="";
  }
  if ($tx*2==14 && $ty*2==154) {
    gotoxy(12, 146);
    $report="";
  }
  if ($tx*2==14 && $ty*2==156) {
    gotoxy(12, 146);
    $report="";
  }
  if ($tx*2==14 && $ty*2==138) {
    gotoxy(12, 146);
    $report="";
  }
  if ($tx*2==14 && $ty*2==134) {
    gotoxy(12, 128);
    $report="";
  }
  if ($tx*2==14 && $ty*2==136) {
    gotoxy(12, 128);
    $report="";
  }
  if ($tx*2==14 && $ty*2==116) {
    gotoxy(12, 128);
    $report="";
  }
  if ($tx*2==14 && $ty*2==118) {
    gotoxy(12, 110);
    $report="";
  }
  if ($tx*2==14 && $ty*2==120) {
    gotoxy(12, 110);
    $report="";
  }
  if ($tx*2==8 && $ty*2==48) {
    $report="<div style=\"font-weight:normal\">В стране далекой, древней заторы создает.</div>";
  }
  if ($tx*2==8 && $ty*2==66) {
    $report="<div style=\"font-weight:normal\">Мудрейших ты плавсредство, смелее выбирай.</div>";
  }
  if ($tx*2==8 && $ty*2==84) {
    $report="<div style=\"font-weight:normal\">За остров изумрудный не жаль отдать ее.</div>";
  }
  if ($tx*2==8 && $ty*2==102) {
    $report="<div style=\"font-weight:normal\">Коль умным быть ты хочешь, его придется есть.</div>";
  }
  if ($tx*2==8 && $ty*2==120) {
    $report="<div style=\"font-weight:normal\">Великий Александр его рубить решил.</div>";
  }
  if ($tx*2==8 && $ty*2==138) {
    $report="<div style=\"font-weight:normal\">Фрукт этот сочный, вкусный помог открыть закон.</div>";
  }
  if ($tx*2==8 && $ty*2==156) {
    $report="<div style=\"font-weight:normal\">Привез её в Россию великий Петр, царь.</div>";
  }
  if ($tx*2==8 && $ty*2==174) {
    $report="<div style=\"font-weight:normal\">Его на востоке хитрец говорить обещал научить.</div>";
  }
  if ($tx*2==8 && $ty*2==192) {
    $report="<div style=\"font-weight:normal\">Великий гений сыска не расставался с ней.</div>";
  }
  if ($tx*2==8 && $ty*2==210) {
    $report="<div style=\"font-weight:normal\">Один за плугом ходит а семеро с...</div>";
  }
?>