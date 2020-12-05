<?php
    session_start();
    if (@$_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    include "functions.php";
    require_once("lib/zayavka.lib");
    //$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));

    if ($user['battle'] != 0) {
        header('Location: fbattle.php');
        die();
    }

    //if ($user["zayavka"]!=0) {
      //$i=mqfa1("select id from zayavka where id='$user[zayavka]'");
      //if (!$i) mq("update users set zayavka=0 where id='$_SESSION[uid]'");
      //$user["zayavka"]=0;
    //}

    // ставим блокировку на таблицу
    db_query("LOCK TABLES `bots` WRITE, `battle` WRITE, `logs` WRITE, `users` WRITE, `inventory` WRITE, `zayavka` WRITE, `effects` WRITE, `online` WRITE, invisbattles write, chaosstats write;");

    //===================================================================================================================
    // стираем коммент

    if (($_GET['do'] == "clear") && (($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3))) {
        if ($user['align']>1.1 && $user['align']<2) {$angel="паладином";}
        if ($user['align']>2 && $user['align']<3) {$angel="Ангелом";}
        db_query("UPDATE `zayavka` SET `coment`='Удалено $angel <b>".$user['login']."</b>' where `id`='{$_GET['zid']}' LIMIT 1;");
    }
    if(isset($_REQUEST['view'])) {
        $_SESSION['view'] = $_REQUEST['view'];
    }
    //echo $_SESSION['view'];
    //===================================================================================================================
    // работа с заявками

    $zay = new zayavka;
    //$zay->addzayavka(15,3,2,2,2,7,7,7,7,'111',2,2,0);

    header("Cache-Control: no-cache");
    if ($_POST['open']) {
        $f=fopen("tmp/zayavka/".$user['id'].".txt","w+");
        fputs($f,time());
        fclose($f);
    }
?>
<HTML>
    <HEAD>
        <link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
        <META Http-Equiv=Cache-Control Content=no-cache>
        <meta http-equiv=PRAGMA content=NO-CACHE>
        <META Http-Equiv=Expires Content=0>
        <style>
            .m {background: #99CCCC;text-align: center;}
            .s {background: #BBDDDD;text-align: center;}
        </style>
        <script>
            function refreshPeriodic()
            {
                <?if ($_REQUEST['logs'] == null) {?>location.href='zayavka.php?level=<?=$_REQUEST['level']?>&tklogs=<?=$_REQUEST['tklogs']?>&logs=<?=$_REQUEST['logs']?>';//reload();
                <?}?>
                timerID=setTimeout("refreshPeriodic()",30000);
            }
            timerID=setTimeout("refreshPeriodic()",30000);
        </script>
    </HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=e2e0e0 onload="<?=topsethp()?>">
<TABLE width=100% cellspacing=1 cellpadding=1>
<FORM METHOD=POST ACTION=zayavka.php name=F1>
<TR><TD colspan=5>
    <? if ($_REQUEST['level']) { nick($user); } ?>
</TD>
<TD colspan=4 align=right>

<INPUT TYPE=button value="Карта миров" onclick="location.href='main.php?top=0.467837356797105';">
<INPUT TYPE=button value="Подсказка" style="background-color:#A9AFC0" onclick="window.open('help/combats.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
<INPUT TYPE=button value="Вернуться" onclick="location.href='main.php?top=0.467837356797105';">
</TD></TR>
<TR>
<TD class=m width=40>&nbsp;<B>Бои:</B></TD>
<TD class=<?=($_REQUEST['level']=='begin')?"s":"m"?>><A HREF="zayavka.php?level=begin&0.467837356797105">1 на 1</A></TD>
<TD class=<?=($_REQUEST['level']=='fiz')?"s":"m"?>><A HREF="zayavka.php?level=fiz&0.467837356797105">Договорные</A></TD>
<?
/*<TD class=<?=($_REQUEST['level']=='train')?"s":"m"?>><A HREF="zayavka.php?level=train&0.467837356797105&view=<?=$user['level']?>">Тренировочные</A></TD>*/
?>
<TD class=<?=($_REQUEST['level']=='group')?"s":"m"?>><A HREF="zayavka.php?level=group&0.467837356797105">Групповые</A></TD>
<TD class=<?=($_REQUEST['level']=='haos')?"s":"m"?>><A HREF="zayavka.php?level=haos&0.467837356797105">Хаотичные</A></TD>
<TD class=<?=($_REQUEST['tklogs']=='1')?"s":"m"?>><A HREF="zayavka.php?tklogs=1&0.467837356797105">Текущие</A></TD>
<TD class=<?=($_REQUEST['logs']!=null)?"s":"m"?>><A HREF="zayavka.php?logs=<?=date("d.m.y")?>&0.467837356797105">Завершенные</A></TD>
</TR></TR></TABLE>
<TABLE width=100% cellspacing=0 cellpadding=0><TR><TD valign=top>
<?


if($user['room'] != 1 && $user['room'] != 5 && $user['room'] != 6 && $user['room'] != 7 && $user['room'] != 9 && $user['room'] != 10 && $user['room'] != 15 && $user['room'] != 16 && $user['room'] != 19 && $user['room'] != 8 && $user['room'] != 201  && $user['room'] != 0 && !$_REQUEST['tklogs'] && !$_REQUEST['logs']){
  if ($_REQUEST['level']=="haos") {
    echo "<br><br><center><b>В этой комнате можно только смотреть текущие заявки на хаотичные бои</b></center><br>";
    if ($z = $zay->getlist(5,$_SESSION['view']))
    foreach ($z as $k=>$v) {
      echo $zay->showhaos($v, 0);
    }
  } else {
    echo "<BR><BR><BR><CENTER><B>В этой комнате невозможно подавать заявки</b></CENTER>";
  }
  die();
}

if(!$_REQUEST['level'] && !$_REQUEST['tklogs'] && !$_REQUEST['logs']){
    echo "<BR><BR><BR><CENTER><B>Выберите раздел</b><br><img width=100 height=100 src=".IMGBASE."/i/16.gif></CENTER>";
    }




include "config/extrausers.php";
if (in_array($user["id"], $noattack)) {
  echo "<BR><BR><BR><CENTER><B>Для вас бои запрещены</b></CENTER>";
  die();
}
if ($_REQUEST['level'] == 'begin') {
    /*if($user['level']>0 && $user["id"]<>7) {
        echo "<BR><BR><BR><CENTER><B>Вы уже выросли из ползунков ;)</b></CENTER>";
        die();
    }*/
    echo "<font color=red><b>";
    if($_POST['open']) {
        $r=$zay->addzayavka (0,$_POST['timeout'], 1, 1, $_POST['k'], $user['level'], 1, $user['level'], 21, '', $user['id'], 1, 0);
        if ($r) echo $r;
        else die("<script>document.location='zayavka.php?level=begin';</script>");
    }
    if($_POST['back']) {
        unlink("tmp/zayavka/".$user['id'].".txt");
        echo $zay->delzayavka ($user['id'], $user['zayavka'], 1,0);
    }
    if($_POST['back2']) {
        $z =  $zay->getlist(1,null,$user['zayavka']);
        addchp ('<font color=red>Внимание!</font> '.nick7($user['id']).' отозвал заявку.   ','{[]}'.nick7 ($z[$user['zayavka']]['team1'][0]).'{[]}');
        echo $zay->delteam (2,$user['id'], $user['zayavka'], 1);
    }
    if($_POST['cansel']) {
        $z =  $zay->getlist(1,null,$user['zayavka']);
        echo $zay->delteam (2,$z[$user['zayavka']]['team2'][0], $user['zayavka'], 1);
        addchp ('<font color=red>Внимание!</font> '.nick3($user['id']).' отказался от поединка.  ','{[]}'.nick7 ($z[$user['zayavka']]['team2'][0]).'{[]}');
    }
    if($_POST['confirm2']) {
        $z =  $zay->getlist(1,null,$_REQUEST['gocombat']);
        addchp ('<font color=red>Внимание!</font> '.nick3($user['id']).' принял заявку, нужно принять вызов или отказать.  ','{[]}'.nick7 ($z[$_REQUEST['gocombat']]['team1'][0]).'{[]}');
        echo $zay->addteam (2,$user['id'], $_REQUEST['gocombat'], 1);
        die("<script>document.location='zayavka.php?level=begin';</script>");
    }
    if($_POST['gofi']) {
        $zay->battlestart( $user['id'], $user['zayavka'], 1 );
    }
    echo "</b></font>";

    echo '<table cellspacing=0 cellpadding=0><tr><td>';
    $z =  $zay->getlist(1,null,$user['zayavka']);
    if( $zay->ustatus($user['id'])==0 || $user["id"]==7) {
        //if ($z[$user['zayavka']]['level'] == 1)
        echo '<FIELDSET><LEGEND><B>Подать заявку на бой</B> </LEGEND>Таймаут <SELECT NAME=timeout><OPTION value=1>1 мин.<OPTION value=3>3 мин.<OPTION value=4>4 мин.<OPTION value=5>5 мин.<OPTION value=7>7 мин.<OPTION value=10 selected>10 мин.</SELECT> Тип боя <SELECT NAME=k><OPTION value=1>с оружием<OPTION value=4>кулачный</SELECT><INPUT TYPE=submit name=open value="Подать заявку">&nbsp;</FIELDSET>';
    }
    if( $zay->ustatus($user['id'])==1 ) {
        if(count($z[$user['zayavka']]['team2'])>0){
            echo "<B><font color=red>Внимание! ".nick3($z[$user['zayavka']]['team2'][0])." принял заявку на бой, нужно отказать или принять вызов.</font></b> <input type=submit value='Битва!' name=gofi> <input type=submit value='Отказать' name=cansel>";
        }
        else {
            if ($z[$user['zayavka']]['level'] == 1)
            echo "Заявка на бой подана, ожидаем противника. <input type=submit name=back value='Отозвать заявку'>";
            /*if (file_exists("tmp/zayavka/".$user['id'].".txt")) {
            $Path="tmp/zayavka/".$user['id'].".txt";
            $f=fopen($Path,"r");
            $timeFigth=fread($f, filesize($f));
            fclose($f);*/
            //if($user['level'] == 0 || $_SESSION['uid']==22004) {

                if($_GET['trainstart']==1 && $user['hp'] > $user['maxhp']*0.33) {
                    //здесь удаляем файл
                    unlink("tmp/zayavka/".$user['id'].".txt");
                    $zay->delzayavka ($user['id'], $user['zayavka'], 1,0);
                    if ($user["id"]==7) db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$user['login']." (клон 1)','".$user['id']."','','".$user['maxhp']."');");
                    else db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('Клон','11121','','48');");
                    $bot = db_insert_id();
                    $teams = array();

                    $teams[$user['id']][$bot] = array(0,0,time());
                    $teams[$bot][$user['id']] = array(0,0,time());
                    db_query("INSERT INTO `battle`
                        (
                            `id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,date
                        )
                        VALUES
                        (
                            NULL,'','".serialize($teams)."','3','1','0','".$user['id']."','".$bot."','".time()."','".time()."', '".date("Y-m-d H:i")."'
                        )");

                    $id = db_insert_id();

                    // апдейтим бота
                    db_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$bot} LIMIT 1;");

                    // создаем лог
                    $rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($bot)."</b>";

                    //db_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>');");
                    addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

                    db_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']};");

                    addch ("Начался <a href=logs.php?log=$id target=_blank>поединок</a> между <B>$user[login]</B> и <b>$user[login] (клон 1)</b>.",$user['room']);
                    die("<script>location.href='fbattle.php';</script>");
                    ///=======================================================================================
                }
                //addchp ('<font color=red>Внимание!</font> Вам предлагается начать тренировочный бой.   ','{[]}'.$user['login'].'{[]}');
                echo " или <input type=button onclick=\"location.href='zayavka.php?level=begin&trainstart=1';\" value=\"Начать тренировочный бой\">.";

            //}
        }
    }
    if( $zay->ustatus($user['id'])==2 ) {
        if ($z[$user['zayavka']]['level'] == 1)
        echo "Ожидаем подтверждения боя. <input type=submit name=back2 value='Отозвать заявку'>";
    }
    echo '</td></tr></table></TD><TD align=right valign=top rowspan=2><INPUT TYPE=submit name=tmp value="Обновить">';
    echo '<tr><td><INPUT TYPE=hidden name=level value=begin><INPUT TYPE=submit value="Принять вызов" NAME=confirm2><BR>';
    if ($z = $zay->getlist(1))
    foreach ($z as $k=>$v) {
        echo $zay->showfiz( $v );
    }
    echo '<INPUT TYPE=submit value="Принять вызов" NAME=confirm2></TD></TR></TABLE>';
}

if ($_REQUEST['level'] == 'fiz') {
    if($user['level']==0) {
        echo "<BR><BR><BR><CENTER><B>Договорные бои доступны с 1 уровня.</b></CENTER>";
        die();
    }
//  if($user['level']>3 && $user['id']!=9534 && $user['id']!=9577 && $user['id']!=2) {//&& $user['id']!=7200
//      echo "<BR><BR><BR><CENTER><B>Физические бои временно не работают для персонажей выше 3го уровня.</b></CENTER>";
//      die();
//  }
    echo "<font color=red><b>";
        if($_POST['open']) {
        if($_POST['k']==6) {
            $blood = 1;
        } else {
            $blood = 0;
        }
        $err=$zay->addzayavka (0,$_POST['timeout'], 1, 1, $_POST['k'], $user['level'], 1, $user['level'], 21, '', $user['id'], 2, 0,$blood);
        if (!$err) die("<script>document.location='zayavka.php?level=fiz';</script>");
        echo $err;
        //$z[$user['zayavka']]['level'] == 2;
    }
    if($_POST['back']) {
        unlink("tmp/zayavka/".$user['id'].".txt");
        echo $zay->delzayavka ($user['id'], $user['zayavka'], 2,0);
    }
    if($_POST['back2']) {
        $z =  $zay->getlist(2,null,$user['zayavka']);
        addchp ('<font color=red>Внимание!</font> '.nick3($user['id']).' отозвал заявку.   ','{[]}'.nick7 ($z[$user['zayavka']]['team1'][0]).'{[]}');
        echo $zay->delteam (2,$user['id'], $user['zayavka'], 2);
    }
    if($_POST['cansel']) {
        $z =  $zay->getlist(2,null,$user['zayavka']);
        echo $zay->delteam (2,$z[$user['zayavka']]['team2'][0], $user['zayavka'], 2);
        addchp ('<font color=red>Внимание!</font> '.nick3($user['id']).' отказался от поединка.  ','{[]}'.nick7 ($z[$user['zayavka']]['team2'][0]).'{[]}');
    }
    if($_POST['confirm2'] && !$user['zayavka']) {
        $z =  $zay->getlist(2,null,$_REQUEST['gocombat']);
        $toper = $z[$_REQUEST['gocombat']]['team1'][0];
        $toper = mysqli_fetch_array(db_query("SELECT `klan` FROM `users` WHERE `id`='{$toper}' LIMIT 1;"));
        //echo $user['klan'] . " " . $toper['klan'];
        if($user['klan'] != $toper['klan'] OR $user['klan']==''){
            addchp ('<font color=red>Внимание!</font> '.nick3($user['id']).' принял заявку, нужно принять вызов или отказать.  ','{[]}'.nick7 ($z[$_REQUEST['gocombat']]['team1'][0]).'{[]}');
        }
        echo $zay->addteam (2,$user['id'], $_REQUEST['gocombat'], 2);
        //die("<script>document.location='zayavka.php?level=fiz';</script>");
        echo "</b></font><BR>Ожидаем подтверждения боя. <input type=submit name=back2 value='Отозвать заявку'>";
    }
    if($_POST['gofi']) {
        $zay->battlestart( $user['id'], $user['zayavka'], 2 );
    }
    echo "</b></font>";
    echo '<table cellspacing=0 cellpadding=0><tr><td>';
    if( $zay->ustatus($user['id'])==0 ) {
        echo '<FIELDSET><LEGEND><B>Подать заявку на бой</B> </LEGEND>Таймаут <SELECT NAME=timeout><OPTION value=1>1 мин.<OPTION value=3>3 мин.<OPTION value=4>4 мин.<OPTION value=5>5 мин.<OPTION value=7>7 мин.<OPTION value=10 selected>10 мин.</SELECT> Тип боя <SELECT NAME=k><OPTION value=1>с оружием<OPTION value=4>кулачный<OPTION value=6>кровавый</SELECT><INPUT TYPE=submit name=open value="Подать заявку">&nbsp;</FIELDSET>';
    }
    $z =  $zay->getlist(2,null,$user['zayavka']);
    if( $zay->ustatus($user['id'])==1 ) {
        if(count($z[$user['zayavka']]['team2'])>0){
            echo "<B><font color=red>Внимание! ".nick3($z[$user['zayavka']]['team2'][0])." принял заявку на бой, нужно отказать или принять вызов.</font></b> <input type=submit value='Битва!' name=gofi> <input type=submit value='Отказать' name=cansel>";
        }
        else {
            if ($z[$user['zayavka']]['level'] == 2) {
            echo "Заявка на бой подана, ожидаем противника. <input type=submit name=back value='Отозвать заявку'>";
            $Path="tmp/zayavka/".$user['id'].".txt";
            $f=fopen($Path,"r");
            $timeFigth=fread($f, filesize($Path));
            fclose($f);
            if ($user["level"]==1 || $user["level"]==2 || $user["level"]==3) $timeFigth-=61;
            if ($timeFigth+0 < time() && $user['level'] <= 7) {
              $trainers[1]=array(1=>array("login"=>"Клон x1", "id"=>"5080", "sila"=>5, "lovk"=>5, "inta"=>5, "vinos"=>7),
              2=>array("login"=>"Сильный клон x1", "id"=>"11122", "sila"=>8, "lovk"=>3, "inta"=>3, "vinos"=>8),
              3=>array("login"=>"Ловкий клон x1", "id"=>"11123", "sila"=>3, "lovk"=>10, "inta"=>3, "vinos"=>5),
              4=>array("login"=>"Чуткий клон x1", "id"=>"11124", "sila"=>6, "lovk"=>3, "inta"=>9, "vinos"=>5));
              $trainers[2]=array(1=>array("login"=>"Клон x2", "id"=>"22536", "sila"=>7, "lovk"=>7, "inta"=>7, "vinos"=>9),
              2=>array("login"=>"Сильный клон x2", "id"=>"11126", "sila"=>11, "lovk"=>6, "inta"=>6, "vinos"=>10),
              3=>array("login"=>"Ловкий клон x2", "id"=>"22537", "sila"=>8, "lovk"=>13, "inta"=>3, "vinos"=>8),
              4=>array("login"=>"Чуткий клон x2", "id"=>"11128", "sila"=>8, "lovk"=>5, "inta"=>12, "vinos"=>6));
              $trainers[3]=array(1=>array("login"=>"Клон x3", "id"=>"22503", "sila"=>9, "lovk"=>10, "inta"=>10, "vinos"=>10),
              2=>array("login"=>"Сильный клон x3", "id"=>"11130", "sila"=>18, "lovk"=>6, "inta"=>6, "vinos"=>15),
              3=>array("login"=>"Ловкий клон x3", "id"=>"11131", "sila"=>11, "lovk"=>20, "inta"=>4, "vinos"=>9),
              4=>array("login"=>"Чуткий клон x3", "id"=>"11132", "sila"=>10, "lovk"=>5, "inta"=>19, "vinos"=>10));

                if(($_GET['trainstart']==1 || $_POST['trainstart']==1) && $user['hp'] > $user['maxhp']*0.33) {
                    unlink("tmp/zayavka/".$user['id'].".txt");
                    $zay->delzayavka ($user['id'], $user['zayavka'], 2,0);
                    if ($user["level"]==1 || $user["level"]==2 || $user["level"]==3) {
                      $_POST["opponent"]=(int)$_POST["opponent"];
                      if ($_POST["opponent"]<1 || $_POST["opponent"]>4) $_POST["opponent"]=rand(1,4);
                      $b=mqfa1("select bots.battle from bots left join battle on bots.battle=battle.id where (prototype='".$trainers[$user["level"]][1]["id"]."' or prototype='".$trainers[$user["level"]][2]["id"]."' or prototype='".$trainers[$user["level"]][3]["id"]."' or prototype='".$trainers[$user["level"]][4]["id"]."') and battle.win=3");
                      if ($b) {
                        $bot=createbot($trainers[$user["level"]]["$_POST[opponent]"]["id"], $b);
                        $t=rand(1,2);
                        joinbattle($b, array(array("id"=>$user["id"], "team"=>$t), array("id"=>$bot["id"], "login"=>$bot["login"], "team"=>($t==1?"2":"1"))), 0);
                        $joined=1;
                      } else {
                        $opp=mqfa("select login, maxhp from users where id='".$trainers[$user["level"]]["$_POST[opponent]"]["id"]."'");
                        mq("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('$opp[login]','".$trainers[$user["level"]]["$_POST[opponent]"]["id"]."','','$opp[maxhp]');");
                        $bot=db_insert_id();
                      }
                    } else {
                      db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$user['login']." (клон 1)','".$user['id']."','','".$user['maxhp']."');");
                      $bot = db_insert_id();
                    }
                    if (!$joined) {
                      $teams = array();
                      $teams[$user['id']][$bot] = array(0,0,time());
                      $teams[$bot][$user['id']] = array(0,0,time());

                      db_query("INSERT INTO `battle`
                          (
                              `id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,date
                          )
                          VALUES
                          (
                              NULL,'','".serialize($teams)."','".($user["level"]==1?"1":"3")."','1','0','".$user['id']."','".$bot."','".time()."','".time()."', '".date("Y-m-d H:i")."'
                          )");

                      $id = db_insert_id();

                      // апдейтим бота
                      db_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$bot} LIMIT 1;");

                      // создаем лог
                      $rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($bot)."</b>";

                      //db_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>');");
                      addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");


                      db_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']};");
                    }

                    die("<script>location.href='fbattle.php';</script>");
                    ///=======================================================================================
                }
                addchp ('<font color=red>Внимание!</font> Вам предлагается начать тренировочный бой.   ','{[]}'.$user['login'].'{[]}');
                if ($user["level"]==1 || $user["level"]==2 || $user["level"]==3) {
                  echo "
                  <input type=\"hidden\" name=\"trainstart\" value=\"0\">
                  <br>Так же вы можете провести бой с тренером. Если ещё кто-то вашего уровня сейчас дерётся с тренером, то вы присоединитесь к его бою.
                  Для этого выберите соперника и нажмите кнопку \"начать тренировочный бой\":<br>
                  <table><tr><td><input checked id=\"trainer1\" value=\"1\" type=radio title=\"Самый слабый, мало опыта\" name=opponent value=1>
                  <label for=\"trainer1\" title=\"Самый слабый, мало опыта\"><b>".$trainers[$user["level"]][1]["login"]."</b> [$user[level]]</label> <a target=\"_blank\" href=\"/inf.php?".$trainers[$user["level"]][1]["id"]."\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <table>
                  <tr><td>Сила</td><td>".$trainers[$user["level"]][1]["sila"]."</td></tr>
                  <tr><td>Ловкость</td><td>".$trainers[$user["level"]][1]["lovk"]."</td></tr>
                  <tr><td>Интуиция</td><td>".$trainers[$user["level"]][1]["inta"]."</td></tr>
                  <tr><td>Выносливость</td><td>".$trainers[$user["level"]][1]["vinos"]."</td></tr>
                  <tr><td colspan=2>безоружный</td></tr>
                  </table>
                  </td><td>
                  <input id=\"trainer2\" type=radio name=opponent value=2> <label for=\"trainer2\"><b>".$trainers[$user["level"]][2]["login"]."</b> [$user[level]]</label> <a target=\"_blank\" href=\"/inf.php?".$trainers[$user["level"]][2]["id"]."\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <table>
                  <tr><td>Сила</td><td>".$trainers[$user["level"]][2]["sila"]."</td></tr>
                  <tr><td>Ловкость</td><td>".$trainers[$user["level"]][2]["lovk"]."</td></tr>
                  <tr><td>Интуиция</td><td>".$trainers[$user["level"]][2]["inta"]."</td></tr>
                  <tr><td>Выносливость</td><td>".$trainers[$user["level"]][2]["vinos"]."</td></tr>
                  <tr><td colspan=2>оружие: 2 меча</td></tr>
                  </table>
                  </td><td>
                  <input id=\"trainer3\" type=radio name=opponent value=3> <label for=\"trainer3\"><b>".$trainers[$user["level"]][3]["login"]."</b> [$user[level]]</label> <a target=\"_blank\" href=\"/inf.php?".$trainers[$user["level"]][3]["id"]."\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <table>
                  <tr><td>Сила</td><td>".$trainers[$user["level"]][3]["sila"]."</td></tr>
                  <tr><td>Ловкость</td><td>".$trainers[$user["level"]][3]["lovk"]."</td></tr>
                  <tr><td>Интуиция</td><td>".$trainers[$user["level"]][3]["inta"]."</td></tr>
                  <tr><td>Выносливость</td><td>".$trainers[$user["level"]][3]["vinos"]."</td></tr>
                  <tr><td colspan=2>оружие: 2 кинжала</td></tr>
                  </table>
                  </td><td>
                  <input id=\"trainer4\" type=radio name=opponent value=4> <label for=\"trainer4\"><b>".$trainers[$user["level"]][4]["login"]."</b> [$user[level]]</label> <a target=\"_blank\" href=\"/inf.php?".$trainers[$user["level"]][4]["id"]."\"><img border=\"0\" src=\"".IMGBASE."/i/inf.gif\"></a>
                  <table>
                  <tr><td>Сила</td><td>".$trainers[$user["level"]][4]["sila"]."</td></tr>
                  <tr><td>Ловкость</td><td>".$trainers[$user["level"]][4]["lovk"]."</td></tr>
                  <tr><td>Интуиция</td><td>".$trainers[$user["level"]][4]["inta"]."</td></tr>
                  <tr><td>Выносливость</td><td>".$trainers[$user["level"]][4]["vinos"]."</td></tr>
                  <tr><td colspan=2>оружие: 2 меча</td></tr>
                  </table>
                  </td></tr></table>
                  <div style=\"padding-left:260px;padding-top:10px\">
                    <input onclick=\"document.F1.trainstart.value=1\" type=\"submit\" value=\"Начать тренировочный бой\">
                  </div>
                  ";
                } else {
                  echo " или <input type=button onclick=\"location.href='zayavka.php?level=fiz&trainstart=1';\" value=\"Начать тренировочный бой\">";
                }

            }elseif($user['level'] <= 3) {echo " <small>Через минуту после подачи заявки вы можете начать бой с клоном.</small>";}
            }
        }
    }
    if( $zay->ustatus($user['id'])==2 ) {
        if ($z[$user['zayavka']]['level'] == 2)
        echo "Ожидаем подтверждения боя. <input type=submit name=back2 value='Отозвать заявку'>";
    }
    echo '</td></tr></table></TD><TD align=right valign=top rowspan=2><INPUT TYPE=submit name=tmp value="Обновить"><BR><FIELDSET style="width:150px;"><LEGEND>Показывать заявки</LEGEND><table cellspacing=0 cellpadding=0 ><tr><td width=1%><input type=radio name=view value="'.$user['level'].'" '.(($_SESSION['view'] != null)?"checked":"").'></td><td>моего уровня</td></tr><tr><td><input type=radio name=view value="" '.(($_SESSION['view'] == null)?"checked":"").'></td><td>все</td></tr></table></FIELDSET>';
    echo '<tr><td><INPUT TYPE=hidden name=level value=fiz><INPUT TYPE=submit value="Принять вызов" NAME=confirm2><BR>';
    if ($z = $zay->getlist(2,$_SESSION['view']))
    foreach ($z as $k=>$v) {
        echo $zay->showfiz( $v );
    }
    echo '<INPUT TYPE=submit value="Принять вызов" NAME=confirm2></TD></TR></TABLE>';
}

