<link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

<script src="./js/loginModel.js"></script>
<script src="./js/signModel.js"></script>

<body class="bg-light">
<?php
    session_start();

    $connect = mysqli_connect("localhost:3306", "root", "");
    if (!$connect) {
        echo "<script>
                       alert('网络错误.')
                    </script>";
    }

    if (empty($_COOKIE['username']) && empty($_COOKIE['pwd'])){
        $_SESSION['isLogin'] = false;
    }else {
        $username = $_COOKIE['username'];
        $pwd = $_COOKIE['pwd'];

        $sql = "USE end";
        mysqli_query($connect,$sql);

        $sql = "SELECT * FROM account WHERE username='$username' AND pwd=AES_ENCRYPT(('$pwd'),'zyc')";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        @$_SESSION['head'] = $row['head'];

        if ($num == 1) {
            $_SESSION['isLogin'] = true;
        }else{
            $_SESSION['isLogin'] = false;
        }
    }
?>

<div class="container-fluid text-center bg-dark">
    <img class="mt-3" src="img/logo/main_logo.png" style="width: 5%;height: auto;">
    <h1 class="mt-3 mb-3"><span class="text-danger">乐器</span><span class="text-light">世界</span></h1>
</div>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item"><a href="./index.php" class="nav-link px-2 link-dark">首页</a></li>
            <li class="nav-item"><a href="adminLogin.php" class="nav-link px-2 link-secondary">后台</a></li>
        </ul>

        <?php
        if (!$_SESSION['isLogin']){
            echo
            '<div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">登录</button>
                <!-- 登录模态窗口-->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header modal-footer justify-content-between">
                              <h5 class="modal-title" id="exampleModalLabel">登录</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form class="justify-content-center">
                                <div class="mb-3  text-center">
                                    <div id="loginTip" class="form-text"></div>
                                    <label class="form-label"><h5>用户名</h5></label>
                                    <input name="username" type="text" class="form-control form-control-lg" id="username" aria-describedby="emailHelp" placeholder="用户名">                                   
                                </div>
                                <div class="mb-3 text-center">
                                    <label class="form-label"><h5>密码</h5></label>
                                    <input name="pwd" type="password" class="form-control form-control-lg" id="pwd" placeholder="密码">
                                    <div class="form-text mt-3"><a href="#" class="link-secondary">忘记密码?</a></div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer justify-content-center mb-2">
                              <button type="button" class="btn btn-primary w-50 mt-3" id="loginBtn">登录</button>
                              <button type="button" class="btn btn-outline-primary w-50 mt-3" id="loginBtn">注册</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a type="button" class="btn btn-primary" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#signModal">注册</a>
                
                <!-- 注册模态窗口-->
                <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header modal-footer justify-content-between">
                              <h5 class="modal-title" id="exampleModalLabel">注册</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form class="justify-content-center">
                                <div class="mb-3  text-center">
                                    <div id="signTip" class="form-text"></div>
                                    <label class="form-label"><h5>用户名</h5></label>
                                    <input name="sign_username" type="text" class="form-control form-control-lg" id="sign_username" aria-describedby="emailHelp" placeholder="用户名">                                   
                                </div>
                                <div class="mb-3 text-center">
                                    <label class="form-label"><h5>密码</h5></label>
                                    <input name="sign_pwd" type="password" class="form-control form-control-lg" id="sign_pwd" placeholder="密码">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer justify-content-center mb-2">
                              <button type="button" class="btn btn-primary w-50 mt-3" id="signBtn">注册</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }else{
            echo ' 
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="'.$_SESSION['head'].'" alt="mdo" width="32" height="32" class="rounded-circle">
            <span>'.$username.'</span>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">订单</a></li>
            <li><a class="dropdown-item" href="#">个人资料</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signout.php">登出</a></li>
          </ul>
        </div>';
        }
        ?>
    </header>
</div>

<?php
    $sql = "USE end";
    mysqli_query($connect,$sql);

    $sql = "SELECT path from banner where enable=true";
    $result = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($result);
?>

