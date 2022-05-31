<?php
class AdminController{

    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        //Entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        //Processamento ou Persistencia
        $admin = new Admin(null, $name, $email, sha1($pass));
        $id = $admin->create();
        //Saída
        $result['message'] = "Cadastrado com sucesso!";
        $result['administrador']['id'] = $id;
        $result['administrador']['name'] = $name;
        $result['administrador']['email'] = $email;
        $response->out($result);
    }

    function delete(){
        // somente o usuário logado pode deletar seu perfil
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $admin = new Admin($id, null, null, null);
        $admin->delete();
        $result['message'] = "Admin deletado com sucesso!";
        $result['administrador']['id'] = $id;
        $response->out($result);
    }

    function update(){
        // somente o usuário logado pode editar seu perfil
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $admin = new Admin($id, $name, $email, sha1($pass));
        $admin->update();
        $result['message'] = "Admin atualizado com sucesso!";
        $result['administrador']['id'] = $id;
        $result['administrador']['name'] = $name;
        $result['administrador']['email'] = $email;
        $response->out($result);
    }

    function selectAll(){
        // somente adm logado pode ver os usuarios cadastrados
        $response = new Output();
        $response->allowedMethod('GET');
        $admin = new Admin(null, null, null, null);
        $result = $admin->selectAll();
        $response->out($result);
    }

    function selectById(){
        //so o proprio usuario logado ou um admin logado
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $admin = new Admin($id, null, null, null);
        $result = $admin->selectById();
        $response->out($result);
    }

}
?>