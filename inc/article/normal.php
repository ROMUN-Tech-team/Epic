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


$result = mysqli_query($con, "select * from article order by count DESC LIMIT 10;");


?>



<section>
    <header class="major">
        <h2>News List</h2>
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

            if ($dblang == "CN") {
                $dblang = "Chinese";
            } elseif ($dblang == "EN") {
                $dblang = "English";
            };

            echo <<<EOF

        <article>
            <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
            <h3>{$dbtitle}</h3>
            <p>{$dbsummary}</p>
            <p>Language：{$dblang}</p>
            <ul class="actions">
                <li><a href="news/{$dbid}" class="button">More</a></li>
            </ul>
        </article>

EOF;

        }
        ?>
    </div>
</section>