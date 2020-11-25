 <?php
ob_start("ob_gzhandler",9);

//define("WINTER", "");
define("WINTER","/");

function smallshowpersout($id,$pas = 0,$battle = 0,$me = 0,$show_pr = 0) {
    global $mysql, $rooms;

    if($id > _BOTSEPARATOR_) {
      $bots = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `id` = '.$id.' LIMIT 1;'));
      $id=$bots['prototype'];
      $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
      $user['login'] = $bots['name'];
      $user['hp'] = $bots['hp'];
      $user['id'] = $bots['id'];
    } else {
      $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
    }

   ?>
    <A HREF="javascript:top.AddToPrivate('<?=$user['login']?>', top.CtrlPress)" target=refreshed><img src="<?=IMGBASE?>/i/lock.gif" width=20 height=15></A><?if($user['align']>0){echo"<img src=\"".IMGBASE."/i/align_".$user['align'].".gif\">";} if ($user['klan'] <> '') { echo '<img title="'.$user['klan'].'" src="http://img.bestcombats.net/klan/'.$user['klan'].'.gif">'; } ?><B><?=$user['login']?></B> [<?=$user['level']?>]<a href=inf.php?<?=$user['id']?> target=_blank><IMG SRC=<?=IMGBASE?>/i/inf.gif WIDTH=12 HEIGHT=11 ALT="Инф. о <?=$user['login']?>"></a>
    <TABLE cellspacing=0 cellpadding=0 style="  border-top-width: 1px;border-right-width: 1px;border-bottom-width: 1px;border-left-width: 1px;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;border-top-color: #FFFFFF;border-right-color: #666666;border-bottom-color: #666666;border-left-color: #FFFFFF;padding: 2px;">
<TR>
<TD>
<TABLE border=0 cellSpacing=1 cellPadding=0 width="100%" >
<TBODY>
<TR vAlign=top>
<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TBODY>

<TR><TD style="BACKGROUND-IMAGE:none">
<?php
if ($user['helm'] > 0) {
$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['helm']}' LIMIT 1;"));
if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
showhrefmagic($dress);
} else {
echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=60 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа шлеме выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа шлеме выгравировано '{$dress['text']}'":"").'" >';
}}else{
echo '<img src="'.IMGBASE.'/i/w9.gif" width=60 height=60 alt="Пустой слот шлем" >';
}
?>
</TD></TR>

<TR><TD style="BACKGROUND-IMAGE:none">
<?php
        if ($user['naruchi'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['naruchi']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=40 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа наручах выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа наручах выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w18.gif" width=60 height=40 alt="Пустой слот наручи" >';
        }

?></TD></TR>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['weap'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['weap']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=60 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['minu']>0)?"\nУрон {$dress['minu']}-{$dress['maxu']}":"").(($dress['text']!=null)?"\nНа оружии выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['minu']>0)?"\nУрон {$dress['minu']}-{$dress['maxu']}":"").(($dress['text']!=null)?"\nНа оружии выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w3.gif" width=60 height=60 alt="Пустой слот оружие" >';
        }
    ?></TD></TR>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['bron'] > 0 || $user['plaw'] > 0 || $user['rybax'] > 0) {
          if ($user['plaw']) {
            $d=$user['plaw'];
          } elseif ($user['bron']) {
            $d=$user['bron'];
          } elseif ($user['rybax']) {
            $d=$user['rybax'];
          }
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$d}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=80 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа одежде вышито '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа одежде вышито '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w4.gif" width=60 height=80 alt="Пустой слот броня" >';
        }
    ?></TD></TR>

<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['belt'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['belt']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=40 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа поясе выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа поясе выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w5.gif" width=60 height=40 alt="Пустой слот пояс" >';
        }
    ?></TD></TR>
</TBODY></TABLE>
</TD>

<TD>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TR>
<TD height=20 vAlign=middle>
<table cellspacing="0" cellpadding="0" style='line-height: 1'>
<tr><td nowrap style="font-size:9px" style="position: relative">
<table cellspacing="0" cellpadding="0" style='line-height: 1'><td nowrap style="font-size:9px"><div style="position: relative"><SPAN id="HP" style='position: absolute; left: 5; z-index: 1; font-weight: bold; color: #FFFFFF'></SPAN><img src="<?=IMGBASE?>/i/misc/bk_life_loose.gif" alt="Уровень жизни" name="HP1" width="1" height="9" id="HP1"><img src="<?=IMGBASE?>/i/misc/bk_life_loose.gif" alt="Уровень жизни" name="HP2" width="1" height="9" id="HP2"></div></td></table>
</td>
</tr>


