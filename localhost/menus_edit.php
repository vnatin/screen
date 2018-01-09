<center>Справочник меню - редактирование картинки</center>
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
$ath = mysql_query("UPDATE `menu` SET img='' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
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

<?php
include"conf.php";

$ath = mysql_query("select * from menu WHERE id=$_GET[id];");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<center>
<font size='+2'><b>$author[name]</b></font>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<img src='img_menu/$author[img]' width='100%'>
</td>
<td width='40%'>
<center><b><a href='?st=spravoch&sp=menu_edit&actions=delete&id=$author[id]'>УДАЛИТЬ</a></b></center>
</td>
<td width='20%'>
<center>

</center>

</td>
</tr>
</table>

</center>
";
}




?>