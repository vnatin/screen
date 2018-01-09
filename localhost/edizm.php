<center>Справочник Едениц измерений</center>
<br>
<?php
if ($_GET[actions] == 'new') {
$ath = mysql_query("INSERT INTO edizm (name,edizm,koef) VALUES ('$_POST[names]','$_POST[edizm]','$_POST[koef]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Еденица измирения добавлена!</center>";
}
}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM edizm WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Еденица измирения удалена!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `edizm` SET name='$_POST[names]',edizm='$_POST[edizm]',koef='$_POST[koef]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>обновлено!</center>";
}
}

?>

<br>



<center>
<form method='post' action='?st=spravoch&sp=edizm&actions=new'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='60%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Сокращение</center>
</td>
<td width='10%'>
<center><b>Коэфициент</center>
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
<textarea name='edizm' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='10%'>
<textarea name='koef' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
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

$ath = mysql_query("select * from edizm ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<center>
<form method='post' action='?st=spravoch&sp=edizm&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='60%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center><b>Сокращение</center>
</td>
<td width='10%'>
<center><b>Коэфициент</center>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
<tr>
<td width='60%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[name]</textarea>
</td>
<td width='10%'>
<textarea name='edizm' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[edizm]</textarea>
</td>
<td width='10%'>
<textarea name='koef' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[koef]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
<a href='?st=spravoch&sp=edizm&actions=delete&id=$author[id]'><font color='red'>Удалить</font></a>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>