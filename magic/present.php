<?
  include "questfuncs.php";
  $r=rand(1,100);
  // || $user["id"]==3671
  if ($r>95) {
    $k=mqfa1("select id from berezka where count>0 and ecost<=2000 and nlevel>=8 and count>0 order by rand()");
    $taken=takeitemfromshop($k, "berezka", 0, array("podzem"=>2));
    $tbl="berezka";
  } else {
    $presents=array(3=>75, 100=>70, 134=>70, 169=>25, 170=>15, 1503=>80, 1504=>80, 1505=>45, 1506=>30, 1507=>15, 2316=>25, 2315=>15, 171=>10, 102=>30, 103=>35, 1969=>10, 1960=>5, 1895=>10, 1894=>15, 1893=>25, 1892=>30, 1891=>40, 1890=>30, 1889=>35, 1888=>30, 1392=>35, 1391=>25, 1961=>25, 1968=>20, 1900=>15, 1967=>20, 1962=>10, 1966=>30, 1963=>20, 1965=>15, 1964=>10, 1993=>5, 1994=>5, 1992=>10, 1546=>20, 120=>20, 1995=>25, 2067=>10, 2262=>20, 2260=>30, 2066=>40, 2065=>25, 2064=>10, 1996=>5, 2239=>10, 2238=>5, 2237=>10, 2236=>5, 2235=>25, 2244=>10, 2243=>5, 2242=>10, 2241=>20, 2240=>25, 2249=>15, 2248=>15, 2247=>20, 2246=>10, 2245=>5);
    $tot=0;
    foreach ($presents as $k=>$v) $tot+=$v;
    $rnd=rand(0,$tot-1);
    $tot=0;
    foreach ($presents as $k=>$v) {
      $tot+=$v;
      if ($tot>=$rnd) break;
    }
    $taken=takeitemfromshop($k);
    $tbl="shop";
  }
  adddelo($user["id"], "Персонаж $user[login] нашёл в сундучке (id: $_GET[use]) $taken[name] (id: $taken[id]).", 4);
  echo "В сундучке Вы нашли: <b>$taken[name]</b>";
  mq("delete from inventory where owner='$_SESSION[uid]' and id='$_GET[use]'");
?>