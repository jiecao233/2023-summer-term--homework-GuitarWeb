<link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

<script src="./js/removeUser.js"></script>
<script src="./js/signModel.js"></script>
<script src="./js/modifyUser.js"></script>
<script src="./js/modifyPwd.js"></script>
<script src="./js/removeGood.js"></script>
<script src="./js/addGood.js"></script>
<script src="./js/modifyPrice.js"></script>
<script src="./js/addBanner.js"></script>
<script src="./js/removeBanner.js"></script>
<script src="./js/enableBanner.js"></script>
<script src="./js/disableBanner.js"></script>

<?php
$connect = mysqli_connect("localhost:3306", "root", "");
if (!$connect) {
    echo "<script>
                       alert('网络错误.')
                    </script>";
}

if (empty($_COOKIE['adminUsername']) || empty($_COOKIE['adminPwd'])){
    header("location:index.php");
}else {
    $username = $_COOKIE['adminUsername'];
    $pwd = $_COOKIE['adminPwd'];

    $sql = "USE end";
    mysqli_query($connect,$sql);

    $sql = "SELECT * FROM admin WHERE username='$username' AND pwd=AES_ENCRYPT(('$pwd'),'zyc')";
    $result = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($result);
}
?>

<div class="container-fluid text-center bg-dark">
    <img class="mt-3" src="img/logo/main_logo.png" style="width: 5%;height: auto;">
    <h1 class="mt-3 mb-3"><span class="text-danger">后台</span><span class="text-light">管理</span></h1>
</div>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item"><a href="./index.php" class="nav-link px-2 link-secondary">首页</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 link-dark">后台</a></li>
        </ul>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
                echo '
                <span>管理员 '.$username.'</span>';
                ?>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="adminSignout.php">Sign out</a></li>
          </ul>
        </div>

    </header>
