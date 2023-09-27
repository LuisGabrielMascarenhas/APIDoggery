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

?>