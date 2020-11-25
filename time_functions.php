<?php

function getDateInterval_($pointDate)
{
   $pointNow = time(); // �������� ����� �������� �������

   $times = array('year' => 60*60*24*365, 'month' =>60*60*24*31, 'week' =>60*60*24*7, 'day' => 60*60*24, 'hour' => 60*60, 'minute' => 60);

   $pointInterval = $pointDate > $pointNow ? $pointDate - $pointNow : $pointNow - $pointDate; // �������� ����� �������� ���� ���

   $returnDate = array(); // ������ ���� ������ ������ ������������ ����

   $returnDate['year'] = floor($pointInterval / $times['year']); // ����������� ����
   $pointInterval = $pointInterval % $times['year']; // ������� �������

   $returnDate['month'] = floor($pointInterval / $times['month']); // ����������� ������
   $pointInterval = $pointInterval % $times['month']; // ������� �������

   $returnDate['week'] = floor($pointInterval / $times['week']); // ����������� ������
   $pointInterval = $pointInterval % $times['week']; // ������� �������

   $returnDate['day'] = floor($pointInterval / $times['day']); // ����������� ���
   $pointInterval = $pointInterval % $times['day']; // ������� �������

   $returnDate['hour'] = floor($pointInterval / $times['hour']); // ����������� ����
   $pointInterval = $pointInterval % $times['hour']; // ������� �������

   $returnDate['minute'] = floor($pointInterval / $times['minute']); // ����������� ������
   $pointInterval = $pointInterval % $times['minute']; // ������� �������

   return $returnDate;
}


function date_time_left($_date) {
	$date = getDateInterval_($_date);
	
	function year_text_($days) { # ��������� ����� "���"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ��� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." ��� ";}
		elseif ($s==1) {return $days." ��� ";}
		elseif ($s>=2 && $s<=4) {return $days." ���� ";}
		}
	}
	function month_text_($days) { # ��������� ����� "�����"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ������� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." ������� ";}
		elseif ($s==1) {return $days." ����� ";}
		elseif ($s>=2 && $s<=4) {return $days." ������ ";}
		}
	}
	function week_text_($days) { # ��������� ����� "������"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ������ ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." ������ ";}
		elseif ($s==1) {return $days." ������ ";}
		elseif ($s>=2 && $s<=4) {return $days." ������ ";}
		}
	}
	function days_text_($days) { # ��������� ����� "����"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ���� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." ���� ";}
		elseif ($s==1) {return $days." ���� ";}
		elseif ($s>=2 && $s<=4) {return $days." ��� ";}
		}
	}
	function hour_text_($days) { # ��������� ����� "���"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ����� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "";}
		elseif ($s==0 or $s>=5) {return $days." ����� ";}
		elseif ($s==1) {return $days." ��� ";}
		elseif ($s>=2 && $s<=4) {return $days." ���� ";}
		}
	}
	function minute_text_($days) { # ��������� ����� "������"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ����� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "1 ������";}
		elseif ($s==0 or $s>=5) {return $days." ����� ";}
		elseif ($s==1) {return $days." ������ ";}
		elseif ($s>=2 && $s<=4) {return $days." ������ ";}
		}
	}
	function sec_text_($days) { # ��������� ����� "�������"
		$s=substr($days,strlen($days)-1,1);
		if (strlen($days)>=2) {
			if (substr($days,strlen($days)-2,1)=='1') {return $days." ����� ";$ok=true;}
		}if (!$ok) {
			if ($days==0){return "1 �������";}
		elseif ($s==0 or $s>=5) {return $days." ������ ";}
		elseif ($s==1) {return $days." ������� ";}
		elseif ($s>=2 && $s<=4) {return $days." ������� ";}
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