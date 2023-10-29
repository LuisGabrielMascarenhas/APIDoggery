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

        //Cria o Usuario
            case 'criarTutor':

            parametrosEstãoDisponiveis(array('Nome','Email','Senha','Celular'));

            $db = new DBOperation();

        $result = $db->criarTutor(
            $_POST['Nome'],
            $_POST['Email'],
            $_POST['Senha'],
            $_POST['Celular'],
        );

        if($result){
            $response['error'] = false;
            $response['message'] = 'Tutor criado com sucesso';
            $response['Tutor']= $db->getTutor();

        }else{
            $response['error'] = true;
            $response['message'] = 'Ocorreu um erro por favor tente novamente';
            
        }
        break;

        //Mostra os Tutor no banco
            case 'getTutor':
                $db = new DBOperation();
                $response['error'] = false;
                $response['message'] = 'Pedido feito com sucesso';
                $response['Tutor']= $db->getTutor();
                break;
            
       /*      case 'getTutorDesc':
                $db = new DBOperation();
                $response['error'] = false;
                $response['message'] = 'Pedido feito com sucesso';
                $response['Tutor']= $db->getTutorDesc();
            break; */

        //Atualiza os Tutor
            case 'updateTutor':
                parametrosEstãoDisponiveis(array('idTutor','Nome','Email','Senha','Celular'));

             $db = new DBOperation();
    
                $result = $db->updateTutor(
                    $_POST['idTutor'],
                    $_POST['Nome'],
                    $_POST['Email'],
                    $_POST['Senha'],
                    $_POST['Celular'],
    
                );

                if($result){
                    $response['error'] = false;
                    $response['message'] = 'Usuário atualizado com sucesso';
                    $response['Tutor']= $db->getTutor();
                }else{
                    $response['error'] = true;
                    $response['message'] = 'Houve um erro por favor tente novamente';

            }
        break;
    
        //Deleta o Usuario
   
        
            case 'deleteTutor':

                if(isset($_POST['idTutor'])){
                    $db = new DBOperation();
                    if($db->deleteTutor($_POST['idTutor'])){
                            $response['error'] = false;
                            $response['message'] = 'Usuário excluido com sucesso';
                            $response['Tutor']= $db->getTutor();
                    }else{
                            $response['error'] = true;
                            $response['message'] = 'Houve um erro por favor tente novamente';
                    }
                }else{
                            $response['error'] = true;
                            $response['message'] = 'Nada para apagar tente novamente';
                }
        break;
        
        
        //Pets
        //Criar o Pet
        case 'criarPet':

            parametrosEstãoDisponiveis(array('$idTutor','Nome', 'Peso', 'Restricao'));

            $db = new DBOperation();

        $result = $db->criarPet(
            $_POST['idTutor'],
            $_POST['Nome'],
            $_POST['Peso'],
            $_POST['Restricao'],
        );

        if($result){
            $response['error'] = false;
            $response['message'] = 'Pet criado com sucesso';
            $response['Pets']= $db->getPet();

        }else{
            $response['error'] = true;
            $response['message'] = 'Ocorreu um erro por favor tente novamente';
            
        }
        break;


        //Pegar as informações do pet
        case 'getPet':
            $db = new DBOperation();
            $response['error'] = false;
            $response['message'] = 'Pedido feito com sucesso';
            $response['Pets']= $db->getPet();
        break;


        //Atualizar as informaçoes do Pet
        case 'updatePet':
            parametrosEstãoDisponiveis(array('idPet','Nome','Peso','Descricao'));

         $db = new DBOperation();

            $result = $db->updatePet(
                $_POST['idPet'],
                $_POST['Nome'],
                $_POST['Peso'],
                $_POST['Descricao'],

            );

            if($result){
                $response['error'] = false;
                $response['message'] = 'Pet atualizado com sucesso';
                $response['Pet']= $db->getPet();
            }else{
                $response['error'] = true;
                $response['message'] = 'Houve um erro por favor tente novamente';

        }
        break;
        //Deletar os Pets
        case 'deletarPet':

            if(isset($_POST['idPet'])){
                $db = new DBOperation();
                if($db->deletarPet($_POST['idPet'])){
                        $response['error'] = false;
                        $response['message'] = 'Pet excluido com sucesso';
                        $response['Pets']= $db->getPet();
                }else{
                        $response['error'] = true;
                        $response['message'] = 'Houve um erro por favor tente novamente';
                }
            }else{
                        $response['error'] = true;
                        $response['message'] = 'Nada para apagar tente novamente';
            }
    break;
    }
    
    
    }else{
        $response['error'] = true;
        $response['message'] = 'Chamada de API inválida';

    }
    echo json_encode($response);
