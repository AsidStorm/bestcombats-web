<?php
include "../connect.php";

$name_podzem='Бездна 3-Этаж'; 

$podzem2=mysqli_fetch_array(db_query("SELECT * from `podzem2` where `name`='".$name_podzem."' LIMIT 1;"));
$podzem3=mysqli_fetch_array(db_query("SELECT * from `podzem3` where `name`='".$name_podzem."' and `glava`='default' LIMIT 1;"));
$podzem4=mysqli_fetch_array(db_query("SELECT * from `podzem4` where `name`='".$name_podzem."' and `glava`='default' LIMIT 1;"));
$free1 = '';  $free2 = ''; $free3 = ''; $free4 = ''; $free5='';

echo "<table border=1>";

for ($i=20;$i>=1;$i--){
	echo "<tr>";
	for ($j=1;$j<=20;$j++){
		If (!empty($podzem2[$i."-".$j])){
			echo "<td bgcolor=#00CCCC height=30 width=30 align=center>".$i."-".$j."</td>";
			If (empty($podzem4[$i."-".$j])){$free1.="\"".$i."-".$j."\",";}
			If (empty($podzem3[$i."-".$j])){$free2.="\"".$i."-".$j."\",";}
			If (empty($podzem4[$i."-".$j]) and empty($podzem3[$i."-".$j])){$free3.="\"".$i."-".$j."\",";}
			If (!empty($podzem3[$i."-".$j])){$free4.="\"".$i."-".$j."\",";}
			$free5.="\"".$i."-".$j."\",";
		}else{
			echo "<td height=30 width=30></td>";
		}
	}
		echo "</tr>";
}
echo "</table>";

echo "<b>Зоны где нет предметов:</b> ".substr($free1,0,strlen($free1)-1)."<br/>";
echo "<b>Зоны где нет монстров:</b> ".substr($free2,0,strlen($free2)-1)."<br/>";
echo "<b>Зоны где нет пр. и мо.: </b> ".substr($free3,0,strlen($free3)-1)."<br/>";
echo "<b>Зоны где монстры: </b> ".substr($free4,0,strlen($free4)-1)."<br/>";
echo "<b>Зоны: </b> ".substr($free5,0,strlen($free5)-1)."<br/>";
?>