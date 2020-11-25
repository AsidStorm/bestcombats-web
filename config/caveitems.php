<?php

// 302 ///////////////////////////
$caveitems[3]=array("smallitem1"=>46, "chance1"=>1, "smallitem2"=>43, "chance2"=>1, "smallitem3"=>42, "chance3"=>1, "smallitem4"=>44, "chance4"=>1, "smallitem5"=>45, "chance5"=>1);
$caveitems[4]=array("smallitem1"=>46, "chance1"=>2, "smallitem2"=>43, "chance2"=>2, "smallitem3"=>42, "chance3"=>2, "smallitem4"=>44, "chance4"=>2, "smallitem5"=>45, "chance5"=>2);
$caveitems[5]=array("smallitem1"=>46, "chance1"=>2, "smallitem2"=>43, "chance2"=>2, "smallitem3"=>42, "chance3"=>2, "smallitem4"=>44, "chance4"=>2, "smallitem5"=>45, "chance5"=>2);
$caveitems[6]=array("smallitem1"=>46, "chance1"=>3, "smallitem2"=>43, "chance2"=>3, "smallitem3"=>42, "chance3"=>3, "smallitem4"=>44, "chance4"=>3, "smallitem5"=>45, "chance5"=>3);
$caveitems[7]=array("smallitem1"=>46, "chance1"=>3, "smallitem2"=>43, "chance2"=>3, "smallitem3"=>42, "chance3"=>3, "smallitem4"=>44, "chance4"=>3, "smallitem5"=>45, "chance5"=>3);
$caveitems[8]=array("smallitem1"=>46, "chance1"=>4, "smallitem2"=>43, "chance2"=>4, "smallitem3"=>42, "chance3"=>4, "smallitem4"=>44, "chance4"=>4, "smallitem5"=>45, "chance5"=>4);

// 74 ////////////////////////////////////

if ($user['room'] == 74) {

    $randCompl9 = db_result(db_query("SELECT * FROM `shop` WHERE nlevel = 9 AND setid > 0 AND count > 0 ORDER BY RAND() LIMIT 1"), 0, 0);
    $randAllSh7 = db_result(db_query("SELECT * FROM `shop` WHERE nlevel = 7 AND count > 0 ORDER BY RAND() LIMIT 1"), 0, 0);
    $randSmallI = db_result(db_query("SELECT id FROM smallitems WHERE type = 189 ORDER BY RAND() LIMIT 1"), 0, 0);
    $randCharm0 = db_result(db_query("SELECT id FROM shop WHERE id = 2534 OR id = 2538 OR id = 2542 OR id = 2546 OR id = 2550 ORDER BY RAND() LIMIT 1"), 0, 0);

    $caveitems[16] = array(array('id'=>979, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10)); // Офицер глубин
    $caveitems[20] = array( // Берсеpк
        array('id'=>1971, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10),
        array('id'=>1387, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10),
        array('id'=>2460, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10)
    );
    $caveitems[21] = array(array('id'=>2368, 'from'=>'shop', 'foronetrip'=>1, 'chance'=>10)); // Слизь 500
    $caveitems[28] = array(array('id'=>2368, 'from'=>'shop', 'foronetrip'=>1, 'chance'=>10)); // Слизь 700
    $caveitems[34] = array( // Чернокнижник
        array('id'=>995, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>996, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>1967, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2)
    ); 
    $caveitems[42] = array(array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2)); // Проклятый 1000
    $caveitems[43] = array(array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2)); // Зомби 1800
    $caveitems[44] = array(array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2)); // Зомби 2160
    $caveitems[45] = array( // Пожиратель Падали
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20)
    ); 
    $caveitems[46] = array( // Шут Повелителя
        /////////////////////////////// + свиток зачарования ///////////////////////////////////////////////////////////////
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20),
        array('id'=>$randCharm0, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>100),
    ); 
    $caveitems[47] = array( // Трупожор
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20),
        array('id'=>$randCharm0, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>100),
    ); 
    $caveitems[48] = array( // Проклятый Пленник
        /////////////////////////////// + свиток зачарования //////////////////////////////////////////////////////////////
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20),
        array('id'=>$randCharm0, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>100),
    ); 
    $caveitems[49] = array(array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2)); // Проклятый 1100
    $caveitems[51] = array( // Древний Страж 8000
        array('id'=>995, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randAllSh7, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20)
    ); 
    $caveitems[52] = array( // Древний Страж 8800
        array('id'=>995, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randAllSh7, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20)
    ); 
    $caveitems[54] = array( // Древний Страж 10400
        array('id'=>995, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randAllSh7, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randCompl9, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2),
        array('id'=>$randSmallI, 'from'=>'smallitems', 'foronetrip'=>0, 'chance'=>20)
    ); 

}

// 78 ////////////////////////////////////

if ($user['room'] == 78) {
    $caveitems[75] = array(array('id'=>2565, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[76] = array(array('id'=>2564, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[77] = array(array('id'=>2565, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[78] = array(array('id'=>2564, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[79] = array(array('id'=>2565, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[80] = array(array('id'=>2564, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
}
if ($user['room'] == 403) {
    $caveitems[91] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[92] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[93] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[95] = array(array('id'=>11462, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>100)); //Мартын
    $caveitems[96] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[98] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[99] = array(array('id'=>11452, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
//Дроп второй этаж каналки
    $caveitems[100] = array(array('id'=>11467, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>70));
    $caveitems[101] = array(array('id'=>11468, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>100));


}
if ($user['room'] == 83) {
    $caveitems[81] = array(array('id'=>11529, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[86] = array(array('id'=>11532, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>20));
    $caveitems[84] = array(array('id'=>11614, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>10));
    $caveitems[88] = array(array('id'=>11654, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>5));
    $caveitems[89] = array(array('id'=>11655, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>5));
    $caveitems[85] = array(array('id'=>11656, 'from'=>'shop', 'foronetrip'=>0, 'chance'=>2));
}

///////////////////////
//$caveitems[50]=array("item1"=>2348, "chance1"=>10, "item2"=>2349, "chance2"=>10, "item3"=>2350, "chance3"=>10, "item4"=>2351, "chance4"=>10, "item5"=>2352, "chance5"=>10, "item6"=>2356, "chance6"=>1);
  
?>