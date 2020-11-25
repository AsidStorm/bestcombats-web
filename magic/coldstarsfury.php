<?
  if (!$user["battle"]) {
    echo "Это боевая магия."; 
  } elseif ($user["hp"]<=0) { 
    echo "Вам это уже не пригодится!"; 
  } elseif ($fbattle->battleunits[$user["id"]]["additdata"]["s_duh"]<=0) {
    echo "Недостаточно силы духа."; 
  } else {
    if ($user['sex'] == 1) {$action="";}
    else {$action="а";}
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$fbattle->my_class).' использовал'.$action.' заклятие <b>'.$row["name"].'</b>.<BR>');
    //$fbattle->write_log ();
    $fbattle->addeffect($user["id"], COLDSTARSFURY, 1, 0, "coldstarsfury", array(), 0);
    $fbattle->battleunits[$user["id"]]["additdata"]["s_duh"]-=1000;
    $fbattle->needupdateaddit[$user["id"]]=1;
    echo "Усешно использован свиток $row[name].";
    $bet=1;
  }
?>