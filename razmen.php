<?php
  $this->getbu($this->user['id']);
  
  //выставляем раунд для астрала
  if ($this->battleunits[$this->user['id']]["extra"]["ele"]) mq('UPDATE users SET `udar` = `udar` + 1 WHERE `id` = '.$this->user['id'].'');

  $sumwear=$this->battleunits[$this->user["id"]]["weapons"];
  if ($sumwear<5) {
    $attack4=0;
  }
  if ($sumwear<4) {
    $attack3=0;
  }
  if ($sumwear<3) {
    $attack2=0;
  }
  if ($sumwear<2) {
    $attack1=0;
  }
  $attack4=rightattack($attack4);
  $attack3=rightattack($attack3);
  $attack2=rightattack($attack2);
  $attack1=rightattack($attack1);
  $attack=rightattack($attack);
  $defend=rightattack($defend);

  if ($attack==664) $ebota=1;

  if($sumwear==1){
    if ($attack>0) $ebota=1;
  } elseif ($sumwear==2){
    if ($attack>0 && $attack1>0) $ebota=1;
  } elseif ($sumwear==3){
    if ($attack>0 && $attack1>0 && $attack2>0) $ebota=1;
  } elseif ($sumwear==4){
    if ($attack>0 && $attack1>0 && $attack2>0 && $attack3>0) $ebota=1;
  } elseif ($sumwear==5){
    if ($attack>0 && $attack1>0 && $attack2>0 && $attack3>0 && $attack4>0) $ebota=1;
  }
  global $strokes;

