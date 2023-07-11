<?php
if (empty($_POST['name']) || empty($_POST['path']))
    //header("location:index.php");
    echo "<span style='color: red'>添加错误</span>";
else{
    $name = $_POST['name'];
    $path = $_POST['path'];
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

    $sql = "SELECT * FROM banner WHERE name='$name'";
    $num = mysqli_num_rows(mysqli_query($connect,$sql));
    if ($num != 0) {
        /*echo '<script>
            alert("用户名已存在")
            window.location.href = "signup.php";
        </script>';
        */
        echo "<span style='color: red'>名称已存在</span>";
        mysqli_close($connect);
        return;
    }

    $sql = "insert into banner(name,path,enable) values('$name','$path',false)";
    if(mysqli_query($connect,$sql)){
        echo "<span style='color: green'>添加成功</span>";
    }else{
        echo "<span style='color: green'>添加失败</span>";
    }


    mysqli_close($connect);
}