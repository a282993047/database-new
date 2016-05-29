<?php
session_start();
$user = $_SESSION['login_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教师信息查询系统</title>
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
                <?php  if(!$user)
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
                    <h1>教师信息</h1>
                </header>
                <span class="iconarrow" aria-hidden="true"><a href="#about"></a> </span>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="search-box">
                        <form class="form-inline" action="searchteacher.php" target="_top" method="post">
                            <div class="form-group">
                                <label for"name">教师姓名</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="请输入教师姓名">
                                <button type="submit" id="search" class="btn">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="result">
    <?php
        include 'db.php';
        $sql = "select * from Teachers,Dept WHERE Teachers.TDeptid = Dept.Deptid";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
            $fatherid=$row['Fatherid'];
            if($fatherid == 0) $dept =$row['DeptName'];
            else{
                $result1 = mysql_query("select * from Dept WHERE Deptid = $fatherid");
                $row1 = mysql_fetch_array($result1);
                $dept = $row1['DeptName'];
            }
    ?>
    <div class="result-box col-md-11">
        <form action="updateteacher.php" method="post">
            <div class="col-md-9">
                <div><h4 style="">教师姓名:</h4><h4 class="name"><?php echo $row['TName'] ?></h4></div>
                <div class="small">
                    学院：<p class="dept" style=""><?php echo $dept; ?></p>
                    系别：<p class="xibie"><?php echo $row['DeptName'] ?></p>
                    职称：<p class="ttitle"><?php echo $row['TTitle']?></p>
                    办公室电话号码：<p class="phone"><?php echo $row['TPhone']?></p>
                    办公地址：<p class="addr" style="position: relative;left: 20px;"><?php echo $row['TAddress']?></p>
                    电子邮件：<p class="email"><?php echo $row['TEmail']?></p>
                </div>
            </div>
            <input name="id" value="<?php echo $row['Teacherid'] ?>" style="display: none">
        <?php if(isset($user)){ ?>
        <div class="col-md-3" style="margin-top:10px; margin-bottom: 10px;">

                <input name="Teacherid" style="display:none " value="<?php echo $row['Teacherid']?>">
                <button type="button" class="btn btn-primary changebutton" onclick="change(this);setxibie
                (this)">修改</button>
                <button type="submit" class="btn btn-primary">确认修改</button>
        </form>
            <form action="delete.php" method="post">
                <input name="Teacherid" style="display:none " value="<?php echo $row['Teacherid']?>">
                <button type="submit" class="btn btn-danger">删除</button>
            </form>

        </div>
        <?php } ?>
    </div>
        <?php }?>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="./static/js/jquery.min.js"></script>
<script src="./static/js/jquery.qrcode.min.js"></script>
<script src="./static/js/bootstrap.min.js"></script>
<script>
    function changexibie(form){
        var parent = $(form).parents('.result-box');
        var dept = $(form).val();
        var xibie = parent.find('.xibiebox');
        if(dept=='信息科学技术学院'){
            xibie.empty();
            var content = "<option>计算机科学技术系</option> <option>电子工程系</option><option>通信工程系</option><option>计算中心</option>"
            xibie.append(content);
        }
        else if(dept == '金融与统计学院'){
            xibie.empty();
            var content = "<option>金融学系</option> <option>国际贸易系</option><option>统计与精算系</option>"
            xibie.append(content);
        }
        else if(dept == '人文社会科学学院'){
            xibie.empty();
            var content = "<option>历史学系</option> <option>哲学系</option><option>政治学系</option>"
            xibie.append(content);
        }
        else if(dept == '社会发展学院'){
            xibie.empty();
            var content = "<option>社会学系</option> <option>社会工作系</option>";
            xibie.append(content);
        }
        else if(dept == '外语学院'){
            xibie.empty();
            var content = "<option>英语系</option> <option>日语系</option>";
            xibie.append(content);
        }


    }

    function change(form){
        var parent = $(form).parents('.result-box');
        var name = parent.find('.name');
        var nameval = name.html();
        var dept = parent.find('.dept');
        var deptval = dept.html();
        var xibie = parent.find('.xibie');
        var xibieval = xibie.html();

        var ttitle = parent.find('.ttitle');
        var ttitleval = ttitle.html();
        var phone = parent.find('.phone');
        var phoneval = phone.html();
        var addr = parent.find('.addr');
        var addrval = addr.html();
        var email = parent.find('.email');
        var emailval = email.html();
        console.log(dept.html());
        name.html("<input class='form-control' name='name' value='"+nameval+"'>");
//        dept.html("<input class='form-control' name='dept' value='"+deptval+"'>");
        dept.html('<div class="form-group">\
        <select class="form-control deptbox" name="dept" onchange="changexibie(this)">\
        <option>'+deptval+'</option>\
        <option>信息科学技术学院</option><option>金融与统计学院</option><option>人文社会科学学院</option>\
        <option>社会发展学院</option><option>外语学院</option>');
//        xibie.html("<input class='form-control' name='xibie' value='"+xibieval+"'>");
        xibie.html('<div class="form-group">\
        <select class="form-control xibiebox" name="xibie">\
        <option>'+xibieval+'</option>');
        ttitle.html("<input class='form-control' name='ttitle' value='"+ttitleval+"'>");
        phone.html("<input class='form-control' name='phone' value='"+phoneval+"'>");
        addr.html("<input class='form-control' name='addr' value='"+addrval+"'>");
        email.html("<input class='form-control' name='email' value='"+emailval+"'>");
        name.children().focus();

    }

    function setxibie(form){
        var parent = $(form).parents('.result-box');
        var dept = parent.find('.deptbox').val();
        var xibie = parent.find('.xibiebox');
        if(dept=='信息科学技术学院'){
            xibie.empty();
            var content = "<option>计算机科学技术系</option> <option>电子工程系</option><option>通信工程系</option><option>计算中心</option>"
            xibie.append(content);
        }
        else if(dept == '金融与统计学院'){
            xibie.empty();
            var content = "<option>金融学系</option> <option>国际贸易系</option><option>统计与精算系</option>"
            xibie.append(content);
        }
        else if(dept == '人文社会科学学院'){
            xibie.empty();
            var content = "<option>历史学系</option> <option>哲学系</option><option>政治学系</option>"
            xibie.append(content);
        }
        else if(dept == '社会发展学院'){
            xibie.empty();
            var content = "<option>社会学系</option> <option>社会工作系</option>";
            xibie.append(content);
        }
        else if(dept == '外语学院'){
            xibie.empty();
            var content = "<option>英语系</option> <option>日语系</option>";
            xibie.append(content);
        }
    }
</script>
</body>
</html>