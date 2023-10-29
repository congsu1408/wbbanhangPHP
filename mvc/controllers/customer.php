<?php

class customer extends Controller
{
    public function show()
    {
        $this->view("view_Order");
    }
    public function showCustomer()
{
    $obj = $this->model("customerModel");
    $data = $obj->showCustomer();
    $this->view("view_Customer", $data);
}

    public function insert($tenkh, $dienthoai, $email, $diachilienhe, $diachigiaohang)
    {
        $obj = $this->model("customerModel");
        $obj->insertCustomer( $tenkh, $dienthoai, $email, $diachilienhe, $diachigiaohang);
    }

    public function delete($makh)
    {
        $obj = $this->model("customerModel");
        $obj->deleteCustomer($makh);
        echo "<script>alert('Xóa thành công!');</script>";
        echo "<script> location.href='http://localhost/PHP/customer/showCustomer'; </script>";
    }
    // sửa thông tin khách hàng
    public function editCustomer($ma_kh, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang)
    {
        $obj = $this->model("customerModel");
        $obj->editCustomer($ma_kh, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang);
        echo "<script>alert('Sửa thành công!');</script>";
        header("Refresh: 0.0001 ; url=http://localhost/PHP/customer/showCustomer/");
    }

    public function showIForCustomer()
    {
        $obj = $this->model("customerModel");
        $data = $obj->showCustomer();
        $this->view("edit_customer", $data);

//        header("Refresh: 0.0001 ; url=http://localhost/PHP/customer/showCustomer/");
    }
    public function Buy($maHD, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang)
    {
        $tongtien = 0;
        $create_date = date('d/m/y');
        foreach ($_SESSION['cart'] as $key => $value) {
            $tongtien += $value['qty'] * $value['giakm'];
        }

        $obj = $this->model("productModel");
        $obj->insertOrderStatus($maHD,$tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, "Đang giao");
        // $obj->AddOrder($maHD, $create_date, $tongtien);
        // Xóa thông tin giỏ hàng
        unset($_SESSION['cart']);
        // Thông báo thành công
        echo "<script>alert('Đặt hàng thành công!');</script>";
        // Reload lại trang
        echo "<script> location.reload();" . "</script>";
    }

    public function updateAddtocart($ma_sp, $newQuantity)
    {
        $obj = $this->model("productModel");
        $obj->updateAddtocart($ma_sp, $newQuantity);
    }

}




    //lưu thông tin đơn hàng của khách hàng vào database
    //customer (makh, tenkh, dienthoai,email,diachilienhe, diachigiaohang)
    //orderDetail(mahd,masp,tensp,soluong,dongia,khuyenmai)
    //4(maHD,ngaytao,tongtien,makh,)
