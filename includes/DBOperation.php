<?php

class DBOperation{

    private $con;

    function __construct()
    {

        require_once dirname(__FILE__) .'/DBconnection.php';


        $db = new DBconnect();

        $this->con =$db->connect();
    }
    //Funções de Criar
    function criarTutor($Nome, $Email, $Senha, $Celular){
        $stmt = $this->con->prepare("INSERT INTO Tutor (Nome, Email, Senha, Celular) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",$Nome,$Email,$Senha,$Celular);
        if($stmt->execute())
                return true;
        return false;
    }

    function criarPet($idTutor,$Nome, $Peso, $Restricao){
        $stmt = $this->con->prepare("INSERT INTO Pet (idTutor, Nome, Peso, Restricao) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isds",$idTutor,$Nome, $Peso, $Restricao);
        if($stmt->execute())
                return true;
        return false;
    }


    //Funções de Read
    function getTutor(){
        $stmt = $this->con->prepare("SELECT idTutor,Nome,Email,Celular/* Email,Celular,Rua, Numero, Cep, Cidade, DadosBancarios */ FROM Tutor");
        $stmt->execute();
        $stmt->bind_result($idTutor,$Nome,$Email,$Celular/* ,$Rua,$Numero,$Cep,$Cidade,$DadosBancarios */);

        $Tutor = array();

        while($stmt->fetch()){
            $tutores = array();
            $tutores['idTutor'] = $idTutor;
            $tutores['Nome'] = $Nome;
            $tutores['Email'] = $Email;
            $tutores['Celular'] = $Celular;
        /*     $tutores['Rua'] =$Rua;
            $tutores['Numero'] =$Numero;
            $tutores['Cep'] =$Cep;
            $tutores['Cidade'] =$Cidade;
            $tutores['DadosBancarios'] =$DadosBancarios; */
            
            array_push($Tutor, $tutores);
        }
        return $Tutor;

    }
    //Descrição do Tutor
   /*  function getTutorDesc(){
        $stmt = $this->con->prepare("SELECT idTutor,Nome,Email,Celular,Email,Celular,Rua, Numero, Cep, Cidade, DadosBancarios  FROM Tutor");
        $stmt->execute();
        $stmt->bind_result($idTutor,$Nome,$Email,$Celular,$Rua,$Numero,$Cep,$Cidade,$DadosBancarios);

        $Tutor = array();

        while($stmt->fetch()){
            $tutores = array();
            $tutores['idTutor'] = $idTutor;
            $tutores['Nome'] = $Nome;
            $tutores['Email'] = $Email;
            $tutores['Celular'] = $Celular;
            $tutores['Rua'] = $Rua;
            $tutores['Numero'] = $Numero;
            $tutores['Cep'] = $Cep;
            $tutores['Cidade'] = $Cidade;
            $tutores['DadosBancarios'] = $DadosBancarios;
            
            array_push($Tutor, $tutores);
        }
        return $Tutor;
} */
    function getPet(){
        $stmt = $this->con->prepare("SELECT idPet,idTutor,Nome,Peso,Restricao FROM Pet");
        $stmt->execute();
        $stmt->bind_result($idPet,$idTutor,$Nome,$Peso,$Restricao);

        $pet = array();

        while($stmt->fetch()){
            $pets = array();
            $pets['idPet'] = $idPet;
            $pets['idTutor'] = $idTutor;
            $pets['Nome'] = $Nome;
            $pets['Peso'] = $Peso;
            $pets['Restricao'] = $Restricao;

            array_push($pet,$pets);
        }
        return $pet;

    }

    //Funções de Update
    function updateTutor($idTutor,$Nome, $Email, $Senha, $Celular){
        $stmt = $this->con->prepare("UPDATE Tutor SET Nome = ?, Email = ?, Senha = ?, Celular = ? WHERE idTutor = ?");
        $stmt->bind_param("ssssi",$Nome,$Email,$Senha,$Celular,$idTutor);
        if($stmt->execute())
                return true;
        return false;
        
    }

    function updatePet($idPet, $Nome, $Peso, $Restricao){
        $stmt = $this->con->prepare("UPDATE Pet SET Nome = ?, Peso = ?, Restricao = ? WHERE idPet = ?");
        $stmt->bind_param("sssi",$Nome,$Peso,$Restricao,$idPet);
        if($stmt->execute())
                return true;
        return false;
        
    }
    function updateDescricaoTutor($Rua,$Numero,$Cep,$Cidade,$DadosBancarios){
        $stmt = $this->con->prepare("UPDATE Tutor SET Rua = ? , Numero = ?, Cep = ?, Cidade = ?, DadosBancarios= ? WHERE idTutor = ?");
        $stmt->bind_param("sssssi",$Rua,$Numero,$Cep,$Cidade,$DadosBancarios,$idTutor);
        if($stmt->execute())
            return true;
        return false;
    }


    //Funções de Deletar
    function deleteTutor($idTutor){
        $stmt = $this->con->prepare("DELETE FROM Tutor WHERE idTutor = ? ");
        $stmt->bind_param("i",$idTutor);
        if($stmt->execute())
            return true;

        return false;
    }
    
    function deletarPet($idPet){
        $stmt = $this->con->prepare("DELETE FROM Pet WHERE idPet = ? ");
        $stmt->bind_param("i",$idPet);
        if($stmt->execute())
            return true;

        return false;
    }
}
    
    


?>