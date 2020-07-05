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


$stmt = mysqli_prepare($con, "UPDATE cache SET article = ? where asterid = '{$account}'");
$stmt->bind_param('s', $article);
$stmt->execute();


echo 1;

mysqli_close($con);