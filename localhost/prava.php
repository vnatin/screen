<center>Справочник прав</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO prava (name) VALUES ('$_POST[names]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM prava WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `prava` SET name='$_POST[names]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=settings&sp=prava&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='80%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='80%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Создать' id='ugolkrug'>
</center>
</td>
</tr>
</table>
</form>
</center>

<br><br>  

<?php
include"conf.php";

$ath = mysql_query("select * from prava;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<center>
<form method='post' action='?st=settings&sp=prava&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='80%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='80%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=settings&sp=prava&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>