<?php
class productModel  extends Database
{
    // hiển thị dữ liệu trong bảng adproducttype

    public function showProducttype()
    {
        $sql = "SELECT * FROM product";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $dataType[] = $row;
        }
        if (empty($dataType))
            echo ("");
        else
            // var_dump($data[]);
            return $dataType;
    }

    // thêm dữ liệu vào bảng adproducttype
    public function insertproductype($ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $sql1 = "INSERT INTO adproducttype(ma_loaisp,ten_loaisp,mota_loaisp) VALUES ('$ma_loaisp','$ten_loaisp','$mota_loaisp')";
        $this->connect()->exec($sql1);
        echo "bạn ghi mới được tạo thành công";
    }
    public function deleteproductype($ma_loaisp)
    {
        $sql = "DELETE FROM adproducttype WHERE ma_loaisp='$ma_loaisp'";
        $this->connect()->exec($sql);
        echo "bản ghi được xóa thành công";
    }

    /*quan ly dnah muc san <pham */
    public function inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date)
    {
        $sql = "INSERT INTO product VALUE('$ma_loaisp','$ma_sp','$tensp', '$hinhanh','$dongia','$soluong','$khuyenmai',$giakm,'$create_date')";
        $this->connect()->exec($sql);
    }

    public function deleteProduct($ma_sp)
    {
        $sql = "DELETE FROM product WHERE ma_sp='$ma_sp'";
        $this->connect()->exec($sql);
    }

    public function editProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date)
    {
        $sql = "UPDATE product SET ma_loaisp='$ma_loaisp',tensp='$tensp',hinhanh='$hinhanh',dongia='$dongia',soluong='$soluong',khuyenmai='$khuyenmai',giakm='$giakm',create_date='$create_date' WHERE ma_sp='$ma_sp'";
        $this->connect()->exec($sql);
    }
    public function showList(){
        $sql="SELECT *FROM product";
        $stm = $this->connect()->query($sql);
        while($row=$stm->fetch()){
            $data[]=$row;
        }
        if (empty($data))
            echo ("");
        else
            return $data;
    }
    // lay thong tin chi tiet sp
    public function getProductDetail ($ma_sp){
        $sql="SELECT * FROM  product  WHERE ma_sp='$ma_sp'";
        $stms=$this->connect()->query($sql);
        $stm = $stms->fetch();
        return $stm;
    }
    public function insertOrderStatus($maHD,$tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, $trangthai)
    {
        // Insert the order information into the database
        $sql = "INSERT INTO `order_status`(`maHD`,`tenkh`, `dienthoai`, `email`, `diachi_lienhe`, `diachi_giaohang`, `tongtien`, `trangthai`) VALUES ('$maHD','$tenkh','$dienthoai','$email','$diachi_lienhe','$diachi_giaohang','$tongtien','$trangthai')";
        $this->connect()->exec($sql);
    }
    public function showListOrder(){
        $sql="SELECT *FROM order_status";
        $stm = $this->connect()->query($sql);
        while($row=$stm->fetch()){
            $data[]=$row;
        }
        if (empty($data))
            echo ("");
        else
            return $data;
    }
    public function editOrderStatus($maHD,$tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, $trangthai){
        $sql="UPDATE `order_status` SET `maHD`='$maHD',`tenkh`='$tenkh',`dienthoai`='$dienthoai',`email`='$email',`diachi_lienhe`='$diachi_lienhe',`diachi_giaohang`='$diachi_giaohang',`tongtien`='$tongtien',`trangthai`='$trangthai' WHERE maHD='$maHD'";
        $this->connect()->exec($sql);
    }

    //show hóa đơn theo maHD
    public function showOrder($maHD){
        $sql="SELECT *FROM order_status WHERE maHD='$maHD'";
        $stm = $this->connect()->query($sql);
        while($row=$stm->fetch()){
            $data[]=$row;
        }
        if (empty($data))
            echo ("");
        else
            return $data;
    }



}

