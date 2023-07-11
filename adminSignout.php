<?php
    session_start();
    setcookie('adminUsername', '', time(), '/');
    setcookie('adminPwd', '', time(), '/');
    $_SESSION['isAdminLogin'] = false;
    header("location:adminLogin.php");