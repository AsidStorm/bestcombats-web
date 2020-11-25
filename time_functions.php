<?php

function getDateInterval_($pointDate)
{
   $pointNow = time(); // получили метку текущего времени

   $times = array('year' => 60*60*24*365, 'month' =>60*60*24*31, 'week' =>60*60*24*7, 'day' => 60*60*24, 'hour' => 60*60, 'minute' => 60);

   $pointInterval = $pointDate > $pointNow ? $pointDate - $pointNow : $pointNow - $pointDate; // получили метку разности двух дат

   $returnDate = array(); // создаём пока пустой массив возвращаемой даты

   $returnDate['year'] = floor($pointInterval / $times['year']); // высчитываем годы
   $pointInterval = $pointInterval % $times['year']; // находим остаток

   $returnDate['month'] = floor($pointInterval / $times['month']); // высчитываем месяцы
   $pointInterval = $pointInterval % $times['month']; // находим остаток

   $returnDate['week'] = floor($pointInterval / $times['week']); // высчитываем недели
   $pointInterval = $pointInterval % $times['week']; // находим остаток

   $returnDate['day'] = floor($pointInterval / $times['day']); // высчитываем дни
   $pointInterval = $pointInterval % $times['day']; // находим остаток

   $returnDate['hour'] = floor($pointInterval / $times['hour']); // высчитываем часы
   $pointInterval = $pointInterval % $times['hour']; // находим остаток

   $returnDate['minute'] = floor($pointInterval / $times['minute']); // высчитываем минуты
   $pointInterval = $pointInterval % $times['minute']; // находим остаток

   return $returnDate;
}


function date_time_left($_date) {
	$date = getDateInterval_($_date);
	
	function year_text_($days) { # склонение слова "год"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." лет ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." лет ";}
		elseif ($s==1) {return $days." год ";}
		elseif ($s>=2 && $s<=4) {return $days." года ";}
		}
	}
	function month_text_($days) { # склонение слова "месяц"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." месяцев ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." месяцев ";}
		elseif ($s==1) {return $days." месяц ";}
		elseif ($s>=2 && $s<=4) {return $days." месяца ";}
		}
	}
	function week_text_($days) { # склонение слова "неделя"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." недель ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." недель ";}
		elseif ($s==1) {return $days." неделю ";}
		elseif ($s>=2 && $s<=4) {return $days." недели ";}
		}
	}
	function days_text_($days) { # склонение слова "дней"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." дней ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." дней ";}
		elseif ($s==1) {return $days." день ";}
		elseif ($s>=2 && $s<=4) {return $days." дня ";}
		}
	}
	function hour_text_($days) { # склонение слова "час"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." часов ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." часов ";}
		elseif ($s==1) {return $days." час ";}
		elseif ($s>=2 && $s<=4) {return $days." часа ";}
		}
	}
	function minute_text_($days) { # склонение слова "минута"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." минут ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "1 минуту";}
		elseif ($s==0 or $s>=5) {return $days." минут ";}
		elseif ($s==1) {return $days." минуту ";}
		elseif ($s>=2 && $s<=4) {return $days." минуты ";}
		}
	}
	function sec_text_($days) { # склонение слова "секунда"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." минут ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "1 секунду";}
		elseif ($s==0 or $s>=5) {return $days." секунд ";}
		elseif ($s==1) {return $days." секунду ";}
		elseif ($s>=2 && $s<=4) {return $days." секунды ";}
		}
	}


	$year = year_text_($date['year']);
	$month = month_text_($date['month']);
	$week = week_text_($date['week']);
	$days = days_text_($date['day']);
	$hour = hour_text_($date['hour']);
	$minute = minute_text_($date['minute']);
	$sec = sec_text_($date['sec']);



	if ($days>0 or $week>0 or $month>0 or $year>0 or $sec>0){$sec="";}
	if ($days>0 or $week>0 or $month>0 or $year>0){$minute="";}
	if ($week>0 or $month>0 or $year>0){$hour="";}
	if ($month>0 or $year>0){$week="";}
	 return $year.$month.$week.$days.$hour.$minute.$sec;
}
?>