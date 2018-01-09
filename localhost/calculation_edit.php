<center><b>Списание по сменам</b></center>
<br>
<br>

<center>
<?php
include"conf.php";

$ath = mysql_query("SELECT * FROM  `zakaz` WHERE id_change=$_GET[id]");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <>''){

echo"
<table width='60%' id='ugolkrug'>
<tr>
<td>
<center>Заказ № <b>$author[id]</b> Официант: <b>$author[waitres]</b> Статус чека: 
";
if ($author[status] == 'open') {
echo"<font color='green'>открыт</font>";
}
if ($author[status] == 'close') {
echo"<font color='black'>закрыт</font>";
}
echo"
</center><hr>

";

$atha = mysql_query("SELECT * FROM  `podzakaz` WHERE zakaz='$author[id]' ");
if($atha)
{ 
while($authora = mysql_fetch_array($atha))
if ($authora[id] <> '') {

$athe = mysql_query("SELECT * FROM  `calc_cards` WHERE menu_id='$authora[menu]' ");
if($athe)
{ 
while($authore = mysql_fetch_array($athe))
if ($authore[id] <>'') {

$athes = mysql_query("SELECT * FROM  `edizm` WHERE edizm='$authore[tovar_edizm]' ");
if($athes)
{ 
while($authorse = mysql_fetch_array($athes))
$koef = $authorse[koef];
}

$athesf = mysql_query("SELECT * FROM  `tovar` WHERE name='$authore[tovar_name]' ");
if($athesf)
{ 
while($authorsef = mysql_fetch_array($athesf))
$ed = $authorsef[edizm];

}


$sum = $authora[kolvo]*($authore[tovar_kolvo]/$koef);

echo"$authore[tovar_name] - $sum $ed <br> ";



$atht = mysql_query("SELECT * FROM  `tovar` WHERE name='$authore[tovar_name]' ");
if($atht)
{ 
while($authort = mysql_fetch_array($atht))
if ($authort[id] <> '') {
$total = $authort[kolvo_edizm] - $sum;
echo"<hr>$total<hr>";

$ath = mysql_query("UPDATE `tovar` SET kolvo_edizm='$total' WHERE id='$authort[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}


}}



}}





}}

echo"

</td>
</tr>
</table>
<br>
";

$ath = mysql_query("UPDATE `change` SET calc_status='1' WHERE id='$_GET[id]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"";
}

echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=/index2.php?st=sklad&sp=calculation'>";

}}


?>
</center>
<br>
<br>
<br>