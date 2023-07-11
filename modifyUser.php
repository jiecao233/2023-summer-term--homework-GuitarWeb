<?php
$connect = mysqli_connect("localhost:3306", "root", "");
if(empty($_POST['username']) || empty($_POST['newUsername']))
    header("location:backend.php");
else{
    $username = $_POST['username'];
    $newUsername = $_POST['newUsername'];

    if (!$connect) {
        /*echo "<script>
               alert('网络错误.')
               window.location.href='backend.php';
            </script>";*/
        echo "<span style='color: green'>网络错误</span>";
    }

    $sql="USE end";
    mysqli_query($connect,$sql);

    $sql = "SELECT * FROM account WHERE username='$newUsername'";
    $num = mysqli_num_rows(mysqli_query($connect,$sql));
    if ($num != 0) {
        echo "<span style='color: red'>用户名已存在</span>";
        mysqli_close($connect);
        return;
    }

    $sql="update account set username='$newUsername' where username='$username'";
    if (mysqli_query($connect,$sql)){
        echo "<span style='color: green'>修改成功</span>";
    }else{
        echo "<span style='color: green'>修改失败</span>";
    }
}