<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="zh">
<?php

session_start();
include("inc/config.php");
$id = $_REQUEST["id"];

if ($id == "") {
    echo <<<EOF

<script type="text/javascript">
        alert("未指定文章，请求参数错误，请返回主页");
        window.location.href = "/index.php";
</script>

EOF;

}


$result = mysqli_query($con, "select * from article WHERE id = '{$id}';");
mysqli_query($con, "UPDATE article SET count = count + 1 WHERE id = '{$id}';");


while ($row = mysqli_fetch_array($result)) {
    $dbcount = $row["count"];
    $dbtitle = $row["title"];
    $dbsubtitle = $row["subtitle"];
    $dbsummary = $row["summary"];
    $dbarticle = $row["article"];
    $dblang = $row["lang"];
    $dbcover = $row["cover"];

    if ($dblang == "CN") {
        $dblang = "中文";
    } elseif ($dblang == "EN") {
        $dblang = "English";
    };

}


?>
<head>
    <title><?php echo $dbtitle ?> - <?php require_once("template/title.php"); ?></title>
    <meta charset="utf-8"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Epic媒体中心">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <?php require_once("template/header.php"); ?>

            <section>
                <header class="main">
                    <h1><?php echo $dbtitle ?></h1>
                    <p>阅读量：<?php echo $dbcount ?></p>
                </header>

                <span class="image main"><img src="<?php echo $dbcover ?>" alt=""/></span>

                <?php echo $dbarticle ?>


        </div>
    </div>

    <!-- Sidebar -->
    <?php require_once("template/sidebar.php"); ?>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>