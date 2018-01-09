<center>Справочник товара</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO users (name,pass,status,prava) VALUES ('$_POST[names]','$_POST[pass]','$_POST[status]','$_POST[prava]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM users WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `users` SET name='$_POST[names]',pass='$_POST[pass]',status='$_POST[status]',prava='$_POST[prava]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=settings&sp=users&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Имя</center>
</td>
<td width='10%'>
<center><b>Пароль</center>
</td>
<td width='10%'>
<center><b>Статус</center>
</td>
<td width='10%'>
<center><b>Права</center>
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
<input type='password' name='pass' rows='1' cols='12' style='width: 100%' id='ugolkrug'>
</td>
<td width='10%'>
<textarea name='status' rows='1' cols='12' style='width: 100%' id='ugolkrug'>1</textarea>
</td>
<td width='10%'>
<select name='prava' id='ugolkrug'>
<?php

$ath = mysql_query("select * from prava");
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

$ath = mysql_query("select * from users ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n= $author[id];
}

for ($i = 1; $i <= $n ; $i++){

$ath = mysql_query("select * from users WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
echo"
<center>
<form method='post' action='?st=settings&sp=users&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Имя</center>
</td>
<td width='10%'>
<center><b>Пароль</center>
</td>
<td width='10%'>
<center><b>Статус</center>
</td>
<td width='10%'>
<center><b>Права</center>
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
<input type='password' name='pass' rows='1' cols='12' style='width: 100%' id='ugolkrug' value='$author[pass]'>
</td>
<td width='10%'>
<textarea name='status' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[status]</textarea>
</td>
<td width='10%'>
<select name='prava' id='ugolkrug'>";
}}



$ath = mysql_query("select * from users WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$edi = $author[prava];

$ath = mysql_query("select * from prava");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {

if ($edi == $author[name]) {
echo"<option value='$author[name]' selected>$author[name]</option>";
}

if ($edi<> $author[name]) {
echo"<option value='$author[name]'>$author[name]</option>";
}


}

}

}}


$ath = mysql_query("select * from users WHERE id=$i;");
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
<a href='?st=settings&sp=users&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
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