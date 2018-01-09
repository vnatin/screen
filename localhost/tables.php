<center>Справочник столов</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO tables (name,cat_tables,procent,status) VALUES ('$_POST[names]','$_POST[cat_tables]','$_POST[procent]','close') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Стол добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM tables WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Стол удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `tables` SET name='$_POST[names]',cat_tables='$_POST[cat_tables]',procent='$_POST[procent]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=spravoch&sp=tables&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='60%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Зал</center>
</td>
<td width='10%'>
<center><b>Обслуживание</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='60%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<select name='cat_tables' id='ugolkrug'> 
<?php
$ath = mysql_query("select * from cat_tables ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[id]'>$author[name]</option>";
}
?>
</select>
</td>
<td width='10%'>
<textarea name='procent' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
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

$ath = mysql_query("select * from tables ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n= $author[id];
}

for ($i = 1; $i <= $n ; $i++){

$ath = mysql_query("select * from tables WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
<center>
<form method='post' action='?st=spravoch&sp=tables&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='60%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Зал </center>
</td>
<td width='10%'>
<center><b>Обслуживание</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='40%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='10%'>
<select name='cat_tables' id='ugolkrug'>";
}}



$atht = mysql_query("select * from tables WHERE id=$i;");
if($atht)
{ 
while($authort = mysql_fetch_array($atht))

if ($authort[id] <>'') {
$edi = $authort[cat_tables];


$ath = mysql_query("select * from cat_tables");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {


if ($edi == $author[id]) {
echo"<option value='$author[id]' selected>$author[name]</option>";
}

if ($edi <> $author[id]) {
echo"<option value='$author[id]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from tables WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
</select>
</td>
<td width='10%'>
<textarea name='procent' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[procent]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=spravoch&sp=tables&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
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