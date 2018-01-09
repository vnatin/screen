<center><b>Отчеты</b></center>
<br>
<a href='?st=otchet&sp=sale' class='button10'>По продажам</a>  
<a href='?st=otchet&sp=sale_menu' class='button10'>По блюдам</a>  
<?php
if ($_GET[sp] == 'sale') {include"sale.php";}
if ($_GET[sp] == 'sale_menu') {include"sale_menu.php";}
?>
<br><br>