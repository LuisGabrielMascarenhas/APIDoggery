<?php

require_once '../includes/DBOperation.php';


function parametrosEstãoDisponiveis($params){
    $disponivel = true;
    $missingParams = "";

    foreach($params as $param){
        if(!isset($_POST[$param])|| strlen($_POST[$param])<=0){
            $disponivel = false;
            $missingParams = $missingParams . ", ".$param;
        }
    }
    if(!$disponivel){
        $response = array();
        $response['error'] = true;
        $response['message'] = 'Parâmetros '. substr($missingParams,1,strlen($missingParams)) . ' desaparecidos';

        echo json_encode($response);


        die();
    }

}
$response = array();

    if(isset($_GET['apicall'])){
        switch($_GET['apicall']){

            case 'criarUsuario':

            parametrosEstãoDisponiveis(array());

            $db = new DbOperation();

        $result = $db->criarUsuario(
            

        );

        if($result){

            $response['error'] = false;
            $response['message'] = 'Usuário criado com sucesso';
            $response[''];
        }

        }
    }

?>