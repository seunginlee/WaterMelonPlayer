<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form method="post">
<input name="info">
<input type="submit" value="보내기">
</form>
<?php 
if(isset($_POST["info"])){
echo "info: ". $_POST["info"];
}
?>
</body>
</html>
