<?
  function addlog2($id,$color,$idpers,$nazv,$p1=0,$p2=0,$p3=0, $p4=0, $write=1) {
    global $strokes;
    include_once "incl/strokedata.php";
    if ($color=="B1") $color2="B2";
    else $color2="B1";
    if ($idpers<_BOTSEPARATOR_) $hmm = mysql_fetch_array(mysql_query("SELECT id,sex FROM `users` WHERE `id` = '{$idpers}' LIMIT 1;"));
    else {
      $hmm["id"]=$idpers;
      $hmm["sex"] = mqfa1("SELECT sex FROM `users` WHERE `id` = '".bottouser($idpers)."'");
    }
    if(!function_exists("nick666")) {
      function nick666 ($id,$st) {
        if($id > _BOTSEPARATOR_) {
          $bots = mysql_fetch_array(mysql_query ('SELECT name,hp,id,prototype FROM `bots` WHERE `id` = '.$id.' LIMIT 1;'));
          $id=$bots['prototype'];
          $user = mysql_fetch_array(mysql_query("SELECT login,hp,id FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
          $user['login'] = $bots['name'];
          $user['hp'] = $bots['hp'];
          $user['id'] = $bots['id'];
        } else {
          $user = mysql_fetch_array(mysql_query("SELECT login FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
        }
        if($user[0]) {
          $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$id}' and `type` = '1022' LIMIT 1;"));
          if($effect) {
            $user['login'] = '</a><b><i>невидимка</i></b>';
            $user['align'] = '0';
            $user['klan'] = '';
            $user['hp'] = '??';
            $user['maxhp'] = '??';
            $user['mana'] = '??';
            $user['maxmana'] = '??';
          }
          return "<span class={$st}>".$user['login']."</span>";
        }
      }
    }
    if($hmm['sex'] == 1) {
      $aa="";
      $em="ему";
      $his="его";
    } else {
      $em="ей";
      $aa="a";
      $his="её";
    }

    if ($nazv=="multi_agressiveshield" || $nazv=="block_revenge") {
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', решив стать героем, провел'.$aa.' прием <b>"'.$strokes[$nazv]->name.'"</b> на '.nick666($p1,$color2).' <b>-'.$p2.'</b> '.$p3.' ]<BR>';
    } elseif(substr($nazv,0,11)=='magicdamage'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', получил'.$aa.' повреждение от '.$p4.' <b>-'.$p1.'</b> [ '.($p2<0?0:$p2).' / '.$p3.' ]<BR>';
    } elseif(substr($nazv,0,11)=='manadamage'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', утратил'.$aa.' ману от заземления <b>-'.$p1.'</b>.<BR>';
    } elseif($nazv=='heal'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', восстановил'.$aa.', здоровье от приёма <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif($nazv=='healmana'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', восстановил'.$aa.', ману от приёма <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif($nazv=='heal2'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', использовал'.$aa.', приём <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif ($strokes[$nazv])  {
      $textp='<span class=date>'.date("H:i").'</span> ';
      $nick=nick666($hmm['id'],$color);
      $priem=$strokes[$nazv]->name;
      $txts=array(
        "$nick, нетрезво оценив положение, решил$aa, что поможет $em только прием <b>\"$priem\"</b>.",
        "$nick, не придумал$aa ничего лучше чем применить прием <b>\"$priem\"</b>.",
        "$nick, сам$aa не поняв зачем, применил$aa прием <b>\"$priem\"</b>.",
        "$nick, вспомнив слова своего сэнсея, из последних сил провел$aa прием <b>\"$priem\"</b>.",
        "$nick, решив стать героем, провел$aa прием <b>\"$priem\"</b>.",
        "$nick, понял$aa, пропустив очередной удар в голову, что $his спасение - это прием <b>\"$priem\"</b>.",
        "$nick, понимая, что ситуация становится критической, применил$aa прием <b>\"$priem\"</b>.",
        "$nick, замыслив недоброе, использовал$aa прием <b>\"$priem\"</b>.",
        "$nick, выкрикнув: \"А ещё я вот так могу!\", использовал$aa прием <b>\"$priem\"</b>."
      );
      $textp.=$txts[rand(0,count($txts)-1)];
      $textp.="<BR>";
    }

    if (!$write) return $textp;

    $fp = fopen ("backup/logs/battle".$id.".txt","a"); //открытие
    flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
    fputs($fp , $textp); //работа с файлом
    fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
    flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
    fclose ($fp); //закрытие
    //chmod("/backup/logs/battle".$id.".txt",666);

  }
?>