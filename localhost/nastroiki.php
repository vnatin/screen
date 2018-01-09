<center>Справочник основных настроек</center>
<br>
<?php

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `settings` SET text='$_POST[names]',value='$_POST[value]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br><br>  

<?php
include"conf.php";

$ath = mysql_query("select * from settings WHERE visible=1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<center>
<form method='post' action='?st=settings&sp=nastroiki&actions=update&id=$author[id]'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='60%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center><b>Значение</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='60%'>
<textarea name='names' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[text]</textarea>
</td>
<td width='20%'>
<textarea name='value' rows='1' cols='12' style='width: 100%' id='ugolkrug'>$author[value]</textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Сохранить' id='ugolkrug'>
<br>
</center>
</td>
</tr>
</table>
</form>
</center>
";
}

?>