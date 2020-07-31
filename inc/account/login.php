<?php

// 1 = Deleted
// 2 = Null
// 3 = Wrong password
// 0 = True

session_start();

$asterid = $_REQUEST["asterid"];
$password = $_REQUEST["password"];
$ip = $_SERVER["HTTP_X_REAL_IP"];

$api_key = "87sbt78an8A7T8S878TA8t9763889ts87TE78D3";

function postAction($asterid, $password, $ip, $api_key)
{

    // 请求url
    $url = "https://aster.romun.cn/inc/api/api-login.php";
    // 参数数组
    $parameters = array(
        'asterid' => $asterid,
        'password' => $password,
        'ip' => $ip,
        'api-key' => $api_key
    );
    // 初始化
    $ch = curl_init();

    // 设置变量
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);

    // 执行
    $return = curl_exec($ch);

    // 关闭
    curl_close($ch);

    return $return;

}

if ($_SESSION[$ip] < 3) {

    $data = postAction($asterid, $password, $ip, $api_key);

    $data = json_decode($data);

    if ($data->status != "0") {
        ini_set('session.gc_maxlifetime', 300); //设置SESSION过期时间

        if (!isset($_SESSION['ok'])) {
            $_SESSION[$ip] = $_SESSION[$ip] + 1;//累积登录错误次数
        }

        $lifeTime = 1800;
        setcookie(session_name(), session_id(), time() + $lifeTime, "/");


        echo $data->status;
        exit;
    }

    include("../config.php");

    $result = mysqli_query($con, "select * from user where asterid = '{$asterid}'");

    while ($row = mysqli_fetch_array($result)) {
        $dbasterid = $row["asterid"];
    }


    if ($dbasterid == "") {
        $_SESSION["asterid"] = $data->asterid;
        $_SESSION["code"] = mt_rand(0, 1000000);
        $_SESSION['ok'] = 1;
        $_SESSION[$ip] = 0;
        echo 58;
    } else {
        $_SESSION["asterid"] = $data->asterid;
        $_SESSION["code"] = mt_rand(0, 1000000);
        $_SESSION['ok'] = 1;
        $_SESSION[$ip] = 0;
        echo 60;
    }

} else {
    echo 5;
}

mysqli_close($con);
