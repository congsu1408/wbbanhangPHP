<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
else{
    if($_SESSION['role'] == 'admin'){
        include "headeradmin.php";
        //gọi trang app.php
        require_once "./mvc/core/admin.php";
        require_once "./mvc/core/controller.php";
        require_once "./mvc/core/DB.php";
        $app= new Admincore();
    }
    else{
        include "header.php";
        //gọi trang app.php
        require_once "./mvc/core/App.php";
        require_once "./mvc/core/controller.php";
        require_once "./mvc/core/DB.php";
        $app= new App();
    }


}

?>
