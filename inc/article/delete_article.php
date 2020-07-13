<?php
/**
 *
 * User: Musda
 * Date: 2020/7/5 0005
 * Email: <musdatech@gmail.com>
 *
 */

session_start();

$id = $_REQUEST["id"];

include("../config.php");

mysqli_query($con, "DELETE FROM article WHERE id = {$id}");

echo 1;