<?php
if(!isset($_POST["userid"]) || !isset($_POST["passwd"]))
    exit;
$userid = $_POST["userid"];
$passwd = $_POST["passwd"];
$members =
array("kim"=>array("passwd"=> "1234","name"=>"김철수"),
    "park"=>array("passwd"=> "1234","name"=>"박철수"),
    "hong"=>array("passwd"=> "1234","name"=>"홍철수"));
            
    if(!isset($members[$userid])){
    echo 
    "<script>
    alert('아이디 또는 비밀번호가 잘못되었습니다.');
    history.back();
    </script>";
    exit;
}   

if($members[$userid]["passwd"] != $passwd ){
    echo
    "<script>
    alert('아이디 또는 비밀번호가 잘못되었습니다.');
    history.back();
    </script>";
    exit;
}   

setcookie("userid", $userid, time()+(86400*30));
setcookie("name",$members[$userid]["name"]
    , time()+(86400*30));
?>

<meta http-equiv = "refresh" content="0;url=main.php">