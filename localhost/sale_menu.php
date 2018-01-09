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
<form action='?st=otchet&sp=sale_menu' name='myform' method='post'> 

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
<form action='index.php?st=otchet&sp=sale_menu' name='myform' method='post'> 
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

echo"<td>Категории</td>";
$ath = mysql_query("select * from users ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {
echo"<td>$author[name]</td>";
}
}

echo"</tr><tr>";



$aths = mysql_query("select * from cat_menu ORDER BY name ASC;");
if($aths)
{ 
while($authors = mysql_fetch_array($aths))

if ($authors[id] <> ''){
echo"<td><b><font size='+2'>$authors[name]</font></b></td>";

$ath = mysql_query("select * from users ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {
echo"<td>";
$kolvo_p = 0;

$athm = mysql_query("select * from menu WHERE cat=$authors[id] ;");
if($athm)
{ 
while($authorm = mysql_fetch_array($athm))
if ($authorm[id] <> '') {

echo"$authorm[name]<br>";
$kolvo_p = 0;
$klv=0;


$athz = mysql_query("select * from zakaz WHERE date_open>='$tm_min-$time_correct' AND date_open<='$tm_max-$time_correct';");
if($athz)
{ 
while($authorz = mysql_fetch_array($athz))
if ($authorz[id] <> '') {


$athp = mysql_query("select * from podzakaz WHERE zakaz=$authorz[id] ;");
if($athp)
{ 
while($authorp = mysql_fetch_array($athp))
if (($authorp[waitres] == $author[name]) AND ($authorp[menu] == $authorm[id])) {
$kolvo_p = $kolvo_p + $authorp[kolvo];
$klv = $klv+ $kolvo_p;
}
}


}}


echo"<center><b><font size='+1' color='black'>$kolvo_p шт.</font></b></center>";
$kolvo_pv = $kolvo_pv + $kolvo_p;
$kolvo_p = 0;
echo"<hr>";

}}


echo"Всего: $kolvo_pv</td>";
$kolvo_pvt = $kolvo_pvt + $kolvo_pv;
$kolvo_pv=0;

}
}

echo"<td>$kolvo_pvt шт.</td></tr>";
$kolvo_total= $kolvo_total+$kolvo_pvt;
$kolvo_p = 0;
$kolvo_pvt=0;



}}


echo"</tr>
<tr>
<td>
Всего блюд: $kolvo_total шт.
</td>
</tr>
</table>
";
?>
