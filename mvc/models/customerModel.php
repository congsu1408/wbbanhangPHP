<?php
class customerModel extends Database
{
    public function showCustomer()
    {
        $sql = "SELECT * FROM customer";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $dataType[] = $row;
        }
        if (empty($dataType))
            echo ("");
        else
            return $dataType;
    }

    public function insertCustomer($tenkh, $dienthoai, $email, $diachilienhe, $diachigiaohang)
    {
        $sql = "INSERT INTO customer ( tenkh, dienthoai, email, diachi_lienhe, diachi_giaohang)
                VALUES ( '$tenkh', '$dienthoai', '$email', '$diachilienhe', '$diachigiaohang')";
        $this->connect()->exec($sql);

        return $this->connect()->lastInsertId();
    }
    // sửa thông tin khách hàng
    public function editCustomer($makh, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang)
    {
        $sql = "UPDATE `customer` SET `makh`='$makh',`tenkh`='$tenkh',`dienthoai`='$dienthoai',`email`='$email',`diachi_lienhe`='$diachi_lienhe',`diachi_giaohang`='$diachi_giaohang' WHERE makh='$makh'";
        $this->connect()->exec($sql);
    }
    // xóa thông tin khách hàng
    public function deleteCustomer($makh)
    {
        $sql = "DELETE FROM customer WHERE makh='$makh'";
        $this->connect()->exec($sql);
    }
    // show thông tin khách hàng theo tên khách hàng
    public function showIFCustomer($tenkh){
        $sql="SELECT *FROM customer WHERE tenkh='$tenkh'";
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



