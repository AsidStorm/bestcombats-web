<?
function cutgrass2($quest) {
  global $user, $questtime;
  include_once("questfuncs.php");
  $inhands=mqfa("select prototype, minu from inventory where id='$user[weap]'");
  $sickles[1768]=array("grass"=>1);
  $sickles[2221]=array("grass"=>2, "chance"=>10);
  $sickles[2222]=array("grass"=>3, "chance"=>20);
  $sickles[100006]=array("grass"=>2, "chance"=>25);
  $sickles[100007]=array("grass"=>3, "chance"=>30);
  if ($user["lovk"]<25) {
    return "�� ������������ ������, ����� �������� ������-�����!";
  } elseif ($inhands["prototype"]!=1768 && $inhands["prototype"]!=2221 && $inhands["prototype"]!=2222 && $inhands["prototype"]!=100006 && $inhands["prototype"]!=100007) {
    return "��� �������� ����� ��� ��������� ����!";
  } elseif ($user["shit"]) {
    return "��� �������� ����� ��� ���������� ���������� ����� ����!";
  } elseif (canmakequest($quest)) {
    getadditdata($user);
    $taken=array();
    $i=0;
    $qty=rand(round($user["lovk"]/2), $user["lovk"]);
    if (getchance($sickles[$inhands["prototype"]]["chance"])) $qty=round($qty*1.5);
    $taken[]=takesmallitem(64, 0, "����� �� ������", $qty, 0, -1);
    $r=rand(0,10);
    if ($r==5) mq("update inventory set duration=duration+1 where id='$user[weap]'");
    $ret="����� ����� � ����� �� �����, �� ������� ";
    $i=0;
    $imgs="";
    foreach ($taken as $k=>$v) {
      $i++;
      if ($i>1) {
        $ret.=", ";
        $imgs.=" ";
      }
      $ret.=" ������-����� ($qty ��.)";
      $imgs.="<img src=\"".IMGBASE."/i/sh/$v[img]\">";
    }
    $ret.="<br><br>
    <center>$imgs</center><br>";
    if (!getchance($inhands["minu"]-1)) {
      makequest($quest);
      $ret.="����� ���������� ������ ���� ��� ��������� ����� ��� ������� ���.";
    } else {
      $ret.="<font color=green><b>������ ������ ��� ������ ������, � �� ������ ���������� ������.</b></font>";
    }
    return $ret;
  } else {
    return "�� ��� ������������ ��������� ����� ����������� ������ ����.
    ��������� ��� ������� ".ceil($questtime/60)." ���.";
  }
}
?>