<?php
include"conf.php";
?>
<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>
<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


<head>

<center>
<div class="fon_scroll">
&larr;

<?php
include"style_menu.css";


if ($_GET[cat]=='') {
echo"
<a href='test_menu.php'><img src='img/left.png' width='20%'></a>
<br>
";
}





$ath = mysql_query("select * from cat_menu WHERE cat='$_GET[uid]' ORDER BY id_sort ASC ;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))


if (($author[id] <>'') AND ($_GET[cat]=='')) {
echo"
<div>
<a href='?cat=$author[id]&uid=$_GET[uid]' >
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




$ath = mysql_query("select * from cat_menu WHERE id=$_GET[cat] ORDER BY id_sort ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))


if (($author[id] <>'') AND ($_GET[cat]<>'')) {
echo"
<a href='#' onclick='history.back();return false;'><img src='img/left.png' alt='Картинка'/></a>

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
$aths = mysql_query("select * from menu WHERE cat=$author[id] ORDER BY name ASC;");
if($aths)
{ 
while($authors = mysql_fetch_array($aths))

if ($authors[id] <> '') {
echo"
<table  width='100%' border='0' >
<tr> 
<td width='20%' height='80'>
<script type='text/javascript' language='javascript' src='lytebox.js'></script>
";

if ($authors[img] <> '') { 
echo"
<link rel='stylesheet' href='lytebox.css' type='text/css' media='screen' /><a href='/img_menu/$authors[img]' rel='lytebox' title='$author[text]'><img alt='' src='/img_menu/$authors[img]' align='center'  width='100%' border='0'></a>
";
}
echo"
</td>
<td width='50%'>
<font color='white' size='+2'><b>$authors[name]</b><font>
<br>
<font color='white' size='+1'>$authors[comment]</font>
</td>
<td width='20%'>
<font color='white' size='+2'><b>$authors[price]</b><font><br><br>
</td>
</tr>
</table>
<br>
";
}

}


}

echo"
<br>

";
}

}

echo"<br><font color='white' size='+1'>Все цены указаны в национальной валюте РК</font><br><br>";
echo"<br><font color='white' size='+2'>Обслуживание 10%</font><br><br>";

?>
<?php 

echo"
<MARQUEE BEHAVIOR='ALTERNATE' SCROLLAMOUNT='2' SCROLLDELAY='10'><font color='yellow'>Программа разработана ''Ритм Города'' для $company . тел: +7 (727) 327 90 03</font></MARQUEE> 
";
?>

</div>