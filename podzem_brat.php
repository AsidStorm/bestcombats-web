<?
$frt=db_query("select user_id from `labirint` where glava='".$glava."'");
while($rbb=mysqli_fetch_array($frt)){
addchp ('<b>'.$user["login"].'</b> поднял предмет "'.$mis.'".   ','{[]}'.nick7 ($rbb["user_id"]).'{[]}');
}

?>