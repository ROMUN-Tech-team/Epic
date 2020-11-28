<?php

session_start();

include("../config.php");

if (!$con) {
    echo 3;
    return false;
}

$account = $_SESSION["account"];

$title = $_REQUEST["title"];
$subtitle = $_REQUEST["subtitle"];
$summary = $_REQUEST["summary"];
$article = $_REQUEST["article"];
$lang = $_REQUEST["lang"];
$cover = $_REQUEST["cover"];


$result1 = mysqli_query($con, "select * from user where account ='{$account}';");

while ($row = mysqli_fetch_array($result1)) {
    $db_account = $row["account"];
}


$result2 = mysqli_query($con, "insert into article (title, subtitle, summary, article, account, lang, cover, count, date) values('{$title}', '{$subtitle}', '{$summary}', '{$article}', '{$db_account}', '{$lang}', '{$cover}', '0', now());");
mysqli_query($con, "UPDATE cache SET article = '' WHERE account = '{$account}'");

echo 2;


mysqli_close($con);