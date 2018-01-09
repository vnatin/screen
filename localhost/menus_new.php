<center>Справочник меню - редактирование картинки</center>
<br>
<?php





if ($_GET[action] == 'new') {

 $uploaddir = 'img_menu/'; // Relative path under webroot
 $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$fil = basename($_FILES['userfile']['name']);

 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

   echo "File is valid, and was successfully uploaded.\n";

$ath = mysql_query("UPDATE `menu` SET img='$fil' WHERE id='$_GET[id]';");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>$fil</center>";
}



 } else {
   echo "File uploading failed.\n";
 }




}


if ($_GET[actions] == 'delete') {
$ath = mysql_query("UPDATE `menu` SET img='$_FILES[filename]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

if ($_GET[actions] == 'update') {
$ath = mysql_query("UPDATE `menu` SET name='$_POST[names]',cat='$_POST[cat_tables]',price='$_POST[price]',printer='$_POST[printer]',comment='$_POST[comment]' WHERE id='$_GET[id]'; ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"<center>Обновлено!</center>";
}
}

?>

<br>

<?php
include"conf.php";

$ath = mysql_query("select * from menu WHERE id=$_GET[id];");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
echo"
<center>
<font size='+2'><b>$author[name]</b></font>
<table width='80%' border='0' id='ugolkrug' bgcolor='gray'>
<tr>
<td width='40%'>
<img src='img_menu/$author[img]' width='100%'>
</td>
<td width='40%'>
<center><b></b></center>
</td>
<td width='20%'>
<center>

Размер изображения не превышает 512 Кб, пиксели по ширине не более 500, по высоте не более 1500. 
<form name='upload' action='?st=spravoch&sp=menu_new&id=$_GET[id]&action=new' method='POST' ENCTYPE='multipart/form-data'> 
Выберите файл для загрузки: 
<input type='file' name='userfile'>
<input type='submit' name='upload' value='Загрузить'> 
</form>
</center>

</td>
</tr>
</table>

</center>
";
}




?>