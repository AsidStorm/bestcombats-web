<?php
// magic идентификацыя
    //if (rand(1,2)==1) {

$coma[] = "А вот раньше просто кляпом рот затыкали.";
$coma[] = "А еще раз можешь? ;)";
$coma[] = "А раньше все не так было ";
$coma[] = "А культурный человек сказал бы 'Заткнись, пожалуйста'";
$coma[] = "Безобразие куда цензура смотрит?";
$coma[] = "Бог сотворил землю, а паладин молчание!!!";
$coma[] = "Вечность? Это тоже единица измерения времени.";
$coma[] = "Вот и мне жена так же рот затыкает";
$coma[] = "В Клубе жесткие законы... Только не надо тосковать по беззаконью! ";
$coma[] = "Гнетущую тишину нарушает всеобщее молчание... ";
$coma[] = "Давно бы так ";
$coma[] = "Еще одним немым стало больше ";
$coma[] = "Жестоко, но справедливо ";
$coma[] = "Закон. И против него не попрешь.";
$coma[] = "Значит, есть еще порядок в этом мире ";
$coma[] = "И тишина...";
$coma[] = "Молчание - золото. Ощути себя богатым. ";
$coma[] = "Молчание не ценят, потому что оно достается на халяву... (с), но ему подарю с удовольствием!";
$coma[] = "Молчание - это своего рода инвалидность для болтунов.";
$coma[] = "Не надо злить нас!";
$coma[] = "Нет крика громче тишины... ";
$coma[] = "Ни ругнуться, ни ответить теперь.";
$coma[] = "Ну, как, дошло?";
$coma[] = "Ну, наконец-то!";
$coma[] = "О чем с этим человеком можно говорить, когда с ним и помолчать то не о чем! ";
$coma[] = "Он сказал лишнего.";
$coma[] = "Одна из ступеней развития слова - молчание.";
$coma[] = "Придется помолчать, чтобы тебя выслушали.";
$coma[] = "Прям как рыбка теперь, только рот открывается.";
$coma[] = "Семь раз подумай, один раз промолчи. ";
$coma[] = "Сначала было слово. Потом появилось молчание... ";
$coma[] = "Тебе повезло, что не навсегда. ";
$coma[] = "У вас есть право хранить молчание ";
$coma[] = "Цените слово потому, что каждое может стать последним. ";
$coma[] = "Это безмолвие становится все громче и громче… ";
$coma[] = "Это надо обдумать.";
$coma[] = "Это урок нам всем ";
$coma[] = "Я вас долго слушал, теперь у вас есть время подумать.";
$coma[] = "Я конечно не садист, но мне все это нравится ";
$coma[] = "Помолчи, за умного сойдешь. ";


        if ($_SESSION['uid'] == null) header("Location: index.php");

        $magictime=time()+($_POST['timer']*60);
        $target=$_POST['target'];
        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`spellfreedom` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        if ($tar['id']) {
            $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '2' LIMIT 1;"));
            if ($effect['time']) {
                echo "<font color=red><b>На персонаже \"$target\" уже есть заклятие молчания </b></font>";
}else {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
                    $ok=1;
                }
                elseif (($user['align'] > '1' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] > '1' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($user['align']==5) $ok=1;
                if (in_array($_SESSION['uid'], $smalladms)) $ok=1;
                if ($ok == 1) {
                    if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','Заклятие молчания','$magictime',2);")) {
                        $ldtarget=$target;
                        switch($_POST['timer']) {
                            case "15": $magictime="15 мин."; break;
                            case "30": $magictime="30 мин."; break;
                            case "60": $magictime="1 час."; break;
                            case "180": $magictime="3 часа."; break;
                            case "360": $magictime="6 часов."; break;
                            case "720": $magictime="12 часов."; break;
                            case "1440": $magictime="1 сутки."; break;
                            case "10080": $magictime="1 неделя."; break;
                            case "40320": $magictime="1 месяц."; break;
                        }
                        if ($user['sex'] == 1) {$action="наложил";}
                        else {$action="наложила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
                        elseif ($user['align'] > '3' && $user['align'] <'4') {
                        $angel="Тарман";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        $messch="$angel &quot;{$user['login']}&quot; $action заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        $messch="&quot;невидимка&quot; наложил заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=i/magic/sleep.gif> $messch");
                        addchp($coma[rand(0,count($coma)-1)],"Комментатор");
                        echo "<font color=red><b>Успешно наложено заклятие молчания на персонажа \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>Произошла ошибка!</b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>Вы не можете наложить заклятие молчания на этого персонажа!</b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!</b></font>";
        }
?>
