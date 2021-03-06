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


$result = mysqli_query($con, "select * from article order by count desc;");


?>



<section>
    <header class="major">
        <h2>新闻列表</h2>
    </header>
    <div class="posts">
        <?php

        while ($row = mysqli_fetch_array($result)) {
            $dbid = $row["id"];
            $dbcount = $row["count"];
            $dbtitle = $row["title"];
            $dbsubtitle = $row["subtitle"];
            $dbsummary = $row["summary"];
            $dbarticle = $row["article"];
            $dblang = $row["lang"];
            $dbcover = $row["cover"];
            $dbdate = $row["date"];

            if ($dblang == "CN") {
                $dblang = "中文";
            } elseif ($dblang == "EN") {
                $dblang = "English";
            };

            echo <<<EOF

        <article>
            <a href="article.php?id={$dbid}" class="image"><img src="{$dbcover}" alt="" /></a>
            <h3>{$dbtitle}</h3>
            <p>{$dbsummary}</p>
            <p>语言：{$dblang}</p>
            <p>发稿时间：{$dbdate}</p>
            <ul class="actions">
                <li><a href="article.php?id={$dbid}" class="button">More</a></li>
            </ul>
        </article>

EOF;

        }
        ?>
    </div>
</section>