// проверяем прафильность
if($defend && $ebota==1 && $enemy && $this->user['hp']>0) {
  if (!isset($this->battle[$enemy][$this->user['id']])) {
    $this->battle[$enemy][$this->user['id']]=array(0,0,0);
    $this->needupdate=1;
  }
  if ($this->battle[$enemy][$this->user['id']][0] > 0) {
    $this->getbu($enemy);

    //$this->userpriems=$this->getpriems($this->user['id']);
    //$this->enemypriems=$this->getpriems($enemy);


    //$this->enemy_hasshit=$this->checkshit($enemy);
    // ==================================
    $this->add_log($this->get_comment()); // комментатор
    // проверяем кто куда попал
    // удар по мне
    //$enem = mysqli_fetch_array(mq("SELECT hp, maxhp, mana, level FROM `users` WHERE `id` = '".bottouser($enemy)."'"));
    //$enem=$this->enemyhar;
    /*if(!function_exists("addlog2")) {
      include "functions/addlog2.php";
    }*/

    foreach ($this->battleunits[$this->currentenemy]["priems"] as $k=>$v) {
      if (($k=="multi_resolvetactic" || $k=="multi_speedup") && $v["active"]==2) {
        $noresolve=0;
        foreach ($this->battleunits[$this->user["id"]]["priems"] as $k2=>$v2) {
          if (@$strokes[$k2]->noresolve && $v2["active"]==2) $noresolve=1;
        }
        $this->actpriem($k, 0, $enemy, 1, 1);
        if ($noresolve) {
          $this->addlog2($this->battle_data["id"], $this->my_class, $this->user["id"], "agressiveresolve", $enemy, $k);
          continue;
        }
        if ($k=="multi_speedup") $this->steelstrokes($this->battleunits[$this->currentenemy]["priems"], $this->battleunits[$this->user["id"]]["priems"], $enemy, $this->user["id"]);
        $this->addlog2($this->battle_data["id"], $this->en_class, $enemy, $k);

        $this->resolvestrokes($this->battleunits[$this->user["id"]]["priems"], $this->user["id"]);
      }
    }

    foreach ($this->battleunits[$this->user["id"]]["priems"] as $k=>$v) {
      if (($k=="multi_resolvetactic" || $k=="multi_speedup") && $v["active"]==2) {
        $noresolve=0;
        foreach ($this->battleunits[$enemy]["priems"] as $k2=>$v2) {
          if (@$strokes[$k2]->noresolve && $v2["active"]==2) $noresolve=1;
        }
        $this->actpriem($k, 0, $this->user['id'], 1, 1);
        if ($noresolve) {
          $this->addlog2($this->battle_data["id"], $this->en_class, $enemy, "agressiveresolve", $this->user["id"], $k);
          continue;
        }
        if ($noresolve) continue;
        if ($k=="multi_speedup") $this->steelstrokes($this->battleunits[$this->user["id"]]["priems"], $this->battleunits[$this->currentenemy]["priems"], $this->user["id"], $enemy);
        $this->addlog2($this->battle_data["id"], $this->my_class, $this->user['id'], $k);
        $this->resolvestrokes($this->battleunits[$this->currentenemy]["priems"], $enemy);

      }
    }

    if ($attack<100) {
      foreach ($this->battleunits[$this->currentenemy]["priems"] as $k=>$v) {
        if ($k=="multi_cowardshift" && $v["active"]==2) {
          $this->actpriem($k, 0, $enemy, 1, 1);
          $this->addlog2($this->battle_data["id"], $this->en_class, $enemy, $k);
          //$this->defend($enemy, $this->user["id"]);
          $this->cowardshifts[$this->user["id"]]=1;
          $this->battleunits[$this->currentenemy]["defender"]=$this->user["id"];
        }
      }
    }

    if ($this->battle[$enemy][$this->user['id']][0]<100) {
      foreach ($this->battleunits[$this->user["id"]]["priems"] as $k=>$v) {
        if ($k=="multi_cowardshift" && $v["active"]==2) {
          $noresolve=0;
          $this->actpriem($k, 0, $this->user['id'], 1, 1);
          $this->addlog2($this->battle_data["id"], $this->my_class, $this->user['id'], $k);
          //$this->defend($this->user["id"], $enemy);
          $this->cowardshifts[$enemy]=1;
          $this->battleunits[$this->user["id"]]["defender"]=$enemy;
        }
      }
    }


    foreach ($this->battleunits[$this->user['id']]["effects"] as $k=>$v) {
      if ($v["effect"]==DEFEND && ($this->battle[$enemy][$this->user['id']][0]==665 || $this->battle[$enemy][$this->user['id']][0]==664)) continue;
      $this->processbattleeffect($this->user["id"], $k, $v, $enemy);
    }
    foreach ($this->battleunits[$enemy]["effects"] as $k=>$v) {
      if ($v["effect"]==DEFEND && ($attack==665 || $attack==664)) continue;
      $this->processbattleeffect($enemy, $k, $v, $this->user["id"]);
    }

    if (incastle($this->battleunits[$this->user['id']]["room"]) && $this->battleunits[$this->user['id']]["room"]!=$this->battleunits[$enemy]["room"]) {
      if ($this->battleunits[$this->user['id']]["room"]<$this->battleunits[$enemy]["room"]) {
        $this->battleunits[$enemy]["mfdhit"]+=250;
        $this->battleunits[$enemy]["mfmag"]+=250;
      } else {
        $this->battleunits[$this->user['id']]["mfdhit"]+=250;
        $this->battleunits[$this->user['id']]["mfmag"]+=250;
      }
    }

    
    // Живой щит, живой меч
    foreach ($this->battleunits[$enemy]["priems"] as $k=>$v) {
      if ($k=="block_target_shield" && $v["active"]>1) {
        foreach ($this->battleunits[$this->user['id']]["priems"] as $k2=>$v2) {
          if ($k2=="hit_target_sword" && $v2["active"]==2) {
            $this->defend($enemy, $v["active"], 0, 0, 1);
            $this->actpriem($k2, $priems[$k2]["id"], $this->user['id'], 1, 0);
            $this->addlog2($this->battle_data["id"],$this->my_class,$this->user['id'],$k2);
          }
        }
      }
    }
    
    foreach ($this->battleunits[$this->user['id']]["priems"] as $k=>$v) {
      if ($k=="block_target_shield" && $v["active"]>1) {
        foreach ($this->battleunits[$enemy]["priems"] as $k2=>$v2) {
          if ($k2=="hit_target_sword" && $v2["active"]==2) {
            $this->defend($this->user['id'], $v["active"], 0, 0, 1);
            $this->actpriem($k2, $priems[$k2]["id"], $enemy, 1, 0);
            $this->addlog2($this->battle_data["id"],$this->en_class,$enemy,$k2);
          }
        }
      }
    }

    if ($this->battleunits[$this->user["id"]]["defender"]) {
      if ($this->battleunits[$this->user["id"]]["defenderblock"]) $defend=mt_rand(1,5);
      else $defend=655;
    }

    if ($this->battleunits[$enemy]["defender"]) {
      if ($this->battleunits[$enemy]["defenderblock"]) $this->battle[$enemy][$this->user["id"]][1]=mt_rand(1,5);
      else $this->battle[$enemy][$this->user["id"]][1]=655;
    }

    
    //$this->battleunits[$this->user["id"]]["priems"]=$this->getpriems($this->user['id']);
    //$this->battleunits[$this->currentenemy]["priems"]=$this->getpriems($enemy);
    
    // х-ки драчующихся
    $mf = $this->solve_mf($user["id"], $enemy,$attack,$attack1,$attack2,$attack3,$attack4);
    
    $this->actstrokesbymove($this->user['id']);
    $this->actstrokesbymove($enemy);
  
    /*foreach ($this->battleunits[$this->user['id']]["priems"] as $k=>$v) {
      if ($v["wait"]>0) {
        $this->battleunits[$this->user['id']]["priems"][$k]["wait"]--;
        $this->needupdatebu=1;
        $this->toupdatebu[$this->user['id']]["priems"]=1;
      }
      if ($v["active"]!=1) {
        if ($strokes[$k]->type==4) {
          $this->updstroke($this->user['id'], 1, 0, $k);
        }
        if ($strokes[$k]->type==3 && !@$strokes[$k]->noautoact) {
          $this->updstroke($this->user['id'], 1, 0, $k);
        }
      }
    }

    foreach ($this->battleunits[$enemy]["priems"] as $k=>$v) {
      if ($v["wait"]>0) {
        $this->battleunits[$enemy]["priems"][$k]["wait"]--;
        $this->needupdatebu=1;
        $this->toupdatebu[$enemy]["priems"]=1;
      }
      if ($v["active"]!=1) {
        if ($strokes[$k]->type==4) {
          $this->updstroke($enemy, 1, 0, $k);
        }
        if ($strokes[$k]->type==3 && !@$strokes[$k]->noautoact) {
          $this->updstroke($enemy, 1, 0, $k);
        }
      }      
    }*/

    if ($this->battle[$enemy][$this->user['id']][0]==664) {
      $this->battleunits[$enemy]["mfuvorot"]=0;
      $this->enemy_dress["mfuvorot"]=0;
      $mf["he"]["uvorot"]=0;
    }

    if ($attack==664) {      
      $this->battleunits[$user["id"]]["mfuvorot"]=0;
      $this->user_dress["mfuvorot"]=0;
      $mf["me"]["uvorot"]=0;
    }

    
    if ($this->battle[$enemy][$this->user['id']][0]==665) {
      // он потратил ход на магию;
      $this->add_log ($this->razmen_log("mag",$this->battle[$enemy][$this->user['id']][0],$this->get_wep_type($this->enemyhar['weap']),0,$enemy,$this->en_class,$this->user['id'],$this->my_class,0,0,665));
      if ($this->battle[$this->user['id']][$enemy][0]!=665 && $this->battle[$this->user['id']][$enemy][0]!=664) {
        if (getchance($mf["he"]['uvorot'])) {
          if (getchance($this->user_dress["mfcontr"])) $this->addtactic($this->user["id"], "counter", 1, $enemy);
        } else {
          if (getchance(($this->battleunits[$enemy]["blockzones"]>=3?3:2)*20)) {
            $this->addtactic($this->user["id"], "block2", 1, $enemy);
          } elseif (getchance($this->user_dress["mfparir"])) {
            $this->addtactic($this->user["id"], "parry", 1, $enemy);
          }
        }
      }
    } elseif ($this->battle[$enemy][$this->user['id']][0]==664 && $this->battle[$enemy][$this->user['id']][1]==664) {
      // пропустил по тайму;
      $this->add_log ($this->razmen_log("skip",$this->battle[$enemy][$this->user['id']][0],$this->get_wep_type($this->enemyhar['weap']),0,$enemy,$this->en_class,$this->user['id'],$this->my_class,0,0,664));
    } else {
      $attacks=array($this->battle[$enemy][$this->user['id']][0], $this->battle[$enemy][$this->user['id']][3], $this->battle[$enemy][$this->user['id']][4], $this->battle[$enemy][$this->user['id']][5], $this->battle[$enemy][$this->user['id']][6]);
      $i=0;
      foreach ($attacks as $k=>$v) {
        $i++;
        if (!$v) continue;
        if ($i==1 || $i==3 || $i==5) $hn="";
        else $hn="1";
        $rez=$this->makehit("he", $mf, $this->user["id"], $enemy, $attack, $defend, $k+1, 1);
        if ($rez==1 || $rez==3 || $rez==4) {
          if ($rez==3 || $rez==4 || getchance($this->user_dress["mfcontr"])) {
            //if (!$this->battle[$enemy][$this->user['id']][3]) $this->enemy_dress["mfcontr"]=0;
            if ($rez!=3) {
              //mq("update users set counter=counter+1 where id='$user[id]'");
              @$this->addtactic($this->user['id'], "counter", 1, $enemy);
              $this->needupdate=1;
            }
            $this->add_log ($this->razmen_log("contr",$v,$this->enemyhar["minimax$hn"]["weptype"],0,$enemy,$this->en_class,$this->user['id'],$this->my_class,0,0, $defend));
            $this->makehit("me", $mf, $this->user["id"], $enemy, $attack, $defend, 1);
          } else {
            $this->add_log ($this->razmen_log("uvorot",$v,$this->enemyhar["minimax$hn"]["weptype"],0,$enemy,$this->en_class,$this->user['id'],$this->my_class,0,0, $defend));
          }
        }
        if ($this->cowardshifts[$enemy]) {
          $this->battleunits[$this->user["id"]]["defender"]=0;
          $this->cowardshifts[$enemy]=0;
        }
      }
    }

    // удар по противнику
    if ($attack == 665) {
      // я потратил ход на магию;
      $this->add_log ($this->razmen_log("mag",$attack,$this->battleunits[$this->user["id"]]["weapondata1"]["weptype"],0,$this->user['id'],$this->my_class,$enemy,$this->en_class,0,0, 665));
      if ($this->battle[$enemy][$this->user['id']][0]!=665 && $this->battle[$enemy][$this->user['id']][0]!=664) {
        if (getchance($mf["he"]['uvorot'])) {
          if (getchance($this->enemy_dress["mfcontr"])) $this->addtactic($enemy, "counter", 1, $this->user["id"]);
        } else {
          if (getchance(($this->battleunits[$this->user["id"]]["blockzones"]>=3?3:2)*20)) {
            $this->addtactic($enemy, "block2", 1, $this->user["id"]);
          } elseif (getchance($this->enemy_dress["mfparir"])) {
            $this->addtactic($enemy, "parry", 1, $this->user["id"]);
          }
        }
      }
    } elseif ($attack == 664 && $defend==664) {
      // я пропустил по тайму;
      $this->add_log ($this->razmen_log("skip",$attack,$this->battleunits[$this->user["id"]]["weapondata1"]["weptype"],0,$this->user['id'],$this->my_class,$enemy,$this->en_class,0,0, 664));
    } else {
      $attacks=array($attack, $attack1, $attack2, $attack3, $attack4);
      $i=0;
      foreach ($attacks as $k=>$v) {
        $i++;
        if (!$v) continue;
        if ($i==1 || $i==3 || $i==5) $hn="";
        else $hn="1";
        $rez=$this->makehit("me", $mf, $this->user["id"], $enemy, $v, $defend, $k+1, 1);
        if ($rez==1 || $rez==3 || $rez==4) {
          if ($rez==3 || $rez==4 || getchance($this->enemy_dress["mfcontr"])) {
            //if (!$this->battle[$enemy][$this->user['id']][3]) $this->enemy_dress["mfcontr"]=0;
            $this->addtactic($enemy, "counter", 1, $this->user["id"]);
            $this->needupdate=1;
            //if ($rez!=3) mq("update users set counter=counter+1 where id='$enemy'");
            $this->add_log ($this->razmen_log("contr",$attack,$this->user["minimax$hn"]["weptype"],0,$this->user['id'],$this->my_class,$enemy,$this->en_class,0,0, $this->battle[$enemy][$this->user['id']][1]));
            if ($k+1>$this->battleunits[$enemy]["weapons"])  $k=0;
            $this->makehit("he", $mf, $this->user["id"], $enemy, $this->battle[$enemy][$this->user['id']][0], $defend, $k+1);
          } else {
            $this->add_log ($this->razmen_log("uvorot",$v,$this->user["minimax$hn"]["weptype"],0,$this->user['id'],$this->my_class,$enemy,$this->en_class,0,0, $this->battle[$enemy][$this->user['id']][1]));
          }
        }
        if ($this->cowardshifts[$this->user["id"]]) {
          $this->battleunits[$enemy]["defender"]=0;
          $this->cowardshifts[$this->user["id"]]=0;
        }
      }
    }

    // обновить битку
    $this->battle[$enemy][$this->user['id']] = array(0,0,time(),0);
    $this->battle[$this->user['id']][$enemy] = array(0,0,time(),0);

    if ($this->battleunits[$this->user['id']]["follow"]==$enemy) {$this->toupdatebu[$this->user['id']]["follow"]=0;$this->needupdatebu=1;}
    if ($this->battleunits[$enemy]["follow"]==$this->user["id"]) {$this->toupdatebu[$enemy]["follow"]=0;$this->needupdatebu=1;}

    if ($this->battleunits[$this->user["id"]]["enemy"]==$enemy) $this->setnextenemy($this->user['id']);
    //$this->setnextenemy($enemy);
    
    //mq("UPDATE `battle` SET `to1` = '".time()."',`to2` = '".time()."' WHERE `id` = ".$this->user['battle']." LIMIT 1;");
    $this->toupdatebattle["to1"]=time();
    $this->toupdatebattle["to2"]=$this->toupdatebattle["to1"];
    $this->needupdate=1;
    foreach ($this->battleunits[$this->currentenemy]["priems"] as $k=>$v) {
      if ($v["active"]==2 && @$strokes[$k]->actuntilmove) {
        $this->addlog2($this->battle_data["id"],$this->en_class,$enemy,$k);
        $this->actpriem($k, $v["id"], $enemy, 1, 0);
      }
    }
    foreach ($this->battleunits[$this->user["id"]]["priems"] as $k=>$v) {
      if ($v["active"]==2 && @$strokes[$k]->actuntilmove) {
        $this->addlog2($this->battle_data["id"],$this->my_class,$this->user["id"],$k);
        $this->actpriem($k, $v["id"], $this->user["id"], 1, 0);
      }
    }
    if ($this->needupdatebu) {
      $this->updatebattleunits();
    }
    if ($this->user["id"]<_BOTSEPARATOR_ && $this->userdata[$this->user["id"]]["maxmana"]) {
      $this->addmana(max($this->battleunits[$this->user["id"]]["level"], round($this->battleunits[$this->user["id"]]["mudra"]/4)), $this->user["id"]);
    }
    if ($enemy<_BOTSEPARATOR_ && $this->userdata[$enemy]["maxmana"]) {
      $this->addmana(max($this->battleunits[$enemy]["level"], round($this->battleunits[$enemy]["mudra"]/4)), $enemy);
    }
    $this->getadditdata($this->user["id"]);
    $this->getadditdata($enemy);
    if ($this->battleunits[$this->user["id"]]["additdata"]["scrollused"]) {
      $this->battleunits[$this->user["id"]]["additdata"]["scrollused"]=0;
      $this->needupdateaddit[$this->user["id"]]=1;
    }
    if ($this->battleunits[$enemy]["additdata"]["scrollused"]) {
      $this->battleunits[$enemy]["additdata"]["scrollused"]=0;
      $this->needupdateaddit[$enemy]=1;
    }
    $i=0;
    while ($i<12) {
      $i++;
      if ($this->battleunits[$this->user["id"]]["additdata"]["scrolls"][$i]["wait"]) {
        $this->battleunits[$this->user["id"]]["additdata"]["scrolls"][$i]["wait"]--;
        $this->needupdateaddit[$this->user["id"]]=1;
      }
      if ($this->battleunits[$enemy]["additdata"]["scrolls"][$i]["wait"]) {
        $this->battleunits[$enemy]["additdata"]["scrolls"][$i]["wait"]--;
        $this->needupdateaddit[$enemy]=1;
      }
    }
    $this->remmagstorm($enemy);
    $this->remmagstorm($this->user["id"]);
  } else {
    // выставляем удар противнику... просто...
    $this->battle[$this->user['id']][$enemy] = array($attack,$defend,time(),$attack1,$attack2,$attack3,$attack4);
    if($this->my_class=="B1" && $jv > 0) {
      mq("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".(time()-1)."' WHERE `id` = ".$this->user['battle']." LIMIT 1;");
    } elseif($jv > 0) {
      mq("UPDATE `battle` SET `to2` = '".time()."', `to1` = '".(time()-1)."' WHERE `id` = ".$this->user['battle']." LIMIT 1;");
    } else {
      mq("UPDATE `battle` SET `to2` = '".time()."', `to1` = '".(time())."' WHERE `id` = ".$this->user['battle']." LIMIT 1;");
    }

    // обновить битку
    if ($this->battleunits[$this->user['id']]["follow"]==$enemy) {$this->toupdatebu[$this->user['id']]["follow"]=0;$this->needupdatebu=1;}
    $this->setnextenemy($this->user['id']);

    /*if ($attack==665) {
      foreach ($this->battleunits[$this->user['id']]["priems"] as $k=>$v) {
        if ($v["active"]!=1) {
          if ($strokes[$k]->type==4 && !@$strokes[$k]->move) {
            //if (!$strokes[$k]->eternal) {
              $this->updstroke($this->user['id'], 1, 0, $k);
            //}
          }
        }
      }
    }*/
    $this->updateaddit();
    $this->update_battle();
    $this->updatebattleunits();
    if (count($this->toupdate)>0) {
      $this->update_battle();
      $this->updatebattleunits();
    }
    $this->write_log();
    header("Location: ".$_SERVER['PHP_SELF']."?if=$_GET[if]");
    die();
  }
} else {
  return false;
}
?>