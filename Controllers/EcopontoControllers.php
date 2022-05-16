<?php
class EcopontoControllers{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $number = $_POST['number'];
        $adress = $_POST['adress'];

        $user = new Ecoponto(null, $name,$number,$adress);
        $id = $user->create();

        $result['message'] = "Criado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['number'] = $number;
        $result['user']['adress'] = $adress;
        $response->out($result);

    }

    function delete() {
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];

        $user = new Ecoponto($id, null,null,null);
        $user->delete();

        $result['message'] = "Deletado com sucesso";
        $result['user']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $adress = $_POST['adress'];

        $user = new Ecoponto($id,$name,$number,$adress);
        $user->update();

        $result['message'] = "Atualizado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['number'] = $number;
        $result['user']['adress'] = $adress;
        $response->out($result);
    }
    
    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $user = new Ecoponto(null,null,null,null);
        $result = $user->selectAll();
        $response->out($result);
    }

    function selectByid(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $user = new Ecoponto($id,null,null,null);
        $result = $user->selectByid();
        $response->out($result);
    }
}
?>