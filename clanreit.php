<?
include "connect.php";
?>
<HTML>
<HEAD>
<title>Таблица кланового опыта</title>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<link href="http://img.bestcombats.net/css/design3.css" rel="stylesheet" type="text/css">
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
 
<style type="text/css">
img.pnged {
    behavior:  url(http://img.bestcombats.net/pngbehavior.htc);
}
</style>
 
<script type="text/javascript" language="javascript" src='http://img.bestcombats.net/js/commoninf.js'></script>
<script type="text/javascript" language="JavaScript1.3" src='http://img.bestcombats.net/js/inf.0.102.js'></script>
</HEAD>
<body style="margin:10px; margin-top:5px; background-repeat:no-repeat; background-position: top right" bgcolor=e2e0e0>
<center><img src="http://img.bestcombats.net/clans/clans.png"></center>
<style>
.exptable td {border-bottom: 1px dotted #666666; padding: 2 4 2 4;}
.exptable td.last {border-bottom: 0px;}
.exptable td.header {background-color: #AAAAAA; border-bottom: 1px solid #666666;}
</style>
 
<center>
<table width=700 cellpadding=2 cellspacing=0 class=exptable style="border: 1px solid #666666;">
<tr>
<td width=36 class=header colspan=4>&nbsp;</td>
<td class=header><b><a href="clanreit.php?sort=clan">Клан</a></b></td>
<td class=header><b><a href="clanreit.php?sort=exp">Уровень</a></b></td>
<td class=header width=100><b><a href="clanreit.php?sort=persons">Персонажей</a></b></td>
</tr>
 
<?
$nu=1;
 
                    $data=db_query("SELECT * FROM `clans` WHERE name not like 'adminion' and name not like 'radminion' ORDER by `clanexp` DESC");
 
                    while ($row = mysqli_fetch_array($data)) {
                        $total = 0;
                        $total1 = mysqli_num_rows(db_query("SELECT * FROM `users` WHERE `klan` = '{$row['short']}'"));
                        if ($row['guard']==1) {
                        echo "<tr><td width=12  align=center><b>".$nu++.".</b></td><td width=12  align=center><img src='http://img.bestcombats.net/clans/guard.gif' alt='Гвардейский клан'>";
                        }else{
                        echo "<tr><td width=12  align=center><b>".$nu++.".</b></td><td width=12  align=center>&nbsp;</td>";
                        }
                        echo"</td><td width=12 align=center><img src='http://img.bestcombats.net/align/align_{$row['align']}.gif'></td><td width=12 align=center ><img src='http://img.bestcombats.net/klan/{$row['short']}.gif'></td><td ><a href='/claninf.php?{$row['short']}'>{$row['name']}</a></td><td >{$row['clanlevel']}</td><td  align=center>{$total1}</td></tr>";
                    }
?>
 
</table>
</BODY></HTML>