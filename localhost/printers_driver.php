<center>Справочник драйверов</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO printers_driver (name,model,driver) VALUES ('$_POST[names]','$_POST[model]','$_POST[driver]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM printers_driver WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `printers_driver` SET name='$_POST[names]',model='$_POST[model]',driver='$_POST[driver]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=settings&sp=printers_driver&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center><b>Модель</center>
</td>
<td width='20%'>
<center><b>Драйвер</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='40%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='model' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='driver' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
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

$ath = mysql_query("select * from printers_driver;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<center>
<form method='post' action='?st=settings&sp=printers_driver&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center><b>Модель</center>
</td>
<td width='20%'>
<center><b>Драйвер</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='40%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='20%'>
<textarea name='model' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[model]</textarea>
</td>
<td width='20%'>
<textarea name='driver' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[driver]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=settings&sp=printers_driver&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>