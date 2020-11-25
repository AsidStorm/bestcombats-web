<?php
include_once('../connect.php');
include_once('../functions.php');
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if($user['align']=='2.5')
{
	die();
}else{
	
	//Раздаем выйгрыши
	
	
	function get2str($key='', $val='') {
	  $get = $_GET;
	  if ( is_array($key) ) {
		if ( count($key)>0 ) foreach ( $key as $k=>$v ) $get[$k] = $v;
	  } else $get[$key] = $val;
	  if ( count($get)>0 ) {
		foreach ( $get as $k=>$v ) if ( empty($v) ) unset($get[$k]);
	  }
	  if ( count($get)>0 ) {
		foreach ( $get as $k=>$v ) $get[$k] = $k.'='.urlencode($v);
		return '?'.implode('&', $get);
	  }
	}

	$r = '';
	$time = 74; //сек до новой игры
	$status = 0; //статус игры, 2 - крутим колесо
	$win = array(
		0 => 0, //число выйгрыша
		1 => '', //линии выйгрыша
		2 => 0,  //сумма выйгрыша
		3 => 0,  //ставка на эту игру текущего игрока
		//ставки
		4 => '',
		//игроки которые делали ставки
		5 => ''
	);
	

	//Выделяем текущую игру, если её нет, то создаем новую
	$gid = mysql_fetch_array(mysql_query('SELECT * FROM `ruletka` WHERE (`end` = 0 OR `id` = "'.((int)$_GET['id']).'") ORDER BY `id` DESC LIMIT 1'));
	if($gid['time_start']+16>time() || isset($_GET['bet']))
	{
		$mnr = true;
	}
	$gid3 = mysql_fetch_array(mysql_query('SELECT * FROM `ruletka` WHERE `end` >0 AND `id` = "'.((int)$_GET['id']).'" ORDER BY `id` DESC LIMIT 1'));
	if(isset($gid3['id']))
	{
		$gid = $gid3;
		unset($gid3);
	}
	$add = false;
	if(isset($gid['id']))
	{
		//Игра существует, проверяем
		$time = $gid['time_start']-time();
		if($time<1)
		{
			//крутим колесо и заканчиваем игру + выдаем выйгрыш
			//mysql_query('UPDATE `ruletka` SET `end` = "'.time().'" WHERE `id` = "'.$gid['id'].'" LIMIT 1');
			//выводим предыдущий выйгрыш
			$win[0] = $gid['win'];
			$win[1] = $gid['win_line'];
			$win[2] = 0;
			$win[3] = 0;
			if($gid['end']==0)
			{
				$add = true;
			}
		}else{
			//ожидаем начала игры, делаем ставки
			if(isset($_GET['bet']))
			{
				$bt = $_GET['bet'];
				$good = 0;
				$i = 0;
				while($i<=38)
				{
					if($i==$bt)
					{
						$good++;
					}
					$i++;
				}
				
	/*
	Ставки и значения
	
	1, ... ,36 - ставка на числа [x8]
	
	2-4-6-8-10-11-13-15-17-20-22-24-26-28-29-31-33-35 - черное  [x2]
	1-3-5-7-9-12-14-16-18-19-21-23-25-27-30-32-34-36  - красное [x2]
	
	37 - два нуля [x36]
	38 - ноль     [x36]
	
	1-2-3-37-38 - потолок [x5]
	
	1-2-3-4-5-6-7-8-9-10-11-12          - 1 сектор [x3]
	13-14-15-16-17-18-19-20-21-22-23-24 - 2 сектор [x3]
	25-26-27-28-29-30-31-32-33-34-35-36 - 3 сектор [x3]
	
	*/
				
				if($bt == '2-4-6-8-10-11-13-15-17-20-22-24-26-28-29-31-33-35' && $good==0)
				{
					$good++;
				}elseif($bt == '1-3-5-7-9-12-14-16-18-19-21-23-25-27-30-32-34-36' && $good==0)
				{
					$good++;
				}elseif($bt == '1-2-3-37-38' && $good==0)
				{
					$good++;
				}elseif($bt == '1-2-3-4-5-6-7-8-9-10-11-12' && $good==0)
				{
					$good++;
				}elseif($bt == '13-14-15-16-17-18-19-20-21-22-23-24' && $good==0)
				{
					$good++;
				}elseif($bt == '25-26-27-28-29-30-31-32-33-34-35-36' && $good==0)
				{
					$good++;
				}
				$_GET['coin'] = (int)$_GET['coin'];
				if($_GET['coin']<1)
				{
					$good = 0;
				}
				if($_GET['coin']>$u->info['money'])
				{
					$good = 0;
				}
				if($good==1)
				{
					$u->info['money'] -= ((int)$_GET['coin']);
					mysql_query('UPDATE `users` SET `money` = '.$u->info['money'].' WHERE `id` = "'.$u->info['id'].'" LIMIT 1');
					mysql_query('INSERT INTO `ruletka_coin` (`uid`,`login`,`money`,`time`,`game_id`,`win2`) VALUES ("'.$u->info['id'].'","'.$u->info['login'].'","'.$_GET['coin'].'","'.time().'","'.$gid['id'].'","'.$bt.'")');
				}
			}
		}		
	}else{
		$add = true;
	}
	
			//обновляем ставки
			$pos = array(
				0 => '2-4-6-8-10-11-13-15-17-20-22-24-26-28-29-31-33-35',
				1 => '1-3-5-7-9-12-14-16-18-19-21-23-25-27-30-32-34-36',
				2 => '1-2-3-37-38',
				3 => '1-2-3-4-5-6-7-8-9-10-11-12',
				4 => '13-14-15-16-17-18-19-20-21-22-23-24',
				5 => '25-26-27-28-29-30-31-32-33-34-35-36'				
			);
			
			function testCoin($s,$stt)
			{
				global $u,$win;
				$sp = mysql_query('SELECT * FROM `ruletka_coin` WHERE `game_id` = "'.$s.'" AND `money` > 0 AND `win2` = "'.$stt.'" AND `uid` != "'.$u->info['id'].'"');
				$cr = 0; $am = 0;
				$usr = ''; $lu = array();
				while($pl = mysql_fetch_array($sp))
				{
					$cr = $pl['money'];
					if(!isset($lu[$pl['uid']]) && count($lu)<4)
					{
						$usr .= '-'.$pl['money'];
						$lu[$pl['uid']] = true;
					}
					$am++;
				}
				$us = 0; //Ставка игрока
				$sp = mysql_query('SELECT * FROM `ruletka_coin` WHERE `game_id` = "'.$s.'" AND `money` > 0 AND `win2` = "'.$stt.'" AND `uid` = "'.$u->info['id'].'" LIMIT 100');
				while($pl = mysql_fetch_array($sp))
				{
					$cr = $pl['money'];
					$us += $pl['money'];
					$am++;
				}
				$i = 0;
				while($i<4)
				{
					if($i > count($lu))
					{
						$usr .= '-0';
					}
					$i++;
				}
				if($am>0)
				{
					$win[4] .= $stt.'|'.$cr.'-'.$us.''.$usr.',';				
				}
			}
			
			//ставки на числа
			$i = 1;
			while($i<=38)
			{
				testCoin($gid['id'],$i);
				$i++;
			}
			//комбинированные ставки
			$i = 0;
			while($i<count($pos))
			{
				testCoin($gid['id'],$pos[$i]);
				$i++;
			}
	
	if($add==true)
	{
		//создаем новую игру
		$gid2 = array('id'=>0,'room'=>$u->info['room'],'time'=>time(),'time_start'=>time()+74,'win'=>rand(1,38),'win_line'=>'','end'=>0);
		$ins = mysql_query('INSERT INTO `ruletka` (`room`,`time`,`time_start`,`win`,`win_line`) VALUES ("'.$gid2['room'].'","'.$gid2['time'].'","'.$gid2['time_start'].'","'.$gid2['win'].'","'.$gid2['win_line'].'")');
		$gid2['id'] = mysql_insert_id();
		if($ins)
		{
			$gid = $gid2;
		}
		unset($gid2);
	}
	
		//обновляем выйгрыши
		$sp = mysql_query('SELECT * FROM `ruletka` WHERE `end` = "0" AND `time_start` <= '.time().'');
		while($pl = mysql_fetch_array($sp))
		{			
			$end = mysql_query('UPDATE `ruletka` SET `end` = "'.time().'" WHERE `id` = "'.$pl['id'].'" LIMIT 1');			
			if($end)
			{
				//выдаем выйгрышь
				$sp2 = mysql_query('SELECT * FROM `ruletka_coin` WHERE `end` = "0" AND `game_id` = "'.$pl['id'].'"');
				while($pl2 = mysql_fetch_array($sp2))
				{
					$upd = mysql_query('UPDATE `ruletka_coin` SET `end` = "'.time().'" WHERE `id` = "'.$pl2['id'].'" LIMIT 1');
					if($upd)
					{
						$wn = 0; $wn2 = 0;					
						if($pl2['win2']==$pl['win'])
						{
							$wn++;
						}else{
							$i = 0; $j = explode('-',$pl2['win2']);
							while($i<count($j))
							{
								if($j[$i]==$pl['win'])
								{
									$wn2++;
								}
								$i++;
							}
						}
						if($wn>0)
						{
							//перечисляем деньги [x8], если зеро то [x36]
							if($pl['win']>36)
							{
								$nmn = ((int)$pl2['money']*36);
							}else{
								$nmn = ((int)$pl2['money']*24);
							}
							mysql_query('UPDATE `users` SET `money` = `money` + "'.$nmn.'" WHERE `id` = "'.$pl2['uid'].'" LIMIT 1');
						}elseif($wn2>0)
						{
							//перечисляем деньги по определенной формуле
							$nmn = ((int)$pl2['money']*2);
							mysql_query('UPDATE `users` SET `money` = `money` + "'.$nmn.'" WHERE `id` = "'.$pl2['uid'].'" LIMIT 1');
						}else{
							//проиграли
							mysql_query('UPDATE `ruletka_coin` SET `end` = "1" WHERE `id` = "'.$pl['id'].'" LIMIT 1');
						}
					}
				}
			}
		}
	if(isset($gid['id']))
	{
		if($time<0)
		{
			$time = 0;
		}
		//Выбираем статус игры
		if($time>0)
		{
			//делаем ставки
			$status = 1;
			$sp = mysql_query('SELECT * FROM `ruletka_coin` WHERE `end` = "0" AND `uid` = "'.$u->info['id'].'" AND `game_id` = "'.$gid['id'].'"');
			$win[3] = 0;
			while($pl = mysql_fetch_array($sp))
			{
				$win[3] += $pl['money'];
			}
		}else{
			//играем
			$status = 2;
			//выводим выйгрыш + ставку
			$sp = mysql_query('SELECT * FROM `ruletka_coin` WHERE `end` > "0" AND `uid` = "'.$u->info['id'].'" AND `game_id` = "'.$gid['id'].'"');
			$win[2] = 0;
			while($pl = mysql_fetch_array($sp))
			{
				$win[2] += $pl['money'];
				$win[3] += $pl['money'];
				$win[1] += $pl['money'];
			}
		}
		if($win[0]>0)
		{
			unset($mnr);
		}
		if(isset($mnr))
		{
			$mnr = '&cash='.floor($u->info['money']);
		}
		$r = 'time='.$time.'&game='.$gid['id'].''.$mnr.'&betsum='.$win[3].'&status='.$status.'&players='.$win[5].'&bets='.$win[4].'&win='.$win[0].'&wbets='.$win[1].'&wmoney='.$win[2].'';
		echo $r;
	}
}
?>