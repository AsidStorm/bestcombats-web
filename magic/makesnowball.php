<?
  if ($user["room"]!=20) {
    echo "Снежки можно лепить только на Центральной площади.";
  } elseif ($user["battle"]) {
    echo "Не в бою.";
  } else {
    $i=mqfa1("select id from effects where owner='$user[id]' and type=".MAKESNOWBALL);
    if ($i) mq("update effects set time=".(time()+180)." where id='$i'");
    else mq("insert into effects set name='Собрать снег', owner='$user[id]', time=".(time()+180).", type=".MAKESNOWBALL.", isp=1");
    echo "Вы начали лепить снежок.";
    updeffects();
    $bet=1;
  }
?>