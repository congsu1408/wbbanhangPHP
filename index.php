<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
else{
    // import file header.php
    include "header.php";
//gọi trang app.php
    require_once "./mvc/core/app.php";
    require_once "./mvc/core/controller.php";
    require_once "./mvc/core/DB.php";
    $app= new App();
}

?>
