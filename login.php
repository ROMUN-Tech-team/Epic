<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="zh-CN">
<head>
    <title>登陆 - <?php require_once("template/title.php"); ?></title>
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
            <?php require_once("template/header.php"); ?>


            <br><br>

            <form id="login" method="post" action="#" onsubmit="return false">
                <div class="row gtr-uniform">
                    <div class="col-12 col-12-xsmall">
                        <input type="text" name="account" id="account" value="" placeholder="账户名"/>
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <input type="password" name="password" id="password" value="" placeholder="密码"/>
                    </div>

                    <p id="tip_text" style="color:red;"></p>
                    <!-- Break -->
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="登陆" class="primary" id="submit"/></li>
                            <li><input type="reset" value="重置"/></li>
                        </ul>
                    </div>
                </div>
            </form>


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

<script type="text/javascript">
    $("#submit").attr('value', '登陆');

    var tip = $('#tip_text');
    tip.text('');


    $("#submit").click(function () {


        $("#submit").val('登陆中');
        //向后台发送处理数据
        $.ajax({
            type: "POST", //用POST方式传输
            dataType: "text", //数据格式:JSON
            url: 'inc/account/login.php', //目标地址
            data: $('#login').serialize(),
            success: function (msg) {
                if (msg == 1) {

                    $("#submit").val('登陆');
                    tip.text('账户已被删除');

                } else if (msg == 2) {

                    $("#submit").val('登陆');
                    tip.text('账户不存在');

                } else if (msg == 3) {

                    $("#submit").val('登陆');
                    tip.text('密码错误');

                } else if (msg == 0) {

                    window.location.href = 'index.php';

                }
            }
        });
    });
</script>


</body>
</html>