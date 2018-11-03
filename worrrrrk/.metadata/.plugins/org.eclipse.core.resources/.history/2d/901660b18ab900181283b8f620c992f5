<?php
include("dbconn.php");
$sql = "select * from guestbook";
$rs = mysql_query($sql);
if( $rs == false) {
    echo mysql_error();
}
while ($row = mysql_fetch_array($rs)) {
    echo "$row[name] , $row[content]<br>";
}
?>