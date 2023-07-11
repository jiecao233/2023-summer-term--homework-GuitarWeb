<link href="./css/login.css" rel="stylesheetadminLogin.php">
<script src="js/login.js"></script>

<body>
<div class="main">
    <div class="title">
        <span>管理员登录</span>
    </div>

    <div class="title-msg">
        <span>请输入登管理员账户和密码</span>
    </div>

    <form class="login-form" method="post" id="submit" novalidate action="adminAuth.php">
        <!--输入框-->
        <div class="input-content">
            <!--autoFocus-->
            <div>
                <input type="text" autocomplete="off"
                       placeholder="用户名" name="adminUsername" id="username" required/>
            </div>

            <div style="margin-top: 16px">
                <input type="password"
                       autocomplete="off" placeholder="登录密码" name="adminPwd" id="pwd" required maxlength="32"/>
            </div>
        </div>

        <!--登入按钮-->
        <div style="text-align: center">
            <button onclick="isnull()" type="button" class="enter-btn" >登录</button>
        </div>

        <div style="text-align: center;margin-top:20px;">
            <button onclick="back()" type="button" class="enter-btn" >返回</button>
        </div>

        <div class="foor">
            <div class="left"><a href="signup.php" class="link-secondary">忘记密码？</a></div>

            <div class="right"><a href="signup.php" class="link-secondary">注册账户</a></div>
        </div>
    </form>
</div>
</body>
