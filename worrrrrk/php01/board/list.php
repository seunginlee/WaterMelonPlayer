<?php
include ("/var/www/html/include/dbconn.php");

$page_size=10;
$page_list_size=10;

$no="";
if( isset($_GET["no"])){
    $no = $_GET["no"];
}
if(!$no || $no < 0) $no = 0;
$query = "select * from board
    order by id desc limit $no,$page_size";
$result = mysql_query($query, $conn);
$result_count = mysql_query("select count(*) from board"
    , $conn);
$result_row = mysql_fetch_array($result_count);
$total_row = $result_row[0];
if ($total_row <= 0) $total_row =0;
$total_page = ceil($total_row / $page_size);
$current_page = ceil(($no+1)/$page_size);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="board.css">
</head>
<body>
	<br>
	<h2>게시판</h2>
	<br>
	<br>
	<table width="580" border="1">
		<tr height="20" align="center">
		<td width="30">번호</td>
		<td width="370">제목</td>
		<td width="50">글쓴이</td>
		<td width="60">날짜</td>
		<td width="40">조회수</td>
		</tr>
<? 
while ($row = mysql_fetch_array ($result)){
?>
<tr>
	<td height="20" align="center"><?=$row["id"]?>
	<td height="20">&nbsp;
<a href="read.php?id=<?=$row["id"]?>&no=<?=$no?>">
<?=strip_tags($row["title"],'<b><i>');?></a>
		</td>
		<td alin="center" height="20">
		<a href="mailto:<?=$row["email"]?>"><?=$row["name"]?></a>
		</td>
		<td align="center" height="20">
		<?=$row["wdate"]?></td>
		<td align="center" height="20"><?=$row["view"]?></td>
		</tr>
<?
}
mysql_close ('$conn');
?>		
	</table>
	<table border="0">
	<tr>
	<td width="600" height="20" align="center" rowspan="4">
	&nbsp;
<?
$start_page = 
floor (($current_page -1)/ $page_list_size)
       * $page_list_size + 1;
$end_page = $start_page + $page_list_size -1;
if("$total_page < $end_page")
    $end_page = $total_page;
    if ($start_page >= $page_list_size){
    echo "start_page : $start_page<br>";
    $prew_list = ($start_page -2) * $page_size;
    echo "<a href=\"$_SERVER[PHP_SELF]?no=$prev_list\">◀</a>\n";
    }
    for($i = $start_page; $i <= $end_page; $i ++){
        $page = ($i - 1) * $page_size;
        if ($no != $page){
            echo "<a href=\"$_SERVER[PHP_SELF]?no=$page\">";
        }
        echo " $i ";
        if ($no != $page){
            echo "</a>";
        }  
    }
    if ($total_page > $end_page){
        $next_list = $end_page * $page_size;
        echo "<a href=$_SERVER[PHP_SELF]?no=$next_list>▶</a>\n";
    }
?>
</td>
		</tr>	
	</table>
	<a href="write.php">글쓰기</a>
</body>
</html>