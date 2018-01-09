<center>Справочник меню</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO menu (name,cat,price,printer,comment) VALUES ('$_POST[names]','$_POST[cat]','$_POST[price]','$_POST[printer]','$_POST[comment]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Стол добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM menu WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Стол удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `menu` SET name='$_POST[names]',cat='$_POST[cat_tables]',price='$_POST[price]',printer='$_POST[printer]',comment='$_POST[comment]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=spravoch&sp=menu&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='30%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Описание</center>
</td>
<td width='10%'>
<center><b>Категория</center>
</td>
<td width='10%'>
<center><b>Цена</center>
</td>
<td width='10%'>
<center><b>Принтер</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='30%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='comment' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<select name='cat' id='ugolkrug'> 
<?php
$ath = mysql_query("select * from cat_menu ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[id]'>$author[name]</option>";
}
?>
</select>
</td>
<td width='10%'>
<textarea name='price' rows='1' cols='12' style='width: 100%' id='ugolkrug'>0</textarea>
</td>
<td width='10%'>
<select name='printer' id='ugolkrug'> 
<?php
$ath = mysql_query("select * from printers ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[id]'>$author[name]</option>";
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

$ath = mysql_query("select * from menu ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n= $author[id];
}

for ($i = 1; $i <= $n ; $i++){

$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
<center>
<form method='post' action='?st=spravoch&sp=menu&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='10%'>
<center><b>Картинка</center>
</td>
<td width='20%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center><b>Описание</center>
</td>
<td width='10%'>
<center><b>Категория</center>
</td>
<td width='10%'>
<center><b>Цена</center>
</td>
<td width='10%'>
<center><b>Принтер</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='10%'>
";

if ($author[img] <>'') {
echo"
<center>
<a href='?st=spravoch&sp=menu_edit&id=$author[id]'><img src='/img_menu/$author[img]' width='100%'></a>
";
}

if ($author[img] == '') {
echo"
<center>
<a href='?st=spravoch&sp=menu_new&id=$author[id]'>Добавить</a>
";
}

echo"
</td>
<td width='20%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='20%'>
<textarea name='comment' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[comment]</textarea>
</td>
<td width='10%'>
<select name='cat_tables' id='ugolkrug'>";
}}



$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$edi = $author[cat];

$ath = mysql_query("select * from cat_menu");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {

if ($edi == $author[id]) {
echo"<option value='$author[id]' selected>$author[name]</option>";
}

if ($edi<> $author[id]) {
echo"<option value='$author[id]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
</select>
</td>
<td width='10%'>
<textarea name='price' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[price]</textarea>
</td>

<td width='10%'>
<select name='printer' id='ugolkrug'>";
}}



$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$edi = $author[printer];

$ath = mysql_query("select * from printers");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {

if ($edi == $author[id]) {
echo"<option value='$author[id]' selected>$author[name]</option>";
}

if ($edi<> $author[id]) {
echo"<option value='$author[id]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from menu WHERE id=$i;");
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
<a href='?st=spravoch&sp=menu&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
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