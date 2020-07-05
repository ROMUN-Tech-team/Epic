<?php
/**
 *
 * User: Musda
 * Date: 2020/7/4 0004
 * Email: <musdatech@gmail.com>
 *
 */

session_start();

include("../config.php");

if (!$con) {
    echo 2;
    return false;
}

$account = $_SESSION["account"];

$article = $_REQUEST["article"];


$result2 = mysqli_query($con, "UPDATE cache SET article = '{$article}' WHERE asterid = '{$account}'");

echo 1;

mysqli_close($con);