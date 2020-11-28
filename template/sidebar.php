<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form method="post" action="#">
                <input type="text" name="query" id="query" placeholder="搜索"/>
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>菜单</h2>
            </header>
            <ul>
                <li><a href="index.php">主页</a></li>
                <?php
                session_start();

                if (isset($_SESSION["code"])) {
                    ?>
                    <li>
                        <span class="opener">账户管理</span>
                        <ul>
                            <li><a href="#">个人信息</a></li>
                            <li><a href="editor.php">发布文章</a></li>
                            <li><a href="my_article.php">我发布的文章</a></li>
                            <li><a href="inc/account/exit.php">登出</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="login.php">登录</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>


        <!-- Section -->
        <section>
            <header class="major">
                <h2>联系我们</h2>
            </header>
            <p>用一下几种方式联系我们</p>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="mailto:musdatech@gmail.com">Email</a></li>
                <li class="icon solid fa-phone">+1 (646) 707-6558</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Copyright &copy; 2015-2020 <a href="https://www.mcpe.name">Syndicate Develop Team.</a>
                All rights reserved.</p>
        </footer>

    </div>
</div>