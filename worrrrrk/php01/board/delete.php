<?php
include ("/var/www/html/include/dbconn.php");
$id = $_GET["id"];
$pass = $_POST["pass"];
$result = mysql_query("select pass from board
    where id=$id", $conn);
$row = mysql_fetch_array($result);
if( $pass == $row["pass"]){
    $query = "delete from board where id=$id";
    mysql_query($query, $conn);
    mysql_close();
}else{
    
    echo("<script>
        alert('비밀번호가 일치하지 않습니다');
        history.back(-1);
        </script>");
    exit;
}
?>
<meta http-equiv="refresh" content="0;url=list.php">