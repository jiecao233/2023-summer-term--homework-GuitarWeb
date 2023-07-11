<?php
    session_start();
    setcookie('username','',time(),'/');
    setcookie('pwd','',time(),'/');
    session_destroy();
    header("location:index.php");