<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($speakto["questlose"] && $step!=5 && $step!=14) if (!canmakequest($speakto["questlose"])) $step=2;
  if ($step==1) {
    $speach.="Говорить с этими тварями бесполезно, если и понимают человеческий язык, всё равно не ответят. Остаётся либо атаковать, либо с позором уходить.";
    $answers=array(
    "4"=>"Напасть.",
    "3"=>"Уйти.");
  }
  
  if ($step==2) {
    $speach.="Вам необходимо отдохнуть ещё как минимум ".ceil($questtime/60)." мин.";
    $answers=array("5"=>"Вернуться");
  }
  if ($step==3) {
    makequest($speakto["questlose"],2);
    addqueststep($user["id"], $speakto["questlose"], 10);
    $speach="Вы с позором уходите, за проявленное малодушие вы еще час не сможете принимать участие в расчистке пещеры";
    $answers=array("5"=>"Вернуться");
  }
  if ($step==4 && canmakequest($speakto["questlose"])) {
    makequest($speakto["questlose"],0.1);
    nick99($user["id"]);
    battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, $speakto["quest"],0,0,0);
  }
  
  if ($step==5) {
    header("location: city.php");
    die;
  }
  if ($step==6) {
    $speach.="Группа тварей уничтожена. Найдена одна из утеряных книг алхимика. Пока можно немного передохнуть.";
    $answers=array("5"=>"Вернуться");
  }

?>