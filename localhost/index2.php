<?php include"style.css"; include"conf.php"; ?>
<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>
<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


<head>

<script language="JavaScript"> 
<!--
 
pr = document.getElementById('printer').innerHTML; 
window.open('ostatki.php','','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0');
 
//-->
</script>

<script language="JavaScript"> 
<!--
 
pr = document.getElementById('phihod').innerHTML; 
window.open('prihod_print.php','','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0');
 
//-->
</script>

</head>

<body>


<table  border="0" cellspacing="0" cellpadding="0" align="center" width='100%' height='100%'>

<tr>

<td width=25%'  >



<table  border="0" cellspacing="0" cellpadding="0" align="center" width='100%' height='10%'>

<tr>


<td width=50%'>

 
<p class='top3'>
<font color='deepskyblue' size='+2'>

Программа для баров и ресторанов</font><br><font color='darkskyblue' size='+3'>

SCREEN v <?php echo"$version"; ?></font></p>
        
</td>
</td>
<td width='10%'>


</td>
<td width='20%'>


<br><br>
<img src='img/logo2.png' style=" width: 50%;   border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px;">
<br>
<br>
<br>

</td>
</tr>


</table>




<center>


<table  border="0" cellspacing="0" cellpadding="0" align="center" width='100%' height='10%'>


<tr>


<td width=100%'>

<center>

<?php include"menu.php"; ?>

</center>

</td>

</tr>


</table>

</center>



<table  border="0" cellspacing="0" cellpadding="0" align="center" width='100%' height='70%'>


<tr>
<td width=100%'>

<center>

<?php 

if ($_GET[st] == '') {include"gl.php";} 
if ($_GET[st] == 'sklad') {include"sklad.php";} 
if ($_GET[st] == 'spravoch') {include"spravoch.php";} 
if ($_GET[st] == 'settings') {include"settings.php";} 
if ($_GET[st] == 'admin') {include"admin.php";} 
if ($_GET[st] == 'otchet') {include"otchet.php";} 

?>
</center>

</td>

</tr>


</table>



</td>


</tr>


</table>



</body>


</html>

