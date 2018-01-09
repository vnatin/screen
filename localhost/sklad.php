<center><b>Cклад</b></center>
<br>
<a href='?st=sklad&sp=ostatki' class='button10'>Остатки</a>  
<a href='?st=sklad&sp=prihod' class='button10'>Приход</a> 
<a href='?st=sklad&sp=rashod' class='button10'>Списание</a> 
<a href='?st=sklad&sp=calculation' class='button10'>Списание сменами</a>     
<br><br>

<?php
if ($_GET[sp] == 'ostatki') {include"ostatki.php";}
if ($_GET[sp] == 'prihod') {include"prihod.php";}
if ($_GET[sp] == 'prihod_edit') {include"prihod_edit.php";}
if ($_GET[sp] == 'prihod_view') {include"prihod_view.php";}
if ($_GET[sp] == 'prihod_new') {include"prihod_new.php";}
if ($_GET[sp] == 'rashod') {include"rashod.php";}
if ($_GET[sp] == 'rashod_new') {include"rashod_new.php";}
if ($_GET[sp] == 'rashod_view') {include"rashod_view.php";}
if ($_GET[sp] == 'rashod_edit') {include"rashod_edit.php";}
if ($_GET[sp] == 'calculation') {include"calculation.php";}
if ($_GET[sp] == 'calculation_view') {include"calculation_view.php";}
if ($_GET[sp] == 'calculation_edit') {include"calculation_edit.php";}
?>