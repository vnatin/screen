<?php
include"conf.php";

$ath = mysql_query("SELECT * FROM users WHERE name='$_POST[login]' ");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

if ($author[id] <> '') {


if (($author[pass] == $_POST[pass]) AND ($author[prava] == 'admin')) {
session_start();
$_SESSION['user'] = $author[name];
echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=/index2.php'>";
}

if (($author[pass] == $_POST[pass]) AND ($author[prava] <> 'admin')) {
echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=/index.php?err=1'>";
}

if ($author[pass] <> $_POST[pass]) {
echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=/index.php?err=1'>";
}


}

}

?>