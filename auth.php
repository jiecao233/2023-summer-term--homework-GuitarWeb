<?php
    if(empty($_POST['username']) || empty($_POST['pwd'])){
        //header("location:index.php");
        echo "<span style='color: red'>登录错误</span>";
    }
    else{
        session_start();
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $connect = mysqli_connect("localhost:3306", "root", "");
        if (!$connect) {
            /*echo "<script>
                   alert('网络错误.')
                </script>";
            */
            echo "<span style='color: red'>网络错误</span>>";
        }

        $sql = "USE end";
        mysqli_query($connect,$sql);

        $sql = "SELECT * FROM account WHERE username='$username' AND pwd=AES_ENCRYPT(('$pwd'),'zyc')";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $_SESSION['isLogin'] = true;
            setcookie("username",$username,time()+3600,"/");
            setcookie("pwd",$pwd,time()+3600,"/");
            echo "<span style='color: green'>登陆成功</span>";
        }elseif ($num > 1){
            header("location:error.php");
        }else{
            /*echo "<script>
                alert('账号或密码错误')
                window.location.href = './login.php'
        </script>";
            */
            echo "<span style='color: red'>账号或密码错误</span>";
        }

        mysqli_close($connect);
    }