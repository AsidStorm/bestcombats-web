<?
  include_once(DOCUMENTROOT."questfuncs.php");
  $r=mq("select users.id, users.login, users.sex, users.klan, users.align, users.level, users.sila, users.hp from users left join online on users.id=online.id left join qtimes on qtimes.user=users.id where qtimes.q4<".time()." and online.date>=".(time()-90)." and users.sila>=25 and users.hp=users.maxhp and users.room=81 and users.id in (select user as id from questusers)");
  $power=0;
  $cond="0";
  $logins="";
  $log="";
  $cnt=0;
  while ($rec=mysql_fetch_assoc($r)) {
    $cnt++;
    $sex=$rec["sex"];
    $power+=$rec["power"];
    $power+=$rec["sila"]*$rec["hp"];
    $cond.=" or id=$rec[id] ";
    if ($logins) {
      if ($cnt==mysql_num_rows($r)) $logins.=" </b>�<b> ";
      else $logins.="</b>,<b> ";
    }
    $logins.=" $rec[login]";
    if ($log) {
      if ($cnt==mysql_num_rows($r)) $log.=" � ";
      else $log.=", ";
    }
    $log.=fullnick($rec);
    if (INCRON) makequest(4, 1, $rec["id"]);
  }
  $success=0; 
  if ($power>=2500000) {
    $success=1;
    sysmsg("<b>$logins</b> ������� ��������� ������ �� �����, � �� ������ ��������� ���� � ������. ������ ����� ����� ��������� �������");
    mq("update variables set value=1 where var='quest'");
    mq("update variables set value='$logins' where var='questusers'");
  }
  if ($cnt==0) {
    mq("truncate table questusers");
    setvar("queststart", 0);
  } elseif ($success || INCRON) {
    if ($cnt>1) {
      $e="���";$e2="�";$e3="���";
    } elseif ($sex==1) {
      $e="��";$e2="";$e3="���";
    } else {
      $e="���";$e2="�";$e3="���";
    }
    mq("update variables set value=concat(value, '\r\n".date("H:i")." $logins ($power)') where var='questlog'");
    $results=array("�����$e ��������� ������, �� ��� ��������� ������������", "����������$e2 ��������� ������, �� ������ ��$e2 ���� ����, � ������� �� ������",
    "�����$e2, ��� ������ ��� ��������� ������, �� �� ���-�� ����", "��� ���� ��� ������$e2 ������, �� �� ���� �� ����������",
    "����������� �����$e �������� ������, �� ������� �� ������", "�����$e2, ��� ���$e3 ��������� ������ ��� ����, �� � ����� �� ���� ���� ���� ��� ������",
    "������$e ���� ��������� ������ � ����, �� �� ���-�� ����", "����������$e2 ��������� ��������� ������� ��������� ������",
    "��������$e2 ����� �� ��������� ������� ��������� ������ ��� � ���� �� ���������������", "��� ������� ��� ������������ �������$e ��������� ������",
    "�������� �����$e2, ��� ������� ����� ����������������, �� ������ �� ��� �� ������� �����", "��������$e2 ������ ��������� ������� ��������� ������");
    shuffle($results);
    $result=array_pop($results);
    $log="<br>".date("H:i")." $log ".($success?"������� ��������� ������.":$result);
    if (!$success) sysmsg("<b>$logins</b> $result.");
    mq("update events set log=concat(log, '$log') where id=1");
    mq("truncate table questusers");
    mq("update users set hp=0, fullhptime=".time()." where $cond");
    setvar("queststart", 0);
  }
?>