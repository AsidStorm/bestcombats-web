<?php
  function magictime($hrs) {
    if ($hrs<=24) {
      if ($hrs%10==1) return "$hrs ���";
      if ($hrs%10==0 || $hrs%10>=5) return "$hrs �����";
      return "$hrs ����";
    }
    $d=floor($hrs/24);
    if ($d%10==1) return "$d ����";
    if ($d%10==0 || $d%10>=5) return "$d ����";
    return "$d ���";
  }

  if ($row["prototype"]==2315) {
    $type=TRAVMARESISTANCE2;
  } elseif ($row["prototype"]==101772 || $row["prototype"]==101773 || $row["prototype"]==101774) {
    $type=LIGHTSTEPS;
    if ($row["prototype"]==101772) {
      $magic["time"]=60*120;
      $row["magic"]="lightsteps5";
    }
    if ($row["prototype"]==101773) {
      $magic["time"]=60*360;
      $row["magic"]="lightsteps15";
    }
    if ($row["prototype"]==101774) {
      $magic["time"]=60*720;
      $row["magic"]="lightsteps30";
    }
  }
    $ins_time = floor($magic['time']*60);
  $uses_zel = mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = ".$user['id']." and `type`=$type");

  global $nodrink;
  if (in_array($user["room"],$nodrink)) {
    echo "����� ��������� ���� �������� � ������������ ������!";
  } elseif ($user['battle'] > 0) {
    echo "�� � ���...";
  } else {
    if(!$uses_zel){
      mq("insert into effects set owner='$user[id]', name='$row[name]' , time=".(time()+$ins_time).", type='$type'");
    } else {
      updeffect($user["id"], $uses_zel, $ins_time, $row, 0, ($row['name']!=$uses_zel['name']?$row["name"]:""));
    }
    echo "������� ������������ �������� &quot;".$row['name']."&quot;.";
    addch("<img src=i/magic/$row[magic].gif>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ����������� �������� \"$row[name]\" ������ ".magictime(floor($magic["time"]/60)).".");
    updeffects($user["id"]);
    $bet=1;
  }

?>