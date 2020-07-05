<!--
/**
 *
 * User: Musda
 * Date: 2020/7/5 0005
 * Email: <musdatech@gmail.com>
 *
 */
-->
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="zh">
<head>
    <title>主页 - <?php require_once("template/title.php");
        session_start();
        ?></title>
    <meta charset="utf-8"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Epic媒体中心">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="apple-touch-icon-precomposed" href="icon.png"/>
    <link rel="icon" type="image/png" href="icon.png"/>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <?php require_once("template/header.php"); ?>

            <br><br>


            <h3>我发布的文章</h3>

            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>标题</th>
                        <th>访问量</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    session_start();

                    $com = $_SESSION["com"];

                    include("inc/config.php");

                    $result = mysqli_query($con, "select * from article where com ='{$com}';");
                    while ($row = mysqli_fetch_array($result)) {
                        $dbid = $row["id"];
                        $dbtitle = $row["title"];
                        $dbcount = $row["count"];

                        echo <<<EOF
                        
                        <tr>
                        <td>$dbid</td>
                        <td><a href="article.php?id=$dbid">$dbtitle</a></td>
                        <td>$dbcount</td>
                        <td></td>
                        
</tr>

EOF;


                    }

                    ?>
                    </tbody>
                </table>
            </div>

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