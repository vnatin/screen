<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>
<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


<head>

<?php
$d = date(d);
$m = date(m);
$y = date(Y);
$h = 12;
$mm = 0;
$h2 = 6;
$mm2 = 0;
$time_correct = 14400;
?>


<table id='ugolkrug' width='100%' border='1' bgcolor='gray' bordercolor='red'>
<tr>
<td>
<font color='white'><b>Дата с</b>
<?php
$tm_min= mktime($_POST[hours],0,0,$_POST[mount],$_POST[day],$_POST[year]);
$test = date( 'd/m/Y H:i', $tm_min );
echo"$test<br>";
?>


</font>
<hr>
<form action='?st=otchet&sp=sale' name='myform' method='post'> 

<select name='day' size = '1' multiple> 
<?php


for ($i = 1; $i <= 31; $i++) 
{ 

if ($d == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($d <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}

}
?>
</select>
<select name='mount' size = '1' multiple> 
<?php
for ($i = 1; $i <= 12; $i++) 
{ 
if ($m == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($m <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='year' size = '1' multiple> 
<?php
for ($i = 2017; $i <= 2020; $i++) 
{ 
if ($y == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($y <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}

}
?>
</select>
<select name='hours' size = '1' multiple> 
<?php
for ($i = 0; $i <= 24; $i++) 
{ 
if ($h == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}
if ($h <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='minuts' size = '1' multiple> 
<?php
for ($i = 00; $i <= 59; $i++) 
{ 
if ($mm == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}
if ($mm <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>



</td>


<td>
<font color='white'><b>Дата по</b>
<?php
$tm_max= mktime($_POST[hours2],$_POST[minuts2],0,$_POST[mount2],$_POST[day2],$_POST[year2]);
$test2 = date( 'd/m/Y H:i', $tm_max );
echo"$test2<br>";
?>
</font>
<hr>
<form action='index.php?st=otchet&sp=sale' name='myform' method='post'> 
<select name='day2' size = '1' multiple> 
<?php
for ($i = 1; $i <= 31; $i++) 
{ 
if ($d == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($d <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='mount2' size = '1' multiple> 
<?php
for ($i = 1; $i <= 12; $i++) 
{ 
if ($m == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($m <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='year2' size = '1' multiple> 
<?php
for ($i = 2014; $i <= 2020; $i++) 
{ 
if ($y == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($y <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='hours2' size = '1' multiple> 
<?php
for ($i = 0; $i <= 24; $i++) 
{ 
if ($h2 == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($h2 <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>
<select name='minuts2' size = '1' multiple> 
<?php
for ($i = 00; $i <= 59; $i++) 
{ 
if ($mm2 == $i) {
echo" 
<option value='$i' selected>$i</option> 
";
}

if ($mm2 <> $i) {
echo" 
<option value='$i'>$i</option> 
";
}
}
?>
</select>


<?php

echo"<br><br>";
?>
</td>
</tr>
</table>
<input name="Submit" type=submit value="OK"> 
</form>


<?php
include"conf.php";

echo"
<table id='ugolkrug' width='100%' border='1' bgcolor='gray' bordercolor='red'>
<tr> 
";

$ath = mysql_query("select * from users ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <>'') {
$total_sum_waitres = 0;
$ttl=0;

echo"
<td width='' valign='top'>

<center><font size='+2' color='black'><b>$author[name]</b></font></center>

<hr>
";

$aths = mysql_query("select * from zakaz WHERE waitres='$author[name]' AND date_open>='$tm_min-$time_correct' AND date_open<='$tm_max' ; ");
if($aths)
{ 
while($authors = mysql_fetch_array($aths))

if ($authors[id] <>'') {
$dto = date( 'd/m/Y H:i:s', $authors[date_open]-$time_correct );
$dts = date( 'd/m/Y H:i:s', $authors[date_close]-$time_correct );
$total_sum_menu = 0;
echo"
<table border='1'>
<tr>
<td>
";

if ($authors[status] == 'open') {
echo"
<font color='green'>Заказ № <b>$authors[id]</b></font><br>
";
}

if ($authors[status] == 'close') {
echo"
<font color='black'>Заказ № <b>$authors[id]</b></font><br>
";
}

echo"
Дата открытия: $dto<br>
Дата закрытия: $dts<br>
<hr>
";

$athp = mysql_query("select * from podzakaz WHERE zakaz='$authors[id]'; ");
if($athp)
{ 
while($authorp = mysql_fetch_array($athp))

if ($authorp[id] <>'') {

$sum_menu = $authorp[kolvo]*$authorp[price];

$total_sum_menu = $total_sum_menu+$sum_menu;


$total_sum_waitres = $total_sum_waitres+$itog;

echo"$authorp[name_menu]<br> <b>$authorp[kolvo]</b> X <b>$authorp[price]</b> = <b>$sum_menu</b> тг.<br>";
}
}

echo"
<hr>
Сумма: <b>$total_sum_menu</b> тг.<br>
";

$athtt = mysql_query("select * from tables WHERE id='$authors[tables]'; ");
if($athtt)
{ 
while($authortt = mysql_fetch_array($athtt))

if ($authortt[id] <>'') {
echo"
Обслуживание: <b>$authortt[procent]</b> %<br>
";

$procent = $authortt[procent];
}

}

$sum_plus_waitres= round($total_sum_menu+($total_sum_menu/100*$procent));
echo"
С обслуживанием: <b>$sum_plus_waitres</b> тг.<br>
";


$athtc = mysql_query("select * from clients WHERE id='$authors[client]'; ");
if($athtc)
{ 
while($authortc = mysql_fetch_array($athtc))

if ($authortc[id] <>'') {
echo"
Клиент: <b>$authortc[name]</b><br>
Скидка: <b>$authortc[discount]</b> %<br>
";

$discount=$authortc[discount];
}
}

if ($discount == 0) {
$itog = $sum_plus_waitres ; 
}
else
 {
$itog = $sum_plus_waitres - round($sum_plus_waitres/100*$discount); 
}

$ttl = $ttl+$itog;
$tts = $tts + $itog;


$discount= 0;

echo"
Итог: <b>$itog</b><br>
<hr>
Оплаты:<br>
";


$athtp = mysql_query("select * from pay WHERE zakaz='$authors[id]' ORDER BY id ASC; ");
if($athtp)
{ 
while($authortp = mysql_fetch_array($athtp))

if ($authortp[id] <>'') {


$athtpp = mysql_query("select * from type_pay WHERE id='$authortp[type_pay]'; ");
if($athtpp)
{ 
while($authortpp = mysql_fetch_array($athtpp))


if ($authortpp[id] > 0) {

if ($authortp[cash_pay] > 0) {
$type_pay = $authortpp[name];
echo"
$authortpp[name]: <b>$authortp[cash_pay]</b> тг.<br>
";
}


}

if ($authortp[cash_pay] < 0) {
$cp = $authortp[cash_pay]*-1;
echo"
Сдача: <b>$cp</b> тг.<br>
";
}


}






}
}



echo"
</td>
</tr>
</table>
";
}
}





echo"
Сумма : <b>$ttl</b> тг.
</td>
";
}

}
echo"

</tr>

</table>
<table id='ugolkrug' width='100%' border='1' bgcolor='gray' bordercolor='red'>
<tr>
<td>
Общая сумма: <b>$tts</b> тг.
</td>
</tr>
</table>

";


?>
