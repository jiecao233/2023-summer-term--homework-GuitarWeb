<?php
$connect = mysqli_connect("localhost:3306", "root", "");
if(empty($_POST['name']))
    header("location:backend.php");
else{
    $name = $_POST['name'];

    if (!$connect) {
        /*echo "<script>
               alert('网络错误.')
               window.location.href='backend.php';
            </script>";*/
        echo "<span style='color: green'>网络错误</span>";
    }

    $sql="USE end";
    mysqli_query($connect,$sql);

    $sql="update banner set enable=true where name='$name'";
    if (mysqli_query($connect,$sql)){
        echo "<span style='color: green'>更改成功</span>";
    }else{
        echo "<span style='color: green'>更改失败</span>";
    }
}