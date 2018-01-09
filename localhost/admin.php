<a href='?st=admin' class='button10'>Статистика</a> 
<a href='?st=admin&sp=update' class='button10'>Обновление</a> 
<a href='?st=admin&sp=print_error' class='button10'>Исправление печати</a> 
<br>
<table width='80%' bgcolor='gray' id='ugolkrug'>
<tr>
<td>
<center>
<?php
if ($_GET[sp] == 'update') {
include"update.php";
}

if ($_GET[sp] == 'print_error') {
$ath = mysql_query("UPDATE `print` SET `status`='yes' WHERE `status`='no';");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"OK";
}
echo"Печать исправлена перезагрузите компьютер!";
}


if ($_GET[sp] == '') {

echo "
Общая статистика базы
<br>
<br>
";
$ath = mysql_query("SELECT COUNT(*) FROM cat_menu ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$cat_menu = mysql_result($ath,0);
}
echo"Категорий меню: $cat_menu шт.";



echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$cat_menu%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$cat_menu
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM menu ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_menu = mysql_result($ath,0);
}

echo "Количество блюд: $kolvo_menu шт.";
$t_kolvo_menu = round($kolvo_menu/(1000/100));

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_menu%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_menu
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM cat_tables ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$cat_tables = mysql_result($ath,0);
}

echo "Категорий столов: $cat_tables шт.";

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$cat_tables%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$cat_tables
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM tables ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_tables = mysql_result($ath,0);
}

echo "Количество столов: $kolvo_tables шт.";

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$kolvo_tables%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$kolvo_tables
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM `change` ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$change = mysql_result($ath,0);
}

echo "Количество смен: $change шт.";
$t_change = round($change/20);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_change%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_change
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";
$ath = mysql_query("SELECT COUNT(*) FROM zakaz ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_zakaz = mysql_result($ath,0);
}

echo "Количество заказов: $kolvo_zakaz шт.";

$t_kolvo_zakaz = round($kolvo_zakaz/10000);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_zakaz%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_zakaz
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";


$ath = mysql_query("SELECT COUNT(*) FROM podzakaz ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_podzakaz = mysql_result($ath,0);
}

echo "Количество подзаказов: $kolvo_podzakaz шт.";
$t_kolvo_podzakaz= round($kolvo_podzakaz/10000);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_podzakaz%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_podzakaz
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM clients ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_clients = mysql_result($ath,0);
}

echo "Количество клиентов: $kolvo_clients шт.";

$t_kolvo_clients = round($kolvo_clients/1000);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_clients%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_clients
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM users ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_users = mysql_result($ath,0);
}

echo "Количество пользователей: $kolvo_users шт.";

$t_kolvo_users = round($kolvo_users/100);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_users%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_users
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM docs ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_docs = mysql_result($ath,0);
}

echo "Количество документов: $kolvo_docs шт.";

$t_kolvo_docs = round($kolvo_docs/1000);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_docs%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_docs
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM tovar ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_tovar = mysql_result($ath,0);
}

echo "Количество товара: $kolvo_tovar  шт.";

$t_kolvo_tovar = round($kolvo_tovar/10); 

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_tovar%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_tovar
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";

$ath = mysql_query("SELECT COUNT(*) FROM print ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$kolvo_check = mysql_result($ath,0);
}

echo "Количество чеков: $kolvo_check шт.";

$t_kolvo_check = round($kolvo_check/10000);

echo"
 <table width='30%'>
<tr>
<td width='5%'>
0%
</td>
<td  width='90%'>
 <table width='100%' id='ugolkrug'>
<tr>
<td>

<table width='$t_kolvo_check%' height='100%'>
<tr>
<td bgcolor='green'>
<center>
$t_kolvo_check
</td>
</tr>
</table>

</td>
</tr>
</table>
<td/>
<td width='5%'>
100%
</td>
</tr>
</table>
";
}
 
?>
</td>
</tr>
</table>