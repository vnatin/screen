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
<table width='60%' id='ugolkrug' bgcolor='gray'>
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
</center><hr></td></tr>

";

$atha = mysql_query("SELECT * FROM  `podzakaz` WHERE zakaz='$author[id]' ");
if($atha)
{ 
while($authora = mysql_fetch_array($atha))
echo"<tr><td><b>$authora[name_menu]</b><hr></td><td>  <font size='+1'><b>$authora[kolvo]</font></b> </td></tr>";
}

echo"
<tr>
<td>
</td>
</tr>
</table>
<br>
";

}}

?>
</center>
<br>
<br>
<br>