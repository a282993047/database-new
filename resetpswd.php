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
    <script src="./static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="static/css/lookup.css">
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
        <div class="container" style="height: 20px;">
            <header style="    position: relative;top: -20px;">
                <h1>修改密码</h1>
            </header>
            <span class="iconarrow" aria-hidden="true"><a href="#about"></a> </span>
        </div>
    </section>
    <div class="reset-form">
        <form method="post" action="reset.php">
            <div class="form-group">
                <label for"password">新密码</label>
                <input style="width: 30%" class="form-control" name="password" id="passwoed">
            </div>
            <button type="submit" class="btn btn-danger">确认修改</button>
        </form>
    </div>
</div>
</body>
</html>