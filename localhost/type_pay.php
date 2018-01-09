<center>Справочник типов оплат</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO type_pay (name) VALUES ('$_POST[names]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Добавлено!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM type_pay WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Удалено!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `type_pay` SET name='$_POST[names]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=settings&sp=type_pay&actions=new'>
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

$ath = mysql_query("select * from type_pay;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<center>
<form method='post' action='?st=settings&sp=type_pay&actions=update&id=$author[id]'>
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
<a href='?st=settings&sp=type_pay&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>