<center>Справочник клиентов</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO clients (name,discount,cash_prepay,uid) VALUES ('$_POST[names]','$_POST[discount]','$_POST[cash_prepay]','$_POST[uid]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал добавлен!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM clients WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Зал удален!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `Clients` SET name='$_POST[names]',discount='$_POST[discount]',cash_prepay='$_POST[cash_prepay]',uid='$_POST[uid]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=spravoch&sp=clients&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Ф.И.О.</center>
</td>
<td width='10%'>
<center><b>Скидка</center>
</td>
<td width='10%'>
<center><b>Предоплата</center>
</td>
<td width='20%'>
<center><b>Карта</center>
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
<textarea name='discount' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<textarea name='cash_prepay' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='uid' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
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

$ath = mysql_query("select * from clients;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<center>
<form method='post' action='?st=spravoch&sp=clients&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<center><b>Ф.И.О.</center>
</td>
<td width='10%'>
<center><b>Скидка</center>
</td>
<td width='10%'>
<center><b>Предоплата</center>
</td>
<td width='20%'>
<center><b>Карта</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='40%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='10%'>
<textarea name='discount' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[discount]</textarea>
</td>
<td width='10%'>
<textarea name='cash_prepay' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[cash_prepay]</textarea>
</td>
<td width='20%'>
<textarea name='uid' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[uid]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=spravoch&sp=clients&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>