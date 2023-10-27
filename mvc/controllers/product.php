<?php
class product extends Controller
{

     public function show()
     {
          $obj = $this->model("productModel");
      $data = $obj->showList();
      $this->view("view_Adproduct", $data);
     }

     public function showProductType()
     {
          $obj = $this->model("productModel");
      $dataType = $obj->showProducttype();
      $this->view("view_Adproduct", $dataType);
     }
     public function getProductID()
     {
          $obj = $this->model("productModel");
          $data = $obj->showProducttype();
          //var_dump($data);
          $this->view("view_Adproduct", $data);
     }
     public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->inserProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date);
          // thông báo thành công và chuyển về trang home
            echo "<script>alert('Thêm thành công!');</script>";
          header("Refresh: 0.0001 ; url=http://localhost/PHP/product/manageProduct/");
     }

     function delete($ma_sp){
		$obj= $this->model("productModel");
		$obj->deleteProduct($ma_sp);
		header("Refresh: 0.0001 ; url=http://localhost/PHP/product/manageProduct/");
	}

     public function editProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date)
     {
          $obj = $this->model("productModel");
          $obj->editProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai,$giakm, $create_date);
          header("Refresh: 0.0001 ; url=http://localhost/PHP/product/manageProduct/");
     }
     public function manageProduct()
     {
          $obj = $this->model("productModel");
          $data = $obj->showList();
          $this->view("manage_product", $data);
     }
        public function showIFProduct($ma_sp)
        {
            $obj = $this->model("productModel");
            $data = $obj->showList($ma_sp);
            $this->view("edit_product", $data);
        }
}
