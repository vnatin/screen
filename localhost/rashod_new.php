<?php
if ($_GET[action] == 'create') {
$tms = time();
$ath = mysql_query("INSERT INTO docs (name,type,date,status,comment) VALUES ('Расходная накладная','out','$tms','open','$_POST[comment]') ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"";
}
echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=http://localhost/index2.php?st=sklad&sp=rashod'>";
}
?>


<center><b>Создание расходной накладной</b></center>
<br>

<form method='post' action='?st=sklad&sp=rashod_new&action=create'>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='80%'>
<center><b>Комментарий</center>
</td>
<td width='20%'>
</td>
</tr>
<tr>
<td width='80%'>
<textarea name='comment' rows='1' cols='12' style='width: 100%' id='ugolkrug'></textarea>
</td>
<td width='20%'>
<center>
<input type='submit' name='upload' value='Создать' id='ugolkrug'>
</center>
</td>
</tr>
</table>
</center> 
</form> 

<?php
include"conf.php";

?>