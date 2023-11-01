<?php
class admin extends Controller{
    // hiển thị dữ liệu lên trang index
    public function show(){
        $obj = $this->model("productModel");
        $data = $obj->showList();
        $this->view("dashboard",$data);
    }
}
?>
