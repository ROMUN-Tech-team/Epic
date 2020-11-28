<?php
/**
 *
 * User: Musda
 * Date: 2020/7/4 0004
 * Email: <musdatech@gmail.com>
 *
 */

session_start();

$account = $_SESSION["account"];

include("../config.php");

if (!$con) {
    die('数据库连接失败' . mysqli_error($con));
}

$result = mysqli_query($con, "select * from cache where account = '{$account}'");
while ($row = mysqli_fetch_array($result)) {
    $cache = $row["article"];
}

echo <<<EOF

$cache

EOF;


mysqli_close($con);
