<?php
// ����� "��� �����"
if ($user['battle'] > 0) {
  echo "�� � ���...";
} elseif ($user["in_tower"]==71) {
  $roomnames=array(3=>"������� � �������",4=>"��������� ������� 2",5=>"��������� ������� 3",6=>"���������",7=>"��� ������ 1",8=>"��� ������ 2",9=>"��� ������ 3",10=>"��������� ������� 1",11=>"��� ������ 1",12=>"��� ������ 2",13=>"����� �� �����",14=>"�������� ����� 1",15=>"�������� ����� 2",16=>"���������",17=>"����",18=>"����� 1",19=>"����� 2",20=>"����� 3",21=>"����� 4",22=>"������� ���-�������",23=>"������� ���",24=>"�������",25=>"������ ������",26=>"�������� � ������ ",27=>"�����. ���� - �����1",28=>"���������� ����",29=>"���������� ",30=>"�����. ���� - �����2",31=>"��������",32=>"��������� �����",33=>"����� �� ���������� ����",34=>"����� �����. ����",35=>"��������� �������",36=>"��������� ���",39=>"������ �������",40=>"������",41=>"������ ��� 2",42=>"��������� �������",43=>"������� � �������",44=>"������ �������",45=>"������ ��� 1",46=>"��� ��������",47=>"��� ��������",37=>"��������� �������",38=>"�������",);
  global $rooms;
  $map=mqfa1("select map from fields where id='$user[caveleader]'");
  $map=unserialize($map);
  $r=mq("SELECT * FROM `fieldparties` WHERE field='$user[caveleader]'");
  $out="";
  $data=array();
  while ($rec=mysql_fetch_assoc($r)) {
    if ($rec["user"]==$user["id"]) {
      $x=$rec["x"];
      $y=$rec["y"];
    } else $data[]=$rec;
  }
  foreach ($data as $k=>$rec) {
    $c=$map[$rec["y"]*2][$rec["x"]*2];
    $tmp=explode("/", $c);
    if ($out) $out.=", ";
    $out.="$rec[login] - ".$roomnames[$tmp[1]]." ";
    if ($rec["y"]<$y) $out.=" &#8593; ";
    if ($rec["y"]>$y) $out.=" &#8595; ";
    if ($rec["x"]<$x) $out.=" &#8592; ";
    if ($rec["x"]>$x) $out.=" &#8594; ";
  }
  $bet=1;
  privatemsg("<b>����� � ������������</b>:  $out", $user["login"]);
} else {
	//undressall($user['id']);
	if ($_SESSION['uid'] == null) header("Location: index.php");
	global $rooms;
	$rs = mysql_query("SELECT * FROM `users` WHERE in_tower='$user[in_tower]' ORDER by `room` DESC;");
	while($r = mysql_fetch_array($rs)) {
		if($rt != $r['room']) {
			$rt = $r['room'];
			$rr .= "\n".$rooms[$r['room']].": ";
		}
		$rr .= $r['login'].", ";
	}
	echo "<font color=red><b>����� � ������������ � ��� � �������<b></font>";
	
	mysql_query("INSERT INTO `inventory` (`bs`,`owner`,`name`,`type`,`massa`,`cost`,`img`,`letter`,`maxdur`,`isrep`)VALUES('$user[in_tower]','{$_SESSION['uid']}','����� � ������������','200',1,0,'paper100.gif','{$rr}',1,0) ;");
	
	$bet=1;
}
?>