<?php

class DBOperation{

    private $con;

    function __construct(){
        require_once dirname(__FILE__) .'DBconnection.php';


        $db = new DBconnect();

        $this->con =$db->connect();
    }


    function criarUsuario(){
        
    }

}

?>