<?php
    $connect = mysqli_connect("localhost:3306", "root", "");
    if(empty($_POST['username']))
        header("location:index.php");
    else{
        $username = $_POST['username'];

        if (!$connect) {
            /*echo "<script>
                   alert('网络错误.')
                   window.location.href='backend.php';
                </script>";*/
            echo "网络错误";
        }

        $sql="USE end";
        mysqli_query($connect,$sql);

        $sql="DELETE FROM account where username='$username'";
        if (mysqli_query($connect,$sql)){
            /*echo "<script>
                   alert('删除成功.')
                   window.location.href='backend.php';
                </script>";*/
            echo "删除成功";
        }else{
            /*echo "<script>
                   alert('删除失败.')
                   window.location.href='backend.php';
                </script>";
            */
            echo "删除失败";
        }
    }