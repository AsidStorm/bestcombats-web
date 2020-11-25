<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($step!=8 && $speakto["questlose"] && $step!=5 && $step!=14) if (!canmakequest($speakto["questlose"])) $step=2;
  $q=getvar("quest");
  if (!$q && $step!=8 && $step!=5) $step=7;
  if ($step==1) {
    $speach.="Вот они, те, кто пролили столько крови нашей, да только теперь уже не поможет им магия подгорная, пусть же отведают стали да огня нашего!";
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
    $speach="Вы с позором уходите, за проявленное малодушие вы еще 2 часа не сможете принимать участие в расчистке башни.";
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

  if ($step==8) {
    gotoroom(80);
    header("location: main.php");
    die;
  }

  if ($step==6) {
    $speach.="Все твари уничтожены, теперь есть время немного отдохнуть, пока ведётся исследование башни. После предыдущей попытки лучше самостоятельно туда не суваться.";
    $answers=array("5"=>"Вернуться");
  }
  if ($step==7) {
    $speach.="Твари опять обретают прежнюю силу. Нужно, чтобы маги прочли заклинание, которое ослабит их.";
    $answers=array("8"=>"Пройти к магическому кругу", "5"=>"Вернуться");
  }

?>