<?
if($user['maxmana']){ ?>
<tr><tr><td nowrap style="font-size:9px"><div style="position: relative">
<?
echo setMP2($user['mana'],$user['maxmana'],$battle);
print"</div></td>
</tr>";}

$zver=mysql_fetch_array(mysql_query("SELECT shadow,login,level, vid FROM `users` WHERE `id` = '".$user['zver_id']."' LIMIT 1;"));
?>

</table>
</TD></TR>
<TR><TD height=220 vAlign=top width=120 align=left>
<DIV style="Z-INDEX: 1; POSITION: relative; WIDTH: 120px; HEIGHT: 220px" bgcolor="black">
<?
$strtxt = "<b>".$user['login']."</b><br>";
$strtxt .= "Сила: ".$user['sila']."<BR>";
$strtxt .= "Ловкость: ".$user['lovk']."<BR>";
$strtxt .= "Интуиция: ".$user['inta']."<BR>";
$strtxt .= "Выносливость: ".$user['vinos']."<BR>";
if ($user['level'] > 3) {
$strtxt .= "Интеллект: ".$user['intel']."<BR>";
}
if ($user['level'] > 6) {
$strtxt .= "Мудрость: ".$user['mudra']."<BR>";
}
if ($user['level'] > 9) {
$strtxt .= "Духовность: ".$user['spirit']."<BR>";
}
if ($user['level'] > 12) {
$strtxt .= "Воля: ".$user['will']."<BR>";
}
if ($user['level'] > 15) {
$strtxt .= "Свобода духа: ".$user['freedom']."<BR>";
}
if ($user['level'] > 18) {
$strtxt .= "Божественность: ".$user['god']."<BR>";
}
$strtxt .= "Сексуальность: ".$user['sexy']."<BR>";

if(!$pas && !$battle){
if($zver && $zver["vid"]){
?>
<div style="position:absolute; left:80px; top:145px; width:40px; height:73px; z-index:2">
<a href="zver_inv.php">
<IMG width=40 height=73 src='<?=IMGBASE?>/i/shadow/<?print"".$zver['shadow']."";?>' onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$zver['login']?> [<?=$zver['level']?>] (Перейти к настройкам)");'>
</a></div>
<? }?>
<a href="/main.php?edit=1"><IMG border=0 src="<?=IMGBASE?>/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218 onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$user['login']?> (Перейти в \"Инвентарь\")");' ></a>
<?
  echo showeffects($user["id"]);
}elseif($show_pr){
if($zver){
?>
<div style="position:absolute; left:80px; top:145px; width:40px; height:73px; z-index:2">
<a href="zver_inv.php">
<IMG width=40 height=73 src='<?=IMGBASE?>/i/shadow/<?print"".$zver['shadow']."";?>' onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$zver['login']?> [<?=$zver['level']?>] (Перейти к настройкам)");'>
</a></div>
<? }?>
<IMG border=0 src="<?=IMGBASE?>/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218 onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$strtxt?>");'>
<?
$ch_eff1 = mysql_query ('SELECT * FROM `effects` WHERE `owner` = '.$_SESSION['uid'].' and (`type`=188 or `type`=201 or `type`=202 or `type`=1022)');
$i=0;
while($ch_eff = mysql_fetch_array($ch_eff1)){
$i++;
                switch ($i) {
                    case '1':$left=0;$top=0;break;
                    case '2':$left=40;$top=0;break;
                    case '3':$left=80;$top=0;break;
                    case '4':$left=0;$top=25;break;
                    case '5':$left=40;$top=25;break;
                    case '6':$left=80;$top=25;break;
                    case '7':$left=0;$top=50;break;
                    case '8':$left=40;$top=50;break;
                    case '9':$left=80;$top=50;break;
                    case '10':$left=0;$top=75;break;
                    case '11':$left=40;$top=75;break;
                    case '12':$left=80;$top=75;break;
                }
$inf_el = mysql_fetch_array(mysql_query ('SELECT img FROM `shop` WHERE `name` = \''.$ch_eff['name'].'\';'));
if($ch_eff['type']==395){$inf_el['img']='defender.gif'; $opp='награда'; $chas=60; $chastxt="час.";}elseif($ch_eff['type']==201){$inf_el['img']='spell_protect10.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}elseif($ch_eff['type']==202){$inf_el['img']='spell_powerup10.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}elseif($ch_eff['type']==1022){$inf_el['img']='hidden.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}else{$opp='эликсир'; $chas=1; $chastxt="мин.";}
 ?> <div style="position:absolute; left:<?=$left?>px; top:<?=$top?>px; width:120px; height:220px; z-index:2"><IMG width=40 height=25 src='<?=IMGBASE?>/i/misc/icon_<?=$inf_el['img']?>' onmouseout='ghideshow();' onmouseover='gfastshow("<B><? echo $ch_eff['name'];?></B> (<?=$opp?>)<BR> еще <? echo ceil(($ch_eff['time']-time())/60/$chas);?> <?=$chastxt?>")';> </div>
<?}
$ch_priem1 = mysql_query ('SELECT pr_name FROM `person_on` WHERE `id_person` = '.$_SESSION['uid'].' and `pr_active`=2');

while($ch_priem = mysql_fetch_array($ch_priem1)){
$i++;
                switch ($i) {
                    case '1':$left=0;$top=0;break;
                    case '2':$left=40;$top=0;break;
                    case '3':$left=80;$top=0;break;
                    case '4':$left=0;$top=25;break;
                    case '5':$left=40;$top=25;break;
                    case '6':$left=80;$top=25;break;
                    case '7':$left=0;$top=50;break;
                    case '8':$left=40;$top=50;break;
                    case '9':$left=80;$top=50;break;
                    case '10':$left=0;$top=75;break;
                    case '11':$left=40;$top=75;break;
                    case '12':$left=80;$top=75;break;
                }
$inf_priem = mysql_fetch_array(mysql_query ('SELECT name,opisan FROM `priem` WHERE `priem` = \''.$ch_priem['pr_name'].'\';'));

 ?>
<div style="position:absolute; left:<?=$left?>px; top:<?=$top?>px; width:120px; height:220px; z-index:2">       <IMG width=40 height=25 src='<?=IMGBASE?>/i/priem/<?=$ch_priem['pr_name']?>.gif' onmouseout='hideshow();' onmouseover='fastshow("<B><? echo $inf_priem['name'];?></B> (прием)<BR><BR> <? echo $inf_priem['opisan'];?>")';> </div>
<?}
}elseif($zver){
?>
<div style="position:absolute; left:80px; top:145px; width:40px; height:73px; z-index:2">
<IMG width=40 height=73 src='<?=IMGBASE?>/i/shadow/<?print"".$zver['shadow']."";?>' alt="<?print"".$zver['login']."";?> [<?print"".$zver['level']."";?>]">
</div>
<IMG border=0 src="<?=IMGBASE?>/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218>
<?}elseif($battle && $invis){?>
<IMG border=0 src="<?=IMGBASE?>/i/shadow/invis.gif" width=120 height=218 onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$strtxt?>");'>
<?}elseif($battle){
if($zver){
?>
<div style="position:absolute; left:60px; top:118px; width:120px; height:220px; z-index:2">
<a href="zver_inv.php">
<IMG width=40 height=73 src='<?=IMGBASE?>/i/shadow/<?print"".$zver['shadow']."";?>' alt="alt="<?print"".$zver['login']."";?> [<?print"".$zver['level']."";?>] (Перейтик настройкам)">
</a></div>
<? }?>
<IMG border=0 src="<?=IMGBASE?>/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218 onmouseout='ghideshow();'  onmouseover='gfastshow("<?=$strtxt?>");'>
<?}else{?>

<IMG border=0 src="<?=IMGBASE?>/i/shadow/<?=$user['sex']?>/<?print"".$user['shadow']."";?>" width=120 height=218>
<?}?>
<DIV style="Z-INDEX: 2; POSITION: absolute; WIDTH: 120px; HEIGHT: 220px; TOP: 0px; LEFT: 0px"></DIV></DIV></TD></TR>
<TR><TD>

<?
if($battle && $invis && $user['id'] != $_SESSION['uid']) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_invis.gif" width=120 height=40>';
}elseif ($user['vip']==1) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom60.gif" width=120 height=40>';
}elseif ($user['align']>1 && $user['align']<2) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($user['align']>=3 && $user['align']<4) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom3.gif" width=120 height=40>';
}elseif ($user['align']==7) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom7.gif" width=120 height=40>';
}elseif ($user['align']==0.99) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom1.gif" width=120 height=40>';
}elseif ($user['align']==0.98) {
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom3.gif" width=120 height=40>';
}else{
echo'<IMG border=0 alt="" src="'.IMGBASE.'/i/slot_bottom0.gif" width=120 height=40>';
}
?>
</TD></TR></TABLE></TD>
<TD><TABLE border=0 cellSpacing=0 cellPadding=0 width="100%"><TBODY>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
    if($battle && $invis && $user['id'] != $_SESSION['uid']) {
        if ($user['sergi'] >= 0) {

            echo '<img src="'.IMGBASE.'/i/serg.gif" width=60 height=20>';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['kulon'] >= 0) {

            echo '<img src="'.IMGBASE.'/i/ojur.gif" width=60 height=20>';
        }
    ?></TD></TR>

<TR><TD><TABLE border=0 cellSpacing=0 cellPadding=0>
<TBODY> <TR>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r1'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/ring.gif" width=20 height=20>';
        }
    ?></td>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r2'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/ring.gif" width=20 height=20>';
        }
    ?></td>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r3'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/ring.gif" width=20 height=20>';
        }
    ?></td>
</TR></TBODY></TABLE></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['perchi'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/perchi.gif" width=60 height=40>';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['shit'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/shit.gif" width=60 height=60>';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['leg'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/leg.gif" width=60 height=80>';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['boots'] >= 0) {
            echo '<img src="'.IMGBASE.'/i/boots.gif" width=60 height=40>';
        }
        }else{?>
<?php
        if ($user['sergi'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['sergi']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=20 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа серьгах выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа серьгах выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w1.gif" width=60 height=20 alt="Пустой слот серьги" >';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['kulon'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['kulon']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)==$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=20 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа ожерелье выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа ожерелье выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w2.gif" width=60 height=20 alt="Пустой слот ожерелье" >';
        }
    ?></TD></TR>

<TR><TD><TABLE border=0 cellSpacing=0 cellPadding=0>
<TBODY> <TR>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r1'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r1']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=20 height=20 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w6.gif" width=20 height=20 alt="Пустой слот кольцо" >';
        }
    ?></td>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r2'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r2']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=20 height=20 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w6.gif" width=20 height=20 alt="Пустой слот кольцо" >';
        }
    ?></td>
