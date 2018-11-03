<?php
include ("dbconn.php");
$idx = $_POST["idx"];
$sql = "delete from guestbook where idx=$idx";
mysql_query($sql);
?>
<script>
location.href="list.php";
</script>