<?php

global $caverooms, $canalrooms;

if ($user['battle'] > 0) {
    echo "Не в бою...";
} elseif (($row['name'] == 'Заживляющая Настойка' || $row['name'] == 'Заживляющий Эликсир' || $row['name'] == 'Флакончик маны' || $row['name'] == 'Бутылек маны') && !in_array($user['room'], $canalrooms) && !in_array($user['room'], $caverooms)) {
    echo "Можно использовать только в темноте подземелий.";
} else {
  if($row['name']=='Зелье Жизни' || $row['name']=='Зелье жизни') $deltahp=100;
  if($row['name']=='Эликсир Жизни') $deltahp=250;
  if($row['name']=='Зелье Маны') $deltamana=200;
  if($row['name']=='Эликсир Маны') $deltamana=500;
  if($row['name']=='Заживляющая Настойка') $deltahp=150;
  if($row['name']=='Заживляющий Эликсир') $deltahp=300;
  if($row['name']=='Флакончик маны') $deltamana=250;
  if($row['name']=='Бутылек маны') $deltamana=500;
  if($row['prototype']==2461) $deltahp=600;
  getadditdata($user);
  if ($deltahp) {
    $deltahp=floor($deltahp*(addictval($user["hpaddict"])*0.04+1));
    $need=$user["hp"]<$user["maxhp"];
  }
  if ($deltamana) {
    $deltamana=floor($deltamana*(addictval($user["manaaddict"])*0.04+1));
    $need=$user["mana"]<$user["maxmana"];
  }
  if ($need) {
    mq("update users set ".($deltahp?"hp=if(hp+$deltahp>maxhp, maxhp, hp+$deltahp), `fullhptime` = ".time()."":"")." ".($deltamana?"mana=if(mana+$deltamana>maxmana, maxmana, mana+$deltamana), `fullmptime` = ".time()."":"")." where id='$user[id]'");

    if ($deltahp) echo "Выпит эликсир &quot;".$row['name']."&quot;. Успешно восстановлено ".min($deltahp,$user["maxhp"]-$user["hp"])." ед. уровня жизни.";
    if ($deltamana) echo "Выпит эликсир &quot;".$row['name']."&quot;. Успешно восстановлено ".min($deltamana,$user["maxmana"]-$user["mana"])." ед. уровня маны.";

    $user["hp"]=min($user["hp"]+$deltahp, $user["maxhp"]);
    $user["mana"]=min($user["mana"]+$deltamana, $user["maxmana"]);
    //db_query("UPDATE `users` SET ".$plhp." WHERE `id` = ".$user['id']."");
    //db_query("UPDATE `users` SET `mana` = `maxmana`, `fullmptime` = ".time()." WHERE  `mana` > `maxmana` AND `id` = '".$user['id']."' LIMIT 1;");
    //db_query("UPDATE `users` SET `hp` = `hp`, `fullhptime` = ".time()." WHERE  `hp` > `maxhp` AND `id` = '".$user['id']."' LIMIT 1;");

    $bet=1;
  } elseif ($deltahp) echo "Вы и так здоровы.";
  elseif ($deltamana) echo "Ваша мана и так полная.";
}
?>