<TD style="BACKGROUND-IMAGE: none"><?php
        if ($user['r3'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r3']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=20 height=20 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа кольце выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w6.gif" width=20 height=20 alt="Пустой слот кольцо" >';
        }
    ?></td>
</TR></TBODY></TABLE></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['perchi'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['perchi']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=40 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа перчатках выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа перчатках выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w11.gif" width=60 height=40 alt="Пустой слот перчатки" >';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['shit'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['shit']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=60 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['minu']>0)?"\nУрон {$dress['minu']}-{$dress['maxu']}":"").(($dress['text']!=null)?"\nНа щите выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа щите выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w10.gif" width=60 height=60 alt="Пустой слот щит" >';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['leg'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['leg']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=80 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа поножах выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа поножах выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w19.gif" width=60 height=80 alt="Пустой слот поножи" >';
        }
    ?></TD></TR>
<TR><TD style="BACKGROUND-IMAGE: none">
<?php
        if ($user['boots'] > 0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$user['boots']}' LIMIT 1;"));
            if ($dress['includemagicdex']&& (!$pas OR ($battle AND $me))) {
                showhrefmagic($dress);
            } else {
                echo '<img  '.((($dress['maxdur']-2)<=$dress['duration'] && $dress['duration'] > 2 && !$pas)?" style='background-image:url(".IMGBASE."/i/blink.gif);' ":"").' src="'.IMGBASE.'/i/sh/'.$dress['img'].'" width=60 height=40 title="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа ботинках выгравировано '{$dress['text']}'":"").'" alt="'.$dress['name']."\nПрочность ".$dress['duration']."/".$dress['maxdur']."".(($dress['ghp']>0)?"\nУровень жизни +{$dress['ghp']}":"").(($dress['gmana']>0)?"\nУровень маны +{$dress['gmana']}":"").(($dress['text']!=null)?"\nНа ботинках выгравировано '{$dress['text']}'":"").'" >';
            }
        }
        else
        {
            echo '<img src="'.IMGBASE.'/i/w12.gif" width=60 height=40 alt="Пустой слот обувь" >';
        }}
        ?></TD></TR>
</TBODY></TABLE></TD></TR>


<? if (!$pas && !$battle && ($user['m1'] > 0 or $user['m2'] > 0 or $user['m3'] > 0 or $user['m4'] > 0 or $user['m5'] > 0 or $user['m6'] > 0 or $user['m7'] > 0 or $user['m8'] > 0 or $user['m9'] > 0 or $user['m10'] > 0 or $user['m11'] > 0 or $user['m12'] > 0)) {?>
<TR>
    <TD colspan=3>
    <?
            echoscroll('m1'); echoscroll('m2'); echoscroll('m3'); echoscroll('m4'); echoscroll('m5');echoscroll('m6');

    ?>
    </TD>
</TR>
<TR>
    <TD colspan=3>
    <?
        echoscroll('m7'); echoscroll('m8'); echoscroll('m9'); echoscroll('m10'); echoscroll('m11');echoscroll('m12');
    ?>
    </TD>
</TR>
<? }?>

</TBODY></TABLE></TD></TR>
<TR><TD></TD>
<?


        $data = mysql_fetch_array(mysql_query("select * from `online` WHERE `date` >= ".(time()-60)." AND `id` = ".$user['id'].";"));
    ?></A>
</TABLE>
</CENTER><CENTER>

