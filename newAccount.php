<?php
    if (empty($_POST['username']) || empty($_POST['pwd']))
        //header("location:index.php");
        echo "<span style='color: red'>注册错误</span>";
    else{
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $connect = mysqli_connect("localhost:3306", "root", "");
        if (!$connect) {
            /*echo "<script>
                   alert('网络错误.')
                   window.location.href='index.php';
                </script>";*/
            echo "<span style='color: red'>网络错误</span>>";
        }

        $sql = "USE end";
        mysqli_query($connect,$sql);

        $sql = "SELECT * FROM account WHERE username='$username'";
        $num = mysqli_num_rows(mysqli_query($connect,$sql));
        if ($num != 0) {
            /*echo '<script>
                alert("用户名已存在")
                window.location.href = "signup.php";
            </script>';
            */
            echo "<span style='color: red'>用户名已存在</span>";
            mysqli_close($connect);
            return;
        }

        $sql = "insert into account(username,pwd,head) values('$username',AES_ENCRYPT(('$pwd'),'zyc'),'./img/head/default_head.jpg')";
        if(mysqli_query($connect,$sql)){
            $_SESSION['isLogin'] = true;
            setcookie("username",$username,time()+3600,"/");
            setcookie("pwd",$pwd,time()+3600,"/");
            echo "<span style='color: green'>注册成功</span>";
            //header("location:index.php");
        }else{
            echo '<script>
                alert("服务器错误")
                //window.location.href = "signup.php";
            </script>';
        }


        mysqli_close($connect);
    }