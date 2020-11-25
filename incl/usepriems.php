<?
$sortt=sort_teamsc();
  function taketactics($p) {
    global $user, $strokes, $fbattle;
       $fbattle->taketactics($user["id"], $p);
  }

  function getantimagic($i, $dress, $effects, $type=0, $caster=0) {
    global $user, $fbattle;
    if ($type==FORCEFIELD) return 0;
    if (!$caster) $caster=$user["id"];
    $ret=$dress["mfdmag"];
    if ($type==FIREDAMAGE) {
      $ret+=$dress["mfdfire"];
    }
    if ($type==WATERDAMAGE) {
      $ret+=$dress["mfdwater"];
    }
    if ($type==EARTHDAMAGE) {
      $ret+=$dress["mfdearth"];
    }
    if ($type==AIRDAMAGE) {
      $ret+=$dress["mfdair"];
    }
    if ($type==DARKDAMAGE) {
      $ret+=$dress["mfddark"];
    }
    if ($type==LIGHTDAMAGE) {
      $ret+=$dress["mfdlight"];
    }
    if ($ret<0) $ret=0;
    $fbattle->getbu($i);
    $fbattle->getadditdata($i);
    if ($fbattle->battleunits[$i]["additdata"]["storm"]>1) $ret+=($fbattle->battleunits[$i]["additdata"]["storm"]-1)*100;

    $fbattle->getbu($caster);          
    if ($fbattle->battleunits[$caster]["level"]==$fbattle->battleunits[$i]["level"]) {
    } else {
      $ret*=$fbattle->getdefcoef($caster, $i, 1);
    }
    return $ret;
    return 1-mftoabs($ret);
  }

  function canbeclearedgood($effect, $priem) {
    if (!$effect["effect"] || $effect["img"]) return false;
    if ($effect["effect"]<=14) return false;
    $uc=array(DEFEND=>1, STATICS=>1, SHOCK=>1, SOULEATEN=>1, INJURY=>1, LIFE=>1, EARTHLINK=>1,
    IMMUNITY=>1, MANADAMAGE=>1, CHARGE=>1);
    if (@$uc[$effect["effect"]]) return false;

    return true;
  }

  function canbeclearedbad($effect, $priem) {
    if (!$effect["effect"] || $effect["img"]) return false;
    if (strpos($effect["priem"], "wis_water_frost")===0) return false;    
    $uc=array("wis_water_tempheal"=>1, "wis_earth_link_minus"=>1, "wis_earth_link_zero"=>1, "wis_earth_link_plus"=>1);
    if (@$uc[$effect["priem"]]) return false;

    $uc1=array(CHARGE=>1, STATICS=>1);
    if ($priem=="hp_cleance" && $uc1[$effect["effect"]]) return false;

    $uc2=array();
    if ($uc2[$effect["effect"]]) return false;

    $cl1=array(CHARGE=>1, STATICS=>1);
    if ($priem!="hp_cleance" && $cl1[$effect["effect"]]) return true;

    $cl2=array(DECHEAL=>1);
    if ($cl2[$effect["effect"]]) return true;

    if ($effect["effect"]>14) return false;
    return true;
  }
  
  function remeffect($user, $priem, $log=1, $good=0) {
    global $fbattle, $strokes;
    $fbattle->getbu($user);
    $effs=$fbattle->battleunits[$user]["effects"];
    if ($fbattle->battleunits[$user]["manabarrier"]>0) {
      if ($fbattle->battleunits[$user]["mbstroke"]<10) $mbs="wis_gray_manabarrier0".$fbattle->battleunits[$user]["mbstroke"];
      else $mbs="wis_gray_manabarrier".$fbattle->battleunits[$user]["mbstroke"];
      $effs[$mbs]=array("effect"=>MAGICBARRIER);
    }
    foreach ($effs as $k=>$v) $effs[$k]["priem"]=$k;
    shuffle($effs);
    foreach ($effs as $k=>$v) {
      if ($good) {
        if (!canbeclearedgood($v, $priem)) continue;
      } else {
        if (!canbeclearedbad($v, $priem)) continue;
      }
      if ($v["effect"]%2==0 && $v["value"]>$strokes[$k]->value && 0) { //Снятие целей частично
        $fbattle->battleunits[$user]["effects"][$k]["value"]-=$strokes[$k]->value;
        $fbattle->toupdatebu[$user]["effects"]=1;
      } else {
        if ($v["effect"]==MAGICBARRIER) {
          $fbattle->toupdatebu[$user]["manabarrier"]=-$fbattle->battleunits[$user]["manabarrier"];
        } else {
          $fbattle->remeffect($user, $v["priem"]);
          unset($fbattle->battleunits[$user]["effects"][$v["priem"]]);
          $fbattle->toupdatebu[$user]["effects"]=1;
        }
      }
      if ($log) addlog($fbattle->battle_data["id"],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user,$sortt).' из последних сил применил прием <b>"'.$strokes[$priem]->name.'"</b>, отменив действие приёма <b>'.$strokes[$v["priem"]]->name.'</b>.<BR>');
      else $fbattle->logstrokeend($v["priem"], $user);
      $fbattle->needupdatebu=1;
      return $v["priem"];
    }
    return false;
  }

  function getmagicskill($damagetype, $effec=0) {
    global $user, $fbattle;
    $fbattle->getbu($user["id"]);
    if ($damagetype==FIREDAMAGE || $effect==FIREDAMAGE) return array($fbattle->battleunits[$user["id"]]["mfire"],0);
    if ($damagetype==WATERDAMAGE || $effect==WATERDAMAGE) return array($fbattle->battleunits[$user["id"]]["mwater"],0);
    if ($damagetype==AIRDAMAGE || $effect==AIRDAMAGE) return array($fbattle->battleunits[$user["id"]]["mair"],0);
    if ($damagetype==EARTHDAMAGE || $effect==EARTHDAMAGE) return array($fbattle->battleunits[$user["id"]]["mearth"],0);
    if ($damagetype==GRAYDAMAGE || $effect==GRAYDAMAGE) return array($fbattle->battleunits[$user["id"]]["mgray"],1);
    if ($damagetype==LIGHTDAMAGE || $effect==LIGHTDAMAGE) return array($fbattle->battleunits[$user["id"]]["mlight"],1);
    if ($damagetype==DARKDAMAGE) return array($fbattle->battleunits[$user["id"]]["mdark"],1);
  }
  
  function getmagiceffect($user, $battle, $val, $intel, $anti, $damagetype=0, $target=0, $priem=0) {
    global $fbattle, $strokes, $mfmagp, $minusmfdmag, $mfdmag;
    $minusanti=0;
    $mult=1;
    if ($damagetype==FIREDAMAGE) {
      foreach ($fbattle->battleunits[$user]["effects"] as $k=>$v) {
        if ($v["effect"]==MFFIRE) {
          $intel+=$v["value"]*2;
          $fbattle->remeffect($user, $k);
          $fbattle->logstrokeend($k, $user);
        }
      }
      $intel+=$fbattle->battleunits[$user]["mffire"]*2;
      $minusanti+=$fbattle->battleunits[$user]["minusmfdfire"];
      foreach ($fbattle->battleunits[$target]["effects"] as $k=>$v) {
        if ($v["effect"]==FIREDEF || $v["effect"]==MAGICDEF) $mult*=1-($v["value"]/100);
        if ($v["effect3"]==FIREDEF || $v["effect3"]==MAGICDEF) $mult*=1-($v["value3"]/100);
        if ($v["effect"]==MINUSFIREDEF) {
          $minusanti+=$v["value"];      
          if ($priem && $strokes[$priem]->incdamageformark) $mult*=1+($strokes[$priem]->incdamageformark*$v["cnt"]);
        }
      }
    }
    if ($damagetype==WATERDAMAGE) {
      $intel+=$fbattle->battleunits[$user]["mfwater"]*2;
      $minusanti+=$fbattle->battleunits[$user]["minusmfdwater"];
      foreach ($fbattle->battleunits[$target]["effects"] as $k=>$v) {
        if ($v["effect"]==WATERDEF || $v["effect"]==MAGICDEF) $mult*=1-($v["value"]/100);
        if ($v["effect3"]==WATERDEF || $v["effect3"]==MAGICDEF) $mult*=1-($v["value3"]/100);
        if ($v["effect"]==MINUSWATERDEF) $minusanti+=$v["value"];
      }
    }
    if ($damagetype==AIRDAMAGE) {
      $intel+=$fbattle->battleunits[$user]["mfair"]*2;
      $minusanti+=$fbattle->battleunits[$user]["minusmfdair"];
      foreach ($fbattle->battleunits[$target]["effects"] as $k=>$v) {
        if ($v["effect"]==AIRDEF || $v["effect"]==MAGICDEF) $mult*=1-($v["value"]/100);
        if ($v["effect3"]==AIRDEF || $v["effect3"]==MAGICDEF) $mult*=1-($v["value3"]/100);
        if ($v["effect"]==MINUSAIRDEF) $minusanti+=$v["value"];
      }
      $cg=$fbattle->haseffect($target, wis_air_charged);
      if ($cg) $val*=$cg/100+1;
    }
    if ($damagetype==EARTHDAMAGE) {
      $intel+=$fbattle->battleunits[$user]["mfearth"]*2;
      $minusanti+=$fbattle->battleunits[$user]["minusmfdearth"];
      foreach ($fbattle->battleunits[$target]["effects"] as $k=>$v) {
        if ($v["effect"]==EARTHDEF || $v["effect"]==MAGICDEF) $mult*=1-($v["value"]/100);
        if ($v["effect3"]==EARTHDEF || $v["effect3"]==MAGICDEF) $mult*=1-($v["value3"]/100);
        if ($v["effect"]==MINUSEARTHDEF) $minusanti+=$v["value"];      
        if ($v["effect"]==INCEARTHDAMAGE) {
          $mult*=$v["value"]/100+1;
        }
      }        
    }
    if ($damagetype==LIGHTDAMAGE) {
      $intel+=$fbattle->battleunits[$user]["mflight"]*2;
    }
    if ($damagetype==DARKDAMAGE) {
      $intel+=$fbattle->battleunits[$user]["mfdark"]*2;
    }
    if (@$strokes[$priem]->damageprof) {
      $anti=$fbattle->battleunits[$target]["mfd".$strokes[$priem]->damageprof]+$fbattle->battleunits[$target]["mfdhit"];
      $minusanti=0;
      $mult=1;
    }
    foreach ($fbattle->battleunits[$user]["effects"] as $k=>$v) {
      if ($v["effect"]==EXTRAMAGDAMAGE) {
        $mult*=$v["value"]/100+1;
      }
      if ($v["effect2"]==EXTRAMAGDAMAGE) {
        $mult*=$v["value2"]/100+1;
      }
    }
    if (!$fbattle->sameteam($user, $target) || 1) { //Отмена антимагии при лечении

      if (incastle($fbattle->battleunits[$user]["room"]) && $fbattle->battleunits[$user]["room"]<$fbattle->battleunits[$target]["room"]) $anti+=250;

      $minusanti+=$fbattle->battleunits[$user]["minusmfdmag"];

      if (@$strokes[$priem]->damageprof) $minusanti=0;

      if ($anti>1000 && 0) {
        if ($minusanti>=100) $anti=0;
        else $anti=$anti*(1-($minusanti/100));
      } else {
        $i=0;
        $antival=0;
        while ($minusanti>0) {
          if ($minusanti>10) $antival+=10*(10-$i);
          else $antival+=$minusanti*(10-$i);
          $minusanti-=10;
          $i++;
        }
        if ($antival>$anti && $target<_BOTSEPARATOR_) $anti=0;
        $anti-=$antival;
      }
      
      if (@$strokes[$priem]->damageprof) {
        if ($anti>MAXMFD) $anti=MAXMFD;
      } elseif ($anti>MAXMFDMAG) $anti=MAXMFDMAG;
      if ($anti>0) $anti=(1-mftoabs($anti));
      else $anti=1+mftoabs(-$anti);
    } else {
      $anti=1;
      $mult=1;
    }
    $intel+=$fbattle->battleunits[$user]["mfmagp"]*2;
    return ceil($val*($intel/200+1)*$anti*$mult);//*0.67
  }

  function getmagkrit($level, $skill, $dark) {
    global $user, $fbattle;
    srand();
    foreach ($fbattle->battleunits[$user["id"]]["effects"] as $k=>$v) {
      if ($v["effect"]==COLDSTARSFURY) {
        $fbattle->logstrokeend($k, $user["id"]);
        unset($fbattle->battleunits[$user["id"]]["effects"][$k]);
        return 2;
      }
      $fbattle->toupdatebu[$user["id"]]["effects"]=1;
    }
    if ($dark) $mid=$level*2-9;
    else $mid=$level*2-7;
    if ($skill==$mid) return 0;
    $ch=abs($skill-$mid)*3;
    if ($ch>30) $ch=30;
    if ($skill>$mid) {
      if (getchance($ch)) return 1;
    } else {
      if (getchance($ch)) return -1;
    }
    return 0;
    $max=$level*2+3;
    if ($skill>=$max) $ch=30;
    else $ch=30*($skill/$max);
    return getchance($ch);
  }

  function sort_teamsc() {
    global $fbattle;
    return $fbattle->my_class;
    // режем тимзы
    if (in_array ($user['id'],$fbattle->t1)) {
      $color = "B1";
    } else {
      $color = "B2";
    }

    return $color;
  }
