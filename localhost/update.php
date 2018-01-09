<center>

<?php
include"conf.php";
$version_update='1.005';


echo "
<center>Обновление</center>
<br>
<br>
<center>
";

$ath = mysql_query("SELECT * FROM settings WHERE name='programm_version' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$version = $author[value];
}
echo"
<br>
Текущая версия: $version
<br>
Версия для обновления: $version_update
<br>
";

if (($version <> $version_update) AND ($_GET[update] == 'yes')) {

$ath = mysql_query("UPDATE `settings` SET value='1.005' WHERE name='programm_version' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"Вирсия программы обновлена до 1.005";
}

}

if (($version <> $version_update) AND ($_GET[update] == '')) {
echo"Требуется обновление - <a href='?st=admin&sp=update&update=yes'>Обновить</a> ?";
}

if ($version == $version_update) {
echo"Обновление не требуется";
}

?>