<?php

class DBconnect{
    
    private $con;

    function __construct(){
        
    }
    function connect(){
        include_once dirname(__FILE__).'/Constants.php';
    
        $this->con = new mysqli(DB_HOST,DB_NAME,DB_PASS,DB_USER);

        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_errno();
        }

        return $this->con;

    }

}
?>