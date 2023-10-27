<?php
class orderModel extends Database
{
   
    public function getInvoiceInfo($mahd)
    {
        $sql = "SELECT * FROM order WHERE mahd = '$mahd'";
        $stm = $this->connect()->query($sql);
        $data = $stm->fetch();
        return $data;
    }
}