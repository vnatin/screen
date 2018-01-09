<center><b>Настройки</b></center>
<br>
<a href='?st=settings&sp=users' class='button10'>Пользователи</a> 
<a href='?st=settings&sp=prava' class='button10'>Права</a> 
<a href='?st=settings&sp=type_pay' class='button10'>Типы оплат</a> 
<a href='?st=settings&sp=printers' class='button10'>Принтеры</a> 
<a href='?st=settings&sp=printers_driver' class='button10'>Драйвера</a> 
<a href='?st=settings&sp=nastroiki' class='button10'>Основные</a> 

<br><br>

<?php
if ($_GET[sp] == 'users') {include"users.php";}
if ($_GET[sp] == 'type_pay') {include"type_pay.php";}
if ($_GET[sp] == 'printers') {include"printers.php";}
if ($_GET[sp] == 'printers_driver') {include"printers_driver.php";}
if ($_GET[sp] == 'prava') {include"prava.php";}
if ($_GET[sp] == 'nastroiki') {include"nastroiki.php";}
?>
