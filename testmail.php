<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
 
<html>
<head>
    <title>Untitled</title>
</head>
 
<body>
 
<?php
//���������� ��
include'connect.php';
##### �������� ����� ������ ##### 
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>�������� ���������</legend>
<table><tr><td>����</td><td><input type='text' name='zagolovok'></td></tr>
<tr><TD><TEXTAREA name=sendtext rows=12 cols=12></TEXTAREA></TD></tr>
<tr><td><input type=submit value='���������'></td></tr>
</table></fieldset></form>";                             
if (isset($_POST['zagolovok']) && isset($_POST['sendtext'])) {
$bazamail = mysql_query("SELECT * FROM `userss`;");
//���� ������
$subject = $_POST['zagolovok'];
//������
$message = $_POST['sendtext'];
/* ��� �������� HTML-����� �� ������ ���������� ����� Content-type. */
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=cp1251\r\n";
//���. �����
$headers .= "From: Support BestcombatS.net<support@BestcombatS.net>";
//����������
//���������� ����, ������ ������, �������� ����� ��������� ��� ��������, �����:
while ($row = mysql_fetch_assoc($bazamail)) {
$to = "<".$row['email'].">";
mail($to,$subject, $message,$headers);
//����� �� � ��� ������� ���, ��� �� �� ���� ��� ���� ��������:
sleep(1);
}
}
?>
 
</body>
</html>