<?
//If ($_SERVER['REMOTE_ADDR']!='176.37.62.46'){die();}
include "../connect.php";

$user_stek = db_query("SELECT * FROM `users` WHERE `bot` ='0' and `id`>=11000 and `align`<>2.5 and user_id=0 and login<>'Лич' and login<>'Дед Мороз'  and login<>'Технический' and vid=0 and block=0 and battle=0 ");
	$expstats = array(
						/*   nextup,summstats*/
						"20" => 3,
						"45" => 4,
						"75" => 5,
						"110" => 6,
						"160" => 9, //1лвл
						"215" => 10,
						"280" => 11,
						"350" => 12,
						"410" => 13,
						"530" => 16,//2лвл
						"670" => 17,
						"830" => 18,
						"950" => 19,
						"1100" => 20,
						"1300" => 21,
						"1450" => 24, //3лвл
						"1650" => 25,
						"1850" => 26,
						"2050" => 27,
						"2200" => 28,
						"2500" => 29,
						"2900" => 34, //4лвл
						"3350" => 35,
						"3800" => 36,
						"4200" => 37,
						"4600" => 38,
						"5000" => 39,
						"6000" => 42, //5лвл
						"7000" => 43,
						"8000" => 44,
						"9000" => 45,
						"10000" => 46,
						"11000" => 47,
						"12000" => 48,
						"12500" => 49,
						"14000" => 52, //6лвл
						"15500" => 53,
						"17000" => 54,
						"19000" => 55,
						"21000" => 56,
						"23000" => 57,
						"27000" => 58,
						"30000" => 59,
						"60000" => 64, //7лвл
						"75000" => 65,
						"150000" => 66,
						"175000" => 67,
						"200000" => 68,
						"225000" => 69,
						"250000" => 70,
						"260000" => 71,
						"280000" => 72,
						"300000" => 73,
						
						"400000" => 78,
						"500000" => 78,
						"600000" => 78,
						"700000" => 78,
						"800000" => 78,
						"900000" => 78,//8лвл
						"1000000" => 78,
						"1200000" => 78,
						
						"1500000" => 78,
						"1750000" => 79,
						"2000000" => 80,
						"2175000" => 81,
						"2300000" => 82,
						"2400000" => 83,
						"2500000" => 84,
						"2600000" => 85,
						"2800000" => 86,
						"3000000" => 87,
						
						"4500000" => 94,//9лвл
						
						"6000000" => 94,//9лвл
						"6500000" => 95,
						"7500000" => 96,
						"8500000" => 97,
						"9000000" => 98,
						"9250000" => 99,
						"9500000" => 100,
						"9750000" => 101,
						"9900000" => 102,
						"10000000" => 103,
						"13000000" => 112,//10лвл
						"14000000" => 114,
						"15000000" => 116,
						"16000000" => 118,
						"17000000" => 120,
						"17500000" => 122,
						"18000000" => 124,
						"19000000" => 126,
						"19500000" => 128,
						"20000000" => 130,
                        "30000000" => 132,
                        "32000000" => 134,
                        "34000000" => 136,
                        "35000000" => 138,
                        "36000000" => 140,
                        "38000000" => 142,
                        "40000000" => 144,
                        "42000000" => 146,
                        "44000000" => 148,
                        "45000000" => 150,
                        "46000000" => 152,
                        "48000000" => 154,
                        "50000000" => 156,
                        "52000000" => 158,
                        "55000000" => 168,//11лвл
                        "60000000" => 169,
                        "65000000" => 170,
                        "70000000" => 171,
                        "75000000" => 172,
                        "80000000" => 173,
                        "85000000" => 174,
                        "90000000" => 175,
                        "95000000" => 176,
                        "100000000" => 191
				);

echo "<table border=1 cellpadding=3 cellspacing=3>";
while ($user=mysqli_fetch_array($user_stek)){
	$summstat= $user['sila']+$user['lovk']+$user['inta']+$user['vinos']+$user['intel']+$user['mudra']+$user['spirit'];
	$sum_wear   = mysqli_fetch_array(db_query("select SUM(gsila),SUM(glovk),SUM(ginta),SUM(gintel) FROM inventory WHERE owner = ".$user['id']." AND dressed=1"));
	$sum_effect = mysqli_fetch_array(db_query("select SUM(sila),SUM(lovk),SUM(inta),SUM(intel) FROM effects WHERE owner = ".$user['id']." "));
	
	$travma = mysqli_num_rows(db_query("SELECT id FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type` = 11 OR `type` = 12 OR `type` = 14 OR `type` = 13);"));
	
	If ($user['login']=='Copone' or $summstat+$user['stats']<>$user['ptp_stat']+$user['level']+12+$expstats[$user['nextup']]+$sum_wear[0]+$sum_wear[1]+$sum_wear[2]+$sum_wear[3]+$sum_effect[0]+$sum_effect[1]+$sum_effect[2]+$sum_effect[3] and empty($travma)){
		echo  "<tr>
					<td>".$user['login']."<a href='/inf.php?".$user['id']."' target='_blank'><img src='/i/inf.gif'></a></td>
					<td>статов:".($summstat+$user['stats'])."</td>
					<td> должно быть:".($user['level']+12+$expstats[$user['nextup']]+$sum_wear[0]+$sum_wear[1]+$sum_wear[2]+$sum_wear[3]+$sum_effect[0]+$sum_effect[1]+$sum_effect[2]+$sum_effect[3])."</td>
					<td>Аповые: ".$expstats[$user['nextup']]."</td>
					<td>Родные: ".($summstat-$sum_wear[0]-$sum_wear[1]-$sum_wear[2]-$sum_wear[3]-$sum_effect[0]-$sum_effect[1]-$sum_effect[2]-$sum_effect[3]-12-$user['level'])."</td>
					<td>Вещи: ".($sum_wear[0]+$sum_wear[1]+$sum_wear[2]+$sum_wear[3])."</td>
					<td>Эффекты: ".($sum_effect[0]+$sum_effect[1]+$sum_effect[2]+$sum_effect[3])."</td>
					<td>Не раскинуто ".$user['stats']."</td>
					<td>Пещерные ".$user['ptp_stat']."</td>
					<td>Лишних: ".($summstat+$user['stats']-($user['level']+12+$expstats[$user['nextup']]+$sum_wear[0]+$sum_wear[1]+$sum_wear[2]+$sum_wear[3]+$sum_effect[0]+$sum_effect[1]+$sum_effect[2]+$sum_effect[3]))."</td>
			  </tr>";
	
	}
	
}

echo "</table>";




?>