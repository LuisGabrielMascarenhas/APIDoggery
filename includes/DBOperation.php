<?php

class DBOperation{

    private $con;

    function __construct()
    {

        require_once dirname(__FILE__) .'/DBconnection.php';


        $db = new DBconnect();

        $this->con =$db->connect();
    }


    function criarUsuario($usu_nome, $usu_email, $usu_senha, $usu_telefone){
        $stmt = $this->con->prepare("INSERT INTO Usuarios (usu_nome, usu_email, usu_senha, usu_telefone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",$usu_nome,$usu_email,$usu_senha,$usu_telefone);
        if($stmt->execute())
                return true;
        return false;
    }

    function getUsuario(){
        $stmt = $this->con->prepare("SELECT usu_id,usu_nome,usu_email,usu_telefone FROM Usuarios");
        $stmt->execute();
        $stmt->bind_result($usu_id,$usu_nome,$usu_email,$usu_telefone);

        $usuarios = array();

        while($stmt->fetch()){
            $usuario = array();
            $usuario['usu_id'] = $usu_id;
            $usuario['usu_nome'] = $usu_nome;
            $usuario['usu_email'] = $usu_email;
            $usuario['usu_telefone'] = $usu_telefone;
            
            array_push($usuarios, $usuario);
        }
        return $usuarios;

    }


    function updateUsuario(){
        $stmt = $this->con->prepare("UPDATE Usuarios SET usu_nome = ?, usu_email = ?, usu_senha = ?,usu_telefone = ?");
        $stmt->bind_param("ssss",$usu_nome,$usu_email,$usu_senha,$usu_telefone);
        if($stmt->execute())
                return true;
        return false;
        
    }


    
    function deleteUsuario(){
        $stmt = $this->con->prepare("DELETE FROM Usuarios WHERE usu_id = ?");
        $stmt->bind_param("i",$usu_id);
        if($stmt->execute())
                return true;

        return false;
    }
    }
    
    


?>