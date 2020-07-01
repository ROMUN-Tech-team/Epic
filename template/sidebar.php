<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form method="post" action="#">
                <input type="text" name="query" id="query" placeholder="Search"/>
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="index.php">Homepage</a></li>
                <li>
                    <span class="opener">Self Media</span>
                    <ul>
                        <li><a href="#">England</a></li>
                        <li><a href="#">America</a></li>
                        <li><a href="#">Russia</a></li>
                        <li><a href="#">China</a></li>
                    </ul>
                </li>
                <?php
                session_start();

                if (isset($_SESSION["code"])) {
                    ?>
                    <li>
                        <span class="opener">Account management</span>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="editor.php">Post Article</a></li>
                            <li><a href="#">My Article</a></li>
                            <li><a href="inc/account/exit.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>


        <!-- Section -->
        <section>
            <header class="major">
                <h2>Get in touch</h2>
            </header>
            <p>Get in touch with us in following ways</p>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="mailto:musdatech@gmail.com">musdatech@gmail.com</a></li>
                <li class="icon solid fa-phone">+1 (646) 707-6558</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Copyright &copy; 2015-2019 <a href="https://www.mcpe.name">Syndicate Develop Team.</a>
                All rights reserved.</p>
        </footer>

    </div>
</div>