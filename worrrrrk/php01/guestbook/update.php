<?php
include("dbconn.php");
$idx = $_POST["idx"];
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];
$name = str_replace("'","''", $name);
$email = str_replace("'","''", $email);
$content = str_replace("'","''", $content);
$sql = "
update guestbook
set name='$name', email='$email', content='$content' where idx=$idx";
//echo $sql;
mysql_query($sql);
?>

<script>
location.href="list.php";
</script>