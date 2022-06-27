<?php
class EcopontoControllers{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $numero = $_POST['numero'];
        $photo = $_POST['photo'];
        $localizacao = $_POST['localizacao'];

        $eco = new Ecoponto(null, $name,$phone,$adress,$numero,$photo,$localizacao);
        $id = $eco->create();

        $result['message'] = "Cadastrado com sucesso";
        $result['ecoponto']['id'] = $id;
        $result['ecoponto']['name'] = $name;
        $result['ecoponto']['phone'] = $phone;
        $result['ecoponto']['adress'] = $adress;
        $result['ecoponto']['numero'] = $numero;
        $result['ecoponto']['photo'] = $photo;
        $result['ecoponto']['localizacao'] = $localizacao;

        $response->out($result);

    }

    function delete() {
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];

        $eco = new Ecoponto($id, null,null,null,null,null,null);
        $eco->delete();

        $result['message'] = "Deletado com sucesso";
        $result['ecoponto']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $numero = $_POST['numero'];
        $photo = $_POST['photo'];
        $localizacao = $_POST['localizacao'];

        $eco = new Ecoponto($id,$name,$phone,$adress,$numero,$photo,$localizacao);
        $eco->update();

        $result['message'] = "Atualizado com sucesso";
        $result['ecoponto']['id'] = $id;
        $result['ecoponto']['name'] = $name;
        $result['ecoponto']['phone'] = $phone;
        $result['ecoponto']['adress'] = $adress;
        $result['ecoponto']['numero'] = $numero;
        $result['ecoponto']['photo'] = $photo;
        $result['ecoponto']['localizacao'] = $localizacao;
        $response->out($result);
    }
    
    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $eco = new Ecoponto(null,null,null,null,null,null,null);
        $result = $eco->selectAll();
        $response->out($result);
    }

    function selectByid(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $eco = new Ecoponto($id,null,null,null,null,null,null);
        $result = $eco->selectByid();
        $response->out($result);
    }
}
?>