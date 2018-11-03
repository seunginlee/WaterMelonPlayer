<?php
include("/var/www/html/include/dbconn.php");
$id = $_GET["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$title = $_POST["title"];
$content = $_POST["content"];
$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];

$query = "select pass from board where id=$id";
$result= mysql_query($query);
$row = mysql_fetch_array($result);
if($pass == $row["pass"]){
    
}else{
    echo("<script>
        alert('비밀번호가 일치하지 않습니다');
        history.back(-1);
        </script>    
");
    
}
$query = "update board
set name='$name', email='$email', title='$title', content='$content', where id=$id";
$reuslt
= mysql_query($query, $conn) or die(mysql_error());
mysql_close($conn);

?>

<meta http-equiv="refresh" content="0;url=read.php?id=<?=$id?>">