<?php
include("dbconn.php");
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];

$name = str_replace("'","''", $name);
$email = str_replace("'","''", $email);
$content = str_replace("'","''", $content);

$sql = "insert into guestbook
 (name,email,content,passwd,post_date) values
( '$name', '$email', '$content', '1234', now() )";
//echo $sql . "<br>";
    $result = mysql_query($sql);
if ($result === false){
    echo mysql_error();
}
?>
<script>
location.href="list.php";
</script>