<TABLE cellPadding=0 cellSpacing=0 width="100%">
        <TBODY>
          <?
    if(!$battle){
?>
        <? if ($pas){ ?><TR>

          <TD align=middle colSpan=2><B>Virt<img src="<?=IMGBASE?>/i/misc/forum/fo1.gif">City</B></TD></TR>
        <TR>
          <TD colSpan=2>
          <SMALL><?php
$online = mysql_fetch_array(mysql_query('SELECT u.* ,o.date,u.* ,o.real_time FROM `users` as u, `online` as o WHERE u.`id` = o.`id` AND u.`id` = \''.$user['id'].'\' LIMIT 1;'));
            if ($data['id'] != null or ($user['id'] == 99 && vrag=="on")) {
                if($data['room'] > 500 && $data['room'] < 561) {
                    $rrm = 'Башня смерти, участвует в турнире';
                }
                elseif($user['id'] == 99) {
                    $rrm = "Центральная площадь";
                $vrag_b = mysql_fetch_array(mysql_query("SELECT `battle` FROM `bots` WHERE  `prototype` = 99 LIMIT 1 ;"));
                                $user['battle']=$vrag_b['battle'];
                }
                else {
                    $rrm = $rooms[$data['room']];
                }
                echo '<center>Персонаж сейчас находится в клубе.</center><center>Локация : <B>"'.$rrm.'"</B></center>';
            } else
            {

function getDateInterval($pointDate)
{
   $pointNow = time();

   $times = array('year' => 60*60*24*365, 'month' =>60*60*24*31, 'week' =>60*60*24*7, 'day' => 60*60*24, 'hour' => 60*60, 'minute' => 60);

   $pointInterval = $pointDate > $pointNow ? $pointDate - $pointNow : $pointNow - $pointDate;

   $returnDate = array();

   $returnDate['year'] = floor($pointInterval / $times['year']);
   $pointInterval = $pointInterval % $times['year'];

   $returnDate['month'] = floor($pointInterval / $times['month']);
   $pointInterval = $pointInterval % $times['month'];

   $returnDate['week'] = floor($pointInterval / $times['week']);
   $pointInterval = $pointInterval % $times['week'];

   $returnDate['day'] = floor($pointInterval / $times['day']);
   $pointInterval = $pointInterval % $times['day'];

   $returnDate['hour'] = floor($pointInterval / $times['hour']);
   $pointInterval = $pointInterval % $times['hour'];

   $returnDate['minute'] = floor($pointInterval / $times['minute']);
   $pointInterval = $pointInterval % $times['minute'];


   return $returnDate;

}

$date = getDateInterval($online['date']);

function year_text($days) {
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
function month_text($days) {
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
function week_text($days) {
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
function days_text($days) {
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
function hour_text($days) {
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
function minute_text($days) {
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
$year = year_text($date['year']);
$month = month_text($date['month']);
$week = week_text($date['week']);
$days = days_text($date['day']);
$hour = hour_text($date['hour']);
$minute = minute_text($date['minute']);



if ($days>0 or $week>0 or $month>0 or $year>0){$minute="";}
if ($week>0 or $month>0 or $year>0){$hour="";}
if ($month>0 or $year>0){$week="";}



                echo "<center>Персонаж не в клубе, но был тут:</center><center>".date("Y.m.d H:i", $online['date'])."<IMG src=\"".IMGBASE."/i/clok3_2.png\" alt=\"Время сервера\"></center>";
echo"<center>(".$year.$month.$week.$days.$hour.$minute." назад)</center>";
                }
            ?><?
            if ($user['battle'] > 0) {
                echo '<center>Персонаж сейчас в <a target=_blank href="logs.php?log=',$user['battle'],'"><IMG height=12 width=12 src="'.IMGBASE.'/i/fighttype1.gif"> поединке</a></center>';
            }
            ?></CENTER></SMALL></TD></TR><?  }
            ?>
            </TBODY></TABLE></CENTER>


</TD>
    <TD valign=top <?=(!$pas?"style='width:350px;'":"")?>>
<table><tr><td><BR>
</td></tr></table><?
} else {
?>
</table>
  <?
  }
  }
  nick99 ($_SESSION['uid']);



  $der=mysql_query("SELECT glav_id FROM vxodd WHERE login='".$user['login']."'");
  if($deras=mysql_fetch_array($der) && ($_GET['cp'] || $_GET['strah'] || $_GET["got"])){
    header('location: vxod.php?warning=3');
    die();
  }

  if ($_GET['strah'] && ($user['room']==311 or $user['room']==316 or $user['room']==315 or $user['room']==316 or $user['room']==28 or $user['room']==37)) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '314',`online`.`room` = '314' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=314;
  }

  if ($_GET['kaz'] && ($user['room']==311 or $user['room']==316 or $user['room']==314 or $user['room']==3151 or $user['room']==3152 or $user['room']==37)) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '315',`online`.`room` = '315' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=315;
  }

  if ($_GET['cp'] && ($user['room']==313 or $user['room']==314 or $user['room']==2005)) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '311',`online`.`room` = '311' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=311;
  }

  if ($_GET['xrm'] && ($user['room']==22 or $user['room']==23 or $user['room']==311 or $user['room']==24 or $user['room']==25 or $user['room']==27 or $user['room']==314 or $user['room']==668 or $user['room']==11111 or $user['room']==1300 or $user['room']==2005 or $user['room']==7777 or $user['room']==1097)) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '313',`online`.`room` = '313' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=313;
  }
   if ($_GET['btg'] && ($user['room']==59 or $user['room']==23 or $user['room']==317 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '316',`online`.`room` = '316' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=316;
 }
   if ($_GET['psh'] && ($user['room']==59 or $user['room']==23 or $user['room']==317 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '319',`online`.`room` = '319' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=319;

  }

   if ($_GET['dvb'] && ($user['room']==316 or $user['room']==23 or $user['room']==24 or $user['room']==3162 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3161',`online`.`room` = '3161' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=3161;
  }

   if ($_GET['zlc'] && ($user['room']==3161 or $user['room']==23 or $user['room']==24 or $user['room']==3163 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3162',`online`.`room` = '3162' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=3162;
  }
  if ($_GET['phk'] && ($user['room']==316 or $user['room']==23 or $user['room']==319 or $user['room']==318 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '317',`online`.`room` = '317' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=317;

}
  if ($_GET['ph'] && ($user['room']==316 or $user['room']==23 or $user['room']==24 or $user['room']==317 or $user['room']==314 )) {
    mysql_query("UPDATE `users`,`online` SET `users`.`room` = '318',`online`.`room` = '318' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=318;
  }


  if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
  if ($user['in_tower'] == 1 || $user['in_tower'] == 2) { header('Location: towerin.php'); die(); }

  header("Cache-Control: no-cache");
  if ($_GET['got']) {
    $mt=canmove();
    if (!$mt) {
      $_GET['got'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
      include_once("config/routesem.php");
      if (WINTER) {
      } else {
      }
      $gotoroom=0;
      foreach ($_GET as $k=>$v) {
        if (strpos($k,"level")===0) {
          $gotoroom=str_replace("level","",$k);
          break;
        }
      }
      if (@$routes[$user["room"]] && in_array($gotoroom, $routes[$user["room"]])) {
        if (incastle($gotoroom) && !incastle($user["room"])) {
          $s=mqfa1("select value from variables where var='siege'");
          if ($s<10) {
            $gotoroom=0;
            if ($user["room"]!=105) echo "<font color=red><b>Во время осады нельзя входить в замок.</b></font>";
            $warning="Во время осады нельзя входить в замок.";
          }
        }
        if ($gotoroom) {
          if ($user["room"]==311) {
            if (haseffect($user["data"], MAKESNOWBALL)) mq("delete from effects where owner='$user[id]' and type=".MAKESNOWBALL);
          }
          gotoroom($gotoroom);
          $user["room"]=$gotoroom;
        }
      }
    }

  }

  if ($_GET['strah']) {
    $mt=canmove();
    if (!$mt) {
      $_GET['strah'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }

  if ($_GET['cp']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['cp'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }

  if ($_GET['bps']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['bps'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }
 if ($_GET['kaz']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['kaz'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }
   if ($_GET['xrm']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['xrm'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }

  if ($_GET['dvb']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['dvb'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }
   if ($_GET['zlc']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['zlc'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }
  if ($_GET['phk']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['php'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }
   if ($_GET['psh']) {
    $mt=canmove();
    if (!canmove()) {
      $_GET['psh'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
    }
  }




    if ($user['room']==311) {
        // CP

        if ($_GET['got'] && $_GET['level8']) {
            header('location: city.php?cp=1');
          
        }
        if ($_GET['got'] && $_GET['level2005']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '2005',`online`.`room` = '2005' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: station.php');
        }


    }

	elseif($user['room']==316) {
		// btg

		if ($_GET['got'] && $_GET['level4']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '314',`online`.`room` = '314' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?btg=1');
      }
     }
     elseif($user['room']==317) {
		// phk

		if ($_GET['got'] && $_GET['level317']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '317',`online`.`room` = '317' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?phk=1');
         }
       }
        
            elseif($user['room']==319) {
		// psh

		if ($_GET['got'] && $_GET['level319']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '319',`online`.`room` = '319' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?psh=1');

         }
     }
     elseif($user['room']==318) {
		// ph
     
		if ($_GET['got'] && $_GET['level318']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '318',`online`.`room` = '318' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?ph=1');
      }
     }

	elseif($user['room']==3161) {
		// dvb

		if ($_GET['got'] && $_GET['level4']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '316',`online`.`room` = '316' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?dvb=1');
          }
     }

	elseif($user['room']==3162) {
		//zlc

		if ($_GET['got'] && $_GET['level3162']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3162',`online`.`room` = '3162' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?zlc=1');
        }
        // altar
        if ($_GET['got'] && $_GET['level3163']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3163',`online`.`room` = '3163' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: church.php');
          

		}
     }
    elseif($user['room']==313) {
          // Парк
		if ($_GET['got'] && $_GET['level313']) {
			mysql_query("UPDATE `users`,`online` SET `users`.`room` = '313',`online`.`room` = '313' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
			header('location: city.php?xrm=1');

  
           }

     }

    elseif($user['room']==315) {
        //  kaz
        if ($_GET['got'] && $_GET['level4']) {
            header('location: city.php?kaz=1');
        }
        // ruletka
        if ($_GET['got'] && $_GET['level3151']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3151',`online`.`room` = '3151' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: roulette.php');
        }
        // kosti
        if ($_GET['got'] && $_GET['level3152']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3152',`online`.`room` = '3152' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: kosti.php');
        }
	}

    elseif($user['room']==314) {
        // strah
        if ($_GET['got'] && $_GET['level4']) {
            header('location: city.php?strah=1');
        }
        if ($_GET['got'] && $_GET['level5']) {
            if (($user['login'] != 'Jackpot' && $user['level'] < '4') OR ($user['level']>15 && $user["align"]!="2.5" && $user["align"]!="2.9")) {
                print "<script>alert('Вход в водосток только с 4 лвл! Либо вы выросли для посещения данного места.')</script>";
            }
            else {
                mysql_query("UPDATE `users`,`online` SET `users`.`room` = '402',`online`.`room` = '402' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                header('location: post.php');
            }
        }
        if ($_GET['got'] && $_GET['level6']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '34',`online`.`room` = '34' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: fshop.php');
        }
        if ($_GET['got'] && $_GET['level105']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '105',`online`.`room` = '105' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: obshaga.php');
        }
        if ($_GET['got'] && $_GET['level10']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '35',`online`.`room` = '35' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: berezka.php');
        }
        if ($_GET['got'] && $_GET['level2']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '28',`online`.`room` = '28' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: klanedit.php');
        }
        if ($_GET['got'] && $_GET['level7']) {
            if ($user['align'] == 4) {
                print "<script>alert('Хаосникам вход в БС запрещен!')</script>";
            } else {
                mysql_query("UPDATE `users`,`online` SET `users`.`room` = '31',`online`.`room` = '31' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                header('location: tower.php');
            }
        }
        if ($_GET['got'] && $_GET['level1']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '37',`online`.`room` = '37' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: shop.php');
        }
        if ($_GET['got'] && $_GET['level11']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '42',`online`.`room` = '42' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: auction.php');
        }
     }

        elseif($user['room']==316) {
			// Boljshaja torgovaja

			if ($_GET['got'] && $_GET['level4']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '314',`online`.`room` = '314' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: city.php?strah=1');
			}
			if ($_GET['got'] && $_GET['level1']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '1',`online`.`room` = '1' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: teleport.php');
			}
			if ($_GET['got'] && $_GET['level3']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '4545',`online`.`room` = '4545' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: bookshop.php');
			}
					if ($_GET['got'] && $_GET['level888']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '888',`online`.`room` = '888' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: zoo.php');
			}

			if ($_GET['got'] && $_GET['level204']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '888',`online`.`room` = '888' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: zoo.php');
			}


				if ($_GET['got'] && $_GET['level5']) {
				mysql_query("UPDATE `users`,`online` SET `users`.`room` = '3081',`online`.`room` = '3081' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
				header('location: auction.php');
			}


            if ($_GET['got'] && $_GET['level1']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '37',`online`.`room` = '37' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: shop.php');
            }
            if ($_GET['got'] && $_GET['level12']) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '29',`online`.`room` = '29' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: bank.php');
            }

   }elseif ($user["room"]!=314 && $user["room"]!=313 && $user["room"]!=54 && $user["room"]!=316 && $user["room"]!=456) echo "<script>document.location.replace('main.php".($warning?"?warning=$warning":"")."');</script>";
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<link href="<?=IMGBASE?>/i/move/design6.css" rel="stylesheet" type="text/css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<META HTTP-EQUIV="imagetoolbar" CONTENT="no">

<style type="text/css">
#ID_ANIMATE {position:relative;width:520px;height:246px;overflow:hidden}
#ID_ANIMATE DIV{position:absolute;width:1px;height:1px;font-size:0px;z-index:1}
img.aFilter { filter:Glow(color=<? if (WINTER) echo "f1c301"; else echo "d7d7d7";?>,Strength=4,Enabled=0); cursor:hand }
hr { height: 1px; }
</style>

<SCRIPT LANGUAGE="JavaScript">
var Hint3Name='';
function findlogin(title, script, name){
    document.getElementById("hint3").innerHTML = '<form action="'+script+'" method=POST><table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" id="'+name+'" NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" >> "></TD></TR></TABLE></td></tr></table></FORM>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 100;
    Hint3Name = name;
    document.getElementById(name).focus();
}

function closehint3(){
    document.all("hint3").style.visibility="hidden";
    Hint3Name='';
}

var solo_store;
function solo(n, name, instant) {
if (instant!="" || check_access()==true) {
window.location.href = '?got=1&level'+n+'=1&rnd='+Math.random();
} else if (name && n) {
solo_store = n;
var add_text = (document.getElementById('add_text') || document.createElement('div'));
add_text.id = 'add_text';
add_text.innerHTML = 'Вы перейдете в: <strong>' + name +'</strong> (<a href="#" onclick="return clear_solo();">отмена</a>)';
document.getElementById('ione').parentNode.parentNode.nextSibling.firstChild.appendChild(add_text);
}
return false;
}
function clear_solo () {
document.getElementById('add_text').removeNode(true);
solo_store = false;
ch_counter_color('#00CC00');
return false;
}
var from_map = false;

function imover(im) {
if( im.filters ) im.filters.Glow.Enabled=true;
else im.style.MozOpacity=0.7;
if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
from_map = true;
if( document.getElementById('b' + im.id).runtimeStyle )
document.getElementById('b' + im.id).runtimeStyle.color = '#666666';
from_map = false;
}
}
function imout(im) {
if( im.filters ) im.filters.Glow.Enabled=false;
else im.style.MozOpacity=1;
if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
from_map = true;
if( document.getElementById('b' + im.id).runtimeStyle )
document.getElementById('b' + im.id).runtimeStyle.color = document.getElementById('b' + im.id).style.color;
from_map = false;
}
}

function imover1(im) {
if( im.filters )
im.filters.Glow.Enabled=true;
if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
from_map = true;
if( document.getElementById('b' + im.id).runtimeStyle )
document.getElementById('b' + im.id).runtimeStyle.color = '#666666';
from_map = false;
}
}


function bimover (im) {
if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
from_map = true;
imover(document.getElementById(im.id.substr(1)));
from_map = false;
}
}
function bimout (im) {
if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
from_map = true;
imout(document.getElementById(im.id.substr(1)));
from_map = false;
}
}
function bsolo (im) {
if (document.getElementById(im.id.substr(1))) {
document.getElementById(im.id.substr(1)).click();
}
return false;
}


function fullfastshow(a,b,c,d,e,f){if(typeof b=="string")b=a.getElementById(b);var g=c.srcElement?c.srcElement:c,h=g;c=g.offsetLeft;for(var j=g.offsetTop;h.offsetParent&&h.offsetParent!=a.body;){h=h.offsetParent;c+=h.offsetLeft;j+=h.offsetTop;if(h.scrollTop)j-=h.scrollTop;if(h.scrollLeft)c-=h.scrollLeft}if(d!=""&&b.style.visibility!="visible"){b.innerHTML="<small>"+d+"</small>";if(e){b.style.width=e;b.whiteSpace=""}else{b.whiteSpace="nowrap";b.style.width="auto"}if(f)b.style.height=f}d=c+g.offsetWidth+10;e=j+5;if(d+b.offsetWidth+3>a.body.clientWidth+a.body.scrollLeft){d=c-b.offsetWidth-5;if(d<0)d=0}if(e+b.offsetHeight+3>a.body.clientHeight+a.body.scrollTop){e=a.body.clientHeight+ +a.body.scrollTop-b.offsetHeight-3;if(e<0)e=0}b.style.left=d+"px";b.style.top=e+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}function fullhideshow(a){if(typeof a=="string")a=document.getElementById(a);a.style.visibility="hidden";a.style.left=a.style.top="-9999px"}

function gfastshow(dsc, dx, dy) { fullfastshow(document, mmoves3, window.event, dsc, dx, dy); }
function ghideshow() { fullhideshow(mmoves3); }

function Down() {top.CtrlPress = window.event.ctrlKey}

    document.onmousedown = Down;
</SCRIPT>
</HEAD>
<body style="margin-top:0px;padding-top:0px" leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor="#d7d7d7" onLoad="<?=topsethp()?>">
<div id="mmoves3" style="background-color:#FFFFCC; visibility:hidden; z-index: 101; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;"></div>
<?
if($_GET['nap']=="attack" && $user['room']==316){include "magic/cityattack.php";}
?>

<div id=hint3 class=ahint></div>
<?
  errorreport();
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<TR>
    <TD valign=top align=left width=250>
<?
  include_once("questfuncs.php");
  if (0) {
    if (@$_GET["attackevil"]) {
      battlewithbot(1796, "Горный демон", "Защита города", "20", 1);
    }
    smallshowpersout($_SESSION['uid']);
    echo "</td><td width=\"230\" valign=\"top\"><img src=\"".IMGBASE."i/empty.gif\" width=\"230\" height=\"1\">
    Настало время нанести ответный удар по демонам! Сколько ещё будем терпеть их нападения?!
    Надо всем вместе напасть на их лагерь и убить всех до единого!<br><br>
    <a href=\"main.php?got=1&room=44\">Смело мы в бой пойдём!</a>
    </td>";
  } elseif ($user["room"]==45 && $_GET["findgrass"]) {
    smallshowpersout($_SESSION['uid']);
    echo "</td><td width=\"230\" valign=\"top\"><br />
    <img src=\"".IMGBASE."/i/empty.gif\" width=\"230\" height=\"1\">";
    echo "<div style=\"padding:10px\">".cutgrass(2)."</div>";
  } elseif ($user["room"]==45 && $_GET["findgrass2"]) {
    include "functions/cutgrass2.php";
    smallshowpersout($_SESSION['uid']);
    echo "</td><td width=\"230\" valign=\"top\"><br />
    <img src=\"".IMGBASE."/i/empty.gif\" width=\"230\" height=\"1\">";
    echo "<div style=\"padding:10px\">".cutgrass2(2)."</div>";
  } elseif ($user["room"]==45 && $_GET["hunt"] && WINTER && 0) {
    smallshowpersout($_SESSION['uid']);
    if (canmakequest(10)) {
      battlewithbot(4793, "Серый Волк", "Охота", 10, 0, 1, 0,0);
    } else {
      echo "<div style=\"padding:10px\">
      Вы ещё недостаточно отдохнули после предыдущей охоты.
      Отдохните ещё минимум ".ceil($questtime/60)." мин.
      </div>";
    }
  } elseif ($user['room'] == 316 && canmakequest(1) && $user["align"]!=2.5) {
    smallshowpersout($_SESSION['uid']);
    if (@$_GET["openchest"]) {
      if (!placeinbackpack(1)) {
        echo "<center><b><font color=red>У вас недостаточно места в рюкзаке.</font></b></center>";
      } else {
        $rnd=rand(0,1);
        if (LETTERQUEST) {
          $taken=takesmallitem(60);
        } else {
          if ($rnd==1) {
            $rnd=rand(2,6);
            $taken=takeitem($rnd);
          } else {
            $rnd=rand(1,8);
            $taken=takesmallitem($rnd);
          }
        }
        makequest(1);
        $rand=rand(1,3);
        echo "</td><td width=\"230\" valign=\"top\"><br />
        <img src=\"".IMGBASE."/i/empty.gif\" width=\"230\" height=\"1\">";
        echo "<div style=\"padding:10px\">В сундучке вы обнаружили $taken[name] и ".($rand*0.5)." кр.<br><br>
        <center><img src=\"".IMGBASE."/i/sh/$taken[img]\"></center><br>
        Приходите через 24 часа за новым подарком.
        </div>";
        mq("update users set money=money+".($rand*0.5)." where id='$_SESSION[uid]'");
      }
    } else {
      echo "<div style=\"padding:10px\">Посередине площади расположен сундук мироздателя, в котором раз в день можно получить небольшой подарочек.</div>
      <center><a href=\"$_SERVER[PHP_SELF]?openchest=1\"><img border=\"0\" src=\"".IMGBASE."/img/podzem/2.gif\"></a></center>";
    }
    echo "</td>";
  } else echo showpersout($_SESSION['uid']);
  ?>
    </TD>

    <TD valign=top align=right>





<table  border="0" cellpadding="0" cellspacing="0">
<tr align="right" valign="top">
<td>







<TABLE width=100% height=100% border=0 cellspacing="0" cellpadding="0">
    <TR><TD align=right colspan=2>
            <div align=right id=per></div>

        <?

  if ($user['room']==311) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        if (WINTER) $fon = WINTER.'emerald_bg_104';
        else  $fon = WINTER.'emerald_bg_104';

        $z_1 = WINTER.'1';
        $z_3 = WINTER.'3';

    } else {
        if (WINTER) $fon = WINTER.'emerald_bg_104';
        else  $fon = WINTER.'emerald_bg_104';

        $z_1 = WINTER.'1';
        $z_3 = WINTER.'3';

    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";
    buildset(2005,"3",27,209,"Портал");    
    buildset(314,"2",163,455,"Каньон фортуны");
    buildset(313,"1",163,16,"Храм Изумруда");
        
  $hinttop=18;
  $hintright=113;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";


} elseif ($user['room']==314) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'emerald_bg_102';
                $z_podz=WINTER.'emerald_bg_102';
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavern';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    } else {
        $fon = WINTER.'emerald_bg_102';

                $z_podz=WINTER.'emerald_bg_102';
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavernn';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";

    buildset(315,"89",7,245,"Казино");
    buildset(316,"22",163,455,"Центральный перекресток");
    buildset(311,"1",163,16,"Перевал чужестранца");

   $hinttop=18;
  $hintright=113;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";

} elseif ($user['room']==3161) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'em_bg_zags_enter';
                $z_podz=WINTER.'em_bg_zags_enter';
                
                    } else {
        $fon = WINTER.'em_bg_zags_enter';

                $z_podz=WINTER.'em_bg_zags_enter';
                                
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";

    buildset(3162,"em_zags_vx",2,204,"Зал Церемоний");
    buildset(316,"em_zags_vix",182,150,"Центральный перекресток");
    buildset(31111,"em_zags_npc",13,75,"Корнелио");
    buildset(3162,"em_zags_right",205,460,"Свадебный Магазин");
        
        } elseif ($user['room']==3162) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'em_bg_zags_hall';
                $z_podz=WINTER.'em_bg_zags_hall';
                
                    } else {
        $fon = WINTER.'em_bg_zags_hall';

                $z_podz=WINTER.'em_bg_zags_hall';
                                
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";

    buildset(3161,"em_zags_arch1",220,157,"Дворец бракосочетаний");
    buildset(3163,"em_zags_arch",39,190,"Алтарь бракосочетаний");
    buildset(31622,"em_zags_hall_left",203,16,"Стол разводов");

     }  elseif ($user['room']==315) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'emerald_bg_112_1';
                $z_podz=WINTER.'emerald_bg_112_1';
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavern';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    } else {
        $fon = WINTER.'emerald_bg_112_1';

                $z_podz=WINTER.'emerald_bg_102';
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavernn';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";


    buildset(316,"22",163,455,"Центральный перекресток");
    buildset(314,"vix",173,445,"каньон фортуны");
    buildset(3151,"45789",17,44,"рулетка");
    buildset(3152,"45789",17,44,"Угадай число");

     }  elseif ($user['room']==317) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'emerald_bg_106';
                
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavern';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    } else {
        $fon = WINTER.'emerald_bg_106';
                $z_1ureg=WINTER.'1ureg';
                $z_1ubkill=WINTER.'1ubkill';
                $z_fshop=WINTER.'flower_shop';
                $z_zamok2= WINTER.'2_Tavernn';
                $z_loto= WINTER.'flower_shop';
                $z_oshaga= WINTER.'cp_hostel';
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";


    buildset(316,"24",123,105,"Центральный перекресток");
    buildset(318,"pht",12,234,"Почта");
    buildset(3152,"45789",17,44,"Угадай число");
    buildset(319,"31",173,445,"Плато Живых");

$hinttop=18;
  $hintright=113;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";

}  elseif ($user['room']==318) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'emerald_new_post';
                
                
    } else {
        $fon = WINTER.'emerald_new_post';
                
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";


    buildset(317,"bk_maps",178,444,"Почтовый Каньон");
    buildset(318,"emerald_new_bot_post",42,114,"Аравель");

}  elseif ($user['room']==319) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        $fon = WINTER.'emerald_bg_112';
                
                
    } else {
        $fon = WINTER.'emerald_bg_112';
                
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";


    buildset(317,"8",155,34,"Почтовый Каньон");
    buildset(319,"emerald_112_cazino",42,195,"На реконструкции");

$hinttop=250;
  $hintright=53;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";

} elseif ($user["room"]==45) {
   if((int)date("H") > 5 && (int)date("H") < 22) {
       $fon = WINTER.'city_bg1';
   } else {
       $fon = WINTER.'city_bg2';
   }
  echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";

  //if ($user['id'] == 22028 || $user['id'] == 22028 || $user['id'] == 22028) {  buildset(457,"trjasina",164,72,"Вход в Трясину"); } else { buildset(2005,"trjasina",164,72,"Вход в Трясину", "", "В разработке"); }
  //if (WINTER) buildset(53,"cp_portal",98,100,"Портал");
  //else buildset(53,"cp_portal",98,105,"Портал");
  if (WINTER) buildset(51,"p1",147,155,"Пещера Тысячи Проклятий");
  else buildset(51,"p1",147,155,"Пещера Тысячи Проклятий");
  //buildset(47,"2_Left",175,24,"Ледяная пещера");
  buildset(54,"skam3",140,30,"Пещера Алхимика");
  buildset(313,"2strelka",163,455,$rooms[313]);
  buildset(59,"tel_st_01",115,302,"Стройка");
  //buildset(8575,"park",90,280,"Парк");
  buildset(8575,"tree",116,110,"Дерево");
  buildset(8575,"tree",100,250,"Дерево");
  buildset(8575,"tree",116,400,"Дерево");
  buildset(8575,"tree",100,370,"Дерево");
  buildset(8575,"tree",116,225,"Дерево");

$hinttop=250;
  $hintright=53;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";

 } if ($user['room']==313) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

     if (WINTER) $fon = WINTER.'emerald_bg_114';
        else  $fon = WINTER.'emerald_bg_114';

    } else {
        if (WINTER) $fon = WINTER.'emerald_bg_114';
        else  $fon = WINTER.'emerald_bg_114';


    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";

    buildset(700,"vhodemxram",30,150,"Вход в Храм Изумруда(на реконструкции)");
    buildset(311,"emerald_114_arrow1",163,355,"Перевал чужестранца");


  $hinttop=18;
  $hintright=113;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";

} if ($user['room']==316) {

    if((int)date("H") > 5 && (int)date("H") < 22) {

        if (WINTER) $fon = WINTER.'emerald_bg_110';
        else  $fon = WINTER.'emerald_bg_110';
           $z_dvemb=WINTER.'dvemb';
    } else {
        if (WINTER) $fon = WINTER.'emerald_bg_110n';
        else  $fon = WINTER.'emerald_bg_110n';
           $z_dvemb=WINTER.'dvembn';
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";
    buildset(3161,"dvemb",110,180,"Дворец Бракосочетания");
    buildset(317,"22",163,455,"Почтовый Каньон");
    buildset(314,"11",163,60,"Каньон Фортуны");


   $hinttop=18;
  $hintright=113;
  if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";
  
  }
        $online = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60).";");
        $onlineS   = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='suburb' AND `real_time` >= ".(time()-60).";"));
        $onlineSVC = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='virtcity' AND `real_time` >= ".(time()-60).";"));
        $onlineV   = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='dungeon' AND `real_time` >= ".(time()-60).";"));
        $onlinec = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='capitalcity';");
        $onlinea = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='angelscity';");
        $onlined = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='demonscity';");
        $onlineo = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='oldcity';");
        $onlinedev = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='devilscity';");
        $onlines = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='suncity';");
        $onlinee = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='emerald';");
        $onlinew = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='newcapitalcity';");
        $onlinem = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='mooncity';");
        $onlinesan = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='sandcity';");
?>
<div style="position:absolute; right:0px; top:0px; width:1px; height:1px; z-index:101; overflow:visible;">
<TABLE height=15 border="0" cellspacing="0" cellpadding="0">
<TR>
<TD rowspan=3 valign="bottom"><a href="?rnd=0.604083970286585"><img src="/i/move/rel_1.gif" width="15" height="16" alt="Обновить" border="0" /></a></TD>
<TD colspan="3"><img src="/i/move/navigatin_462s.gif" width="80" height="4" /></TD>
</TR>
<TR>
<TD><IMG src="/i/move/navigatin_481.gif" width="9" height="8"></TD>
<TD width=64 bgcolor=black><DIV class="MoveLine"><IMG src="/i/move/wait2.gif" id="MoveLine" class="MoveLine"></DIV></TD>
<TD><IMG src="/i/move/navigatin_50.gif" width="7" height="8"></TD>
</TR>
<TR>
<TD colspan="3"><IMG src="/i/move/navigatin_tt1_532.gif" width="80" height="5"></TD>
</TR>
</TABLE>
</div>
</div>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
<? if ($user['room'] == 311) { ?>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_313" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Храм Изумруда</a></span>
     <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_2005" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Портал</a></span>
      <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_314" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Каньон Фортуны</a></span>



<?} elseif ($user['room'] == 314) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_316" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Центральный перекресток</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_311" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Перевал чужестранца</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_89" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Казино</a></span>

<?} elseif ($user['room'] == 315) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_3151" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Рулетка</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_3152" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Угадай число</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_89" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Казино</a></span>

<?} elseif ($user['room'] == 316) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_258" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Портал</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_21" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Страшилкина улица</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_75" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Потерянный Вход</a></span>
  	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_71" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Подгорная Башня смерти</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_73" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Катакомбы</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_59" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Книжный магазин</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_42" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Аукцион</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_11" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Зоомагазин</a></span>

