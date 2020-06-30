<?php
// 1 = Deleted
// 2 = Null
// 3 = Wrong password
// 0 = True
session_start();
$account = $_REQUEST["account"];
$password = $_REQUEST["password"];
include("../config.php");
if (!$con) {
    die('数据库连接失败' . mysqli_error($con));
}
$dbaccount = null;
$dbpassword = null;
$dbcom = null;
$dbisdelete = null;
$result = mysqli_query($con, "select * from user where account ='{$account }';");
while ($row = mysqli_fetch_array($result)) {
    $dbaccount = $row["account"];
    $dbpassword = $row["password"];
    $dbcom = $row["com"];
    $dbisdelete = $row["isdelete"];
}
if (is_null($dbaccount)) {
    echo 2;
} else if ($dbisdelete == 1) {
    echo 1;
} elseif ($dbpassword != $password) {
    echo 3;
} else {
    $_SESSION["account"] = $dbaccount;
    $_SESSION["com"] = $dbcom;
    $_SESSION["isdelete"] = $dbisdelete;
    $_SESSION["code"] = mt_rand(0, 100000);
    mysqli_query($con, "update user set lastlogin=now() where account='{$account}'") or die ("存入数据库失败" . mysqli_error($con));
}
mysqli_close($con);