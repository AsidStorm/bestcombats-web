<?php
include'connect.php';
$data = mysql_query("SELECT * FROM `news` WHERE `parent` > '' AND `topic` > '' ORDER by `id` DESC LIMIT 5");
while ($row = mysql_fetch_array($data)) {
}
?>
<table width="100%" cellpadding="0" cellspacing="0" class="news_tab">
<tr>
	<td class="news_title"><?echo"".$row['topic']."";?></td>
</tr>
<tr>
	<td class="news_info"><b>Автор:</b> {AUTHOR} &nbsp; <b>Дата:</b> {DATE}</td>
</tr>
<tr>
	<td class="news_content" colspan="2">{CONTENT}</td>
</tr>
</table>