<?
 if ($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if ($user['battle']==0) {
echo'������ ������������ ��� ���';
}
$_POST['target']=htmlspecialchars($_POST['target']);
if(preg_match("/__/",$_POST['target']) || preg_match("/--/",$_POST['target']) || strlen($_POST['target']) > 30)
{
echo"� ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-', ��� �� ����� ������ 30 ��������!";
}else{
$mess  = $_POST['target'];
if ($user['sex'] == 1) {$action="���������";}	else {$action="����������";}
addlog($user['battle'],'<span class=sysdate>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' '.$action.': '.$mess.'<BR>');		
$bet=1;
}
?>