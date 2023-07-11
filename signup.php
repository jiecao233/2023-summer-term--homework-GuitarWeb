<link href="./css/signup.css" rel="stylesheet">
<script src="js/signup.js"></script>
<body>
<div class="main">
    <div class="title">
        <span>注册</span>
    </div>

    <div class="title-msg">
        <span>请输入用户名和密码</span>
    </div>

    <form class="login-form" method="post" id="submit" novalidate action="newAccount.php">
        <!--输入框-->
        <div class="input-content">
            <!--autoFocus-->
            <div>
                <input type="text" autocomplete="off"
                       placeholder="用户名" name="username" id="username" required/>
            </div>

            <div style="margin-top: 16px">
                <input type="password"
                       autocomplete="off" placeholder="登录密码" name="pwd" id="pwd" required maxlength="32"/>
            </div>
        </div>

        <!--注册按钮-->
        <div style="text-align: center">
            <button onclick="isnull()" type="button" class="enter-btn" >注册</button>
        </div>
        <!--返回-->
        <div style="text-align: center;margin-top:5%;">
            <button onclick="back()" type="button" class="enter-btn" >返回</button>
        </div>
    </form>
</div>
</body>
