<?
if($is_main!='is') die();
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<script>
var main_uid= 'main';
var delay = 10;		// Каждые n сек. увеличение HP на 1%
</script>
<script type="text/javascript" src="http://img.bestcombats.net/js/inf.0.104.js?<?=mt_rand(1436,1293286936)/10000000000?>" charset="utf-8"></script>
<link rel="stylesheet" href="http://img.bestcombats.net/css/jquery.tooltip.css" />
<script src="http://img.bestcombats.net/js/lib/jquery.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="http://img.bestcombats.net/js/jquery.tooltip.js" type="text/javascript"></script>
<SCRIPT>
$(function() {
$('img').tooltip({
showURL: false
});

});
$(function() {
$('span').tooltip({
showURL: false
});

});
</SCRIPT>
</HEAD>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 onLoad='setHP(<?=$user['hp']?>,<?=$user['maxhp']?>,<?if (!$user['battle']){echo"10";}else{echo"0";}?>)'>
<table width=100%>
	<tr>
		<td>
			<h3>Выбрать образ персонажа "<?=$user['login']?>"</h3>
		</td>
	</tr>
	<tr>
		<td align=right>
			<INPUT TYPE=button value="Вернуться" onClick="location.href='main.php?edit=0.467837356797105';">
		</td>
	</tr>
</table>

