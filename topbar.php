<header id="menu-top">
    <div class="container">
        <nav>
            <a href="index.php">首页HOME</a>
            <?php  if(!$user)
                echo '<a href="login.html" class="btn btn-action">管理员登录</a>';
            else {echo '<a>'.$user.'</a>';
                echo '<a href="logout.php">登出</a>';
            }
            ?>
        </nav>
    </div>
</header>