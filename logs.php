<HTML><HEAD>
<?
function lognick4 ($id, $st) {
  global $udata;
  return "<span onclick=\"top.AddTo('".$udata[$id]["login"]."')\" oncontextmenu=\"return OpenMenu(event,".$udata[$id]['level'].")\" class={$st}>".$udata[$id]['login']."</span> [".($udata[$id]["login"]=="невидимка"?"??":$udata[$id]['hp'])."/".($udata[$id]["login"]=="невидимка"?"??":$udata[$id]['maxhp'])."]";
}


  if (0) {
    define("IMGBASE","");
    define("IMGNUM","");
  } else {
    define("IMGBASE","");
    define("IMGFN","");
  }
 error_reporting("~ALL");
  ini_set("display_errors", 1);

 $_GET['page']=(int)$_GET['page'];
 $_REQUEST['log']=(int)$_REQUEST['log'];
 ?>
<link rel=stylesheet type="text/css" href="i/main.css">
<link rel="icon" href="<?=IMG_PATH?>/favicon.ico" type="image/x-icon">
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=e2e0e0>
<H3><IMG SRC="<?=IMGBASE?>/i/fighttype1.gif" WIDTH=20 HEIGHT=20 ALT="физический бой">Бойцовский клуб <a href="http://www.bestcombats.net/">BestCombats</a><IMG SRC="<?=IMGBASE?>/i/fighttype1.gif" WIDTH=20 HEIGHT=20 ALT="физический бой"></H3>
<FORM METHOD=GET ACTION="logs.php">
<INPUT TYPE=hidden name=page value="<?=$_GET['page']?>">
<INPUT TYPE=hidden name=log value="<?=$_REQUEST['log']?>"></FORM>
<?
include "connect.php";
include "functions.php";
//checklog($_REQUEST['log']);
if ($_GET['stat']!='1') {
  $data = mysqli_fetch_array(db_query ("SELECT * FROM `battle` WHERE `id` = ".intval($_REQUEST['log']).""));
  $udata=unserialize($data["userdata"]);
  //$log = mysqli_fetch_array(db_query("SELECT `log` FROM `logs` WHERE `id` = '".$_REQUEST['log']."';"));
  //echo "<form method=get><input type=hidden name='log' value='".(int)$_GET['log']."'><input type=hidden name='stat' value='1'><input type=submit value='Статистика'></form>";
  $log = file("backup/logs//battle".$_REQUEST['log'].".txt");
  if ($data['type'] == 10) {
    $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> (поединок в башне смерти)";
  } elseif ($data['type'] == 12) {
    $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype12.gif\" ALT=\"Общий хаотичный бой\"> (Общий хаотичный бой)";
  } elseif ($data['blood'] && ($data['type'] == 5 OR $data['type'] == 4)) {
    $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype5.gif\" WIDTH=20 HEIGHT=20 ALT=\"кулачный бой\"><IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> (кровавый кулачный поединок)";
  } elseif ($data['blood'] && ($data['type'] == 2 OR $data['type'] == 3 OR $data['type'] == 6)) {
    $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> (кровавый поединок)";
  } elseif ($data['type'] == 5 OR $data['type'] == 4) {
    $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype4.gif\" WIDTH=20 HEIGHT=20 ALT=\"кулачный бой\"> (кулачный поединок)";
  }
            elseif ($data['type'] == 3 OR $data['type'] == 2) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype3.gif\" WIDTH=20 HEIGHT=20 ALT=\"групповой бой\"> (групповой поединок)";
            }
            elseif ($data['type'] == 1) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype1.gif\" WIDTH=20 HEIGHT=20 ALT=\"физический бой\"> (физический поединок)";
            }

            $t1 = explode(";",$data['t1']);
            $t2 = explode(";",$data['t2']);
            if($data['win']==3) {

                $battle = unserialize($data['teams']);

                foreach ($t1 as $k => $v) {
                    if (in_array($v,array_keys($battle))) {
                        ++$i;
                        if ($i > 1) { $cc = ', '; } else { $cc = ''; }
                        $ffs .= $cc.lognick4($v,"B1")." ".($udata[$v]["login"]=="невидимка"?"":"<a href=\"/inf.php?$v\" target=\"_blank\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>");
                        //$zz .= "private [".nick7($v)."] ";
                    }
                }
                $i=0;

                $ffs .=' <font color=red><b>против</b></font> '; //$zz ='';
                foreach ($t2 as $k => $v) {
                    if (in_array($v,array_keys($battle))) {
                        ++$i;
                        if ($i > 1) { $cc = ', '; } else { $cc = ''; }
                        $ffs .= $cc.nick4($v,"B2")." ".($udata[$v]["login"]=="невидимка"?"":"<a href=\"/inf.php?$v\" target=\"_blank\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>");
                        //$zz .= "private [".nick7($v)."] ";
                }
                }
                $i=0;

            }
            $countall = count($t1)+count($t2);
            if ($countall > 70) {
                echo "<h3>Эпическая битва!</h3>";
            }elseif ($countall > 50) {
                echo "<h3>Эпохальная битва!</h3>";
            }elseif ($countall > 30) {
                echo "<h3>Великая битва!</h3>";
            }
            echo "<table WIDTH=100%><td><FORM METHOD=post ACTION='logs.php'>
            <INPUT TYPE=hidden name=page value=". htmlspecialchars($_GET['page']).">
            <INPUT TYPE=hidden name=log value=". htmlspecialchars($_REQUEST['log']).">
            <INPUT TYPE=button onclick=\"document.location.href=logs.php?log=$_REQUEST[log]\" name=analiz2 value=\"Обновить\"> &nbsp; | &nbsp; <INPUT value=1 type=hidden name=pp><SMALL title=\"по нику, приему, эффекту\">Поиск:</SMALL> <INPUT width=7 size=30 type=text name=filter> <INPUT value=\" Фильтр \" type=submit name=f1> <INPUT value=\" Подсветка \" type=submit name=f2>  </form></td><td align=right>Основное место боя: ".($data['room']>500 && $data['room']<=560?"Башня Смерти":$rooms[$data['room']])."</td></table>Тип боя: ";
            echo $rr;
