<?php
$count = file("count.txt");
$count = chop($count[0]);
$ip = "";

if (!$ip) {
    $count++;
    $fp = fopen("count.txt", "w");
    fwrite($fp, "$count");
    fclose($fp);
    setcookie("ip", $_SERVER["REMOTE_ADDR"]);
}
echo ($count);
?>