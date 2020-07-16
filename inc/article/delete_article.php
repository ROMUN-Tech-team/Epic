<?php
/**
 *
 * User: Musda
 * Date: 2020/7/5 0005
 * Email: <musdatech@gmail.com>
 *
 */

session_start();

include "../account/verify.php";

$id = $_REQUEST["id"];

include("../config.php");

mysqli_query($con, "DELETE FROM article WHERE id = {$id}");

echo <<<EOF

<script type="text/javascript">
        alert("您没有此权限");
        window.location.href = "/my_article.php";
    </script>

EOF;
