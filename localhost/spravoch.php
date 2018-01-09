<center><b>Справочники</b></center>
<br>
<a href='?st=spravoch&sp=edizm' class='button10'>Ед. изм.</a>  
<a href='?st=spravoch&sp=tovar' class='button10'>Товар</a>  
<a href='?st=spravoch&sp=calc_cards' class='button10'>Кал. карты</a>
<a href='?st=spravoch&sp=zals' class='button10'>Залы</a> 
<a href='?st=spravoch&sp=tables' class='button10'>Столы</a>
<a href='?st=spravoch&sp=cat_menu' class='button10'>Кат. меню</a>  
<a href='?st=spravoch&sp=menu' class='button10'>Меню</a>  
<a href='?st=spravoch&sp=clients' class='button10'>Клиенты</a> 

<br><br>

<?php
if ($_GET[sp] == 'edizm') {include"edizm.php";}
if ($_GET[sp] == 'tovar') {include"tovar.php";}
if ($_GET[sp] == 'zals') {include"zals.php";}
if ($_GET[sp] == 'tables') {include"tables.php";}
if ($_GET[sp] == 'cat_menu') {include"cat_menu.php";}
if ($_GET[sp] == 'menu') {include"menus.php";}
if ($_GET[sp] == 'clients') {include"clients.php";}
if ($_GET[sp] == 'calc_cards') {include"calc_cards.php";}
if ($_GET[sp] == 'menu_edit') {include"menus_edit.php";}
if ($_GET[sp] == 'menu_new') {include"menus_new.php";}
?>