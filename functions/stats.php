<?
  function getstats($battle) {
    $ret="";
    $brec=mqfa("select t1, t2, userdata, type from battle where id='$battle'");
    $userdata=unserialize($brec["userdata"]);
    $t1=explode(";", $brec["t1"]);
    $t2=explode(";", $brec["t2"]);
    $log=implode("",file("backup/logs//battle$battle.txt"));
    preg_match_all("/--([0-9]*)\/([0-9]*)\/([0-9]*)\/([0-9]*)\/([0-9\-]*)\/([a-z]*)--/", $log, $res);

    $stats=array();
    foreach ($res[0] as $k=>$v) {
      @$stats[$res[1][$k]]["hit".$res[3][$k]]++;
      $i=0;
      while ($i<strlen($res[4][$k])) {
        @$stats[$res[2][$k]]["block".$res[4][$k][$i]]++;
        $i++;
      }
      @$stats[$res[1][$k]]["damage"]+=$res[5][$k];
      @$stats[$res[2][$k]]["receiveddamage"]+=$res[5][$k];
      if ($res[6][$k]=="krit" || $res[6][$k]=="krita" || $res[6][$k]=="kritp" || $res[6][$k]=="kritb") {
        @$stats[$res[1][$k]]["kritdamage"]+=$res[5][$k];
        @$stats[$res[1][$k]]["krithits"]++;
      }
      if ($res[6][$k]=="magshotkrit") @$stats[$res[1][$k]]["kritdamage"]+=$res[5][$k];
      if ($res[6][$k]=="udar" || $res[6][$k]=="krit" || $res[6][$k]=="krita" || $res[6][$k]=="kritp" || $res[6][$k]=="kritb") {
        @$stats[$res[1][$k]]["hits"]++;
      }
      if ($res[6][$k]=="udar" || $res[6][$k]=="krit" || $res[6][$k]=="krita" || $res[6][$k]=="kritp" || $res[6][$k]=="kritb" || $res[6][$k]=="block" || $res[6][$k]=="parry" || $res[6][$k]=="shieldblock" || $res[6][$k]=="uvorot") {
        @$stats[$res[1][$k]]["moves"]++;
      }
      if ($res[6][$k]=="udar" || $res[6][$k]=="krit" || $res[6][$k]=="krita" || $res[6][$k]=="kritp" || $res[6][$k]=="kritb") {
        @$stats[$res[2][$k]]["receivedhits"]++;
      }
      if ($res[6][$k]=="uvorot") @$stats[$res[2][$k]]["uvorot"]++;
      if ($res[6][$k]=="block" || $res[6][$k]=="parry" || $res[6][$k]=="shieldblock") {
        @$stats[$res[2][$k]]["blocks"]++;
      }
    }
    $ret.="<TABLE border=1 cellSpacing=0 cellPadding=4>
    <TBODY>
    <TR>
    <TD align=middle>Логин</TD>
    <TD>Удары</TD>
    <TD>Блоки</TD>
    <TD>Попадания</TD>
    <TD>Защита</TD>
    <TD>Урон</TD>
    <TD>Потери</TD>
    <!--<TD>Вылечено</TD>--></TR>";
    function redzero($n) {
      if ($n<=0) return "<font color=red>$n</font>";
      else return "<font color=black>$n</font>";
    }
    $total=0;
    $totalmax=0;
    foreach ($t1 as $k=>$v) {
      if ($userdata[$v]["hp"]<0) $userdata[$v]["hp"]=0;
      if ($userdata[$v]["login"]!="невидимка") {
        $total+=$userdata[$v]["hp"];
        $totalmax+=$userdata[$v]["maxhp"];
      } else {
        $userdata[$v]["hp"]="??";
        $userdata[$v]["maxhp"]="??";
      }
      $ret.="<TR>
      <TD align=right><FONT class=B1>
      <SPAN style=\"CURSOR: hand\" class=B1>".$userdata[$v]["login"]."</SPAN> ".($userdata[$v]["login"]!="невидимка"?"<A href=\"/inf.php?$v\" target=_blank><IMG alt=\"Инф. о ".$userdata[$v]["login"]."\" src=\"".IMGBASE."/i/inf.gif\" width=12 height=11></A>":"")."</FONT> [".redzero($userdata[$v]["hp"])."</FONT>/".$userdata[$v]["maxhp"]."]</TD>
      <TD>";
      $ret.=(int)$stats[$v]["hit1"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit2"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit3"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit4"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit5"];
      $ret.="</TD>
      <TD>";
      $ret.=(int)$stats[$v]["block1"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block2"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block3"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block4"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block5"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["hits"];
      $totalrow[0]+=$stats[$v]["hits"];
      $ret.="(<FONT color=red>";
      $ret.=(int)$stats[$v]["krithits"];  
      $totalrow[1]+=$stats[$v]["krithits"];
      $ret.="</FONT>)/";
      $ret.=(int)$stats[$v]["moves"];  
      $totalrow[2]+=$stats[$v]["moves"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["blocks"];
      $totalrow[3]+=$stats[$v]["blocks"];
      $ret.="/";
      $ret.=(int)$stats[$v]["uvorot"];
      $totalrow[4]+=$stats[$v]["uvorot"];
      $ret.="/";
      $ret.=(int)$stats[$v]["receivedhits"];
      $totalrow[5]+=$stats[$v]["receivedhits"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["damage"];
      $totalrow[6]+=$stats[$v]["damage"];
      $ret.="/<FONT color=red>";
      $ret.=(int)$stats[$v]["kritdamage"];
      $totalrow[7]+=$stats[$v]["kritdamage"];
      $ret.="</FONT></TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["receiveddamage"];
      $totalrow[8]+=$stats[$v]["receiveddamage"];
      $ret.="</TD>
      <!--<TD align=middle>";
      $ret.=-($userdata[$v]["maxhp"]-$stats[$v]["receiveddamage"]-$userdata[$v]["hp"]);
      $totalrow[9]+=-($userdata[$v]["maxhp"]-$stats[$v]["receiveddamage"]-$userdata[$v]["hp"]);
      $ret.="</TD>--></TR>";
    }
    if ($brec["type"]!=11) {
    $ret.="
    <TR bgColor=#d2d0d0>
    <TD align=right><FONT class=B3><FONT class=B1><SPAN style=\"CURSOR: hand\">Всего [$total/$totalmax], ".count($t1)." чел.</SPAN></FONT></FONT></TD>
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
    <TD align=middle>$totalrow[0](<FONT color=red>$totalrow[1]</FONT>)/$totalrow[2]</TD>
    <TD align=middle>$totalrow[3]/$totalrow[4]/$totalrow[5]</TD>
    <TD align=middle>$totalrow[6]/<FONT color=red>$totalrow[7]</FONT></TD>
    <TD align=middle>$totalrow[8]</FONT></TD>
    <!--<TD align=middle>$totalrow[9]</TD>--></TR>";
    $total=0;
    $totalmax=0;
    $totalrow=array();
    }
    foreach ($t2 as $k=>$v) {
      if ($userdata[$v]["hp"]<0) $userdata[$v]["hp"]=0;
      if ($userdata[$v]["login"]!="невидимка") {
        $total+=$userdata[$v]["hp"];
        $totalmax+=$userdata[$v]["maxhp"];
      } else {
        $userdata[$v]["hp"]="??";
        $userdata[$v]["maxhp"]="??";
      }

      $ret.="<TR>
      <TD align=right><FONT class=B1>
      <SPAN style=\"CURSOR: hand\" class=B1>".$userdata[$v]["login"]."</SPAN> ".($userdata[$v]["login"]!="невидимка"?"<A href=\"/inf.php?$v\" target=_blank><IMG alt=\"Инф. о ".$userdata[$v]["login"]."\" src=\"".IMGBASE."/i/inf.gif\" width=12 height=11></A>":"")."</FONT> [".redzero($userdata[$v]["hp"])."</FONT>/".$userdata[$v]["maxhp"]."]</TD>
      <TD>";
      $ret.=(int)$stats[$v]["hit1"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit2"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit3"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit4"];
      $ret.="/";
      $ret.=(int)$stats[$v]["hit5"];
      $ret.="</TD>
      <TD>";
      $ret.=(int)$stats[$v]["block1"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block2"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block3"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block4"];
      $ret.="/";
      $ret.=(int)$stats[$v]["block5"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["hits"];
      $totalrow[0]+=$stats[$v]["hits"];
      $ret.="(<FONT color=red>";
      $ret.=(int)$stats[$v]["krithits"];  
      $totalrow[1]+=$stats[$v]["krithits"];
      $ret.="</FONT>)/";
      $ret.=(int)$stats[$v]["moves"];  
      $totalrow[2]+=$stats[$v]["moves"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["blocks"];
      $totalrow[3]+=$stats[$v]["blocks"];
      $ret.="/";
      $ret.=(int)$stats[$v]["uvorot"];
      $totalrow[4]+=$stats[$v]["uvorot"];
      $ret.="/";
      $ret.=(int)$stats[$v]["receivedhits"];
      $totalrow[5]+=$stats[$v]["receivedhits"];
      $ret.="</TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["damage"];
      $totalrow[6]+=$stats[$v]["damage"];
      $ret.="/<FONT color=red>";
      $ret.=(int)$stats[$v]["kritdamage"];
      $totalrow[7]+=$stats[$v]["kritdamage"];
      $ret.="</FONT></TD>
      <TD align=middle>";
      $ret.=(int)$stats[$v]["receiveddamage"];
      $totalrow[8]+=$stats[$v]["receiveddamage"];
      $ret.="</TD>
      <!--<TD align=middle>";
      if ($userdata[$v]["hp"]>0) {
        $healed=-($userdata[$v]["maxhp"]-$stats[$v]["receiveddamage"]-$userdata[$v]["hp"]);
      }
      $ret.=$healed;
      $totalrow[9]+=-($userdata[$v]["maxhp"]-$stats[$v]["receiveddamage"]-$userdata[$v]["hp"]);
      $ret.="</TD>--></TR>";
    }
    $ret.="
    <TR bgColor=#d2d0d0>
    <TD align=right><FONT class=B3><FONT class=B1><SPAN style=\"CURSOR: hand\">Всего [$total/$totalmax], ";
    if ($brec["type"]==11) $ret.=count($t1)+count($t2);
    else $ret.=count($t2);
    $ret.=" чел.</SPAN></FONT></FONT></TD>
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
    <TD align=middle>$totalrow[0](<FONT color=red>$totalrow[1]</FONT>)/$totalrow[2]</TD>
    <TD align=middle>$totalrow[3]/$totalrow[4]/$totalrow[5]</TD>
    <TD align=middle>$totalrow[6]/<FONT color=red>$totalrow[7]</FONT></TD>
    <TD align=middle>$totalrow[8]</FONT></TD>
    <!--<TD align=middle>$totalrow[9]</TD>--></TR>";

    $ret.="
    </TBODY></TABLE>Логин - имя персонажа и уровень жизни: [сейчас/всего]<BR>Удары - статистика ударов по областям: голова/грудь/живот/пояс/ноги<BR>Блоки - статистика блоков по областям: голова/грудь/живот/пояс/ноги<BR>Попадания - удачных попаданий <FONT color=red>(из них критов)</FONT> / всего ударов<BR>Защита - ударов заблокировано / уворотов / пропущено ударов<BR>Урон - выбито HP из противников / из них <FONT color=red>критами</FONT><BR>Потери - получено повреждений <BR>
    <!--Вылечено - восстановлено HP<BR>-->";
    return $ret;
  }
?>