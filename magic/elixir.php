<?
  $uses_zel = mysql_fetch_array(mysql_query("SELECT name FROM `effects` WHERE `owner` = ".$user['id']." AND `type`=188 and name like '����������� �������%'"));
  $ins_time = floor($magic['time']*60);

  global $nodrink;
  if (in_array($user["room"],$nodrink)) {
    echo "����� ��������� ���� ��������!";
  } elseif ($user['battle'] > 0) {
      echo "�� � ���...";
  } elseif($uses_zel) {
      echo "��� �� ������ �������� ������� ��������.";
  } else {
    $mfs=array("mfuvorot", "mfauvorot", "mfakrit", "mfkrit", "mfparir", "mfcontr", "mfdhit", "mfdmag", "manausage", "mfmagp", "mfhitp", "minusmfdmag", "mfproboj", "mfshieldblock");
    $mf="";
    $mfval="";
    foreach ($mfs as $k=>$v) {
      if ($row[$v]) {
        if ($mf) $mf.="/";
        if ($mfval) $mfval.="/";
        $mf.="$v";
        $mfval.="$row[$v]";
      }
    }
    mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`, type, `mf`,`mfval`) values ('".$user['id']."','".$row['name']."',".(time()+$ins_time).",188, '$mf', '$mfval');");
    echo "����� ������� &quot;".$row['name']."&quot;.";
    $bet=1;
  }
?>