?>
&nbsp;
Страницы:
<?
$log = explode("<BR>",$log[0]);
    $all = count($log)-1;
    $pgs = $all/50;
    for ($i=0;$i<=$pgs;++$i) {
        if ($_GET['page']==$i) {
            echo ' <a href="?log=',$_REQUEST['log'],'&page=',$i,'"><font color=#8f0000>',($i+1),'</font></a> ';
        }
        else {
            echo ' <a href="?log=',$_REQUEST['log'],'&page=',$i,'">',($i+1),'</a> ';
        }
    }
//print_r($log);
?><HR><?
    $start = 50*$_GET['page'];
    if(50*$_GET['page']+50 <= $all) {
        $stop = 50*$_GET['page']+50;
    } else {
        $stop = 50*$_GET['page']+($all-50*$_GET['page'])-1;
    }
    if (@$_POST["filter"]) $stop=$all;
    //echo $stop;
    $cache="";
    for($i=$start;$i<=$stop;$i++) {
      /*if (strpos($log[$i],"Часы показывали")!==false || strpos($log[$i],"вмешался")!==false) {
        echo $log[$i]."<br>";
        continue;
      }
      if (strpos(strtolower($log[$i]),"<hr>")!==false) {
        if (!@$_POST["filter"] || strpos($cache, $_POST["filter"])!==false) {
          echo $cache;
          echo "<hr>";
        }
        $cache=preg_replace("/<hr>/i","",$log[$i])."<br>";
      } else $cache="$log[$i]<br>$cache";*/
      if (!@$_POST["filter"] || strpos($log[$i], $_POST["filter"])!==false) echo $log[$i]."<BR>";
    }
    echo $cache;
?>
<HR>
<?
    echo "<center>".$ffs."</center><HR>";
?>
<FORM METHOD=GET ACTION="logs.php">
<INPUT TYPE=hidden name=page value="<?=$_GET['page']?>">
<INPUT TYPE=hidden name=log value="<?=$_REQUEST['log']?>">

<INPUT TYPE=submit name=analiz2 value="Обновить">
</form>
&nbsp;
Страницы:
<?
    for ($i=0;$i<=$pgs;++$i) {
        if ($_GET['page']==$i) {
            echo ' <a href="?log=',$_REQUEST['log'],'&page=',$i,'"><font color=#8f0000>',($i+1),'</font></a> ';
        }
        else {
            echo ' <a href="?log=',$_REQUEST['log'],'&page=',$i,'">',($i+1),'</a> ';
        }
    }
echo "<br><br><form method=get><input type=hidden name='log' value='".(int)$_REQUEST['log']."'><input type=hidden name='stat' value='1'><input type=submit value='Статистика'></form>";
} else { 
  include "functions/stats.php";
  echo "<form method=get><input type=hidden name='log' value='".(int)$_REQUEST['log']."'><input type=submit value='Лог боя'></form>";
  echo getstats($_REQUEST['log']);
//include('battle_stat.php');
echo "<br><form method=get><input type=hidden name='log' value='".(int)$_REQUEST['log']."'><input type=submit value='Лог боя'></form>";
}
?>
<A name=end></A>
</BODY>
</HTML>