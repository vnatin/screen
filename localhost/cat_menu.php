<center>Справочник категорий меню</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO cat_menu (name,cat,alchogol,id_sort) VALUES ('$_POST[names]','$_POST[cat]','$_POST[alc]','$_POST[id_sort]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM cat_menu WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `Cat_menu` SET name='$_POST[names]', cat='$_POST[cat]', alchogol='$_POST[alc]', id_sort='$_POST[id_sort]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>


<?php
$ath = mysql_query("select * from cat_menu ORDER BY id_sort DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$last_id = $author[id_sort]+1;
}
?>

<center>
<form method='post' action='?st=spravoch&sp=cat_menu&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='50%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Категория</center>
</td>
<td width='10%'>
<center><b>Алкогольный</center>
</td>
<td width='10%'>
<center><b>Сортировка</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='50%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<select name='cat' id='ugolkrug'>
<?php
$aths = mysql_query("select * from printers;");
if($ath)
{ 
while($authors = mysql_fetch_array($aths))

echo"<option value='$authors[name]'>$authors[name]</option>";

}
?>
</select>
</td>
<td width='10%'>
<center>
<select name='alc' id='ugolkrug'>
<option value='yes'>Да</option>
<option value='no'>Нет</option>
</select>
</td>
<td width='10%'>
<center>
<textarea name='id_sort' rows='1' cols='12' style='width: 100%' id='ugolkrug'><?php echo"$last_id"; ?></textarea>
</center>
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

$ath = mysql_query("select * from cat_menu ORDER BY id_sort ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {
echo"
<center>
<form method='post' action='?st=spravoch&sp=cat_menu&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='50%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Категория</center>
</td>
<td width='10%'>
<center>
<b>Алкогольный
</center>
</td>
<td width='10%'>
<center>
<b>Сортировка
</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='60%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='10%'>
<select name='cat' id='ugolkrug'>";

$edi = $author[cat];

$athw = mysql_query("select * from printers;");
if($athw)
{ 
while($authorw = mysql_fetch_array($athw))

if ($authorw[id] <> '') {

if ($edi == $authorw[name]) {
echo"<option value='$authorw[name]' selected>$authorw[name]</option>";
}

if ($edi <> $author[name]) {
echo"<option value='$authorw[name]'>$authorw[name]</option>";
}


}
}

echo"
</select>
</td>
<td width='10%'>
<center>
<select name='alc' id='ugolkrug'>
";

if ($author[alchogol] == 'yes') {
echo"
<option value='yes' selected>Да</option>
<option value='no'>Нет</option>
";}
if ($author[alchogol] == 'no') {
echo"
<option value='yes'>Да</option>
<option value='no' selected>Нет</option>
";}


echo"
</select>
</td>
<td width='10%'>
<center>
<textarea name='id_sort' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[id_sort]</textarea>
</center>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=spravoch&sp=cat_menu&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}
}

?>