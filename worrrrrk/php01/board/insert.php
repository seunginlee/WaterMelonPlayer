<?php
include("/var/www/html/include/dbconn.php");
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$title = $_POST["title"];
$content = $_POST["content"];
$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];

$query = "insert into board
 (name,email,pass,title,content,wdate,ip) values
( '$name', '$email', '$pass', '$title', '$content', now(), '$REMOTE_ADDR' )";
$reuslt
= mysql_query($query, $conn) or die(mysql_error());
mysql_close($conn);

?>

<meta http-equiv="refresh" content="0;url=list.php">