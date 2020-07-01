<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
<head>
    <title>Editor - <?php require_once("template/title.php"); ?></title>
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
            <?php
            require_once("inc/account/verify.php");
            require_once("template/header.php");
            ?>


            <br><br>


            <h3>Editor</h3>


            <form method="post" action="#" id="form" onsubmit="return enter()">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="title" id="title" value="" placeholder="Title"/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="subtitle" id="subtitle" value="" placeholder="Subtitle"/>
                    </div>
                    <div class="col-12 col-12-xsmall">
                        <textarea name="summary" id="summary" value="" placeholder="Summary" rows="3"></textarea>
                    </div>

                    <!-- Break -->


                    <div class="col-12">
                        <select name="lang" id="lang">
                            <option value="">- Language -</option>
                            <option value="CN">Chinese</option>
                            <option value="EN">English</option>
                        </select>
                    </div>


                    <!-- Break -->
                    <div class="col-12">
                        <textarea name="article" id="article" placeholder="" rows="10"></textarea>
                    </div>
                    <!-- Break -->

                    <p id="tip_text" style="color:red;"></p>
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="Post" class="primary" id="submit"/></li>
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


    $("#submit").attr('value', 'Post');

    var tip = $('#tip_text');
    tip.text('');

    function enter() {

        var title = document.getElementById("title").value;//获取form中的用户名
        var subtitle = document.getElementById("subtitle").value;
        var summary = document.getElementById("summary").value;
        var lang = document.getElementById("lang").value;
        var article = document.getElementById("article").value;


        if (title.length == 0) {
            alert("Please filled the title");
            return false;
        }

        if (subtitle.length == 0) {
            alert("Please filled the subtitle");
            return false;
        }

        if (summary.length == 0) {
            alert("Please filled the summary");
            return false;
        }

        if (lang.length == 0) {
            alert("Please choose the language");
            return false;
        }

        if (article.length == 0) {
            alert("Please filled the article");
            return false;
        }


        $("#submit").val('Posting');
        //向后台发送处理数据
        $.ajax({
            type: "POST", //用POST方式传输
            dataType: "text", //数据格式:JSON
            url: 'inc/editor/upload.php', //目标地址
            data: $('#form').serialize(),
            success: function (msg) {
                if (msg == 1) {
                    $("#submit").val('Post');
                    tip.text('Please filled all the content!');

                } else if (msg == 2) {

                    $("#submit").val('Post');
                    window.location.href = 'index.php';

                } else if (msg == 3) {
                    $("#submit").val('Post');
                    tip.text('Database is down!');

                }
            }
        });

        return false;
    }
</script>


</body>
</html>