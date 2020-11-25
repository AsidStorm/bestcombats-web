<?php
// магия "шаг назад"
if ($user['battle'] > 0) {
  echo "Не в бою...";
} elseif ($user["in_tower"]==71) {
  $roomnames=array(3=>"Комната с Камином",4=>"Картинная Галерея 2",5=>"Картинная Галерея 3",6=>"Трапезная",7=>"Зал Отдыха 1",8=>"Зал Отдыха 2",9=>"Зал Статуй 3",10=>"Картинная Галерея 1",11=>"Зал Статуй 1",12=>"Зал Статуй 2",13=>"Выход на Крышу",14=>"Западная Крыша 1",15=>"Западная Крыша 2",16=>"Оранжерея",17=>"Храм",18=>"Келья 1",19=>"Келья 2",20=>"Келья 3",21=>"Келья 4",22=>"Красный зал-коридор",23=>"Красный Зал",24=>"Терасса",25=>"Винный Погреб",26=>"Лестница в Подвал ",27=>"Внутр. двор - Выход1",28=>"Внутренний Двор",29=>"Библиотека ",30=>"Внутр. двор - Выход2",31=>"Гостиная",32=>"Восточная Крыша",33=>"Выход из Мраморного Зала",34=>"Южный Внутр. двор",35=>"Восточная Комната",36=>"Мраморный Зал",39=>"Желтый Коридор",40=>"Подвал",41=>"Старый Зал 2",42=>"Служебная Комната",43=>"Комната в Подвале",44=>"Темная Комната",45=>"Старый Зал 1",46=>"Зал Ожидания",47=>"Зал Ораторов",37=>"Оружейная Комната",38=>"Бойница",);
  global $rooms;
  $map=mqfa1("select map from fields where id='$user[caveleader]'");
  $map=unserialize($map);
  $r=mq("SELECT * FROM `fieldparties` WHERE field='$user[caveleader]'");
  $out="";
  $data=array();
  while ($rec=mysqli_fetch_assoc($r)) {
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
  privatemsg("<b>Отчёт о сканировании</b>:  $out", $user["login"]);
} else {
	//undressall($user['id']);
	if ($_SESSION['uid'] == null) header("Location: index.php");
	global $rooms;
	$rs = db_query("SELECT * FROM `users` WHERE in_tower='$user[in_tower]' ORDER by `room` DESC;");
	while($r = mysqli_fetch_array($rs)) {
		if($rt != $r['room']) {
			$rt = $r['room'];
			$rr .= "\n".$rooms[$r['room']].": ";
		}
		$rr .= $r['login'].", ";
	}
	echo "<font color=red><b>Отчет о сканировании у вас в рюкзаке<b></font>";
	
	db_query("INSERT INTO `inventory` (`bs`,`owner`,`name`,`type`,`massa`,`cost`,`img`,`letter`,`maxdur`,`isrep`)VALUES('$user[in_tower]','{$_SESSION['uid']}','Отчет о сканировании','200',1,0,'paper100.gif','{$rr}',1,0) ;");
	
	$bet=1;
}
?>