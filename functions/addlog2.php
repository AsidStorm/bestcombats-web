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
            $user['login'] = '</a><b><i>���������</i></b>';
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
      $em="���";
      $his="���";
    } else {
      $em="��";
      $aa="a";
      $his="�";
    }

    if ($nazv=="multi_agressiveshield" || $nazv=="block_revenge") {
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', ����� ����� ������, ������'.$aa.' ����� <b>"'.$strokes[$nazv]->name.'"</b> �� '.nick666($p1,$color2).' <b>-'.$p2.'</b> '.$p3.' ]<BR>';
    } elseif(substr($nazv,0,11)=='magicdamage'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', �������'.$aa.' ����������� �� '.$p4.' <b>-'.$p1.'</b> [ '.($p2<0?0:$p2).' / '.$p3.' ]<BR>';
    } elseif(substr($nazv,0,11)=='manadamage'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', �������'.$aa.' ���� �� ���������� <b>-'.$p1.'</b>.<BR>';
    } elseif($nazv=='heal'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', �����������'.$aa.', �������� �� ����� <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif($nazv=='healmana'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', �����������'.$aa.', ���� �� ����� <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif($nazv=='heal2'){
      $textp='<span class=date>'.date("H:i").'</span> '.nick666($hmm['id'],$color).', �����������'.$aa.', ���� <b>'.$strokes[$p4]->name.'</b> <font Color=green><b>+'.$p1.'</b></font> [ '.$p2.' / '.$p3.' ]<BR>';
    } elseif ($strokes[$nazv])  {
      $textp='<span class=date>'.date("H:i").'</span> ';
      $nick=nick666($hmm['id'],$color);
      $priem=$strokes[$nazv]->name;
      $txts=array(
        "$nick, �������� ������ ���������, �����$aa, ��� ������� $em ������ ����� <b>\"$priem\"</b>.",
        "$nick, �� ��������$aa ������ ����� ��� ��������� ����� <b>\"$priem\"</b>.",
        "$nick, ���$aa �� ����� �����, ��������$aa ����� <b>\"$priem\"</b>.",
        "$nick, �������� ����� ������ ������, �� ��������� ��� ������$aa ����� <b>\"$priem\"</b>.",
        "$nick, ����� ����� ������, ������$aa ����� <b>\"$priem\"</b>.",
        "$nick, �����$aa, ��������� ��������� ���� � ������, ��� $his �������� - ��� ����� <b>\"$priem\"</b>.",
        "$nick, �������, ��� �������� ���������� �����������, ��������$aa ����� <b>\"$priem\"</b>.",
        "$nick, �������� ��������, �����������$aa ����� <b>\"$priem\"</b>.",
        "$nick, ���������: \"� ��� � ��� ��� ����!\", �����������$aa ����� <b>\"$priem\"</b>."
      );
      $textp.=$txts[rand(0,count($txts)-1)];
      $textp.="<BR>";
    }

    if (!$write) return $textp;

    $fp = fopen ("backup/logs/battle".$id.".txt","a"); //��������
    flock ($fp,LOCK_EX); //���������� �����
    fputs($fp , $textp); //������ � ������
    fflush ($fp); //�������� ��������� ������ � ������ � ����
    flock ($fp,LOCK_UN); //������ ����������
    fclose ($fp); //��������
    //chmod("/backup/logs/battle".$id.".txt",666);

  }
?>