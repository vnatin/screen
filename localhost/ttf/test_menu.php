<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>

<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


<head>

<center>



<?php
include"conf.php";
include"style_menu.css";


$ath = mysql_query("select * from cat_menu ORDER BY name ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))


if (($author[id] <>'') AND ($_GET[cat]=='')) {
echo"
<div>
<a href='?cat=$author[id]' >
<table  width='100%' border='0'>
<tr> 
<td width='100%' height='80'  >
<center><font size='+5' color='white'><b>$author[name]</b></font></center>
</td>
</tr>
</table>
</a>

";

if ($author[id] == $_GET[cat]) {
$aths = mysql_query("select * from menu WHERE cat=$author[id];");
if($aths)
{ 
while($authors = mysql_fetch_array($aths))
echo"

<table id='ugolkrug' width='100%' border='0' bgcolor='white' bordercolor='red'>
<tr> 
<td width='10%' height='80'>
</td>
<td width='20%' height='80'>
<img src='img/edit.png'>
</td>
<td width='50%'>
<font color='blue' size='+3'>$authors[name]</font>
</td>
<td width='20%'>
<font color='black' size='+4'><b>$authors[price] тг.</b><font>
</td>
</tr>
</table>
<br>
";
}
}

echo"
<br>

";
}

}




$ath = mysql_query("select * from cat_menu WHERE id=$_GET[cat];");
if($ath)
{ 
while($author = mysql_fetch_array($ath))


if (($author[id] <>'') AND ($_GET[cat]<>'')) {
echo"
<a href='?cat='><img src='img/back.png' width='20%'></a>
<div>
<a href='?cat=$author[id]' >
<table id='ugolkrug' width='100%' border='0' bgcolor='white' bordercolor='red'>
<tr> 
<td width='100%' height='80'>
<center><font size='+5'><b>$author[name]</b></font></center>
</td>
</tr>
</table>
</a>

";

if ($author[id] == $_GET[cat]) {
$aths = mysql_query("select * from menu WHERE cat=$author[id];");
if($aths)
{ 
while($authors = mysql_fetch_array($aths))
echo"

<table  width='100%' border='0' >
<tr> 
<td width='10%' height='80'>
</td>
<td width='10%' height='80'>
<script type='text/javascript' language='javascript' src='lytebox.js'></script> 
<link rel='stylesheet' href='lytebox.css' type='text/css' media='screen' /><a href='img/coc.png' rel='lytebox' title='$author[text]'><img alt='' src='img/coc.png' align='center'  width='100%' border='0'></a>
</td>
<td width='50%'>
<font color='white' size='+4'><b>$authors[name]</b><font>
<br>
<font color='white' size='+3'>тут описание,тут описание,тут описание,тут описание.</font>
</td>
<td width='20%'>
<font color='white' size='+4'><b>$authors[price]</b><font><br><br>
</td>
</tr>
</table>
<br>

";
}
}

echo"
<br>

";
}

}




?>