<div id="banner" class="carousel slide p-5" data-bs-ride="carousel">

    <!-- 指示符 -->
    <div class="carousel-indicators" style="margin-bottom: 5%">
        <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
        <?php
        for ($i = 1;$i<$num;$i++)
            echo '<button type="button" data-bs-target="#banner" data-bs-slide-to="'.$i.'"></button>'
        ?>
    </div>

    <!-- 轮播图片 -->
    <div class="carousel-inner">
        <?php
        echo '<div class="carousel-item active">
            <img decoding="async" src="'.mysqli_fetch_assoc($result)['path'].'" class="d-block" style="width:100%;height: 70%">
        </div>';

        for ($i = 1;$i<$num;$i++)
            echo '<div class="carousel-item">
                <img decoding="async" src="'.mysqli_fetch_assoc($result)['path'].'" class="d-block" style="width:100%;height: 70%">
            </div>'

        ?>
    </div>

    <!-- 左右切换按钮 -->
    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container-fluid text-center bg-warning">
    <img class="mt-3" src="img/logo/sub_logo.png" style="width: 5%;height: auto;">
    <h1 class="mt-3 mb-3"><span class="text-danger">热卖</span><span class="text-light">商品</span></h1>
</div>

<div class="container">
    <?php

    $page = @$_GET['page'];
    if (!$page)
        $page=1;

    $sql = "USE end";
    mysqli_query($connect,$sql);

    $itemNumS = $page*6-6;
    $itemNumE = $page*6;

    $sql = "SELECT * from good limit {$itemNumS},{$itemNumE}";
    $result = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($result);
    
    for($i = 0,$j = 0;$i<2;$i++) {
        echo '<div class="row">';
        for($j = 0;$j<3;$j++) {
            $row = mysqli_fetch_assoc($result);
            if (!$row)
                break;
            echo '<div class="col text-center" >
                <a><img class="d-block mt-3" src = "'.@$row['path'].'" style = "width: 100%" ></a>
                <h5 style="font-style: italic;font-weight: bold" class="text-dark mt-3">  '.@$row['name'].' </h5>
                <h5 style="font-style: italic;font-weight: bold" class="text-muted mt-3"> $ '.@$row['price'].' </h5>
                <a type="button" class="btn btn-danger w-50 mt-3">订购</a>
            </div > ';
        }
    echo '</div>';
    }
    ?>
</div>

<div style="display: table;margin: 5% auto">
    <ul class="pagination">
        <?php
        if($page > 1) {
            $to = $page-1;
            echo '<li class="page-item" >
                <a class="page-link bg-warning border-warning text-dark" href = "./index.php?page='.$to.'" tabindex = "-1" aria-disabled = "false" > 上一页</a >
            </li >';
        }
        else{
            echo '<li class="page-item disabled" >
                <a class="page-link bg-danger border-danger text-secondary" href = "#" tabindex = "-1" aria-disabled = "true" > 上一页</a >
            </li >';
        }
        $sql = "SELECT path,price from good";
        $num = mysqli_num_rows(mysqli_query($connect,$sql));
        $num = $num/6+1;
        for ($i = 1;$i<=$num;$i++){
            if ($page == $i){
                echo '<li class="page-item active">
                    <a class="page-link bg-warning border-warning text-dark" href="./index.php?page='.$i.'">'.$i.'</a>
                </li>';
            }
            else{
                echo '<li class="page-item">
                    <a class="page-link bg-warning border-warning text-dark" href="./index.php?page='.$i.'">'.$i.'</a>
                </li>';
            }
        }
        if ($page == (int)$num) {
            echo '<li class="page-item disabled" >
                <a class="page-link bg-danger border-danger text-dark" href = "#" tabindex = "-1" aria-disabled = "true" >下一页</a >
            </li >';
        }else{
            $to = $page+1;
            echo '<li class="page-item">
                <a class="page-link bg-warning border-warning text-secondary" href="./index.php?page='.$to.'" aria-disabled="false">下一页</a>
            </li>';
        }
        ?>
    </ul>
</div>

<?php
    mysqli_close($connect);
?>

</body>