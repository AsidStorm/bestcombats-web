<?php
  if (!$user["battle"]) {
    echo "Этот свиток можно использовать только в бою!";
  } else {
    $cnt=$row["magic"]-30;
    if ($row["prototype"]==2235 || $row["prototype"]==2240 || $row["prototype"]==2245 || $row["prototype"]==2250 || $row["prototype"]==2255) $tactic="hit";
    if ($row["prototype"]==2236 || $row["prototype"]==2241 || $row["prototype"]==2246 || $row["prototype"]==2251 || $row["prototype"]==2256) $tactic="krit";
    if ($row["prototype"]==2237 || $row["prototype"]==2242 || $row["prototype"]==2247 || $row["prototype"]==2252 || $row["prototype"]==2257) $tactic="counter";
    if ($row["prototype"]==2238 || $row["prototype"]==2243 || $row["prototype"]==2248 || $row["prototype"]==2253 || $row["prototype"]==2258) $tactic="block2";
    if ($row["prototype"]==2239 || $row["prototype"]==2244 || $row["prototype"]==2249 || $row["prototype"]==2254 || $row["prototype"]==2259) $tactic="parry";
    $fbattle->addtactic($user["id"], $tactic, $cnt, 0, 1);
    echo "Успешно использован свиток $row[name]."; 
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал'.($user["sex"]==1?"":"а").' заклятие <b>'.$row["name"].'</b>.<BR>');
    $fbattle->write_log ();
    $bet=1;
  }

?>