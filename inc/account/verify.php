<?php
session_start();

if (!isset($_SESSION["code"])) {
    ?>

    <script type="text/javascript">
        alert("您没有此权限");
        window.location.href = "/login.php";
    </script>


    <?php
}
?>