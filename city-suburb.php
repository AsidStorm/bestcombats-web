<?php

define("WINTER","/");
//define("WINTER", "");
function smallshowpersout($id,$pas = 0,$battle = 0,$me = 0,$show_pr = 0) {
    global $mysql, $rooms;

    if($id > _BOTSEPARATOR_) {
      $bots = mysqli_fetch_array(db_query ('SELECT * FROM `bots` WHERE `id` = '.$id.' LIMIT 1;'));
      $id=$bots['prototype'];
      $user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
      $user['login'] = $bots['name'];
      $user['hp'] = $bots['hp'];
      $user['id'] = $bots['id'];
    } else {
      $user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
    }
    echo "<CENTER>";
   ?>
    <A HREF="javascript:top.AddToPrivate('<?=$user['login']?>', top.CtrlPress)" target=refreshed><img src="<?=IMGBASE?>/i/lock.gif" width=20 height=15></A><?if($user['align']>0){echo"<img src=\"".IMGBASE."/i/align_".$user['align'].".gif\">";} if ($user['klan'] <> '') { echo '<img title="'.$user['klan'].'" src="<?=IMG_PATH?>/klan/'.$user['klan'].'.gif">'; } ?><B><?=$user['login']?></B> [<?=$user['level']?>]<a href=inf.php?<?=$user['id']?> target=_blank><IMG SRC=<?=IMGBASE?>/i/inf.gif WIDTH=12 HEIGHT=11 ALT="Инф. о <?=$user['login']?>"></a>
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
$dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['helm']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['naruchi']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['weap']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$d}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['belt']}' LIMIT 1;"));
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

$zver=mysqli_fetch_array(db_query("SELECT shadow,login,level, vid FROM `users` WHERE `id` = '".$user['zver_id']."' LIMIT 1;"));
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
$ch_eff1 = db_query ('SELECT * FROM `effects` WHERE `owner` = '.$_SESSION['uid'].' and (`type`=188 or `type`=201 or `type`=202 or `type`=1022)');
$i=0;
while($ch_eff = mysqli_fetch_array($ch_eff1)){
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
$inf_el = mysqli_fetch_array(db_query ('SELECT img FROM `shop` WHERE `name` = \''.$ch_eff['name'].'\';'));
if($ch_eff['type']==395){$inf_el['img']='defender.gif'; $opp='награда'; $chas=60; $chastxt="час.";}elseif($ch_eff['type']==201){$inf_el['img']='spell_protect10.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}elseif($ch_eff['type']==202){$inf_el['img']='spell_powerup10.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}elseif($ch_eff['type']==1022){$inf_el['img']='hidden.gif'; $opp='заклятие'; $chas=1; $chastxt="мин.";}else{$opp='эликсир'; $chas=1; $chastxt="мин.";}
 ?> <div style="position:absolute; left:<?=$left?>px; top:<?=$top?>px; width:120px; height:220px; z-index:2"><IMG width=40 height=25 src='<?=IMGBASE?>/i/misc/icon_<?=$inf_el['img']?>' onmouseout='ghideshow();' onmouseover='gfastshow("<B><? echo $ch_eff['name'];?></B> (<?=$opp?>)<BR> еще <? echo ceil(($ch_eff['time']-time())/60/$chas);?> <?=$chastxt?>")';> </div>
<?}
$ch_priem1 = db_query ('SELECT pr_name FROM `person_on` WHERE `id_person` = '.$_SESSION['uid'].' and `pr_active`=2');

while($ch_priem = mysqli_fetch_array($ch_priem1)){
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
$inf_priem = mysqli_fetch_array(db_query ('SELECT name,opisan FROM `priem` WHERE `priem` = \''.$ch_priem['pr_name'].'\';'));

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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['sergi']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['kulon']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r1']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r2']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['r3']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['perchi']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['shit']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['leg']}' LIMIT 1;"));
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
            $dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '{$user['boots']}' LIMIT 1;"));
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


        $data = mysqli_fetch_array(db_query("select * from `online` WHERE `date` >= ".(time()-60)." AND `id` = ".$user['id'].";"));
