<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="board.css">
</head>
<body>
<?php
include("/var/www/html/include/dbconn.php");
$id = $_GET["id"];
if( isset($_GET["no"])) {
    $no = $_GET["no"];
}
mysql_query(
    "update board set view=view+1 where id=$id", $conn);
$result = mysql_query("select * from board
    where id=$id", $conn);
$row = mysql_fetch_array($result);
?>
<?//php echo $row["title"];?>
<?//=$row["title"]?>
<table width="580" border="1">
	<tr>
		<td colspan="4" align="center"> 
		<b><?=$row["title"]?></b>
		</td>
	</tr>
	<tr>
	<td align="center">글쓴이</td>
	<td><?=$row["name"]?></td>
	<td align="center">이메일</td>
	<td><?=$row["email"]?></td>
	</tr>
 	<tr>
	<td align="center">날짜</td>
	<td><?=$row["wdate"]?></td>
	<td align="center">조회수</td>
	<td><?=$row["view"]?></td>
	</tr>
	<tr>
		<td colspan="4">
		<pre><?=$row["content"]?></pre>
		</td>
	</tr>
	<tr>
		<td colspan="4">
		<table width="100%">
		<tr> 
			<td>
			<a href="list.php">[목록보기]</a>
			<a href="write.php">[글쓰기]</a>
			<a href="edit.php?id<?=$id?>">[수정]</a>
			<a href="predel.php?id<?=$id?>">[삭제]</a>
			</td>
			<td align="right">
<?php 
$query = mysql_query("select id from board
        where id > $id limit 1", $conn);
$prev_id = mysql_fetch_array($query);
if($prev_id["id"]){
    echo "<a href='read.php?id=$prev_id[id]'>[이전]</a>";
}else{
    echo "[이전]";
}
    
$query = mysql_query("select id from board
        where id < $id order by id desc limit 1", $conn);
$next_id = mysql_fetch_array($query);
if($next_id["id"]){
    echo "<a href='read.php?id=$next_id[id]'>[다음]</a>";
}else{
    echo "[다음]";
}

    ?>
			</td>
		</tr>
		</table>
		</td>
	</tr>
	
</table>
</body>
</html>