if ($_REQUEST['level'] == 'group') {
    if($user['level']<2) {
        echo "<BR><BR><BR><CENTER><B>Групповые бои доступны с 2 уровня.</b></CENTER>";
        die();
    }

    if($_POST['open1'] && !$user['zayavka']) {
        echo '<TABLE><TR><TD>
            <H3>Подать заявку на групповой бой</H3>
            Начало боя через <SELECT NAME=startime>
            <option value=300>5 минут
            <option value=600>10 минут
            <option value=900 selected>15 минут
            <option value=1800>30 минут
            <option value=2700>45 минут
            <option value=3600>1 час
            </SELECT>
            &nbsp;&nbsp;&nbsp;&nbsp;Таймаут <SELECT NAME=timeout><OPTION value=1>1 мин.<OPTION value=3>3 мин.<OPTION value=4>4 мин.<OPTION value=5 selected>5 мин.<OPTION value=7>7 мин.<OPTION value=10>10 мин.</SELECT>
            <BR><BR>
            Ваша команда <INPUT TYPE=text NAME=nlogin1 size=3 maxlength=2> бойцов<BR>
            Уровни союзников &nbsp;&nbsp;<SELECT NAME=levellogin1>
            <option value=0>любой
            <option value=1>только моего и ниже
            <option value=2>только ниже моего уровня
            <option value=3>только моего уровня
            <option value=4>не старше меня более чем на уровень
            <option value=5>не младше меня более чем на уровень
            <option value=6>мой уровень +/- 1
            <option value=99>мой клан
            </SELECT><BR><BR>
            Противники &nbsp;&nbsp;<INPUT TYPE=text NAME=nlogin2 size=3 maxlength=2> бойцов<BR>
            Уровни противников <SELECT NAME=levellogin2>
            <option value=0>любой
            <option value=1>только моего и ниже
            <option value=2>только ниже моего уровня
            <option value=3>только моего уровня
            <option value=4>не старше меня более чем на уровень
            <option value=5>не младше меня более чем на уровень
            <option value=6>мой уровень +/- 1
            <option value=99>только клан
            </SELECT><BR>
            <INPUT TYPE=checkbox NAME=k> Кулачный бой<BR>
            <INPUT TYPE=checkbox NAME=travma> Бой без правил (<font class=dsc>проигравшая сторона получает инвалидность</font>)<BR>
            Комментарий к бою <INPUT TYPE=text NAME=cmt maxlength=40 size=40>
            </TD></TR>
            <TR><TD align=center>
            <INPUT TYPE=submit value="Начнем месилово! :)" name=open>
            </TD></TR>
            </TABLE>
            </TD><TD align=right valign=top>
            <INPUT TYPE=submit value="Вернуться">
            </TD></TR></TABLE><INPUT TYPE=hidden name=level value=group>';
            die();
    }

    if($_POST['goconfirm'] && !$user['zayavka']) {
        echo '<TABLE width=100%><TR><TD>';
        $z =  $zay->getlist(4,null,$_POST['gocombat']);
        echo "<B>Ожидаем начала группового боя...</B><BR>Бой начнется через: ".round(($z[$_POST['gocombat']]['start']-time())/60,1)." мин.";
        echo '</TD><TD align=right><INPUT TYPE=submit value="Вернуться"></TD></TR></TABLE><H3>На чьей стороне будете сражаться?</H3>
                <TABLE align=center cellspacing=4 cellpadding=1><TR><TD bgcolor=99CCCC><B>Группа 1:</B><BR>
                Максимальное кол-во: '.$z[$_POST['gocombat']]['t1c'].'<BR>
                Ограничения по уровню: '.($z[$_POST['gocombat']]['t1min']==99?'клан':$z[$_POST['gocombat']]['t1min']." - ".$z[$_POST['gocombat']]['t1max']).'
                </TD><TD bgcolor=99CCCC><B>Группа 2:</B><BR>
                Максимальное кол-во: '.$z[$_POST['gocombat']]['t2c'].'<BR>
                Ограничения по уровню: '.($z[$_POST['gocombat']]['t2min']==99?'клан':$z[$_POST['gocombat']]['t2min']." - ".$z[$_POST['gocombat']]['t2max']).'
                </TD></TR><TR>
                <TD align=center>';
        foreach( $z[$_POST['gocombat']]['team1'] as $k=>$v ) {
                    if ($k!=0) $rr.="<BR>";
                    echo nick3($v);
        }
        echo '</TD><TD align=center>';
        foreach( $z[$_POST['gocombat']]['team2'] as $k=>$v ) {
                    if ($k!=0) $rr.="<BR>";
                    echo nick3($v);
        }
        echo '</TD></TR><TR><TD align=center><INPUT TYPE=submit name=confirm1 value="Я за этих!"></TD><TD align=center><INPUT TYPE=submit name=confirm2 value="Я за этих!"></TD></TR></TABLE>
                <INPUT TYPE=hidden name=gocombat value="'.$_POST['gocombat'].'"><INPUT TYPE=hidden name=level value=group>';
        die();
    }
    echo "<font color=red><b>";
    // in da battle
    if(($_POST['confirm1']) && $_POST['gocombat'] && !$user['zayavka']) {
        echo $zay->addteam (1,$user['id'], $_REQUEST['gocombat'], 4);
    }
    if(($_POST['confirm2']) && $_POST['gocombat'] && !$user['zayavka']) {
        echo $zay->addteam (2,$user['id'], $_REQUEST['gocombat'], 4);
    }
    /////////////////////////////////
    /////// Подача груп заявки ///////
    /////////////////////////////////
    if($_POST['open'] && !$user['zayavka']) {
        //print_r($_REQUEST);
        switch($_POST['levellogin1']) {
            case 0 :
                $min1 = 2;
                $max1 = 21;
            break;
            case 1 :
                $min1 = 2;
                $max1 = $user['level'];
            break;
            case 2 :
                $min1 = 2;
                $max1 = $user['level']-1;
            break;
            case 3 :
                $min1 = $user['level'];
                $max1 = $user['level'];
            break;
            case 4 :
                $min1 = $user['level'];
                $max1 = $user['level']+1;
            break;
            case 5 :
                $min1 = $user['level']-1;
                $max1 = $user['level'];
            break;
            case 6 :
                $min1 = (int)$user['level']-1;
                $max1 = (int)$user['level']+1;
            break;
            // KLANNNNNNNNNNNNNN
            case 99 :
                $min1 = 99;
                $max1 = 99;
            break;
        }
        switch($_POST['levellogin2']) {
            case 0 :
                $min2 = 2;
                $max2 = 21;
            break;
            case 1 :
                $min2 = 2;
                $max2 = $user['level'];
            break;
            case 2 :
                $min2 = 2;
                $max2 = $user['level']-1;
            break;
            case 3 :
                $min2 = $user['level'];
                $max2 = $user['level'];
            break;
            case 4 :
                $min2 = $user['level'];
                $max2 = $user['level']+1;
            break;
            case 5 :
                $min2 = $user['level']-1;
                $max2 = $user['level'];
            break;
            case 6 :
                $min2 = (int)$user['level']-1;
                $max2 = (int)$user['level']+1;
            break;
            // KLANNNNNNNNNNNNNN
            case 99 :
                $min2 = 99;
                $max2 = 99;
            break;
        }
        if($_POST['k']) {
            $_POST['k'] = 4;
        } else {
            $_POST['k'] = 2;
        }
        if($_POST['travma']) {
            $blood = 1;
        } else {
            $blood = 0;
        }
        if ($_POST['nlogin1'] == 1 && $_POST['nlogin2'] == 1) {
        echo "Не надо превращать групповой бой в физический поединок";
        }
        else {
        echo $zay->addzayavka ($_POST['startime']/60,$_POST['timeout'], $_POST['nlogin1'], $_POST['nlogin2'], $_POST['k'], $min1, $min2, $max1, $max2, $_POST['cmt'], $user['id'], 4, 0, $blood);
        }
    }
    /////////////////////////////////
    echo "</font></b><INPUT TYPE=hidden name=level value=group>";
    echo '<table cellspacing=0 cellpadding=0><tr><td>';
    if( $zay->ustatus($user['id'])==0 ) {
        echo '<INPUT TYPE=hidden name=level value=group><INPUT TYPE=submit value="Подать новую заявку" name=open1>';
    }
    if( $zay->ustatus($user['id'])!=0) {
        $z =  $zay->getlist(4,null,$user['zayavka']);
        if ($z[$user['zayavka']]['level'] == 4) {
            echo "<B>Ожидаем начала группового боя...</B><BR>Бой начнется через: ".round(($z[$user['zayavka']]['start']-time())/60,1)." мин.";
        }
    }
    echo '</td></tr></table></TD><TD align=right valign=top rowspan=2><INPUT TYPE=submit name=tmp value="Обновить"><BR><FIELDSET style="width:150px;"><LEGEND>Показывать заявки</LEGEND><table cellspacing=0 cellpadding=0 ><tr><td width=1%><input type=radio name=view value="'.$user['level'].'" '.(($_SESSION['view'] != null)?"checked":"").'></td><td>моего уровня</td></tr><tr><td><input type=radio name=view value="" '.(($_SESSION['view'] == null)?"checked":"").'></td><td>все</td></tr></table></FIELDSET>';
    echo '<tr><td width=85%>';
    echo '<BR><INPUT TYPE=submit value="Принять участие в мясорубке" NAME=goconfirm><BR>';
    if ($z = $zay->getlist(4,$_SESSION['view']))
    foreach ($z as $k=>$v) {
        if ((($z[$k]['start']-time()) < 0) OR (($z[$k]['t1c'] == count($z[$k]['team1'])) && ($z[$k]['t2c'] == count($z[$k]['team2'])))) {
            $zay->battlestart("CHAOS", $k, 4);
        }
        echo $zay->showgroup( $v );
    }
    echo '<INPUT TYPE=submit value="Принять участие в мясорубке" NAME=goconfirm></td></tr></table>';
}


