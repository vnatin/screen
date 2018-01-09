<center>Накладные списания</center>
<br>

<?php
if ($_GET[action] == 'close') {

$ath = mysql_query("SELECT * FROM in_out WHERE id_doc='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <> ''){

$kol_io= $author[kolvo];


$athw = mysql_query("SELECT * FROM tovar WHERE id='$author[id_tovar]' ");
if($athw)
{ 
while($authorw = mysql_fetch_array($athw))
if ($authorw[id] <> ''){

$kol_tovar= $authorw[kolvo_edizm] - $kol_io;

$athe = mysql_query("UPDATE `tovar` SET kolvo_edizm='$kol_tovar' WHERE id='$author[id_tovar]'; ");
if($athe)
{ 
while($authore = mysql_fetch_array($athe))
echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=http://localhost/index2.php?st=sklad&sp=rashod'>";
}

}}


$atha = mysql_query("UPDATE `in_out` SET type_doc='close' WHERE id='$author[id]'; ");
if($atha)
{ 
while($authora = mysql_fetch_array($atha))
echo"";
}




}}

$atha = mysql_query("UPDATE `docs` SET status='close' WHERE id='$_GET[id]'; ");
if($atha)
{ 
while($authora = mysql_fetch_array($atha))
echo"";
}


}



if ($_GET[action] == 'delete') {
$ath = mysql_query("DELETE FROM in_out WHERE id='$_GET[id_tovar]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар Удален!</center>";
}
}

if ($_GET[action] == 'new') {

$ath = mysql_query("SELECT * FROM tovar WHERE id='$_POST[namer]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <> ''){
$nm = $author[name];
$id_tovar = $author[id];
$edizm = $author[edizm];
}
}

$tms = time();

$ath = mysql_query("INSERT INTO in_out (name,id_doc,doc,type_doc,id_tovar,kolvo,edizm,price,user,date) VALUES ('$nm','$_GET[id]','in','open','$id_tovar','$_POST[kolvo]','$_POST[edizm]','$_POST[price]','$_SESSION[user]','$tms') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Товар добавлен!</center>";
}

}
?>

<center>
<form method='post' action='?st=sklad&sp=prihod_edit&id=<?php echo"$_GET[id]"; ?>&action=new'>
<table width='60%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='30%'>
<center><b>Наименование</center>
</td>
<td width='10%'>
<center>
<center><b>Ед. изм.</center>
</center>
</td>
<td width='20%'>
<center><b>Количество</center>
</td>
<td width='20%'>
<center><b>Цена</center>
</td>
<td width='20%'>
<center><b></center>
</td>
</tr>
<tr>
<td width='30%'>
<select name='namer' id='ugolkrug'>
<?php

$ath = mysql_query("select * from tovar ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[id]'>$author[name]</option>";
}
?>
</select>
</td>
<td width='10%'>
<select name='edizm' id='ugolkrug'>
<?php

$ath = mysql_query("select * from edizm");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<option value='$author[edizm]'>$author[edizm]</option>";
}
?>
</select>
</td>
<td width='20%'>
<textarea name='kolvo' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<textarea name='price' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Добавить' id='ugolkrug'>
</center>
</td>
</tr>
</table>
</form>
</center>

<br>
<?php
echo"<center><b>Накладная № $_GET[id]</b></center>";
?>
<br>
<br>
<center>

<table width='60%' border='1' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='20%'>
<center><b>Наименование</center>
</td>
<td width='20%'>
<center><b>Количество</center>
</td>
<td width='20%'>
<center><b>Ед.изм.</center>
</td>
<td width='20%'>
<center><b>Цена</center>
</td>
<td width='10%'>
<center><b>Сумма</center>
</td>
<td width='10%'>
<center>
</center>
</td>
</tr>

<?php
$ath = mysql_query("SELECT * FROM in_out WHERE id_doc='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <> '') {
$sum = $author[kolvo] * $author[price];

echo"
<td width='20%'>
<center><b>$author[name]</center>
</td>
<td width='20%'>
<center><b>$author[kolvo]</center>
</td>
<td width='20%'>
<center><b>$author[edizm]</center>
</td>
<td width='20%'>
<center><b>$author[price]</center>
</td>
<td width='10%'>
<center><b>$sum</center>
</td>
<td width='10%'>
<center>
<a href='?st=sklad&sp=prihod_edit&id=4&action=delete&id_tovar=$author[id]'><font color='red'><b>Удалить</b></font></a>
</center>
</td>
</tr>
";
}
}
?>
</table>


<br><br> 
<center><a href='?st=sklad&sp=rashod_edit&id=<?php echo"$_GET[id]"; ?>&action=close'><font size='+2'>Провести</font></center> 