<?} elseif ($user['room'] == 313) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_311" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Перевал чужестранца</a></span>

    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_700" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Вход в Храм Изумруда</a></span>

<?} elseif ($user['room'] == 317) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_316" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Центральный Перекресток</a></span>

    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_319" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Плато Жывых</a></span>


<?} elseif ($user['room'] == 45) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_313" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Парк развлечений</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_51" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Пещера Тысячи Проклятий</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_54" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Пещера Алхимика</a></span>


<? } elseif ($user["room"]==45 && 0) {
  echo $loclinks;
} ?>
<?
if($_SESSION['movetime']>time()){$vrme=$_SESSION['movetime']-time();}else{$vrme=0;}
?>
</td>
</tr>
</table>
<?
  echo "<div style=\"padding-top:5px;text-align:right;padding-right:20px\">".bottombuttons()."</div>";
?>
</div></td></tr>
</table>
<div style="display:none; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>
<script language="javascript" type="text/javascript">
var progressEnd = 64;
var progressColor = '#00CC00';
var mtime = parseInt('<?=$vrme?>');
if (!mtime || mtime<=0) {mtime=0;}
var progressInterval = Math.round(mtime*1000/progressEnd);
var is_accessible = true;
var progressAt = progressEnd;
var progressTimer;
function progress_clear() {
progressAt = 1;
is_accessible = false;
set_moveto(true);
}
function progress_update() {
progressAt++;
if (progressAt > progressEnd) {
is_accessible = true;
if (window.solo_store && solo_store) { solo(solo_store, ""); } // go to stored
set_moveto(false);
} else {
if( !( progressAt % 2 ) )
document.getElementById('MoveLine').style.left = progressAt - 64;
progressTimer = setTimeout('progress_update()',progressInterval);
}
}
function set_moveto (val) {
document.getElementById('moveto').disabled = val;
if (document.getElementById('bmoveto')) {
document.getElementById('bmoveto').disabled = val;
}
}
function progress_stop() {
clearTimeout(progressTimer);
progress_clear();
}
function check(it) {
return is_accessible;
}
function check_access () {
return is_accessible;
}
function ch_counter_color (color) {
}
if (mtime>0) {
progress_clear();
progress_update();
}
</script>
<HR>
<div id="buttons_on_image" style="cursor:pointer; font-weight:bold; color:<? if (WINTER) echo "#000000"; else echo "#D8D8D8"; ?>; font-size:10px;">
<? if ($user["room"]==45) { ?>
  <? if (WINTER && 0) echo "<span onMouseMove=\"this.runtimeStyle.color = 'white';\" onMouseOut=\"this.runtimeStyle.color = this.parentElement.style.color;\" onclick=\"document.location.href='city.php?hunt=1';\">Охотиться</span> &nbsp;"; ?>
<!--<span onMouseMove="this.runtimeStyle.color = 'white';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="document.location.href='city.php?findgrass2=1';">Пойти за разрыв-травой</span> &nbsp;-->
<!--span onMouseMove="this.runtimeStyle.color = '<? if (WINTER) echo "#aaaaaa"; else echo "white"; ?>';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="document.location.href='city.php?findgrass=1';">Искать алхимические травы</span-->
<span style="color: white;" onclick="document.location.href='city.php?findgrass=1';">&nbsp;&nbsp;&nbsp;Искать алхимические травы</span> &nbsp;
<? } else { ?>
  <span onMouseMove="this.runtimeStyle.color = '<? if (WINTER) echo "#aaaaaa"; else echo "white"; ?>';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="window.open('/forum.php', 'forum', 'location=yes,menubar=yes,status=yes,resizable=yes,toolbar=yes,scrollbars=yes,scrollbars=yes')">Форум</span> &nbsp;
  <? if($user['room'] == 316){?>
  <span onMouseMove="this.runtimeStyle.color = '<? if (WINTER) echo "#aaaaaa"; else echo "white"; ?>';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="findlogin('Введите имя персонажа', 'city.php?nap=attack', 'target'); ">Напасть</span> &nbsp;
  <?}?>
  <span onMouseMove="this.runtimeStyle.color = '<? if (WINTER) echo "#aaaaaa"; else echo "white"; ?>';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="window.open('help/city1.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">Подсказка</span> &nbsp;
<? } ?>
</div>
<script language="javascript" type="text/javascript">
<!--
if (document.getElementById('ione')) {
document.getElementById('ione').appendChild(document.getElementById('buttons_on_image'));
document.getElementById('buttons_on_image').style.position = 'absolute';
document.getElementById('buttons_on_image').style.bottom = '8px';
document.getElementById('buttons_on_image').style.right = '23px';
} else {
document.getElementById('buttons_on_image').style.display = 'none';
}
-->
</script>
    <small>

    <B>Внимание!</B> Никогда и никому не говорите пароль от своего персонажа. Не вводите пароль на других сайтах, типа "новый город", "лотерея", "там, где все дают на халяву". Пароль не нужен ни паладинам, ни кланам, ни администрации, <U>только взломщикам</U> для кражи вашего героя.<BR>
    <I>Администрация.</I></small>
    <BR><br>
       <?php
        $onlineS   = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='suburb' AND `real_time` >= ".(time()-60).";"));
        $onlineSVC = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='virtcity' AND `real_time` >= ".(time()-60).";"));
        $onlineV   = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='dungeon' AND `real_time` >= ".(time()-60).";"));
        $onlineE   = mysql_num_rows(mysql_query("select real_time from `online`  WHERE `city`='emerald' AND `real_time` >= ".(time()-60).";"));
        $onlinec = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='capitalcity';");
        $onlinea = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='angelscity';");
        $onlined = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='demonscity';");
        $onlineo = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='oldcity';");
        $onlinedev = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='devilscity';");
        $onlines = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='suncity';");
        $onlinee = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='emerald';");
        $onlineab = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='abandonedplain';");
        $onlinew = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='newcapitalcity';");
        $onlinem = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='mooncity';");
        $onlinesan = mysql_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='sandcity';");
        ?>
        <!--<u>Сейчас в клубе</u>: <?=$onlineS+$onlineV+$onlineE+$onlineSVC+20?>.</b><BR>-->
        <u>Сейчас в клубе</u>: <?=mysql_num_rows($online)?> чел.<BR>
        <img src=i/sh/fo1.gif title=capitalcity><b>Capital city</b>: <?=$onlineSVC?> чел.</span><br>
        <img src=i/sh/fo11.gif title=capitalcity><b>Abandoned Plain</b>: <?=$onlineV?> чел.</span><br>
        <img src=i/sh/fo6.gif title=emerald> <b>Emeralds city</b>: <?=mysql_num_rows($onlinee)?> чел.</span><b><A  href="img/em.jpg"  target="_blank">Карта города</A></b><br>
        <img src=i/sh/fo3.gif title=demonscity> <b>Demons city</b>: <?=mysql_num_rows($onlined)?> чел.<br>
        <img src=i/sh/fo4.gif title=devilscity> <b>Devils city</b>: <?=mysql_num_rows($onlinedev)?> чел.<br>
        <img src=i/sh/fo2.gif title=angelscity><b>Angels city</b>: <?=$onlineS?> чел.</span><br>
        <img src=i/sh/fo8.gif title=mooncity> <b>Moon city</b>: <?=mysql_num_rows($onlinem)?> чел.<br>
	<img src=i/sh/fo7.gif title=sandcity> <b>Sand city</b>: <?=mysql_num_rows($onlinesan)?> чел.<br>
        <img src=i/sh/fo5.gif title=Suncity> <b>Sun city</b>: <?=mysql_num_rows($onlines)?> чел.<br>
        <img src=i/sh/fo15.gif title=Newcapitalcity> <b>New Capital city</b>: <?=mysql_num_rows($onlinew)?> чел.<br>
         <br>
  
