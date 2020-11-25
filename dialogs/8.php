<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($speakto["questlose"] && $step!=5) if (!canmakequest($speakto["questlose"])) $step=2;
  if ($step==1) {
    $speach.="Убирайся!";
    $answers=array(

    "4"=>"Умри, презренный!",
    "3"=>"Ухожу, ухожу. Ты только не кипятись.");
  }
  
  if ($step==2) {
    $speach.="Вам необходимо отдохнуть ещё как минимум ".ceil($questtime/60)." мин.";
    $answers=array("5"=>"Вернуться");
  }
  if ($step==3) {
    makequest($speakto["questlose"],2);
    addqueststep($user["id"], $speakto["questlose"], 10);
    $speach="Вы с позором уходите, за проявленное малодушие вы еще два часа не сможете принимать участие в битвах с гномами.";
    $answers=array("5"=>"Вернуться");
  }
  if ($step==4 && canmakequest($speakto["questlose"])) {
    srand();
    makequest($speakto["questlose"],0.1);
    nick99($user["id"]);
    $r=mt_rand(1,2);
    $r=1;
    $q=getvar("quest");
    if ($r==2 && !$q) {
      battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, 0,0,0,0, 0, array(array("name"=>"Страж подгорья", "id"=>11135)),1);
    } else {
      battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, 0,0,0,0, 0);
    }

    $speach="Как только вы напали на цверга, сзади на вас набросилась ужасная тварь. Похоже, бой будет нелёгкий.<br><br>
    <center><a href=\"main.php\">перейти к бою</a></center>";
    $answers=array();
  }
  
  if ($step==5) {
    header("location: city.php");
    die;
  }
  if ($step==6) {
    $speach.="Проход в катакомбы расчищен, но пока надо дождаться решения воеводы, чтобы продолжать атаку.";
    $answers=array("5"=>"Вернуться");
  }
?>