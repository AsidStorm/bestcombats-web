<?php

if ($user['battle'] > 0) {
	echo "Не в бою...";
}

if ($_SESSION['uid'] == null) header("Location: index.php");

$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '{$_GET['use']}' AND `owner` = '{$user['id']}' LIMIT 1;"));
$svDest = substr($svitok['name'], -2, 2);
$iType=array(
    "хи"=>1,
    "хэ"=>2,
    "ви"=>5,
    "во"=>9,
    "кэ"=>24,
    "ки"=>11,
    "ми"=>8,
    "си"=>22,
    "мо"=>4,
    "со"=>23
);
//if ($user['id'] == 7) {
    $dresses = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND magic < 1 AND type = " . $iType[$svDest]);
    $dress = '';
    if ($dresses) {
        foreach ($dresses as $v) {
            if (str_replace(' ', '', $v['name']) == str_replace(' ', '', $_POST['target'])) {
                $dress = $v;
                break;
            }
        }
    }
//} else {
    //$dress  = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `name` = '{$_POST['target']}' AND ecost = 0 AND magic < 1 AND type = " . $iType[$svDest] . " LIMIT 1;"));
//}

if ($dress && $svitok) {
    if (!strpos($dress['name'], "[R]") or $dress['type']>29 or $dress['type']==25) {
        $query = "
            UPDATE `inventory` 
            SET 
                `name` = CONCAT(`name`,' [R]'),
                `gsila`=`gsila`+{$svitok['gsila']},
                `glovk`=`glovk`+{$svitok['glovk']},
                `ginta`=`ginta`+{$svitok['ginta']},
                `gintel`=`gintel`+{$svitok['gintel']},
                `bron1`=`bron1`+{$svitok['bron1']},
                `bron2`=`bron2`+{$svitok['bron2']},
                `bron3`=`bron3`+{$svitok['bron3']},
                `bron4`=`bron4`+{$svitok['bron4']},
                `mfkrit`=`mfkrit`+{$svitok['mfkrit']},
                `mfakrit`=`mfakrit`+{$svitok['mfakrit']},
                `mfuvorot`=`mfuvorot`+{$svitok['mfuvorot']},
                `mfauvorot`=`mfauvorot`+{$svitok['mfauvorot']},
                `ghp`=`ghp`+{$svitok['ghp']},
                `gmana`=`gmana`+{$svitok['gmana']},
                `mfrej`=`mfrej`+{$svitok['mfrej']},
                `mfdrob`=`mfdrob`+{$svitok['mfdrob']},
                `mfkol`=`mfkol`+{$svitok['mfkol']},
                `mfrub`=`mfrub`+{$svitok['mfrub']},
                `mfdhit`=`mfdhit`+{$svitok['mfdhit']},
                `mfdmag`=`mfdmag`+{$svitok['mfdmag']},
                `mfhitp`=`mfhitp`+{$svitok['mfhitp']},
                `mfmagp`=`mfmagp`+{$svitok['mfmagp']},
                `massa` = `massa`+3,
                `destinyinv`=1,
                `opisan` = 'Предмет усилен <b>{$svitok['name']}</b>'
            WHERE `id` = {$dress['id']} LIMIT 1;
        ";
        if (mysql_query($query)) {
                echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно усилен.<b></font> ";
                $bet=1;
                            /*,
                            `cost` = `cost`+{$svitok['nlevel']}*/
        } else {
            echo "<font color=red><b>Произошла ошибка!<b></font>";
        }
    } else {
        echo "<font color=red><b>Предмет уже усилен или не подлежит усилению<b></font>";
    }
} else {
    echo "<font color=red><b>Неправильное имя предмета или неправильная руна<b></font>";
}


?>
