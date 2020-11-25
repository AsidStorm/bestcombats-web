<?
include ("connect.php");
$themes = db_query("SELECT * FROM `news` WHERE `parent` > '' AND `topic` > '' ORDER by `id` DESC LIMIT 10");
while($data = mysqli_fetch_array($themes)) {
$data['text'] = preg_replace('#\$((.+?)\.(jpg|png|gif))\$#i', '<img src="http://img.bestcombats.net/upload/news/$1">', $data['text']);
?>							
<table width="100%" cellpadding="0" cellspacing="0" class="news_tab">
<tr>
	<td class="news_title"><?=$data['topic']?></td>
</tr>
<tr>
	<td class="news_info"><b>Автор:</b> <?=$data['author']?>  <a href='/inf.php?login=<?=$data['author']?>' target='_blank' title='Информация о <?=$data['author']?>'>
<img src='http://img.bestcombats.net/chat/inf.gif'/></a> &nbsp; <b>Дата:</b> <?=$data['date']?></td>
</tr>
<tr>
	<td class="news_content" colspan="2"><?=$data['text']?></td><hr>
</tr>
</table>
<?}?>
<hr><br><center><a href="http://events.bestcombats.net/">Все новости</a></center>