</div>

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">用户管理</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">商品管理</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">轮播图设置</button>
        </li>
    </ul>

    <!-- 管理界面 -->
    <div class="tab-content" id="myTabContent">

        <!--添加用户模态弹窗-->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">新增</h5>
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
                        <button type="button" class="btn btn-primary w-50 mt-3" id="signBtn">新增</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 更改用户名模态弹框 -->
        <div class="modal fade" id="modifyUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">修改账号</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="justify-content-center">
                            <div class="mb-3  text-center">
                                <div id="modifyUserTip" class="form-text"></div>
                                <label class="form-label"><h5>新用户名</h5></label>
                                <input type="text" class="form-control form-control-lg" id="newUsername" aria-describedby="emailHelp" placeholder="用户名">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center mb-2">
                        <button id="btnNewUsername" type="button" class="btn btn-primary w-25 mt-3" onclick="modifyUser()">确认更改</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 更改密码模态弹框 -->
        <div class="modal fade" id="modifyPwdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">修改密码</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="justify-content-center">
                            <div class="mb-3  text-center">
                                <div id="modifyPwdTip" class="form-text"></div>
                                <label class="form-label"><h5>新密码</h5></label>
                                <input type="password" class="form-control form-control-lg" id="newPwd" aria-describedby="emailHelp" placeholder="用户名">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center mb-2">
                        <button id="btnNewUsername" type="button" class="btn btn-primary w-25 mt-3" onclick="modifyPwd()">确认更改</button>
                    </div>
                </div>
            </div>
        </div>

        <!--用户管理-->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
                <button type="button" class="btn btn-success mb-2 mt-2 w-100" id="btnAddUser" data-bs-toggle="modal" data-bs-target="#addUserModal"><span class="text-white" style="font-weight: bold">+新增</span></button>
            </div>
            <!-- 新增按钮 -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">用户名</th>
                            <th scope="col">密码</th>
                            <th scope="col">用户头像</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT username,convert(AES_DECRYPT(pwd,'zyc') using utf8mb4) as pwd,head FROM account";
                        $result = mysqli_query($connect,$sql);
                        $num = mysqli_num_rows($result);
                        for ($i = 0;$i<$num;$i++) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$row['username'].'</td>
                                <td>'.$row['pwd'].'</td>
                                <td>'.$row['head'].'</td>
                                <td>
                                    <button class="btn-danger btn-sm" type="button" onclick="removeUser(this.value)" value="'.$row['username'].'">删除</button>
                                    <button class=" btn-warning btn-sm" type="button" onclick="enableModifyUserModal(this.value)" value="'.$row['username'].'">修改账号</button>
                                    <button class=" btn-warning btn-sm" type="button" onclick="enableModifyPwdModal(this.value)" value="'.$row['username'].'">修改密码</button>
                                </td>
                            </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--货物管理-->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container">
                <button type="button" class="btn btn-success mb-2 mt-2 w-100" data-bs-toggle="modal" data-bs-target="#addGoodModal"><span class="text-white" style="font-weight: bold">+新增</span></button>
            </div>
            <!-- 新增按钮 -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">名字</th>
                        <th scope="col">展示图路径</th>
                        <th scope="col">价格</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM good";
                    $result = mysqli_query($connect,$sql);
                    $num = mysqli_num_rows($result);
                    for ($i = 0;$i<$num;$i++) {
                        $row = mysqli_fetch_assoc($result);
                        echo '<tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['path'].'</td>
                                <td>$'.$row['price'].'</td>
                                <td>
                                    <button class="btn-danger btn-sm" type="button" onclick="removeGood(this.value)" value="'.$row['name'].'">删除</button>
                                    <button class=" btn-warning btn-sm" type="button" onclick="enableModifyPriceModal(this.value)" value="'.$row['name'].'">修改价格</button>
                                </td>
                            </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--添加商品模态弹窗-->
        <div class="modal fade" id="addGoodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">新增</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="justify-content-center">
                            <div class="mb-3  text-center">
                                <div id="addGoodTip" class="form-text"></div>
                                <label class="form-label"><h5>商品名</h5></label>
                                <input name="name" type="text" class="form-control form-control-lg" id="name" placeholder="商品名">
                            </div>
                            <div class="mb-3 text-center">
                                <label class="form-label"><h5>价格</h5></label>
                                <input name="price" type="number" class="form-control form-control-lg" id="price" placeholder="价格">
                            </div>
                            <div class="mb-3 text-center">
                                <label class="form-label"><h5>展示图路径</h5></label>
                                <input name="path" type="text" class="form-control form-control-lg" id="path" placeholder="展示图路径">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center mb-2">
                        <button type="button" class="btn btn-primary w-50 mt-3" id="addGoodBtn">新增</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 更改价格模态弹框 -->
        <div class="modal fade" id="modifyPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">修改价格</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="justify-content-center">
                            <div class="mb-3  text-center">
                                <div id="modifyPwdTip" class="form-text"></div>
                                <label class="form-label"><h5>新价格</h5></label>
                                <input type="number" class="form-control form-control-lg" id="newPrice" aria-describedby="emailHelp" placeholder="价格">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center mb-2">
                        <button id="btnNewUsername" type="button" class="btn btn-primary w-25 mt-3" onclick="modifyPrice()">确认更改</button>
                    </div>
                </div>
            </div>
        </div>

        <!--轮播图管理-->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container">
                <!-- 新增按钮 -->
                <button type="button" class="btn btn-success mb-2 mt-2 w-100" data-bs-toggle="modal" data-bs-target="#addBannerModal"><span class="text-white" style="font-weight: bold">+新增</span></button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">名字</th>
                        <th scope="col">路径</th>
                        <th scope="col">启用状态</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM banner";
                    $result = mysqli_query($connect,$sql);
                    $num = mysqli_num_rows($result);
                    for ($i = 0;$i<$num;$i++) {
                        $row = mysqli_fetch_assoc($result);
                        echo '<tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['path'].'</td>';
                        if ($row['enable']) {
                            echo '<td><span style="color: green">已启用</span></td>
                                  <td>
                                    <button class="btn-danger btn-sm" type="button" onclick="removeBanner(this.value)" value="'.$row['name'].'">删除</button>
                                    <button class=" btn-warning btn-sm" type="button" onclick="disableBanner(this.value)" value="'.$row['name'].'">禁用</button>
                                </td>
                            </tr>';
                        }else{
                            echo '<td><span style="color: red">未启用</span></td>
                                <td>
                                    <button class="btn-danger btn-sm" type="button" onclick="removeBanner(this.value)" value="'.$row['name'].'">删除</button>
                                    <button class="btn-success btn-sm" type="button" onclick="enableBanner(this.value)" value="'.$row['name'].'">启用</button>
                                </td>
                            </tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--新增轮播图模态窗-->
        <div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-footer justify-content-between">
                        <h5 class="modal-title" id="exampleModalLabel">新增</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="justify-content-center">
                            <div class="mb-3  text-center">
                                <div id="addBannerTip" class="form-text"></div>
                                <label class="form-label"><h5>名称</h5></label>
                                <input type="text" class="form-control form-control-lg" id="banner_name" aria-describedby="emailHelp" placeholder="名称">
                            </div>
                            <div class="mb-3 text-center">
                                <label class="form-label"><h5>路径</h5></label>
                                <input type="password" class="form-control form-control-lg" id="banner_path" placeholder="路径">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center mb-2">
                        <button type="button" class="btn btn-primary w-50 mt-3" id="addBannerBtn">确认</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
    mysqli_close($connect);
?>