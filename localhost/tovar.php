<center>Справочник товара</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO tovar (name,edizm,kolvo_edizm,price,lim) VALUES ('$_POST[names]','$_POST[edizm]','$_POST[kolvo_edizm]','$_POST[price]','$_POST[limits]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM tovar WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `tovar` SET name='$_POST[names]',edizm='$_POST[edizm]',kolvo_edizm='$_POST[kolvo_edizm]',price='$_POST[price]',lim='$_POST[limits]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=spravoch&sp=tovar&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Ед. изм.</center>
</td>
<td width='10%'>
<center><b>Количество</center>
</td>
<td width='10%'>
<center><b>Лимит</center>
</td>
<td width='10%'>
<center><b>Цена</center>
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
<td width='10%'>
<select name='edizm' id='ugolkrug'> 
<?php
$ath = mysql_query("select * from edizm ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[edizm]'>$author[name]</option>";
}
?>
</select>
</td>
<td width='10%'>
<textarea name='kolvo_edizm' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<textarea name='limits' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<textarea name='price' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
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

$ath = mysql_query("select * from tovar ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n= $author[id];
}

for ($i = 1; $i <= $n ; $i++){

$ath = mysql_query("select * from tovar WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
<center>
<form method='post' action='?st=spravoch&sp=tovar&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Ед. изм.</center>
</td>
<td width='10%'>
<center><b>Количество</center>
</td>
<td width='10%'>
<center><b>Лимит</center>
</td>
<td width='10%'>
<center><b>Цена</center>
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
<select name='edizm' id='ugolkrug'>";
}}



$ath = mysql_query("select * from tovar WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$edi = $author[edizm];

$ath = mysql_query("select * from edizm");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {

if ($edi == $author[edizm]) {
echo"<option value='$author[edizm]' selected>$author[name]</option>";
}

if ($edi<> $author[edizm]) {
echo"<option value='$author[edizm]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from tovar WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
</select>
</td>
<td width='10%'>
<textarea name='kolvo_edizm' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[kolvo_edizm]</textarea>
</td>
<td width='10%'>
<textarea name='limits' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[lim]</textarea>
</td>
<td width='10%'>
<textarea name='price' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[price]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=spravoch&sp=tovar&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
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