<center>
<TABLE border="0" cellpadding="0" cellspacing="12" >
<?
If($user['sex']==1){
	$shadow=mysql_query("SELECT * FROM `shadows_m` where `nlogin`='' and nclan=''  order by nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,noj,mec,topor,dubina,posoh,mfire,mwater,mair,mearth,mlight,mgray,mdark;");
	$i=9;
	while($work=mysql_fetch_array($shadow)){
		if ($i==9){
			echo "<TR>";
		}
		
		if($work['nlevel']>0 or $work['nsila']>0 or $work['nlovk']>0 or $work['ninta']>0 or $work['nvinos']>0 or $work['nintel']>0 or $work['nmudra']>0  or $work['noj']>0  or $work['mec']>0  or $work['topor']>0  or $work['dubina']>0  or $work['posoh']>0  or $work['mfire']>0  or $work['mwater']>0  or $work['mair']>0  or $work['mearth']>0  or $work['mlight']>0  or $work['mgray']>0  or $work['mdark']>0 ){
			   
			   $ss="<b>Выбрать этот образ</b><BR>Мин. хар-ки c вещами:";	
			   
				If($work['nlevel']>0){
					If($user['level']>=$work['nlevel']){
						$ss=$ss."<br>&bull; Уровень:".$work['nlevel'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Уровень:".$work['nlevel']."</font>";				
					}
				}
				
				If($work['nsila']>0){
					If($user['sila']>=$work['nsila']){
						$ss=$ss."<br>&bull; Сила:".$work['nsila'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Сила:".$work['nsila']."</font>";				
					}
				}
				If($work['nlovk']>0){
					If($user['lovk']>=$work['nlovk']){
						$ss=$ss."<br>&bull; Ловкость:".$work['nlovk'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Ловкость:".$work['nlovk']."</font>";				
					}
				}
				If($work['ninta']>0){
					If($user['inta']>=$work['ninta']){
						$ss=$ss."<br>&bull; Интуиция:".$work['ninta'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Интуиция:".$work['ninta']."</font>";				
					}
				}			
				If($work['nvinos']>0){
					If($user['vinos']>=$work['nvinos']){
						$ss=$ss."<br>&bull; Выносливость:".$work['nvinos'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Выносливость:".$work['nvinos']."</font>";				
					}
				}			
				If($work['nintel']>0){
					If($user['intel']>=$work['nintel']){
						$ss=$ss."<br>&bull; Интеллект:".$work['nintel'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Интеллект:".$work['nintel']."</font>";				
					}
				}
				If($work['nmudra']>0){
					If($user['mudra']>=$work['nmudra']){
						$ss=$ss."<br>&bull; Мудрость:".$work['nmudra'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Мудрость:".$work['nmudra']."</font>";				
					}
				}


				If($work['noj']>0){
					If($user['noj']>=$work['noj']){
						$ss=$ss."<br>&bull; Владение ножами, кастетами:".$work['noj'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение ножами, кастетами:".$work['noj']."</font>";				
					}
				}

				If($work['mec']>0){
					If($user['mec']>=$work['mec']){
						$ss=$ss."<br>&bull; Владение мечами:".$work['mec'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение мечами:".$work['mec']."</font>";				
					}
				}
				
			    If($work['topor']>0){
					If($user['topor']>=$work['topor']){
						$ss=$ss."<br>&bull; Владение топорами, секирами:".$work['topor'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение топорами, секирами:".$work['topor']."</font>";				
					}
				}
				
				If($work['dubina']>0){
					If($user['dubina']>=$work['dubina']){
						$ss=$ss."<br>&bull; Владение дубинами, булавами:".$work['dubina'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение дубинами, булавами:".$work['dubina']."</font>";				
					}
				}
				
				If($work['posoh']>0){
					If($user['posoh']>=$work['posoh']){
						$ss=$ss."<br>&bull; Владение посохами:".$work['posoh'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение посохами:".$work['posoh']."</font>";				
					}
				}
				
				If($work['mfire']>0){
					If($user['mfire']>=$work['mfire']){
						$ss=$ss."<br>&bull; Вл.магией огня:".$work['mfire'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией огня:".$work['mfire']."</font>";				
					}
				}
				
				If($work['mwater']>0){
					If($user['mwater']>=$work['mwater']){
						$ss=$ss."<br>&bull; Вл.магией воды:".$work['mwater'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией воды:".$work['mwater']."</font>";				
					}
				}
				
				If($work['mair']>0){
					If($user['mair']>=$work['mair']){
						$ss=$ss."<br>&bull; Вл.магией воздуха:".$work['mair'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией воздуха:".$work['mair']."</font>";				
					}
				}
				
				If($work['mearth']>0){
					If($user['mearth']>=$work['mearth']){
						$ss=$ss."<br>&bull; Вл.магией земли:".$work['mearth'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией земли:".$work['mearth']."</font>";				
					}
				}
				
				
				If($work['mlight']>0){
					If($user['mlight']>=$work['mlight']){
						$ss=$ss."<br>&bull; Вл.магией света:".$work['mlight'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией света:".$work['mlight']."</font>";				
					}
				}
				
				If($work['mgray']>0){
					If($user['mgray']>=$work['mgray']){
						$ss=$ss."<br>&bull; Вл. серой магиии:".$work['mgray'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл. серой магиии:".$work['mgray']."</font>";				
					}
				}
				
				If($work['mdark']>0){
					If($user['mdark']>=$work['mdark']){
						$ss=$ss."<br>&bull; Вл.магией тьмы:".$work['mdark'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией тьмы:".$work['mdark']."</font>";				
					}
				}
				
				if($user['level']>=$work['nlevel'] and $user['sila']>=$work['nsila'] and $user['lovk']>=$work['nlovk'] and $user['inta']>=$work['ninta'] and $user['vinos']>=$work['nvinos'] and $user['intel']>=$work['nintel'] and $user['mudra']>=$work['nmudra']  and $user['noj']>=$work['noj']  and $user['mec']>=$work['mec']  and $user['topor']>=$work['topor']  and $user['dubina']>=$work['dubina']  and $user['posoh']>=$work['posoh']  and $user['mfire']>=$work['mfire']  and $user['mwater']>=$work['mwater']  and $user['mair']>=$work['mair']  and $user['mearth']>=$work['mearth']  and $user['mlight']>=$work['mlight']  and $user['mgray']>=$work['mgray']  and $user['mdark']>=$work['mdark']){
					echo "<td><a href=\"?edit=1&obraz=".$work['img']."\"><img src=\"http://img.bestcombats.net/shadow/1/".$work['img']."\" alt=\"$ss\"></a></td>";
				}else{
					echo "<td><img src=\"http://img.bestcombats.net/shadow/1/b/b-".$work['img']."\" alt=\"$ss\"></td>";		
				}
		}else{
			echo "<td><a href=\"?edit=1&obraz=".$work['img']."\"><img src=\"http://img.bestcombats.net/shadow/1/".$work['img']."\" alt=\"Выбрать этот образ\"></a></td>";
		}

		$i=$i-1;
		if ($i==0){
			echo "</TR>";
			$i=9;
		}
	}
	
	$shadow_spec=mysql_query("SELECT * FROM `shadows_m` where `nlogin`='".$user['login']."' or (`nclan`='".$user['klan']."' and '".$user['klan']."'<>'')  order by nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,noj,mec,topor,dubina,posoh,mfire,mwater,mair,mearth,mlight,mgray,mdark;");
	If (mysql_num_rows($shadow_spec)>0){
		$i=9;
		echo "</table><br/><center><h3>Специальные образы</h3></center><br/>
			  <TABLE border='0' cellpadding='0' cellspacing='12' ><tr>";
		while ($shadow_spec_w=mysql_fetch_array($shadow_spec)){
			if ($i==9){echo "<TR>";}
			echo "<td><a href=\"?edit=1&obraz=".$shadow_spec_w['img']."\"><img src=\"http://img.bestcombats.net/shadow/1/".$shadow_spec_w['img']."\" alt=\"Выбрать этот образ\"></a></td>";
			$i=$i-1;
			if ($i==0){echo "</TR>";$i=9;}				
		}
		echo "</tr></table>";
	}
}else{
	$shadow=mysql_query("SELECT * FROM `shadows_w` order by nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,noj,mec,topor,dubina,posoh,mfire,mwater,mair,mearth,mlight,mgray,mdark;");
	$i=9;
	while($work=mysql_fetch_array($shadow)){
		if ($i==9){
			echo "<TR>";
		}
		
		if($work['nlevel']>0 or $work['nsila']>0 or $work['nlovk']>0 or $work['ninta']>0 or $work['nvinos']>0 or $work['nintel']>0 or $work['nmudra']>0  or $work['noj']>0  or $work['mec']>0  or $work['topor']>0  or $work['dubina']>0  or $work['posoh']>0  or $work['mfire']>0  or $work['mwater']>0  or $work['mair']>0  or $work['mearth']>0  or $work['mlight']>0  or $work['mgray']>0  or $work['mdark']>0 ){
			   
			   $ss="<b>Выбрать этот образ</b><BR>Мин. хар-ки c вещами:";	
			   
				If($work['nlevel']>0){
					If($user['level']>=$work['nlevel']){
						$ss=$ss."<br>&bull; Уровень:".$work['nlevel'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Уровень:".$work['nlevel']."</font>";				
					}
				}
				
				If($work['nsila']>0){
					If($user['sila']>=$work['nsila']){
						$ss=$ss."<br>&bull; Сила:".$work['nsila'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Сила:".$work['nsila']."</font>";				
					}
				}
				If($work['nlovk']>0){
					If($user['lovk']>=$work['nlovk']){
						$ss=$ss."<br>&bull; Ловкость:".$work['nlovk'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Ловкость:".$work['nlovk']."</font>";				
					}
				}
				If($work['ninta']>0){
					If($user['inta']>=$work['ninta']){
						$ss=$ss."<br>&bull; Интуиция:".$work['ninta'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Интуиция:".$work['ninta']."</font>";				
					}
				}			
				If($work['nvinos']>0){
					If($user['vinos']>=$work['nvinos']){
						$ss=$ss."<br>&bull; Выносливость:".$work['nvinos'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Выносливость:".$work['nvinos']."</font>";				
					}
				}			
				If($work['nintel']>0){
					If($user['intel']>=$work['nintel']){
						$ss=$ss."<br>&bull; Интеллект:".$work['nintel'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Интеллект:".$work['nintel']."</font>";				
					}
				}
				If($work['nmudra']>0){
					If($user['mudra']>=$work['nmudra']){
						$ss=$ss."<br>&bull; Мудрость:".$work['nmudra'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Мудрость:".$work['nmudra']."</font>";				
					}
				}


				If($work['noj']>0){
					If($user['noj']>=$work['noj']){
						$ss=$ss."<br>&bull; Владение ножами, кастетами:".$work['noj'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение ножами, кастетами:".$work['noj']."</font>";				
					}
				}

				If($work['mec']>0){
					If($user['mec']>=$work['mec']){
						$ss=$ss."<br>&bull; Владение мечами:".$work['mec'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение мечами:".$work['mec']."</font>";				
					}
				}
				
			    If($work['topor']>0){
					If($user['topor']>=$work['topor']){
						$ss=$ss."<br>&bull; Владение топорами, секирами:".$work['topor'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение топорами, секирами:".$work['topor']."</font>";				
					}
				}
				
				If($work['dubina']>0){
					If($user['dubina']>=$work['dubina']){
						$ss=$ss."<br>&bull; Владение дубинами, булавами:".$work['dubina'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение дубинами, булавами:".$work['dubina']."</font>";				
					}
				}
				
				If($work['posoh']>0){
					If($user['posoh']>=$work['posoh']){
						$ss=$ss."<br>&bull; Владение посохами:".$work['posoh'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Владение посохами:".$work['posoh']."</font>";				
					}
				}
				
				If($work['mfire']>0){
					If($user['mfire']>=$work['mfire']){
						$ss=$ss."<br>&bull; Вл.магией огня:".$work['mfire'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией огня:".$work['mfire']."</font>";				
					}
				}
				
				If($work['mwater']>0){
					If($user['mwater']>=$work['mwater']){
						$ss=$ss."<br>&bull; Вл.магией воды:".$work['mwater'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией воды:".$work['mwater']."</font>";				
					}
				}
				
				If($work['mair']>0){
					If($user['mair']>=$work['mair']){
						$ss=$ss."<br>&bull; Вл.магией воздуха:".$work['mair'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией воздуха:".$work['mair']."</font>";				
					}
				}
				
				If($work['mearth']>0){
					If($user['mearth']>=$work['mearth']){
						$ss=$ss."<br>&bull; Вл.магией земли:".$work['mearth'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией земли:".$work['mearth']."</font>";				
					}
				}
					
				If($work['mlight']>0){
					If($user['mlight']>=$work['mlight']){
						$ss=$ss."<br>&bull; Вл.магией света:".$work['mlight'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией света:".$work['mlight']."</font>";				
					}
				}
				
				If($work['mgray']>0){
					If($user['mgray']>=$work['mgray']){
						$ss=$ss."<br>&bull; Вл. серой магиии:".$work['mgray'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл. серой магиии:".$work['mgray']."</font>";				
					}
				}
				
				If($work['mdark']>0){
					If($user['mdark']>=$work['mdark']){
						$ss=$ss."<br>&bull; Вл.магией тьмы:".$work['mdark'];
					}else{
						$ss=$ss."<br>&bull; <font color=red>Вл.магией тьмы:".$work['mdark']."</font>";				
					}
				}
				
				if($user['level']>=$work['nlevel'] and $user['sila']>=$work['nsila'] and $user['lovk']>=$work['nlovk'] and $user['inta']>=$work['ninta'] and $user['vinos']>=$work['nvinos'] and $user['intel']>=$work['nintel'] and $user['mudra']>=$work['nmudra']  and $user['noj']>=$work['noj']  and $user['mec']>=$work['mec']  and $user['topor']>=$work['topor']  and $user['dubina']>=$work['dubina']  and $user['posoh']>=$work['posoh']  and $user['mfire']>=$work['mfire']  and $user['mwater']>=$work['mwater']  and $user['mair']>=$work['mair']  and $user['mearth']>=$work['mearth']  and $user['mlight']>=$work['mlight']  and $user['mgray']>=$work['mgray']  and $user['mdark']>=$work['mdark']){
					echo "<td><a href=\"?edit=1&obraz=".$work['img']."\"><img src=\"http://img.bestcombats.net/shadow/0/".$work['img']."\" alt=\"$ss\"></a></td>";
				}else{
					echo "<td><img src=\"http://img.bestcombats.net/shadow/0/b/b-".$work['img']."\" alt=\"$ss\"></td>";		
				}
		}else{
			echo "<td><a href=\"?edit=1&obraz=".$work['img']."\"><img src=\"http://img.bestcombats.net/shadow/0/".$work['img']."\" alt=\"Выбрать этот образ\"></a></td>";
		}

		$i=$i-1;
		if ($i==0){
			echo "</TR>";
			$i=9;
		}
	}
	
	$shadow_spec=mysql_query("SELECT * FROM `shadows_w` where `nlogin`='".$user['login']."' or (`nclan`='".$user['klan']."' and '".$user['klan']."'<>'')  order by nlevel,nsila,nlovk,ninta,nvinos,nintel,nmudra,noj,mec,topor,dubina,posoh,mfire,mwater,mair,mearth,mlight,mgray,mdark;");
	If (mysql_num_rows($shadow_spec)>0){
		$i=9;
		echo "</table><br/><center><h3>Срециальные образы</h3></center><br/>
			  <TABLE border='0' cellpadding='0' cellspacing='12' ><tr>";
		while ($shadow_spec_w=mysql_fetch_array($shadow_spec)){
			if ($i==9){echo "<TR>";}
			echo "<td><a href=\"?edit=1&obraz=".$shadow_spec_w['img']."\"><img src=\"http://img.bestcombats.net/shadow/0/".$shadow_spec_w['img']."\" alt=\"Выбрать этот образ\"></a></td>";
			$i=$i-1;
			if ($i==0){echo "</TR>";$i=9;}				
		}
		echo "</tr></table>";
	}
}
?>

</TABLE>
</center>
</body>
</html>