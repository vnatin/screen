<?php 
include"style.css"; include"conf.php"; 

session_start();

?>
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


<br>
<br>
<br>



<?php

if ( $_SESSION['user'] == '') {

echo"
<table id='ugolkrug' border='0' cellspacing='0' cellpadding='0' align='center' width='30%' height='40%'>


<tr>
<td width=100%' bgcolor='gray'>

<center>

<form method='post' action='auth.php'> 
$_SESSION[user]
";

if ($_GET[err] == 1) {
echo"<font color='red'>Данные введены неверно</font><br>";
}

echo"
<br>
<font size='+2'><b>Авторизация</b></font>
<br>
<br>
<b>Логин</b>
<br>
<input type='text' name='login' size='20' maxlength='50' value='' id='ugolkrug'>
<br>
<b>Пароль</b>
<br>
<input type='password' name='pass' size='20' maxlength='50' id='ugolkrug'>
<br>
<br>
<input type='submit' value='Отправить' id='ugolkrug'>
</form>
</td>

</tr>


</table>
";

}

if ( $_SESSION['user'] <> '') {
echo"<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=http://localhost/index2.php'>";
}
?>



</body>


</html>

