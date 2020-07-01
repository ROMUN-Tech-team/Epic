<?php
session_start();

if (!isset($_SESSION["code"])) {
    ?>

    <script type="text/javascript">
        alert("You didn't login!");
        window.location.href = "login.php";
    </script>


    <?php
}
?>