<script LANGUAGE='JavaScript'>
document.ondragstart = test;
//запрет на перетаскивание
document.onselectstart = test;
//запрет на выделение элементов страницы
document.oncontextmenu = test;
//запрет на выведение контекстного меню
function test() {
return false
}
</SCRIPT>
   
    <?php
    if ($_SESSION["uid"]==22004) {
function takeshopitem1($item) {
  $r=mq("show fields from items");
  $rec1=mqfa("select * from shop where id='$item'");
  $sql="";
  while ($rec=mysql_fetch_assoc($r)) {
    if ($present) {
      if ($rec["Field"]=="maxdur") $rec1[$rec["Field"]]=1;
      if ($rec["Field"]=="cost") $rec1[$rec["Field"]]=2;
    }
    if ($rec["Field"]=="id" || $rec["Field"]=="prototype") continue;
    if ($rec["Field"]=="goden") $goden=$rec1[$rec["Field"]];
    $sql.=", `$rec[Field]`='".$rec1[$rec["Field"]]."' ";
  }
  mq("insert into inventory set owner='$_SESSION[uid]', prototype='$item' ".($goden?", dategoden='".($goden*60*60*24+time())."'":"")." $sql");
  echo mysql_error();
  return array("img"=>$rec1["img"], "name"=>$rec1["name"]);
}
    }
?>
    </TD>
</TR>
</TABLE></td></tr></table>
<?
  $f=mqfa1("select value from variables where var='fireworks'");
  if ($f>time()) echo implode("",file("clipart/fworks.html"));
?>
</BODY>
</HTML>