/*      $dd = db_query("SELECT * FROM `effects` WHERE `owner` = ".$user['id'].";");
        $ddtravma = mysqli_fetch_array(db_query("SELECT * FROM `effects` WHERE `owner` = ".$user['id']." and (`type`=11 or `type`=12 or `type`=13 or `type`=14) order by `type` desc limit 1;"));
        if ($ddtravma['type'] == 14) {$trt="неизлечимая";}
        elseif ($ddtravma['type'] == 13) {$trt="тяжелая";}
        elseif ($ddtravma['type'] == 12) {$trt="средняя";}
        elseif ($ddtravma['type'] == 11) {$trt="легкая";}
        else {$trt=0;} */

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
$online = mysqli_fetch_array(db_query('SELECT u.* ,o.date,u.* ,o.real_time FROM `users` as u, `online` as o WHERE u.`id` = o.`id` AND u.`id` = \''.$user['id'].'\' LIMIT 1;'));
            if ($data['id'] != null or ($user['id'] == 99 && vrag=="on")) {
                if($data['room'] > 500 && $data['room'] < 561) {
                    $rrm = 'Башня смерти, участвует в турнире';
                }
                elseif($user['id'] == 99) {
                    $rrm = "Центральная площадь";
                $vrag_b = mysqli_fetch_array(db_query("SELECT `battle` FROM `bots` WHERE  `prototype` = 99 LIMIT 1 ;"));
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

$date = getDateInterval($online['date']);

function year_text($days) { # склонение слова "год"
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
function month_text($days) { # склонение слова "месяц"
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
function week_text($days) { # склонение слова "неделя"
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
function days_text($days) { # склонение слова "дней"
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
function hour_text($days) { # склонение слова "час"
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
function minute_text($days) { # склонение слова "минута"
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
/*          if ($trt) {
                echo "<TR><TD><IMG height=25 src=\"i/travma.gif\" width=40></TD><TD><SMALL>У персонажа $trt травма.</SMALL></TD></TR>";
            }
            while($row = mysqli_fetch_array($dd)) {
                if ($row['time'] < time()) {
                    $row['time'] = time();
                }
                if ($row['type'] == 11 OR $row['type'] == 12 OR $row['type'] == 13 OR $row['type'] == 14) {
                    if ($row['sila']) echo "<TR><TD><IMG height=25 src=\"i/travma.gif\" width=40></TD><TD><SMALL>\"{$row['name']}\" - Ослаблен параметр \"сила\", еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                    if ($row['lovk']) echo "<TR><TD><IMG height=25 src=\"i/travma.gif\" width=40></TD><TD><SMALL>\"{$row['name']}\" - Ослаблен параметр \"ловкость\", еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                    if ($row['inta']) echo "<TR><TD><IMG height=25 src=\"i/travma.gif\" width=40></TD><TD><SMALL>\"{$row['name']}\" - Ослаблен параметр \"интуиция\", еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                }
                if ($row['type'] == 2) {
                    echo "<TR><TD><IMG height=25 src=\"i/magic/sleep.gif\" width=40></TD><TD><SMALL>На персонажа наложено заклятие молчания. Будет молчать еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                }
                if ($row['type'] == 10) {
                    echo "<TR><TD><IMG height=25 src=\"i/magic/chains.gif\" width=40></TD><TD><SMALL>На персонажа наложены путы. Не может двигатся еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                }
                if ($row['type'] == 3) {
                    echo "<TR><TD><IMG height=25 src=\"i/magic/sleepf.gif\" width=40></TD><TD><SMALL>На персонажа наложено заклятие форумного молчания. Будет молчать еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL></TD></TR>";
                }
            }*/

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

  //session_start();
  //if (@$_SESSION['uid'] == null) header("Location: index.php");
  //include "connect.php";
  //include "functions.php";
  nick99 ($_SESSION['uid']);


  $der=db_query("SELECT glav_id FROM vxodd WHERE login='".$user['login']."'");
  if($deras=mysqli_fetch_array($der) && ($_GET['cp'] || $_GET['strah'] || $_GET["got"])){
    header('location: vxod.php?warning=3');
    die();
  }

  if ($_GET['strah'] && ($user['room']==42 or $user['room']==34 or $user['room']==31 or $user['room']==28 or $user['room']==37 or $user['room']==402 or $user['room']==20)) {
    db_query("UPDATE `users`,`online` SET `users`.`room` = '21',`online`.`room` = '21' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=21;
  }
  if ($_GET['cp'] && ($user['room']==227 or $user['room']==95 or $user['room']==24 or $user['room']==25 or $user['room']==27 or $user['room']==35 or $user['room']==29 or $user['room']==2002 or $user['room']==21 or $user['room']==668)) {
    db_query("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}';");
    $user['room']=20;
  }

// при выходе из Алтаря предметов запоминаем время выхода, в след. раз только через час
if (isset($_GET['level9000']) && $user['room'] == '9001') {
    $znlv = db_result(db_query("SELECT last_visit FROM zn_tower WHERE user_id = " . $_SESSION['uid']), 0, 0);
    if ((time()-$znlv) > 3600*6) {
        db_query("UPDATE zn_tower SET last_visit = " . time() . " WHERE user_id = " . $user['id']);
    }
}

/*  if ($_GET['bps']!=1 && $_GET['bps']) {

            db_query("UPDATE `users`,`online` SET `users`.`room` = '26',`online`.`room` = '26' WHERE `online`.`id` = `users`.`id`;");
$user['room']=26;
    }
*/

  if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
  if ($user['in_tower'] == 1 || $user['in_tower'] == 2) { header('Location: towerin.php'); die(); }

  header("Cache-Control: no-cache");
  if ($_GET['got']) {
    $mt=canmove();
    if (!$mt) {
      $_GET['got'] =0;
    } else {
      $_SESSION['movetime']=time()+$mt;
      include_once("config/routes.php");
      if (WINTER) {
      } else {
        unset($routes["45"][0]);
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
          if ($user["room"]==20) {
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



    if ($user['room']==20) {
        // CP
        // BK
        if ($_GET['got'] && $_GET['level1']) {
            //if ($user['level'] > 0) { $room = 8; } else { $room = 1; }
            db_query("UPDATE `users`,`online` SET `users`.`room` = '3',`online`.`room` = '3' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                        $_SESSION['movetime']=0;
            header('location: main.php?got=1&room3=1');
            die();
        }
        // Stralka strah
        if ($_GET['got'] && $_GET['level7']) {
            header('location: city.php?strah=1');
        }
        if ($_GET['got'] && $_GET['level8']) {
            header('location: city.php?bps=1');
        }
        // shopvip
        if ($_GET['got'] && $_GET['level2']) {
		if ($user['vip'] == 0) {
		echo"<script>alert('Вход в vip магазин только с VIP значком!')</script>";
	}elseif ($user['vip'] < 1) {
		echo"<script>alert('Вход в vip магазин только с VIP значком!')</script>";
}else
            db_query("UPDATE `users`,`online` SET `users`.`room` = '227',`online`.`room` = '227' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: shopvip.php');
        }
        // repait
        if ($_GET['got'] && $_GET['level4']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '23',`online`.`room` = '23' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: repair.php');
        }
        if ($_GET['got'] && $_GET['level247']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '2002',`online`.`room` = '2002' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: hellround.php');
        }
        if ($_GET['got'] && $_GET['level11']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '668',`online`.`room` = '668' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: zoo.php');
        }
        if ($_GET['level9']) {
          db_query("UPDATE `users`,`online` SET `users`.`room` = '24',`online`.`room` = '24' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
          header('location: elka.php');
        }
        if ($_GET['got'] && $_GET['level3']) {
            if ($user['align'] == 4) {
                print "<script>alert('Хаосникам вход в комиссионный магазин запрещен!')</script>";
            }
            elseif ($user['level'] < 1) {
                print "<script>alert('Вход в комиссионный магазин только с первого уровня!')</script>";
            }
            else {
                db_query("UPDATE `users`,`online` SET `users`.`room` = '25',`online`.`room` = '25' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                header('location: comission.php');
            }
        }
        if ($_GET['got'] && $_GET['level6']) {
            if ($user['level'] < 1) {
                print "<script>alert('Вход на почту только с первого уровня!')</script>";
            }
            else {
                db_query("UPDATE `users`,`online` SET `users`.`room` = '27',`online`.`room` = '27' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                header('location: post.php');
            }
        }
        if ($_GET['got'] && $_GET['room666']) {
            header('location: jail.php');
        }
        if ($_GET['got'] && $_GET['room667']) {
            header('location: bar.php');
        }
        if ($_GET['got'] && $_GET['level10']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '35',`online`.`room` = '35' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: berezka.php');
        }
        if ($_GET['got'] && $_GET['level12']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '29',`online`.`room` = '29' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: bank.php');
        }

    }
    elseif($user['room']==21) {
        // Strashilka
        // strelka cp
        if ($_GET['got'] && $_GET['level4']) {
            header('location: city.php?cp=1');
        }
        if ($_GET['got'] && $_GET['level5']) {
            if (($user['login'] != 'Модератор' && $user['level'] < '4') OR ($user['level']>15 && $user["align"]!="2.5" && $user["align"]!="2.9")) {
                print "<script>alert('Вход в водосток только с 4 лвл! Либо вы выросли для посещения данного места.')</script>";
            }
            else {
                db_query("UPDATE `users`,`online` SET `users`.`room` = '402',`online`.`room` = '402' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
                header('location: post.php');
            }
        }
        if ($_GET['got'] && $_GET['level6']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '34',`online`.`room` = '34' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: fshop.php');
        }
        if ($_GET['got'] && $_GET['level2']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '28',`online`.`room` = '28' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: klanedit.php');
        }
if ($_GET['got'] && $_GET['level7']) {if ($user['align'] == 4) { print "<script>alert('Хаосникам вход в БС запрещен!')</script>";} else {
db_query("UPDATE `users`,`online` SET `users`.`room` = '31',`online`.`room` = '31' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
header('location: tower.php'); } }
        if ($_GET['got'] && $_GET['level1']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '37',`online`.`room` = '37' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: shop.php');
        }
        if ($_GET['got'] && $_GET['level11']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '42',`online`.`room` = '42' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: auction.php');
        }
} elseif ($user["room"]!=45 && $user["room"]!=49 && $user["room"]!=54 && $user["room"]!=70 && $user["room"]!=456 && $user["room"]!=9000) echo "<script>document.location.replace('main.php".($warning?"?warning=$warning":"")."');</script>";

/*  elseif($user['room']==26) {
        // Strashilka
        // strelka cp
        if ($_GET['level4']) {
            header('location: city.php?cp=1');
        }
        if ($_GET['got'] && $_GET['level1']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '37',`online`.`room` = '37' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: gotzamok.php');
        }
        if ($_GET['got'] && $_GET['level5']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '401',`online`.`room` = '401' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: hell.php');
        }
        if ($_GET['got'] && $_GET['level11']) {
            db_query("UPDATE `users`,`online` SET `users`.`room` = '42',`online`.`room` = '42' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: auction.php');
        }

    }
*/





    /*if ($_GET['level7'] OR $_GET['strah']) {
        db_query("UPDATE `users`,`online` SET `users`.`room` = '21',`online`.`room` = '21' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
        $user['room'] = 21;
    }
    if ($_GET['level8'] && $_GET['strah']) {
        db_query("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
        $user['room'] = 20;
    }*/
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
//ch_counter_color('red');
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
if($_GET['nap']=="attack" && $user['room']==20){include "magic/cityattack.php";}
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
  } elseif ($user['room'] == 20 && canmakequest(1) && $user["id"]!=4849) {
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
if (WINTER) {
    define("SEASON", "-winter");
} else {
    define("SEASON", "");
}

if ((int)date("H") > 5 && (int)date("H") < 22) {
    define("TIME_OF_DAY", '-day');
    $z_comm = 'cap_180_spraved' . SEASON;
} else {
    define("TIME_OF_DAY", '-night');
}

if ($user['room']==20) {

    if((int)date("H") > 5 && (int)date("H") < 22) {
        if (WINTER) $fon = WINTER.'angel_bg3';
        else  $fon = WINTER.'angel_bg3';
        $z_bk = WINTER.'ang_bk';
		$z_cv=WINTER.'2_Magen';
        $z_bs = WINTER.'ang_nav_2_3';
        $z_shop = WINTER.'ang_comm';
        $z_mas = WINTER.'ang_remont';
        $z_comm = WINTER.'ang_quest_house1';
        $z_bank = WINTER.'ang_pochta';
        $z_cap_180_arrow41=WINTER."cap_180_arrow41";
        $z_stella=WINTER.'ang_stella';
        $z_3strelka=WINTER.'ang_nav_2_1';
        $z_t1=WINTER.'ang_nav_1_1';
        $z_t4=WINTER.'ang_nav_1_4';
        $z_t5=WINTER.'ang_nav_1_2';
        $z_t6=WINTER.'ang_nav_1_5';
        $z_t7=WINTER.'ang_nav_1_3';
        $z_angeln=WINTER.'ang_nav_2_4';
    } else {
        if (WINTER) $fon = WINTER.'angel_bg33';
        else  $fon = WINTER.'angel_bg33';
        $z_bk = WINTER.'ang_bk1';
		$z_cv=WINTER.'2_Magen';
        $z_bs = WINTER.'ang_nav_2_31';
        $z_shop = WINTER.'ang_comm1';
        $z_mas = WINTER.'ang_remont1';
        $z_comm = WINTER.'ang_quest_house11';
        $z_bank = WINTER.'ang_pochta1';
        $z_cap_180_arrow41=WINTER."cap_180_arrow411";
        $z_stella=WINTER.'ang_stella1';
        $z_3strelka=WINTER.'ang_nav_2_11';
        $z_t1=WINTER.'ang_nav_1_11';
        $z_t4=WINTER.'ang_nav_1_41';
        $z_t5=WINTER.'ang_nav_1_21';
        $z_t6=WINTER.'ang_nav_1_51';
        $z_t7=WINTER.'ang_nav_1_31';
        $z_angeln=WINTER.'ang_nav_2_41';
    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";
    //buildset(20,"$z_bk",20,163,"Бойцовский клуб");
    //buildset(20,"$z_bs",51,252,"Торговые Скалы");
    //buildset(2,"$z_shop",120,380,"Магазин");
    //buildset(20,"$z_mas",96,275,"Ремонтный цех");
	//buildset(341,"$z_bk",12,550,"Бойцовский клуб");
    buildset(247,"$z_bs",217,170,"Излом Хаоса");
    buildset(2005,"$z_comm",108,38,"Вокзал");
	buildset(2,"$z_bk",12,150,"VIP Магазин");
	
	
    //buildset(20,"$z_bank",54,368,"Почта");
    //buildset(21,"$z_cap_180_arrow41",133,460,"Утес Безысходности");
    //buildset(49,"$z_3strelka",150,6,"Водопад Возрождения(Закрыто)");
    //buildset(112,"$z_stella",73,142,"Стела Выбора");
    //buildset(5555,"$z_angeln",45,74,"Утес перемещения");
    //if (WINTER) buildset(9,"$z_ctree",195,85,"Новогодняя елка");
    buildset(554,"$z_t1",165,296,"Переход");
	buildset(554,"$z_t4",197,282,"Переход");
	buildset(554,"$z_t5",213,278,"Переход");
	buildset(554,"$z_t6",179,272,"Переход");
	buildset(554,"$z_t7",169,291,"Переход");

    $hinttop=18;
    $hintright=113;

    buildset(21,"$z_cap_180_arrow41",195,436, "Улица Металическая");

    if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";


} elseif ($user['room']==21) {

    if((int)date("H") > 5 && (int)date("H") < 22) {
        $fon = WINTER.'angel_bg3_61';
                $z_podz=WINTER.'ang_podz1';
                $z_hram=WINTER.'cap_181_hram';
                $z_cv=WINTER.'2_Mage';
                $z_loto=WINTER.'2_Gift';
                $z_fontan= WINTER.'2_Tavern';
                $z_2Left= WINTER.'ang_nav_107_11';
                $z_t1= WINTER.'ang_nav_1_1';
                $z_t4= WINTER.'ang_nav_1_4';
                $z_t5= WINTER.'ang_nav_1_2';
                $z_t6= WINTER.'ang_nav_1_5';
                $z_t7= WINTER.'ang_nav_1_3';
                $z_3strelka= WINTER.'ang_nav_107_21';
                $z_tower= WINTER.'ang_nav_107_3';
                $z_fshop= WINTER.'ang_nav_107_4';

    } else {
        $fon = WINTER.'angel_bg3_6';
                $z_podz=WINTER.'ang_podz';
                $z_hram=WINTER.'cap_181_hram1';
                $z_cv=WINTER.'2_Magen';
                $z_loto=WINTER.'2_Giftn';
                $z_fontan= WINTER.'2_Tavernn';
                $z_2Left= WINTER.'ang_nav_107_1';
                $z_t1= WINTER.'ang_nav_1_11';
                $z_t4= WINTER.'ang_nav_1_41';
                $z_t5= WINTER.'ang_nav_1_21';
                $z_t6= WINTER.'ang_nav_1_51';
                $z_t7= WINTER.'ang_nav_1_31';
                $z_tower= WINTER.'ang_nav_107_31';
                $z_fshop= WINTER.'ang_nav_107_41';
				$z_3strelka= WINTER.'ang_nav_107_2';

    }
    echo "<table width=1><tr><td><div style=\"position:relative\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".jpg\" alt=\"\" border=\"0\"/>";
    buildset(82,"$z_podz",30,190,"Вход в Заповедник");
    //buildset(9000,"$z_hram",26,165,"Храм Металла");
    buildset(20,"$z_2Left",115,6,"Центральный Утес");
    buildset(1,"$z_zamok2",197,30,"Магазин Благородства");
    //buildset(2222,"$z_cv",49,429,"Церковь");
    //buildset(11,"$z_loto",199,349,"Аукционный дом");
    buildset(9000,"$z_3strelka",110,390,"Храм Знаний");
    buildset(1666,"$z_tower",75,320,"Скалы Жадности");
	buildset(1666,"$z_fshop",75,104,"Скалы Жадности");
    buildset(554,"$z_t1",165,326,"Переход");
	buildset(554,"$z_t4",197,312,"Переход");
	buildset(554,"$z_t5",213,308,"Переход");
	buildset(554,"$z_t6",179,302,"Переход");
	buildset(554,"$z_t7",169,321,"Переход");

    $hinttop=18;
    $hintright=113;

    if (WINTER) echo "<div id=\"snow\"></div><script src=\"i/js/snow.js\"></script>";



} elseif ($user['room'] == 9000) {
    $hinttop=18;
    $hintright=10;
    $fon = 'hram-bg';
	echo "<table width=1><tr><td><div style=\"position:relative; cursor: pointer; width: 550px; text-align: right;\" id=\"ione\"><img src=\"".IMGBASE."/i/city/",$fon,".gif\" alt=\"\" border=\"0\"/>";

    buildset(9000,"cap_new_159_1",30,150,"Хранитель Знаний", "dialog.php?char=20136");
    $isEnter = db_result(db_query("SELECT COUNT(*) FROM zn_tower WHERE user_id = $user[id] && reputation > 0"), 0, 0);
    buildset(9001,"54_book2",190,250,"Алтарь Предметов", "", ($isEnter?"":"Сперва Вам следует обратиться к Хранителю Знаний"));
    buildset(9002,"54_book2",190,350,"Алтарь Рун");
    buildset(21,"cap_new_159_1_gate",173,500,"Площадь Нейтралитета");
}

        $online = db_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60).";");
        $onlineS   = mysqli_num_rows(db_query("select real_time from `online`  WHERE `city`='suburb' AND `real_time` >= ".(time()-60).";"));
        $onlineSVC = mysqli_num_rows(db_query("select real_time from `online`  WHERE `city`='virtcity' AND `real_time` >= ".(time()-60).";"));
        $onlinea = db_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='angelscity';");
?>
<div style="position:absolute; right:0px; top:0px; width:1px; height:1px; z-index:101; overflow:visible;">
<TABLE height=15 border="0" cellspacing="0" cellpadding="0">
<TR>
<TD rowspan=3 valign="bottom"><a href="?rnd=0.604083970286585"><img src="/i/move/rel_1.gif" width="15" height="16" alt="Обновить" border="0" /></a></TD>
<TD colspan="3"><img src="/i/move/navigatin_462s.gif" width="80" height="4" /></TD>
</TR>
<TR>
<TD><IMG src="<?=IMGBASE?>/i/move/navigatin_481.gif" width="9" height="8"></TD>
<TD width=64 bgcolor=black><DIV class="MoveLine"><IMG src="<?=IMGBASE?>/i/move/wait2.gif" id="MoveLine" class="MoveLine"></DIV></TD>
<TD><IMG src="<?=IMGBASE?>/i/move/navigatin_50.gif" width="7" height="8"></TD>
</TR>
<TR>
<TD colspan="3"><IMG src="<?=IMGBASE?>/i/move/navigatin_tt1_532.gif" width="80" height="5"></TD>
</TR>
</TABLE>
</div>
</div>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">

<? if ($user['room'] == 20) { ?>

	<!--<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_20" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Бойцовский клуб</a></span> -->
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_21" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Торговые Скалы</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_2" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">VIP Магазин</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px">-->
	<!--<img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_23" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Ремонтный цех</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_24" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Почта</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_21" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Утес Безысходности</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_49" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Водопад Возрождения</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_112" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Стела Выбора</a></span> -->
    <!--<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_5555" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Утес перемещения</a></span>-->
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_247" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Излом Хаоса</a></span>
	
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_2005" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Вокзал</a></span>

<!--<? if (WINTER) { ?><span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="<?=IMGBASE?>/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_9" onmouseover="bimover(this);" onmouseout="bimout(this);" onclick="return bsolo(this);">Новогодняя елка</a></span><? } ?> -->

<?} elseif ($user['room'] == 21) { ?>

	 <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_20" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Центральный Утес</a></span>
	 <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://img.combats.com/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_2222" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Церковь</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_82" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Вход в Заповедник</a></span>
	<!--<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_3" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Утес Возвышения</a></span>-->
    <!--<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_1666" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Скалы Жадности</a></span>-->
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_9000" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Храм Знаний</a></span>

<?} elseif ($user['room'] == 9000) { ?>

	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_21" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Площадь Нейтралитета</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_9000" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Хранитель Знаний</a></span>
	<span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_9001" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Плавка предметов</a></span>
    <span style="white-space:nowrap; padding-left:3px; padding-right:3px; height:10px"><img src="http://bestcombats.net/i/move/links.gif" width="9" height="7" />&nbsp;<a href="#" class="menutop" title="Время перехода: 10 сек." id="bmo_9002" onMouseOver="bimover(this);" onMouseOut="bimout(this);" onClick="return bsolo(this);">Плавка рун</a></span>

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
<!-- <br /><span class="menutop"><nobr>Центральная Площадь</nobr></span>-->
</td>
</tr>
</table>
<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>
<script language="javascript" type="text/javascript">
var progressEnd = 64;       // set to number of progress <span>'s.
var progressColor = '#00CC00';  // set to progress bar color
var mtime = parseInt('<?=$vrme?>');
if (!mtime || mtime<=0) {mtime=0;}
var progressInterval = Math.round(mtime*1000/progressEnd);  // set to time between updates (milli-seconds)
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
//if (progressAt > progressEnd) progress_clear();
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
/*  progressColor = color;
for (var i = 1; i <= progressAt; i++) {
document.getElementById('progress'+i).style.backgroundColor = progressColor;
}*/
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
  <span style="color: white;" onclick="document.location.href='city.php?findgrass=1';">Искать алхимические травы</span> &nbsp;
  <!--<span onMouseMove="this.runtimeStyle.color = 'white';" onMouseOut="this.runtimeStyle.color = this.parentElement.style.color;" onclick="findlogin('Введите имя персонажа', 'city.php?nap=attack', 'target'); ">Напасть</span> &nbsp;-->
<? } else { ?>
  <span style="color:#A020F0"  onclick="window.open('/forum.php', 'forum', 'location=yes,menubar=yes,status=yes,resizable=yes,toolbar=yes,scrollbars=yes,scrollbars=yes')"></span> &nbsp;
  <? if($user['room'] == 20){?>
  <span style="color:#A020F0" onclick="findlogin('Введите имя персонажа', 'city.php?nap=attack', 'target'); "></span> &nbsp;
  <?}?>
  <!--span style="color:#A020F0"  onclick="window.open('help/city1.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">Подсказка</span--> &nbsp;
<? } ?>
</div>
<script language="javascript" type="text/javascript">
<!--
if (document.getElementById('ione')) {
document.getElementById('ione').appendChild(document.getElementById('buttons_on_image'));
document.getElementById('buttons_on_image').style.position = 'absolute';
document.getElementById('buttons_on_image').style.top = '<?=$hinttop?>px';
document.getElementById('buttons_on_image').style.right = '<?=$hintright?>px';
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
        $onlineS   = mysqli_num_rows(db_query("select real_time from `online`  WHERE `city`='suburb' AND `real_time` >= ".(time()-60).";"));
        $onlineSVC = mysqli_num_rows(db_query("select real_time from `online`  WHERE `city`='virtcity' AND `real_time` >= ".(time()-60).";"));
        $onlinea = db_query("select real_time from `online`  WHERE `real_time` >= ".(time()-60)." and `city`='angelscity';");
        ?>
        <u>Сейчас в клубе</u>: <?=mysqli_num_rows($online)?> чел.<BR>
        <img src=http://bestcombats.net/i/misc/forum/fo1.gif title=capitalcity><b>Devils city</b>: <?=$onlineSVC?> чел.</span><br>
        <img src=http://darkcombats.com/i/sh/fo2.gif title=angelscity><b>Angels city</b>: <?=$onlineS?> чел.</span><br>
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
    if ($_SESSION["uid"]==7) {
function takeshopitem1($item) {
  $r=mq("show fields from items");
  $rec1=mqfa("select * from shop where id='$item'");
  $sql="";
  while ($rec=mysqli_fetch_assoc($r)) {
    if ($present) {
      if ($rec["Field"]=="maxdur") $rec1[$rec["Field"]]=1;
      if ($rec["Field"]=="cost") $rec1[$rec["Field"]]=2;
    }
    if ($rec["Field"]=="id" || $rec["Field"]=="prototype") continue;
    if ($rec["Field"]=="goden") $goden=$rec1[$rec["Field"]];
    $sql.=", `$rec[Field]`='".$rec1[$rec["Field"]]."' ";
  }
  mq("insert into inventory set owner='$_SESSION[uid]', prototype='$item' ".($goden?", dategoden='".($goden*60*60*24+time())."'":"")." $sql");
  echo db_error();
  return array("img"=>$rec1["img"], "name"=>$rec1["name"]);
}
    }
    include(""); ?>

    </TD>
</TR>
</TABLE></td></tr></table>
<?
  $f=mqfa1("select value from variables where var='fireworks'");
  if ($f>time()) echo implode("",file("clipart/fworks.html"));
  //if ($user["room"]==20) echo implode("",file("clipart/fworks.html"));
?>
</BODY>
</HTML>