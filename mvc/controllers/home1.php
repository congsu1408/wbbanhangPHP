<?php 
class home1 extends Controller{
    // hiển thị dữ liệu lên trang index 
    public function show(){
        $obj = $this->model("productModel");
        $data = $obj->showList();
        $this->view("view_home",$data);
    }
}
?>