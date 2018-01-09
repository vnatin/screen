<?php
include"conf.php";
?>
<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>
<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


</head>

<div class="fon_scroll">
<center>

<br>
<br>
<img src='img/logo.png' width='80%'>

<?php
include"style_menu.css";


$ath = mysql_query("select * from printers ORDER BY comment ASC;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[comment] <> '') {

echo"
<div>
<a href='test_menu2.php?uid=$author[name]' >
<table  width='100%' border='0'>
<tr> 
<td width='100%' height='80'  >
<center><font size='+5' color='white'><b>$author[comment]</b></font></center>
</td>
</tr>
</table>
</a>

";

}
}


?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<MARQUEE BEHAVIOR="ALTERNATE" SCROLLAMOUNT="2" SCROLLDELAY="10"><font color='yellow'>Программа разработана "Ритм Города" для <?php echo"$company"; ?>. тел: +7 (727) 327 90 03</font></MARQUEE> 
</div>
