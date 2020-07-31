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

public function PostAction($url , $data=array()){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        // POST数据

        curl_setopt($ch, CURLOPT_POST, 1);

        // 把post的变量加上

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;

    }

$result = PostAction("https://aster.romun.cn/inc/api/");

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
