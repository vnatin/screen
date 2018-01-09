<center>Справочник принтеров</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO printers (name,comment,port,driver) VALUES ('$_POST[names]','$_POST[names2]','$_POST[prt]','$_POST[driver]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Добавлено!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM printers WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Удалено!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `printers` SET name='$_POST[names]',comment='$_POST[names2]',port='$_POST[prt]',driver='$_POST[driver]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=settings&sp=printers&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Имя</center>
</td>
<td width='20%'>
<center><b>Порт</center>
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
<td width='20%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='names2' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='prt' rows='1' cols='12' style='width: 100%' id='ugolkrug'>0</textarea>
</td>
<td width='20%'>
<select name='driver' id='ugolkrug'>
<?php

$ath = mysql_query("select * from printers_driver");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[name]'>$author[name]</option>";
}
?>
</select>
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

$ath = mysql_query("select * from printers ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n= $author[id];
}

for ($i = 1; $i <= $n ; $i++){

$ath = mysql_query("select * from printers WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
<center>
<form method='post' action='?st=settings&sp=printers&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Наименование</center>
</td>
<td width='40%'>
<center><b>Коментарий</center>
</td>
<td width='20%'>
<center><b>Порт</center>
</td>
<td width='20%'>
<center><b>Принтер</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='20%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='20%'>
<textarea name='names2' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[comment]</textarea>
</td>
<td width='20%'>
<textarea  name='prt' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[port]</textarea>
</td>
<td width='20%'>
<select name='driver' id='ugolkrug'>";
}}



$ath = mysql_query("select * from printers WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$edi = $author[driver];

$ath = mysql_query("select * from printers_driver");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {

if ($edi == $author[driver]) {
echo"<option value='$author[id]' selected>$author[name]</option>";
}

if ($edi<> $author[driver]) {
echo"<option value='$author[id]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from printers WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
</select>
</td>

<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=settings&sp=printers&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}}

}

?>