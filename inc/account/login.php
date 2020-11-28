<?php
session_start();

include "../config.php";

$account = $_REQUEST["account"];
$password = $_REQUEST["password"];
$ip = $_SERVER["HTTP_X_REAL_IP"];


mysqli_query($con, "set names 'utf8'");

$stmt = mysqli_prepare($con, "select * from user where account = ?");
$stmt->bind_param('s', $account);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();


while ($row=mysqli_fetch_array($result)) {
    $db_account = $row["account"];
    $db_password = $row["password"];
    $db_is_delete = $row["is_delete"];
}


if ($db_account == ""){
    echo 1;
}elseif ($db_is_delete == "1"){
    echo 2;
}elseif ($db_password != $password){
    echo 3;
}else{
    $_SESSION["account"] = $db_account;
    $_SESSION["code"]=mt_rand(0, 1000000);
    mysqli_query($con,"UPDATE user SET ip = '{$ip}' WHERE account = '{$db_account}'") or die ("存入数据库失败" . mysqli_error($con));
    echo 0;
}

mysqli_close($con);
