<?php
  if ($row["prototype"]==1993) $deltamana=50;
  if ($row["prototype"]==1994) $deltamana=100;
  if ($row["prototype"]==1995) $deltamana=1000;
  if ($row["prototype"]==102503) $deltamana=750;
  if ($row["prototype"]==102502) $deltamana=1000;
  if ($row["prototype"]==102501) $deltamana=1250;

  if ($user['battle'] && $user["hp"]<=0) { 
    $report="��� ��� ��� �� ����������!"; 
  } else {
    if ($user['sex'] == 1) {$action="";}
    else {$action="�";}

    if ($user['battle'] > 0) {
      $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' �����������'.$action.' �������� <b>'.$row["name"].'</b>.<BR>');
      $fbattle->write_log ();
      $fbattle->addmana($deltamana, $user["id"]);
      global $report;
      echo "�� ������������ $deltamana ����!";
    } else {
      mq("update users set mana=if(mana+$deltamana>maxmana,maxmana,mana+$deltamana) where id='$user[id]'");
      echo "�� ������������ $deltamana ����!</B></FONT>";
    }
    $bet=1;
  }
?>