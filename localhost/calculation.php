<center><b>Списание по сменам</b></center>
<br>
<br>

<center>
<?php
include"conf.php";

$ath = mysql_query("SELECT * FROM  `change` ORDER BY id DESC");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
if ($author[id] <>''){

$dto = date( 'd/m/Y H:i', $author[date_open] );
$dtc = date( 'd/m/Y H:i', $author[date_close] );

if ($author[calc_status] == '0') {
echo"
<table width='40%' id='ugolkrug' bgcolor='red'>
";
}
if ($author[calc_status] == '1') {
echo"
<table width='40%' id='ugolkrug' bgcolor='green' bgcolor='gray'>
";
}
echo"
<tr>
<td width='80%'>
<font color='black'><b>Смена № $author[id]
<br>
Открыта: $dto
<br>
Закрыта: $dtc
</b></font><br>
</td>
<td width='20%'>
<a href='?st=sklad&sp=calculation_view&id=$author[id]'>Просмотр</a>
";

if ($author[calc_status] == '0') {
echo"
<br>
<a href='?st=sklad&sp=calculation_edit&id=$author[id]'>Провести</a>
";
}

echo"
</td>
</tr>
</table>
";
}}

?>
</center>
<br>
<br>
<br>