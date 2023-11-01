<?php
//app.php gọi controller, models, views trong app
class Admincore
{
    protected $controller = "admin";
    protected $action = "show";
    protected $params;
    //lớp có 1 hàm mặc định là _contruct. khi chạy lớp App nó mặc định gọi hàm __contruct
    function __construct()
    {
        $arr = $_GET;
        $arr = $this->Urlprocess();
        //print_r ($arr);

        //XỬ LÝ CONTROLLERS
        //Kiểm tra trong controller có trang home.php không. nếu tồn tại thì require vào
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }

        require_once "./mvc/controllers/" . $this->controller . ".php";

        //
        $this->controller = new $this->controller;
        //XỬ LÝ ACTION (NEW, SP) XEM FUNCTION NÀO ĐƯỢC GỌI TRONG TRANG HOME.PHP

        if (isset($arr[1])) {
            //kiểm tra xem function có tồn tại trong class home hay không?
            //nếu tên hàm có trong controller đang chạy thì action cho nó
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            //echo $this->action;
            unset($arr[1]);
        }
        //XỬ LÝ PARAMS

        /*echo $this->controller."<br>";
        echo $this->action."<br>";
        print_r ($this->params)."<br>";*/

        $this->params = $arr ? array_values($arr) : array();
        call_user_func_array(array($this->controller, $this->action), $this->params);
    }


    function Urlprocess()
    {
        //lấy được url
        if (isset($_GET["url"])) {
            //return $u=$_GET["url"];
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
