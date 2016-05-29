<?php
session_start();
if(isset($_SESSION['login_name']))
    $user = $_SESSION['login_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教师信息查询系统</title>
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
</head>
<body>
    <div id="page">
        <header id="menu-top">
            <div class="container">
                <nav>
                    <a href="index.php">首页HOME</a>
                    <?php  if(empty($user))
                     echo '<a href="login.html" class="btn btn-action">管理员登录</a>';
                    else {echo '<a>'.$user.'</a>';
                        echo '<a href="logout.php">登出</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
        <section class="bg-light">
            <div class="container">
                <header>
                    <h1>教师信息查询系统</h1>
                </header>
                <span class="iconarrow" aria-hidden="true"><a href="#about"></a> </span>
            </div>
        </section>
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="icon-box">
                            <a href="lookup.php">
                                <img src="./static/img/graph.png">
                                <h3>教师信息</h3>
                            </a>

                        </div>
                    </div>
                    <?php
                        if(isset($user)){
                            echo'<div class="col-sm-4">';
                            echo '<div class="icon-box">';
                            echo '<a href="lookup.php">';
                            echo '<img src="./static/img/open-box.png">';
                            echo '<h3>添加/修改教师信息</h3>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo'<div class="col-sm-4">';
                            echo '<div class="icon-box">';
                            echo '<a href="resetpswd.php">';
                            echo '<img src="./static/img/clock.png">';
                            echo '<h3>修改密码</h3>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="./static/js/jquery.min.js"></script>
<script src="./static/js/jquery.qrcode.min.js"></script>
<script src="./static/js/bootstrap.min.js"></script>
</body>
</html>