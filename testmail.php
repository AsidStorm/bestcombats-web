<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
 
<html>
<head>
    <title>Untitled</title>
</head>
 
<body>
 
<?php
//Подключаем БД
include'connect.php';
##### Рассылка почты юзерам ##### 
echo "<form method=post><fieldset style='border:2px dashed #656565;'><legend style='color: green; font-weight: bold;'>Рассылка сообщений</legend>
<table><tr><td>Тема</td><td><input type='text' name='zagolovok'></td></tr>
<tr><TD><TEXTAREA name=sendtext rows=12 cols=12></TEXTAREA></TD></tr>
<tr><td><input type=submit value='Разослать'></td></tr>
</table></fieldset></form>";                             
if (isset($_POST['zagolovok']) && isset($_POST['sendtext'])) {
$bazamail = mysql_query("SELECT * FROM `userss`;");
//Тема Письма
$subject = $_POST['zagolovok'];
//Письмо
$message = $_POST['sendtext'];
/* Для отправки HTML-почты вы можете установить шапку Content-type. */
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=cp1251\r\n";
//Доп. Шапки
$headers .= "From: Support BestcombatS.net<support@BestcombatS.net>";
//Отправляем
//подключаем базу, делаем запрос, получаем текст конкретно для отправки, после:
while ($row = mysql_fetch_assoc($bazamail)) {
$to = "<".$row['email'].">";
mail($to,$subject, $message,$headers);
//здесь бы я еще добавил это, что бы не было как спам рассылка:
sleep(1);
}
}
?>
 
</body>
</html>