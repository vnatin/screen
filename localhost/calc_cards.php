<center>Справочник калькуляции</center>
<br>

<?php
if ($_GET[actions] == 'delete') {
$ath = mysql_query("DELETE FROM calc_cards WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Удалено!</center>";
}
}



if ($_GET[actions] == 'add') {

$ath = mysql_query("SELECT * FROM tovar WHERE id=$_POST[tovar_id]");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$t_name = $author[name];
}

$ath = mysql_query("SELECT * FROM edizm WHERE edizm=$_POST[tovar_edizm]");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$ed_koef = $author[koef];
}


$ath = mysql_query("INSERT INTO calc_cards (menu_id,tovar_id,tovar_name,tovar_kolvo,tovar_edizm,tovar_koef) VALUES ('$_GET[id]','$_POST[tovar_id]','$t_name', '$_POST[tovar_kolvo]','$_POST[tovar_edizm]','$ed_koef') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар добавлен!</center>";
}
}
?>

<br>
<br>  

<?php
include"conf.php";

$ath = mysql_query("select * from menu ORDER BY id DESC limit 1;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$n = $author[id];
}

for ($i = 0; $i <= $n ; $i++){

$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$sum = 0;

echo"
<center>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='80%'>
<center><font size='+2'><b>$author[name]</b></font></center>
</td>
<td width='20%'>
<center>
<!-- <a href='?st=spravoch&sp=calc_cards&actions=&id=$author[id]'><font color='red'>Редактирование</font></a> -->
</center>
</td>
</tr>
<tr>
<td width='80%'>
</td>
<td width='20%'>
<center>
</center>
</td>
</tr>
";



$ath = mysql_query("select * from calc_cards WHERE menu_id=$i ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <> '') {


$athq = mysql_query("select * from tovar WHERE id=$author[tovar_id] ;");
if($athq)
{ 
while($authorq = mysql_fetch_array($athq))
$sum= round($sum +$authorq[price]/1000*$author[tovar_kolvo]);
}


echo"
<tr>
<td>
<table width='100%' border='0' id='ugolkrug' bgcolor=''>
<tr>
<td id='ugolkrug' width='60%'>
<b><font color='black'>$author[tovar_name]</font>
</td>
<td id='ugolkrug' width='20%'>
<b>$author[tovar_kolvo]
</td>
<td id='ugolkrug' width='20%'>
<b>$author[tovar_edizm]
</td>
</tr>
</table>
</td>
<td>
<a href='?st=spravoch&sp=calc_cards&actions=delete&id=$author[id]'>Удалить</a>
</td>
</tr>
";
}}



$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<tr>
<td>
<form method='post' action='?st=spravoch&sp=calc_cards&actions=add&id=$author[id]'>
<input name='menu_id' type='hidden' value='$author[id]'>
<table width='100%' border='0' id='ugolkrug' bgcolor='blue'>
<tr>
<td width='60%'>
<select name='tovar_id' id='ugolkrug' cols='12'> 
";
}

$ath = mysql_query("select * from tovar ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[id]'>$author[name]</option>";
}


$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
</select>
</td>
<td width='20%'>
<textarea name='tovar_kolvo' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<select name='tovar_edizm' id='ugolkrug' cols='12'> 
";
}
$ath = mysql_query("select * from edizm;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<option value='$author[edizm]'>$author[name]</option>
";
}

$ath = mysql_query("select * from menu WHERE id=$i;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
</select>
</td>
<td>
<input type='submit' name='upload' value='Добавить' id='ugolkrug'>
</td>
</tr>
</table>
Себестоимость блюда: <b>$sum</b> тг.
</td>
</tr>
</table>
</form>
</center>
";
}}}
}



?>