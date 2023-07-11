<?php
session_start();
if(empty($_POST['adminUsername']) || empty($_POST['adminPwd'])){
    header("location:index.php");
}
else{
    $username = $_POST['adminUsername'];
    $pwd = $_POST['adminPwd'];
    $connect = mysqli_connect("localhost:3306", "root", "");
    if (!$connect) {
        echo "<script>
                   alert('网络错误.')
                </script>";
    }

    $sql = "USE end";
    mysqli_query($connect,$sql);

    $sql = "SELECT * FROM admin WHERE username='$username' AND pwd=AES_ENCRYPT(('$pwd'),'zyc')";
    $result = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        setcookie('adminUsername',$username,time()+1800,'/');
        setcookie('adminPwd',$pwd,time()+1800,'/');
        $_SESSION['isAdminLogin'] = true;
        header("location:backend.php");
    }elseif ($num > 1){
        header("location:error.php");
    }else{
        echo "<script>
                alert('账号或密码错误')
                window.location.href = 'adminLogin.php'
        </script>";
    }

    mysqli_close($connect);
}