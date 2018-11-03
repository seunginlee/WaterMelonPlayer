<?php
include("/var/www/html/include/dbconn.php");
if(!isset($_POST["userid"]) || !isset($_POST["passwd"]))
    exit;
    $userid = $_POST["userid"];
    $passwd = $_POST["passwd"];
    
    $sql ="select * form member
    where userid='$userid' and pwd='$passwd'";
    $rs = mysql_query($sql);
    if($row = mysql_fetch_array($rs)) {
       session_start();
       $_SESSION["userid"] = $userid;
       $_SESSION["name"] = $row ["name"];
        
    }else {
        "
      <script>
        alert('아이디 또는 비밀번호가 잘못되었습니다.');
        history.back();
      </script>
    ";
        exit;
    }
    
    ?>

<meta http-equiv = "refresh" content="0;url=main.php">