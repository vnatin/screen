<center><b>Накладные списания</b></center>
<br>
<br>
<a href='?st=sklad&sp=rashod_new'><font size='+4'>Создать накладную списания</font></a>
<br>
<?php
if ($_GET[action] == 'delete') {
$ath = mysql_query("DELETE FROM docs WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Удалено!</center>";
}
}
?>

<br><br>  

<?php
include"conf.php";

$ath = mysql_query("select * from docs WHERE type='out' ORDER BY id DESC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))


if ($author[id] <>'') {
$dt = date( 'd/m/Y H:i', $author[date] );

echo"
<center>
";

if ($author[status] == 'open') {
echo"<table width='80%' border='0' id='ugolkrug' bgcolor='green'>";
}

if ($author[status] == 'close') {
echo"<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>";
}

echo"
<tr>
<td width='80%'>
<center><b>$author[name] №$author[id] от $dt</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='80%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[comment]</textarea>
</td>
<td width='20%'>
<center>
";

if ($author[status] == 'open') {
echo"<a href='?st=sklad&sp=rashod_edit&id=$author[id]'><font color='white'>Редактировать</font></a>
<br>
<a href='?st=sklad&sp=rashod&action=delete&id=$author[id]'><font color='red'>Удалить</font></a>";
}

if ($author[status] == 'close') {
echo"
<a href='?st=sklad&sp=rashod_view&id=$author[id]'><font color='red'>Просмотр</font></a>";
}

echo"

</center>
</td>
</tr>
</table>
</center>
";
}
}
?>
<br>
<br>
<br>