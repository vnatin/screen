<center>Остатки товара</center>
<br>
<br>
 

<center>
<table border='1' width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='55%' bgcolor='gray'>
<center><b>Наименование</center>
</td>
<td width='15%' bgcolor='gray'>
<center><b>Количество</center>
</td>
<td width='15%' bgcolor='gray'>
<center><b>Ед. изм.</center>
</td>
<td width='15%' bgcolor='gray'>
<center><b>Лимит</center>
</td>
</td>
</tr>


<?php
include"conf.php";

$d = getdate(); // использовано текущее время


if ($_GET[st] == '') {echo"<b>$d[mday].$d[mon].$d[year]</b>";}

$ath = mysql_query("select * from tovar ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {
echo"
<tr>
<td width='55%'>
<b>$author[name]
</td>
<td width='15%'>

<center><b>$author[kolvo_edizm]</center>
</td>
<td width='15%'>

<center><b>$author[edizm]</center>
</td>
<td width='15%'>

<center><b>$author[lim]</center>
</td>
</tr>
";
}
}

echo"</table><br><br>
";

if ($_GET[st] <> '') {echo" <a href='ostatki.php' target='_blank'><font color='black' size='+2'>Печать</font></a>";}
if ($_GET[st] == '') {echo" <a href='javascript: window.print();'><font color='black' size='+2'>Распечатать остатки</font></a>";}
?>