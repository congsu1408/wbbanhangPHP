<?php
class Database{
   
    // specify your own database credentials
    private $host = "localhost";
    private $dbname = "websitebanhang";
    private $user = "root";
    private $pwd = "";
    public $conn;
   
    // get the database connection
    public function connect(){
   
       $dsn ='mysql:host='.$this->host.';dbname='.$this->dbname;
       $conn = new PDO($dsn, $this->user,$this->pwd);
       $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
       return $conn;
    }
     
}
?>