<?php

include("inc/config.php");

if (!$con) {
    die('数据库连接失败' . mysqli_connect_error());
}

$dbid = null;
$dbcount = null;
$dbtitle = null;
$dbsubtitle = null;
$dbsummary = null;
$dbarticle = null;
$dblang = null;


$result = mysqli_query($con, "select * from article order by count DESC LIMIT 1;");
while ($row = mysqli_fetch_array($result)) {
    $dbid = $row["id"];
    $dbcount = $row["count"];
    $dbtitle = $row["title"];
    $dbsubtitle = $row["subtitle"];
    $dbsummary = $row["summary"];
    $dbarticle = $row["article"];
    $dblang = $row["lang"];
}


?>


<section id="banner">
    <div class="content">
        <header>
            <h1><?php echo $dbtitle; ?></h1>
            <p><?php echo $dbsubtitle; ?></p>
        </header>
        <p><?php echo $dbsummary; ?></p>
        <p>稿件语言：<?php if ($dblang == "CN") {
                echo "中文";
            } elseif ($dblang == "EN") {
                echo "English";
            }; ?></p>
        <ul class="actions">
            <li><a href="news/<?php echo $dbid; ?>.html" class="button big">了解更多</a></li>
        </ul>
    </div>
    <span class="image object">
        <img src="images/pic10.jpg" alt=""/>
    </span>
</section>