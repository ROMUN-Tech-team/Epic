<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
<?php
require_once("template/header.php");

session_start();
include("inc/config.php");
$id = $_REQUEST["id"];


$result = mysqli_query($con, "select * from article WHERE id = '{$id}';");
mysqli_query($con, "UPDATE article SET count = count + 1 WHERE id = '{$id}';");


while ($row = mysqli_fetch_array($result)) {
    $dbcount = $row["count"];
    $dbtitle = $row["title"];
    $dbsubtitle = $row["subtitle"];
    $dbsummary = $row["summary"];
    $dbarticle = $row["article"];
    $dblang = $row["lang"];

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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->


            <section>
                <header class="main">
                    <h1><?php echo $dbtitle ?></h1>
                    <p>阅读量：<?php echo $dbcount ?></p>
                </header>

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