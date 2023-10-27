<?php

// tạo một file controller.php trong thư mục ./mvc/core/controller.php ĐỂ requei  modelsinhvien.php ,viewsinhvien.php.
class Controller {
	public function model($model){
		require_once "./mvc/models/".$model.".php";
		return new $model;
		}
	public function view($view, $data =array ()){
		require_once "./mvc/views/".$view.".php";
		}

	}
 ?>







