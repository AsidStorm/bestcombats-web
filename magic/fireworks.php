<?
  if ($user["room"]!=20) {
    echo "Феерверк можно использовать только на Центральной площади!";
  } else {
    sysmsg("На Центральной площади феерверк в честь <b>$user[login]</b>.");
    mq("update variables set value=".(time()+300)." where var='fireworks'");
    $bet=1;
  }
?>