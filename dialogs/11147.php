<?
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
  //$done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($step==1) {
    $speach.="<p style=\"text-align: left\">Авываыапр!! Дыдыдждывыды!! Бууураввыывввы!!!</p><p style=\"text-align: left\">Ты еще не рыцарь Бездны, для начала пройди экзамен у Вождя Бездны!</p>";
    $answers=array("5"=>"Вернуться");
  }
  
  if ($step==5) {
    header("location: cave.php");
    die;
  }
?>