if ($_REQUEST['level'] == 'haos') {
    if($user['level']<2 && !APR1) {
        echo "<BR><BR><BR><CENTER><B>Хаотичные бои доступны с 2 уровня.</b></CENTER>";
        die();
    }
    echo "<font color=red><b>";
    if ($_POST['open'] && $_POST['levellogin1']==7) {
      $i=mqfa1("select id from zayavka where type='$_POST[k]' and t1max=99");
      if ($i) {
        $_POST['confirm2']=1;
        $_REQUEST['gocombat']=$i;
        unset($_POST['open']);
      }
    }
    if($_POST['open'] && !$user['zayavka']) {
        switch($_POST['levellogin1']) {
            case 0 :
                $min1 = 2;
                $max1 = 21;
            break;
            case 1 :
                $min1 = 2;
                $max1 = $user['level'];
            break;
            case 3 :
                $min1 = $user['level'];
                $max1 = $user['level'];
            break;
            case 4 :
                $min1 = 2;
                $max1 = $user['level']+1;
            break;
            case 5 :
                $min1 = ($user["level"]>2?$user['level']-1:$user["level"]);
                $max1 = 21;
            break;

            case 6 :
                $min1 = (int)$user['level']-1;
                $max1 = (int)$user['level']+1;
            break;
            case 7 :
                $min1 = 2;
                $max1 = 99;
            break;
        }
        //$_POST['k'] = 3;

        if($_POST['travma']) {
            $blood = 1;
        } else {
            $blood = 0;
        }
        $closed=(int)@$_POST["closed"];
        echo $zay->addzayavka ($_POST['startime2']/60,$_POST['timeout'], 99, 99, $_POST['k'], $min1, $min1, $max1, $max1, $_POST['cmt'], $user['id'], 5, 0, $blood, $closed);
    }
    if($_POST['confirm2'] && !$user['zayavka']) {
        echo $zay->addteam (1,$user['id'], $_REQUEST['gocombat'], 5);
    }

    echo "</b></font>";

    echo '<table cellspacing=0 cellpadding=0><tr><td>';
    if( $zay->ustatus($user['id'])==0 ) {
        echo 'Хаотичный бой - разновидность группового, где группы формируются автоматически. Бой не начнется, если собралось меньше 4-х человек. <DIV id="dv2" style="display:"><A href="#" onclick="clearTimeout(timerID); dv1.style.display=\'\'; dv2.style.display=\'none\'; return false">Подать заявку на хаотичный бой</A></DIV><DIV id="dv1" style="display: none"><FIELDSET><LEGEND><B>Подать заявку на хаотичный бой</B> </LEGEND>Начало боя через <SELECT NAME=startime2><option value=300>5 минут<option value=600>10 минут<option value=900 selected>15 минут<option value=1800>30 минут<option value=2700>45 минут<option value=3600>1 час</SELECT>&nbsp;&nbsp;&nbsp;&nbsp;Таймаут <SELECT NAME=timeout><OPTION value=1>1 мин.<OPTION value=3 SELECTED>3 мин.<OPTION value=5>5 мин.<OPTION value=10>10 мин.</SELECT><BR>Уровни бойцов &nbsp;&nbsp;<SELECT NAME=levellogin1>
        <option value=0>любой</option>
        <option value=1>только моего и ниже</option>
        <!--<option value=2>только ниже моего уровня-->
        <option value=3>только моего уровня</option>
        <option value=4>не старше меня более чем на уровень</option>
        <option value=5>не младше меня более чем на уровень</option>
        <option value=6 selected>мой уровень +/- 1</option>
        <option value=7>Общий хаотичный бой (любой уровень)</option>
        </SELECT><BR><BR>Тип боя <SELECT NAME=k><OPTION value=3>с оружием<OPTION value=5>кулачный</SELECT><BR><INPUT TYPE=checkbox NAME=travma> Бой без правил (<font class=dsc>проигравшая сторона получает инвалидность</font>)<BR>
        <INPUT TYPE=checkbox NAME=closed value=1> Закрытый бой (<font class=dsc>в этот бой нельзя вмешаться магией нападения</font>)<BR>

        <INPUT TYPE=submit name=open value="Подать заявку">&nbsp;<BR>Комментарий к бою <INPUT TYPE=text NAME=cmt maxlength=40 size=40></FIELDSET><BR></DIV>';
    }
    if( $zay->ustatus($user['id'])!=0) {
        $z =  $zay->getlist(5,null,$user['zayavka']);
        if ($z[$user['zayavka']]['level'] == 5)
        echo "<B>Ожидаем начала группового боя...</B><BR>Бой начнется через: ".round(($z[$user['zayavka']]['start']-time())/60,1)." мин.";
    }
    echo '</td></tr></table></TD><TD align=right valign=top rowspan=2><INPUT TYPE=submit name=tmp value="Обновить"><BR><FIELDSET style="width:150px;"><LEGEND>Показывать заявки</LEGEND><table cellspacing=0 cellpadding=0 ><tr><td width=1%><input type=radio name=view value="'.$user['level'].'" '.(($_SESSION['view'] != null)?"checked":"").'></td><td>моего уровня</td></tr><tr><td><input type=radio name=view value="" '.(($_SESSION['view'] == null)?"checked":"").'></td><td>все</td></tr></table></FIELDSET>';
    echo '<tr><td width=85%><INPUT TYPE=hidden name=level value=haos><INPUT TYPE=submit value="Принять участие в мясорубке" NAME=confirm2><BR>';
    if ($z = $zay->getlist(5,$_SESSION['view']))
    foreach ($z as $k=>$v) {
        if (($z[$k]['start']-time()) < 0) {
            $zay->battlestart("CHAOS", $k, 5);
        }
        echo $zay->showhaos( $v );
    }
    echo '<INPUT TYPE=submit value="Принять участие в мясорубке" NAME=confirm2></TD></TR></TABLE>';
    //print_r($_POST);
}
// teku4ki
if ($_REQUEST['tklogs'] != null) {
$t1=floor(time()-900);

    $data = db_query("SELECT battle.*, date_format(`date`,'%d.%m.%Y %H:%i') as `date` FROM `battle` WHERE `win`='3' and `to1`>'".$t1."' and `to2`>'".$t1."' and teams<>'N;' ORDER by `date` ASC;");
    while($row = @mysqli_fetch_array($data)) {
        echo "<span class=date>{$row['date']}</span>";
        if ($user['id'] == 7) {
            echo $row['id'];
        }
        $z = split(";",$row['t1']);
        foreach($z as $k=>$v) {
            if ($k > 0) {  echo ","; }
            nick2($v);
        }

        echo " <font color=red><b>против</b></font> ";
        $z = split(";",$row['t2']);
        foreach($z as $k=>$v) {
            if ($k > 0) {  echo ","; }
            nick2($v);
        }

        echo "<img src='".IMGBASE."/i/fighttype{$row['type']}.gif'> <a href='logs.php?log={$row['id']}' target=_blank>»»</a><BR>";
    }
}
// zavershonki
if ($_REQUEST['logs'] != null) {
    echo '<TABLE width=100% cellspacing=0 cellpadding=0><TR>
            <TD valign=top>&nbsp;<A HREF="zayavka.php?logs='.
            date("d.m.y",mktime(0, 0, 0, substr($_REQUEST['logs'],3,2), substr($_REQUEST['logs'],0,2)-1, "20".substr($_REQUEST['logs'],6,2)))
            .'&filter='.(($_REQUEST['filter'])?$_REQUEST['filter']:$user['login']).'">« Предыдущий день</A></TD>
            <TD valign=top align=center><H3>Записи о завершенных боях за '.(($_REQUEST['logs']!=1)?"{$_REQUEST['logs']}":"".date("d.m.y")).'</H3></TD>
            <TD  valign=top align=right><A HREF="zayavka.php?logs='.
            date("d.m.y",mktime(0, 0, 0, substr($_REQUEST['logs'],3,2), substr($_REQUEST['logs'],0,2)+1, "20".substr($_REQUEST['logs'],6,2)))
            .'&filter='.(($_REQUEST['filter'])?$_REQUEST['filter']:$user['login']).'">Следующий день »</A>&nbsp;</TD>
            </TR><TR><TD colspan=3 align=center>Показать только бои персонажа: <INPUT TYPE=text NAME=filter value="'.(($_REQUEST['filter'])?$_REQUEST['filter']:$user['login']).'"> за <INPUT TYPE=text NAME=logs size=12 value="'.(($_REQUEST['logs']!=1)?"{$_REQUEST['logs']}":"".date("d.m.y")).'"> <INPUT TYPE=submit value="фильтр!"></TD>
            </TR></TABLE>';

    $u = mysqli_fetch_array(db_query("SELECT `id` FROM `users` WHERE `login` = '".(($_REQUEST['filter'])?"{$_REQUEST['filter']}":"{$user['login']}")."' LIMIT 1;"));
    $cond="";
    $r=mq("select battle from invisbattles where user='$u[id]'");
    while ($rec=mysqli_fetch_assoc($r)) {
      $cond.=" id<>$rec[battle] and ";
    }
    $data = mq("SELECT * FROM `battle` WHERE $cond ((`t1` LIKE '%;{$u[0]};%' OR `t1` LIKE '{$u[0]}' OR `t1` LIKE '{$u[0]};%' OR `t1` LIKE '%;{$u[0]}') OR (`t2` LIKE '%;{$u[0]};%' OR `t2` LIKE '{$u[0]}' OR `t2` LIKE '{$u[0]};%' OR `t2` LIKE '%;{$u[0]}')) AND `date` LIKE '".(($_REQUEST['logs']!=1)?"20".substr($_REQUEST['logs'],6,2)."-".substr($_REQUEST['logs'],3,2)."-".substr($_REQUEST['logs'],0,2):"".date("Y-m-d"))." %' ORDER by `id` ASC;");
    while($row = @mysqli_fetch_array($data)) {
        echo "<span class=date>{$row['date']}</span>";
        //$z = split(";",$row['t1']);
        /*foreach($z as $k=>$v) {
            if ($k > 0) {  echo ","; }
            nick2($v);
        }*/
        echo $row['t1hist'];
        if ($row['win'] == 1) { echo '<img src='.IMGBASE.'/i/flag.gif>'; }
        echo " против ";
        //$z = split(";",$row['t2']);
        /*foreach($z as $k=>$v) {
            if ($k > 0) {  echo ","; }
            nick2($v);
        }*/
        echo $row['t2hist'];
        if ($row['win'] == 2) { echo '<img src='.IMGBASE.'/i/flag.gif>'; }
        if ($row['type'] == 10) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> ";
            }
            elseif ($row['blood'] && ($row['type'] == 5 OR $row['type'] == 4)) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype5.gif\" WIDTH=20 HEIGHT=20 ALT=\"кулачный бой\"><IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> ";
            }
            elseif ($row['blood'] && ($row['type'] == 2 OR $row['type'] == 3 OR $row['type'] == 6)) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype6.gif\" WIDTH=20 HEIGHT=20 ALT=\"Кровавый поединок\"> ";
            }
            elseif ($row['type'] == 5 OR $row['type'] == 4) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype4.gif\" WIDTH=20 HEIGHT=20 ALT=\"кулачный бой\"> ";
            }
            elseif ($row['type'] == 3 OR $row['type'] == 2) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype3.gif\" WIDTH=20 HEIGHT=20 ALT=\"групповой бой\"> ";
            }
            elseif ($row['type'] == 1) {
                $rr = "<IMG SRC=\"".IMGBASE."/i/fighttype1.gif\" WIDTH=20 HEIGHT=20 ALT=\"физический бой\"> ";
            } echo $rr;
        echo " <a href='logs.php?log={$row['id']}' target=_blank>»»</a><BR>";
        $i++;
    }
    if($i==0) {
        echo '<CENTER><BR><BR><B>В этот день не было боев, или же, летописец опять потерял свитки...</B><BR><BR><BR></CENTER>';
    }
    echo '<HR><BR>';
}



db_query("UNLOCK TABLES;");

?>
</FORM>
</BODY>
</HTML>