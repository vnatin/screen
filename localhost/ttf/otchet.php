<center>

<?php
include"conf.php";

$ath = mysql_query("select * from menu;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<table id='ugolkrug' width='40%' border='1' bgcolor='gray'>
<tr> 
<td width='40%' height='80'>
<img src=''>
</td>
<td width='60%'>
Наименование
<br>
Цена
</td>
</tr>
</table>
";
}



?>