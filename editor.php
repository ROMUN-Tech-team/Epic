<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="zh">
<head>
    <title>编辑器 - <?php require_once("template/title.php"); ?></title>
    <meta charset="utf-8"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Epic媒体中心">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <?php
            require_once("inc/account/verify.php");
            require_once("template/header.php");
            ?>


            <br><br>


            <h3>编辑器</h3>


            <form method="post" action="#" id="form" onsubmit="return enter()">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="title" id="title" value="" placeholder="标题"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="subtitle" id="subtitle" value="" placeholder="副标题"/>
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <textarea name="summary" id="summary" placeholder="总结" rows="3"></textarea>
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <textarea name="cover" id="cover" placeholder="封面图片" rows="1"></textarea>
                        <p>您可以将图片上传至 <a href="https://imgchr.com">图床</a></p>
                    </div>


                    <!-- Break -->


                    <div class="col-12">
                        <select name="lang" id="lang">
                            <option value="">- 语言 -</option>
                            <option value="CN">中文</option>
                            <option value="EN">English</option>
                        </select>
                    </div>


                    <!-- Break -->
                    <div class="col-12">
                        <textarea name="article" id="article" rows="10"></textarea>

                        <ul class="actions">
                            <li><input type="submit" value="存储" class="button" id="save"/></li>
                        </ul>

                    </div>

                    <!-- Break -->

                    <p id="tip_text" style="color:red;"></p>
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="发布" class="primary" id="submit"/></li>
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
<script src="assets/js/HandyEditor.min.js"></script>

<script type="text/javascript">

    var he = HE.getEditor('article', {
        autoHeight: true,
        autoFloat: false,
        topOffset: 0,
    });




    $("#submit").attr('value', '发布');

    var tip = $('#tip_text');
    tip.text('');

    //缓存内容
    $("#save").click(function () {

        he.sync();
        var article = document.getElementById("article").value;

        $("#save").val('存储中');
        //向后台发送处理数据
        $.ajax({
            type: "POST", //用POST方式传输
            dataType: "text", //数据格式:JSON
            url: 'inc/article/cache.php', //目标地址
            data: 'article=' + article,
            success: function (msg) {
                if (msg == 1) {

                    $("#save").val('存储');
                    tip.text('存储成功');
                    return false;

                } else if (msg == 2) {

                    $("#save").val('存储');
                    tip.text('存储错误');

                }
            }
        });
    });

    function enter() {


        he.sync();
        var title = document.getElementById("title").value;//获取form中的用户名
        var subtitle = document.getElementById("subtitle").value;
        var summary = document.getElementById("summary").value;
        var lang = document.getElementById("lang").value;
        var article = document.getElementById("article").value;
        var cover = document.getElementById("cover").value;


        if (title.length == 0) {
            alert("请输入标题");
            return false;
        }

        if (subtitle.length == 0) {
            alert("请输入副标题");
            return false;
        }

        if (summary.length == 0) {
            alert("请输入总结");
            return false;
        }

        if (lang.length == 0) {
            alert("请选择语言");
            return false;
        }

        if (article.length == 0) {
            alert("请输入内容");
            return false;
        }


        $("#submit").val('发布中');
        //向后台发送处理数据
        $.ajax({
            type: "POST", //用POST方式传输
            dataType: "text", //数据格式:JSON
            url: 'inc/editor/upload.php', //目标地址
            data: $('#form').serialize(),
            success: function (msg) {
                if (msg == 1) {
                    $("#submit").val('发布');
                    tip.text('请输入所有内容!');

                } else if (msg == 2) {

                    $("#submit").val('发布');
                    window.location.href = 'index.php';

                } else if (msg == 3) {
                    $("#submit").val('发布');
                    tip.text('数据库错误!');

                }
            }
        });

        return false;
    }

    $(document).ready(function () {
        $.ajax({
            url: 'inc/article/get_cache.php', //接口链接
            type: 'get', //请求方式
            // 如果获取成功
            success: function (data) {
                //成功时返回的data值
                he.set(data);
            },
            // 如果获取失败
            error: function (err) {
                console.log(err)
            }
        });
    });

</script>


</body>
</html>