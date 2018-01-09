<center>Накладные списания</center>
<br>



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
</tr>
";
}
}
?>
</table>


<br><br> 

