<?php
$connect = mysqli_connect("localhost:3306", "root", "");
if(empty($_POST['username']) || empty($_POST['newPwd']))
    header("location:backend.php");
else{
    $username = $_POST['username'];
    $newPwd = $_POST['newPwd'];

    if (!$connect) {
        /*echo "<script>
               alert('网络错误.')
               window.location.href='backend.php';
            </script>";*/
        echo "<span style='color: green'>网络错误</span>";
    }

    $sql="USE end";
    mysqli_query($connect,$sql);

    $sql="update account set pwd=AES_ENCRYPT(('$newPwd'),'zyc') where username='$username'";
    if (mysqli_query($connect,$sql)){
        echo "<span style='color: green'>修改成功</span>";
    }else{
        echo "<span style='color: green'>修改失败</span>";
    }
}