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


$result1 = mysqli_query($con, "select * from user where account ='{$account}';");

while ($row = mysqli_fetch_array($result1)) {
    $dbaccount = $row["account"];
    $dbcom = $row["com"];
}


$result2 = mysqli_query($con, "insert into article (title, subtitle, summary, article, com, lang) values('{$title}', '{$subtitle}', '{$summary}', '{$article}', '{$dbcom}', '{$lang}');");

echo 2;


mysqli_close($con);