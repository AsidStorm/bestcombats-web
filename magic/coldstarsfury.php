<?
  if (!$user["battle"]) {
    echo "��� ������ �����."; 
  } elseif ($user["hp"]<=0) { 
    echo "��� ��� ��� �� ����������!"; 
  } elseif ($fbattle->battleunits[$user["id"]]["additdata"]["s_duh"]<=0) {
    echo "������������ ���� ����."; 
  } else {
    if ($user['sex'] == 1) {$action="";}
    else {$action="�";}
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.$fbattle->nick5($user['id'],$fbattle->my_class).' �����������'.$action.' �������� <b>'.$row["name"].'</b>.<BR>');
    //$fbattle->write_log ();
    $fbattle->addeffect($user["id"], COLDSTARSFURY, 1, 0, "coldstarsfury", array(), 0);
    $fbattle->battleunits[$user["id"]]["additdata"]["s_duh"]-=1000;
    $fbattle->needupdateaddit[$user["id"]]=1;
    echo "������ ����������� ������ $row[name].";
    $bet=1;
  }
?>