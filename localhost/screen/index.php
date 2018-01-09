<?php 
include"../style.css"; 
include"../conf.php"; 
?>
<html>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="" />
<meta name="keywords" content=""/>
<title>SCREEN ADMIN v <?php echo"$version"; ?></title>


<head>

</head>

<body>
<center>

<?php

$ath = mysql_query("select * from users;");
if($ath)
{ 
while($author = mysql_fetch_array($ath))

echo"
<a href='' class='button10'>
<font color='white' >$author[name]</font>
</a>
";
}

?>



</body>


</html>

