<?
$mods['perv']=1.7;
$mods['kulon']=1.5;
$mods['haos']=0.5;
$mods['alignprot']=1.5;
$mods['kulakpenalty']=0.5;
$mods['bloodb']=0.1;
$mods['btl_1']=1;
$mods['btl_2']=0.5;
$mods['btl_3']=0;
$mods['krov_oop']=0.2;
$mods['krov_bitv']=30;
$mods['krov_op']=1.15;
$mods['krov_rez']=70;
$mods['krovr_op']=1.25;
$mods['krov_sech']=150;
$mods['krovs_op']=1.4;
$mods['velikaya']=40;
$mods['vel_op']=1.1;
$mods['velichayshaya']=90;
$mods['velich_op']=1.15;
$mods['epohalnaya']=200;
$mods['epoh_op']=1.35;

if ($user['room'] == 76 || $user['room'] == 78 || $user['room'] == 83) {
    foreach ($mods as $k=>$v) {
        $mods[$k] = $v/5;
    }
}

if ($user['room'] == 74) {
    foreach ($mods as $k=>$v) {
        $mods[$k] = $v/15;
    }
}

?>
