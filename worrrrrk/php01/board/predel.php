<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="board.css">
</head>
<body 
<form action="delete.php?id=<?=$_GET["id"]?>" method="post">
<table width="300" border="1">
	<tr>
		<td>비밀번호 확인</td>
	</tr>
	<tr>
		<td>
		<b>비밀번호 :</b>
		<input type="password" name="pass" size="8">
		<input type="submit" value="확인">
		<input type="button" value="취소"
			onclick="history.back(-1)">
			</td>
		</tr>
</table>
<form>
</form>
</body>
</html>