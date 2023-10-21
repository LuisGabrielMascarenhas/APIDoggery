<?php

require_once '../includes/DBOperation.php';


function parametrosEstãoDisponiveis($params){
    $disponivel = true;
    $missingParams = "";

    foreach($params as $param){
        if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
            $disponivel = false;
            $missingParams = $missingParams . ", ".$param;
        }
    }

    if(!$disponivel){
        $response = array();
        $response['error'] = true;
        $response['message'] = 'Parâmetros '. substr($missingParams, 1, strlen($missingParams)) . ' desaparecidos';

        echo json_encode($response);


        die();
    }

}
$response = array();

    if(isset($_GET['apicall'])){

        switch($_GET['apicall']){

            case 'criarUsuario':

            parametrosEstãoDisponiveis(array('usu_nome','usu_email','usu_senha','usu_telefone'));

            $db = new DbOperation();

        $result = $db->criarUsuario(
            $_POST['usu_nome'],
            $_POST['usu_email'],
            $_POST['usu_senha'],
            $_POST['usu_telefone'],
        );

        if($result){
            $response['error'] = false;
            $response['message'] = 'Usuário criado com sucesso';
            $response['usuarios']= $db->getUsuario();

        }else{
            $response['error'] = true;
            $response['message'] = 'Ocorreu um erro por favor tente novamente';
            
        }
        break;


        case 'getUsuario':
            $db = new DBOperation();
            $response['error'] = false;
            $response['message'] = 'Pedido feito com sucesso';
            $response['usuarios']= $db->getUsuario();
            break;


         case 'updateUsuario':
            parametrosEstãoDisponiveis(array());

            $db = new DbOperation();
    
            $result = $db->updateUsuario(
                $_POST['usu_id'],
                $_POST['usu_nome'],
                $_POST['usu_email'],
                $_POST['usu_senha'],
                $_POST['usu_telefone'],
            );

            if($result){
                $response['error'] = false;
                $response['message'] = 'Usuário atualizado com sucesso';
                $response['usuarios']= $db->getUsuario();
            }else{
                $response['error'] = true;
                $response['message'] = 'Houve um erro por favor tente novamente';

            }
        break;

        case 'deletarUsuario':



            if(isset($_GET['usu_id'])){
                    $db = new DBOperation();
                    if($db->deletarUsuario($_GET['usu_id'])){
                            $response['error'] = false;
                            $response['message'] = 'Usuário excluido com sucesso';
                            $response['usuarios']= $db->getUsuario();
                }
            }else{
                            $response['error'] = true;
                            $response['message'] = 'Houve um erro por favor tente novamente';

            }
    break;

    }
    
    }else{
        $response['error'] = true;
        $response['message'] = 'Chamada de API inválida';

    }
    echo json_encode($response);

?>