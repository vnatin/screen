<?php
$error_level = error_reporting(0);
$sait='http://localhost/';

$dblocation = "localhost"; // Имя сервера
    $dbuser = "root";          // Имя пользователя
    $dbpasswd = "";            // Пароль
    $dbname = "screen";    //Имя базы
    $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
    if (!$dbcnx) 
{
  echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому 
            корректное отображение невозможно.</P>" );
  exit();
}

mysql_query("SET NAMES 'utf8'");

if (!@mysql_select_db($dbname, $dbcnx)) 
{
  echo( "<P>В настоящий момент база данных не доступна, поэтому
            корректное отображение невозможно.</P>" );
  exit();
}

$ath = mysql_query("select * from settings where name='programm_version';");
if($ath)
{ 
while($author = mysql_fetch_array($ath))
$version = $author[value];
}

$athe = mysql_query("select * from settings where name='oragnization';");
if($athe)
{ 
while($authore = mysql_fetch_array($athe))
$company = $authore[value];
}

?>