//////////////////////////////////////////////////////////////////////////

  include_once("incl/strokedata.php");
if (@$strokes[$priem]->instantdamage) {
  if ($strokes[$priem]->instantdamage=="level5") $schhp=floor(5*$user['level']);
  elseif ($strokes[$priem]->instantdamage=="damage3") {
    $fbattle->getbu($user["id"]);
    $tmp=getdamage($fbattle->battleunits[$user["id"]],1,0);
    $dam=rand(0, $tmp[1]-$tmp[0])+$tmp[0];
    $schhp=ceil($dam/3);
  } elseif ($strokes[$priem]->damagernd) $schhp=$strokes[$priem]->instantdamage+rand(0, $strokes[$priem]->damagernd);


  if ($strokes[$priem]->shocklastused) {
    $fbattle->getbu($fbattle->enemy);
    $ds=$fbattle->getdeltastun($fbattle->enemy);
    if ($fbattle->battleunits[$fbattle->enemy]["laststroke"]) {
      if ($strokes[$priem]->shocklastused=="effectcnt") $tmp=$fbattle->haseffect($stroketarget, $strokes[$priem]->targeteffect);
      else $tmp=$strokes[$priem]->shocklastused;
      $fbattle->shockpriem($fbattle->battleunits[$fbattle->enemy]["laststroke"], $fbattle->enemy, $strokes[$priem]->shocklastused-$ds);
    }
  }

  $fbattle->getenemypriems();
  $res=$fbattle->checkpriems2($fbattle->enemypriems,$fbattle->en_class,$fbattle->enemy);
  $schhp=$fbattle->processstrokeeffect2($res, $schhp);
  $schhp=$fbattle->instantdamage($fbattle->enemy, $schhp);

  $starthp=$fbattle->userdata[$fbattle->enemy]["hp"];

  $damage=$fbattle->takehp($schhp, $fbattle->enemy, $fbattle->userdata[$fbattle->enemy]["hp"], 1, $user["id"]);

  $fbattle->checkbackeffects($user["id"], $_SESSION['enemy'], min(ceil($damage), $starthp));

  $fbattle->actpriem($priem, $igogo->priems[$priem]["id"], $user["id"], 3, 1, 1);
  $fbattle->logstroke($user['id'], $priem, array("damage"=>$damage), $fbattle->enemy);
  $fbattle->adddamage($fbattle->user['id'], $damage, $fbattle->enemy);
  taketactics($priem);
  $fbatte->needupdate=1;
} elseif ($priem=="multi_followme") {
  $target=getid($_POST["main"], $fbattle->battle_data["id"]);
  if ($fbattle->battle[$target][$user['id']][0]) {
    echo "<b><font color=red>Этот персонаж уже поставил на вас удар.</b></font>";
  } else {
    if($sortt=='B1'){$c2='B2';}else{$c2='B1';};
    if($user['sex'] == 1) {
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применил прием <b>"Преследование"</b> на '.$fbattle->nick5($target,$c2).'<BR>');
    } else {
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применила прием <b>"Преследование"</b> на '.$fbattle->nick5($target,$c2).'<BR>');
    }
    $fbattle->toupdatebu[$target]["follow"]=$user["id"];
    $fbattle->needupdatebu=1;
    taketactics($priem);
  }
} elseif ($priem=="block_addchange") {
  $target=getid($_POST["main"], $fbattle->battle_data["id"]);
  if ($fbattle->battle[$user['id']][$target][0]) {
    echo "<b><font color=red>На этого персонажа уже поставлен удар.</b></font>";
  } elseif ($priem=='block_addchange' && $target){
    mq("update users set `block2`= `block2` -1   WHERE id='".$_SESSION['uid']."'");
    $user['block2']=$user['block2']-1;
    $found=0;
    if(($fbattle->user['hp']>0) && $fbattle->battle) {
      foreach($fbattle->battle[$fbattle->user['id']] as $k => $v) {
        if ($fbattle->battle[$fbattle->user['id']][$k][0] == 0) {
            if ($k==$target) {
              $found=1;
              break;
            }
        }
      }
    }
    if ($found) {
      $fbattle->toupdatebu[$fbattle->user["id"]]["enemy"]=$target;
      $fbattle->needupdatebu=1;
      $fbattle->enemy=$target;
      $enemy=$target;
    }
  }
} elseif ($priem=="hp_trade") {
  if($user['sex'] == 1) {
    addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применил прием <b>"Разделить кровь"</b> на '.$fbattle->nick5($stroketarget,$sortt).'<BR>');
  } else {
    addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применила прием <b>"Разделить кровь"</b> на '.$fbattle->nick5($stroketarget,$sortt).'<BR>');
  }
  mq("update users set hp2=hp2+1 where id='$stroketarget'");
  taketactics($priem);

} elseif ($strokes[$priem]) {
  function kritcolor($k) {
    if ($k==1) return "red";
    elseif (@$k==-1) return "#aaaaaa";
    else return "#006699";
  }
  function logstroke($priem, $data) {
    global $user, $strokes, $fbattle;
    $a=$data["sex"]==1?"":"а";
    $la=$data["sex"]==1?"":"ла";
    $as=$data["sex"]==1?"ся":"ась";
    $date="<span class=date>".date("H:i")."</span>";
    if ($data["damage"]) {
      $fbattle->add_log("<!--$data[userid]/$data[target]/0/0/$data[damage]/magshot".($data["krit"]?"krit":"")."-->");
    }
    $actions=array("наконец сфокусировал$a свое внимание на поединке и наколдовал$a", "впал в транс и начал$a бормотать заклятие",
    "догадавшись, что пришло время показать себя, произнес$la заклятье", "нарисовав вокруг себя несколько рун, призвал$a заклятье",
    "очнул$as от медитации, и призвал$a заклятье", "с испугу произнес$la, первое пришедшее на ум, заклятье");
    $action=$actions[rand(0,count($actions)-1)];
    if ($data["missedshot"]) {
      $results=array("получилось нечто совсем безобидное", "по роковому стечению обстоятельств замысел не удался", "безрезультатно");
      $result=$results[rand(0,count($results)-1)];
      $res=" $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy], но $result. $data[enhp]";
    } elseif (isset($data["deltamana"]) && $data["mana"] && isset($data["heal"]) && @$data["selfcast"]) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\", пополнив жизнь <Font color=green><b> +$data[heal]</b></font> $data[hp] и ману <Font Color=#006699><b> +$data[deltamana]</b></font> $data[mana]";
    } elseif (isset($data["deltamana"]) && $data["mana"] && isset($data["heal"])) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy], пополнив жизнь <Font color=green><b> +$data[heal]</b></font> $data[hp] и ману <Font Color=#006699><b> +$data[deltamana]</b></font> $data[mana]";
    } elseif (isset($data["deltamana"]) && $data["mana"] && isset($data["deltahp"]) && $data["hp"]) {
      $res=" вспомнил$a про приём <b>".$strokes[$priem]->name."</b> и пополнил$a ману <Font Color=#006699><b> +$data[deltamana]</b></font> $data[mana], ценой жизни <font color=#ff0000>-$data[deltahp]</font> $data[hp]";
    } elseif (isset($data["deltamana"]) && $data["mana"] && $data["remeffect"] && $data["effect"]) {
      $res=" вспомнил$a про приём <b>".$strokes[$priem]->name."</b> с помощью которого пополнил$a ману <Font Color=#006699><b> +$data[deltamana]</b></font> $data[mana] ".($data["effect"]?"и отменил$a действие приёма <b>".$strokes[$data["effect"]]->name."</b>":"");
    } elseif (isset($data["deltamana"]) && $data["mana"]) {
      $res=" вспомнил$a про приём <b>".$strokes[$priem]->name."</b> и пополнил$a ману <Font Color=#006699><b> +$data[deltamana]</b></font> $data[mana]";
    } elseif ($data["hittoff"]) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy], но силовое поле поглотило урон";
    } elseif ($data["damage"] && isset($data["heal"])) {
      $clr=kritcolor($data["krit"]);
      $res=" $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]. <font color=\"$clr\"><b> -$data[damage]</b></font> $data[enhp] и пополнил$a жизнь <Font color=green><b> +$data[heal]</b></font> $data[hp]";
    } elseif ($data["damage"]) {
      $clr=kritcolor($data["krit"]);
      $res=" $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]. <font color=\"$clr\"><b> -$data[damage]</b></font>. $data[enhp]";
    } elseif ($data["manadamage"]) {
      $clr=kritcolor($data["krit"]);
      $res=" $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]. <font color=\"$clr\"><b> -$data[manadamage]</b></font>. $data[enmana]";
    } elseif ($data["selfcast"] && isset($data["heal"])) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\". <Font Color=".kritcolor($data["krit"])."><b> +$data[heal]</b></font> $data[hp]";
    } elseif ($data["strokeonly"] || ($data["selfcast"] && $data["effect"])) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\"";
    } elseif ($data["remeffect"]) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy], ".($data["effect"]?"отменив действие приёма <b>".$strokes[$data["effect"]]->name."</b>":" но безрезультатно").".</b>";
    } elseif ($data["effect"] && $data["enemy"]) {
      if ($data["krit"]==1) $krit=" <font color=red><b>с критическим уроном</b></font>";
      elseif ($data["krit"]==-1) $krit=" <font color=#aaaaaa><b>но допустил$a критический промах</b></font>";
      else $krit="";
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]$krit";
    } elseif (isset($data["heal"])) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]. <font color=".kritcolor($data["krit"])."><b> +$data[heal]</b></font> $data[hp]";
    } elseif ($data["enemy"]) {
      $res=", $action \"<FONT color=#A00000><b>".$strokes[$priem]->name."</b></font>\" на $data[enemy]";
    }
    $fbattle->add_log("$date $data[user] $res ".($data["takenmana"]?" -$data[takenmana] (мана)":"")."<BR>");
    $fbattle->nologhr=1;
  }

  if ($strokes[$priem]->type==4) {
    foreach ($fbattle->battleunits[$user["id"]]["effects"] as $k=>$v) {
      if (@$strokes[$k]->endoncast) {
        $fbattle->remeffect($user["id"], $k);
        $fbattle->logstrokeend($k, $user["id"]);
      }
    }
    if (@$strokes[$priem]->selfcast) $stroketarget=$user["id"];
    $fbattle->solve_mf($user["id"], $stroketarget,0,0,0,0,1);
    $damage=0;
    $heal=0;
    $healrand=0;
    if ($priem=="wis_earth_summon") {
      if ($user["level"]==8) $prot=11117;
      elseif ($user["level"]==9) $prot=11118;
      elseif ($user["level"]==10) $prot=11119;
      else $prot=11120;
      $bot=$fbattle->addbot($prot, $user["id"], "Каменный страж");
      $fbattle->addeffect($bot, LIFE, 1, 0, $priem, array(), 0, $user["level"], 0, 0, $user["id"]);
    }
    if ($fbattle->sameteam($user["id"], $stroketarget)) {
      if (@$strokes[$priem]->healally) {
        $strokes[$priem]->heal=$strokes[$priem]->healally;
        $strokes[$priem]->healrand=@$strokes[$priem]->healallyrand;
      }
    } else {
      if (@$strokes[$priem]->magicdamageenemy) {
        $strokes[$priem]->magicdamage=$strokes[$priem]->magicdamageenemy;
        $strokes[$priem]->damagernd=@$strokes[$priem]->damageenemyrnd;
      }
    }
    if (@$strokes[$priem]->healbylevel)$strokes[$priem]->heal=$strokes[$priem]->healbylevel[$user["level"]];

    if (@$strokes[$priem]->remwait) {
      foreach ($fbattle->battleunits[$user["id"]]["priems"] as $k=>$v) {
        if ($strokes[$k]->damagetype==$strokes[$priem]->damagetype) {
          $fbattle->battleunits[$user["id"]]["priems"][$k]["wait"]=0;
        }
      }
      $fbattle->needupdatebu=1;
      $fbattle->toupdatebu[$user["id"]]["priems"]=1;
    }
    
    if (@$strokes[$priem]->onlyoneatatime) {
      $eff=$fbattle->haseffecttype($user["id"], $strokes[$priem]->effectoncaster);
      if ($eff && ($fbattle->battleunits[$user["id"]]["effects"][$eff]["caster"]!=$stroketarget || $eff!="$priem-oncaster")) {
        $stroke=str_replace("-oncaster", "", $eff);
        $fbattle->getbu($fbattle->battleunits[$user["id"]]["effects"][$eff]["caster"]);
        $fbattle->remeffect($fbattle->battleunits[$user["id"]]["effects"][$eff]["caster"], $stroke);
        $fbattle->logstrokeend($stroke, $user["id"]);
        $fbattle->remeffect($user["id"], $eff);
      }
    }
    

    if (@$strokes[$priem]->magicdamage) {
      if ($strokes[$priem]->magicdamage=="intel") $strokes[$priem]->magicdamage=$user["intel"];
      if ($strokes[$priem]->magicdamage=="hp01") $strokes[$priem]->magicdamage=ceil($fbattle->userdata[$stroketarget]["hp"]*0.1);
      if ($strokes[$priem]->magicdamage=="hp005") $strokes[$priem]->magicdamage=ceil($fbattle->userdata[$stroketarget]["maxhp"]*0.05);
      if ($strokes[$priem]->magicdamage=="targetsila") $strokes[$priem]->magicdamage=$fbattle->battleunits[$stroketarget]["sila"];
      if ($strokes[$priem]->magicdamage=="targeteffect") {
        foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
          if (strpos($k, $strokes[$priem]->targeteffect)===0) {
            $strokes[$priem]->magicdamage=$v["value"]*$strokes[$k]->length;
            break;
          }
        }
      }
      if (@$strokes[$priem]->otherdamage=="targeteffect") {
        foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
          if (strpos($k, $strokes[$priem]->targeteffect)===0) {
            $otherdamage=$strokes[$k]->value*$strokes[$k]->length;
            break;
          }
        }
      } elseif (@$strokes[$priem]->otherdamage) $otherdamage=$strokes[$priem]->otherdamage;
      if ($strokes[$priem]->magicdamage=="effectcnthp1proc") {
        foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
          if (strpos($k, $strokes[$priem]->targeteffect)===0) {
            $strokes[$priem]->magicdamage=$v["cnt"]*$fbattle->userdata[$stroketarget]["maxhp"]*0.01;
            break;
          }
        }
      }
      if ($strokes[$priem]->damagebylevel) $strokes[$priem]->magicdamage=$strokes[$priem]->damagebylevel[$user["level"]];
      if (@$strokes[$priem]->magicdamagemult) {
        $strokes[$priem]->magicdamage*=$strokes[$priem]->magicdamagemult;
        if (@$otherdamage) $otherdamage*=$strokes[$priem]->magicdamagemult;
      }
      $damage=$strokes[$priem]->magicdamage;
      $damagernd=0;
      if ($strokes[$priem]->damagernd=="effectcnthp1proc") {
        foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
          if (strpos($k, $strokes[$priem]->targeteffect)===0) {
            $strokes[$priem]->damagernd=$v["cnt"]*$fbattle->userdata[$stroketarget]["maxhp"]*0.01;
            break;
          }
        }
      }
      if (@$strokes[$priem]->damagernd) $damagernd=$strokes[$priem]->damagernd;
    }    
    if (@$strokes[$priem]->manadamage) {
      $manadamage=$strokes[$priem]->manadamage;
    }    
    if ($strokes[$priem]->heal || $strokes[$priem]->healproc) {
      if ($strokes[$priem]->heal) {
        if ($strokes[$priem]->heal=="targetlevel5") {
          $fbattle->getbu($stroketarget);
          $delta=$fbattle->battleunits[$stroketarget]["level"]*5;
        } else $delta=$strokes[$priem]->heal;
        if ($strokes[$priem]->healself) $healself=$strokes[$priem]->healself;
        $heal+=$delta;
        if (@$strokes[$priem]->healrand) $healrand=$strokes[$priem]->healrand;
      } else {
        $heal=ceil($user["maxhp"]*$strokes[$priem]->healproc/100);
      }
    }
    if (@$strokes[$priem]->deltamana || @$strokes[$priem]->deltamanaproc) {
      if ($strokes[$priem]->deltamana=="effectcnt33") {
        foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
          if (strpos($k, $strokes[$priem]->targeteffect)===0) {
            $strokes[$priem]->deltamana=$v["cnt"]*33;
            break;
          }
        }
      }
      if ($strokes[$priem]->deltamanaproc) $deltamana=ceil($user["maxmana"]*$strokes[$priem]->deltamanaproc/100);
      elseif ($strokes[$priem]->deltamana=="targetlevel10") $deltamana=$fbattle->battleunits[$stroketarget]["level"]*10;
      else $deltamana=$strokes[$priem]->deltamana;
    }
    $logdata=array();
    taketactics($priem);
    $fbattle->actpriem($priem, $igogo->priems[$priem]["id"], $user["id"], 3, 1, 1);

    if (@$strokes[$priem]->losehpproc) {
      $losehp=round($user["maxhp"]*$strokes[$priem]->losehpproc/100);
      $losehp=$fbattle->takehp($losehp, $user["id"], $fbattle->userdata[$user["id"]]["hp"], 0);
      $logdata["deltahp"]=$losehp;
      $logdata["hp"]=$fbattle->loghp($user["id"]);
      //"[ ".$fbattle->userdata[$user["id"]]["hp"]."/".$fbattle->userdata[$user["id"]]["maxhp"]." ]";
    }
    if ($strokes[$priem]->mana) $logdata["takenmana"]=$fbattle->takemana(manausage($priem), $_SESSION["uid"], $strokes[$priem]->damagetype, 1, 1);
    //mq("update users set `mana`= `mana`- ".$strokes[$priem]->mana."   WHERE id='".$_SESSION['uid']."'");
    if ($sortt=='B1') $color_p='B2'; else $color_p='B1';

    $logdata["user"]=$fbattle->nick5($user['id'],$sortt);
    $logdata["sex"]=$user['sex'];
    $logdata["userid"]=$user["id"];
    if ($strokes[$priem]->remeffectfromtarget) {
      $removedeffect=remeffect($stroketarget, $priem, 0, 1);
    }

    if ($heal && $deltamana) {
      $stroketarget1=$stroketarget;
      if (@$strokes[$priem]->healcaster) $stroketarget1=$user["id"];
      else $stroketarget1=$stroketarget;
      if ($healrand) $heal+=rand(0, $healrand);

      $heal=$fbattle->addhp($heal,$stroketarget1,$strokes[$priem]->nospirit);
      if ($strokes[$priem]->selfcast) {
        $logdata["heal"]=$heal;
        $logdata["hp"]=$fbattle->loghp($stroketarget1);
        //"[".$fbattle->userdata[$stroketarget1]["hp"]."/".$fbattle->userdata[$stroketarget1]["maxhp"]."]";
        $logdata["selfcast"]=1;
        $logdata["enemy"]=0;
      } else {
        $logdata["enemy"]=$fbattle->nick5($stroketarget);
        $logdata["target"]=$stroketarget;
        $logdata["heal"]=$heal;
        $logdata["hp"]=$fbattle->loghp($stroketarget1);
        //"[".$fbattle->userdata[$stroketarget1]["hp"]."/".$fbattle->userdata[$stroketarget1]["maxhp"]."]";
        $logdata["selfcast"]=0;
      }
      $user["mana"]-=$strokes[$priem]->mana;
      $newmana=$deltamana+$user["mana"];
      if ($newmana>$user["maxmana"]) $newmana=$user["maxmana"];
      $newmana=floor($newmana);
      $deltamana=$newmana-$user["mana"];
      $fbattle->addmana(floor($deltamana), $user["id"]);
      $logdata["deltamana"]=$deltamana;
      $logdata["mana"]="[$newmana/$user[maxmana]]";
      logstroke($priem, $logdata);
      $user["mana"]+=$strokes[$priem]->mana;
      if (@$strokes[$priem]->effect) $fbattle->addeffect($stroketarget, $strokes[$priem]->effect, @$strokes[$priem]->value, 0, $priem, array(), 0, 0, @$strokes[$priem]->effect2, @$strokes[$priem]->value2);
    } elseif ($deltamana) {
      $newmana=$deltamana+$user["mana"];
      if ($newmana>$user["maxmana"]) $newmana=$user["maxmana"];
      $newmana=floor($newmana);
      $deltamana=$newmana-$user["mana"];
      $fbattle->addmana(floor($deltamana), $_SESSION['uid']);
      //if ($newmana>0) mq("update users set `mana`= ".$newmana."   WHERE id='".$_SESSION['uid']."'");
      //$user['mana']=$newmana;
      $logdata["deltamana"]=$deltamana;
      $logdata["mana"]="[$newmana/$user[maxmana]]";
      if ($strokes[$priem]->remeffectfromcaster) {
        $logdata["remeffect"]=1;
        $logdata["effect"]=remeffect($user["id"], $priem,0);
      }
      logstroke($priem, $logdata);
      if (@$logdata["effect"]) $fbattle->logstrokeend($logdata["effect"], $user["id"]);
    } elseif ($strokes[$priem]->heal && $damage) {
      $anti=getantimagic($stroketarget, $fbattle->battleunits[$stroketarget], $fbattle->battleunits[$stroketarget]["effects"], $strokes[$priem]->damagetype);
      if (!@$strokes[$priem]->noincrease) {
        $damage=getmagiceffect($user["id"],$user["battle"],$damage,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
        if ($damagernd) {
          $damagernd=getmagiceffect($user["id"],$user["battle"],$damagernd,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
        }
      }
      list($skill, $dark)=getmagicskill($strokes[$priem]->damagetype);
      //if (!@$fbattle->enemyhar["level"]) $fbattle->enemyhar["level"]=mqfa1("select level from users where id='".bottouser($_SESSION["enemy"])."'");
      if (!@$strokes[$priem]->nokrit && !@$strokes[$priem]->noincrease) $iskrit=getmagkrit($fbattle->battleunits[$stroketarget]["level"], $skill, $dark);
      else $iskrit=0;

      if ($iskrit!=2 && getchance($anti/250+6)) {
        if ($fbattle->checkmagmiss($user["id"])) {
          $damage=0;
          $logdata["missedshot"]=1;
        } else $logdata["missedshot"]=0;
      } else $logdata["missedshot"]=0;

      $ff["value"]=$fbattle->getforcefield($stroketarget);
      if ($ff["value"]>0 && $iskrit!=2) $iskrit=0;
      if ($iskrit>0) {
        $damage*=2;
        $logdata["krit"]=1;
      } elseif ($iskrit<0) {
        $damage=round($damage*0.5);
        $logdata["krit"]=-1;
      }

      
      $fbattle->getpriems($stroketarget);
      $res=$fbattle->checkpriems2($fbattle->battleunits[$stroketarget]["priems"],$fbattle->en_class,$stroketarget, 0, (@$strokes[$priem]->damageprof?0:1));
      $damage=$fbattle->processstrokeeffect2($res, $damage);

      if ($ff["value"]<$damage) {
        $en["hp"]=$fbattle->userdata[$stroketarget]["hp"];
        $en["maxhp"]=$fbattle->userdata[$stroketarget]["maxhp"];
      }
      $fbattle->checkbackeffects($user["id"], $stroketarget, min(ceil($damage), $fbattle->userdata[$stroketarget]["hp"]), 1);
      $damage=$fbattle->takehp($damage, $stroketarget, $en["hp"], 1, $user["id"]);
      $fbattle->adddamage($fbattle->user["id"], $damage, $stroketarget);
      /*$battle_datamy = mysql_fetch_array(mq ('SELECT damage, exp FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
      $damagemy = unserialize($battle_datamy['damage']);
      $damagemy[$_SESSION['uid']]=$damagemy[$_SESSION['uid']]+$damage;

      $exp=$fbattle->solve_exp ($fbattle->user['id'],$_SESSION['enemy'],$damage);
      $expmy = unserialize($battle_datamy['exp']);
      $expmy[$_SESSION['uid']]=$expmy[$_SESSION['uid']]+$exp;
      $fbattle->damage[$fbattle->user['id']]+=$damage;
      $fbattle->exp[$fbattle->user['id']] +=$exp;
      $fbattle->addhp2($user["id"], $_SESSION["enemy"], $damage);
      mq('UPDATE `battle` SET  `damage` = \''.serialize($damagemy).'\', `exp` = \''.serialize($expmy).'\' WHERE `id` = '.$user['battle'].' ;');*/
      $realdamage=0;
      if ($ff["value"]>=$damage && $ff["value"]>0) {
        $logdata["enemy"]=$fbattle->nick5($stroketarget,$color_p);
        $logdata["target"]=$stroketarget;
        $logdata["hittoff"]=1;
        logstroke($priem, $logdata);
      } else {
        //$damage-=$ff["value"];
        if ($damage<0) $damage=0;
        $hzhz = $en['hp']-$damage;
        if ($hzhz<0) $hzhz=0;
        $realdamage=$en['hp']-$hzhz;

        if ($strokes[$priem]->heal="damage2") {
          $heal=ceil($realdamage/2);
        }
        if ($heal) {
          $heal=$fbattle->addhp($heal,$user["id"],$strokes[$priem]->nospirit);
          $logdata["heal"]=$heal;
        }
        $logdata["enemy"]=$fbattle->nick5($stroketarget,$color_p);
        $logdata["target"]=$stroketarget;
        $logdata["damage"]=$damage;
        $logdata["enhp"]=$fbattle->loghp($stroketarget);
        $logdata["hp"]=$fbattle->loghp($user["id"]);
        //"[".$fbattle->userdata[$user["id"]]["hp"]."/".$fbattle->userdata[$user["id"]]["maxhp"]."]";
        logstroke($priem, $logdata);
      }
      $fbattle->enemyhar["hp"]-=$damage;    
      $fbattle->addmagstorm($stroketarget);
    } elseif ($heal) {
      $targets=$fbattle->gettargets($priem, $stroketarget);
      $heal0=$heal;
      if (!@$healself) $healself=$heal;
      list($skill, $dark)=getmagicskill($strokes[$priem]->damagetype);
      foreach ($targets as $k=>$stroketarget) {
        if ($stroketarget==$user["id"]) $heal=$healself;
        else $heal=$heal0;
        if ($healrand) $heal+=rand(0, $healrand);
        if (!@$strokes[$priem]->noincrease) {
          $anti=getantimagic($stroketarget, $fbattle->battleunits[$stroketarget], $fbattle->battleunits[$stroketarget]["effects"], $strokes[$priem]->damagetype);
          $heal=getmagiceffect($user["id"],$user["battle"],$heal,$fbattle->battleunits[$fbattle->user["id"]]["intel"], $anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
          if ($stroketarget==$_SESSION["uid"] && @$strokes[$priem]->selfmult) $heal=ceil($heal*$strokes[$priem]->selfmult);
        }
        /*if ($stroketarget > _BOTSEPARATOR_){
          //$bots = mysql_fetch_array(mq ('SELECT `hp`, prototype FROM `bots` WHERE `id` = '.$stroketarget.' LIMIT 1;'));
          //$en['hp'] = $bots['hp'];
          //$en['maxhp'] = $fbattle->userdata[$stroketarget]["maxhp"];//mqfa1("select maxhp from users where id='$bots[prototype]'");
          $en=$fbattle->userdata[$stroketarget];
          $newhp = $en['hp']+$heal;
          if($newhp>$en['maxhp']){
            $heal1=$en["hp"]-$en['maxhp'];
            $newhp=$en['maxhp'];
          } else $heal1=$heal;
          //mq("update bots set `hp`= $newhp WHERE id='".$stroketarget."'");
        } else {
          //$en = mysql_fetch_array(mq ('SELECT `hp`,`maxhp` FROM `users` WHERE `id` = '.$stroketarget.' LIMIT 1;'));
          $en=$fbattle->userdata[$stroketarget];
          $newhp = $en['hp']+$heal;
          if($newhp>$en['maxhp']) {
            $newhp=$en['maxhp'];
            $heal1=$en['maxhp']-$en["hp"];
          } else {
            $heal1=$heal;
          }
          //mq("update users set `hp`= $newhp   WHERE id='".$stroketarget."'");
        }*/
        if (!@$strokes[$priem]->nokrit && !@$strokes[$priem]->noincrease) $iskrit=getmagkrit($fbattle->battleunits[$stroketarget]["level"], $skill, $dark);
        else $iskrit=0;
        if ($iskrit>0) {
          $heal*=2;
          $logdata["krit"]=1;
        } elseif ($iskrit<0) {
          $heal=round($heal*0.5);
          $logdata["krit"]=-1;
        } else $logdata["krit"]=0;
        $heal=$fbattle->addhp($heal,$stroketarget,$strokes[$priem]->nospirit);
        if ($strokes[$priem]->selfcast) {
          $logdata["heal"]=$heal;
          $logdata["hp"]=$fbattle->loghp($stroketarget);
          //"[".$fbattle->userdata[$stroketarget]["hp"]."/".$fbattle->userdata[$stroketarget]["maxhp"]."]";
          $logdata["selfcast"]=1;
          $logdata["enemy"]=0;
          logstroke($priem, $logdata);
        } else {
          $logdata["enemy"]=$fbattle->nick5($stroketarget,$sortt);
          $logdata["target"]=$stroketarget;
          $logdata["heal"]=$heal;
          $logdata["hp"]=$fbattle->loghp($stroketarget);
          //"[".$fbattle->userdata[$stroketarget]["hp"]."/".$fbattle->userdata[$stroketarget]["maxhp"]."]";
          $logdata["selfcast"]=0;
          logstroke($priem, $logdata);
        }
        
        if (@$strokes[$priem]->effect) {
          $val=$strokes[$priem]->value;
          if (@$strokes[$priem]->effectrand) {
            if ($strokes[$priem]->effectrand=="air10") $rnd=$fbattle->battleunits[$user["id"]]["mair"]*10;
            else $rnd=$strokes[$priem]->effectrand;
            $val+=rand(0, $rnd);
          }
          if ($val=="halfhealed") $val=round($heal/2/$strokes[$priem]->length);
          $val2=0;
          $val3=0;
          $fbattle->addeffect($stroketarget, $strokes[$priem]->effect, $val, 0, $priem, array(), 0, (int)@$strokes[$priem]->manaamove, @$strokes[$priem]->effect2, $val2, $stroketarget, @$strokes[$priem]->effect3, $val3);
        }

        if ($stroketarget!=$user["id"]) {
          $mult=1;
          if (in_array($user["room"], $canalrooms) || in_array($user["room"], $caverooms)) $mult=0.2;
          $fbattle->exp[$user["id"]]+=$fbattle->solve_exp($user["id"],$stroketarget,$heal/3)*$mult;
        }
      }
    } elseif ($manadamage || $damage || @$strokes[$priem]->effect) {
      $dark=0;
      list($skill, $dark)=getmagicskill($strokes[$priem]->damagetype, @$strokes[$priem]->effect);
      
      //if (!@$fbattle->enemyhar["level"]) $fbattle->enemyhar["level"]=mqfa1("select level from users where id='".bottouser($_SESSION["enemy"])."'");

      if (!@$strokes[$priem]->noincrease && !@$strokes[$priem]->nokrit) $iskrit=getmagkrit($fbattle->battleunits[$stroketarget]["level"], $skill, $dark);
      else $iskrit=0;

      if (@$strokes[$priem]->effect) {
        $val=$strokes[$priem]->value;
        if (@$strokes[$priem]->effectrand) {
          if ($strokes[$priem]->effectrand=="air10") $rnd=$fbattle->battleunits[$user["id"]]["mair"]*10;
          else $rnd=$strokes[$priem]->effectrand;
          $val+=rand(0, $rnd);
        }
        if ($val=="hp01") $val=ceil($user["maxhp"]*0.1/$strokes[$priem]->length);
                                     
        if ($val=="mana33") $val=round($user["maxmana"]*0.33);

        if ($val=="level2") $val=$user["level"]*2;

        if (@$strokes[$priem]->value2) $val2=$strokes[$priem]->value2; else $val2=0;
        if ($val2 && $val2=="mana33") $val2=round($user["maxmana"]*0.33);

        if (@$strokes[$priem]->value3) $val3=$strokes[$priem]->value3; else $val3=0;
        if ($val3 && $val3=="mana33") $val3=round($user["maxmana"]*0.33);

        if (@$strokes[$priem]->target=="ally" || @$strokes[$priem]->selfcast || $strokes[$priem]->effect==MINUSFIREDEF || @$strokes[$priem]->noincrease) $iskrit=0;
        if ($iskrit>0) {
          $logdata["krit"]=1;
        } elseif ($iskrit<0) {
          $logdata["krit"]=-1;
        }
        if ($iskrit>0) {
          $val*=2;
          $val2*=2;
          $val3*=2;
        }
        if ($iskrit<0) {
          $val=round($val*0.5);
          $val2=round($val2*0.5);
          $val3=round($val3*0.5);
        }

        if (!@$strokes[$priem]->noincrease) {
          $anti=getantimagic($stroketarget, $fbattle->battleunits[$stroketarget], $fbattle->battleunits[$stroketarget]["effects"], $strokes[$priem]->damagetype);
          //if (@$strokes[$priem]->target=="ally" || @$strokes[$priem]->selfcast) $anti=0;
          $val=getmagiceffect($user["id"],$user["battle"],$val,$fbattle->battleunits[$fbattle->user["id"]]["intel"], $anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
          if (@$strokes[$priem]->valuernd) $valrnd=getmagiceffect($user["id"],$user["battle"], $strokes[$priem]->valuernd,$fbattle->battleunits[$fbattle->user["id"]]["intel"], $anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
          if ($val2) $val2=getmagiceffect($user["id"],$user["battle"],$val2,$fbattle->battleunits[$fbattle->user["id"]]["intel"], $anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
          if ($val3) $val3=getmagiceffect($user["id"],$user["battle"],$val3,$fbattle->battleunits[$fbattle->user["id"]]["intel"], $anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
        }
        if ($damage>0) $logit=0; else $logit=1;
        if (@$strokes[$priem]->effecton1) $targets=array($stroketarget);
        else $targets=$fbattle->gettargets($priem, $stroketarget);
        $i=0;
        $val1=$val;

        while ($i<count($targets)) {
          $val=$val1;
          if ($valrnd) $val+=rand(0, $valrnd);
          if ($strokes[$priem]->selfcast) {
            $fbattle->addeffect($user["id"], $strokes[$priem]->effect, $val, $iskrit, $priem, $logdata, $logit, (int)@$strokes[$priem]->manaamove, @$strokes[$priem]->effect2, $val2, $user["id"], @$strokes[$priem]->effect3, $val3);
          } else {
            //if ($i==0) $target=$stroketarget;
            //else
            $target=$targets[$i];
            //echo "--$target ($i)--<br>";
            $fbattle->addeffect($target, $strokes[$priem]->effect, $val, $iskrit, $priem, $logdata, $logit, (int)@$strokes[$priem]->manaamove, @$strokes[$priem]->effect2, $val2, $user["id"], @$strokes[$priem]->effect3, $val3);
          }
          if (@$strokes[$priem]->effectoncaster) $fbattle->addeffect($user["id"], $strokes[$priem]->effectoncaster, 1, 0, "$priem-oncaster", array(), 0, 0, 0, 0, $target);

          if (($strokes[$priem]->effect==FIREDAMAGE || $strokes[$priem]->effect==AIRDAMAGE || $strokes[$priem]->effect==WATERDAMAGE
          || $strokes[$priem]->effect==EARTHDAMAGE || $strokes[$priem]->effect==LIGHTDAMAGE || $strokes[$priem]->effect==DARKDAMAGE
           || $strokes[$priem]->effect==GRAYDAMAGE || $strokes[$priem]->effect==DELAYEDDAMAGE) && !$damage) $fbattle->addmagstorm($target);
          $i++;
        }
      }
      if (@$strokes[$priem]->deltamf) {
        mq("update battleunits set ".$strokes[$priem]->mf."=".$strokes[$priem]->mf."+".$strokes[$priem]->deltamf." ".(@$strokes[$priem]->deltamf2?", ".$strokes[$priem]->mf2."=".$strokes[$priem]->mf2."+".$strokes[$priem]->deltamf2:"")." ".(@$strokes[$priem]->deltamf3?", ".$strokes[$priem]->mf3."=".$strokes[$priem]->mf3."+".$strokes[$priem]->deltamf3:"")." where user=".$_SESSION['uid']." and battle='$user[battle]'");
      }
      if ($damage) {
        $target1=$stroketarget;
        $targets=$fbattle->gettargets($priem, $stroketarget);
        $damage1=$damage;
        $damagernd1=$damagernd;
        $iskrit1=$iskrit;
        if ($strokes[$priem]->maxdamage=="level10") $strokes[$priem]->maxdamage=$user["level"]*10;
        if (@$strokes[$priem]->maxdamagebylevel) {
          $strokes[$priem]->maxdamage=$strokes[$priem]->maxdamagebylevel[$user["level"]];
        }
        foreach ($targets as $k=>$stroketarget) {
          if (@$otherdamage && $stroketarget!=$target1) {
            $damage=$otherdamage;
            $noinc=@$strokes[$priem]->nootherincrease;
          } else {
            $damage=$damage1;
            $noinc=@$strokes[$priem]->noincrease;
          }
          $damagernd=$damagernd1;
          $fbattle->getbu($stroketarget);
          $anti=getantimagic($stroketarget, $fbattle->battleunits[$stroketarget], $fbattle->battleunits[$stroketarget]["effects"], $strokes[$priem]->damagetype);
          if (!$noinc) {
            $damage=getmagiceffect($user["id"],$user["battle"],$damage,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
            $logdata["magp"]=$mfmagp;
            $logdata["minusmfdmag"]=$minusmfdmag;
            $logdata["mfdmag"]=$mfdmag;
            if ($damagernd) {
              $damagernd=getmagiceffect($user["id"],$user["battle"],$damagernd,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
            }
          }
          if ($damagernd) $damage+=rand(0, $damagernd);
          if (@$strokes[$priem]->multbyeffectiflt33 && $fbattle->userdata[$stroketarget]["hp"]<$fbattle->userdata[$stroketarget]["maxhp"]*0.33) {
            $damage=$damage*($strokes[$priem]->multbyeffectiflt33*$fbattle->haseffect($stroketarget, $strokes[$priem]->targeteffect)+1);
          }
          $iskrit=$iskrit1;

          if ($iskrit!=2 && getchance($anti/250+6)) {
            if ($fbattle->checkmagmiss($user["id"])) {
              $damage=0;
              $logdata["missedshot"]=1;
            } else $logdata["missedshot"]=0;
          } else $logdata["missedshot"]=0;
          
          if (!$logdata["missedshot"]) {
            if (@$strokes[$priem]->remmarks) {
              if ($strokes[$priem]->damagetype==FIREDAMAGE) $mark="wis_fire_mark";
              if ($strokes[$priem]->damagetype==AIRDAMAGE) $mark="wis_air_mark";
              if ($strokes[$priem]->damagetype==EARTHDAMAGE) $mark="wis_earth_mark";
              if ($strokes[$priem]->damagetype==WATERDAMAGE) $mark="wis_water_mark";
              $e=$fbattle->haseffect($stroketarget, $mark);
              if ($e) {
                $fbattle->remeffect($stroketarget, $mark, array());
                $fbattle->logstrokeend($mark, $stroketarget);
              }
            }
          }


          $ff["value"]=$fbattle->getforcefield($stroketarget);
          if ($ff["value"]>0 && $iskrit!=2) $iskrit=0;
          if ($iskrit>0) {
            $logdata["krit"]=1;
          } elseif ($iskrit<0) {
            $logdata["krit"]=-1;
          }
          if (@$strokes[$priem]->maxdamage && $damage>$strokes[$priem]->maxdamage) $damage=$strokes[$priem]->maxdamage;

          if ($iskrit>0) $damage*=2;
          if ($iskrit<0) $damage=round($damage*0.5);

          
          $fbattle->getpriems($stroketarget);
          $res=$fbattle->checkpriems2($fbattle->battleunits[$stroketarget]["priems"],$fbattle->en_class,$stroketarget, 0, (@$strokes[$priem]->damageprof?0:1));
          $damage=$fbattle->processstrokeeffect2($res, $damage);


          if ($ff["value"]<$damage) {
            //if ($stroketarget > _BOTSEPARATOR_){
              //$bots = mysql_fetch_array(mq ('SELECT `hp`, prototype FROM `bots` WHERE `id` = '.$_SESSION['enemy'].' LIMIT 1;'));
              //$en['hp'] = $bots['hp'];
              //$en['maxhp'] = mqfa1("select maxhp from users where id='$bots[prototype]'");
            //} else {
              //$en = mysql_fetch_array(mq ('SELECT `hp`,`maxhp` FROM `users` WHERE `id` = '.$_SESSION['enemy'].' LIMIT 1;'));
            //}
            $en["hp"]=$fbattle->userdata[$stroketarget]["hp"];
            $en["maxhp"]=$fbattle->userdata[$stroketarget]["maxhp"];
          }
          $damage=$fbattle->takehp($damage, $stroketarget, $en["hp"], 1, $user["id"]);
          $fbattle->checkbackeffects($user["id"], $stroketarget, $damage, 1);
          $fbattle->adddamage($fbattle->user["id"], $damage, $stroketarget);
          
          /*$battle_datamy = mysql_fetch_array(mq ('SELECT damage, exp FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
          $damagemy = unserialize($battle_datamy['damage']);
          $damagemy[$_SESSION['uid']]=$damagemy[$_SESSION['uid']]+$damage;

          $exp=$fbattle->solve_exp ($fbattle->user['id'],$stroketarget,$damage);
          
          $expmy = unserialize($battle_datamy['exp']);
          $expmy[$_SESSION['uid']]=$expmy[$_SESSION['uid']]+$exp;
          $fbattle->damage[$fbattle->user['id']]+=$damage;
          $fbattle->exp[$fbattle->user['id']] +=$exp;
          $fbattle->addhp2($user["id"], $_SESSION["enemy"], $damage);
          mq('UPDATE `battle` SET  `damage` = \''.serialize($damagemy).'\', `exp` = \''.serialize($expmy).'\' WHERE `id` = '.$user['battle'].' ;');*/

          if ($ff["value"]>=$damage) {
            $logdata["enemy"]=$fbattle->nick5($stroketarget,$color_p);
            $logdata["target"]=$stroketarget;
            $logdata["hittoff"]=1;
            logstroke($priem, $logdata);
          } else {
            $logdata["hittoff"]=0;
            $damage-=$ff["value"];
            if ($damage<0) $damage=0;
            $hzhz = $en['hp']-$damage;
            if ($hzhz<0) $hzhz=0;
            if ($iskrit>0) $logdata["krit"]=1;
            elseif ($iskrit<0) $logdata["krit"]=-1;
            $logdata["damage"]=$damage;
            $logdata["enemy"]=$fbattle->nick5($stroketarget,$color_p);
            $logdata["target"]=$stroketarget;
            $logdata["enhp"]=$fbattle->loghp($stroketarget);
            //"[$hzhz/$en[maxhp]]";
            logstroke($priem, $logdata);
            $fbattle->enemyhar["hp"]-=$damage;
            if ($damage && $strokes[$priem]->damagetype==WATERDAMAGE && $fbattle->haseffecttype($user["id"], WATERDMGTOMANA)) {
              $eff=$fbattle->haseffecttype($user["id"], WATERDMGTOMANA);
              $addedmana=$fbattle->addmana(floor($damage/2), $user["id"]);
              if ($addedmana) $fbattle->addlog2($fbattle->battle_data["id"], $fbattle->my_class, $user["id"], "healmana", $addedmana, $fbattle->userdata[$user["id"]]["mana"], $fbattle->userdata[$user["id"]]["maxmana"], $eff);
            }
          }
          $logdata["takenmana"]=0;
          $fbattle->addmagstorm($stroketarget);
          if (@$strokes[$priem]->hascharge) {
            if ($fbattle->haseffecttype($stroketarget, STATICS)) {
              $fbattle->addeffect($stroketarget, CHARGE, 1, 0, "wis_air_charged", array(), 0);
            }
          }
        }
      }
      if ($manadamage) {
        $targets=$fbattle->gettargets($priem, $stroketarget);
        $manadamage1=$manadamage;
        $manadamagernd1=$manadamagernd;
        $iskrit1=$iskrit;
        foreach ($targets as $k=>$stroketarget) {
          $manadamage=$manadamage1;
          $manadamagernd=$manadamagernd1;
          $fbattle->getbu($stroketarget);
          if (!@$strokes[$priem]->noincrease) {
            $anti=getantimagic($stroketarget, $fbattle->battleunits[$stroketarget], $fbattle->battleunits[$stroketarget]["effects"], $strokes[$priem]->damagetype);
            $manadamage=getmagiceffect($user["id"],$user["battle"],$manadamage,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
            if ($manadamagernd) {
              $manadamagernd=getmagiceffect($user["id"],$user["battle"],$manadamagernd,$fbattle->battleunits[$fbattle->user["id"]]["intel"],$anti, $strokes[$priem]->damagetype, $stroketarget, $priem);
            }
          }
          if ($manadamagernd) $manadamage+=rand(0, $manadamagernd);
          if (@$strokes[$priem]->maxmanadamage && $manadamage>$strokes[$priem]->maxmanadamage) $manadamage=$strokes[$priem]->maxmanadamage;
          $iskrit=$iskrit1;
          
          $ff["value"]=$fbattle->getforcefield($stroketarget);
          if ($ff["value"]>0 && $iskrit!=2) $iskrit=0;
          if ($iskrit>0) {
            $logdata["krit"]=1;
          } elseif ($iskrit<0) {
            $logdata["krit"]=-1;
          }
          if ($iskrit>0) $damage*=2;
          if ($iskrit<0) $damage=round($damage*0.5);
          
          $fbattle->getpriems($stroketarget);
          $res=$fbattle->checkpriems2($fbattle->battleunits[$stroketarget]["priems"],$fbattle->en_class,$stroketarget, 0, 1);
          $manadamage=$fbattle->processstrokeeffect2($res, $manadamage);
          
          $en=mqfa("select mana, maxmana from users where id='$stroketarget'");

          $fbattle->takemana(min($manadamage, $en["mana"]), $stroketarget, 0, 0);

          $hzhz = $en['mana']-$manadamage;
          $en["mana"]-=$manadamage;

          if ($hzhz<0) $hzhz=0;
          if ($iskrit>0) $logdata["krit"]=1;
          elseif ($iskrit<0) $logdata["krit"]=-1;
          $logdata["manadamage"]=$manadamage;
          $logdata["enemy"]=$fbattle->nick5($stroketarget,$color_p);
          $logdata["target"]=$stroketarget;
          $logdata["enmana"]="[$hzhz/$en[maxmana]]";
          logstroke($priem, $logdata);
          $fbattle->enemyhar["mana"]-=$manadamage;
          $fbattle->addmagstorm($stroketarget);
        }
      }
    } elseif ($strokes[$priem]->remeffect) {
      $logdata["enemy"]=$fbattle->nick5($stroketarget,$sortt);
      $logdata["target"]=$stroketarget;
      $logdata["remeffect"]=1;
      $logdata["effect"]=remeffect($stroketarget, $priem,0);
      logstroke($priem, $logdata);
    } elseif ($strokes[$priem]->remeffectfromtarget && $strokes[$priem]->shocklastused) {
      $logdata["enemy"]=$fbattle->nick5($stroketarget,$sortt);
      $logdata["target"]=$stroketarget;
      if ($removedeffect) {
        $logdata["remeffect"]=1;
        $logdata["effect"]=$removedeffect;
      }
      logstroke($priem, $logdata);
    } else {
      $logdata["strokeonly"]=1;
      logstroke($priem, $logdata);
    }
    if (@$strokes[$priem]->immunity) {
      $fbattle->addimmunity($stroketarget, $priem);
    }
    if (@$strokes[$priem]->move) {
      $eff=$fbattle->haseffecttype($fbattle->user["id"], NOCASTMOVE);
      if ($fbattle->battleunits[$fbattle->user["id"]]["casts"]%10==0 && !$eff) {
        $_POST['attack']=665;
        $_POST['defend']=665;
        $_POST['attack1']=665;
        $_POST['attack2']=665;
        $_POST['attack3']=665;
        $_POST['attack4']=665;
        $_POST['enemy']=$fbattle->enemy;
        $emptyhit=1;
        $fbattle->toupdatebu[$fbattle->user["id"]]["casts"]=$fbattle->battleunits[$fbattle->user["id"]]["casts"]/10+$fbattle->battleunits[$fbattle->user["id"]]["casts"];
        $fbattle->needupdatebu=1;
      } else {
        if ($eff) {
          $fbattle->logstrokeend($eff, $fbattle->user["id"]);
          $fbattle->remeffect($fbattle->user["id"], $eff, NOCASTMOVE);
        } else {
          $fbattle->toupdatebu[$fbattle->user["id"]]["casts"]=$fbattle->battleunits[$fbattle->user["id"]]["casts"]-1;
          $fbattle->needupdatebu=1;
        }
      }
    }
    if ($strokes[$priem]->shocklastused) {
      $fbattle->getbu($stroketarget);
      $ds=$fbattle->getdeltastun($stroketarget);
      if ($fbattle->battleunits[$stroketarget]["laststroke"]) {
        if ($strokes[$priem]->shocklastused=="effectcnt") $tmp=$fbattle->haseffect($stroketarget, $strokes[$priem]->targeteffect);
        else $tmp=$strokes[$priem]->shocklastused;
        $fbattle->shockpriem($fbattle->battleunits[$stroketarget]["laststroke"], $stroketarget, $tmp-$ds);
      }
    }
  } elseif ($strokes[$priem]->type==3) {
    if (@$strokes[$priem]->selfcast) $stroketarget=$user["id"];
    if ($priem=="multi_rollback") {
      $roll=-$fbattle->battleunits[$user["id"]]["additdata"]["damage"][0];
      $fbattle->battleunits[$u]["additdata"]["damage"][0]=$fbattle->battleunits[$u]["additdata"]["damage"][1];
      $fbattle->battleunits[$u]["additdata"]["damage"][1]=$fbattle->battleunits[$u]["additdata"]["damage"][2];
      if ($roll>0) $fbattle->addhp($roll, $user["id"], 1, 1);
      else $fbattle->takehp(-$roll, $user["id"], $fbattle->userdata[$user["id"]]["hp"], 0, 0, 1);
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> Кроличья лапка, подкова в перчатке и прием <b>"'.$strokes[$priem]->name.'"</b> помогли '.$fbattle->nick5($user['id'],$sortt).' продержаться ещё немного <font color=#006699><b>'.plusorminus($roll).'</b></font> ['.$fbattle->userdata[$user["id"]]["hp"]."/".$fbattle->userdata[$user["id"]]["maxhp"].'].<BR>');
    } elseif (@$strokes[$priem]->deltahp || @$strokes[$priem]->deltahplevel) {
      if ($strokes[$priem]->deltahp=="usetactics") {
        $hp=min(25, $fbattle->battleunits[$user["id"]]["additdata"]["hp2"]/2+
        $fbattle->battleunits[$user["id"]]["additdata"]["hit"]+
        $fbattle->battleunits[$user["id"]]["additdata"]["krit"]+
        $fbattle->battleunits[$user["id"]]["additdata"]["block2"]+
        $fbattle->battleunits[$user["id"]]["additdata"]["parry"]+
        $fbattle->battleunits[$user["id"]]["additdata"]["counter"]);
        $heal=ceil($fbattle->userdata[$user["id"]]["maxhp"]*$hp/100);
      } else {
        $heal=$strokes[$priem]->deltahp;
      }
      $heal+=$strokes[$priem]->deltahplevel*$user["level"];
      if ($strokes[$priem]->deltahprand) $heal+=rand(0,$strokes[$priem]->deltahprand);
      if ($priem=="hit_willpower" && $user['hp'] < $user['maxhp']*0.33 ) $heal=ceil($heal*=1.25);
      $heal=$fbattle->addhp($heal,$user["id"],$strokes[$priem]->nospirit);
      $logdata["deltahp"]=$heal;
      $fbattle->logstroke($user["id"], $priem, $logdata);
    } elseif ($strokes[$priem]->minushp) {
      if ($strokes[$priem]->minushp=="max10") $minushp=round($user["maxhp"]/10);
      if($obnhp<0) $obnhp=0;
      $fbattle->takehp($minushp,$user["id"],$user["hp"], 0, $user["id"]);
      $obnhp = $user['hp']-$minushp;
      $user['hp']=$user['hp']-$minushp;
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).' героически использовал'.($user["sex"]?"":"а").' прием <b>"'.$strokes[$priem]->name.'"</b>.<Font Color=#006699><b> -'.$minushp.'</b></font> ['.$obnhp.'/'.$user["maxhp"].']<BR>');
    } elseif ($strokes[$priem]->teambron) {
      $cond="0";
      $t=$strokes[$priem]->teambron;
      foreach ($fbattle->team_mine as $k=>$v) $cond.=" or user='$v' ";
      mq("update battleunits set bron1=bron1+$t, bronmin1=bronmin1+$t, bron2=bron2+$t, bronmin2=bronmin2+$t, bron3=bron3+$t, bronmin3=bronmin3+$t, bron4=bron4+$t, bronmin4=bronmin4+$t, bron5=bron5+$t, bronmin5=bronmin5+$t where battle='$user[battle]' and ($cond)");
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> Кроличья лапка, подкова в перчатке и прием <b>"'.$strokes[$priem]->name.'"</b> помогли '.$fbattle->nick5($user['id'],$sortt).' продержаться ещё немного.<BR>');
    } elseif ($strokes[$priem]->teamdamage) {
      $cond="0";
      $t=$strokes[$priem]->teamdamage;
      foreach ($fbattle->team_mine as $k=>$v) $cond.=" or user='$v' ";
      mq("update battleunits set minu=minu+$t, maxu=maxu+$t where battle='$user[battle]' and ($cond)");
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> Кроличья лапка, подкова в перчатке и прием <b>"'.$strokes[$priem]->name.'"</b> помогли '.$fbattle->nick5($user['id'],$sortt).' продержаться ещё немного.<BR>');
    } elseif ($strokes[$priem]->blockchanges) {
      if($user['sex'] == 1) {
        addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применил прием <b>"'.$strokes[$priem]->name.'"</b> на '.$fbattle->nick5($_SESSION['enemy'],$color_p).'.<BR>');
      } else {
        addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применила прием <b>"'.$strokes[$priem]->name.'"</b> на '.$fbattle->nick5($_SESSION['enemy'],$color_p).'.<BR>');
      }
      $fbattle->toupdatebu[$_SESSION['enemy']]["changes"]=0;
      $fbattle->needupdatebu=1;
    } elseif ($strokes[$priem]->remeffect) {
      $tmp=remeffect($user["id"], $priem);
      if (!$tmp) {
        $strokefailed=1;
        $report="Нет подходящего эффекта.";
      }
    } elseif ($strokes[$priem]->deltamf && !@$strokes[$priem]->effect) {
      mq("update battleunits set ".$strokes[$priem]->mf."=".$strokes[$priem]->mf."+".$strokes[$priem]->deltamf." ".(@$strokes[$priem]->deltamf2?", ".$strokes[$priem]->mf2."=".$strokes[$priem]->mf2."+".$strokes[$priem]->deltamf2:"")." ".(@$strokes[$priem]->deltamf3?", ".$strokes[$priem]->mf3."=".$strokes[$priem]->mf3."+".$strokes[$priem]->deltamf3:"")." where user=".$_SESSION['uid']." and battle='$user[battle]'");
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> Кроличья лапка, подкова в перчатке и прием <b>"'.$strokes[$priem]->name.'"</b> помогли '.$fbattle->nick5($user['id'],$sortt).' продержаться ещё немного.<BR>');
    } elseif (@$strokes[$priem]->effect==EXTRAMF || @$strokes[$priem]->effect==EXTRADAMAGE || @$strokes[$priem]->effect==DAMAGEMULT || @$strokes[$priem]->effect==HEAL || @$strokes[$priem]->effect==PROFDAMAGEMULT || @$strokes[$priem]->effect==FIREDEF || @$strokes[$priem]->effect==WATERDEF ||  @$strokes[$priem]->effect==AIRDEF || @$strokes[$priem]->effect==EARTHDEF || @$strokes[$priem]->effect==MAGICDEF || @$strokes[$priem]->effect==INCWEAPDAMAGE) {
      $fbattle->addeffect($user["id"], $strokes[$priem]->effect, $strokes[$priem]->value, 0, $priem, $logdata, 0, 0, @$strokes[$priem]->effect2, @$strokes[$priem]->value2, $user["id"], @$strokes[$priem]->effect3, @$strokes[$priem]->value3);
      addlog($user['battle'],'<span class=date>'.date("H:i").'</span> Кроличья лапка, подкова в перчатке и прием <b>"'.$strokes[$priem]->name.'"</b> помогли '.$fbattle->nick5($user['id'],$sortt).' продержаться ещё немного.<BR>');
    } elseif (@$strokes[$priem]->effect) {
      if ($fbattle->addeffect($stroketarget, $strokes[$priem]->effect, $strokes[$priem]->value, 0, $priem, $logdata, 0, 0, @$strokes[$priem]->effect2, @$strokes[$priem]->value2)) {
        if (!@$strokes[$priem]->nolog) {
          if($user['sex'] == 1) {
            addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применил прием <b>"'.$strokes[$priem]->name.'"</b> на '.$fbattle->nick5($stroketarget,$color_p).'.<BR>');
          } else {
            addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$sortt).', вспомнив слова своего сэнсея, из последних сил применила прием <b>"'.$strokes[$priem]->name.'"</b> на '.$fbattle->nick5($stroketarget,$color_p).'.<BR>');
          }
        }
      } else $strokefailed=1;
      if ($strokes[$priem]->deltamf) mq("update battleunits set ".$strokes[$priem]->mf."=".$strokes[$priem]->mf."+".$strokes[$priem]->deltamf." ".(@$strokes[$priem]->deltamf2?", ".$strokes[$priem]->mf2."=".$strokes[$priem]->mf2."+".$strokes[$priem]->deltamf2:"")." ".(@$strokes[$priem]->deltamf3?", ".$strokes[$priem]->mf3."=".$strokes[$priem]->mf3."+".$strokes[$priem]->deltamf3:"")." where user=".$_SESSION['uid']." and battle='$user[battle]'");
    }
    if (@$strokes[$priem]->plushits) {
      $fbattle->addtactic($user['id'], "hit", $strokes[$priem]->plushits, 0, 1);
      //$fbattle->toupdate[$user['id']]["hit"]+=$strokes[$priem]->plushits;
      //$fbattle->needupdate=1;
    }

    /*if (@$strokes[$priem]->effect2) {
      if ($strokes[$priem]->value2=="hp0025") $v=ceil($user["maxhp"]*0.025);
      else $v=$strokes[$priem]->value2;
      mq("insert into battleeffects set battle='$user[battle]', user='$user[id]', effect='".$strokes[$priem]->effect2."', value='".$v."', length=".$strokes[$priem]->length.", priem='$priem'");
    }*/
    if (!@$strokefailed) {
      taketactics($priem);
      if (@$strokes[$priem]->actto2) $act=2;
      else $act=(@$strokes[$priem]->actastarget?$stroketarget:3);
      $fbattle->actpriem($priem, $igogo->priems[$priem]["id"], $user["id"], $act, 1, 1);
    }
  } else {
    $fbattle->actpriem($priem, $igogo->priems[$priem]["id"], $user["id"], 2, 0, 1);
    taketactics($priem);
  }
  if (@$target1) $stroketarget=$target1;
  if (@$strokes[$priem]->remtargeteffect) {
    foreach ($fbattle->battleunits[$stroketarget]["effects"] as $k=>$v) {
      if (strpos($k, $strokes[$priem]->targeteffect)===0) {
        $fbattle->remeffect($stroketarget, $k);
        $fbattle->logstrokeend($k, $stroketarget);
      }
    }
  }
}
unset($fbattle->enemyhar);
unset($fbattle->enemy_dress);
?>