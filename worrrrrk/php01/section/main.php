<?php
session_start();
if(!isset($_SESSION["userid"]) || !isset($_SESSION["name"])){
    echo "<meta http-equiv='refresh'
            content='0;url=login.html'";
    
    exit;
}
$userid = $_SESSION["userid"];
$name = $_SESSION["name"];
?>
<p> 안녕하세요. <?php echo"$name($userid)님"; ?></p>
<p><a href="logout.php">로그아웃</a>
