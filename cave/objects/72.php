<?
  $cell=$map[$ty*2][$tx*2];
  if (($tx*2==4 && $ty*2==6) || ($tx*2==8 && $ty*2==6) || ($tx*2==16 && $ty*2==6) || ($tx*2==16 && $ty*2==4) || 
  ($tx*2==32 && $ty*2==6) || ($tx*2==28 && $ty*2==6) || ($tx*2==24 && $ty*2==4) || ($tx*2==10 && $ty*2==10) || 
  ($tx*2==14 && $ty*2==8) || ($tx*2==6 && $ty*2==12) || ($tx*2==14 && $ty*2==14) || ($tx*2==22 && $ty*2==14) || 
  ($tx*2==20 && $ty*2==20) || ($tx*2==20 && $ty*2==28) || ($tx*2==26 && $ty*2==20) || ($tx*2==26 && $ty*2==22) || 
  ($tx*2==32 && $ty*2==28) || ($tx*2==30 && $ty*2==28) || ($tx*2==28 && $ty*2==28) || ($tx*2==26 && $ty*2==28) || 
  ($tx*2==24 && $ty*2==38) || ($tx*2==24 && $ty*2==40) || ($tx*2==8 && $ty*2==14) || ($tx*2==2 && $ty*2==24) || 
  ($tx*2==6 && $ty*2==24) || ($tx*2==4 && $ty*2==28) || ($tx*2==6 && $ty*2==30) || ($tx*2==8 && $ty*2==32) || 
  ($tx*2==14 && $ty*2==30) || ($tx*2==12 && $ty*2==34) || ($tx*2==22 && $ty*2==40) || ($tx*2==22 && $ty*2==38) ||
  ($tx*2==22 && $ty*2==28) || ($tx*2==30 && $ty*2==22) || ($tx*2==22 && $ty*2==16)) {
    $tmp=explode("/", $cell);
    if ($tmp[2]%2==1) {
      $map[$ty*2][$tx*2]="$tmp[0]/$tmp[1]/".($tmp[2]+1);
      updmap();
      $it=mqfa("select id, name from fielditems where field='$user[caveleader]' and x='".($tx*2)."' and y='".($ty*2)."'");
      if ($it) {
        mq("update fielditems set x=".($x*2).", y=".($y*2)." where id='$it[id]'");
        $report="В сундуке вы обнаружили $it[name].";
      }
    } else $report="Этот сундук пустой.";
  }
?>