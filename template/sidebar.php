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
                <li>
                    <span class="opener">自媒体</span>
                    <ul>
                        <li><a href="#">英国</a></li>
                        <li><a href="#">美国</a></li>
                        <li><a href="#">俄罗斯</a></li>
                        <li><a href="#">中国</a></li>
                    </ul>
                </li>
                <?php
                session_start();

                if (isset($_SESSION["code"])) {
                    ?>
                    <li>
                        <span class="opener">用户管理</span>
                        <ul>
                            <li><a href="#">资料管理</a></li>
                            <li><a href="editor.php">发布文章</a></li>
                            <li><a href="#">我的文章</a></li>
                            <li><a href="inc/account/exit.php">退出登录</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="login.php">登陆</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>


        <!-- Section -->
        <section>
            <header class="major">
                <h2>联系</h2>
            </header>
            <p>与我们用以下的方式进行交流</p>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="mailto:musdatech@gmail.com">musdatech@gmail.com</a></li>
                <li class="icon solid fa-phone">+86 186 4514 5921</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Copyright &copy; 2015-2019 <a href="https://www.mcpe.name">Syndicate Develop Team.</a>
                All rights reserved.</p>
        </footer>

    </div>
</div>