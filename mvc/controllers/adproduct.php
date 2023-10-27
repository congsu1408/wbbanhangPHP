<?php
class adproduct extends Controller{

    public function show(){
        $obj = $this->model ("productModel");
        $data1 = $obj->showProducttype();
        $data2 = $obj->showListproduct();
        $data =array('data1'=>$data1,'data2'=>$data2 );
        $this->view("view_Adproduct",$data);
    }
    public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date){
        $obj = $this->model ("productModel");
        $obj->insertProduct ($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
        // chuyển về trang home
        header("Refresh: 0.0001 ; url=http://localhost/PHP/home.php");
    }
    function delete($ma_sp){
        $obj = $this->model ("productModel");
        $obj->deleteProduct($ma_sp);
		header("Refresh: 0.0001 ; url=http://localhost/PHPNANGCAO/PHP/adproduct");
    }

}
?>
