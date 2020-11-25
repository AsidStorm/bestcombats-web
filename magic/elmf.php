<?php
  $mfs=array("mfdhit", "mfdmag", "mfdkol", "mfdrub", "mfdrej", "mfddrob", "mfdfire", "mfdwater", "mfdair", "mfdearth");

  getadditdata($user);
  $at=addicttype($row);
  $row["mfd{$at}"]=floor($row["mfd{$at}"]*(addictval($user["{$at}addict"])*0.01+1));

  $cond="";
  $insmfs="";
  $vals="";
  $eqname=0;
  foreach ($mfs as $k=>$v) {
    if ($row[$v]) {
      if ($v=="mfdkol" || $v=="mfdrub" || $v=="mfdrej" || $v=="mfddrob") {
        $cond.=" and (mfdkol>0 or mfdrub>0 or mfdrej>0 or mfddrob>0)";
        $eqname=1;
      } elseif ($v=="mfdfire" || $v=="mfdwater" || $v=="mfdair" || $v=="mfdearth") {
        $cond.=" and (mfdfire>0 or mfdwater>0 or mfdair>0 or mfdearth>0)";
        $eqname=1;
      } else $cond.=" and $v>0 ";
      $insmfs.=", $v='$row[$v]'";
    } elseif ($v!="mfdkol" && $v!="mfdrub" && $v!="mfdrej" && $v!="mfddrob" && $v!="mfdfire" && $v!="mfdwater" && $v!="mfdair" && $v!="mfdearth") $cond.=" and $v=0 ";
  }

  $uses_zel = mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = ".$user['id']." $cond AND `type`=188");
  $ins_time = floor($magic['time']*60);
  global $nodrink;
  if (in_array($user["room"],$nodrink)) {
    echo "Здесь запрещено пить эликсиры!";
  } elseif ($user['battle'] > 0) {
      echo "Не в бою...";
  } elseif($uses_zel && $row['name']!=$uses_zel['name'] && $eqname) {
    echo "Еще не прошло действие старого эликсира.";
  } else {
    if(!$uses_zel){
      mq("insert into effects set owner='$user[id]', name='$row[name]' , time=".(time()+$ins_time).", type=188 $insmfs");
    } else {
      if ($row['name']!=$uses_zel['name']) {
        mq("update effects set name='$row[name]' $insmfs where id='$uses_zel[id]'");
      }
      updeffect($user["id"], $uses_zel, $ins_time, $row, 1);
    }
    echo "Выпит эликсир &quot;".$row['name']."&quot;.";
    if ($at) mq("delete from effects where owner='$user[id]' and type=".ADDICTIONEFFECT." and mfd$at<0");
    updeffects($user["id"]);
    $bet=1;
  }

?>