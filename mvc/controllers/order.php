<?php

class order extends controller {

    public function showOrderStatus(){
        $obj = $this->model("productModel");
        $data = $obj->showListOrder();
        //var_dump($data);
        $this->view("view_OrderStatus", $data);
    }
    public function showOSWmaHD(){
        $obj = $this->model("productModel");
        $data = $obj->showListOrder();
        //var_dump($data);
        $this->view("edit_order", $data);
    }
    public function editOrder($maHD,$tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, $trangthai){
        $obj = $this->model("productModel");
        $data = $obj->editOrderStatus($maHD,$tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, $trangthai);
        //var_dump($data);
//        $this->view("edit_order", $data);
        // thông báo thành công sau khi ấn ok thì chuyển hướng đến trang danh sách đơn hàng
        echo "<script>alert('Sửa thành công!');</script>";
        echo "<script> location.href='http://localhost/PHP/order/showOrderStatus'; </script>";
    }
    public function addtocart($ma_sp){
        $obj = $this->model("productModel");
        $data = $obj->getProductDetail($ma_sp);
// Kiểm tra xem tên và mã sản phẩm có trống hay không
        if (empty($data['tensp']) || empty($data['ma_sp'])) {
            return;
        }
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$ma_sp])){
                $_SESSION['cart'][$ma_sp]['qty'] += 1;
            } else {
                $_SESSION['cart'][$ma_sp]['qty'] = 1;
            }
        } else  {
            $_SESSION['cart'][$ma_sp]['qty'] = 1;
        }



        $_SESSION['cart'][$ma_sp]['ma_sp'] = $data['ma_sp'];
        $_SESSION['cart'][$ma_sp]['tensp'] = $data['tensp'];
        $_SESSION['cart'][$ma_sp]['hinhanh'] = $data['hinhanh'];
        $_SESSION['cart'][$ma_sp]['dongia'] = $data['dongia'];
        $_SESSION['cart'][$ma_sp]['soluong'] = $data['soluong'];
        $_SESSION['cart'][$ma_sp]['khuyenmai'] = $data['khuyenmai'];
        $_SESSION['cart'][$ma_sp]['giakm'] = $data['giakm'];

        header("Refresh: 0.0001 ; url=http://localhost/PHP/order/getlistAddtocart");
    }


    public function getlistAddtocart(){
        if (isset($_SESSION['cart'])){
            $this->view("view_Addtocart",$_SESSION['cart']);
        }
    }

    public function deleteaddtocart($ma_sp){
        if(array_key_exists($ma_sp,$_SESSION['cart'])){
            unset($_SESSION['cart'][$ma_sp]);
        }
        header("refresh:0.001; url=http://localhost/PHP/order/getlistAddtocart");
    }
    public function deleteinorder($ma_sp){
        if(array_key_exists($ma_sp,$_SESSION['cart'])){
            unset($_SESSION['cart'][$ma_sp]);
        }
        header("refresh:0.001; url=http://localhost/PHP/customer/show");
    }

    public function updateAddtocartID($ma_sp) {
        if(isset($_SESSION['cart'][$ma_sp])) {
            $new_qty = $_POST['new_qty'];

            if(is_numeric($new_qty) && $new_qty > 0) {
                $_SESSION['cart'][$ma_sp]['qty'] = $new_qty;
            }
        }
        header("refresh:0.001; url=http://localhost/PHP/order/getlistAddtocart");
    }
}
